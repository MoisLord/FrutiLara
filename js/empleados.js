
$(document).ready(function(){
//VALIDACION DE DATOS	
	$("#cedula").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#cedula").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#scedula"),"El formato debe ser 9999999 ");
		if($("#cedula").val().length > 7){
		  var datos = new FormData();
		    datos.append('accion','consultatr');
			datos.append('cedula',$(this).val());
			enviaAjax(datos,'consultatr');	
		}
	});
	
	
	$("#nombre_apellido").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#nombre_apellido").on("keyup",function(){
		validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#snombre_apellido"),"Solo letras  entre 3 y 30 caracteres");
	});
	
	$("#telefono").on("keypress",function(e){
		validarkeypress(/^[0-9\b-]*$/,e);
	});
	
	$("#telefono").on("keyup",function(){
	    validarkeyup(/^[0-9]{4}[-]{1}[0-9]{7}$/,$(this),$("#stelefono"),"El formato debe ser 9999-9999999");
	});

	$("#correo").on("keypress",function(e){
		validarkeypress(/^[A-Za-z@_.\b\u00f1\u00d1\u00E0-\u00FC-]*$/,e);
	});
	
	$("#correo").on("keyup",function(){
		validarkeyup(/^[A-Za-z_\u00f1\u00d1\u00E0-\u00FC-]{3,15}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,3}$/,
		$(this),$("#scorreo"),"El formato debe ser alguien@servidor.com");
	});

	$("#direccion").on("keypress",function(e){
		validarkeypress(/^[A-Za-z0-9,#\b\s\u00f1\u00d1\u00E0-\u00FC-]*$/,e);
	});
	
	$("#direccion").on("keyup",function(){
		validarkeyup(/^[A-Za-z0-9,#\b\s\u00f1\u00d1\u00E0-\u00FC-]{6,35}$/,
		$(this),$("#sdireccion"),"Solo letras y/o numeros entre 6 y 35 caracteres");
	});


	
	
	
	
//FIN DE VALIDACION DE DATOS



//CONTROL DE BOTONES

$("#incluir").on("click",function(){
	if(validarenvio()){
		var datos = new FormData();
		datos.append('accion','incluir');
		datos.append('cedula',$("#cedula").val());
		datos.append('nombre_apellido',$("#nombre_apellido").val());
		datos.append('telefono',$("#telefono").val());
		datos.append('correo',$("#correo").val());
		datos.append('direccion',$("#direccion").val());
		datos.append('fechaNacimiento',$("#fechaNacimiento").val());
		enviaAjax(datos);

	}
});
$("#modificar").on("click",function(){
	if(validarenvio()){

		var datos = new FormData();
		datos.append('accion','modificar');
		datos.append('cedula',$("#cedula").val());
		datos.append('nombre_apellido',$("#nombre_apellido").val());
		datos.append('telefono',$("#telefono").val());
		datos.append('correo',$("#correo").val());
		datos.append('direccion',$("#direccion").val());
		datos.append('fechaNacimiento',$("#fechaNacimiento").val());
		location.reload();
		enviaAjax(datos);
		
		
	}
});

$("#eliminar").on("click",function(){
	
	if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
		$("#scedula"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
						"99999999");	
		
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
	if ($.fn.DataTable.isDataTable("#tablaempleados")) {
            $("#tablaempleados").DataTable().destroy();
    }
}
function crearDT(){
	//se crea nuevamente
    if (!$.fn.DataTable.isDataTable("#tablaempleados")) {
            $("#tablaempleados").DataTable({
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
	if(validarkeyup(/^[0-9]{7,8}$/,$("#cedula"),
		$("#scedula"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
						"99999999");	
		return false;					
	}	
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#nombre_apellido"),$("#snombre_apellido"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Nombre y apellido <br/>Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[0-9]{4}[-]{1}[0-9]{7,8}$/,$("#telefono"),
		 $("#stelefono"),"El formato debe ser 9999-9999999")==0){
		 muestraMensaje("error",4000,"Valida","Verifique el Telefono");
	     return false;
	}
	else if(validarkeyup(/^[A-Za-z_\u00f1\u00d1\u00E0-\u00FC-]{3,15}[@]{1}[A-Za-z0-9]{3,8}[.]{1}[A-Za-z]{2,3}$/,
		$("#correo"),$("#scorreo"),"El formato debe ser alguien@servidor.com")==0){
		muestraMensaje("error",4000,"Valida","Verifique el Correo");
		 return false;
	}
	else if(validarkeyup(/^[A-Za-z0-9,#\b\s\u00f1\u00d1\u00E0-\u00FC-]{6,35}$/,
		$("#direccion"),$("#sdireccion"),"Solo letras y/o numeros entre 6 y 35 caracteres")==0){
		muestraMensaje("error",4000,"Valida","Verifique la direccion");
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
			},3000);
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
	$("#nombre_apellido").val($(linea).find("td:eq(1)").text());
	$("#telefono").val($(linea).find("td:eq(2)").text());
	$("#correo").val($(linea).find("td:eq(3)").text());
	$("#direccion").val($(linea).find("td:eq(4)").text());
	$("#fechaNacimiento").val($(linea).find("td:eq(5)").text());
	
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
						$("#nombre_apellido").val(lee.mensaje[0][1]);
						$("#telefono").val(lee.mensaje[0][2]);
						$("#correo").val(lee.mensaje[0][3]);
						$("#direccion").val(lee.mensaje[0][4]);
						$("#fechaNacimiento").val(lee.mensaje[0][5]);
						
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
	
	$("#cedula").val("");
	$("#nombre_apellido").val("");
	$("#telefono").val("");
	$("#correo").val("");
	$("#direccion").val("");
	$("#fechaNacimiento").val("");
	
}
