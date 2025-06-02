<?php
//llamda al archivo que contiene la clase
//datos, en ella esta guardada en la carpeta id_marca
//para enlazar a la base de datos
if (!class_exists('Datos2')) {
  require_once(__DIR__ . '/datos2.php');
}

//Aqui declare la clase Marca que hereda de la clase datos
//la herencia se declara con la palabra extends y no es mas 
//que decirle a esta clase que puede usar los mismos metodos
//que estan en la clase de donde hereda (El padre) que en este
//caso el padre es la clase datos en (datos.php) como si fueran de el

class bitacora extends Datos2
{
	//declaré los atributos (variables) que describen la clase
	//para colocar los inputs del archivo (controles) de
	//la vista como variables
	//cada atributo debe ser privado, es decir, ser visible solo dentro de la
	//misma clase, la forma de colcocarlo en privado es usando la palabra private

	//Aqui coloque los inputs de la vista en private
	private $id_bitacora; //recordatorio que en php, las variables no tienen tipo predefinido
	private $usuario;
	private $modulo;
	private $accion;
	private $fecha;

	//Ok ya puesto los atributos, pero ahora como son privados no podemos acceder a ellos
	//desde afuera por lo que debemos colocar metodos (funciones)
	//que me permitan leer (get) y colocar (set) valores en ello

	function set_id_bitacora($valor)
	{
		$this->id_bitacora = $valor; //este es como se accede a los elementos dentro de una clase
		//this singnifica (esto), es decir, esta clase luego se usa el simbolo ( -> )
		// que indica que apunte a un elemento de this, osea esta clase
		//luego el marca el elemento sin el simbolo ($)
	}
	//lo mismo que se hizo para id_marca se hace para marca

	function set_usuario($valor)
	{
		$this->usuario = $valor;
	}

	function set_modulo($valor)
	{
		$this->modulo = $valor;
	}

	function set_accion($valor)
	{
		$this->accion = $valor;
	}

	function set_fecha($valor)
	{
		$this->fecha = $valor;
	}

	//ahora el mismo procedimiento pero para leer, es decir (get)

	function get_id_bitacora()
	{
		return $this->id_bitacora;
	}

	function get_usuario()
	{
		return $this->usuario;
	}

	function get_modulo()
	{
		return $this->modulo;
	}

	function get_accion()
	{
		return $this->accion;
	}

	function get_fecha()
	{
		return $this->fecha;
	}


