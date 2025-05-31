<?php

// Solo iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
	session_start();

	$bitacora = new bitacora();
	$bitacora->set_usuario($_SESSION['usuario']);
	$resultado = $bitacora->incluir('bitacora', 'Ingreso a Bitácora');
}



//llamada al archivo que contiene la clase
//guardar osea incluir, consultar, eliminar y modificar dentro de la base de datos


//aqui hice verificar si al igual que en la vista existe el archivo
if (!is_file("modelo/" . $pagina . ".php")) {
	//alli pregunte que si no es un archivo se niega con (!)
	//si no existe envio mensaje y me salgo
	echo "Falta definir la clase " . $pagina;
	exit;
}
require_once("modelo/" . $pagina . ".php");
if (is_file("vista/" . $pagina . ".php")) {

	//bien si existe la vista y la clase, lo primero es realizar
	//una instancia de la clase (instanciar) es crear una variable local,
	//que contiene los metodos de la clase para poderlo usar

	/* 
		$o es un objeto que se esta creando de la clase marca
		a lo que vendria siendo una instancia de la clase marca
	*/
	$o = new bitacora(); //ahora nuestro objeto se llama $o y
	//es una copia en memoria de la clase Marca

	if (!empty($_POST)) {

		//ahora ya recibido alguna informacion
		//de la vista, ya se hace una clase para guardar
		//esos valores en ella con los metodos set
		//para poder guardarlos en la base de datos

		$accion = $_POST['accion'];

		if ($accion == 'consultar') {
			echo  json_encode($o->consultar());
		} elseif ($accion == 'consultar') {
			$o->set_id_bitacora($_POST['id_bitacora']);
			echo  json_encode($o->consultar());
		} elseif ($accion == 'eliminar') {
			$o->set_id_bitacora($_POST['id_bitacora']);
			echo  json_encode($o->eliminar());
		} elseif ($accion == 'consultaDelete') {
			$respuesta = $o->consultadelete();
			echo json_encode($respuesta);
		} elseif ($accion == 'restaurar') {
			$o->set_id_bitacora($_POST['id_bitacora']);
			echo  json_encode($o->restaurar());
		} else {
			$o->set_id_bitacora($_POST['id_bitacora']);
			$o->set_usuario($_POST['usuario']);
			$o->set_modulo($_POST['modulo']);
            $o->set_accion($_POST['accion']);
            $o->set_fecha($_POST['fecha']);
			if ($accion == 'incluir') {
				echo  json_encode($o->incluir());
			} elseif ($accion == 'modificar') {
				echo  json_encode($o->modificar());
			}
		}
		exit;
	}

	require_once("vista/" . $pagina . ".php");
} else {
	echo "pagina en construccion";
}