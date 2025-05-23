<?php
  if(!is_file("modelo/".$pagina.".php")){
	  echo "Falta el modelo";
	  exit;
  }
  require_once("modelo/".$pagina.".php"); 
  if(is_file("vista/".$pagina.".php")){ 
	  if(!empty($_POST)){
		  $o = new login();
		  if($_POST['accion']=='entrar'){
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
			$o->set_cedula($_POST['cedula']);
			$o->set_clave($_POST['clave']);  
			$m = $o->existe();
			if($m['resultado']=='existe'){
				// Renovar token CSRF tras login exitoso
				unset($_SESSION['csrf_token']);
				$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
				
				// Asigna el nombre de usuario (cedula)
				$usuario = $_POST['cedula'];
				$_SESSION['usuario'] = $usuario;
				$_SESSION['rol'] = $m['mensaje']; // ADMINISTRADOR, EMPLEADO, etc.
				
				// REGISTRO EN BITÁCORA: LOGIN
				require_once(__DIR__ . '/controlbitacora.php');
				$bitacora = new ContBitacora();
				$bitacora->registrarAccion($usuario, 'Sistema', 'Inició sesión');
				
				// Redirigir al sistema principal
				header('Location: ?pagina=principal');
				exit;
			}
			else{
			  $mensaje = $m['mensaje'];
			}
		  }
	  }
	  
	  require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "Falta la vista";
  }
  if (empty($_SESSION['csrf_token'])) {
	$_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>
