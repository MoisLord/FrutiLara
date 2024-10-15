<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a la base de datos
require_once('modelo/datos.php');

// se declara la clase productosaj que hereda de datos
class productosaj extends datos{
	
	// se declaran como atributos privados

	private $codigo; // las variables no tienen tipo predefinido
	private $nombre;
	private $cantidad_total;
	private $minimo;
    private $maximo;
    private $id_marca;
	private $id_categoria;
	
// se colocan metodo (Que serian funciones) seria get o set
	
	function set_codigo($valor){
		$this->codigo = $valor; 
	}

	// estamos usando un metodo por set y se usa para la clase codigo que seria el this
	//lo mismo que se hizo para codigo se hace para el resto
	
	function set_nombre($valor){
		$this->nombre = $valor;
	}
	
	function set_cantidad_total($valor){
		$this->cantidad_total = $valor;
	}
	function set_minimo($valor){
		$this->minimo = $valor;
	}
	
    function set_maximo($valor){
		$this->maximo = $valor;
	}

    function set_id_marca($valor){
		$this->id_marca = $valor;
	}
	
	function set_id_categoria($valor){
		$this->id_categoria = $valor;
	}

	//ahora la misma cosa pero para get
	
	function get_codigo(){
		return $this->codigo;
	}
	
	function get_nombre(){
		return $this->nombre;
	}
	
	function get_cantidad_total(){
		return $this->cantidad_total;
	}

	function get_minimo(){
		return $this->minimo;
	}

    function get_maximo(){
		return $this->maximo;
	}

    function get_id_marca(){
		return $this->id_marca;
	}

	function get_id_categoria(){
		return $this->id_categoria;
	}

	
	

	// metodos para incluir, consultar y eliminar
	
	function incluir(){
	
		// se consulta en este caso codigo, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		
		if(!$this->existe($this->codigo)){
			//codigo no existe es decir se puede incluir
			//funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//ejecuta el sql
			$r = array();
			try {
				
				$p = $co->prepare("Insert into producto(
					codigo,
					nombre,
					cantidad_total,
					minimo,
					maximo,
					id_marca,
					id_categoria
					)
					Values(
					:codigo,
					:nombre,
					:cantidad_total,
					:minimo,
					:maximo,
					:id_marca,
					:id_categoria
					)");

					$p->bindParam(':codigo',$this->codigo);		
					$p->bindParam(':nombre',$this->nombre);
					$p->bindParam(':cantidad_total',$this->cantidad_total);
					$p->bindParam(':minimo',$this->minimo);
					$p->bindParam(':maximo',$this->maximo);
					$p->bindParam(':id_marca',$this->id_marca);
					$p->bindParam(':id_categoria',$this->id_categoria);
					
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
		$r['mensaje'] =  'Ya existe';
	}
	return $r;

	}
	
	function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->codigo)){
			try {
				$p = $co->prepare("Update producto set 
				codigo = :codigo,
				nombre = :nombre,
				catidad_total = :catidad_total,
				minimo = :minimo,
				maximo = :maximo,
				id_marca = :id_marca,
				id_categoria = :id_categoria
				where
				codigo = :codigo
						");

					$p->bindParam(':codigo',$this->codigo);		
					$p->bindParam(':nombre',$this->nombre);
					$p->bindParam(':cantidad_total',$this->cantidad_total);
					$p->bindParam(':minimo',$this->minimo);
                    $p->bindParam(':maximo',$this->maximo);
					$p->bindParam(':id_marca',$this->id_marca);
					$p->bindParam(':id_categoria',$this->id_categoria);
					
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
				$r['mensaje'] =  'No existe el codigo';
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
							$respuesta = $respuesta.$r['cantidad_total'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['minimo'];
						$respuesta = $respuesta."</td>";
                        $respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['maximo'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
						$respuesta = $respuesta.$r['id_marca'];
					$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."<td>";
					$respuesta = $respuesta.$r['id_categoria'];
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


	function listadomarca(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from marca");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocamarca(this);'>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['id_marca'];
						$respuesta = $respuesta."</td>";
						$respuesta = $respuesta."<td>";
							$respuesta = $respuesta.$r['descripcion_marca'];
						$respuesta = $respuesta."</td>";
					$respuesta = $respuesta."</tr>";
				}
			}
				$r['resultado'] = 'listadoMarca';
			    $r['mensaje'] =  $respuesta;
			    
			
			
		}catch(Exception $e){
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
			return $r;
	}

	function listadocategoria(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try{
			
			$resultado = $co->query("Select * from categoria");
			
			if($resultado){
				
				$respuesta = '';
				foreach($resultado as $r){
					$respuesta = $respuesta."<tr style='cursor:pointer' onclick='colocacategoria(this);'>";
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
			}
				$r['resultado'] = 'listadoCategoria';
			    $r['mensaje'] =  $respuesta;
			    
			
			
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