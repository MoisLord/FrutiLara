<?php
  if(!is_file("modelo/".$pagina.".php")){
	  echo "Falta el modelo";
	  exit;
  }
  require_once("modelo/".$pagina.".php"); 
  if(is_file("vista/".$pagina.".php")){
	  // Generar token CSRF si no existe antes de mostrar el formulario
	  if (session_status() === PHP_SESSION_NONE) {
		  session_start();
	  }
	  if (empty($_SESSION['csrf_token'])) {
		  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
	  }

	  // Procesar POST solo si se envió el formulario
	  if (!empty($_POST)) {
		  // Validar token CSRF
		  if (!isset($_POST['csrf_token']) || !hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
			  // Mensaje personalizado de intento de hackeo
			  $mensaje = '<span style="color:red;font-weight:bold">Bloqueado intento de hackeo o burla de seguridad del sistema</span>';
		  } else {
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
	  }
	  require_once("vista/".$pagina.".php");
  } else {
	  echo "Falta la vista";
  }
?>
