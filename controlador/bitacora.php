<?php
require_once __DIR__ . '/ControladorBase.php';
require_once __DIR__ . '/../modelo/Bitacora.php';
require_once __DIR__ . '/../modelo/datos.php';

class BitacoraController extends ControladorBase {
    private $model;

    public function __construct() {
        $pdo = \Datos2::conectarBitacora();
        parent::__construct($pdo);
        $this->model = new Bitacora($pdo);
    }

    /**
     * Registra una acción en la bitácora con verificación CSRF
     * @param string $usuario
     * @param string $modulo
     * @param string $accion
     * @return bool
     */
    public function registrarAccion(string $usuario, string $modulo, string $accion): bool {
        $this->verificarRol(['ADMINISTRADOR', 'SUPERUSUARIO', 'EMPLEADO']);
        
        // Verificación CSRF para peticiones POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'] ?? '')) {
                throw new Exception('Token CSRF inválido');
            }
        }

        $registrado = $this->model->registrar($usuario, $modulo, $accion);
        
        if ($registrado && $_SERVER['REQUEST_METHOD'] === 'POST') {
            // Regenerar token CSRF después de uso
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        
        return $registrado;
    }

    /**
     * Muestra la vista principal de la bitácora
     */
    public function mostrarBitacora() {
        $this->verificarRol(['ADMINISTRADOR', 'SUPERUSUARIO']);
        $entries = $this->model->listar();
        require_once __DIR__ . '/../vista/bitacora.php';
    }

    /**
     * Filtra registros por fecha
     */
    public function filtrarBitacora() {
        $this->verificarRol(['ADMINISTRADOR', 'SUPERUSUARIO']);
        
        $fechaInicio = $_POST['fecha_inicio'] ?? date('Y-m-01');
        $fechaFin = $_POST['fecha_fin'] ?? date('Y-m-t');
        
        $entries = $this->model->filtrarPorFecha($fechaInicio, $fechaFin);
        require_once __DIR__ . '/../vista/bitacora.php';
    }

    /**
     * Maneja las rutas del controlador
     */
    public function handleRequest() {
        if (!isset($_GET['pagina']) || $_GET['pagina'] !== 'bitacora') {
            return;
        }

        try {
            if (isset($_POST['fecha_inicio']) && isset($_POST['fecha_fin'])) {
                $this->filtrarBitacora();
            } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Otras acciones POST pueden manejarse aquí
            } else {
                $this->mostrarBitacora();
            }
        } catch (Exception $e) {
            http_response_code(400);
            die($e->getMessage());
        }
    }
}

// Uso del controlador (opcional, puede moverse al index.php principal)
if (isset($_GET['pagina']) && $_GET['pagina'] === 'bitacora') {
    $controller = new BitacoraController();
    $controller->handleRequest();
}