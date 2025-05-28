<?php
  
 // Solo iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
//REGISTRO EN BITÁCORA: solo si la sesión está activa y hay un usuario definido
$bitacora = new bitacora();
$bitacora->set_usuario($_SESSION['usuario']);
$resultado = $bitacora->registrarAccion('prefacturacion', 'Ingreso a Prefacturación');

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
	  
	  if(!empty($_POST)){
		  
		$o = new salida(); 	
		$accion = $_POST['accion'];
		if($accion=='listadoclientes'){
			$respuesta = $o->listadocliente();
			echo json_encode($respuesta);
		}
		elseif($accion=='listadoproductos'){
			$respuesta = $o->listadoproductos();
			echo json_encode($respuesta);
		}
		elseif($accion=='registrar'){
		    $respuesta = $o->registrar($_POST['idcliente'],$_POST['idp'],$_POST['cant'],$_POST['resta']);
			echo json_encode($respuesta);
	    }
		exit; 
	  }
	 
	  require_once("vista/".$pagina.".php"); 
  }
  else{
	  echo "pagina en construccion";
  }
?>