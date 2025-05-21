<?php
// app/controllers/ControlBitacora.php

require_once __DIR__ . '/ControladorBase.php';
require_once __DIR__ . '/../modelo/Bitacora.php';

class ControlBitacora extends ControladorBase {
    private $model;

    public function __construct() {
        parent::__construct(); // si la Base ya incluye la conexión
        $this->model = new Bitacora(); // conexión a BD secundaria desde el modelo
    }

    /**
     * Registrar una acción en la bitácora
     * @param string $usuario
     * @param string $modulo
     * @param string $accion
     * @return bool
     */
    public function registrarAccion(string $usuario, string $modulo, string $accion): bool {
        if (!in_array($_SESSION['rol'], ['ADMINISTRADOR','EMPLEADO','SUPERUSUARIO'])) {
            http_response_code(403);
            exit('Acceso denegado.');
        }

        // CSRF
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
                http_response_code(400);
                exit('Token CSRF inválido.');
            }
        }

        // Guardar registro
        $ok = $this->model->registrar($usuario, $modulo, $accion);
        if ($ok) {
            unset($_SESSION['csrf_token']);
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
            header('Location: ?pagina=bitacora&msg=registrado');
            exit;
        }
        return false;
    }

    /**
     * Mostrar la vista de bitácora con sus registros
     */
    public function mostrarBitacora() {
        if (!in_array($_SESSION['rol'], ['ADMINISTRADOR', 'SUPERUSUARIO'])) {
            http_response_code(403);
            exit('Acceso denegado.');
        }

        $entries = $this->model->listar();
        require_once __DIR__ . '/../vista/bitacora.php';
    }
}