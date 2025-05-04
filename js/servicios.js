function consultar() {
    var datos = new FormData();
    datos.append('accion','consultar');
    enviaAjax(datos);
}

$(document).ready(function(){
    consultar();
    carga_proveedor();
    $("#codigo_servicio").on("keyup",function(){
        var codigo = $(this).val();
        var encontro = false;
        $("#consultaDelete tr").each(function(){
            if(codigo == $(this).find("td:eq(1)").text()){
                coloca($(this));
                encontro = true;
            } 
        });
        if(!encontro){
            $("#datosproveedor").html("");
        }
    });	

    //VALIDACION DE DATOS	
        $("#codigo_servicio").on("keypress",function(e){
            validarkeypress(/^[0-9-\b]*$/,e);
        });
        
        $("#codigo_servicio").on("keyup",function(){
            validarkeyup(/^[0-9]{6,9}$/,$(this),
		$("#scodigo_servicio"),"El formato debe ser 092348760 o 00003454");
            if($("#codigo_servicio").val().length > 6){
              var datos = new FormData();
                datos.append('accion','consultatr');
                datos.append('codigo_servicio',$(this).val());
                enviaAjax(datos,'consultatr');	
            }
        });
       
        $("#descripcion_servicio").on("keypress",function(e){
            validarkeypress(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
        });
        $("#descripcion_servicio").on("keyup",function(){
            validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]{3,45}$/,
            $(this),$("#sdescripcion_servicio"),"Solo letras y numeros entre 3 y 45 caracteres");
        });
        
    //FIN DE VALIDACION DE DATOS
    
    function carga_proveedor(){
        // para cargar la lista de clientes
        // utilizaremos una peticion ajax
        // por lo que usaremos un objeto llamado 
        // FormData, que es similar al <form> de html
        // es decir colocaremos en ese FormData, los
        // elementos que se desean enviar al servidor
        
        var datos = new FormData();
        //a ese datos le añadimos la informacion a enviar
        datos.append('accion','consultaDelete'); //le digo que me muestre un listado de aulas
        //ahora se envia el formdata por ajax
        enviaAjax(datos);
      }
    //CONTROL DE BOTONES
    
    $("#incluir").on("click",function(){
        if(validarenvio()){
            var datos = new FormData();
            datos.append('accion','incluir');
            datos.append('codigo_servicio',$("#codigo_servicio").val());
            datos.append('descripcion_servicio',$("#descripcion_servicio").val());
            datos.append('estado_registro',1);
            enviaAjax(datos);
        }
    });
    $("#modificar").on("click",function(){
        if(validarenvio()){
    
            var datos = new FormData();
            datos.append('accion','modificar');
            datos.append('codigo_servicio',$("#codigo_servicio").val());
            datos.append('descripcion_servicio',$("#descripcion_servicio").val());
            datos.append('estado_registro',1);
            enviaAjax(datos);
        }
    });
    
    $("#eliminar").on("click",function(){
        
        if(validarkeyup(/^[0-9]{6,9}$/,$("#codigo_servicio"),
            $("#scodigo_servicio"),"El formato debe ser 092348760 o 00003454")==0){
            muestraMensaje("El rif debe coincidir con el formato <br/>"+ 
                            "092348760 o 00003454");	
            
        }
        else{	
            
            var datos = new FormData();
            datos.append('accion','eliminar');
            datos.append('codigo_servicio',$("#codigo_servicio").val());
            enviaAjax(datos);
        }
        
    });

    $("#restaurar").on("click",function(){
        
        if(validarkeyup(/^[0-9]{6,9}$/,$("#codigo_servicio"),
            $("#scodigo_servicio"),"El formato debe ser 092348760 o 00003454")==0){
            muestraMensaje("El rif debe coincidir con el formato <br/>"+ 
                            "092348760 o 00003454");	
            
        }
        else{	
            
            var datos = new FormData();
            datos.append('accion','restaurar');
            datos.append('codigo_servicio',$("#codigo_servicio").val());
            enviaAjax(datos);
        }
        
    });
    
    
    // $("#consultar").on("click",function(){
    //     var datos = new FormData();
    //     datos.append('accion','consultar');
    //     enviaAjax(datos);
    // });

    $("#consultadeDelete").on("click",function(){
        $("#modalProveedor").modal("show");
        var datos = new FormData();
        datos.append('accion','consultaDelete');
        enviaAjax(datos);
      });
    //FIN DE CONTROL DE BOTONES	
    
    });
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
                    zeroRecords: "No se encontraron proveedores",
                    info: "Mostrando página _PAGE_ de _PAGES_",
                    infoEmpty: "No hay srevicios registrados",
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
        if(validarkeyup(/^[0-9]{6,9}$/,$("#codigo_servicio"),
            $("#scodigo_servicio"),"El formato debe ser J092348760 o G00003454")==0){
            muestraMensaje("El rif debe coincidir con el formato <br/>"+ 
                            "J092348760");	
            return false;					
        }
        else if(validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC,.:]{3,45}$/,
        $("#descripcion_servicio"),$("#sdescripcion_servicio"),"Solo letras  entre 3 y 30 caracteres")==0){
        muestraMensaje("Direccion debe tener <br/>Solo letras  entre 3 y 45 caracteres");
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
        $("#codigo_servicio").val($(linea).find("td:eq(0)").text());
        $("#descripcion_servicio").val($(linea).find("td:eq(1)").text());
        
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
                //console.log(respuesta);
                    try {
                        var lee = JSON.parse(respuesta);
                        if (lee.resultado == "consultar") {
                            destruyeDT();
                           $("#resultadoconsulta").html(lee.mensaje);
                           crearDT();
                           $("#modal1").modal("show");
                        }
                        else if (lee.resultado == "encontro") {
                           $("#descripcion_servicio").val(lee.mensaje[0][1]);
                           
                        }
                        else if (lee.resultado == "incluir" || 
                        lee.resultado == "modificar" || 
                        lee.resultado == "eliminar" ||
                        lee.resultado == "restaurar") {
                           muestraMensaje(lee.mensaje);
                           limpia();
                           consultar();
                           
                        }
                        else if(lee.resultado=='consultaDelete'){
                
                            $('#consultaDelete').html(lee.mensaje);
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
        $("#codigo_servicio").val("");
        $("#descripcion_servicio").val("");
        
    }