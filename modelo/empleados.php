<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a la base de datos
require_once('modelo/datos.php');

// se declara la clase empleados que hereda de datos

class empleados extends datos{

	// se declaran como atributos privados

	private $cedula; // las variables no tienen tipo predefinido
	private $nombre_apellido;
	private $telefono;
	private $correo;
	private $direccion;
	private $fechaNacimiento;
	
	// se colocan metodo (Que serian funciones) seria get o set
	
	function set_cedula($valor){
		$this->cedula = $valor; 
	}

	// estamos usando un metodo por set y se usa para la clase cedula que seria el this
		//lo mismo que se hizo para cedula se hace para el resto
	
	function set_nombre_apellido($valor){
		$this->nombre_apellido = $valor;
	}
	
	function set_telefono($valor){
		$this->telefono = $valor;
	}

	function set_correo($valor){
		$this->correo = $valor;
	}

	function set_direccion($valor){
		$this->direccion = $valor;
	}

	function set_fechaNacimiento($valor){
		$this->fechaNacimiento = $valor;
	}
	
	//ahora la misma cosa pero para get
	function get_cedula(){
		return $this->cedula;
	}
	
	function get_nombre_apellido(){
		return $this->nombre_apellido;
	}
	
	function get_telefono(){
		return $this->telefono;
	}

	function get_correo(){
		return $this->correo;
	}

	function get_direccion(){
		return $this->direccion;
	}

	function get_fechaNacimiento(){
		return $this->fechaNacimiento;
	}
	
	// metodos para incluir, consultar y eliminar
	
	function incluir(){
		// se consulta en este caso cedula, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		
		if(!$this->existe($this->cedula)){
			//cedula no existe es decir se puede incluir
			//funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//ejecuta el sql
			$r = array();
			try {
				
					$p = $co->prepare("Insert into empleados(
						cedula,
						nombre_apellido,
						telefono,
						correo,
						direccion,
						fechaNacimiento
						)
						Values(
						:cedula,
						:nombre_apellido,
						:telefono,
						:correo,
						:direccion,
						:fechaNacimiento
						)");
					$p->bindParam(':cedula',$this->cedula);		
					$p->bindParam(':nombre_apellido',$this->nombre_apellido);
					$p->bindParam(':telefono',$this->telefono);
					$p->bindParam(':correo',$this->correo);
					$p->bindParam(':direccion',$this->direccion);
					$p->bindParam(':fechaNacimiento',$this->fechaNacimiento);
					
					$p->execute();
					
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'Empleado ha sido registrado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la cedula';
		}
		
		return $r;
		
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->cedula)){
			try {
				$p = $co->prepare("Update empleados set 
						nombre_apellido = :nombre_apellido,
						telefono = :telefono,
						correo = :correo,
						direccion = :direccion,
						fechaNacimiento = :fechaNacimiento
						where
						cedula = :cedula
						");
					$p->bindParam(':cedula',$this->cedula);		
					$p->bindParam(':nombre_apellido',$this->nombre_apellido);
					$p->bindParam(':telefono',$this->telefono);
					$p->bindParam(':correo',$this->correo);
					$p->bindParam(':direccion',$this->direccion);
					$p->bindParam(':fechaNacimiento',$this->fechaNacimiento);
					
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
			    $r['mensaje'] =  'No existe la cedula';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->cedula)){
			try {
					$p = $co->prepare("delete from empleados 
					    where
						cedula = :cedula
						");
					$p->bindParam(':cedula',$this->cedula);		
					
					
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
			$r['mensaje'] =  'No existe la cedula';
		}
		return $r;
	}
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("Select * from empleados");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='coloca(this);'>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['cedula'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['nombre_apellido'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['telefono'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['correo'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['direccion'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['fechaNacimiento'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";

					$r['resultado'] = 'consultar';
					$r['mensaje'] =  $respuesta;
					
			}
			
			return $r;
			    
			}
			else{
				return '';
			}
			
		}catch(Exception $e){
			return $e->getMessage();
		}
		
	}
	
	
	private function existe($cedula){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from empleados where cedula='$cedula'");
			
			
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
			
			$resultado = $co->query("Select * from empleados where cedula='$this->cedula'");
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