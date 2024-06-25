<?php

require_once('modelo/datos.php');



class login extends datos{

	
	private $cedula; 
	private $clave;
	
	
	
	
	function set_cedula($valor){
		$this->cedula = $valor; 
	}
	//lo mismo que se hizo para cedula se hace para usuario y clave
	
	function set_clave($valor){
		$this->clave = $valor;
	}
	
	
	
	//ahora la misma cosa pero para leer, es decir get
	
	function get_cedula(){
		return $this->cedula;
	}
	
	function get_clave(){
		return $this->clave;
	}
	
	
	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar y eliminar
	
	
	
	function existe(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			//grado de instruccion sera el valor que voy 
			//a guadr en $_SESSION, ustedes pueden cambiar por el que sea
			//se usara para determinar que elementos del menu se van a mostrar
			$p = $co->prepare("Select tipo_usuario from usuario 
			where 
			cedula=:cedula
			and 
			clave=:clave");
					$p->bindParam(':cedula',$this->cedula);		
					$p->bindParam(':clave',$this->clave);
			$p->execute();
			
			$fila = $p->fetchAll(PDO::FETCH_BOTH);
			if($fila){

				$r['resultado'] = 'existe';
			    $r['mensaje'] =  $fila[0][0];
			    
			}
			else{
				$r['resultado'] = 'noexiste';
			    $r['mensaje'] =  "Error en cedula y/o clave !!!";
			}
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}
	
	

	
	
	
}
?>