	//Lo siguiente son los metodos para registrar, listar, mostrar incluir y consultar
	//comprueba que existen registros en la bitacora
	private function existe($id_bitacora)
	{
		$co = $this->conectarBitacora();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("SELECT id_bitacora AS id, usuario, modulo, accion, fecha FROM bitacora ORDER BY id_bitacora DESC");

			$fila = $resultado->fetchAll(PDO::FETCH_BOTH);
			if ($fila) {

				return true;
			} else {

				return false;
			}
		} catch (Exception $e) {
			return false;
		}
	}

	//este metodo es para incluir un registro en la bitacora
	function incluir()
	{
		//ya hecho la base de datos y la funcion conecta dentro de la clase
		//datos, ahora hay que ejecutar las operaciones para realizar las consultas 
		//Lo primero que hay que hacer es consultar por el campo id_marca
		//en este caso la de id_marca, para ello se creo la funcion existe
		//que retorna true en caso de exitir el registro

		if (!$this->existe($this->id_bitacora)) {
			//como id_bitacora no existe, es decir, se puede incluir
			//los pasos ahora son
			//1) Se llama a la función conecta 
			$co = $this->conectarBitacora();
			$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//2) Se ejecuta el sql
			$r = array();
			try {
				$p = $co->prepare("Insert into bitacora(
						usuario,
						modulo,
						accion,
						fecha
						)
						Values(
						:usuario,
						:modulo,
						:accion,
						:fecha
						)");
				$p->bindParam(':usuario', $this->usuario);
				$p->bindParam(':modulo', $this->modulo);
				$p->bindParam(':accion', $this->accion);
				$p->bindParam(':fecha', $this->fecha);

				$p->execute();

				$r['resultado'] = 'incluir';
				$r['mensaje'] =  'Registrado en la Bitacora';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'incluir';
			$r['mensaje'] =  'Ya existe en la bitacora';
		}

		//ya realizado la función incluir este metodo se repite para el resto 
		//de las operaciones como son, Consultar, Modificar y Eliminar
		//solo cambia para buscar 
		return $r;
	}

	function modificar()
	{
		$co = $this->conectarBitacora();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->id_bitacora)) {
			try {
				$p = $co->prepare("Update bitacora set 
						usuario = :usuario,
						modulo = :modulo,
						accion = :accion,
						fecha = :fecha
						where
						id_bitacora = :id_bitacora
						");
				$p->bindParam(':id_bitacora', $this->id_bitacora);
				$p->bindParam(':usuario', $this->usuario);
				$p->bindParam(':modulo', $this->modulo);
				$p->bindParam(':accion', $this->accion);
				$p->bindParam(':fecha', $this->fecha);
				$p->execute();

				$r['resultado'] = 'modificar';
				$r['mensaje'] =  'Bitacora Modificada';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'No existe en la bitacora';
		}
		return $r;
	}

	function eliminar()
	{
		$co = $this->conectarBitacora();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->id_bitacora)) {
			try {
				$p = $co->prepare("Update bitacora set 
				id_bitacora = 0
				where
				id_bitacora = :id_bitacora
				");

				$p->bindParam(':id_bitacora', $this->id_bitacora);
				$p->execute();

				$r['resultado'] = 'eliminar';
				$r['mensaje'] =  'Bitacora eliminada';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe la id en la Bitacora';
		}
		return $r;
	}

	function restaurar()
	{
		$co = $this->conectarBitacora();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->id_bitacora)) {
			$resultado = $co->query("SELECT id_bitacora AS id, usuario, modulo, accion, fecha FROM bitacora ORDER BY id_bitacora DESC");
			$respuesta = 0;
			foreach ($resultado as $r) {
				$respuesta = $r['id_bitacora'];
			}

			if ($respuesta) {
				$r['resultado'] = 'restaurar';
				$r['mensaje'] =  'La bitacora no esta eliminada';
			} else {
				try {
					$p = $co->prepare("Update bitacora set 
				estado_registro = 1
				where
				id_bitacora = :id_bitacora
				");

					$p->bindParam(':id_bitacora', $this->id_bitacora);
					$p->execute();

					$r['resultado'] = 'restaurar';
					$r['mensaje'] =  'Bitacora Restaurada';
				} catch (Exception $e) {
					$r['resultado'] = 'error';
					$r['mensaje'] =  $e->getMessage();
				}
			}
		} else {
			$r['resultado'] = 'restaurar';
			$r['mensaje'] =  'No existe el Codigo de la Bitacora';
		}

		return $r;
	}

	function consultar()
	{
    $co = $this->conectarBitacora();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $r = array();
    try {
        // Construir consulta base
		$sql = "SELECT id_bitacora AS id, usuario, modulo, accion, fecha FROM bitacora ORDER BY id_bitacora DESC";

        // Agregar condición por ID si está establecido
        if (!empty($this->id_bitacora)) {
            $sql .= " AND id_bitacora = :id_bitacora";
        }
        
        // Agregar condiciones por fecha si están establecidas
        if (!empty($this->fecha)) {
            // Asume que $this->fecha contiene la condición de fecha
            $sql .= " AND DATE(fecha) = :fecha";
        }
        
        // Preparar consulta
        $p = $co->prepare($sql);
        
        // Bind parameters
        if (!empty($this->id_bitacora)) {
            $p->bindParam(':id_bitacora', $this->id_bitacora);
        }
        if (!empty($this->fecha)) {
            $p->bindParam(':fecha', $this->fecha);
        }
        
        // Ejecutar consulta
        $p->execute();
        
        // Obtener resultados
        $datos = $p->fetchAll(PDO::FETCH_ASSOC);
        
        $r['resultado'] = 'exito';
        $r['datos'] = $datos;
    } catch (Exception $e) {
        $r['resultado'] = 'error';
        $r['mensaje'] = $e->getMessage();
    }
    
    return $r;
	}

	function consultadelete()
	{
		$co = $this->conectarBitacora();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array(); // en este arreglo
		// se enviara la respuesta a la solicitud y el
		// contenido de la respuesta
		try {
			$resultado = $co->query("SELECT * from bitacora WHERE id_bitacora = 0");
			$respuesta = '';
			if ($resultado) {
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr style='cursor:pointer' onclick='coloca(this);'>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['id_bitacora'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['usuario'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['modulo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['accion'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['fecha'];
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

	function consultatr()
	{
		$co = $this->conectarBitacora();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("SELECT id_bitacora AS id, usuario, modulo, accion, fecha FROM bitacora ORDER BY id_bitacora DESC");
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