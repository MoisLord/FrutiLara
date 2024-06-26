<html> 
<?php require_once("comunes/encabezado.php"); ?>
<body>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>
<div class="container text-center h2 text-success">
<hr/>
<hr/>
<hr/>
<hr/>
<hr/>
<hr/>
GESTIÓN DE EMPLEADOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> <!-- todo el contenido ira dentro de esta etiqueta-->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">Registro de Empleados</h4>

	<div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			   <label for="cedula">Cedula</label>
			   <input class="form-control" type="text" id="cedula"
				name="cedula"/>
			   <span id="scedula"></span>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md">
			   <label for="nombre_apellido">Nombre y Apellido</label>
			   <input class="form-control" type="text" id="nombre_apellido"
				name="nombre_apellido"/>
			   <span id="snombre_apellido"></span>
			</div>
		</div>
		
		<div class="row mb-3">
			<div class="col-md">
			   <label for="telefono">Teléfono</label>
			   <input class="form-control" type="text" id="telefono" name="telefono" 
			   />
			   <span id="stelefono"></span>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md">
			   <label for="correo">Correo</label>
			   <input class="form-control" type="text" id="correo" name="correo" 
			   />
			   <span id="scorreo"></span>
			</div>
		</div>

		<div class="row mb-3">
			<div class="col-md">
			   <label for="direccion">Dirección</label>
			   <input class="form-control" type="text" id="direccion" name="direccion" 
			   />
			   <span id="sdireccion"></span>
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
				<button type="button" class="btn btn-success" id="consultar" >VISUALIZAR</button>
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


<!-- seccion del modal -->
<!--<div class="modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">EMPLEADOS REGISTRADOS</h5>
        <button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
	    e!--se agrega un id para poder enlazar con el datatablet--e> 
		<table class="table table-striped table-hover" id="tablaclientes">
		<thead>
		  <tr>
			<th>Cedula</th>
			<th>Nombre y Apellido</th>
			<th>Ciudad donde vive</th>
			<th>Teléfono</th>
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		  
		  
		</tbody>
		</table>
    </div>
	<div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>-->
<!--fin de seccion modal-->
<script type="text/javascript" src="js/empleados.js"></script>

</body>
</html>