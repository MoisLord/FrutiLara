<html> 
<title>USUARIOS</title>
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
USUARIOS DEL SISTEMA
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> <!-- todo el contenido ira dentro de esta etiqueta-->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">Registro de Usuarios</h4>
	
	<div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			   <label for="cedula">Cedula</label>
			   <input class="form-control" type="text" id="cedula" name="cedula"/>
			   <span id="scedula"></span>
			</div>
			</div>
			<div class="mb-3">
		<label for="tipo_usuario">Tipos de usuario</label>
		<select class="form-select" aria-label="Default select example" id="tipo_usuario">
			<option value="SUPERUSUARIO">Super Usuario</option> 
			<option value="ADMINISTRADOR">Administrador</option> 
			<option value="EMPLEADO">Empleado</option> 
		</select> 
		</div> 
		
		<div class="row mb-4">
			<div class="col-md">
				<label for="clave">Contraseña</label>
				<input class="form-control" type="text" id="clave" name="clave"/>
				<span id="sclave"></span>
			</div>
			</div>
			
		
		<div class="row">
			<div class="col-md-12">
			<hr class="border border-success border-3 opacity-65">
			</div>
		</div>

		<div class="row mt-3 justify-content-left">
			<div class="col-md-3">
				<button type="button" class="btn btn-success" id="incluir" >
					<img src="iconos/register.svg" alt="delete" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				</button>
			</div>
			<div class="col-md-3">	
				<button type="button" class="btn btn-success" id="modificar" >
					<img src="iconos/edit.svg" alt="delete" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="eliminar" >
					<img src="iconos/delete.svg" alt="delete" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				   </button>
			</div>
			</div>
	</div>	
	</form>




	<div class="col-8 p-4">
	<div class="container">
	<h5 class="modal-title text-center text-success">USUARIOS REGISTRADOS</h5>
	<hr class="border border-success border-3 opacity-65">
	<span>*Ayuda: Se debe seleccionar una fila para que envíe la información al formulario*</span>
		<!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablausuario">
		<thead>
		  <tr>
			<th>Cedula</th>
			<th>Tipo de usuario</th>
			<th>Contraseña</th>	
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		  
		</tbody>
		</table>
		
	</div>
</div>
<!-- seccion del modal -->
<!-- <div class="modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-header text-light bg-success">
		<h5 class="modal-title">PRODUCTOS REGISTRADOS</h5>
		<button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
		  <span aria-hidden="true">&times;</span>
		</button>
	</div> 	-->
</div> <!-- fin de container -->
<?php require_once("comunes/body.php"); ?>
<script type="text/javascript" src="js/usuario.js"></script>

</body>
</html>