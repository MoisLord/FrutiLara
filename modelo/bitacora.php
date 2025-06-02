<?php
//llamda al archivo que contiene la clase
//datos, en ella esta guardada en la carpeta id_marca
//para enlazar a la base de datos
require_once(__DIR__.'/../modelo/datos.php');

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

	//Lo siguiente son los metodos para registrar, listar, mostrar incluir y consultar
	public function registrarAccion($modulo, $accion)
    {
        try {
            $co = $this->conectarBitacora();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $stmt = $co->prepare("INSERT INTO bitacora 
                                (usuario, modulo, accion, fecha) 
                                VALUES 
                                (:usuario, :modulo, :accion, NOW())");
            
            $stmt->bindParam(':usuario', $this->usuario);
            $stmt->bindParam(':modulo', $modulo);
            $stmt->bindParam(':accion', $accion);
            
            $stmt->execute();
            
            return ['resultado' => 'exito', 'mensaje' => 'Acción registrada'];
        } catch (PDOException $e) {
            return ['resultado' => 'error', 'mensaje' => $e->getMessage()];
        }
    }

    public function listarBitacora($fecha_inicio = null, $fecha_fin = null)
    {
        try {
            $co = $this->conectarBitacora();
            $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "SELECT * FROM bitacora WHERE 1=1";
            
            if ($fecha_inicio) {
                $sql .= " AND fecha >= :fecha_inicio";
            }
            if ($fecha_fin) {
                $sql .= " AND fecha <= :fecha_fin";
            }
            
            $sql .= " ORDER BY fecha DESC, id DESC";
            
            $stmt = $co->prepare($sql);
            
            if ($fecha_inicio) {
                $stmt->bindParam(':fecha_inicio', $fecha_inicio);
            }
            if ($fecha_fin) {
                $stmt->bindParam(':fecha_fin', $fecha_fin);
            }
            
            $stmt->execute();
            $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $html = '';
            foreach ($registros as $reg) {
                $html .= "<tr>";
                $html .= "<td>".htmlspecialchars($reg['id'])."</td>";
                $html .= "<td>".htmlspecialchars($reg['usuario'])."</td>";
                $html .= "<td>".htmlspecialchars($reg['modulo'])."</td>";
                $html .= "<td>".htmlspecialchars($reg['accion'])."</td>";
                $html .= "<td>".date('d/m/Y', strtotime($reg['fecha']))."</td>";
                $html .= "<td>".date('H:i:s', strtotime($reg['fecha']))."</td>";
                $html .= "</tr>";
            }
            
            return ['resultado' => 'exito', 'mensaje' => $html];
        } catch (PDOException $e) {
            return ['resultado' => 'error', 'mensaje' => $e->getMessage()];
        }
    }
}