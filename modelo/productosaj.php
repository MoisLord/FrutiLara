<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a su base de datos
require_once('modelo/datos.php');

//declaracion de la clase usuarios que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas 
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de dodne hereda (La padre) como sir fueran de el

class productosaj extends datos{
	//el primer paso dentro de la clase
	//sera declarar los atributos (variables) que describen la clase
	//para nostros no es mas que colcoar los inputs (controles) de
	//la vista como variables aca
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcoarlo privado es usando la palabra private
	
	private $codigo; //recuerden que en php, las variables no tienen tipo predefinido
	private $nombre;
	private $tipo;
	private $minimo;
    private $maximo;
    private $porcentaje;
	
	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)
	//valores en ello, esto es  muy mal llamado geters y seters por si alguien se los pregunta
	
	function set_codigo($valor){
		$this->codigo = $valor; //fijencen como se accede a los elementos dentro de una clase
		//this que singnifica esto es decir esta clase luego -> simbolo que indica que apunte
		//a un elemento de this, es decir esta clase
		//luego el nombre del elemento sin el $
	}
	//lo mismo que se hizo para codigo se hace para usuario y clave
	
	function set_nombre($valor){
		$this->nombre = $valor;
	}
	
	function set_tipo($valor){
		$this->tipo = $valor;
	}
	
	function set_minimo($valor){
		$this->minimo = $valor;
	}
	
    function set_maximo($valor){
		$this->maximo = $valor;
	}

    function set_porcentaje($valor){
		$this->porcentaje = $valor;
	}

	//ahora la misma cosa pero para leer, es decir get
	
	function get_codigo(){
		return $this->codigo;
	}
	
	function get_nombre(){
		return $this->nombre;
	}
	
	function get_tipo(){
		return $this->tipo;
	}
	
	function get_minimo(){
		return $this->minimo;
	}

    function get_maximo(){
		return $this->maximo;
	}

    function get_porcentaje(){
		return $this->porcentaje;
	}
	
	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y eliminar
	
	function incluir(){
		//Ok ya tenemos la base de datos y la funcion conecta dentro de la clase
		//datos, ahora debemos ejecutar las operaciones para realizar las consultas 
		
		//Lo primero que debemos hacer es consultar por el campo clave
		//en este caso la codigo, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		
		if(!$this->existe($this->codigo)){
			//si estamos aca es porque la codigo no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
			$r = array();
			try {
				
					$p = $co->prepare("Insert into producto(
						codigo,
						nombre,
						tipo,
						minimo,
                        maximo,
                        porcentaje
						)
						Values(
						:codigo,
						:nombre,
						:tipo,
						:minimo,
                        :maximo,
                        :porcentaje
						)");
					$p->bindParam(':codigo',$this->codigo);		
					$p->bindParam(':nombre',$this->nombre);
					$p->bindParam(':tipo',$this->tipo);	
					$p->bindParam(':minimo',$this->minimo);
                    $p->bindParam(':maximo',$this->maximo);
                    $p->bindParam(':porcentaje',$this->porcentaje);
					
					$p->execute();
					
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'Producto Inluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe el Producto';
		}
		
		//Listo eso es todo y es igual para el resto de las operaciones
		//incluir, modificar y eliminar
		//solo cambia para buscar 
		return $r;
		
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->codigo)){
			try {
				$p = $co->prepare("Update producto set 
						nombre = :nombre,
						tipo = :tipo,
						minimo = :minimo,
                        maximo = :maximo,
                        porcentaje = :porcentaje
						where
						codigo = :codigo
						");
					$p->bindParam(':codigo',$this->codigo);		
					$p->bindParam(':nombre',$this->nombre);
					$p->bindParam(':tipo',$this->tipo);
					$p->bindParam(':minimo',$this->minimo);
                    $p->bindParam(':maximo',$this->maximo);
                    $p->bindParam(':porcentaje',$this->porcentaje);
					
					$p->execute();
					
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Producto Modificado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			    $r['mensaje'] =  'No existe el Producto';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->codigo)){
			try {
					$p = $co->prepare("delete from producto
					    where
						codigo = :codigo
						");
					$p->bindParam(':codigo',$this->codigo);		
					
					
					$p->execute();
					$r['resultado'] = 'eliminar';
			        $r['mensaje'] =  'Producto Eliminado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe el Producto';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("Select * from producto");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='coloca(this);'>";
					
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['codigo'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['nombre'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['tipo'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['minimo'];
						$respuesta = $respuesta."</td>";
                        $respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['maximo'];
						$respuesta = $respuesta."</td>";
                        $respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['porcentaje'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  $respuesta;
			    
			}
			else{
				$r['resultado'] = 'consultar';
				$r['mensaje'] =  '';
			}
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}
	
	
	private function existe($codigo){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from producto where codigo='$codigo'");
			
			
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){

				return true;
			    
			}
			else{
				
				return false;;
			}
			
		}catch(Exception $e){
			return false;
		}
	}
	
	function consultatr(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("Select * from producto where codigo='$this->codigo'");
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){
			    
				$r['resultado'] = 'encontro';
			    $r['mensaje'] =  $fila;
				
			    
			}
			else{
				
				$r['resultado'] = 'noencontro';
				$r['mensaje'] =  '';
				
			}
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
		
	}
		
}
?>