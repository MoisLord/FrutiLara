<?php
if(!is_file("modelo/".$pagina.".php")){
    echo "Falta el modelo";
    exit;
}

require_once("modelo/".$pagina.".php"); 

if(is_file("vista/".$pagina.".php")){ 
    if(!empty($_POST)){
        $o = new login();
        
        if($_POST['accion']=='entrar'){
            session_start();
            $o->set_cedula($_POST['cedula']);
            $o->set_clave($_POST['clave']);  
            $m = $o->existe();
            
            if($m['resultado']=='existe'){
                $_SESSION['nivel'] = $m['mensaje'];
                $_SESSION['usuario'] = $_POST['cedula'];
                
                // Registrar inicio de sesión en bitácora
                require_once(__DIR__.'/../modelo/bitacora.php');
                $bitacora = new bitacora();
                $bitacora->set_usuario($_SESSION['usuario']);
                $bitacora->incluir('Autenticación', 'Inicio de sesión');
                
                header('Location:?pagina=principal');
                exit;
            }
            else{
                $mensaje = $m['mensaje'];
            }
        }
    }
    
    require_once("vista/".$pagina.".php"); 
}
else{
    echo "Falta la vista";
}
?>