<?php
  
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
	  
	  $o = new empleados(); //ahora nuestro objeto se llama $o y es una copia en memoria de la clase empleados
	  
	  if(!empty($_POST)){
		  
		  // se recibio informacion de la vista 
		  $accion = $_POST['accion'];
		  	  $o->set_cedula($_POST['cedula']);
			  $o->set_nombre_apellido($_POST['nombre_apellido']);
			  $o->set_telefono($_POST['telefono']);
			  $o->set_correo($_POST['correo']);
			  $o->set_direccion($_POST['direccion']);
			  $o->set_fechaNacimiento($_POST['fechaNacimiento']);

			  if($accion=='incluir'){
				echo  json_encode($o->incluir());
			  }

			  elseif($accion=='modificar'){
				echo  json_encode($o->modificar());
			  }
		
		  elseif($accion=='eliminar'){
			 $o->set_cedula($_POST['cedula']);
			 echo  json_encode($o->eliminar());
		  }
	  }
	  $consulta = $o->consultar();
	  
	  require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "pagina en construccion";
  }
?>
