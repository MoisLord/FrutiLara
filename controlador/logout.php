<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();

    $bitacora = new bitacora();
    $bitacora->set_usuario($_SESSION['usuario']);
    $resultado = $bitacora->registrarAccion('Cierre de sesión');
}

$usuario = $_SESSION['usuario'] ?? null;

session_unset();
session_destroy();
header('Location: ?pagina=principal');
exit;
?>