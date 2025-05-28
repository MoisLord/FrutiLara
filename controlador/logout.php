<?php

$bitacora->set_usuario($_SESSION['usuario']);
$resultado = $bitacora->registrarAccion('Cierre de sesión');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$usuario = $_SESSION['usuario'] ?? null;

session_unset();
session_destroy();
header('Location: ?pagina=principal');
exit;
?>