<?php

// Solo iniciar sesión si no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    
    $bitacora = new bitacora();
    $bitacora->set_usuario($_SESSION['usuario']);
    $bitacora = $bitacora->incluir('gestión de pagos', 'Ingreso a Gestión de Pagos');
}

if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
}  

require_once("modelo/".$pagina.".php");  

if(is_file("vista/".$pagina.".php")){
      
    if(!empty($_POST)){
          
        $o = new gestion_pagos();     
    
        $accion = $_POST['accion'];
        
        if($accion=='listado_referencias'){
            $respuesta = $o->listado_referencias($_POST['tipo']);
            echo json_encode($respuesta);
        }
        elseif($accion=='listado_pagos'){
            $respuesta = $o->listado_pagos();
            echo json_encode($respuesta);
        }
        elseif($accion=='registrar'){
            $respuesta = $o->registrar(
                $_POST['tipo_pago'],
                $_POST['referencia_id'],
                $_POST['descripcion_referencia'],
                $_POST['monto_costo'],
                $_POST['fecha_pago'],
                $_POST['metodo_pago'],
                $_POST['observaciones'],
                $_POST['estado_registro']
            );
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