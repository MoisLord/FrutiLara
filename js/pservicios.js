$(document).ready(function(){
	// Si estoy aca es porque la 
	// vista cargo correctamente por lo que ahora
	// debo sacar de la base de datos los elementos que se mostraran
	
	// Cargar la lista de servicios
     carga_servicios();
		
	//boton para levantar modal de servicios
	$("#listadoservicios").on("click",function(){
		$("#modalservicios").modal("show");
	});
	
	
	
	//evento keyup de input idservicios	
	$("#idservicios").on("keyup",function(){
		var servicio = $(this).val();
		var encontro = false;
		$("#listadoservicios tr").each(function(){
			if(servicio == $(this).find("td:eq(1)").text()){
				colocaservicio($(this));
				encontro = true;
			} 
		});
		if(!encontro){
			$("#datosdelservicio").html("");
		}
	});	
	
	
	//evento click de boton facturar
	$("#registrar").on("click",function(){
		if(existeservicio()==true){
			if(verificaproductos()){
				$('#accion').val('registrar');
				var datos = new FormData($('#f')[0]);
				
				enviaAjax(datos);
			}
			else{
				muestraMensaje("Debe agregar algun producto al inventario !!!");
			}
		}
		else{
			muestraMensaje("Debe ingresar un servicio registrado !!!");
		}
	});
		
		
	});
	
	function carga_servicios(){
		// para cargar la lista de servicios
		// utilizaremos una peticion ajax
		// por lo que usaremos un objeto llamado 
		// FormData, que es similar al <form> de html
		// es decir colocaremos en ese FormData, los
		// elementos que se desean enviar al servidor
		
		var datos = new FormData();
		//a ese datos le añadimos la informacion a enviar
		datos.append('accion','listadoservicios'); //le digo que me muestre un listado de aulas
		//ahora se envia el formdata por ajax
		enviaAjax(datos);
	}
	

	
	//function para buscar si existe el servicio 
	function existeservicio(){
		var servicio = $("#idservicios").val();
		var existe = false;
		$("#listadoservicios tr").each(function(){
			
			if(servicio == $(this).find("td:eq(1)").text()){
				existe = true;
			}
		});
		
		return existe;
		
	}
	//fin de funcion existeservicio
	
	
	document.getElementById("cerrarModal").addEventListener("click", function() { 
		$('#cantidadModal').modal('hide'); });
	//funcion para modificar subtotal
	function modificasubtotal(textocantidad){
		var linea = $(textocantidad).closest('tr');
		var valor = $(textocantidad).val()*1;
		var pvp = $(linea).find("td:eq(6)").text()*1;
		var resultado= pvp -valor;
		if(resultado<0){
			$('#cantidadModal').modal('show');
			$(textocantidad).val(0); // Restablece el valor 
			resultado = 0; // Asegura que el resultado no sea negativo
			
		}
		$(linea).find("td:eq(7)").text(redondearDecimales((resultado),0));
		$(linea).find("input[name='resta[]']").val(redondearDecimales((resultado),0));
	}
	//fin de funcion modifica subtotal
	
	
	//funcion para eliminar linea de detalle de ventas
	function eliminalineadetalle(boton){
		$(boton).closest('tr').remove();
	}
	// fin de funcion de eliminar linea
	
	
	//funcion para colocar datos del servicio en pantalla
	function colocaservicio(linea){
    $("#idservicios").val($(linea).find("td:eq(1)").text());
    $("#costo").val($(linea).find("td:eq(0)").text());
    $("#pago").html($(linea).find("td:eq(2)").text()); 
    $("#fpago").html($(linea).find("td:eq(3)").text()+
    "  "+$(linea).find("td:eq(4)").text()+"  "+
    $(linea).find("td:eq(5)").text());
}
	
	//fin de colocar datos del servicio
	
	
	
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
	
	function redondearDecimales(numero, decimales) {
		return Number(Math.round(numero +'e'+ decimales) +'e-'+ decimales).toFixed(decimales);
		
	}
	function enviaAjax(datos){
		
		$.ajax({
			async: true,
				url: '', //la pagina a donde se envia por estar en mvc, se omite la ruta ya que siempre estaremos en la misma pagina
				type: 'POST',//tipo de envio 
				contentType: false,
				data: datos,
				processData: false,
				cache: false,
				beforeSend: function(){
					//pasa antes de enviar pueden colocar un loader
					$("#loader").show();
					
				},
				timeout:10000, //tiempo maximo de espera por la respuesta del servidor
				success: function(respuesta) {//si resulto exitosa la transmision
					
					try{
					// se usa try catch porque los datos que se
					// reciben vienen en formato json
					// por lo que se deben convertir en un arreglo 
					// asociativo para usarlos en javascript
					// si el json no esta bien formado, este paso genera un
					// error
					var lee = JSON.parse(respuesta);	
					console.log(lee.resultado);
					if(lee.resultado=='listadoservicios'){
						
						//si el servidor retorno como
						// resultado listadoservicios significa
						// que se obtuvieron datos del json
						// y se colocan esos resultados en la vista
						$('#listadoservicios').html(lee.mensaje);
					}
					else if(lee.resultado=='listadoproductos'){
						
						$('#listadoproductos').html(lee.mensaje);
					}
					else if(lee.resultado=='registrar'){
						
						muestraMensaje(lee.mensaje);
					}
					else if(lee.resultado=='error'){
						muestraMensaje(lee.mensaje);
					}
					
				}
				catch(e){
					alert("Error en JSON "+e.name+" !!!");
				}
				  //cuanto termina el proceso ocultan el loader
				  
				},
				error: function(request, status, err){
					// si ocurrio un error en la trasmicion 
					// o recepcion via ajax entra aca
					// y se muestran los mensaje del error
					
					if (status == "timeout") {
						//pasa cuando superan los 10000 10 segundos de timeout
						muestraMensaje("Servidor ocupado, intente de nuevo");
					} else {
						//cuando ocurreo otro error con ajax
						muestraMensaje("ERROR: <br/>" + request + status + err);
					}
				},
				complete: function(){
					//Ocurre luego del succes
					// esta es la parte final del proceso de
					// trasmision recepcion y la puede usar para
					// ocultar un loader
					
				}
				
			});
	
	
	
			
	}