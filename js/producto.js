function consultar() {
  var datos = new FormData();
  datos.append('accion','consultar');
  enviaAjax(datos);
}

let valorModelo;
    let valorCategoria;
    $(document).ready(function(){
      consultar();
      carga_modelo();
      carga_categoria();
      

      $("#id_modelo").on("keyup",function(){
        var marcador = $(this).val();
        var encontro = false;
        $("#listadoModelo tr").each(function(){
          if(marcador == $(this).find("td:eq(1)").text()){
            colocamodelo($(this));
            encontro = true;
          } 
        });
        if(!encontro){
          $("#datosmodelo").html("");
        }
      });	

      $("#id_categoria").on("keyup",function(){
        var categorizador = $(this).val();
        var encontro = false;
        $("#listadoCategoria tr").each(function(){
          if(categorizador == $(this).find("td:eq(1)").text()){
            colocacategoria($(this));
            encontro = true;
          } 
        });
        if(!encontro){
          $("#datoscategoria").html("");
        }
      });

      carga_producto();
      $("#codigo").on("keyup",function(){
        var codigo = $(this).val();
        var encontro = false;
        $("#consultaDelete tr").each(function(){
            if(codigo == $(this).find("td:eq(1)").text()){
                coloca($(this));
                encontro = true;
            } 
        });
        if(!encontro){
            $("#datosproducto").html("");
        }
    });	
      //VALIDACION DE DATOS  
     
      $("#codigo").on("keypress", function(e) {
        validarkeypress(/^[0-9]+$/, e);
    });
    
    $("#codigo").on("keyup", function() {
        validarkeyup(/^[0-9]{2,50}$/, $(this), $("#scodigo"), "El código debe tener mínimo 2 dígitos");
        if ($("#codigo").val().length >= 2) {
            var datos = new FormData();
            datos.append('accion', 'consultatr');
            datos.append('codigo', $(this).val());
            enviaAjax(datos, 'consultatr');
        }
    });
        
        
    $("#nombre").on("keypress",function(e){
      validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
    });
    $("#nombre").on("keyup",function(){
      validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
      $(this),$("#snombre"),"Solo letras minimo 3 caracteres");
    });
        
    $("#minimo").on("keypress", function(e) {
      validarkeypress(/^[a-zA-Z0-9\s]+$/, e);
    });
    $("#minimo").on("keyup", function() {
      validarkeyup(/^[a-zA-Z0-9\s]{2,50}$/, $(this), $("#sminimo"), "Debe tener mínimo 2 caracteres");
    });
    
    $("#maximo").on("keypress", function(e) {
      validarkeypress(/^[a-zA-Z0-9\s]+$/, e);
    });
    $("#maximo").on("keyup", function() {
      validarkeyup(/^[a-zA-Z0-9\s]{2,50}$/, $(this), $("#smaximo"), "Debe tener mínimo 2 caracteres");
    });
        
        
        
        
        
      //FIN DE VALIDACION DE DATOS
      function carga_categoria(){
        // para cargar la lista de clientes
        // utilizaremos una peticion ajax
        // por lo que usaremos un objeto llamado 
        // FormData, que es similar al <form> de html
        // es decir colocaremos en ese FormData, los
        // elementos que se desean enviar al servidor
        
        var datos = new FormData();
        //a ese datos le añadimos la informacion a enviar
        datos.append('accion','listadoCategoria'); //le digo que me muestre un listado de aulas
        //ahora se envia el formdata por ajax
        enviaAjax(datos);
      }
      
      function carga_modelo(){
        // para cargar la lista de clientes
        // utilizaremos una peticion ajax
        // por lo que usaremos un objeto llamado 
        // FormData, que es similar al <form> de html
        // es decir colocaremos en ese FormData, los
        // elementos que se desean enviar al servidor
        
        var datos = new FormData();
        //a ese datos le añadimos la informacion a enviar
        datos.append('accion','listadoModelo'); //le digo que me muestre un listado de aulas
        //ahora se envia el formdata por ajax
        enviaAjax(datos);
      }
      
      function carga_producto(){
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
          datos.append('codigo',$("#codigo").val());
          datos.append('nombre',$("#nombre").val());
          datos.append('minimo',$("#minimo").val());
          datos.append('maximo',$("#maximo").val());
          datos.append('id_modelo',valorModelo);
          datos.append('id_categoria',valorCategoria);
          datos.append('estado_registro',1);
          // console.log(datos)
          enviaAjax(datos);
          
        }
      });
      $("#modificar").on("click",function(){
        if(validarenvio()){
      
          var datos = new FormData();
          datos.append('accion','modificar');
          datos.append('codigo',$("#codigo").val());
          datos.append('nombre',$("#nombre").val());
          datos.append('minimo',$("#minimo").val());
          datos.append('maximo',$("#maximo").val());
          datos.append('id_modelo',valorModelo);
          datos.append('id_categoria',valorCategoria);
          datos.append('estado_registro',1);
          // console.log(datos)
          enviaAjax(datos);
          
        }
      });
      
      $("#eliminar").on("click",function(){
        
        if (validarkeyup(/^[0-9]{1,50}$/, $("#codigo"), $("#scodigo"), "El Código debe ser Numerico") == 0) {
          muestraMensaje("El Código debe ser Numerico");
          
        }
        else{	
            
          var datos = new FormData();
          datos.append('accion','eliminar');
          datos.append('codigo',$("#codigo").val());
          enviaAjax(datos);
          
        }
        
      });

      $("#restaurar").on("click",function(){
        
        if (validarkeyup(/^[0-9]{1,50}$/, $("#codigo"), $("#scodigo"), "El Código debe ser Numerico") == 0) {
          muestraMensaje("El Código debe ser Numerico");
          
        }
        else{	
            
          var datos = new FormData();
          datos.append('accion','restaurar');
          datos.append('codigo',$("#codigo").val());
          enviaAjax(datos);
          
        }
        
      });

      $("#listadodeModelo").on("click",function(){
        $("#modalModelo").modal("show");
      });	
      
      $("#listadodeCategoria").on("click",function(){
        $("#modalCategoria").modal("show");
      });	
      
      $("#consultadeDelete").on("click",function(){
        $("#modalProductos").modal("show");
        var datos = new FormData();
        datos.append('accion','consultaDelete');
        enviaAjax(datos);
      });	

      //FIN DE CONTROL DE BOTONES	
      
      });
      
      //funcion para enlazar al DataTablet
      function destruyeDT(){
        //1 se destruye el datatablet
        if ($.fn.DataTable.isDataTable("#tablaproducto")) {
          $("#tablaproducto").DataTable().destroy();
      }
      }
      function crearDT(){
        //se crea nuevamente
        if (!$.fn.DataTable.isDataTable("#tablaproducto")) {
          $("#tablaproducto").DataTable({
                    language: {
                      lengthMenu: "Mostrar _MENU_ por página",
                      zeroRecords: "No se encontraron productos",
                      info: "Mostrando página _PAGE_ de _PAGES_",
                      infoEmpty: "No hay productos registradas",
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
  if(validarkeyup(/^[0-9]{2,50}$/,$("#codigo"),$("#scodigo"),"El código debe tener mínimo 2 dígitos")==0){
    muestraMensaje("El código debe tener mínimo 2 dígitos");
    return false;
}

  else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
  $("#nombre"),$("#snombre"),"Solo letras minimo 3 caracteres")==0){
  muestraMensaje("Nombre del Producto <br/>Solo letras minimo 3 caracteres");
  return false;
}

else if (validarkeyup(/^[a-zA-Z0-9\s]{2,50}$/, $("#minimo"), $("#sminimo"), 
"Debe tener mínimo 2 caracteres") == 0) {
  muestraMensaje("Debe tener mínimo 2 caracteres");
  return false;
}
  
else if (validarkeyup(/^[a-zA-Z0-9\s]{2,50}$/, $("#maximo"), $("#smaximo"), 
"Debe tener mínimo 2 caracteres") == 0) {
muestraMensaje("Debe tener mínimo 2 caracteres");
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
        valorModelo = $(linea).find("td:eq(4)").text()
        valorCategoria = $(linea).find("td:eq(6)").text()
        $("#codigo").val($(linea).find("td:eq(0)").text());
        $("#nombre").val($(linea).find("td:eq(1)").text());
        $("#minimo").val($(linea).find("td:eq(2)").text());
        $("#maximo").val($(linea).find("td:eq(3)").text());
        $("#id_modelo").val($(linea).find("td:eq(5)").text());
        $("#id_categoria").val($(linea).find("td:eq(7)").text());
        
        // console.log(valorModelo);
        // console.log(valorCategoria);        
      }

      function colocacategoria(linea){
        valorCategoria = $(linea).find("td:eq(0)").text();
        // console.log(valorCategoria);
      
        $("#id_categoria").val($(linea).find("td:eq(2)").text());
      }

      function colocamodelo(linea){
        valorModelo = $(linea).find("td:eq(0)").text();
	// console.log(valorModelo);

	$("#id_modelo").val($(linea).find("td:eq(2)").text());
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
                if (lee.resultado == "consultar") {
                  destruyeDT();
                  $("#resultadoconsulta").html(lee.mensaje);
                  crearDT();
                  $("#modal1").modal("show");
                 }
                 else if (lee.resultado == "encontro") {
                   $("#nombre").val(lee.mensaje[0][3]);
                   $("#minimo").val(lee.mensaje[0][4]);
                   $("#maximo").val(lee.mensaje[0][5]);
                   $("#id_modelo").val(lee.mensaje[0][1]);
                   $("#id_categoria").val(lee.mensaje[0][2]);
                  
                  
                 }
                else if (lee.resultado == "incluir" || 
                  lee.resultado == "modificar" || 
                  lee.resultado == "eliminar" ||
                  lee.resultado == "restaurar"){
                   muestraMensaje(lee.mensaje);
                   limpia();
                   consultar();
                }
                else if(lee.resultado=='listadoModelo'){
                
                  $('#listadoModelo').html(lee.mensaje);
                }
                else if(lee.resultado=='listadoCategoria'){
                
                  $('#listadoCategoria').html(lee.mensaje);
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
        
        $("#codigo").val("");
        $("#nombre").val("");
        $("#minimo").val("");
        $("#maximo").val("");
        $("#id_modelo").val("");
        $("#id_categoria").val("");
        
        
      }
      