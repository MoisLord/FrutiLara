// Instrucción que indica que cuando este
// lista la vista (cargado todo el texto)
// ejecute la funcion anonima function()
$(document).ready(function(){
	// Si estoy aca es porque la 
	// vista cargo correctamente por lo que ahora
	// debo sacar de la base de datos los elementos que se mostraran
	
	// Cargar la lista de clientes
		carga_servicios();
	//carga la lista de productos
		carga_productos();
		
	//boton para levantar modal de clientes
	$("#listadodeclientes").on("click",function(){
		$("#modalclientes").modal("show");
	});
	
	//evento keyup de input cedulacliente	
	$("#codigoservicios").on("keyup",function(){
		var codigo = $(this).val();
		var encontro = false;
		$("#listadoservicios tr").each(function(){
			if(codigo == $(this).find("td:eq(1)").text()){
				colocaservicios($(this));
				encontro = true;
			} 
		});
		if(!encontro){
			$("#datosdelservicio").html("");
		}
	});	
	
	//evento keyup de input codigoproducto
	$("#codigoproducto").on("keyup",function(){
		var codigo = $(this).val();
		$("#listadoproductos tr").each(function(){
			if(codigo == $(this).find("td:eq(1)").text()){
				colocaproducto($(this));
			}
		});
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
			muestraMensaje("Debe ingresar un proveedor registrado !!!");
		}
	});
		
		
	});
	
	function carga_servicios(){
		// para cargar la lista de clientes
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
	function carga_productos(){
		
		
		var datos = new FormData();
		
		datos.append('accion','listadoproductos'); //le digo que me muestre un listado de aulas
		
		enviaAjax(datos);
	}
	
	//function para saber si selecciono algun productos
	function verificaproductos(){
		var existe = false;
		if($("#entrada tr").length > 0){
			existe = true;
		}
		return existe;
	}
	//fin de verificar si selecciono procductos
	
	//function para buscar si existe el cliente 
	function existeservicio(){
		var codigo = $("#codigoservicios").val();
		var existe = false;
		$("#listadoservicios tr").each(function(){
			
			if(codigo == $(this).find("td:eq(1)").text()){
				existe = true;
			}
		});
		
		return existe;
		
	}
	//fin de funcion existecliente
	
	//funcion para colocar los productos
	function colocaproducto(linea){
		var id = $(linea).find("td:eq(0)").text();
		var encontro = false;
		
		$("#entrada tr").each(function(){
			if(id*1 == $(this).find("td:eq(1)").text()*1){
				encontro = true;
				
				t.val(t.val()*1+1);
				modificasubtotal(t);
			} 
		});
		
		if(!encontro){
			var l = `
		  <tr>
		   <td>
		   <button type="button" class="btn btn-danger" onclick="eliminalineadetalle(this)">X</button>
		   </td>
		   <td>
			   <input type="text" name="idp[]" style="display:none"
			   value="`+
					$(linea).find("td:eq(0)").text()+
			   `"/>`+	
					$(linea).find("td:eq(0)").text()+
		   `</td>
		   <td>`+
					$(linea).find("td:eq(1)").text()+
		   `</td>
		    <td>
		      <input type="text"  name="cant[]"   maxlength="10"/>
		   </td>
		    <td>`+
					$(linea).find("td:eq(2)").text()+
		   `</td>
		   <td>`+
					$(linea).find("td:eq(3)").text()+
		   `</td>
		  
		   </tr>`;
			$("#entrada").append(l);
		}
	}
	//fin de funcion colocar productos
	/*document.getElementById("cerrarModal").addEventListener("click", function() { 
		$('#cantidadModal').modal('hide'); });
	//funcion para modificar subtotal
	function modificasubtotal(textocantidad){
		var linea = $(textocantidad).closest('tr');
		
		var valor = $(textocantidad).val()*1;
		var minimo = $(linea).find("td:eq(3)").text()*1;
		var maximo = $(linea).find("td:eq(4)").text()*1;
		 if(valor< minimo || valor > maximo){
			$('#cantidadModal').modal('show'); $(textocantidad).val(minimo);
			$(textocantidad).val(minimo);
			$(linea).find("td:eq(5)").text(redondearDecimales(0, 0));
			return;
		} // Restablece el valor al mínimo si está fuera de rango return; // Sale de la función }

		
		
		var resultado = valor + $(linea).find("td:eq(4)").text() * 1; // Suponiendo que la columna 4 tiene el precio o valor unitario
		 $(linea).find("td:eq(5)").text(redondearDecimales(resultado, 0));
	}*/
	//fin de funcion modifica subtotal
	
	
	//funcion para eliminar linea de detalle de ventas
	function eliminalineadetalle(boton){
		$(boton).closest('tr').remove();
	}
	// fin de funcion de eliminar linea
	
	
	//funcion para colocar datos del cliente en pantalla
	function colocaservicios(linea){
		$("#codigoservicios").val($(linea).find("td:eq(1)").text());
		$("#idservicios").val($(linea).find("td:eq(0)").text());
		$("#datosdelservicio").html($(linea).find("td:eq(2)").text()+
		"  "+$(linea).find("td:eq(3)").text()+"  "+
		$(linea).find("td:eq(4)").text());
	}
	
	//fin de colocar datos del cliente
	
	
	
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
						// resultado listadoclientes significa
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