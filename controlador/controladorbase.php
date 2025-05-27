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
        // Agrega el tercer argumento requerido por registrar, por ejemplo una descripción vacía o relevante
        $this->bitacora->registrar($usuario_id, $accion, '');
    }
    // Método para verificar roles permitidos
    protected function verificarRol(array $rolesPermitidos) {
        $rol = $_SESSION['rol'] ?? null;
        if (!$rol || !in_array($rol, $rolesPermitidos)) {
            http_response_code(403);
            exit('Acceso denegado.');
        }
    }
}
// Control de acceso: sólo administrador puede ver todo
if (!in_array($_SESSION['rol'], ['ADMINISTRADOR'])) {
    http_response_code(403);
    exit('Acceso denegado.');
}