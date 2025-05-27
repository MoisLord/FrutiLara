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
    protected function verificarRol(array $rolesPermitidos) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['rol'])) {
        header('Location: ?pagina=login');
        exit;
    }
    
    if (!in_array($_SESSION['rol'], $rolesPermitidos)) {
        http_response_code(403);
        exit('Acceso denegado. Rol no autorizado.');
    }
}
}