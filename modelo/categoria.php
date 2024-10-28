<?php
//Se llama al archivo que contiene la clase, para enlazar a la base de datos
require_once('modelo/datos.php');

//declaracion de la clase "categoria" que hereda de la clase "datos"

class categoria extends datos{
	
	//Se declaran los atributos (variables) que describen la clase
	
	private $codigo_categoria; 
	private $descripcion_categoria;
	private $unidadMedNormal;
    private $unidadMedAlt;
	
	
	//Se añaden los metodos (funciones) que me permitan leer (get) y colocar (set)
	//Comienzo del sector de metodos de set
	

	function set_codigo_categoria($valor){
		$this->codigo_categoria = $valor; 
	}
	
	function set_descripcion_categoria($valor){
		$this->descripcion_categoria = $valor;
	}
	
	function set_unidadMedNormal($valor){
		$this->unidadMedNormal = $valor;
	}
	
    function set_unidadMedAlt($valor){
		$this->unidadMedAlt = $valor;
	}
	//Final del sector de metodos de set

	//Comienzo del sector de metodos de get
	
	function get_codigo_categoria(){
		return $this->codigo_categoria;
	}
	
	function get_descripcion_categoria(){
		return $this->descripcion_categoria;
	}
	
	function get_unidadMedNormal(){
		return $this->unidadMedNormal;
	}

    function get_unidadMedAlt(){
		return $this->unidadMedAlt;
	}
	//Final del sector de metodos de get
	
	//Creación de los metodos para incluir, consultar y eliminar
	//Comienzo del sector del metodo "incluir"
	function incluir(){
		
		
		//Se consulta el campo clave, se comprueba que "codigo_categoria" no exista, es decir, se puede incluir
		
		
		if(!$this->existe($this->codigo_categoria)){
			//Se llama a la funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//Se ejecuta el sql
			$r = array();
			try {
				
					$p = $co->prepare("Insert into categoria(
						codigo_categoria,
						descripcion_categoria,
						unidadMedNormal,
                        unidadMedAlt
						)
						Values(
						:codigo_categoria,
						:descripcion_categoria,
						:unidadMedNormal,
                        :unidadMedAlt
						)");
					$p->bindParam(':codigo_categoria',$this->codigo_categoria);		
					$p->bindParam(':descripcion_categoria',$this->descripcion_categoria);	
					$p->bindParam(':unidadMedNormal',$this->unidadMedNormal);
                    $p->bindParam(':unidadMedAlt',$this->unidadMedAlt);
					
					$p->execute();
					
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'La Categoria ha sido Registrada';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la categoria';
		}
		return $r;
		
	}
	//Finalización del sector del metodo "incluir"
	//Comienzo del sector del metodo "modificar"
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->codigo_categoria)){
			try {
				$p = $co->prepare("Update categoria set 
						descripcion_categoria = :descripcion_categoria,
						unidadMedNormal = :unidadMedNormal,
                        unidadMedAlt = :unidadMedAlt
						where
						codigo_categoria = :codigo_categoria
						");
					$p->bindParam(':codigo_categoria',$this->codigo_categoria);		
					$p->bindParam(':descripcion_categoria',$this->descripcion_categoria);
					$p->bindParam(':unidadMedNormal',$this->unidadMedNormal);
                    $p->bindParam(':unidadMedAlt',$this->unidadMedAlt);
					
					$p->execute();
					
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'La Categoria ha sido Editada';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'modificar';
			    $r['mensaje'] =  'No existe la Categoria';
		}
		return $r;
	}
	//Finalización del sector del metodo "modificar"
	//Comienzo del sector del metodo "eliminar"
	function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->codigo_categoria)){
			try {
					$p = $co->prepare("delete from categoria
					    where
						codigo_categoria = :codigo_categoria
						");
					$p->bindParam(':codigo_categoria',$this->codigo_categoria);		
					
					
					$p->execute();
					$r['resultado'] = 'eliminar';
			        $r['mensaje'] =  'La Categoria ha sido Borrada';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
		}
		else{
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe la Categoria';
		}
		return $r;
	}
	//Finalización del sector del metodo "eliminar"
	//Comienzo del sector del metodo "consultar"
	function consultar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("Select * from categoria");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='coloca(this);'>";
						$respuesta = $respuesta."<td style='display:none;'>";
							$respuesta = $respuesta.$r['id_categoria'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['codigo_categoria'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['descripcion_categoria'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['unidadMedNormal'];
						$respuesta = $respuesta."</td>";
                        $respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['unidadMedAlt'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
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
	//Finalización del sector del metodo "consultar"
	//Creación del sector del metodo "existe"
	private function existe($codigo_categoria){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from categoria where codigo_categoria='$codigo_categoria'");
			
			
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
	//Finalización de la creación del metodo "existe"
	//Comienzo del sector del metodo "consultartr"
	function consultatr(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try{
			
			$resultado = $co->query("Select * from categoria where codigo_categoria='$this->codigo_categoria'");
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
//Finalización del sector del metodo "consultartr"		
} //Finalización de la declaracion de la clase "categoria" que hereda de la clase "datos"
?>