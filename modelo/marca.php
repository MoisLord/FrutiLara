<?php
//llamda al archivo que contiene la clase
//datos, en ella esta guardada en la carpeta id_marca
//para enlazar a la base de datos
require_once('modelo/datos.php');

//Aqui declare la clase Marca que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas 
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de donde hereda (El padre) que en este
//caso el padre es la clase datos en (datos.php) como si fueran de el

class marca extends datos
{
	//declaré los atributos (variables) que describen la clase
	//para colocar los inputs del archivo (controles) de
	//la vista como variables
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcocarlo en privado es usando la palabra private

	//Aqui coloque los inputs de la vista en private
	private $id_marca; //recordatorio que en php, las variables no tienen tipo predefinido
	private $descripcion_marca;
	private $estado_registro;

	//Ok ya puesto los atributos, pero ahora como son privados no podemos acceder a ellos
	//desde afuera por lo que debemos colocar metodos (funciones)
	//que me permitan leer (get) y colocar (set) valores en ello

	function set_id_marca($valor)
	{
		$this->id_marca = $valor; //este es como se accede a los elementos dentro de una clase
		//this singnifica (esto), es decir, esta clase luego se usa el simbolo ( -> )
		// que indica que apunte a un elemento de this, osea esta clase
		//luego el marca el elemento sin el simbolo ($)
	}
	//lo mismo que se hizo para id_marca se hace para marca

	function set_descripcion_marca($valor)
	{
		$this->descripcion_marca = $valor;
	}

	function set_estado_registro($valor)
	{
		$this->estado_registro = $valor;
	}

	//ahora el mismo procedimiento pero para leer, es decir (get)

	function get_id_marca()
	{
		return $this->id_marca;
	}

	function get_descripcion_marca()
	{
		return $this->descripcion_marca;
	}

	function get_estado_registro()
	{
		return $this->estado_registro;
	}

	//Lo siguiente que demos hacer es crear los metodos para incluir, consultar, modificar y eliminar

	function incluir()
	{
		//ya hecho la base de datos y la funcion conecta dentro de la clase
		//datos, ahora hay que ejecutar las operaciones para realizar las consultas 

		//Lo primero que hay que hacer es consultar por el campo id_marca
		//en este caso la de id_marca, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro

		if (!$this->existe($this->id_marca)) {
			//como id_marca no existe, es decir, se puede incluir
			//los pasos ahora son
			//1) Se llama a la función conecta 
			$co = $this->conecta();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2) Se ejecuta el sql
			$r = array();
			try {
				$p = $co->prepare("Insert into marca(
						codigo_marca,
						descripcion_marca,
						estado_registro
						)
						Values(
						:codigo_marca,
						:descripcion_marca,
						:estado_registro
						)");
				$p->bindParam(':codigo_marca', $this->id_marca);
				$p->bindParam(':descripcion_marca', $this->descripcion_marca);
				$p->bindParam(':estado_registro', $this->estado_registro);

				$p->execute();

				$r['resultado'] = 'incluir';
				$r['mensaje'] =  'Marca ha sido registrado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe la marca';
		}

		//ya realizado la función incluir este metodo se repite para el resto 
		//de las operaciones como son, Consultar, Modificar y Eliminar
		//solo cambia para buscar 
		return $r;
	}

	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->id_marca)) {
			try {
				$p = $co->prepare("Update marca set 
						descripcion_marca = :descripcion_marca,
						estado_registro = :estado_registro
						where
						codigo_marca = :codigo_marca
						");
				$p->bindParam(':codigo_marca', $this->id_marca);
				$p->bindParam(':descripcion_marca', $this->descripcion_marca);
				$p->bindParam(':estado_registro', $this->estado_registro);
				$p->execute();

				$r['resultado'] = 'modificar';
				$r['mensaje'] =  'Marca Modificada';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'No existe la marca';
		}
		return $r;
	}

	function eliminar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		// if($this->existe($this->id_marca)){
		// 	try {
		// 			$p = $co->prepare("delete from marca
		// 			    where
		// 				codigo_marca = :codigo_marca
		// 				");
		// 			$p->bindParam(':codigo_marca',$this->id_marca);		


		// 			$p->execute();
		// 			$r['resultado'] = 'eliminar';
		// 	        $r['mensaje'] =  'Marca Eliminada';
		// 	} catch(Exception $e) {
		// 		$r['resultado'] = 'error';
		// 	    $r['mensaje'] =  $e->getMessage();
		// 	}
		// }
		// else{
		// 	$r['resultado'] = 'eliminar';
		// 	$r['mensaje'] =  'No existe la marca';
		// }
		// return $r;
		if ($this->existe($this->id_marca)) {
			try {
				$p = $co->prepare("Update marca set 
				estado_registro = 0
				where
				codigo_marca = :codigo_marca
				");

				$p->bindParam(':codigo_marca', $this->id_marca);
				$p->execute();

				$r['resultado'] = 'eliminar';
				$r['mensaje'] =  'Marca eliminada';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe el Codigo de la Marca';
		}
		return $r;
	}

	function restaurar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->id_marca)) {
			$resultado = $co->query("SELECT estado_registro FROM marca WHERE codigo_marca = " . $this->id_marca . "");

			$respuesta = 0;
			foreach ($resultado as $r) {
				$respuesta = $r['estado_registro'];
			}

			if ($respuesta) {
				$r['resultado'] = 'restaurar';
				$r['mensaje'] =  'La marca no esta eliminada';
			} else {
				try {
					$p = $co->prepare("Update marca set 
				estado_registro = 1
				where
				codigo_marca = :codigo_marca
				");

					$p->bindParam(':codigo_marca', $this->id_marca);
					$p->execute();

					$r['resultado'] = 'restaurar';
					$r['mensaje'] =  'Marca Restaurada';
				} catch (Exception $e) {
					$r['resultado'] = 'error';
					$r['mensaje'] =  $e->getMessage();
				}
			}
		} else {
			$r['resultado'] = 'restaurar';
			$r['mensaje'] =  'No existe el Codigo de la Marca';
		}

		return $r;
	}

	function consultar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("SELECT * from marca WHERE estado_registro = 1");

			if ($resultado) {

				$respuesta = '';
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr style='cursor:pointer' onclick='coloca(this);'>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['codigo_marca'];
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
			$resultado = $co->query("SELECT * from marca WHERE marca.estado_registro = 0");
			$respuesta = '';
			if ($resultado) {
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr style='cursor:pointer' onclick='coloca(this);'>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['codigo_marca'];
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

	private function existe($id_marca)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("Select * from marca where codigo_marca='$id_marca'");


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

			$resultado = $co->query("Select * from marca where codigo_marca='$this->id_marca'");
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
