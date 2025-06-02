<?php
// Solo iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
	session_start();

	$bitacora = new ContBitacora();
	$bitacora->set_usuario($_SESSION['usuario']);
	$bitacora->registrarAccion($_SESSION['usuario'], 'Cliente', 'Ingresó al módulo de Cliente');
}
  
//llamada al archivo que contiene la clase
//empleados, en ella estara el codigo que me permitirá
//guardar, consultar y modificar dentro de mi base de datos


//verificar que exista el archivo
if (!is_file("modelo/".$pagina.".php")){
	//busca el archivo si no existe manda el siguiente mensaje
	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
  if(is_file("vista/".$pagina.".php")){
	  
	   //si existe creamos una intancia que es una variable local
	  
	  $cliente = new cliente(); //ahora nuestro objeto se llama $cliente y es una copia en memoria de la clase Cliente
	  
	  if(!empty($_POST)){
		  
		  // se recibio informacion de la vista 
		  $accion = $_POST['accion'];
		  
		  if($accion=='consultar'){
			 echo  json_encode($cliente->consultar());  
		  }
		  elseif($accion=='consultatr'){
			 $cliente->set_cedula($_POST['cedula']); 
			 echo  json_encode($cliente->consultatr());  
		  }

		  elseif($accion=='eliminar'){
			 $cliente->set_cedula($_POST['cedula']);
			 echo  json_encode($cliente->eliminar());
		  }

		  elseif($accion=='consultaDelete'){
			$respuesta = $cliente->consultadelete();
			echo json_encode($respuesta);
		 }

		 elseif($accion=='restaurar'){
			$cliente->set_cedula($_POST['cedula']);
			 echo  json_encode($cliente->restaurar());
		 }
		 
		  else{		  
			  $cliente->set_cedula($_POST['cedula']);
			  $cliente->set_nombre_apellido($_POST['nombre_apellido']);
			  $cliente->set_telefono($_POST['telefono']);
			  $cliente->set_direccion($_POST['direccion']);
			  $cliente->set_estado_registro($_POST['estado_registro']);
			  if($accion=='incluir'){
				echo  json_encode($cliente->incluir());
			  }
			  elseif($accion=='modificar'){
				echo  json_encode($cliente->modificar());
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
