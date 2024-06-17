
$(document).ready(function(){
    //para mostrar en modal mensajes del servidor	
    if($.trim($("#mensajes").text()) != ""){
        muestraMensaje($("#mensajes").html());
    }
    //Fin de seccion de mostrar envio en modal mensaje//	
        
    //boton para levantar modal de areas
    $("#listadodeareas").on("click",function(){
        $("#modalareas").modal("show");
    });
    
    //boton para levantar modal de equipo
    $("#listadodeequipo").on("click",function(){
        $("#modalequipo").modal("show");
    });
    
    
    //evento keyup de input de area	
    $("#area").on("keyup",function(){
        var areas = $(this).val();
        var encontro = false;
        $("#listadodeareas tr").each(function(){
            if(areas == $(this).find("td:eq(1)").text()){
                colocacliente($(this));
                encontro = true;
            } 
        });
        if(!encontro){
            $("#datosdelarea").html("");
        }
    });	
    
    //evento keyup de input de equipo
    $("#codequipo").on("keyup",function(){
        var codigo = $(this).val();
        $("#listadodeequipo tr").each(function(){
            if(codigo == $(this).find("td:eq(1)").text()){
                colocaequipo($(this));
            }
        });
    });	
    
    //evento click de boton Registrar
    $("#registrar").on("click",function(){
                $("#f").submit();
           
    });
        
        
    });
    
    
    //funcion para colocar datos del area en pantalla
    function colocaarea(linea){
        $("#idArea").val($(linea).find("td:eq(0)").text());
        $("#nomArea").val($(linea).find("td:eq(1)").text());
    }
    
    //fin de colocar datos del area

    //funcion para colocar datos del equipo en pantalla
    function colocaequipo(linea){
        $("#CodEquipo").val($(linea).find("td:eq(0)").text());
        $("#tipEquipo").val($(linea).find("td:eq(2)").text());
        $("#estadEquipo").val($(linea).find("td:eq(4)").text());
        
    }
    
    //fin de colocar datos del equipo
    
    
    
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
    
    function coloca(linea){
        $("#registrar").val($(linea).find("td:eq(0)").text());
        $("#area").val($(linea).find("td:eq(1)").text());
        $("#codequipo").val($(linea).find("td:eq(2)").text());
    }
    function redondearDecimales(numero, decimales) {
        return Number(Math.round(numero +'e'+ decimales) +'e-'+ decimales).toFixed(decimales);
        
    }