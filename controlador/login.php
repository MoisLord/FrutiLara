<?php
  if(!is_file("modelo/".$pagina.".php")){
	  echo "Falta el modelo";
	  exit;
  }
  require_once("modelo/".$pagina.".php"); 
  if(is_file("vista/".$pagina.".php")){ 
	  if(!empty($_POST)){
		  // Validación Google reCAPTCHA
		  $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
		  $secret = 'TU_SECRET_KEY'; // <-- Reemplaza por tu clave secreta de reCAPTCHA
		  $curl = curl_init();
		  curl_setopt_array($curl, [
			  CURLOPT_URL => 'https://www.google.com/recaptcha/api/siteverify',
			  CURLOPT_RETURNTRANSFER => true,
			  CURLOPT_POST => true,
			  CURLOPT_POSTFIELDS => http_build_query([
				  'secret' => $secret,
				  'response' => $recaptchaResponse,
				  'remoteip' => $_SERVER['REMOTE_ADDR']
			  ]),
		  ]);
		  $response = curl_exec($curl);
		  curl_close($curl);
		  $respData = json_decode($response, true);
		  if (empty($respData['success'])) {
			  $mensaje = 'Captcha inválido, inténtalo de nuevo.';
			  require_once("vista/".$pagina.".php");
			  exit;
		  }

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
