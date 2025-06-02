function consultar() {
    var datos = new FormData();
    datos.append('accion','consultar');
    enviaAjax(datos);
}

$(document).ready(function(){
    consultar();
    carga_categoria();

    $("#codigo_categoria").on("keyup",function(){
        var codigo = $(this).val();
        var encontro = false;
        $("#consultaDelete tr").each(function(){
            if(codigo == $(this).find("td:eq(1)").text()){
                coloca($(this));
                encontro = true;
            } 
        });
        if(!encontro){
            $("#datoscategoria").html("");
        }
    });	
    
    // Validación de datos
    $("#codigo_categoria").on("keypress",function(e){
        validarkeypress(/^[A-Za-z0-9-\b]*$/,e);
    });
    
    $("#codigo_categoria").on("keyup",function(){
        validarkeyup(/^[A-Za-z0-9]{7,8}$/,$(this),
        $("#scodigo_categoria"),"Ejemplo:Hort290");
        if($("#codigo_categoria").val().length > 7){
          var datos = new FormData();
            datos.append('accion','consultatr');
            datos.append('codigo_categoria',$(this).val());
            enviaAjax(datos,'consultatr');	
        }
    });
    
    $("#descripcion_categoria").on("keypress", function(e) {
        validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
    });
    
    $("#descripcion_categoria").on("keyup", function() {
        validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,20}$/, $(this), $("#sdescripcion_categoria"), "Ejemplo:Viveres");
    });
    
    function carga_categoria(){
        var datos = new FormData();
        datos.append('accion','consultaDelete');
        enviaAjax(datos);
    }
    
    // Control de botones
    $("#incluir").on("click",function(){
        if(validarenvio()){
            var datos = new FormData();
            datos.append('accion','incluir');
            datos.append('codigo_categoria',$("#codigo_categoria").val());
            datos.append('descripcion_categoria',$("#descripcion_categoria").val());
            datos.append('unidadMedNormal',$("#unidadMedNormal").val());
            datos.append('unidadMedAlt',$("#unidadMedAlt").val());
            datos.append('estado_registro',1);
            
            // Mostrar mensaje de carga
            muestraMensaje("Procesando registro...");
            
            enviaAjax(datos);
        }
    });
    
    $("#modificar").on("click",function(){
        if(validarenvio()){
            var datos = new FormData();
            datos.append('accion','modificar');
            datos.append('codigo_categoria',$("#codigo_categoria").val());
            datos.append('descripcion_categoria',$("#descripcion_categoria").val());
            datos.append('unidadMedNormal',$("#unidadMedNormal").val());
            datos.append('unidadMedAlt',$("#unidadMedAlt").val());
            datos.append('estado_registro',1);
            
            muestraMensaje("Procesando actualización...");
            enviaAjax(datos);
        }
    });
    
    $("#eliminar").on("click",function(){
        if(validarkeyup(/^[A-Za-z0-9]{7,8}$/,$("#codigo_categoria"),
            $("#scodigo_categoria"),"El formato debe ser Alfanumerico")==0){
            muestraMensaje("El codigo de la categoria debe coincidir con el formato <br/>"+ 
                            "12345678 o hoortzas o algo1234");   
        }
        else{    
            var datos = new FormData();
            datos.append('accion','eliminar');
            datos.append('codigo_categoria',$("#codigo_categoria").val());
            
            muestraMensaje("Eliminando categoría...");
            enviaAjax(datos);
        }
    });

    $("#restaurar").on("click",function(){
        if(validarkeyup(/^[A-Za-z0-9]{7,8}$/,$("#codigo_categoria"),
            $("#scodigo_categoria"),"El formato debe ser Alfanumerico")==0){
            muestraMensaje("El codigo de la categoria debe coincidir con el formato <br/>"+ 
                            "12345678 o hoortzas o algo1234");   
        }
        else{    
            var datos = new FormData();
            datos.append('accion','restaurar');
            datos.append('codigo_categoria',$("#codigo_categoria").val());
            
            muestraMensaje("Restaurando categoría...");
            enviaAjax(datos);
        }
    });
    
    $("#consultadeDelete").on("click",function(){
        $("#modalCategoria").modal("show");
        var datos = new FormData();
        datos.append('accion','consultaDelete');
        enviaAjax(datos);
    });	
});
    
// Funciones para DataTable
function destruyeDT(){
    if ($.fn.DataTable.isDataTable("#tablacategoria")) {
        $("#tablacategoria").DataTable().destroy();
    }
}

