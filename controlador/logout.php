<?php
if($_POST['accion']=='entrar'){
            if (session_status() === PHP_SESSION_NONE) {
                session_start();
            }
        }
        
if (isset($_SESSION['usuario'])) {
    // Registrar cierre de sesión en bitácora
    require_once(__DIR__.'/../modelo/bitacora.php');
    $bitacora = new bitacora();
    $bitacora->set_usuario($_SESSION['usuario']);
    $bitacora->set_modulo('Autenticación');
    $bitacora->set_accion('Cierre de sesión');
    $bitacora->set_fecha(date("Y-m-d H:i:s"));
    $bitacora->incluir();
}

session_unset();
session_destroy();
header('Location: ?pagina=principal');
exit;
?>