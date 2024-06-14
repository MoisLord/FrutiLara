<html> 
<?php require_once("comunes/encabezado.php"); ?>
<?php require_once('comunes/menu.php'); ?>
<body>
<div class="container-fluid p-0">
<div class="container text-center h2 text-primary">
<hr/>
<hr/>
<hr/>
	Pantalla de Proveedores
<hr/>
</div>
<<div class="container"> 
	<form method="post" id="f" autocomplete="off">
    <div class="row">
		<div class="col">
		   <label for="rif">rif</label>
		   <input class="form-control" type="text" id="rif" name="rif" />
		   <span id="srif"></span>
		</div>

		<div class="col">
		   <label for="Nombre">Nombre</label>
		   <input class="form-control" type="text" id="Nombre" name="Nombre" />
		   <span id="sNombre"></span>
		</div>
		<div class="col">
		   <label for="telefono">Telefono</label>
		   <input class="form-control" type="text" id="Telefono" name="telefono" />
		   <span id="sTelefono"></span>
		</div>
		<div class="col">
		   <label for="Direccion">Dirección</label>
		   <input class="form-control" type="text" id="Direccion" name="Direccion" />
		   <span id="sDireccion"></span>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>

	<div class="row">
		<div class="col">
			   <button type="button" class="btn btn-primary" id="incluir" name="incluir">INCLUIR</button>
		</div>
		<div class="col">	
			   <button type="button" class="btn btn-primary" id="consultar" 
			   data-toggle="modal" data-target="#modal1" name="consultar">CONSULTAR</button>
		</div>
		<div class="col">	
			   <button type="button" class="btn btn-primary" id="modificar" name="modificar">MODIFICAR</button>
		</div>
		<div class="col">	
			   <button type="button" class="btn btn-primary" id="eliminar" name="eliminar">ELIMINAR</button>
		</div>
		<div class="col">	
			   <a href="." class="btn btn-primary">REGRESAR</a>
		</div>
	</div>
	</form>
</div> <!-- fin de container -->
<!-- seccion del modal -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-info">
        <h5 class="modal-title">Listado de Usuarios</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
			<th>Cedula</th>
			<th>Usuario</th>
			<th>Clave</th>
		  </tr>
		</thead>
		<tbody>
		  <tr>
			<td>12345678</td>
			<td>Pedro</td>
			<td>******</td>
		  </tr>
		  <tr>
			<td>77777777</td>
			<td>Maria</td>
			<td>*******</td>
		  </tr>
		  <tr>
			<td>99999999</td>
			<td>Tanos</td>
			<td>*******</td>
		  </tr>
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