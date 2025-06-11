<?php
//llamda al archivo que contiene la clase
//datos, en ella posteriormente se colcora el codigo
//para enlazar a la base de datos
require_once('modelo/datos.php');

// se declara la clase productosaj que hereda de datos
class productosaj extends datos {

// se declaran como atributos privados
private $codigo;
private $nombre;
private $cantidad_total;
private $nacionalidad_producto;
private $minimo;
private $maximo;
private $id_categoria;
private $marca_id_marca;
private $unidades_de_medida_id_medidas;
private $estado_registro;

function set_cantidad_total($valor)
{
	$this->cantidad_total = $valor;
}
function set_nacionalidad_producto($valor)
{
	$this->nacionalidad_producto = $valor;
}
function set_marca_id_marca($valor)
{
	$this->marca_id_marca = $valor;
}
function set_unidades_de_medida_id_medidas($valor)
{
	$this->unidades_de_medida_id_medidas = $valor;
}
function get_cantidad_total()
{
	return $this->cantidad_total;
}
function get_nacionalidad_producto()
{
	return $this->nacionalidad_producto;
}
function get_marca_id_marca()
{
	return $this->marca_id_marca;
}
function get_unidades_de_medida_id_medidas()
{
	return $this->unidades_de_medida_id_medidas;
}

	// se colocan metodo (Que serian funciones) seria get o set

	function set_codigo($valor)
	{
		$this->codigo = $valor;
	}

	// estamos usando un metodo por set y se usa para la clase codigo que seria el this
	//lo mismo que se hizo para codigo se hace para el resto

	function set_nombre($valor)
	{
		$this->nombre = $valor;
	}


	function set_minimo($valor)
	{
		$this->minimo = $valor;
	}

	function set_maximo($valor)
	{
		$this->maximo = $valor;
	}

	function set_id_categoria($valor)
	{
		$this->id_categoria = $valor;
	}

	function set_estado_registro($valor)
	{
		$this->estado_registro = $valor;
	}

	//ahora la misma cosa pero para get

	function get_codigo()
	{
		return $this->codigo;
	}

	function get_nombre()
	{
		return $this->nombre;
	}

	function get_minimo()
	{
		return $this->minimo;
	}

	function get_maximo()
	{
		return $this->maximo;
	}

	function get_id_categoria()
	{
		return $this->id_categoria;
	}

	function get_estado_registro()
	{
		return $this->estado_registro;
	}



