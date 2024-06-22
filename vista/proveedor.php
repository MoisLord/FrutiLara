<html> 
<?php require_once("comunes/encabezado.php"); ?>
<body>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>
<body>
<div class="container text-center h2 text-success">
<hr/>
<hr/>
<hr/>
<hr/>
<hr/>
	PROVEEDORES
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> 
	<form method="post" id="f" autocomplete="off">
	<h4 class="text-center text-success">Registro de proveedores</h4>
	<div class="container">	
    <div class="row mb-3">
		<div class="col-md">
		   <label for="rif">Rif</label>
		   <input class="form-control" type="text" id="rif" name="rif" />
		   <span id="srif"></span>
		</div>

		<div class="col-md">
		   <label for="Nombre">Nombre</label>
		   <input class="form-control" type="text" id="Nombre" name="Nombre" />
		   <span id="sNombre"></span>
		</div>
		<div class="col-md">
		   <label for="Telefono">Telefono</label>
		   <input class="form-control" type="text" id="Telefono" name="Telefono" />
		   <span id="sTelefono"></span>
		</div>
		<div class="col-md">
		   <label for="Direccion">Dirección</label>
		   <input class="form-control" type="text" id="Direccion" name="Direccion" />
		   <span id="sDireccion"></span>
		</div>
	</div>

	<div class="row">
			<div class="col-md-12">
            <hr class="border border-success border-3 opacity-65">
			</div>
	</div>

	<div class="row mt-3 justify-content-left">
		<div class="col">
			   <button type="button" class="btn btn-success" id="incluir" name="incluir">INCLUIR</button>
		</div>
		<div class="col">	
			   <button type="button" class="btn btn-success" id="consultar" data-toggle="modal" data-target="#modal1" name="consultar">CONSULTAR</button>
		</div>
		<div class="col">	
			   <button type="button" class="btn btn-success" id="modificar" name="modificar">MODIFICAR</button>
		</div>
		<div class="col">	
			   <button type="button" class="btn btn-success" id="eliminar" name="eliminar">ELIMINAR</button>
		</div>
		<div class="col">	
			   <a href="." class="btn btn-success">REGRESAR</a>
		</div>
	</div>
	</div>	
	</form>
</div> 
	
<div class="col-8 p-4">
	<div class="container">
	<h5 class="modal-title text-center text-success">PROVEEDORES</h5>
	<hr class="border border-success border-3 opacity-65">
	    <!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablaproveedores">
		<thead>
		  <tr>
			<th>Rif</th>
			<th>Nombre del proveedor</th>
			<th>Telefonon</th>	
			<th>Direccion</th>
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		  
		  
		</tbody>
		</table>

</div>
<!--Llamada a las librerias de javascript para las validaciones de esta pagina -->
<script type="text/javascript" src="js/proveedor.js"></script>
</body>
</html>