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
			session_start();
			$o->set_cedula($_POST['cedula']);
			$o->set_clave($_POST['clave']);  
			$m = $o->existe();
			if($m['resultado']=='existe'){
			  // Renovar token CSRF tras login exitoso
			  unset($_SESSION['csrf_token']);
			  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
			  //asigna una clave nivel con el valor obtenido de la base de datos
			  $_SESSION['nivel'] = $m['mensaje'];
			  // Redirigir al sistema
			  header('Location:?pagina=principal ');
			  die();
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
