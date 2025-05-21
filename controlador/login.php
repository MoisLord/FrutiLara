<?php
  if(!is_file("modelo/".$pagina.".php")){
	  echo "Falta el modelo";
	  exit;
  }
  require_once("modelo/".$pagina.".php"); 
  if(is_file("vista/".$pagina.".php")){
	  if (session_status() === PHP_SESSION_NONE) {
		  session_start();
	  }
	  // Restaurar el flujo clásico SIN forzar CSRF en login (solo protección visual en el formulario)
	  if (!empty($_POST)) {
		  $o = new login();
		  if ($_POST['accion'] == 'entrar') {
			  $o->set_cedula($_POST['cedula']);
			  $o->set_clave($_POST['clave']);  
			  $m = $o->existe();
			  if ($m['resultado'] == 'existe') {
				  // Renovar token CSRF tras login exitoso
				  unset($_SESSION['csrf_token']);
				  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

				  //asigna una clave nivel con el valor obtenido de la base de datos
				  $_SESSION['nivel'] = $m['mensaje'];
				  // Asigna el rol para la bitácora y controladores
				  $_SESSION['rol'] = $m['mensaje'];

				  // REGISTRO EN BITÁCORA: LOGIN
				  require_once(__DIR__ . '/controlbitacora.php');
				  $usuario = $_POST['cedula'];
				  $bitacora = new ControlBitacora();
				  $bitacora->registrarAccion($usuario, 'Sistema', 'Inició sesión');

				  // Redirigir al sistema
				  header('Location:?pagina=principal ');
				  die();
			  } else {
				  $mensaje = $m['mensaje'];
			  }
		  }
	  }
	  // Siempre generar el token para el formulario, pero no forzar validación en login
	  if (empty($_SESSION['csrf_token'])) {
		  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
	  }
	  require_once("vista/".$pagina.".php");
  } else {
	  echo "Falta la vista";
  }
?>
