<?php
// Solo iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
	session_start();

// Registro en bitácora al ingresar al módulo

	$bitacora = new bitacora();
	$bitacora->set_usuario($_SESSION['usuario']);
	$resultado = $bitacora->incluir($_SESSION['usuario'], 'categoria', 'Ingresó al módulo de Categoria');
}
//llamada al archivo que contiene la clase
//Se verificara que en el modelo exista el archivo
if (!is_file("modelo/".$pagina.".php")){
	//si no existe se envía un mensaje
	echo "Falta definir la clase ".$pagina;
	exit;
}  
//lo primero que se debe hacer es verificar que en el modelo exista el archivo
require_once("modelo/".$pagina.".php");  
  if(is_file("vista/".$pagina.".php")){
	  
	  //Se realiza una instancia de la clase

	  $o = new categoria(); 
	  //ahora nuestro objeto se llama $o y es una copia en memoria de la clase categoria
	  
	  if(!empty($_POST)){
		  
		  //Se guardan los valores dentro de la clase con los metodos set
		  $accion = $_POST['accion'];
		  
		  if($accion=='consultar'){
			 echo  json_encode($o->consultar());  
		  }
		  elseif($accion=='consultatr'){
			 $o->set_codigo_categoria($_POST['codigo_categoria']); 
			 echo  json_encode($o->consultatr());  
		  }

		  elseif($accion=='eliminar'){
			 $o->set_codigo_categoria($_POST['codigo_categoria']);
			 echo  json_encode($o->eliminar());
		  }
		  elseif($accion=='consultaDelete'){
			$respuesta = $o->consultadelete();
			echo json_encode($respuesta);
		 }

		 elseif($accion=='restaurar'){
			$o->set_codigo_categoria($_POST['codigo_categoria']);
			 echo  json_encode($o->restaurar());
		 }
		  else{		  
			  $o->set_codigo_categoria($_POST['codigo_categoria']);
			  $o->set_descripcion_categoria($_POST['descripcion_categoria']);
			  $o->set_unidadMedNormal($_POST['unidadMedNormal']);
			  $o->set_unidadMedAlt($_POST['unidadMedAlt']);
			  $o->set_estado_registro($_POST['estado_registro']);
			  if($accion=='incluir'){
				echo  json_encode($o->incluir());
			  }
			  elseif($accion=='modificar'){
				echo  json_encode($o->modificar());
			  }
		  }
		  exit;
	  }
	  
	  
	  require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "pagina en construccion";
  }
?>