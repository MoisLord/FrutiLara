<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!is_file("modelo/" . $pagina . ".php")) {
    echo "Falta definir la clase " . $pagina;
    exit;
}

require_once("modelo/" . $pagina . ".php");

if (is_file("vista/" . $pagina . ".php")) {
    $o = new bitacora();

    if (!empty($_POST)) {
        $accion = $_POST['accion'];
        $response = [];

        switch ($accion) {
            case 'listarBitacora':
                $fecha_inicio = $_POST['fecha_inicio'] ?? null;
                $fecha_fin = $_POST['fecha_fin'] ?? null;
                $response = $o->listarBitacora($fecha_inicio, $fecha_fin);
                break;
                
            case 'registrarAccion':
                if (isset($_SESSION['usuario'])) {
                    $o->set_usuario($_SESSION['usuario']);
                    $response = $o->registrarAccion($_POST['modulo'], $_POST['accion']);
                } else {
                    $response = ['resultado' => 'error', 'mensaje' => 'Usuario no autenticado'];
                }
                break;
                
            default:
                $response = ['resultado' => 'error', 'mensaje' => 'Acción no válida'];
        }

        echo json_encode($response);
        exit;
    }

    require_once("vista/" . $pagina . ".php");
} else {
    echo "Página en construcción";
}