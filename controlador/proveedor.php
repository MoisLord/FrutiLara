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
	  
	  
	  $o = new proveedor(); //ahora nuestro objeto //se llama $o y es una copia en memoria de la
	  //clase personasht
	  
	  if(!empty($_POST)){
		  
		  //como ya sabemos si estamos aca es //porque se recibio alguna informacion
		  //de la vista, por lo que lo primero que //debemos hacer ahora que tenemos una 
		  //clase es guardar esos valores en ella //con los metodos set
		  $accion = $_POST['accion'];
		  
		  if($accion=='consultar'){
			 echo  json_encode($o->consultar());  
		  }
		  elseif($accion=='consultatr'){
			 $o->set_rif($_POST['rif']); 
			 echo  json_encode($o->consultatr());  
		  }
		  
		  elseif($accion=='eliminar'){
			 $o->set_rif($_POST['rif']);
			 echo  json_encode($o->eliminar());
		  }

		  elseif($accion=='consultaDelete'){
			$respuesta = $o->consultadelete();
			echo json_encode($respuesta);
		 }

		 elseif($accion=='restaurar'){
			$o->set_rif($_POST['rif']);
			 echo  json_encode($o->restaurar());
		 }
		  else{		  
			  $o->set_rif($_POST['rif']);
			  $o->set_document($_POST['documento']);
			  $o->set_Nombre($_POST['Nombre']);
			  $o->set_Telefono($_POST['Telefono']);
			  $o->set_direccion($_POST['direccion']);
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
