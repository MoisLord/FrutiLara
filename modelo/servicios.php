<?php
/*La linea de codigo numero 3, llama una vez el archivo datos.php ubicado en la carpeta modelo  del mvc*/ 
require_once('modelo/datos.php');

/*Declaración de la clase proveedor en la cual hereda clase datos (La conexion de la base de datos)
Claramente lo hereda con la palabra "Extends"*/ 
class servicios extends datos{
	
	/*Dentro de la clases proveedor 
	se declara atributos con modificadores de acceso de tipo private en la cual estarán  predefinido
*/
	private $codigo_servicio;
	private $descripcion_servicio; 
	private $estado_registro;
	//Ok ya tenemos los atributos, pero como son privados no podemos acceder a ellos desde fueran
	//por lo que debemos colcoar metodos (funciones) que me permitan leer (get) y colocar (set)
	//valores en ello, esto es  muy mal llamado geters y seters por si alguien se los pregunta
	/*Una vez declarado los atributos falta colocar los metodos getter(leer) y setter(colocar) ya que esos atributos private(No podemos acceder
	esos atributos desde fuera)para acceder a ellas el metodo set tomara parametro de una varaiable en caso el getter retornara*/ 
	function set_codigo_servicio($valor){
		$this->codigo_servicio = $valor; 
	}
	function set_descripcion_servicio($valor){
		$this->descripcion_servicio = $valor; 
	}

	function set_estado_registro($valor)
	{
		$this->estado_registro = $valor;
	}
	
	function get_codigo_servicio(){
		return $this->codigo_servicio;
	}
	function get_descripcion_servicio(){
		return $this->descripcion_servicio;
	}
	function get_estado_registro()
	{
		return $this->estado_registro;
	}
	function set_incluir() {
		return $this->incluir(); // Retorna el resultado de incluir()
	}
	
	function set_modificar() {
		return $this->modificar(); // Retorna el resultado de modificar()
	}
	function set_eliminar() {
		return $this->eliminar(); // Retorna el resultado de eliminar()
	}
	function set_restaurar(){
		return $this->restaurar(); // Retorna el resultado de restaurar()
	}
	function set_consultadelete(){
		return $this->consultadelete(); // Retorna el resultado de consultadelete()
	}
	function set_consultatr(){
		return $this->consultatr(); // Retorna el resultado de consultr()
	}
	function set_consultar(){
		return $this->consultar(); // Retorna el resultado de consultar()
	}
	
