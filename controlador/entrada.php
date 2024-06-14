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
	  
	  
	  
	  
	  $o = new entrada(); 
	  
	  if(!empty($_POST)){
		  
		//$mensaje = count($_POST['idp']);
		$mensaje = $o->facturar($_POST['idcliente'],$_POST['idp'],$_POST['cant'],$_POST['pvp']);
		 
	  }
	  $consultaclientes = $o->listadodeclientes();
	  $consultaproductos = $o->listadodeproductos();
	  require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "pagina en construccion";
  }
?>
