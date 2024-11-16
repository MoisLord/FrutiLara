function consultar() {
    var datos = new FormData();
    datos.append('accion','consultar');
    enviaAjax(datos);
}

$(document).ready(function(){
    consultar();
    //VALIDACION DE DATOS	
        $("#cedula").on("keypress",function(e){
            validarkeypress(/^[0-9-\b]*$/,e);
        });
        
        $("#cedula").on("keyup",function(){
            validarkeyup(/^[0-9]{7,8}$/,$(this),
            $("#scedula"),"El Formato Debe Ser Numerico con 7 a 8 digitos");
            if($("#cedula").val().length > 7){
              var datos = new FormData();
                datos.append('accion','consultatr');
                datos.append('cedula',$(this).val());
                enviaAjax(datos,'consultatr');	
            }
        });

        $("#clave").on("keypress", function(e) {
            validarkeypress(/^[0-9A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
        });
        
        $("#clave").on("keyup", function() {
            validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{7,15}$/, $(this), $("#sclave"), "Debe colocar una contraseña con letras y números, entre 7 a 15 digitos");
        });
        
        
    //FIN DE VALIDACION DE DATOS
    
    
    
    //CONTROL DE BOTONES
    
    $("#incluir").on("click",function(){
        if(validarenvio()){
            var datos = new FormData();
            datos.append('accion','incluir');
            datos.append('cedula',$("#cedula").val());
            datos.append('tipo_usuario',$("#tipo_usuario").val());
            datos.append('clave',$("#clave").val());
            enviaAjax(datos);
            
        }
    });
    $("#modificar").on("click",function(){
        if(validarenvio()){
    
            var datos = new FormData();
            datos.append('accion','modificar');
            datos.append('cedula',$("#cedula").val());
            datos.append('tipo_usuario',$("#tipo_usuario").val());
            datos.append('clave',$("#clave").val());
            enviaAjax(datos);
            
        }
    });
    
    $("#eliminar").on("click",function(){
        
        if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
            $("#scedula"),"El formato debe ser Numerico con 7 a 8 digitos")==0){
            muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
                            "00000000");	
            
        }
        else{	
            
            var datos = new FormData();
            datos.append('accion','eliminar');
            datos.append('cedula',$("#cedula").val());
            enviaAjax(datos);
            
        }
        
    });
    
    $("#consultar").on("click",function(){
        var datos = new FormData();
        datos.append('accion','consultar');
        enviaAjax(datos);
    });
    //FIN DE CONTROL DE BOTONES	
    
    });
    
    
    //funcion para enlazar al DataTablet
    function destruyeDT(){
        //1 se destruye el datatablet
        if ($.fn.DataTable.isDataTable("#tablausuario")) {
                $("#tablausuario").DataTable().destroy();
        }
    }
    function crearDT(){
        //se crea nuevamente
        if (!$.fn.DataTable.isDataTable("#tablausuario")) {
                $("#tablausuario").DataTable({
                  language: {
                    lengthMenu: "Mostrar _MENU_ por página",
                    zeroRecords: "No se encontraron usuarios",
                    info: "Mostrando página _PAGE_ de _PAGES_",
                    infoEmpty: "No hay usuarios registrados",
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
    
    
    //Validación de todos los campos antes del envio
    function validarenvio(){
        if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
            $("#scedula"),"El formato debe ser Numerico con 7 a 8 digitos")==0){
            muestraMensaje("La cedula  debe coincidir con el formato <br/>"+ 
                            "00000000");	
            return false;					
        }	
        else if (validarkeyup(/^[0-9A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{7,15}$/, $("#clave"), $("#sclave"), "Solo números y letras, entre 7 a 15 dígitos") == 0) {
            muestraMensaje("La clave debe ser <br/>Solo números y letras, entre 7 a 15 dígitos");
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
                },2000);
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
    
    //funcion para pasar de la lista a el formulario
    function coloca(linea){
        $("#cedula").val($(linea).find("td:eq(0)").text());
        $("#tipo_usuario").val($(linea).find("td:eq(1)").text());
        $("#clave").val($(linea).find("td:eq(2)").text());
        
    }
    
    //funcion que envia y recibe datos por AJAX
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
                timeout: 10000, //tiempo unidadMedAlt de espera por la respuesta del servidor
                success: function(respuesta) {//si resulto exitosa la transmision
                console.log(respuesta);
                    try {
                        var lee = JSON.parse(respuesta);
                        if (lee.resultado == "consultar") {
                           destruyeDT();
                           $("#resultadoconsulta").html(lee.mensaje);
                           crearDT();
                        }
                        else if (lee.resultado == "encontro") {
                           $("#tipo_usuario").val(lee.mensaje[0][1]);
                           $("#clave").val(lee.mensaje[0][3]);
                           
                        }
                        else if (lee.resultado == "incluir" || 
                        lee.resultado == "modificar" || 
                        lee.resultado == "eliminar") {
                           muestraMensaje(lee.mensaje);
                           limpia();
                           consultar();
                        }
                        else if (lee.resultado == "error") {
                           muestraMensaje(lee.mensaje);
                        }
                  } catch (e) {
                    alert("Error en JSON " + e.name);
                  }
                   
                },
                error: function (request, status, err) {
                  // si ocurrio un error en la trasmicion
                  // o recepcion via ajax entra aca
                  // y se muestran los mensaje del error
                  if (status == "timeout") {
                    //pasa cuando superan los 10000 10 segundos de timeout
                    muestraMensaje("Servidor ocupado, intente de nuevo");
                  } else {
                    //cuando ocurre otro error con ajax
                    muestraMensaje("ERROR: <br/>" + request + status + err);
                  }
                },
                complete: function () {},
                
        }); 
        
    }
    
    function limpia(){
        
        $("#cedula").val("");
        $("#tipo_usuario").val("ADMINISTRADOR");
        $("#clave").val("");
        
    }

    // Aquí se hizo que el Super Usuario sea permanente
    document.addEventListener('DOMContentLoaded', function() {
        const tablaUsuario = document.getElementById('tablausuario');
        const btnModificar = document.getElementById('modificar');
        const btnEliminar = document.getElementById('eliminar');
    
        tablaUsuario.addEventListener('click', function(event) {
            const filaSeleccionada = event.target.closest('tr');
            if (filaSeleccionada) {
                const tipoUsuario = filaSeleccionada.cells[1].innerText; // Suponiendo que la segunda celda tiene el tipo de usuario
                
                // Si el tipo de usuario es "SUPERUSUARIO", deshabilitar los botones
                if (tipoUsuario === "Super Usuario") {
                    btnModificar.disabled = true;
                    btnEliminar.disabled = true;
                } else {
                    btnModificar.disabled = false;
                    btnEliminar.disabled = false;
                }
    
                // Aquí puedes agregar lógica para llenar el formulario con los datos del usuario seleccionado
            }
        });
    });