	// metodos para incluir, consultar y eliminar
	function incluir()
{
    if (!$this->existe($this->codigo)) {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        try {
            $p = $co->prepare("INSERT INTO producto (
                codigo,
                nombre,
                cantidad_total,
                minimo,
                maximo,
                nacionalidad_producto,
                id_categoria,
                marca_id_marca,
                unidades_de_medida_id_medidas,
                estado_registro
            ) VALUES (
                :codigo,
                :nombre,
                :cantidad_total,
                :minimo,
                :maximo,
                :nacionalidad_producto,
                :id_categoria,
                :marca_id_marca,
                :unidades_de_medida_id_medidas,
                :estado_registro
            )");

            $p->bindParam(':codigo', $this->codigo);
            $p->bindParam(':nombre', $this->nombre);
            $p->bindParam(':cantidad_total', $this->cantidad_total);
            $p->bindParam(':minimo', $this->minimo);
            $p->bindParam(':maximo', $this->maximo);
            $p->bindParam(':nacionalidad_producto', $this->nacionalidad_producto);
            $p->bindParam(':id_categoria', $this->id_categoria);
            $p->bindParam(':marca_id_marca', $this->marca_id_marca);
            $p->bindParam(':unidades_de_medida_id_medidas', $this->unidades_de_medida_id_medidas);
            $p->bindParam(':estado_registro', $this->estado_registro);
            $p->execute();

            $r['resultado'] = 'incluir';
            $r['mensaje'] =  'El producto ha sido registrado';
        } catch (Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] =  $e->getMessage();
        }
    } else {
        $r['resultado'] = 'incluir';
        $r['mensaje'] =  'Ya existe';
    }
    return $r;
}

	function modificar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->codigo)) {
			try {
				$p = $co->prepare("Update producto set 
				nombre = :nombre,
				minimo = :minimo,
				maximo = :maximo,
				id_categoria = :id_categoria,
				estado_registro = :estado_registro
				where
				codigo = :codigo
				");

				$p->bindParam(':codigo', $this->codigo);
				$p->bindParam(':nombre', $this->nombre);
				$p->bindParam(':minimo', $this->minimo);
				$p->bindParam(':maximo', $this->maximo);
				$p->bindParam(':id_categoria', $this->id_categoria);
				$p->bindParam(':estado_registro', $this->estado_registro);

				$p->execute();

				$r['resultado'] = 'modificar';
				$r['mensaje'] =  'Producto Modificado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'modificar';
			$r['mensaje'] =  'No existe el Codigo del Producto';
		}
		return $r;
	}

	function eliminar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		// if ($this->existe($this->codigo)) {
		// 	try {
		// 		$p = $co->prepare("delete from producto 
		// 		where
		// 		codigo = :codigo
		// 		");

		// 		$p->bindParam(':codigo', $this->codigo);


		// 		$p->execute();

		// 		$r['resultado'] = 'eliminar';
		// 		$r['mensaje'] =  'Producto Eliminado';
		// 	} catch (Exception $e) {
		// 		$r['resultado'] = 'error';
		// 		$r['mensaje'] =  $e->getMessage();
		// 	}
		// } else {
		// 	$r['resultado'] = 'eliminar';
		// 	$r['mensaje'] =  'No existe el codigo';
		// }
		// return $r;
		if ($this->existe($this->codigo)) {
			try {
				$p = $co->prepare("Update producto set 
				estado_registro = 0
				where
				codigo = :codigo
				");

				$p->bindParam(':codigo', $this->codigo);
				$p->execute();

				$r['resultado'] = 'eliminar';
				$r['mensaje'] =  'Producto eliminado';
			} catch (Exception $e) {
				$r['resultado'] = 'error';
				$r['mensaje'] =  $e->getMessage();
			}
		} else {
			$r['resultado'] = 'eliminar';
			$r['mensaje'] =  'No existe el Codigo del Producto';
		}
		return $r;
	}

	function restaurar(){
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		if ($this->existe($this->codigo)) {

			$resultado = $co->query("SELECT estado_registro FROM producto WHERE codigo = " . $this->codigo . "");

			$respuesta = 0;
			foreach ($resultado as $r) {
				$respuesta = $r['estado_registro'];
			}

			if($respuesta) {
				$r['resultado'] = 'restaurar';
				$r['mensaje'] =  'El producto no esta eliminado';
			} else {
				try {
					$p = $co->prepare("Update producto set 
					estado_registro = 1
					where
					codigo = :codigo
					");
	
					$p->bindParam(':codigo', $this->codigo);
					$p->execute();
	
					$r['resultado'] = 'restaurar';
					$r['mensaje'] =  'Producto restaurado';
				} catch (Exception $e) {
					$r['resultado'] = 'error';
					$r['mensaje'] =  $e->getMessage();
				}
			}
			
			
		} else {
			$r['resultado'] = 'restaurar';
			$r['mensaje'] =  'No existe el Codigo del Producto';
		}
		return $r;
	}

	function consultar()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$r = array();
		try {

			$resultado = $co->query("SELECT
            producto.codigo,
            producto.nombre,
            producto.minimo,
            producto.maximo,
            categoria.descripcion_categoria,
            producto.id_categoria
			FROM producto
			INNER JOIN categoria ON producto.id_categoria = categoria.id_categoria
			WHERE producto.estado_registro = 1");

			if ($resultado) {

				$respuesta = '';
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr style='cursor:pointer' onclick='coloca(this);'>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['codigo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['nombre'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['minimo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['maximo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td style='display:none;'>";
					$respuesta = $respuesta . $r['id_categoria'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['descripcion_categoria'];
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
			$resultado = $co->query("SELECT
            producto.codigo,
            producto.nombre,
            producto.minimo,
            producto.maximo,
            categoria.descripcion_categoria,
            producto.id_categoria
			FROM producto 
			INNER JOIN categoria ON producto.id_categoria = categoria.id_categoria
			WHERE producto.estado_registro = 0");

			if ($resultado) {

				$respuesta = '';
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr style='cursor:pointer' onclick='coloca(this);'>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['codigo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['nombre'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['minimo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['maximo'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td style='display:none;'>";
					$respuesta = $respuesta . $r['id_categoria'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['descripcion_categoria'];
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

	function listadocategoria()
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("SELECT * from categoria WHERE categoria.estado_registro = 1 ");

			if ($resultado) {

				$respuesta = '';
				foreach ($resultado as $r) {
					$respuesta = $respuesta . "<tr style='cursor:pointer' onclick='colocacategoria(this);'>";
					$respuesta = $respuesta . "<td style='display:none;'>";
					$respuesta = $respuesta . $r['id_categoria'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['codigo_categoria'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['descripcion_categoria'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['unidadMedNormal'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "<td>";
					$respuesta = $respuesta . $r['unidadMedAlt'];
					$respuesta = $respuesta . "</td>";
					$respuesta = $respuesta . "</tr>";
				}
			}
			$r['resultado'] = 'listadoCategoria';
			$r['mensaje'] =  $respuesta;
		} catch (Exception $e) {
			$r['resultado'] = 'error';
			$r['mensaje'] =  $e->getMessage();
		}
		return $r;
	}

	private function existe($codigo)
	{
		$co = $this->conecta();
		$co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		try {

			$resultado = $co->query("Select * from producto where codigo='$codigo'");


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

			$resultado = $co->query("Select * from producto where codigo='$this->codigo'");
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
