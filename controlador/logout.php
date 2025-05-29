<?php
require_once(__DIR__.'/../modelo/bitacora.php');
$bitacora = new bitacora();
$bitacora->set_usuario($_SESSION['usuario']);
$bitacora->set_modulo('Autenticación');
$bitacora->set_accion('Cierre de sesión');
$bitacora->registrarAccion('Cierre de sesión');

$usuario = $_SESSION['usuario'] ?? null;

session_unset();
session_destroy();
header('Location: ?pagina=principal');
exit;
?>