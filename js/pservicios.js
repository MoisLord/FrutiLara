$(document).ready(function(){
    // Cargar la lista de servicios al iniciar
    carga_servicios();
    
    // Evento para mostrar el modal de servicios
    $("#listadodeservicios").on("click", function(){
        $("#modalservicios").modal("show");
    });
    
    // Evento para buscar servicios por código
    $("#codigoservicios").on("keyup", function(){
        var codigo = $(this).val();
        var encontro = false;
        
        $("#listadoservicios tr").each(function(){
            if(codigo == $(this).find("td:eq(0)").text()){ // Busca por código de servicio
                colocaservicios($(this));
                encontro = true;
            } 
        });
        
        if(!encontro){
            $("#datosdelservicio").html("");
        }
    });
    
    // Evento para registrar el pago de servicio
    $("#registrar").on("click", function(){
        if(existeservicio() == true){
            $('#accion').val('registrar');
            var datos = new FormData($('#f')[0]);
            
            enviaAjax(datos);
        }
        else{
            muestraMensaje("Debe ingresar un servicio válido !!!");
        }
    });
});

// Función para cargar los servicios desde el servidor
function carga_servicios(){
    var datos = new FormData();
    datos.append('accion', 'listadoservicios');
    enviaAjax(datos);
}

// Función para verificar si existe el servicio
function existeservicio(){
    var codigo = $("#codigoservicios").val();
    var existe = false;
    
    $("#listadoservicios tr").each(function(){
        if(codigo == $(this).find("td:eq(0)").text()){
            existe = true;
        }
    });
    
    return existe;
}

// Función para colocar los datos del servicio en el formulario
function colocaservicios(linea){
    $("#codigoservicios").val($(linea).find("td:eq(0)").text());
    $("#idservicios").val($(linea).find("td:eq(0)").text()); // Asumiendo que el ID es el mismo que el código
    $("#datosdelservicio").html($(linea).find("td:eq(1)").text());
    $("#modalservicios").modal("hide");
}

// Función para mostrar mensajes al usuario
function muestraMensaje(mensaje){
    $("#contenidodemodal").html(mensaje);
    $("#mostrarmodal").modal("show");
    setTimeout(function() {
        $("#mostrarmodal").modal("hide");
    }, 5000);
}

// Función para enviar datos via AJAX
function enviaAjax(datos){
    $.ajax({
        async: true,
        url: '',
        type: 'POST',
        contentType: false,
        data: datos,
        processData: false,
        cache: false,
        beforeSend: function(){
            $("#loader").show();
        },
        timeout: 10000,
        success: function(respuesta) {
            try {
                var lee = JSON.parse(respuesta);    
                console.log(lee.resultado);
                
                if(lee.resultado == 'listadoservicios'){
                    $('#listadoservicios').html(lee.mensaje);
                }
                else if(lee.resultado == 'registrar'){
                    muestraMensaje(lee.mensaje);
                    // Limpiar el formulario después de registrar
                    $("#f")[0].reset();
                    $("#datosdelservicio").html("");
                }
                else if(lee.resultado == 'error'){
                    muestraMensaje(lee.mensaje);
                }
            }
            catch(e){
                alert("Error en JSON "+e.name+" !!!");
            }
        },
        error: function(request, status, err){
            if (status == "timeout") {
                muestraMensaje("Servidor ocupado, intente de nuevo");
            } else {
                muestraMensaje("ERROR: <br/>" + request + status + err);
            }
        },
        complete: function(){
            $("#loader").hide();
        }
    });
}