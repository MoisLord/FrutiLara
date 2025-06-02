<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    
    $bitacora = new bitacora();
    $bitacora->set_usuario($_SESSION['usuario']);
    $resultado = $bitacora->incluir($_SESSION['usuario'], 'categoria', 'Ingresó al módulo de Categoria');
}

if (!is_file("modelo/".$pagina.".php")){
    echo "Falta definir la clase ".$pagina;
    exit;
}  

require_once("modelo/".$pagina.".php");  
require_once("modelo/unidades_de_medida.php"); // Incluir el nuevo modelo

if(is_file("vista/".$pagina.".php")){
    $o = new categoria();
    $u = new unidades_de_medida(); // Instancia de unidades de medida
    
    if(!empty($_POST)){
        $accion = $_POST['accion'];
        
        if($accion=='consultar'){
            echo json_encode($o->consultar());  
        }
        elseif($accion=='consultatr'){
            $o->set_codigo_categoria($_POST['codigo_categoria']); 
            echo json_encode($o->consultatr());  
        }
        elseif($accion=='eliminar'){
            $o->set_codigo_categoria($_POST['codigo_categoria']);
            echo json_encode($o->eliminar());
        }
        elseif($accion=='consultaDelete'){
            $respuesta = $o->consultadelete();
            echo json_encode($respuesta);
        }
        elseif($accion=='restaurar'){
            $o->set_codigo_categoria($_POST['codigo_categoria']);
            echo json_encode($o->restaurar());
        }
        else{
            // Asignar valores comunes
            $o->set_codigo_categoria($_POST['codigo_categoria']);
            $o->set_descripcion_categoria($_POST['descripcion_categoria']);
            $o->set_estado_registro($_POST['estado_registro']);
            
            // Asignar valores a unidades de medida
            $u->set_codigo_medida($_POST['codigo_categoria']); // Usar mismo código para relación
            $u->set_unidadMedNormal($_POST['unidadMedNormal']);
            $u->set_unidadMedAlt($_POST['unidadMedAlt']);
            $u->set_estado_registro($_POST['estado_registro']);
            
            if($accion=='incluir'){
                // Primero registrar la categoría
                $resultado_categoria = $o->incluir();
                
                if($resultado_categoria['resultado'] == 'incluir'){
                    // Si se registró la categoría, registrar las unidades de medida
                    $resultado_unidades = $u->incluir();
                    
                    if($resultado_unidades['resultado'] == 'incluir'){
                        // Ambos registros exitosos
                        $respuesta = array(
                            'resultado' => 'incluir',
                            'mensaje' => 'Categoría y unidades de medida registradas correctamente',
                            'id_categoria' => $resultado_categoria['id_categoria'],
                            'id_medidas' => $resultado_unidades['id_medidas']
                        );
                    } else {
                        // Error al registrar unidades, revertir categoría
                        $o->eliminar();
                        $respuesta = array(
                            'resultado' => 'error',
                            'mensaje' => 'Error al registrar unidades de medida: '.$resultado_unidades['mensaje']
                        );
                    }
                } else {
                    // Error al registrar categoría
                    $respuesta = $resultado_categoria;
                }
                
                echo json_encode($respuesta);
            }
            elseif($accion=='modificar'){
                // Modificar categoría
                $resultado_categoria = $o->modificar();
                
                if($resultado_categoria['resultado'] == 'modificar'){
                    // Modificar unidades de medida
                    $resultado_unidades = $u->modificar();
                    
                    if($resultado_unidades['resultado'] == 'modificar'){
                        $respuesta = array(
                            'resultado' => 'modificar',
                            'mensaje' => 'Categoría y unidades de medida actualizadas correctamente'
                        );
                    } else {
                        $respuesta = array(
                            'resultado' => 'error',
                            'mensaje' => 'Error al actualizar unidades de medida: '.$resultado_unidades['mensaje']
                        );
                    }
                } else {
                    $respuesta = $resultado_categoria;
                }
                
                echo json_encode($respuesta);
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