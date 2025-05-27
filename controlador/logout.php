<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$usuario = $_SESSION['usuario'] ?? null;
if ($usuario) {
    require_once(__DIR__ . '/../controlador/BitacoraController.php');
    $bitacora = new BitacoraController();
    $bitacora->registrarAccion($usuario, 'Sistema', 'Cerró sesión');
}

session_unset();
session_destroy();
header('Location: ?pagina=principal');
exit;
?>