function consultar() {
    var datos = new FormData();
    datos.append('accion','consultar');
    enviaAjax(datos);
}

let valor;
$(document).ready(function(){
	consultar();
//VALIDACION DE DATOS
	carga_marca();


$("#listadodeMarca").on("click",function(){
	$("#modalMarca").modal("show");
});	



$("#id_marca").on("keyup",function(){
	var codigo = $(this).val();
	var encontro = false;
	$("#listadoMarca tr").each(function(){
		if(codigo == $(this).find("td:eq(1)").text()){
			colocamarca($(this));
			encontro = true;
		} 
	});
	if(!encontro){
		$("#datosmarca").html("");
	}
});	
	$("#id_modelo").on("keypress",function(e){
		validarkeypress(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	
	$("#id_modelo").on("keyup",function(){
		validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]{3,20}$/,
		$("#sid_modelo"),"El codigo del modelo debe ser de letras y/o números");
		if($("#id_modelo").val().length > 7){
		  var datos = new FormData();
		    datos.append('accion','consultatr');
			datos.append('id_modelo',$(this).val());
			enviaAjax(datos,'consultatr');	
		}
	});
	
	$("#descripcion_modelo").on("keypress",function(e){
		validarkeypress(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]*$/,e);
	});
	$("#descripcion_modelo").on("keyup",function(){
		validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$(this),$("#smodelo"),"La descripción puede ser de letras y/o numeros entre 3 y 30 caracteres");
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
	// let datos1 = {
	// 	codigo_modelo: "",
	// 	modelo: "",
	// 	id_marca: ""
	// }
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
		datos.append('id_marca', valor);
		datos.append('estado_registro',1);
		enviaAjax(datos);
		
	}
});
$("#modificar").on("click",function(){
	if(validarenvio()){

		var datos = new FormData();
		datos.append('accion','modificar');
		datos.append('id_modelo',$("#id_modelo").val());
		datos.append('descripcion_modelo',$("#descripcion_modelo").val());
		datos.append('id_marca', valor);
		datos.append('estado_registro',1);
		enviaAjax(datos);
		
	}
});

$("#eliminar").on("click",function(){
	
	if(validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]{3,20}$/,$("#id_modelo"),
		$("#sid_modelo"),"El formato debe ser 9999999 o 12345678")==0){
	    muestraMensaje("El codigo del modelo debe coincidir con el formato <br/>"+ 
						"99999999 o aT3oQ678");	
		
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
			$("#tablamodelo").DataTable().destroy();
	}
}
function crearDT(){
	//se crea nuevamente
	if (!$.fn.DataTable.isDataTable("#tablamodelo")) {
			$("#tablamodelo").DataTable({
			  language: {
				lengthMenu: "Mostrar _MENU_ por página",
				zeroRecords: "No se encontraron modelos",
				info: "Mostrando página _PAGE_ de _PAGES_",
				infoEmpty: "No hay modelos registradas",
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
	if(validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]{3,20}$/,$("#id_modelo"),
		$("#sid_modelo"),"El formato debe ser 9999999 o 12345678")==0){
	    muestraMensaje("El codigo del modelo debe coincidir con el formato <br/>"+ 
						"A959999 o B12345678");	
		return false;					
	}	
	else if(validarkeyup(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC]{3,30}$/,
		$("#descripcion_modelo"),$("#sdescripcion_modelo"),"Solo letras y/o números entre 3 y 30 caracteres")==0){
		muestraMensaje("Descripción del modelo <br/>Solo letras y/o números  entre 3 y 30 caracteres");
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
	valor = $(linea).find("td:eq(2)").text()
	// console.log(valor)
	$("#id_modelo").val($(linea).find("td:eq(0)").text());
	$("#descripcion_modelo").val($(linea).find("td:eq(1)").text());
	$("#id_marca").val($(linea).find("td:eq(3)").text());
	
	
}

function colocamarca(linea){
	valor = $(linea).find("td:eq(0)").text();
	// console.log(valor);

	$("#id_marca").val($(linea).find("td:eq(2)").text());

	// let content = linea;
    // let url = "src/tables/loadAccount.php"
    // let formaData = new FormData()
    // fetch(url, {
    //         method: "POST",
    //         body: formaData
    //     }).then(response => response.json())
    //     .then(data => {
    //         content.innerHTML = data.data
    //     }).catch(err => console.log(err))
	
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
						$("#descripcion_modelo").val(lee.mensaje[0][2]);
						$("#id_marca").val(lee.mensaje[0][3]);
						
						
					 }
					else if (lee.resultado == "incluir" || 
					lee.resultado == "modificar" || 
					lee.resultado == "eliminar") {
					   muestraMensaje(lee.mensaje);
					   limpia();
					   consultar();
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
	$("#id_marca").val("");
	
	
}
