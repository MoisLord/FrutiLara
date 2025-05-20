<?php
  //verifica que exista la vista de
  //la pagina
  if(is_file("vista/".$pagina.".php")){
      // Validación Google reCAPTCHA
      if(!empty($_POST)){
          $recaptchaResponse = $_POST['g-recaptcha-response'] ?? '';
          $secret = '6LfsI0ErAAAAAIqU8Uzpr7ubzRccjwU0ifm3Yd9O'; // <-- Clave secreta reCAPTCHA
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
      }
      require_once("vista/".$pagina.".php"); 
  }
  else{
      echo "pagina en construccion";
  }
?>