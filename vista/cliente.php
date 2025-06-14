<html> 
<title>CLIENTES</title>
<?php require_once("comunes/encabezado.php"); ?>
<?php require_once("./modelo/session.php"); ?>
<body>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>
<div class="container text-center h2 text-success">
<br/>
<br/>
<br/>
GESTIÓN DE CLIENTES
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> <!-- todo el contenido ira dentro de esta etiqueta-->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">Registro de clientes</h4>

	<div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			   <label for="cedula">Cedula</label>
			   <input class="form-control" type="text" id="cedula"
				name="cedula" maxlength="9"/>
			   <span id="scedula">El formato debe ser 9999999</span>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md">
			   <label for="nombre_apellido">Nombre y Apellido</label>
			   <input class="form-control" type="text" id="nombre_apellido"
				name="nombre_apellido" maxlength="30"/>
			   <span id="snombre_apellido">Solo letras  entre 3 y 30 caracteres</span>
			</div>
		</div>
		
		<div class="row mb-3">
			<div class="col-md">
			   <label for="telefono">Teléfono</label>
			   <input class="form-control" type="text" id="telefono" name="telefono" 
			   maxlength="11"/>
			   <span id="stelefono">El formato debe ser 04241234567</span>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md">
			   <label for="direccion">Dirección</label>
			   <input class="form-control" type="text" id="direccion" name="direccion" maxlength="45" 
			   />
			   <span id="sdireccion">Solo letras y/o numeros entre 6 y 35 caracteres</span>
			</div>
		</div>

			
		<div class="row">
			<div class="col-md-12">
			<hr class="border border-success border-3 opacity-65">
			</div>
		</div>

		<div class="row mt-3 justify-content-left">
		<div class="col-md-4">
				<button type="button" class="btn btn-success" id="incluir" >
					<img src="iconos/register.svg" alt="register" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				</button>
			</div>

			<div class="col-md-3">
				<button type="button" class="btn btn-success" id="modificar" >
					<img src="iconos/edit.svg" alt="edit" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="eliminar" >
					   <img src="iconos/delete.svg" alt="delete" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				   </button>
			</div>
			</div>
			<div class="row mt-3 justify-content-left">
			<div class="col-md-4">	
				   <button type="button" class="btn btn-success" id="consultadeDelete">
					   <img src="iconos/list.svg" alt="list" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				   </button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="restaurar">
					   <img src="iconos/restore.svg" alt="restore" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				   </button>
			</div>
			</div>
	</div>
	</form>

	<div class="col-8 p-4">
	<div class="container">
	<h5 class="modal-title text-center text-success">CLIENTES REGISTRADOS</h5>
	<hr class="border border-success border-3 opacity-65">
	<span>*Ayuda: Se debe seleccionar una fila para que envíe la información al formulario*</span>
		<!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablaclientes">
		<thead>
		  <tr>
			<th>Cédula</th>
			<th>Nombre y Apellido</th>
			<th>Télefono</th>
			<th>Dirección</th>
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		</tbody>
		</table>
		
	</div>
</div> <!-- fin de container -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modalCliente">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-header text-light bg-success">
		<h5 class="modal-title">CATEGORIAS ELIMINADAS</h5>
		<button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
		  <span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
			<th>Cédula</th>
			<th>Nombre y Apellido</th>
			<th>Télefono</th>
			<th>Dirección</th>
		  </tr>
		</thead>
		<tbody id="consultaDelete">
		 
		</tbody>
		</table>
	</div>
	<div class="modal-footer bg-light">
	<span>*Ayuda: Debe seleccionar una fila y presionar el boton "Cerrar" para salir*</span>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	</div>
  </div>
</div>
<?php require_once("comunes/body.php"); ?>
<script type="text/javascript" src="js/cliente.js"></script>

</body>
</html>