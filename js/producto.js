
$(document).ready(function(){
  //para mostrar en modal mensajes del servidor	
  if($.trim($("#mensajes").text()) != ""){
      muestraMensaje($("#mensajes").html());
  }
  //Fin de seccion de mostrar envio en modal mensaje//	
      
  //boton para levantar modal de areas
  $("#listadoMarca").on("click",function(){
    $("#modalMarca").modal("show");
  });
  
  //boton para levantar modal de equipo
  $("#listadoCategoria").on("click",function(){
    $("#modalCategorias").modal("show");
  });
  
  
  //evento keyup de input de Marca	
  $("#modelo").on("keyup",function(){
    var modelo = $(this).val();
    var encontro = false;
    $("#listadoMarca tr").each(function(){
      if(modelo == $(this).find("td:eq(1)").text()){
        colocaMarca($(this));
        encontro = true;
      } 
    });
    if(!encontro){
      $("#datosmarca").html("");
    }
  });	
  
  //evento keyup de input de Categoria
  $("#codigo_categoria").on("keyup",function(){
      var codigo = $(this).val();
      $("#modalCategorias tr").each(function(){
          if(codigo == $(this).find("td:eq(1)").text()){
              colocacategorias($(this));
          }
      });
  });	
  
   //evento click de boton Registrar
   $("#registrar").on("click",function(){
    $("#f").submit();

});

});
  
  //funcion para colocar datos del area en pantalla
  function colocaMarca(linea){
      $("#modelo").val($(linea).find("td:eq(1)").text());
      $("#idmarca").val($(linea).find("td:eq(0)").text());
  }
  
  //fin de colocar datos del area

  //funcion para colocar datos del equipo en pantalla
  function colocacategorias(linea){
      $("#codigo_categoria").val($(linea).find("td:eq(1)").text());
      $("#idcategoria").val($(linea).find("td:eq(0)").text());
      $("#datoscategoria").val($(linea).find("td:eq(2)").text());
      
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
      $("#modelo").val($(linea).find("td:eq(1)").text());
      $("#codigo_categoria").val($(linea).find("td:eq(2)").text());
  }
  function redondearDecimales(numero, decimales) {
      return Number(Math.round(numero +'e'+ decimales) +'e-'+ decimales).toFixed(decimales);
      
  }

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

 //CONTROL DE BOTONES
  
 $("#incluir").on("click",function(){
  if(validarenvio()){
    var datos = new FormData();
    datos.append('accion','incluir');
          datos.append('codigo',$("#codigo").val());
          datos.append('nombre',$("#nombre").val());
          datos.append('minimo',$("#minimo").val());
          datos.append('maximo',$("#maximo").val());
          datos.append('id_marca',$("#id_marca").val());
          datos.append('id_categoria',$("#id_categoria").val());
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
          datos.append('id_marca',$("#id_marca").val());
          datos.append('id_categoria',$("#id_categoria").val());
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

$("#consultar").on("click",function(){
  var datos = new FormData();
  datos.append('accion','consultar');
  enviaAjax(datos);
});
//FIN DE CONTROL DE BOTONES	



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
    $("#codigo").val($(linea).find("td:eq(0)").text());
    $("#nombre").val($(linea).find("td:eq(1)").text());
    $("#minimo").val($(linea).find("td:eq(2)").text());
    $("#maximo").val($(linea).find("td:eq(3)").text());
    $("#id_marca").val($(linea).find("td:eq(4)").text());
    $("#id_categoria").val($(linea).find("td:eq(5)").text());
    
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
             }
             else if (lee.resultado == "encontro") {
              $("#nombre").val(lee.mensaje[0][2]);
              $("#minimo").val(lee.mensaje[0][3]);
              $("#maximo").val(lee.mensaje[0][4]);
              $("#id_marca").val(lee.mensaje[0][5]);
              $("#id_categoria").val(lee.mensaje[0][6]);
              
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
    
        $("#codigo").val("");
        $("#nombre").val("");
        $("#minimo").val("");
        $("#maximo").val("");
        $("#id_marca").val("");
        $("#id_categoria").val("");
        
    }