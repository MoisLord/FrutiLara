
$(document).ready(function(){
//VALIDACION DE DATOS
	carga_marca();


$("#listadodeMarca").on("click",function(){
	$("#modalMarca").modal("show");
});	



$("#descripcion_marca").on("keyup",function(){
	var cedula = $(this).val();
	var encontro = false;
	$("#listadoMarca tr").each(function(){
		if(cedula == $(this).find("td:eq(1)").text()){
			colocamarca($(this));
			encontro = true;
		} 
	});
	if(!encontro){
		$("#datosmarca").html("");
	}
});	
	$("#id_modelo").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#id_modelo").on("keyup",function(){
		validarkeyup(/^[0-9]{7,8}$/,$(this),
		$("#sid_modelo"),"El formato debe ser 9999999 ");
		if($("#id_modelo").val().length > 7){
		  var datos = new FormData();
		    datos.append('accion','consultatr');
			datos.append('id_modelo',$(this).val());
			enviaAjax(datos,'consultatr');	
		}
	});
	
	
	$("#descripcion_modelo").on("keypress",function(e){
		validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	
	
	
	
//FIN DE VALIDACION DE DATOS
function carga_marca(){
	// para cargar la lista de clientes
	// utilizaremos una peticion ajax
	// por lo que usaremos un objeto llamado 
	// FormData, que es similar al <form> de html
	// es decir colocaremos en ese FormData, los
	// elementos que se desean enviar al servidor
	
	var datos = new FormData();
	//a ese datos le añadimos la informacion a enviar
	datos.append('accion','listadoMarca'); //le digo que me muestre un listado de aulas
	//ahora se envia el formdata por ajax
	enviaAjax(datos);
}



//CONTROL DE BOTONES

$("#incluir").on("click",function(){
	if(validarenvio()){
		var datos = new FormData();
		datos.append('accion','incluir');
		datos.append('id_modelo',$("#id_modelo").val());
		datos.append('descripcion_modelo',$("#descripcion_modelo").val());
		datos.append('id_marca',$("#descripcion_marca").val());
		enviaAjax(datos);
	}
});
$("#modificar").on("click",function(){
	if(validarenvio()){

		var datos = new FormData();
		datos.append('accion','modificar');
		datos.append('id_modelo',$("#id_modelo").val());
		datos.append('descripcion_modelo',$("#descripcion_modelo").val());
		datos.append('id_marca',$("#descripcion_marca").val());
		enviaAjax(datos);
		
	}
});

$("#eliminar").on("click",function(){
	
	if(validarkeyup(/^[0-9]{7,8}$/,$("#id_modelo"),
		$("#sid_modelo"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La id_modelo debe coincidir con el formato <br/>"+ 
						"99999999");	
		
	}
	else{	
	    
		var datos = new FormData();
		datos.append('accion','eliminar');
		datos.append('id_modelo',$("#id_modelo").val());
		enviaAjax(datos);
	}
	
});


//FIN DE CONTROL DE BOTONES	

});


//funcion para enlazar al DataTablet
function destruyeDT(){
	//1 se destruye el datatablet
	if ($.fn.DataTable.isDataTable("#tablamodelo")) {
            $("#tablaclientes").DataTable().destroy();
    }
}
function crearDT(){
	//se crea nuevamente
    if (!$.fn.DataTable.isDataTable("#tablamodelo")) {
            $("#tablaclientes").DataTable({
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
	if(validarkeyup(/^[0-9]{7,8}$/,$("#id_modelo"),
		$("#sid_modelo"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La id_modelo debe coincidir con el formato <br/>"+ 
						"99999999");	
		return false;					
	}	
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#descripcion_modelo"),$("#sdescripcion_modelo"),"Solo letras  entre 3 y 30 caracteres")==0){
		muestraMensaje("Nombre y apellido <br/>Solo letras  entre 3 y 30 caracteres");
		return false;
	}
	else if(validarkeyup(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,$("#descripcion_marca"),
		 $("#sid_marca"),"Solo letras  entre 3 y 30 caracteres")==0){
		 muestraMensaje("Nombre y apellido <br/>Solo letras  entre 3 y 30 caracteres","Verifique el marca");
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
	$("#id_modelo").val($(linea).find("td:eq(0)").text());
	$("#descripcion_modelo").val($(linea).find("td:eq(1)").text());
	$("#idMarca").val($(linea).find("td:eq(2)").text());
	
	
}
function colocamarca(linea){
	
	$("#idMarca").val($(linea).find("td:eq()").text());
	
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
						
						$("#resultadoconsulta").html(lee.mensaje);
						
					 }
					 else if (lee.resultado == "encontro") {
						$("#id_modelo").val(lee.mensaje[0][0]);
						$("#descripcion_modelo").val(lee.mensaje[0][1]);
						$("#idMarca").val(lee.mensaje[0][2]);
						
						
					 }
					else if (lee.resultado == "incluir" || 
					lee.resultado == "modificar" || 
					lee.resultado == "eliminar") {
					   muestraMensaje(lee.mensaje);
					   limpia();
					}
					else if(lee.resultado=='listadoMarca'){
					
						$('#listadoMarca').html(lee.mensaje);
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
	
	$("#id_modelo").val("");
	$("#descripcion_modelo").val("");
	$("#descripcion_marca").val("");
	
	
}
