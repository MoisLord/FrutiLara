$(document).ready(function(){
    //VALIDACION DE DATOS	
        $("#id_marca").on("keypress",function(e){
            validarkeypress(/^[0-9-\b]*$/,e);
        });
        
        $("#id_marca").on("keyup",function(){
            validarkeyup(/^[0-9]{7,20}$/,$(this),
            $("#sid_marca"),"El Formato Debe Ser Numerico ");
            if($("#id_marca").val().length > 7){
              var datos = new FormData();
                datos.append('accion','consultatr');
                datos.append('id_marca',$(this).val());
                enviaAjax(datos,'consultatr');	
            }
        });
        
        
        $("#descripcion_marca").on("keypress",function(e){
            validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
        });
        $("#descripcion_marca").on("keyup",function(){
            validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,40}$/,
            $(this),$("#sdescripcion_marca"),"Solo letras  entre 3 y 40 caracteres");
        });
        
        
    //FIN DE VALIDACION DE DATOS
    
    
    
    //CONTROL DE BOTONES
    
    $("#incluir").on("click",function(){
        if(validarenvio()){
            var datos = new FormData();
            datos.append('accion','incluir');
            datos.append('id_marca',$("#id_marca").val());
            datos.append('descripcion_marca',$("#descripcion_marca").val());
            enviaAjax(datos);
        }
    });
    $("#modificar").on("click",function(){
        if(validarenvio()){
    
            var datos = new FormData();
            datos.append('accion','modificar');
            datos.append('id_marca',$("#id_marca").val());
            datos.append('descripcion_marca',$("#descripcion_marca").val());
            enviaAjax(datos);
            setInterval("location.reload()",4000);
            
        }
    });
    
    $("#eliminar").on("click",function(){
        
        if(validarkeyup(/^[0-9]{7,8}$/,$("#id_marca"),
            $("#sid_marca"),"El formato debe ser Numerico")==0){
            muestraMensaje("El id_marca debe coincidir con el formato <br/>"+ 
                            "99999999");	
            
        }
        else{	
            
            var datos = new FormData();
            datos.append('accion','eliminar');
            datos.append('id_marca',$("#id_marca").val());
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
        if ($.fn.DataTable.isDataTable("#tablamarca")) {
                $("#tablamarca").DataTable().destroy();
        }
    }
    function crearDT(){
        //se crea nuevamente
        if (!$.fn.DataTable.isDataTable("#tablamarca")) {
                $("#tablamarca").DataTable({
                  language: {
                    lengthMenu: "Mostrar _MENU_ por página",
                    zeroRecords: "No se encontraron marcas",
                    info: "Mostrando página _PAGE_ de _PAGES_",
                    infoEmpty: "No hay marcas registradas",
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
        if(validarkeyup(/^[0-9]{7,8}$/,$("#id_marca"),
            $("#sid_marca"),"El formato debe ser Numerico")==0){
            muestraMensaje("El id_marca debe coincidir con el formato <br/>"+ 
                            "99999999");	
            return false;					
        }	
        else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
            $("#descripcion_marca"),$("#sdescripcion_marca"),"Solo letras  entre 3 y 30 caracteres")==0){
            muestraMensaje("descripcion_marca <br/>Solo letras  entre 3 y 30 caracteres");
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
        $("#id_marca").val($(linea).find("td:eq(0)").text());
        $("#descripcion_marca").val($(linea).find("td:eq(1)").text());
        
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
                           $("#descripcion_marca").val(lee.mensaje[0][2]);
                           
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
        
        $("#id_marca").val("");
        $("#descripcion_marca").val("");
        
    }