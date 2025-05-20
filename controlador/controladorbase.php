<?php
require_once __DIR__ . '/../modelo/bitacora.php';

class ControladorBase {
    protected $bd;
    protected $bitacora;

    public function __construct($pdo) {
        $this->bd        = $pdo;
        $this->bitacora  = new Bitacora($pdo);
    }

    protected function log($usuario_id, $accion) {
        $this->bitacora->registrar($usuario_id, $accion);
    }
}