	private function incluir(){
		
		
		//Lo primero que debemos hacer es consultar por el campo clave
		//en este caso la cedula, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro
		
		if(!$this->existe($this->codigo_servicio)){
			//si estamos aca es porque la cedula no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
            $r = array();
			try {
				
					$p = $co->prepare("insert into servicios(
						codigo_servicio,
						descripcion_servicio,
						estado_registro
						)
						values(
						:codigo_servicio,
						:descripcion_servicio,
						:estado_registro
						)");
						$codigo_servicio = htmlspecialchars($this->codigo_servicio);
						$descripcion_servicio = htmlspecialchars($this->descripcion_servicio);
						$estado_registro = htmlspecialchars($this->estado_registro);

					$p->bindParam(':codigo_servicio',$codigo_servicio);	
					$p->bindParam(':descripcion_servicio',$descripcion_servicio);	//Esta funcion bindparam() vinculara con una variable como una referencia
					$p->bindParam(':estado_registro', $estado_registro);	
					
					$p->execute();
					
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'Servicio registrado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
			$this->cerrarConexion();
		}
		else{
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe el codigo';
		}
		
		//Listo eso es todo y es igual para el resto de las operaciones
		//incluir, modificar y eliminar
		//solo cambia para buscar 
		return $r;
		
	}
	
	private function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->codigo_servicio)){
			try {
				$p = $co->prepare("update servicios set
						descripcion_servicio = :descripcion_servicio,
						estado_registro = :estado_registro
						where
						codigo_servicio = :codigo_servicio
						");
						$codigo_servicio = htmlspecialchars($this->codigo_servicio);
						$descripcion_servicio = htmlspecialchars($this->descripcion_servicio);
						$estado_registro = htmlspecialchars($this->estado_registro);
					$p->bindParam(':codigo_servicio',$codigo_servicio);		
					$p->bindParam(':descripcion_servicio',$descripcion_servicio);
					$p->bindParam(':estado_registro', $estado_registro);	
					$p->execute();
					
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'El servicio ha sido Modificado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
			$this->cerrarConexion();
		}
		else{
			$r['resultado'] = 'modificar';
			    $r['mensaje'] =  'No existe el servicio';
		}
		return $r;
	}
	
	private function eliminar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		// if($this->existe($this->rif)){
		// 	try {
		// 			$p = $co->prepare("delete from proveedores 
		// 			    where
		// 				rif = :rif
		// 				");
		// 			$p->bindParam(':rif',$this->rif);		
					
					
		// 			$p->execute();
		// 			$r['resultado'] = 'eliminar';
		// 	        $r['mensaje'] =  'El proveedor ha sido Eliminado';
		// 	} catch(Exception $e) {
		// 		$r['resultado'] = 'error';
		// 	    $r['mensaje'] =  $e->getMessage();
		// 	}
		// }
		// else{
		// 	$r['resultado'] = 'eliminar';
		// 	$r['mensaje'] =  'No existe el rif';
		// }
		// return $r;
		if ($this->existe($this->codigo_servicio)) {
			try {
				$p = $co->prepare("Update servicios set 
				estado_registro = 0
				where
				codigo_servicio = :codigo_servicio
				");
				$codigo_servicio = htmlspecialchars($this->codigo_servicio);
				$p->bindParam(':codigo_servicio', $codigo_servicio);
				$p->execute();

				$r['resultado'] = 'eliminar';
				$r['mensaje'] =  'El servicio ha sido Eliminado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
			$this->cerrarConexion();
		} else {
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe el codigo';
		}
		return $r;

	}
	
	private function restaurar() {
		$co = $this->conecta();
		$resultado = array();
	
		if ($this->existe($this->codigo_servicio)) {
			try {
				// Consulta segura utilizando prepared statements
				$p = $co->prepare("SELECT estado_registro FROM servicios WHERE codigo_servicio = :codigo_servicio");
				$codigo_servicio = htmlspecialchars($this->codigo_servicio);
				$p->bindParam(':codigo_servicio', $codigo_servicio, PDO::PARAM_STR);
				$p->execute();
				$respuesta = $p->fetchColumn(); // Obtener el estado directamente
	
				if ($respuesta == 1) {
					$resultado['resultado'] = 'restaurar';
					$resultado['mensaje'] = 'El servicio no está eliminado';
				} else {
					$p = $co->prepare("UPDATE servicios SET estado_registro = 1 WHERE codigo_servicio = :codigo_servicio");
					$p->bindParam(':codigo_servicio', $codigo_servicio, PDO::PARAM_STR);
					$p->execute();
	
					$resultado['resultado'] = 'restaurar';
					$resultado['mensaje'] = 'El servicio ha sido restaurado';
				}
	
			} catch (Exception $e) {
				$resultado['resultado'] = 'error';
				$resultado['mensaje'] = $e->getMessage();
			}
	
			// Cerramos la conexión manualmente
			$this->cerrarConexion();
	
		} else {
			$resultado['resultado'] = 'error';
			$resultado['mensaje'] = 'No existe el codigo';
		}
	
		return $resultado;
	}
	
	private function consultar() {
		$co = $this->conecta();
		$resultado = array();
	
		try {
			// Consulta con prepared statement para evitar SQL Injection
			$p = $co->prepare("SELECT codigo_servicio, descripcion_servicio FROM servicios WHERE estado_registro = 1");
			$p->execute();
			$servicios = $p->fetchAll(PDO::FETCH_ASSOC);
	
			if ($servicios) {
				$respuesta = '';
				foreach ($servicios as $r) {
					$respuesta .= "<tr style='cursor:pointer' onclick='coloca(this);'>";
					$respuesta .= "<td>{$r['codigo_servicio']}</td>";
					$respuesta .= "<td>{$r['descripcion_servicio']}</td>";
					$respuesta .= "</tr>";
				}
	
				$resultado['resultado'] = 'consultar';
				$resultado['mensaje'] = $respuesta;
			} else {
				$resultado['resultado'] = 'error';
				$resultado['mensaje'] = 'No hay servicios activos';
			}
	
		} catch (Exception $e) {
			$resultado['resultado'] = 'error';
			$resultado['mensaje'] = $e->getMessage();
		}
	
		// Cerrar la conexión para liberar recursos
		$this->cerrarConexion();
	
		return $resultado;
	}
	
	
	private function consultadelete(){
		$co = $this->conecta();
		$resultado = array();
	
		try {
			// Consulta segura utilizando prepared statements
			$p = $co->prepare("SELECT codigo_servicio, descripcion_servicio FROM servicios WHERE estado_registro = 0");
			$p->execute();
			$servicios = $p->fetchAll(PDO::FETCH_ASSOC);
	
			if ($servicios) {
				$respuesta = '';
				foreach ($servicios as $r) {
					$respuesta .= "<tr style='cursor:pointer' onclick='coloca(this);'>";
					$respuesta .= "<td>{$r['codigo_servicio']}</td>";
					$respuesta .= "<td>{$r['descripcion_servicio']}</td>";

					$respuesta .= "</tr>";
				}
	
				$resultado['resultado'] = 'consultaDelete';
				$resultado['mensaje'] = $respuesta;
			}
	
		} catch (Exception $e) {
			$resultado['resultado'] = 'error';
			$resultado['mensaje'] = $e->getMessage();
		}
	
		// Cerrar la conexión para liberar recursos
		$this->cerrarConexion();
	
		return $resultado;
	}
	
	
	private function existe($codigo_servicio) {
		$co = $this->conecta();
	
		try {
			// Sanitizamos el rif antes de usarlo en la consulta
			$codigo_servicio = htmlspecialchars($codigo_servicio);
			
			// Consulta preparada para evitar inyección SQL
			$p = $co->prepare("SELECT COUNT(*) FROM proveedores WHERE codigo_servicio = :codigo_servicio");
			$p->bindParam(':codigo_servicio', $codigo_servicio, PDO::PARAM_STR);
			$p->execute();
			
			// Si hay al menos un registro, retorna true
			$existe = $p->fetchColumn() > 0;
	
		} catch (Exception $e) {
			$existe = false;
		}
	
		// Cerramos la conexión manualmente
		$this->cerrarConexion();
	
		return $existe;
	}
	
	
	private function consultatr() {
		$co = $this->conecta();
		$resultado = array();
	
		try {
			// Sanitizamos el rif antes de usarlo en la consulta
			$codigo_servicio = htmlspecialchars($this->codigo_servicio);
			
			// Consulta preparada para mayor seguridad
			$p = $co->prepare("SELECT * FROM servicios WHERE codigo_servicio = :codigo_servicio");
			$p->bindParam(':codigo_servicio', $codigo_servicio, PDO::PARAM_STR);
			$p->execute();
			
			$fila = $p->fetchAll(PDO::FETCH_ASSOC); // Obtiene los datos en formato asociativo
			
			if ($fila) {
				$resultado['resultado'] = 'encontro';
				$resultado['mensaje'] = $fila; // Retorna el array de datos
			} else {
				$resultado['resultado'] = 'noencontro';
				$resultado['mensaje'] = 'No se encontró el servicio';
			}
	
		} catch (Exception $e) {
			$resultado['resultado'] = 'error';
			$resultado['mensaje'] = $e->getMessage();
		}
	
		// Cerramos la conexión manualmente
		$this->cerrarConexion();
	
		return $resultado;
	}
	
}
?>