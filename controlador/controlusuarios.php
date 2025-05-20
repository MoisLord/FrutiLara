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
        // Validaciones...
        $id = $this->model->crear($data);
        if ($id) {
            $this->log($_SESSION['usuario_id'], "Creó usuario con ID {$id}");
            header('Location: /usuarios?msg=ok');
        }
    }

    public function eliminar($id) {
        $this->model->eliminar($id);
        $this->log($_SESSION['usuario_id'], "Eliminó usuario con ID {$id}");
        header('Location: /usuarios?msg=deleted');
    }
    // ...
}