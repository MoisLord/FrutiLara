<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a la base de datos
require_once('modelo/datos.php');

// se declara la clase empleados que hereda de datos

class servicios extends datos{

	// se declaran como atributos privados

	private $codigo_servicio; // las variables no tienen tipo predefinido
	private $descripcion_servicio;
	private $estado_servicio;
	
	
	// se colocan metodo (Que serian funciones) seria get o set
	
	function set_codigo_servicio($valor){
		$this->codigo_servicio = $valor; 
	}

	// estamos usando un metodo por set y se usa para la clase cedula que seria el this
		//lo mismo que se hizo para cedula se hace para el resto
	
	function set_descripcion_servicio($valor){
		$this->descripcion_servicio = $valor;
	}
	
	function set_estado_servicio($valor){
		$this->estado_servicio = $valor;
	}

	//ahora la misma cosa pero para get
	function get_codigo_servicio(){
		return $this->codigo_servicio;
	}
	
	function get_descripcion_servicio(){
		return $this->descripcion_servicio;
	}
	
	function get_estado_servicio(){
		return $this->estado_servicio;
	}

	
	
	// metodos para incluir, consultar y eliminar
	
	function incluir(){
		// se consulta en este caso cedula, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		
		if(!$this->existe($this->codigo_servicio)){
			//cedula no existe es decir se puede incluir
			//funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//ejecuta el sql
			$r = array();
			try {
				
					$p = $co->prepare("Insert into servicios(
						codigo_servicio,
						descripcion_servicio,
						estado_servicio
						)
						Values(
						:codigo_servicio,
						:descripcion_servicio,
						:estado_servicio
						)");
					$p->bindParam(':codigo_servicio',$this->codigo_servicio);		
					$p->bindParam(':descrpcion_servicio',$this->descripcion_servicio);
					$p->bindParam(':estado_servicio',$this->estado_servicio);
					$p->execute();
					
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'Servicios registrado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe el codigo';
		}
		
		return $r;
		
	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->codigo_servicio)){
			try {
				$p = $co->prepare("Update servicios set 
						descripcion_servicio = :descripcion_servicio,
						estado_servicio = :estado_servicio
						where
						codigo_servicio = :codigo_servicio
						");
					$p->bindParam(':codigo_servicio',$this->codigo_servicio);		
					$p->bindParam(':descripcion_servicio',$this->descripcion_servicio);
					$p->bindParam(':estado_servicio',$this->estado_servicio);
					
					
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
			    $r['mensaje'] =  'No existe el codigo';
		}
		return $r;
	}
	
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->codigo_servicio)){
			try {
					$p = $co->prepare("delete from servicios 
					    where
						codigo_servicio = :codigo_servicio
						");
					$p->bindParam(':codigo_servicio',$this->codigo_servicio);		
					
					
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
			$r['mensaje'] =  'No existe el codigo';
		}
		return $r;
	}
	
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("Select * from servicios");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='coloca(this);'>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['codigo_servicio'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['descripcion_servicio'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['estado_servicio'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";

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
	
	
	private function existe($codigo_servicio){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from servicios where codigo_servicio='$codigo_servicio'");
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
			
			$resultado = $co->query("Select * from servicios where codigo_servicio='$this->codigo_servicio'");
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