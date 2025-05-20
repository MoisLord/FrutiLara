<?php
// app/controllers/BitacoraController.php

require_once __DIR__ . '/ControladorBase.php';
require_once __DIR__ . '/../modelo/Bitacora.php';

class ControlBitacora extends ControladorBase {
    private $model;

    public function __construct(PDO $pdo) {
        parent::__construct($pdo);
        $this->model = new Bitacora($pdo);
    }

    /**
     * Registra una acción en la bitácora.
     * @param string $usuario_id
     * @param string $accion
     * @return bool
     */
    public function registrarAccion(string $usuario_id, string $accion): bool {
        // Control de acceso: sólo roles permitidos
        if (!in_array($_SESSION['rol'], ['ADMINISTRADOR','EMPLEADO','SUPERUSUARIO'])) {
            http_response_code(403);
            exit('Acceso denegado.');
        }

        // Validación CSRF
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
                http_response_code(400);
                exit('Token CSRF inválido.');
            }
        }

        // Lógica de registro
        $ok = $this->model->registrar($usuario_id, $accion);
        if ($ok) {
            header('Location: /bitacora?msg=registrado');
            exit;
        }
        return false;
    }

    /**
     * Muestra todas las entradas de la bitácora.
     * @return array
     */
    public function listar(): array {
        // Control de acceso: sólo dueño y super‑usuario pueden ver todo
        if (!in_array($_SESSION['rol'], ['ADMINISTRADOR','SUPERUSUARIO'])) {
            http_response_code(403);
            exit('Acceso denegado.');
        }
        return $this->model->listar();
    }
}
// Control de acceso: sólo administrador y super‑usuario pueden ver todo
$this->verificarRol(['ADMINISTRADOR', 'SUPERUSUARIO']);