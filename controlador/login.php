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
				$_SESSION['nivel'] = $m['mensaje'];
				$_SESSION['usuario'] = $_POST['cedula']; // Guardar cédula como usuario
				
				// 🔴 Registra en bitácora (aquí se confirma que el login fue exitoso)
				require_once("controlador/ControlBitacora.php");
				$bitacora = new ContBitacora();
				$bitacora->registrarAccion($_POST['cedula'], 'Sistema', 'Inició sesión');
				
				header('Location:?pagina=principal');
				die();
			
			} else{
				// 🔴 Aqui Registra intento fallido
				require_once("controlador/ControlBitacora.php");
				$bitacora = new ContBitacora();
				$bitacora->registrarAccion($_POST['cedula'], 'Sistema', 'Intento fallido de inicio de sesión');
        
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