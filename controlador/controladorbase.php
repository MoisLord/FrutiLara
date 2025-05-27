<?php
require_once __DIR__ . '/../modelo/Bitacora.php';

abstract class ControladorBase {
    protected $bd;
    protected $bitacora;

    public function __construct(PDO $pdo) {
        $this->bd = $pdo;
        $this->bitacora = new Bitacora($pdo);
    }

    protected function verificarRol(array $rolesPermitidos) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        
        if (!isset($_SESSION['usuario'])) {
            header('Location: ?pagina=login');
            exit;
        }
        
        if (!in_array($_SESSION['rol'], $rolesPermitidos)) {
            http_response_code(403);
            exit('Acceso denegado. Rol no autorizado.');
        }
    }
}
?>