<?php

require_once('modelo/datos.php');

class PagoEmpleados extends datos {
    // Atributos privados para los campos del formulario
    private $id_pago_empleados;
    private $empleados_cedula;
    private $fecha_pago;
    private $pago_empleados;
    private $estado_registro;

    // Métodos set para cada atributo
    function set_id_pago_empleados($valor) {
        $this->id_pago_empleados = $valor;
    }

    function set_empleados_cedula($valor) {
        $this->empleados_cedula = $valor;
    }

    function set_fecha_pago($valor) {
        $this->fecha_pago = $valor;
    }

    function set_pago_empleados($valor) {
        $this->pago_empleados = $valor;
    }

    function set_estado_registro($valor) {
        $this->estado_registro = $valor;
    }

    // Métodos get para cada atributo
    function get_id_pago_empleados() {
        return $this->id_pago_empleados;
    }

    function get_empleados_cedula() {
        return $this->empleados_cedula;
    }

    function get_fecha_pago() {
        return $this->fecha_pago;
    }

    function get_pago_empleados() {
        return $this->pago_empleados;
    }

    function get_estado_registro() {
        return $this->estado_registro;
    }

    // Método para registrar pagos de empleados
    function registrar($empleados_cedula, $fecha_pago, $pago_empleados, $estado_registro) {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        
        try {
            // Verificar primero si el empleado existe
            $verificar = $co->prepare("SELECT cedula FROM empleados WHERE cedula = :cedula");
            $verificar->bindParam(':cedula', $empleados_cedula);
            $verificar->execute();
            
            if($verificar->rowCount() == 0) {
                $r['resultado'] = 'error';
                $r['mensaje'] = "El empleado con cédula $empleados_cedula no existe";
                return $r;
            }
            
            // Registrar el pago
            $p = $co->prepare("INSERT INTO pago_empleados 
                              (empleados_cedula, fecha_pago, pago_empleados, estado_registro) 
                              VALUES 
                              (:empleados_cedula, :fecha_pago, :pago_empleados, :estado_registro)");
            
            $p->bindParam(':empleados_cedula', $empleados_cedula);
            $p->bindParam(':fecha_pago', $fecha_pago);
            $p->bindParam(':pago_empleados', $pago_empleados);
            $p->bindParam(':estado_registro', $estado_registro);
            
            $p->execute();
            
            $r['resultado'] = 'registrar';
            $r['mensaje'] = "Pago al empleado registrado correctamente";
        } catch (Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] = $e->getMessage();
        }
        return $r;
    }

    // Método para listar empleados (similar al listado de servicios)
    function listadoempleados() {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        
        try {
            $resultado = $co->query("SELECT cedula, nombre_apellido, telefono, direccion FROM empleados");
            $respuesta = '';
            
            if($resultado) {
                foreach($resultado as $empleado) {
                    $respuesta .= "<tr style='cursor:pointer' onclick='colocaempleado(this);'>";
                    $respuesta .= "<td>".$empleado['cedula']."</td>";
                    $respuesta .= "<td>".$empleado['nombre_apellido']."</td>";
                    $respuesta .= "<td>".$empleado['telefono']."</td>";
                    $respuesta .= "<td>".$empleado['direccion']."</td>";
                    $respuesta .= "</tr>";
                }
            }
            
            $r['resultado'] = 'listadoempleados';
            $r['mensaje'] = $respuesta;
            
        } catch(Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] = $e->getMessage();
        }
        return $r;
    }

    // Método para listar historial de pagos a empleados
    function listadopagos() {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        
        try {
            $resultado = $co->query("SELECT pe.*, e.nombre_apellido 
                                    FROM pago_empleados pe
                                    JOIN empleados e ON pe.empleados_cedula = e.cedula
                                    ORDER BY pe.fecha_pago DESC");
            $respuesta = '';
            
            if($resultado) {
                foreach($resultado as $pago) {
                    $respuesta .= "<tr>";
                    $respuesta .= "<td>".$pago['empleados_cedula']."</td>";
                    $respuesta .= "<td>".$pago['nombre_apellido']."</td>";
                    $respuesta .= "<td>".$pago['pago_empleados']."</td>";
                    $respuesta .= "<td>".$pago['fecha_pago']."</td>";
                    $respuesta .= "<td>".$pago['estado_registro']."</td>";
                    $respuesta .= "</tr>";
                }
            }
            
            $r['resultado'] = 'listadopagos';
            $r['mensaje'] = $respuesta;
            
        } catch(Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] = $e->getMessage();
        }
        return $r;
    }
    
    // Método para verificar si un empleado existe
    function existeEmpleado($cedula) {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        try {
            $p = $co->prepare("SELECT cedula FROM empleados WHERE cedula = :cedula");
            $p->bindParam(':cedula', $cedula);
            $p->execute();
            
            return ($p->rowCount() > 0);
        } catch(Exception $e) {
            return false;
        }
    }
}
?>