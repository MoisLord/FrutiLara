<?php
require_once 'controladorbase.php';
require_once __DIR__ . '/../modelo/usuario.php';

class ControlUsuarios extends ControladorBase {
    private $model;

    public function __construct($pdo) {
        parent::__construct($pdo);
        $this->model = new Usuario($pdo);
    }

    public function crear($data) {
        // Validación CSRF
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
                http_response_code(400);
                exit('Token CSRF inválido.');
            }
        }
        // Validaciones...
        $id = $this->model->crear($data);
        if ($id) {
            $this->log($_SESSION['usuario_id'], "Creó usuario con ID {$id}");
            header('Location: /usuarios?msg=ok');
        }
    }

    public function eliminar($id) {
        // Validación CSRF
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
                http_response_code(400);
                exit('Token CSRF inválido.');
            }
        }
        $this->model->eliminar($id);
        $this->log($_SESSION['usuario_id'], "Eliminó usuario con ID {$id}");
        header('Location: /usuarios?msg=deleted');
    }
    // ...
}

$this->verificarRol(['ADMINISTRADOR', 'SUPERUSUARIO']);
