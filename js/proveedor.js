$(document).ready(function(){
    //VALIDACION DE DATOS	
        $("#rif").on("keypress",function(e){
            validarkeypress(/^[0-9-\b]*$/,e);
        });
        
        $("#rif").on("keyup",function(){
            validarkeyup(/^[0-9]{6,9}$/,$(this),
		$("#srif"),"El formato debe ser 092348760 o 00003454");
            if($("#rif").val().length > 6){
              var datos = new FormData();
                datos.append('accion','consultatr');
                datos.append('rif',$(this).val());
                enviaAjax(datos,'consultatr');	
            }
        });
        
        $("#Nombre").on("keypress",function(e){
            validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
        });
        $("#Nombre").on("keyup",function(){
            validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
            $(this),$("#sNombre"),"Solo letras  entre 3 y 30 caracteres");
        });
        $("#Telefono").on("keypress",function(e){
            validarkeypress(/^[0-9-\b-]*$/,e);
        });
        
        $("#Telefono").on("keyup",function(){
            validarkeyup(/^[0-9]{4}[0-9]{7}$/,$(this),$("#sTelefono"),"El formato debe ser 041215478964");
        });
        $("#direccion").on("keypress",function(e){
            validarkeypress(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
        });
        $("#direccion").on("keyup",function(){
            validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
            $(this),$("#sdireccion"),"Solo letras  entre 3 y 30 caracteres");
        });
        
    //FIN DE VALIDACION DE DATOS
    
    //CONTROL DE BOTONES
    
    $("#incluir").on("click",function(){
        if(validarenvio()){
            var datos = new FormData();
            datos.append('accion','incluir');
            datos.append('documento',$("#documento").val());
            datos.append('rif',$("#rif").val());
            datos.append('Nombre',$("#Nombre").val());
            datos.append('Telefono',$("#Telefono").val());
            datos.append('direccion',$("#direccion").val());
            enviaAjax(datos);
            setInterval("location.reload()",4000);
        }
    });
    $("#modificar").on("click",function(){
        if(validarenvio()){
    
            var datos = new FormData();
            datos.append('accion','modificar');
            datos.append('documento',$("#documento").val());
            datos.append('rif',$("#rif").val());
            datos.append('Nombre',$("#Nombre").val());
            datos.append('Telefono',$("#Telefono").val());
            datos.append('direccion',$("#direccion").val());
            enviaAjax(datos);
            setInterval("location.reload()",4000);
        }
    });
    
    $("#eliminar").on("click",function(){
        
        if(validarkeyup(/^[0-9]{6,9}$/,$("#rif"),
            $("#srif"),"El formato debe ser J-092348760 o G-00003454")==0){
            muestraMensaje("El rif debe coincidir con el formato <br/>"+ 
                            "J-092348760 o G-00003454");	
            
        }
        else{	
            
            var datos = new FormData();
            datos.append('accion','eliminar');
            datos.append('rif',$("#rif").val());
            enviaAjax(datos);
            setInterval("location.reload()",4000);
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
        if ($.fn.DataTable.isDataTable("#tablaproveedores")) {
                $("#tablaproveedores").DataTable().destroy();
        }
    }
    function crearDT(){
        //se crea nuevamente
        if (!$.fn.DataTable.isDataTable("#tablaproveedores")) {
                $("#tablaproveedores").DataTable({
                  language: {
                    lengthMenu: "Mostrar _MENU_ por página",
                    zeroRecords: "No se encontraron personas",
                    info: "Mostrando página _PAGE_ de _PAGES_",
                    infoEmpty: "No hay personas registradas",
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
        if(validarkeyup(/^[0-9]{6,9}$/,$("#rif"),
            $("#srif"),"El formato debe ser J092348760 o G00003454")==0){
            muestraMensaje("El rif debe coincidir con el formato <br/>"+ 
                            "J092348760");	
            return false;					
        }
        else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
            $("#Nombre"),$("#sNombre"),"Solo letras  entre 3 y 30 caracteres")==0){
            muestraMensaje("Nombre <br/>Solo letras  entre 3 y 30 caracteres");
            return false;
        }
        else if(validarkeyup(/^[0-9]{4}[0-9]{7}$/,$("#Telefono"),
        $("#sTelefono"),"El formato debe ser 0412-15478964")==0){
        muestraMensaje("Verifique el telefono");
        return false;
        }
        else if(validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
        $("#direccion"),$("#sdireccion"),"Solo letras  entre 3 y 30 caracteres")==0){
        muestraMensaje("Direccion debe tener <br/>Solo letras  entre 3 y 30 caracteres");
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
        $("#documento").val($(linea).find("td:eq(0)").text());
        $("#rif").val($(linea).find("td:eq(1)").text());
        $("#Nombre").val($(linea).find("td:eq(2)").text());
        $("#Telefono").val($(linea).find("td:eq(3)").text());
        $("#direccion").val($(linea).find("td:eq(4)").text());
        
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
                timeout: 10000, //tiempo maximo de espera por la respuesta del servidor
                success: function(respuesta) {//si resulto exitosa la transmision
                console.log(respuesta);
                    try {
                        var lee = JSON.parse(respuesta);
                        if (lee.resultado == "obtienefecha") {
                        
                        }
                        else if (lee.resultado == "consultar") {
                           destruyeDT();
                           $("#resultadoconsulta").html(lee.mensaje);
                           crearDT();
                           $("#modal1").modal("show");
                        }
                        else if (lee.resultado == "encontro") {
                            $("#documento").val(lee.mensaje[0][1]);
                           $("#Nombre").val(lee.mensaje[0][2]);
                           $("#Telefono").val(lee.mensaje[0][3]);
                           $("#direccion").val(lee.mensaje[0][4]);
                           
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
        $("#documento").val("");
        $("#rif").val("");
        $("#Nombre").val("");
        $("#Telefono").val("");
        $("#direccion").val("");
        
    }
    