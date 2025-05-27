<?php
require_once __DIR__ . '/ControladorBase.php';
require_once __DIR__ . '/../modelo/Bitacora.php';

class ContBitacora extends ControladorBase
{
    private $model;

    public function __construct()
    {
        $pdo = \Datos2::conectarBitacora(); // Conexión a BD secundaria
        parent::__construct($pdo);
        $this->model = new Bitacora($pdo);
    }

    /**
     * Registra una acción en la bitácora (usado desde otros módulos).
     */
    public function registrarAccion($usuario, $modulo, $accion)
    {
        if (!in_array($_SESSION['rol'] ?? '', ['ADMINISTRADOR', 'SUPERUSUARIO', 'EMPLEADO'])) {
            return false; // Solo usuarios autenticados
        }
        return $this->model->registrar($usuario, $modulo, $accion);
    }

    /**
     * Muestra la vista principal de la bitácora.
     */
    public function mostrarBitacora()
    {
        $this->verificarRol(['ADMINISTRADOR']); // Solo este rol

        $entries = $this->model->listar();
        require_once (__DIR__ . '/../vista/bitacora.php');
    }

    /**
     * Filtra registros por fecha (opcional, si necesitas filtros).
     */
    public function filtrarBitacora()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fechaInicio = $_POST['fecha_inicio'] ?? date('Y-m-01');
            $fechaFin = $_POST['fecha_fin'] ?? date('Y-m-t');
            $entries = $this->model->filtrarPorFecha($fechaInicio, $fechaFin);
            require_once (__DIR__ . '/../vista/bitacora.php');
        }
    }
}

// Uso del controlador (similar a marca.php)
if (isset($_GET['pagina']) && $_GET['pagina'] === 'bitacora') {
    $controller = new ContBitacora();
    $controller->mostrarBitacora();
}