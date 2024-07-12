<?php
/*La linea de codigo numero 3, llama una vez el archivo datos.php ubicado en la carpeta modelo  del mvc*/ 
require_once('modelo/datos.php');

/*Declaración de la clase proveedor en la cual hereda clase datos (La conexion de la base de datos)
Claramente lo hereda con la palabra "Extends"*/ 
class proveedor extends datos{
	
	/*Dentro de la clases proveedor 
	se declara atributos con modificadores de acceso de tipo private en la cual estarán  predefinido
*/
	private $document;
	private $rif; 
	private $Nombre;
	private $Telefono;
	private $direccion;
	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)
	//valores en ello, esto es  muy mal llamado geters y seters por si alguien se los pregunta
	/*Una vez declarado los atributos falta colocar los metodos getter(leer) y setter(colocar) ya que esos atributos private(No podemos acceder
	esos atributos desde fuera)para acceder a ellas el metodo set tomara parametro de una varaiable en caso el getter retornara*/ 
	function set_document($valor){
		$this->document = $valor; 
	}
	function set_rif($valor){
		$this->rif = $valor; 
	}
	
	function set_Nombre($valor){
		$this->Nombre = $valor;
	}
	function set_Telefono($valor){
		$this->Telefono = $valor;
	}
	function set_direccion($valor){
		$this->direccion=$valor;
	}
	
	function get_document(){
		return $this->document;
	}
	function get_rif(){
		return $this->rif;
	}
	function get_Nombre(){
		return $this->Nombre;
	}
	function get_Telefono(){
		return $this->Telefono;
	}
	function get_direccion(){
		return $this->direccion;
	}
	
	
	
	
	function incluir(){
		
		
		//Lo primero que debemos hacer es consultar por el campo clave
		//en este caso la cedula, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		
		if(!$this->existe($this->rif)){
			//si estamos aca es porque la cedula no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2 Se ejecuta el sql
			$r = array();
			try {
				
					$p = $co->prepare("insert into proveedores(
					    documento_legal,
						rif,
						nombre,
						telefono,
						direccion
						)
						values(
						:rif,
						:nombre,
						:telefono,
						:direccion
						)");
			        $p->bindParam(':documento_legal',$this->document);
					$p->bindParam(':rif',$this->rif);		//Esta funcion bindparam() vinculara con una variable como una referencia
					$p->bindParam(':nombre',$this->Nombre);
					$p->bindParam(':telefono',$this->Telefono);	
					$p->bindParam(':direccion',$this->direccion);	
					
					$p->execute();
					
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'Registro Inluido';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe el rif';
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
		if($this->existe($this->rif)){
			try {
				$p = $co->prepare("update proveedores set
						documento_legal = :documento_legal,
						nombre = :nombre,
						telefono = :telefono,
						direccion = :direccion
						where
						rif = :rif
						");
					$p->bindParam(':documento_legal',$this->document);
					$p->bindParam(':rif',$this->rif);		
					$p->bindParam(':nombre',$this->Nombre);
					$p->bindParam(':telefono',$this->Telefono);	
					$p->bindParam(':direccion',$this->direccion);	
					$p->execute();
					
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'Registro Modificado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			    $r['mensaje'] =  'No existe el rif';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->rif)){
			try {
					$p = $co->prepare("delete from proveedores 
					    where
						rif = :rif
						");
					$p->bindParam(':rif',$this->rif);		
					
					
					$p->execute();
					$r['resultado'] = 'eliminar';
			        $r['mensaje'] =  'Registro Eliminado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe el rif';
		}
		return $r;
	}
	
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		//$r = array();
		try{
			
			$resultado = $co->query("select * from proveedores");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='coloca(this);'>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['rif'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['documento_legal'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['nombre'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['telefono'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['direccion'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."</td>";
				}
				return $respuesta;
			    
			}
			else{
			return '';
			}
			
		}catch(Exception $e){
			
			return $e->getMessage();
		}
		
	}
	
	
	private function existe($rif){
		/*Esta funcion hara que la variable rif verifique que exista */
		$co = $this->conecta();// esta linea conectara la base de datos mediante de un llamado desde clase datos
		
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);// esta linea (objeto de datos php)verificara los error en la base de datos
		try{
			//Entramos un un try catch en la cual es perfecto para manejar excepciones 
			// dentro del try se hace select de tabla proveedores donde rif
			$resultado = $co->query("select * from proveedores where rif='$rif'");
			
			//en esta parte se da una verificacion de los datos proporcionados 
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if($fila){
					// si esa fila hay datos retornara true
				return true;
			    
			}
			else{
				// si no hay retornara false
				return false;;
			}
			
		}catch(Exception $e){//
			return false;
		}
	}
	
	function consultatr(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("select * from proveedores where rif='$this->rif'");
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