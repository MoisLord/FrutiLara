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
            if(codigo == $(this).find("td:eq(0)").text()){
                colocaservicios($(this));
                encontro = true;
            } 
        });
        
        if(!encontro && codigo != ""){
            muestraMensaje("Servicio no encontrado");
        }
    });
    
    // Evento para agregar servicio a la tabla temporal
    $("#agregar").on("click", function(){
        if(validarCamposServicio()){
            agregarServicioATabla();
            limpiarCamposServicio();
        }
    });
    
    // Evento para registrar todos los servicios en BD
    $("#registrar").on("click", function(){
        if($("#pservicios tr").length > 0){
            registrarServicios();
        }
        else{
            muestraMensaje("Debe agregar al menos un servicio para registrar");
        }
    });
});

// Función para validar campos del servicio
function validarCamposServicio(){
    var valido = true;
    
    if($("#codigoservicios").val() == ""){
        muestraMensaje("Debe seleccionar un servicio");
        valido = false;
    }
    else if($("#costo").val() == "" || isNaN($("#costo").val())){
        muestraMensaje("Debe ingresar un costo válido");
        valido = false;
    }
    else if($("#fservicio").val() == ""){
        muestraMensaje("Debe seleccionar una fecha de pago");
        valido = false;
    }
    
    return valido;
}

// Función para agregar servicio a la tabla temporal
function agregarServicioATabla() {
    var servicio = $("#datosdelservicio").text();
    var codigo_servicio = $("#codigoservicios").val();
    var id_servicio = $("#idservicios").val();
    var costo = $("#costo").val();
    var metodoPago = $("#spago").val();
    var fechaPago = $("#fservicio").val();
    
    // Crear la fila para la tabla
    var fila = `
        <tr data-id="${id_servicio}" data-codigo="${codigo_servicio}">
            <td>
                <button type="button" class="btn btn-danger" onclick="eliminarFila(this)">X</button>
            </td>
            <td>
                <input type="hidden" name="id_servicios[]" value="${id_servicio}">
                <input type="hidden" name="servicios_codigo_servicio[]" value="${codigo_servicio}">
                ${servicio}
            </td>
            <td>
                <input type="hidden" name="costo[]" value="${costo}">
                ${costo}
            </td>
            <td>
                <input type="hidden" name="pago[]" value="${metodoPago}">
                ${metodoPago}
            </td>
            <td>
                <input type="hidden" name="fecha_pago_servicio[]" value="${fechaPago}">
                ${fechaPago}
            </td>
        </tr>
    `;
    
    // Agregar la fila a la tabla
    $("#pservicios").append(fila);
}

// Función para limpiar campos después de agregar
function limpiarCamposServicio() {
    $("#codigoservicios").val("");
    $("#idservicios").val("");
    $("#costo").val("");
    $("#datosdelservicio").html("");
}

// Función para registrar servicios en BD
function registrarServicios() {
    if(confirm("¿Está seguro que desea registrar estos pagos de servicios?")){
        $('#accion').val('registrar');
        var datos = new FormData($('#f')[0]);
        
        enviaAjax(datos);
    }
}

// Función para eliminar fila de la tabla
function eliminarFila(boton) {
    $(boton).closest('tr').remove();
}

// Función para cargar servicios desde BD
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

// Función para colocar datos del servicio en el formulario
function colocaservicios(linea){
    $("#codigoservicios").val($(linea).find("td:eq(0)").text());
    $("#idservicios").val($(linea).find("td:eq(0)").text());
    $("#datosdelservicio").html($(linea).find("td:eq(1)").text());
    $("#modalservicios").modal("hide");
}

// Función para mostrar mensajes
function muestraMensaje(mensaje){
    $("#contenidodemodal").html(mensaje);
    $("#mostrarmodal").modal("show");
    setTimeout(function() {
        $("#mostrarmodal").modal("hide");
    }, 5000);
}

// Función AJAX
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
                
                if(lee.resultado == 'listadoservicios'){
                    $('#listadoservicios').html(lee.mensaje);
                }
                else if(lee.resultado == 'registrar'){
                    muestraMensaje(lee.mensaje);
                    // Limpiar la tabla después de registrar
                    $("#pservicios").empty();
                    // Limpiar campos del formulario
                    limpiarCamposServicio();
                    $("#fservicio").val("");
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