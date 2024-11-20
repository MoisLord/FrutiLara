function consultar() {
    var datos = new FormData();
    datos.append('accion','consultar');
    enviaAjax(datos);
}

$(document).ready(function(){
	consultar();
	carga_cliente()

    $("#cedula").on("keyup",function(){
        var codigo = $(this).val();
        var encontro = false;
        $("#consultaDelete tr").each(function(){
            if(codigo == $(this).find("td:eq(1)").text()){
                coloca($(this));
                encontro = true;
            } 
        });
        if(!encontro){
            $("#datoscategoria").html("");
        }
    });
	//VALIDACION DE DATOS	
	$("#cedula").on("keypress",function(e){
		validarkeypress(/^[0-9-\b]*$/,e);
	});
	
	$("#cedula").on("keyup",function(){
		validarkeyup(/^[0-9]{5,8}$/,$(this),
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
	    validarkeyup(/^[0-9]{11,15}$/,$(this),$("#stelefono"),"El formato debe ser 0424-1234567");
	});

	$("#direccion").on("keypress",function(e){
		validarkeypress(/^[A-Za-z0-9,#\b\s\u00f1\u00d1\u00E0-\u00FC-]*$/,e);
	});
	
	$("#direccion").on("keyup",function(){
		validarkeyup(/^[A-Za-z0-9,#\b\s\u00f1\u00d1\u00E0-\u00FC-]{6,35}$/,
		$(this),$("#sdireccion"),"Solo letras y/o numeros entre 6 y 35 caracteres");
	});


	
	
	
	
//FIN DE VALIDACION DE DATOS
function carga_cliente(){

        
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
		datos.append('cedula',$("#cedula").val());
		datos.append('nombre_apellido',$("#nombre_apellido").val());
		datos.append('telefono',$("#telefono").val());
		datos.append('direccion',$("#direccion").val());
		datos.append('estado_registro',1);
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
		datos.append('direccion',$("#direccion").val());
		datos.append('estado_registro',1);
		enviaAjax(datos);
		
	}
});

$("#eliminar").on("click",function(){
	
	if(validarkeyup(/^[0-9]{5,8}$/,$("#cedula"),
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

$("#restaurar").on("click",function(){
	
	if(validarkeyup(/^[0-9]{5,8}$/,$("#cedula"),
		$("#scedula"),"El formato debe ser 9999999")==0){
	    muestraMensaje("La cedula debe coincidir con el formato <br/>"+ 
						"99999999");	
		
	}
	else{	
	    
		var datos = new FormData();
		datos.append('accion','restaurar');
		datos.append('cedula',$("#cedula").val());
		enviaAjax(datos);
	}
	
});

// $("#consultar").on("click",function(){
// 	var datos = new FormData();
// 	datos.append('accion','consultar');
// 	enviaAjax(datos);
// });

$("#consultadeDelete").on("click",function(){
	$("#modalCliente").modal("show");
	var datos = new FormData();
    datos.append('accion','consultaDelete');
    enviaAjax(datos);
});	
//FIN DE CONTROL DE BOTONES	

});


// //funcion para enlazar al DataTablet
function destruyeDT(){
 	//1 se destruye el datatablet
 	if ($.fn.DataTable.isDataTable("#tablaclientes")) {
             $("#tablaclientes").DataTable().destroy();
    }
 }
 function crearDT(){
// 	//se crea nuevamente
     if (!$.fn.DataTable.isDataTable("#tablaclientes")) {
            $("#tablaclientes").DataTable({
               language: {
                 lengthMenu: "Mostrar _MENU_ por página",
                zeroRecords: "No se encontraron clientes",
                 info: "Mostrando página _PAGE_ de _PAGES_",
                 infoEmpty: "No hay clientes registradas",
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
	if(validarkeyup(/^[0-9]{5,8}$/,$("#cedula"),
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
	else if(validarkeyup(/^[0-9]{11,15}$/,$("#telefono"),
		 $("#stelefono"),"El formato debe ser 9999-9999999")==0){
		 muestraMensaje("error",4000,"Valida","Verifique el Telefono");
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
	$("#cedula").val($(linea).find("td:eq(0)").text());
	$("#nombre_apellido").val($(linea).find("td:eq(1)").text());
	$("#telefono").val($(linea).find("td:eq(2)").text());
	$("#direccion").val($(linea).find("td:eq(3)").text());
	
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
						$("#nombre_apellido").val(lee.mensaje[0][1]);
						$("#telefono").val(lee.mensaje[0][2]);
						$("#direccion").val(lee.mensaje[0][3]);
						
					 }
					else if (lee.resultado == "incluir" || 
						lee.resultado == "modificar" ||
						lee.resultado == "eliminar" ||
						lee.resultado == "restaurar" ||
						lee.resultado == "consultadeDelete") {
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
	
	$("#cedula").val("");
	$("#nombre_apellido").val("");
	$("#telefono").val("");
	$("#direccion").val("");
	
}
