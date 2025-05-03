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
	  
	  $servicios = new servicios(); //ahora nuestro objeto se llama $o y es una copia en memoria de la clase empleados
	  
	  if(!empty($_POST)){
		  
		  // se recibio informacion de la vista 
		   $accion = $_POST['accion'];
		  
		  if($accion=='consultar'){
			 echo  json_encode($o->consultar());  
		  }
		  elseif($accion=='consultatr'){
			 $o->set_codigo_servicio($_POST['codigo_servicio']); 
			 echo  json_encode($o->consultatr());  
		  }

		  elseif($accion=='eliminar'){
			 $o->set_codigo_servicio($_POST['codigo_servicio']);
			 echo  json_encode($o->eliminar());
		  }
		  else{		  
			  $servicios->set_codigo_servicio($_POST['codigo_servicio']);
			  $servicios->set_descripcion_servicio($_POST['descripcion_servicio']);
			  $servicios->set_estado_servicio($_POST['estado_servicio']);
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
