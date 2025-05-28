<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
			//   session_destroy(); //elimina cualquier version anterio de sesion	
			//   session_start(); //inicia el entorno de sesion
			  //asigna una clave nivel con el valor obtenido de la base de datos
			  $_SESSION['nivel'] = $m['mensaje'];

			  
			  
			  // Esta nueva instruccion lo que hace es 
			  //redireccionar el flujo de nuevo al index.php FrontController
			  //para obligar a que se carguen los privilegios de la sesion
			  header('Location:?pagina=principal ');
			  //Similar al exit, die termina la ejecucion de esta pagina 
			  //y previene que se cargue de nuevo esta vista (entrada.php)
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
?>