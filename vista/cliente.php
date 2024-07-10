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
			   <label for="direccion">Dirección</label>
			   <input class="form-control" type="text" id="direccion" name="direccion" 
			   />
			   <span id="sdireccion"></span>
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
	<h5 class="modal-title text-center text-success">CLIENTES REGISTRADOS</h5>
	<hr class="border border-success border-3 opacity-65">
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
		<tbody>
		<?php
			if(!empty($consulta)){
				echo $consulta;
			}
		  ?>
		  
		</tbody>
		</table>
		
    </div>
</div> <!-- fin de container -->

<script type="text/javascript" src="js/cliente.js"></script>

</body>
</html>