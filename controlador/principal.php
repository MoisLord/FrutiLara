
<?php
// Registro en bitácora al ingresar a cualquier módulo principal
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (isset($_SESSION['usuario'])) {
    require_once(__DIR__ . '/bitacora.php');
    $modulo = ucfirst($pagina); // Ejemplo: si $pagina = 'empleados' => 'Empleados'
    (new BitacoraController())->registrarAccion($_SESSION['usuario'], $modulo, 'Ingresó al Sistema ' . $modulo);
}

if(is_file("vista/".$pagina.".php")){
    require_once("vista/".$pagina.".php"); 
}
else{
    echo "pagina en construccion";
}
?>