<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a la base de datos
require_once('modelo/datos.php');

// se declara la clase modelo que hereda de datos

class modelo extends datos
{

	// se declaran como atributos privados

	private $id_modelo; // las variables no tienen tipo predefinido
	private $descripcion_modelo;
	private $id_marca;
	private $estado_registro;
	// se colocan metodo (Que serian funciones) seria get o set

	function set_id_modelo($valor)
	{
		$this->id_modelo = $valor;
	}

	// estamos usando un metodo por set y se usa para la clase id_modelo que seria el this
	//lo mismo que se hizo para id_modelo se hace para el resto

	function set_descripcion_modelo($valor)
	{
		$this->descripcion_modelo = $valor;
	}

	function set_id_marca($valor)
	{
		$this->id_marca = $valor;
	}

	function set_estado_registro($valor)
	{
		$this->estado_registro = $valor;
	}


	//ahora la misma cosa pero para get
	function get_id_modelo()
	{
		return $this->id_modelo;
	}

	function get_descripcion_modelo()
	{
		return $this->descripcion_modelo;
	}

	function get_id_marca()
	{
		return $this->id_marca;
	}

	function get_estado_registro()
	{
		return $this->estado_registro;
	}

	// metodos para incluir, consultar y eliminar

	function incluir()
	{
		// se consulta en este caso id_modelo, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro

		if (!$this->existe($this->id_modelo)) {
			//id_modelo no existe es decir se puede incluir
			//funcion conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//ejecuta el sql
			$r = array();
			try {

				$p = $co->prepare("Insert into modelo(
						codigo_modelo,
						descripcion_modelo,
						id_marca,
						estado_registro
						)
						Values(
						:codigo_modelo,
						:descripcion_modelo,
						:id_marca,
						:estado_registro
						)");
				$p->bindParam(':codigo_modelo', $this->id_modelo);
				$p->bindParam(':descripcion_modelo', $this->descripcion_modelo);
				$p->bindParam(':id_marca', $this->id_marca);
				$p->bindParam(':estado_registro', $this->estado_registro);

				$p->execute();

				$r['resultado'] = 'incluir';
				$r['mensaje'] =  'El modelo ha sido Incluido';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la id_modelo';
		}

		return $r;
	}

	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->id_modelo)) {
			try {
				$p = $co->prepare("Update modelo set 
						descripcion_modelo = :descripcion_modelo,
						id_marca = :id_marca,
						estado_registro = :estado_registro
						where
						codigo_modelo = :codigo_modelo
						");
				$p->bindParam(':codigo_modelo', $this->id_modelo);
				$p->bindParam(':descripcion_modelo', $this->descripcion_modelo);
				$p->bindParam(':id_marca', $this->id_marca);
				$p->bindParam(':estado_registro', $this->estado_registro);

				$p->execute();

				$r['resultado'] = 'modificar';
				$r['mensaje'] =  'El modelo ha sido Modificado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'No existe el modelo';
		}
		return $r;
	}

	function eliminar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		// if ($this->existe($this->id_modelo)) {
		// 	try {
		// 		$p = $co->prepare("delete from modelo 
		// 			    where
		// 				codigo_modelo = :codigo_modelo
		// 				");
		// 		$p->bindParam(':codigo_modelo', $this->id_modelo);


		// 		$p->execute();
		// 		$r['resultado'] = 'eliminar';
		// 		$r['mensaje'] =  'El modelo ha sido Eliminado';
		// 	} catch (Exception $e) {
		// 		$r['resultado'] = 'error';
		// 		$r['mensaje'] =  $e->getMessage();
		// 	}
		// } else {
		// 	$r['resultado'] = 'eliminar';
		// 	$r['mensaje'] =  'No existe la id_modelo';
		// }
		// return $r;
		if ($this->existe($this->id_modelo)) {
			try {
				$p = $co->prepare("Update modelo set 
				estado_registro = 0
				where
				codigo_modelo = :codigo_modelo
				");

				$p->bindParam(':codigo_modelo', $this->id_modelo);
				$p->execute();

				$r['resultado'] = 'eliminar';
				$r['mensaje'] =  'Modelo eliminado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe el Codigo del Modelo';
		}
		return $r;
	}

	function restaurar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->id_modelo)) {
			$resultado = $co->query("SELECT estado_registro FROM modelo WHERE codigo_modelo = " . $this->id_modelo . "");

			$respuesta = 0;
			foreach ($resultado as $r) {
				$respuesta = $r['estado_registro'];
			}

			if($respuesta) {
				$r['resultado'] = 'restaurar';
				$r['mensaje'] =  'El modelo no esta eliminado';
			} else {
			try {
				$p = $co->prepare("Update modelo set 
				estado_registro = 1
				where
				codigo_modelo = :codigo_modelo
				");

				$p->bindParam(':codigo_modelo', $this->id_modelo);
				$p->execute();

				$r['resultado'] = 'restaurar';
				$r['mensaje'] =  'Modelo restaurado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		}
		
		} else {
			$r['resultado'] = 'restaurar';
			$r['mensaje'] =  'No existe el Codigo del Modelo';
		}
		return $r;
	}


	function consultar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("SELECT codigo_modelo, descripcion_modelo, modelo.id_marca, marca.descripcion_marca FROM modelo INNER JOIN marca ON modelo.id_marca=marca.id_marca WHERE modelo.estado_registro = 1");

			if ($resultado) {

				$respuesta = '';
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr style='cursor:pointer' onclick='coloca(this);'>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['codigo_modelo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['descripcion_modelo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td style='display:none;'>";
					$respuesta = $respuesta . $r['id_marca'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['descripcion_marca'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "</tr>";

					$r['resultado'] = 'consultar';
					$r['mensaje'] =  $respuesta;
					
			}
			
			return $r;

			} else {
				return '';
			}
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}

	function consultadelete()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array(); // en este arreglo
		// se enviara la respuesta a la solicitud y el
		// contenido de la respuesta
		try {
			$resultado = $co->query("SELECT codigo_modelo, descripcion_modelo, modelo.id_marca, marca.descripcion_marca FROM modelo INNER JOIN marca ON modelo.id_marca=marca.id_marca WHERE modelo.estado_registro = 0");

			if ($resultado) {

				$respuesta = '';
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr style='cursor:pointer' onclick='coloca(this);'>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['codigo_modelo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['descripcion_modelo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td style='display:none;'>";
					$respuesta = $respuesta . $r['id_marca'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['descripcion_marca'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "</tr>";
				}
			}
			$r['resultado'] = 'consultaDelete';
			$r['mensaje'] =  $respuesta;
		} catch (Exception $e) {
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}

	function listadomarca()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array(); // en este arreglo
		// se enviara la respuesta a la solicitud y el
		// contenido de la respuesta
		try {
			$resultado = $co->query("SELECT * from marca WHERE marca.estado_registro = 1");
			$respuesta = '';
			if ($resultado) {
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr style='cursor:pointer' onclick='colocamarca(this);'>";
					$respuesta = $respuesta . "<td style='display:none;'>";
					$respuesta = $respuesta . $r['id_marca'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['codigo_marca'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['descripcion_marca'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "</tr>";
				}
			}
			$r['resultado'] = 'listadoMarca';
			$r['mensaje'] =  $respuesta;
		} catch (Exception $e) {
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}


	private function existe($id_modelo)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("Select * from modelo where codigo_modelo='$id_modelo'");


			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if ($fila) {

				return true;
			} else {

				return false;;
			}
		} catch (Exception $e) {
			return false;
		}
	}

	function consultatr()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("Select * from modelo where codigo_modelo='$this->id_modelo'");
			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if ($fila) {

				$r['resultado'] = 'encontro';
				$r['mensaje'] =  $fila;
			} else {

				$r['resultado'] = 'noencontro';
				$r['mensaje'] =  '';
			}
		} catch (Exception $e) {
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}
}
