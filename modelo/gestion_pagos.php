<?php

require_once('modelo/datos.php');

class gestion_pagos extends datos {
    // Atributos privados para los campos del formulario
    private $id_pago;
    private $tipo_pago;
    private $referencia_id;
    private $descripcion_referencia;
    private $monto_costo;
    private $fecha_pago;
    private $metodo_pago;
    private $observaciones;
    private $estado_registro;

    // Métodos set para cada atributo
    function set_id_pago($valor) {
        $this->id_pago = $valor;
    }

    function set_tipo_pago($valor) {
        $this->tipo_pago = $valor;
    }

    function set_referencia_id($valor) {
        $this->referencia_id = $valor;
    }

    function set_descripcion_referencia($valor) {
        $this->descripcion_referencia = $valor;
    }

    function set_monto_costo($valor) {
        $this->monto_costo = $valor;
    }

    function set_fecha_pago($valor) {
        $this->fecha_pago = $valor;
    }

    function set_metodo_pago($valor) {
        $this->metodo_pago = $valor;
    }

    function set_observaciones($valor) {
        $this->observaciones = $valor;
    }

    function set_estado_registro($valor) {
        $this->estado_registro = $valor;
    }

    // Métodos get para cada atributo
    function get_id_pago() {
        return $this->id_pago;
    }

    function get_tipo_pago() {
        return $this->tipo_pago;
    }

    function get_referencia_id() {
        return $this->referencia_id;
    }

    function get_descripcion_referencia() {
        return $this->descripcion_referencia;
    }

    function get_monto_costo() {
        return $this->monto_costo;
    }

    function get_fecha_pago() {
        return $this->fecha_pago;
    }

    function get_metodo_pago() {
        return $this->metodo_pago;
    }

    function get_observaciones() {
        return $this->observaciones;
    }

    function get_estado_registro() {
        return $this->estado_registro;
    }

    // Método para registrar pagos
    function registrar($tipo_pago, $referencia_id, $descripcion_referencia, $monto_costo, $fecha_pago, $metodo_pago, $observaciones, $estado_registro) {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        
        try {
            // Verificar primero si la referencia existe
            if($tipo_pago == 'EMPLEADO') {
                $verificar = $co->prepare("SELECT cedula, nombre_apellido FROM empleados WHERE cedula = :referencia");
            } else {
                $verificar = $co->prepare("SELECT codigo_servicio, descripcion FROM servicios WHERE codigo_servicio = :referencia");
            }
            
            $verificar->bindParam(':referencia', $referencia_id);
            $verificar->execute();
            
            if($verificar->rowCount() == 0) {
                $r['resultado'] = 'error';
                $r['mensaje'] = "La referencia $referencia_id no existe para tipo $tipo_pago";
                return $r;
            }
            
            // Registrar el pago
            $p = $co->prepare("INSERT INTO gestion_pagos 
                              (tipo_pago, referencia_id, descripcion_referencia, monto_costo, fecha_pago, metodo_pago, observaciones, estado_registro) 
                              VALUES 
                              (:tipo_pago, :referencia_id, :descripcion_referencia, :monto_costo, :fecha_pago, :metodo_pago, :observaciones, :estado_registro)");
            
            $p->bindParam(':tipo_pago', $tipo_pago);
            $p->bindParam(':referencia_id', $referencia_id);
            $p->bindParam(':descripcion_referencia', $descripcion_referencia);
            $p->bindParam(':monto_costo', $monto_costo);
            $p->bindParam(':fecha_pago', $fecha_pago);
            $p->bindParam(':metodo_pago', $metodo_pago);
            $p->bindParam(':observaciones', $observaciones);
            $p->bindParam(':estado_registro', $estado_registro);
            
            $p->execute();
            
            $r['resultado'] = 'registrar';
            $r['mensaje'] = "Pago registrado correctamente";
        } catch (Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] = $e->getMessage();
        }
        return $r;
    }

    // Método para listar referencias según tipo
    function listado_referencias($tipo) {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        
        try {
            if($tipo == 'EMPLEADO') {
                $resultado = $co->query("SELECT cedula as id, nombre_apellido as descripcion FROM empleados");
            } else {
                $resultado = $co->query("SELECT codigo_servicio as id, descripcion FROM servicios");
            }
            
            $respuesta = '';
            
            if($resultado) {
                foreach($resultado as $item) {
                    $respuesta .= "<tr style='cursor:pointer' onclick='colocar_referencia(this);'>";
                    $respuesta .= "<td>".$item['id']."</td>";
                    $respuesta .= "<td>".$item['descripcion']."</td>";
                    $respuesta .= "</tr>";
                }
            }
            
            $r['resultado'] = 'listado_referencias';
            $r['mensaje'] = $respuesta;
            
        } catch(Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] = $e->getMessage();
        }
        return $r;
    }

    // Método para listar historial de pagos
    function listado_pagos() {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        
        try {
            $resultado = $co->query("SELECT * FROM gestion_pagos ORDER BY fecha_pago DESC");
            $respuesta = '';
            
            if($resultado) {
                foreach($resultado as $pago) {
                    $respuesta .= "<tr>";
                    $respuesta .= "<td>".$pago['tipo_pago']."</td>";
                    $respuesta .= "<td>".$pago['referencia_id']."</td>";
                    $respuesta .= "<td>".$pago['descripcion_referencia']."</td>";
                    $respuesta .= "<td>".$pago['monto_costo']."</td>";
                    $respuesta .= "<td>".$pago['fecha_pago']."</td>";
                    $respuesta .= "<td>".$pago['metodo_pago']."</td>";
                    $respuesta .= "<td>".$pago['estado_registro']."</td>";
                    $respuesta .= "</tr>";
                }
            }
            
            $r['resultado'] = 'listado_pagos';
            $r['mensaje'] = $respuesta;
            
        } catch(Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] = $e->getMessage();
        }
        return $r;
    }
    
    // Método para verificar si una referencia existe
    function existe_referencia($tipo, $referencia) {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        try {
            if($tipo == 'EMPLEADO') {
                $p = $co->prepare("SELECT cedula FROM empleados WHERE cedula = :referencia");
            } else {
                $p = $co->prepare("SELECT codigo_servicio FROM servicios WHERE codigo_servicio = :referencia");
            }
            
            $p->bindParam(':referencia', $referencia);
            $p->execute();
            
            return ($p->rowCount() > 0);
        } catch(Exception $e) {
            return false;
        }
    }
}
?>