<html> 
<title>EMPLEADOS</title>
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
GESTIÓN DE EMPLEADOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> <!-- todo el contenido ira dentro de esta etiqueta-->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
   <h4 class="text-center text-success">Registro de Empleados</h4>

	<div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			   <label for="cedula">Cedula</label>
			   <input class="form-control" type="text" id="cedula" name="cedula"maxlength="8"/>
			   <span id="scedula">El formato debe ser numérico con un minimo de 7 digitos</span>
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
			   <input class="form-control" type="text" id="telefono" name="telefono" maxlength="11"
			   />
			   <span id="stelefono">El formato debe ser 04XXXXXXXXX</span>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md">
			   <label for="correo">Correo</label>
			   <input class="form-control" type="text" id="correo" name="correo" 
			   />
			   <span id="scorreo">El formato debe ser nombrecorreo@servidor.com</span>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md">
			   <label for="direccion">Dirección</label>
			   <input class="form-control" type="text" id="direccion" name="direccion" 
			   />
			   <span id="sdireccion">Solo letras y/o numeros entre 6 y 35 caracteres</span>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md">
			   <label for="fechaNacimiento">Fecha de Nacimiento</label>
			   <input class="form-control" type="date" id="fechaNacimiento" name="fechaNacimiento" 
			   />
			</div>
		</div>
			
		<div class="row">
			<div class="col-md-12">
			<hr class="border border-success border-3 opacity-65">
			</div>
		</div>

		<div class="row mt-3 justify-content-left">
			<div class="col-md-3">
				<button type="button" class="btn btn-success" id="incluir" >REGISTRAR</button>
			</div>
			<div class="col-md-3">	
				<button type="button" class="btn btn-success" id="modificar" >EDITAR</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="eliminar" >BORRAR</button>
			</div>
			</div>
			<div class="row mt-3 justify-content-left">
			<div class="col-md-2">	
				   <a href="?pagina=principal" class="btn btn-success">REGRESAR</a>
			</div>
			</div>
	</div>	
	</form>

	<div class="col-8 p-4">
	<div class="container">
	<h5 class="modal-title text-center text-success">EMPLEADOS REGISTRADOS</h5>
	<hr class="border border-success border-3 opacity-65">
	<span>*Ayuda: Se debe seleccionar una fila para que envíe la información al formulario*</span>
		<!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablaempleados">
		<thead>
		  <tr>
			<th>Cédula</th>
			<th>Nombre y Apellido</th>
			<th>Télefono</th>	
			<th>Correo</th>
			<th>Dirección</th>
			<th>Fecha Naci</th>
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		  
		</tbody>
		</table>
		
	</div>
</div> <!-- fin de container -->
<?php require_once("comunes/body.php"); ?>
<script type="text/javascript" src="js/empleados.js"></script>

</body>
</html>