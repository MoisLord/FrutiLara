<?php
  



//lo primero que se debe hacer es verificar al igual que en la vista es que exista el archivo
if (!is_file("modelo/".$pagina.".php")){
	//alli pregunte que si no es archivo se niega con !
	//si no existe envio mensaje y me salgo
	echo "Falta definir la clase ".$pagina;
	exit;
}
else{
//llamda al archivo que contiene la clase
//rusuarios, en ella estara el codigo que me premitira
//generar el reporte haciando uso de la libreria DOMPDF
require_once('modelo/reporteinventario.php');
}
  
  if(is_file("vista/".$pagina.".php")){
	  
	  //bien si estamos aca es porque existe la vista y la clase
	  //por lo que lo primero que debemos hace es realizar una instancia de la clase
	  //instanciar es crear una variable local, que contiene los metodos de la clase
	  //para poderlos usar
	  
	  $o = new reporteinventario(); //ahora nuestro objeto se llama $o y es una copia en memoria de la
	  //clase rusuarios
	  
	  if(isset($_POST['generar'])){
		  $o = new reporteinventario();
		  $o->set_codigo($_POST['Codigo']);
		  $o->set_nombre($_POST['nombre']);
		  $o->set_categoria($_POST['categoria']);
		  $o->set_modelo($_POST['modelo']);
		  $o->set_cantidad($_POST['cantidad']);
		  $o->set_minimo($_POST['minimo']);
          $o->set_maximo($_POST['maximo']);
		  $o->generarPDF();
	  }
	  
	  require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "pagina en construccion";
  }
?>