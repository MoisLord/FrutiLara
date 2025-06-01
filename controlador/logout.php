<?php
if($_POST['accion']=='salir'){
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }

if (isset($_SESSION['usuario'])) {
    // Registrar cierre de sesión en bitácora
    require_once(__DIR__.'/../modelo/bitacora.php');
    $bitacora = new bitacora();
    $bitacora->set_usuario($_SESSION['usuario']);
    $bitacora->incluir('Autenticación', 'Cierre de sesión');
}

session_unset();
session_destroy();
header('Location: ?pagina=principal');
exit;
?>