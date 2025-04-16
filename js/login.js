$(document).ready(function(){

    //Seccion para mostrar lo enviado en el modal mensaje//
    
    //Función que verifica que exista algo dentro de un div
    //oculto y lo muestra por el modal
    if($.trim($("#mensajes").text()) != ""){
        muestraMensaje($("#mensajes").html());
    }
    //Fin de seccion de mostrar envio en modal mensaje//		
        
        
        $("#cedula").on("keypress",function(e){
            validarkeypress(/^[0-9-\b]*$/,e);
        });
        
        $("#cedula").on("keyup",function(){
            validarkeyup(/^[0-9]{7,8}$/,$(this),
            $("#scedula"),"El formato debe ser 9999999 ");
        });
        
        $("#clave").on("keypress",function(e){
            validarkeypress(/^[A-Za-z0-9\b]*$/,e);
        });
        
        $("#clave").on("keyup",function(){
            
            validarkeyup(/^[A-Za-z0-9]{7,15}$/,
            $(this),$("#sclave"),"Solo letras y numeros entre 7 y 15 caracteres");
        });
        
        
        
    //FIN DE VALIDACION DE DATOS
    
    
    
    //CONTROL DE BOTONES
    
    
    $("#entrar").on("click",function(){
        if(validarenvio()){
    
            $("#accion").val("entrar");	
            $("#f").submit();
            
        }
    });
    
    
    
    
        
        
    });
    
    //Validación de todos los campos antes del envio
    function validarenvio(){
        if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
            $("#scedula"),"El formato debe ser 9999999")==0){
            muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
                            "99999999");	
            return false;					
        }	
        else if(validarkeyup(/^[A-Za-z0-9]{7,15}$/,
            $("#clave"),$("#sclave"),"Solo letras y numeros entre 7 y 15 caracteres")==0){
            muestraMensaje("Nombres <br/>Solo letras y numeros entre 7 y 15 caracteres");
            return false;
        }
        
        
        return true;
    }
    
    
    //Funcion que muestra el modal con un mensaje
    function muestraMensaje(mensaje){
        
        $("#contenidodemodal").html(mensaje);
                $("#mostrarmodal").modal("show");
                setTimeout(function() {
                        $("#mostrarmodal").modal("hide");
                },5000);
    }
    
    
    //Función para validar por Keypress
    function validarkeypress(er,e){
        
        key = e.keyCode;
        
        
        tecla = String.fromCharCode(key);
        
        
        a = er.test(tecla);
        
        if(!a){
        
            e.preventDefault();
        }
        
        
    }
    //Función para validar por keyup
    function validarkeyup(er,etiqueta,etiquetamensaje,
    mensaje){
        a = er.test(etiqueta.val());
        if(a){
            etiquetamensaje.text("");
            return 1;
        }
        else{
            etiquetamensaje.text(mensaje);
            return 0;
        }
    }

// Inicio de revelar clave
// Seleccionamos los elementos de los iconos de los Ojos
