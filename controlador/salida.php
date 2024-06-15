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
	  
	  
	  
	  
	  $o = new salida_producto();
	  
	  if(!empty($_POST)){
		  
		$mensaje = $o-> incluir($_POST['cedula_cliente'],$_POST['codiigo_producto'],$_POST['cifra'],$_POST['fecha']);
	  }
	  $consultaproductos = $o->listadodeproductos();
	  $consultaprecios = $o->listadodeprecios();
	  require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "pagina en construccion";
  }
?>