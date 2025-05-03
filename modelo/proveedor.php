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
	private $estado_registro;
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
	function set_estado_registro($valor)
	{
		$this->estado_registro = $valor;
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
		
		if(!$this->existe($this->rif)){
			//si estamos aca es porque la cedula no existe es decir se puede incluir
			//los pasos a seguir son
			//1 Se llama a la funcion conecta 
			$co = $this->conecta();
            $resultado = array();
			try {
				
					$p = $co->prepare("insert into proveedores(
						rif,
						documento,
						nombre,
						telefono,
						direccion,
						estado_registro
						)
						values(
						:rif,
						:documento,
						:nombre,
						:telefono,
						:direccion,
						:estado_registro
						)");
						$rif = htmlspecialchars($this->rif);
						$documento = htmlspecialchars($this->document);
						$nombre = htmlspecialchars($this->Nombre);
						$telefono = htmlspecialchars($this->Telefono);
						$direccion = htmlspecialchars($this->direccion);
						$estado_registro = htmlspecialchars($this->estado_registro);

					$p->bindParam(':rif',$rif);	
					$p->bindParam(':documento',$documento);	//Esta funcion bindparam() vinculara con una variable como una referencia
					$p->bindParam(':nombre',$nombre);
					$p->bindParam(':telefono',$telefono);	
					$p->bindParam(':direccion',$direccion);
					$p->bindParam(':estado_registro', $estado_registro);	
					
					$p->execute();
					
						$r['resultado'] = 'incluir';
			            $r['mensaje'] =  'El Proveedor ha sido registrado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
			$this->cerrarConexion();
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
	
	private function modificar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if($this->existe($this->rif)){
			try {
				$p = $co->prepare("update proveedores set
						nombre = :nombre,
						documento= :documento,
						telefono = :telefono,
						direccion = :direccion,
						estado_registro = :estado_registro
						where
						rif = :rif
						");
						$rif = htmlspecialchars($this->rif);
						$documento = htmlspecialchars($this->document);
						$nombre = htmlspecialchars($this->Nombre);
						$telefono = htmlspecialchars($this->Telefono);
						$direccion = htmlspecialchars($this->direccion);
						$estado_registro = htmlspecialchars($this->estado_registro);
					$p->bindParam(':rif',$rif);		
					$p->bindParam(':documento',$documento);
					$p->bindParam(':nombre',$nombre);
					$p->bindParam(':telefono',$telefono);	
					$p->bindParam(':direccion',$direccion);
					$p->bindParam(':estado_registro', $estado_registro);	
					$p->execute();
					
						$r['resultado'] = 'modificar';
			            $r['mensaje'] =  'El proveedor ha sido Modificado';
			} catch(Exception $e) {
				$r['resultado'] = 'error';
			    $r['mensaje'] =  $e->getMessage();
			}
			$this->cerrarConexion();
		}
		else{
			$r['resultado'] = 'modificar';
			    $r['mensaje'] =  'No existe el rif';
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
		if ($this->existe($this->rif)) {
			try {
				$p = $co->prepare("Update proveedores set 
				estado_registro = 0
				where
				rif = :rif
				");
				$rif = htmlspecialchars($this->rif);
				$p->bindParam(':rif', $rif);
				$p->execute();

				$r['resultado'] = 'eliminar';
				$r['mensaje'] =  'El proveedor ha sido Eliminado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
			$this->cerrarConexion();
		} else {
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe el rif';
		}
		return $r;

	}
	
	private function restaurar() {
		$co = $this->conecta();
		$resultado = array();
	
		if ($this->existe($this->rif)) {
			try {
				// Consulta segura utilizando prepared statements
				$p = $co->prepare("SELECT estado_registro FROM proveedores WHERE rif = :rif");
				$rif = htmlspecialchars($this->rif);
				$p->bindParam(':rif', $rif, PDO::PARAM_STR);
				$p->execute();
				$respuesta = $p->fetchColumn(); // Obtener el estado directamente
	
				if ($respuesta == 1) {
					$resultado['resultado'] = 'restaurar';
					$resultado['mensaje'] = 'El proveedor no está eliminado';
				} else {
					$p = $co->prepare("UPDATE proveedores SET estado_registro = 1 WHERE rif = :rif");
					$p->bindParam(':rif', $rif, PDO::PARAM_STR);
					$p->execute();
	
					$resultado['resultado'] = 'restaurar';
					$resultado['mensaje'] = 'El proveedor ha sido restaurado';
				}
	
			} catch (Exception $e) {
				$resultado['resultado'] = 'error';
				$resultado['mensaje'] = $e->getMessage();
			}
	
			// Cerramos la conexión manualmente
			$this->cerrarConexion();
	
		} else {
			$resultado['resultado'] = 'error';
			$resultado['mensaje'] = 'No existe el rif';
		}
	
		return $resultado;
	}
	
	private function consultar() {
		$co = $this->conecta();
		$resultado = array();
	
		try {
			// Consulta con prepared statement para evitar SQL Injection
			$p = $co->prepare("SELECT documento, rif, nombre, telefono, direccion FROM proveedores WHERE estado_registro = 1");
			$p->execute();
			$proveedores = $p->fetchAll(PDO::FETCH_ASSOC);
	
			if ($proveedores) {
				$respuesta = '';
				foreach ($proveedores as $r) {
					$respuesta .= "<tr style='cursor:pointer' onclick='coloca(this);'>";
					$respuesta .= "<td>{$r['documento']}</td>";
					$respuesta .= "<td>{$r['rif']}</td>";
					$respuesta .= "<td>{$r['nombre']}</td>";
					$respuesta .= "<td>{$r['telefono']}</td>";
					$respuesta .= "<td>{$r['direccion']}</td>";
					$respuesta .= "</tr>";
				}
	
				$resultado['resultado'] = 'consultar';
				$resultado['mensaje'] = $respuesta;
			} else {
				$resultado['resultado'] = 'error';
				$resultado['mensaje'] = 'No hay proveedores activos';
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
			$p = $co->prepare("SELECT documento, rif, nombre, telefono, direccion FROM proveedores WHERE estado_registro = 0");
			$p->execute();
			$proveedores = $p->fetchAll(PDO::FETCH_ASSOC);
	
			if ($proveedores) {
				$respuesta = '';
				foreach ($proveedores as $r) {
					$respuesta .= "<tr style='cursor:pointer' onclick='coloca(this);'>";
					$respuesta .= "<td>{$r['documento']}</td>";
					$respuesta .= "<td>{$r['rif']}</td>";
					$respuesta .= "<td>{$r['nombre']}</td>";
					$respuesta .= "<td>{$r['telefono']}</td>";
					$respuesta .= "<td>{$r['direccion']}</td>";
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
	
	
	private function existe($rif) {
		$co = $this->conecta();
	
		try {
			// Sanitizamos el rif antes de usarlo en la consulta
			$rif = htmlspecialchars($rif);
			
			// Consulta preparada para evitar inyección SQL
			$p = $co->prepare("SELECT COUNT(*) FROM proveedores WHERE rif = :rif");
			$p->bindParam(':rif', $rif, PDO::PARAM_STR);
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
			$rif = htmlspecialchars($this->rif);
			
			// Consulta preparada para mayor seguridad
			$p = $co->prepare("SELECT * FROM proveedores WHERE rif = :rif");
			$p->bindParam(':rif', $rif, PDO::PARAM_STR);
			$p->execute();
			
			$fila = $p->fetchAll(PDO::FETCH_ASSOC); // Obtiene los datos en formato asociativo
			
			if ($fila) {
				$resultado['resultado'] = 'encontro';
				$resultado['mensaje'] = $fila; // Retorna el array de datos
			} else {
				$resultado['resultado'] = 'noencontro';
				$resultado['mensaje'] = 'No se encontró el proveedor';
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