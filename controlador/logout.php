<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$usuario = $_SESSION['usuario'] ?? null;
if ($usuario) {
    require_once(__DIR__ . '/controlbitacora.php');
    $bitacora = new ControlBitacora();
    $bitacora->registrarAccion($usuario, 'Sistema', 'Cerró sesión');
}

// Limpiar y destruir la sesión
session_unset();
session_destroy();

header('Location: /FrutiLara/');
exit;
?>