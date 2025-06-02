<?php
//Se llama al archivo que contiene la clase, para enlazar a la base de datos
require_once('modelo/datos.php');

//declaracion de la clase "unidades_de_medida" que hereda de la clase "datos"
class unidades_de_medida extends datos {
    private $id_medidas;
    private $codigo_medida;
    private $unidadMedNormal;
    private $unidadMedAlt;
    private $estado_registro;
    
    //Se añaden los metodos (funciones) que me permitan leer (get) y colocar (set)
	//Comienzo del sector de metodos de set
    // Métodos set
    public function set_id_medidas($valor) { $this->id_medidas = $valor; }
    public function set_codigo_medida($valor) { $this->codigo_medida = $valor; }
    public function set_unidadMedNormal($valor) { $this->unidadMedNormal = $valor; }
    public function set_unidadMedAlt($valor) { $this->unidadMedAlt = $valor; }
    public function set_estado_registro($valor) { $this->estado_registro = $valor; }
    
    // Métodos get
    public function get_id_medidas() { return $this->id_medidas; }
    public function get_codigo_medida() { return $this->codigo_medida; }
    public function get_unidadMedNormal() { return $this->unidadMedNormal; }
    public function get_unidadMedAlt() { return $this->unidadMedAlt; }
    public function get_estado_registro() { return $this->estado_registro; }
    
    //Creación de los metodos para incluir, consultar y eliminar
	//Comienzo del sector del metodo "incluir"
    // Método para incluir unidades de medida
    public function incluir() {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        
        try {
            $p = $co->prepare("INSERT INTO unidades_de_medida(
                codigo_medida,
                unidadMedNormal,
                unidadMedAlt,
                estado_registro
            ) VALUES(
                :codigo_medida,
                :unidadMedNormal,
                :unidadMedAlt,
                :estado_registro
            )");
            
            $p->bindParam(':codigo_medida', $this->codigo_medida);
            $p->bindParam(':unidadMedNormal', $this->unidadMedNormal);
            $p->bindParam(':unidadMedAlt', $this->unidadMedAlt);
            $p->bindParam(':estado_registro', $this->estado_registro);
            
            $p->execute();
            
            // Obtener el ID generado
            $this->id_medidas = $co->lastInsertId();
            
            $r['resultado'] = 'incluir';
            $r['mensaje'] = 'Unidades de medida registradas correctamente';
            $r['id_medidas'] = $this->id_medidas;
            
        } catch(Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] = $e->getMessage();
        }
        return $r;
    }
    
    // Otros métodos necesarios (consultar, modificar, eliminar, etc.)
    public function consultar() {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        
        try {
            $p = $co->prepare("SELECT * FROM unidades_de_medida WHERE id_medidas = :id_medidas");
            $p->bindParam(':id_medidas', $this->id_medidas);
            $p->execute();
            
            if ($p->rowCount() > 0) {
                $r['resultado'] = 'consultar';
                $r['datos'] = $p->fetch(PDO::FETCH_ASSOC);
            } else {
                $r['resultado'] = 'error';
                $r['mensaje'] = 'No se encontraron registros';
            }
            
        } catch(Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] = $e->getMessage();
        }
        return $r;
    }

    public function modificar() {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        
        try {
            $p = $co->prepare("UPDATE unidades_de_medida SET
                codigo_medida = :codigo_medida,
                unidadMedNormal = :unidadMedNormal,
                unidadMedAlt = :unidadMedAlt,
                estado_registro = :estado_registro
            WHERE id_medidas = :id_medidas");
            
            $p->bindParam(':codigo_medida', $this->codigo_medida);
            $p->bindParam(':unidadMedNormal', $this->unidadMedNormal);
            $p->bindParam(':unidadMedAlt', $this->unidadMedAlt);
            $p->bindParam(':estado_registro', $this->estado_registro);
            $p->bindParam(':id_medidas', $this->id_medidas);
            
            $p->execute();
            
            if ($p->rowCount() > 0) {
                $r['resultado'] = 'modificar';
                $r['mensaje'] = 'Unidades de medida modificadas correctamente';
            } else {
                $r['resultado'] = 'error';
                $r['mensaje'] = 'No se encontraron registros para modificar';
            }
            
        } catch(Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] = $e->getMessage();
        }
        return $r;
    }

    public function eliminar() {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        
        try {
            $p = $co->prepare("DELETE FROM unidades_de_medida WHERE id_medidas = :id_medidas");
            $p->bindParam(':id_medidas', $this->id_medidas);
            $p->execute();
            
            if ($p->rowCount() > 0) {
                $r['resultado'] = 'eliminar';
                $r['mensaje'] = 'Unidades de medida eliminadas correctamente';
            } else {
                $r['resultado'] = 'error';
                $r['mensaje'] = 'No se encontraron registros para eliminar';
            }
            
        } catch(Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] = $e->getMessage();
        }
        return $r;
    }

    function existe() {
        $co = $this->conecta();
        $co->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $r = array();
        
        try {
            $p = $co->prepare("SELECT * FROM unidades_de_medida WHERE id_medidas = :id_medidas");
            $p->bindParam(':id_medidas', $this->id_medidas);
            $p->execute();
            
            if ($p->rowCount() > 0) {
                $r['resultado'] = 'existe';
                $r['mensaje'] = 'El registro existe';
            } else {
                $r['resultado'] = 'no_existe';
                $r['mensaje'] = 'El registro no existe';
            }
            
        } catch(Exception $e) {
            $r['resultado'] = 'error';
            $r['mensaje'] = $e->getMessage();
        }
        return $r;
    }
}