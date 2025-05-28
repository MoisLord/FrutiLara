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
	private $hora;

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

	function set_hora($valor)
	{
		$this->hora = $valor;
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

	function get_hora()
	{
		return $this->hora;
	}

	//Lo siguiente son los metodos para registrar, incluir y consultar
	function registrarAccion($accion, $modulo = '')
{
    // Configurar los valores según la acción
    $this->accion = $accion;
    $this->modulo = $modulo ?: 'Sistema'; // Si no se especifica módulo, usar 'Sistema'
    
    // Obtener fecha y hora actual
    $this->fecha = date('Y-m-d');
    $this->hora = date('H:i:s');
    
    // Conectar a la base de datos
    $co = $this->conectarBitacora();
    $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $r = array();
    try {
        $p = $co->prepare("INSERT INTO bitacora(
                usuario,
                modulo,
                accion,
                fecha,
                hora
                )
                VALUES(
                :usuario,
                :modulo,
                :accion,
                :fecha,
                :hora
                )");
        $p->bindParam(':usuario', $this->usuario);
        $p->bindParam(':modulo', $this->modulo);
        $p->bindParam(':accion', $this->accion);
        $p->bindParam(':fecha', $this->fecha);
        $p->bindParam(':hora', $this->hora);

        $p->execute();

        $r['resultado'] = 'exito';
        $r['mensaje'] = 'Acción registrada en la bitácora';
    } catch (Exception $e) {
        $r['resultado'] = 'error';
        $r['mensaje'] = $e->getMessage();
    }
    
    return $r;
}


	function consultar()
	{
		$co = $this->conectarBitacora();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("SELECT * from bitacora WHERE id_bitacora = 1");

			if ($resultado) {

				$respuesta = '';
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
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['hora'];
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
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['hora'];
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

	function existe($id_bitacora)
	{
		$co = $this->conectarBitacora();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("Select * from bitacora where id_bitacora='$id_bitacora'");


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
		$co = $this->conectarBitacora();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("Select * from bitacora where id_bitacora='$this->id_bitacora'");
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