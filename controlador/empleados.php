<?php

// Solo iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
	session_start();
}
//REGISTRO EN BITÁCORA: solo si la sesión está activa y hay un usuario definido
if (isset($_SESSION['usuario'])) {
	require_once("app/controllers/ControlBitacora.php");
	$bitacora = new ContBitacora();
	$bitacora->registrarAccion($_SESSION['usuario'], 'Empleado', 'Ingresó al módulo de Empleado');
}
//llamada al archivo que contiene la clase
//empleados, en ella estara el codigo que me permitirá
//guardar, consultar y modificar dentro de mi base de datos


//verificar que exista el archivo
if (!is_file("modelo/" . $pagina . ".php")) {
	//busca el archivo si no existe manda el siguiente mensaje
	echo "Falta definir la clase " . $pagina;
	exit;
}
require_once("modelo/" . $pagina . ".php");

if (is_file("vista/" . $pagina . ".php")) {

	//si existe creamos una intancia que es una variable local

	$empleado = new empleados(); //ahora nuestro objeto se llama $o y es una copia en memoria de la clase empleados

	if (!empty($_POST)) {

		// se recibio informacion de la vista 
		$accion = $_POST['accion'];

		if ($accion == 'consultar') {
			echo  json_encode($o->consultar());
		} elseif ($accion == 'consultatr') {
			$o->set_cedula($_POST['cedula']);
			echo  json_encode($o->consultatr());
		} elseif ($accion == 'eliminar') {
			$o->set_cedula($_POST['cedula']);
			echo  json_encode($o->eliminar());
		} else {
			$empleado->set_cedula($_POST['cedula']);
			$empleado->set_nombre_apellido($_POST['nombre_apellido']);
			$empleado->set_telefono($_POST['telefono']);
			$empleado->set_correo($_POST['correo']);
			$empleado->set_direccion($_POST['direccion']);
			$empleado->set_fechaNacimiento($_POST['fechaNacimiento']);
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
