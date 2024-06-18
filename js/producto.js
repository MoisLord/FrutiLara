function pone_fecha(){
	
	
	var datos = new FormData();
	datos.append('accion','obtienefecha');
	enviaAjax(datos);	
	
}
function consultar(){
	var datos = new FormData();
	datos.append('accion','consultar');
	enviaAjax(datos);	
}
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
$(document).ready(function(){
	//para obtener la fecha del servidor y calcular la 
	//edad de nacimiento que debe ser mayor a 18 
	pone_fecha();
	//fin de colocar fecha en input fecha de nacimiento
	
	//ejecuta una consulta a la base de datos para llenar la tabla
	consultar();
	
//VALIDACION DE DATOS	
$("#codigo").on("keypress",function(e){
    validarkeypress(/^[0-9-\b]*$/,e);
});

$("#codigo").on("keyup",function(){
    validarkeyup(/^[0-9]{7,8}$/,$(this),
    $("#scodigo"),"El Formato Debe Ser Numerico ");
    if($("#codigo").val().length > 7){
      var datos = new FormData();
        datos.append('accion','consultatr');
        datos.append('codigo',$(this).val());
        enviaAjax(datos,'consultatr');	
    }
});


$("#nombre").on("keypress",function(e){
    validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
});
$("#nombre").on("keyup",function(){
    validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
    $(this),$("#snombre"),"Solo letras  entre 3 y 30 caracteres");
});


$("#minimo").on("keypress", function(e) {
    validarkeypress(/^[0-9]*$/, e);
});

$("#minimo").on("keyup", function() {
    validarkeyup(/^[0-9]{2,}$/, $(this), $("#sminimo"), "Solo números, mínimo 2 dígitos");
});

$("#maximo").on("keypress", function(e) {
    validarkeypress(/^[0-9]*$/, e);
});

$("#maximo").on("keyup", function() {
    validarkeyup(/^[0-9]{2,}$/, $(this), $("#smaximo"), "Solo números, mínimo 2 dígitos");
});
	
	
	
	
//FIN DE VALIDACION DE DATOS



//CONTROL DE BOTONES
$("#proceso").on("click",function(){
	if($(this).text()=="INCLUIR"){
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
	}
	else if($(this).text()=="MODIFICAR"){
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
	}
	if($(this).text()=="ELIMINAR"){
        if(validarkeyup(/^[0-9]{7,8}$/,$("#codigo"),
        $("#scodigo"),"El formato debe ser Numerico")==0){
        muestraMensaje("El Codigo debe coincidir con el formato <br/>"+ 
                        "12345678");	
		
	    }
		else{
			var datos = new FormData();
            datos.append('accion','eliminar');
            datos.append('codigo',$("#codigo").val());
            enviaAjax(datos);
		}
	}
});
$("#incluir").on("click",function(){
	limpia();
	$("#proceso").text("INCLUIR");
	$("#modal1").modal("show");
});





	
	
});

//Validación de todos los campos antes del envio
function validarenvio(){
    if(validarkeyup(/^[0-9]{7,8}$/,$("#codigo"),
        $("#scodigo"),"El formato debe ser Numerico")==0){
        muestraMensaje("El codigo debe coincidir con el formato <br/>"+ 
                        "12345678");	
        return false;					
    }	

    else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
    $("#nombre"),$("#snombre"),"Solo letras  entre 3 y 30 caracteres")==0){
    muestraMensaje("Nombre <br/>Solo letras  entre 3 y 30 caracteres");
    return false;
    }

    else if (validarkeyup(/^[0-9]{2,}$/, $("#minimo"), $("#sminimo"), "Solo números, mínimo 3 dígitos") == 0) {
    muestraMensaje("Minimo debe ser <br/>Solo números, mínimo 2 dígitos");
    return false;
    }

	 else if (validarkeyup(/^[0-9]{2,}$/, $("#maximo"), $("#smaximo"), "Solo números, mínimo 3 dígitos") == 0) {
            muestraMensaje("Maximo debe ser <br/>Solo números, mínimo 2 dígitos");
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
function pone(pos,accion){
	
	linea=$(pos).closest('tr');


	if(accion==0){
		$("#proceso").text("MODIFICAR");
	}
	else{
		$("#proceso").text("ELIMINAR");
	}
	$("#codigo").val($(linea).find("td:eq(1)").text());
        $("#nombre").val($(linea).find("td:eq(2)").text());
        $("#minimo").val($(linea).find("td:eq(3)").text());
        $("#maximo").val($(linea).find("td:eq(4)").text());
        $("#id_marca").val($(linea).find("td:eq(5)").text());
        $("#id_categoria").val($(linea).find("td:eq(6)").text());
	
	$("#modal1").modal("show");
}


//funcion que envia y recibe datos por AJAX
function enviaAjax(datos) {
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
    success: function (respuesta) {
    // console.log(respuesta);
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
           $("#nombre").val(lee.mensaje[0][2]);
           $("#minimo").val(lee.mensaje[0][3]);
           $("#maximo").val(lee.mensaje[0][4]);
           
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
