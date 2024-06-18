$(document).ready(function(){
    //VALIDACION DE DATOS	
        $("#codigo_categoria").on("keypress",function(e){
            validarkeypress(/^[0-9-\b]*$/,e);
        });
        
        $("#codigo_categoria").on("keyup",function(){
            validarkeyup(/^[0-9]{7,8}$/,$(this),
            $("#scodigo_categoria"),"El Formato Debe Ser Numerico ");
            if($("#codigo_categoria").val().length > 7){
              var datos = new FormData();
                datos.append('accion','consultatr');
                datos.append('codigo_categoria',$(this).val());
                enviaAjax(datos,'consultatr');	
            }
        });
        
        $("#unidadMedNormal").on("keypress", function(e) {
            validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
        });
        
        $("#unidadMedNormal").on("keyup", function() {
            validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,20}$/, $(this), $("#sunidadMedNormal"), "Solo letras, de entre 3 a 20 digitos");
        });

        $("#unidadMedAlt").on("keypress", function(e) {
            validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
        });
        
        $("#unidadMedAlt").on("keyup", function() {
            validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,20}$/, $(this), $("#sunidadMedAlt"), "Solo números, de entre 3 a 20 digitos");
        });

        
        
    //FIN DE VALIDACION DE DATOS
    
    
    
    //CONTROL DE BOTONES
    
    $("#incluir").on("click",function(){
        if(validarenvio()){
            var datos = new FormData();
            datos.append('accion','incluir');
            datos.append('codigo_categoria',$("#codigo_categoria").val());
            datos.append('tipo',$("#tipo").val());
            datos.append('unidadMedNormal',$("#unidadMedNormal").val());
            datos.append('unidadMedAlt',$("#unidadMedAlt").val());
            enviaAjax(datos);
        }
    });
    $("#modificar").on("click",function(){
        if(validarenvio()){
    
            var datos = new FormData();
            datos.append('accion','modificar');
            datos.append('codigo_categoria',$("#codigo_categoria").val());
            datos.append('tipo',$("#tipo").val());
            datos.append('unidadMedNormal',$("#unidadMedNormal").val());
            datos.append('unidadMedAlt',$("#unidadMedAlt").val());
            enviaAjax(datos);
            
        }
    });
    
    $("#eliminar").on("click",function(){
        
        if(validarkeyup(/^[0-9]{7,8}$/,$("#codigo_categoria"),
            $("#scodigo_categoria"),"El formato debe ser Numerico")==0){
            muestraMensaje("El codigo de la categoria debe coincidir con el formato <br/>"+ 
                            "12345678");	
            
        }
        else{	
            
            var datos = new FormData();
            datos.append('accion','eliminar');
            datos.append('codigo_categoria',$("#codigo_categoria").val());
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
        if ($.fn.DataTable.isDataTable("#tablacategoria")) {
                $("#tablacategoria").DataTable().destroy();
        }
    }
    function crearDT(){
        //se crea nuevamente
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
    
    
    //Validación de todos los campos antes del envio
    function validarenvio(){
        if(validarkeyup(/^[0-9]{7,8}$/,$("#codigo_categoria"),
            $("#scodigo_categoria"),"El formato debe ser Numerico")==0){
            muestraMensaje("El codigo de la categoria debe coincidir con el formato <br/>"+ 
                            "12345678");	
            return false;					
        }	
        else if (validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,20}$/, $("#unidadMedNormal"), $("#sunidadMedNormal"), "Solo letras, entre 3 a 20 dígitos") == 0) {
            muestraMensaje("unidad Medida Normal debe ser <br/>Solo letras, entre 3 a 20 dígitos");
            return false;
        }
        else if (validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,20}$/, $("#unidadMedAlt"), $("#sunidadMedAlt"), "Solo letras, entre 3 a 20 dígitos") == 0) {
            muestraMensaje("unidad de Medidida Alterna debe ser <br/>Solo letras, entre 3 a 20 dígitos");
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
    
    //funcion para pasar de la lista a el formulario
    function coloca(linea){
        $("#codigo_categoria").val($(linea).find("td:eq(0)").text());
        $("#tipo").val($(linea).find("td:eq(1)").text());
        $("#unidadMedNormal").val($(linea).find("td:eq(2)").text());
        $("#unidadMedAlt").val($(linea).find("td:eq(3)").text());
        
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
                           $("#modal1").modal("show");
                        }
                        else if (lee.resultado == "encontro") {
                           $("#tipo").val(lee.mensaje[0][2]);
                           $("#unidadMedNormal").val(lee.mensaje[0][3]);
                           $("#unidadMedAlt").val(lee.mensaje[0][4]);
                           
                        }
                        else if (lee.resultado == "incluir" || 
                        lee.resultado == "modificar" || 
                        lee.resultado == "eliminar") {
                           muestraMensaje(lee.mensaje);
                           limpia();
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
        
        $("#codigo_categoria").val("");
        $("#tipo").val("");
        $("#unidadMedNormal").val("");
        $("#unidadMedAlt").val("");
        
    }