function crearDT(){
    if (!$.fn.DataTable.isDataTable("#tablacategoria")) {
        $("#tablacategoria").DataTable({
            language: {
                lengthMenu: "Mostrar _MENU_ por página",
                zeroRecords: "No se encontraron categorias",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "No hay categorias registradas",
                infoFiltered: "(filtrado de _MAX_ registros totales)",
                search: "Buscar:",
                paginate: {
                    first: "Primera",
                    last: "Última",
                    next: "Siguiente",
                    previous: "Anterior",
                },
            },
            autoWidth: false,
            order: [[1, "asc"]],
        });
    }         
}
    
// Validación de campos antes del envío
function validarenvio(){
    if(validarkeyup(/^[A-Za-z0-9]{7,8}$/,$("#codigo_categoria"),
        $("#scodigo_categoria"),"El formato debe ser Alfanumerico")==0){
        muestraMensaje("El codigo de la categoria debe coincidir con el formato <br/>"+ 
                        "12345678 o hoortzas o algo1234");	
        return false;					
    }	
    else if (validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,20}$/, $("#descripcion_categoria"), $("#sdescripcion_categoria"), "Solo letras, entre 3 a 20 dígitos") == 0) {
        muestraMensaje("La descripción debe ser <br/>Solo letras, entre 3 a 20 dígitos");
        return false;
    }
    else if ($("#unidadMedNormal").val() === "Seleccione una unidad de medida") {
        muestraMensaje("Debe seleccionar una unidad de medida común");
        return false;
    }
    else if ($("#unidadMedAlt").val() === "Seleccione una unidad de medida") {
        muestraMensaje("Debe seleccionar una unidad de medida alternativa");
        return false;
    }
    return true;
}

// Función que muestra el modal con un mensaje
function muestraMensaje(mensaje){
    $("#contenidodemodal").html(mensaje);
    $("#mostrarmodal").modal("show");
    setTimeout(function() {
        $("#mostrarmodal").modal("hide");
    },2000);
}

// Funciones de validación
function validarkeypress(er,e){
    key = e.keyCode;
    tecla = String.fromCharCode(key);
    a = er.test(tecla);
    if(!a){
        e.preventDefault();
    }
}

function validarkeyup(er,etiqueta,etiquetamensaje, mensaje){
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

// Función para pasar de la lista al formulario
function coloca(linea){
    $("#codigo_categoria").val($(linea).find("td:eq(1)").text());
    $("#descripcion_categoria").val($(linea).find("td:eq(2)").text());
    $("#unidadMedNormal").val($(linea).find("td:eq(3)").text());
    $("#unidadMedAlt").val($(linea).find("td:eq(4)").text());
}

// Función que envía y recibe datos por AJAX
function enviaAjax(datos){
    $.ajax({
        async: true,
        url: "",
        type: "POST",
        contentType: false,
        data: datos,
        processData: false,
        cache: false,
        beforeSend: function () {},
        timeout: 10000,
        success: function(respuesta) {
            console.log(respuesta);
            try {
                var lee = JSON.parse(respuesta);
                if (lee.resultado == "consultar") {
                    destruyeDT();
                    $("#resultadoconsulta").html(lee.mensaje);
                    crearDT();
                }
                else if (lee.resultado == "encontro") {
                    $("#descripcion_categoria").val(lee.mensaje[0][2]);
                    $("#unidadMedNormal").val(lee.mensaje[0][3]);
                    $("#unidadMedAlt").val(lee.mensaje[0][4]);
                }
                else if (lee.resultado == "incluir" || 
                        lee.resultado == "modificar" ||
                        lee.resultado == "eliminar" ||
                        lee.resultado == "restaurar") {
                    muestraMensaje(lee.mensaje);
                    limpia();
                    consultar();
                }
                else if(lee.resultado == 'consultaDelete'){
                    $('#consultaDelete').html(lee.mensaje);
                }
                else if (lee.resultado == "error") {
                    muestraMensaje(lee.mensaje);
                }
            } catch (e) {
                muestraMensaje("Error al procesar la respuesta: " + e.message);
            }
        },
        error: function (request, status, err) {
            if (status == "timeout") {
                muestraMensaje("Servidor ocupado, intente de nuevo");
            } else {
                muestraMensaje("ERROR: <br/>" + request + status + err);
            }
        }
    }); 
}

// Función para limpiar los campos del formulario
function limpia(){
    $("#codigo_categoria").val("");
    $("#descripcion_categoria").val("");
    $("#unidadMedNormal").val("Seleccione una unidad de medida");
    $("#unidadMedAlt").val("Seleccione una unidad de medida");
}