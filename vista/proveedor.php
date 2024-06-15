<html> 
<?php require_once("comunes/encabezado.php"); ?>
<body>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>
<body>
<div class="container-fluid p-0">
<div class="container text-center h2 text-success">
<hr/>
<hr/>
<hr/>
	PROVEEDORES
<hr class="border border-success border-3 opacity-65">
</div>
<<div class="container"> 
	<form method="post" id="f" autocomplete="off">
    <div class="row">
		<div class="col">
		   <label for="rif">Rif</label>
		   <input class="form-control" type="text" id="rif" name="rif" />
		   <span id="srif"></span>
		</div>

		<div class="col">
		   <label for="Nombre">Nombre</label>
		   <input class="form-control" type="text" id="Nombre" name="Nombre" />
		   <span id="sNombre"></span>
		</div>
		<div class="col">
		   <label for="Telefono">Telefono</label>
		   <input class="form-control" type="text" id="Telefono" name="Telefono" />
		   <span id="sTelefono"></span>
		</div>
		<div class="col">
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

	<div class="row">
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
	</form>
</div> <!-- fin de container -->
<!-- seccion del modal -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">PROVEEDORES REGISTRADOS</h5>
        <button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
	    <!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablaproveedores">
		<thead>
		  <tr>
			<th>Rif</th>
			<th>Nombre del proveedor</th>
			<th>Telefono</th>
			<th>Direccion</th>
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
</div>
<!--fin de seccion modal-->


<!--Llamada a las librerias de javascript para las validaciones de esta pagina -->
<script type="text/javascript" src="js/proveedor.js"></script>
</body>
</html>