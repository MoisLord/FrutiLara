<?php

// Solo iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
//REGISTRO EN BITÁCORA: solo si la sesión está activa y hay un usuario definido
if (isset($_SESSION['usuario'])) {
    require_once("app/controllers/ControlBitacora.php");
    $bitacora = new ContBitacora();
    $bitacora->registrarAccion($_SESSION['usuario'], 'pagoEmpleados', 'Ingresó al módulo de pago a Empleados');
}
  //verifica que exista la vista de
  //la pagina
  if(is_file("vista/".$pagina.".php")){
	  //si existe se la trae, ahora ve a la carpeta vista
	  //y busca el archivo principal.php 
	  require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "pagina en construccion";
  }
?>