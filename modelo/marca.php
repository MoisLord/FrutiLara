<?php
//llamda al archivo que contiene la clase
//datos, en ella esta guardada en la carpeta modelo
//para enlazar a la base de datos
require_once('modelo/datos.php');

//Aqui declare la clase Marca que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas 
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de donde hereda (El padre) que en este
//caso el padre es la clase datos en (datos.php) como si fueran de el

class marca extends datos{
	//el primer paso dentro de la clase
	//es declarar los atributos (variables) que describen la clase
	//para colocar los inputs del archivo (controles) de
	//la vista como variables
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcocarlo en privado es usando la palabra private

	//Aqui coloque los inputs de la vista en private
	private $modelo; //recordatorio que en php, las variables no tienen tipo predefinido
	private $marca;
	
	//Ok ya puesto los atributos, pero ahora como son privados no podemos acceder a ellos
	//desde afuera por lo que debemos colocar metodos (funciones)
	//que me permitan leer (get) y colocar (set) valores en ello
	
	function set_modelo($valor){
		$this->modelo = $valor; //este es como se accede a los elementos dentro de una clase
		//this singnifica (esto), es decir, esta clase luego se usa el simbolo ( -> )
		// que indica que apunte a un elemento de this, osea esta clase
		//luego el marca el elemento sin el simbolo ($)
	}
	//lo mismo que se hizo para modelo se hace para marca
	
	function set_marca($valor){
		$this->marca = $valor;
	}

	//ahora el mismo procedimiento pero para leer, es decir (get)
	
	function get_modelo(){
		return $this->modelo;
	}
	
	function get_marca(){
		return $this->marca;
	}
	
	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar, modificar y eliminar
	
	function incluir(){
		//ya hecho la base de datos y la funcion conecta dentro de la clase
		//datos, ahora hay que ejecutar las operaciones para realizar las consultas 
		
		//Lo primero que hay que hacer es consultar por el campo modelo
		//en este caso la de modelo, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		
		if(!$this->existe($this->modelo)){
			//como modelo no existe, es decir, se puede incluir
			//los pasos ahora son
			//1) Se llama a la función conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2) Se ejecuta el sql
			$r = array();
			try {
					$p = $co->prepare("Insert into marca(
						modelo,
						marca
						)
						Values(
						:modelo,
						:marca
						)");
					$p->bindParam(':modelo',$this->modelo);		
					$p->bindParam(':marca',$this->marca);
					
					$p->execute();
					
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'Marca Inluida';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la marca';
		}
		
		//ya realizado la función incluir este metodo se repite para el resto 
		//de las operaciones como son, Consultar, Modificar y Eliminar
		//solo cambia para buscar 
		return $r;
		
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->modelo)){
			try {
				$p = $co->prepare("Update marca set 
						marca = :marca
						where
						modelo = :modelo
						");
					$p->bindParam(':modelo',$this->modelo);		
					$p->bindParam(':marca',$this->marca);	
					$p->execute();
					
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Marca Modificada';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			    $r['mensaje'] =  'No existe la marca';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->modelo)){
			try {
					$p = $co->prepare("delete from marca
					    where
						modelo = :modelo
						");
					$p->bindParam(':modelo',$this->modelo);		
					
					
					$p->execute();
					$r['resultado'] = 'eliminar';
			        $r['mensaje'] =  'Marca Eliminada';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe la marca';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("Select * from marca");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='coloca(this);'>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['modelo'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['marca'];
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
	
	
	private function existe($modelo){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from marca where modelo='$modelo'");
			
			
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
			
			$resultado = $co->query("Select * from marca where modelo='$this->modelo'");
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