<?php
  
//llamada al archivo que contiene la clase
//usuarios, en ella estara el codigo que me //permitirá
//guardar, consultar y modificar dentro de mi base //de datos



if(is_file("vista/".$pagina.".php")){

		  
	require_once("vista/".$pagina.".php");
}
else{
	echo "Falta definir la vista";
}

?>
