
<?php
 // Solo iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
	session_start();

	//REGISTRO EN BITÁCORA: solo si la sesión está activa y hay un usuario definido
$bitacora = new bitacora();
$bitacora->set_usuario($_SESSION['usuario']);
$resultado = $bitacora->incluir('productos', 'Ingreso a Productos');
}

//llamada al archivo que contiene la clase
//productosaj, en ella estara el codigo que me permitirá
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
	  
	  $o = new productosaj(); //ahora nuestro objeto se llama $o y es una copia en memoria de la clase productosaj
	  
	  if(!empty($_POST)){
		  
		  // se recibio informacion de la vista 
		  $accion = $_POST['accion'];
		  
		  if($accion=='consultar'){
			 echo json_encode($o->consultar());  
		  }
		  elseif($accion=='consultatr'){
			 $o->set_codigo($_POST['codigo']); 
			 echo json_encode($o->consultatr());  
		  }

		  elseif($accion=='eliminar'){
			 $o->set_codigo($_POST['codigo']);
			 echo json_encode($o->eliminar());
		  }
		  
		 elseif($accion=='listadoCategoria'){
			$respuesta = $o->listadocategoria();
			echo json_encode($respuesta);
		 }
		 elseif($accion=='consultaDelete'){
			$respuesta = $o->consultadelete();
			echo json_encode($respuesta);
		 }

		 elseif($accion=='restaurar'){
			$o->set_codigo($_POST['codigo']);
			 echo  json_encode($o->restaurar());
		 }
		  else{
			  $o->set_codigo($_POST['codigo']);
			  $o->set_nombre($_POST['nombre']);
			  $o->set_cantidad_total($_POST['cantidad_total']);
			  $o->set_nacionalidad_producto($_POST['nacionalidad_producto']);
			  $o->set_minimo($_POST['minimo']);
			  $o->set_maximo($_POST['maximo']);
			  $o->set_id_categoria($_POST['id_categoria']);
			  $o->set_marca_id_marca($_POST['marca_id_marca']);
			  $o->set_unidades_de_medida_id_medidas($_POST['unidades_de_medida_id_medidas']);
			  $o->set_estado_registro($_POST['estado_registro']);
			  if($accion=='incluir'){
				echo json_encode($o->incluir());
			  }
			  elseif($accion=='modificar'){
				echo json_encode($o->modificar());
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