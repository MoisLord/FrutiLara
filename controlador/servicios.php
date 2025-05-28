<?php
  
 // Solo iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
	session_start();

    //REGISTRO EN BITÁCORA: solo si la sesión está activa y hay un usuario definido
$bitacora = new bitacora();
$bitacora->set_usuario($_SESSION['usuario']);
$resultado = $bitacora->registrarAccion('servicios', 'Ingreso a Servicios');
}

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
$o = new servicios(); // Instancia de la clase

if (!empty($_POST)) {
    $accion = $_POST['accion'];

    // Sanitizamos todos los valores de $_POST antes de usarlos
    foreach ($_POST as $key => $value) {
        $_POST[$key] = htmlspecialchars(strip_tags(trim($value)));
    }

    // Usamos switch para organizar mejor las acciones
    switch ($accion) {
        case 'consultar':
            echo json_encode($o->set_consultar());
            break;

        case 'consultatr':
            $o->set_codigo_servicio($_POST['codigo_servicio']);
            echo json_encode($o->set_consultatr());
            break;

        case 'eliminar':
            $o->set_codigo_servicio($_POST['codigo_servicio']);
            echo json_encode($o->set_eliminar());
            break;

        case 'consultaDelete':
            echo json_encode($o->set_consultadelete());
            break;

        case 'restaurar':
            $o->set_codigo_servicio($_POST['codigo_servicio']);
            echo json_encode($o->set_restaurar());
            break;

        case 'incluir':
        case 'modificar':
            // Asignación de datos con sanitización previa
            $o->set_codigo_servicio($_POST['codigo_servicio']);
            $o->set_descripcion_servicio($_POST['descripcion_servicio']);
            $o->set_estado_registro($_POST['estado_registro']);
            echo json_encode($accion == 'incluir' ? $o->set_incluir() : $o->set_modificar());
            break;

        default:
            echo json_encode(["resultado" => "error", "mensaje" => "Acción no válida"]);
            break;
    }
    exit;
}

// Si no hay POST, cargamos la vista
require_once("vista/".$pagina.".php");

?>