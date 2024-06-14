<html> 
<?php require_once("comunes/encabezado.php"); ?>
<body>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>
<div class="container text-center h2 text-primary">
<hr/>
<hr/>
<hr/>
REGISTRO DE CLIENTES
<hr/>
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
   <form method="post" id="f" autocomplete="off">
	
	<div class="container">	
		<div class="row mb-3">
			<div class="col-md-4">
			   <label for="cedula">Cedula</label>
			   <input class="form-control" type="text" id="cedula"
				name="cedula"/>
			   <span id="scedula"></span>
			</div>
			<div class="col-md-8">
			   <label for="nombre_apellido">Nombre y Apellido</label>
			   <input class="form-control" type="text" id="nombre_apellido"
				name="nombre_apellido"/>
			   <span id="snombre_apellido"></span>
			</div>
		</div>
		
		<div class="row mb-3">
			<div class="col-md-8">
			   <label for="ciudad">Ciudad donde vive</label>
			   <input class="form-control" type="text" id="ciudad"
					name="ciudad"/>
			   <span id="sciudad"></span>
			</div>
			<div class="col-md-4">
			   <label for="telefono">Teléfono</label>
			   <input class="form-control" type="text" id="telefono" name="telefono" 
			   />
			</div>
		</div>
			
		<div class="row">
			<div class="col-md-12">
				<hr/>
			</div>
		</div>

		<div class="row mt-3 justify-content-center">
			<div class="col-md-2">
				   <button type="button" class="btn btn-primary" id="incluir" >INCLUIR</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-primary" id="consultar" >CONSULTAR</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-primary" id="modificar" >MODIFICAR</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-primary" id="eliminar" >ELIMINAR</button>
			</div>
			<div class="col-md-2">	
				   <a href="." class="btn btn-primary">REGRESAR</a>
			</div>
		</div>
	</div>	
	</form>
</div> <!-- fin de container -->


<!-- seccion del modal -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-info">
        <h5 class="modal-title">CLIENTES REGISTRADOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
	    <!--se agrega un id para poder enlazar con el datatablet--> 
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
</div>
<!--fin de seccion modal-->
<script type="text/javascript" src="js/clientes.js"></script>

</body>
</html>