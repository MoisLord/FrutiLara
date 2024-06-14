<?php
  
//llamada al archivo que contiene la clase
//usuarios, en ella estara el codigo que me //permitirá
//guardar, consultar y modificar dentro de mi base //de datos


//lo primero que se debe hacer es verificar al //igual que en la vista que exista el archivo
if (!is_file("modelo/".$pagina.".php")){
	//alli pregunte que si no es archivo se niega //con !
	//si no existe envio mensaje y me salgo
	echo "Falta definir la clase ".$pagina;
	exit;
}  
require_once("modelo/".$pagina.".php");  
  if(is_file("vista/".$pagina.".php")){
	  
	  //bien si estamos aca es porque existe la //vista y la clase
	  //por lo que lo primero que debemos hace es //realizar una instancia de la clase
	  //instanciar es crear una variable local, //que contiene los metodos de la clase
	  //para poderlos usar
	  
	  
	  
	  
	  
	  if(!empty($_POST)){
		$o = new personasaj2();   
		  //como ya sabemos si estamos aca es //porque se recibio alguna informacion
		  //de la vista, por lo que lo primero que //debemos hacer ahora que tenemos una 
		  //clase es guardar esos valores en ella //con los metodos set
		  $accion = $_POST['accion'];
		  
		  if($accion=='consultar'){
			 echo  json_encode($o->consultar());  
		  }
		  else if($accion=='obtienefecha'){
			 echo json_encode($o->obtienefecha());
		  }
		  elseif($accion=='eliminar'){
			 $o->set_cedula($_POST['cedula']);
			 echo  json_encode($o->eliminar());
		  }
		  else{		  
			  $o->set_cedula($_POST['cedula']);
			  $o->set_apellidos($_POST['apellidos']);
			  $o->set_nombres($_POST['nombres']);
			  $o->set_fechadenacimiento($_POST['fechadenacimiento']);
			//  if(!empty($_POST['sexo'])){
			  $o->set_sexo($_POST['sexo']);
			//  }
			  $o->set_gradodeinstruccion($_POST['gradodeinstruccion']);
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
