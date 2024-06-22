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
CATEGORIAS DE PRODUCTOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> <!-- todo el contenido ira dentro de esta etiqueta-->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">REGISTRO DE PROVEEDORES</h4>
	
	<div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			   <label for="codigo_categoria">Rif</label>
			   <input class="form-control" type="text" id="rif" name="rif" />
			   <span id="srif"></span>
			</div>
			</div>
			<div class="row mb-3">
			<div class="col-md">
			   <label for="tipo">Nombre del proveedor</label>
			   <input class="form-control" type="text" id="Nombre" name="Nombre" />
			   <span id="sNombre"></span>
			</div>
		</div>    
        
		<div class="row mb-4">
			<div class="col-md">
        		<label for="unidadMedNormal">Telefono</label>
				<input class="form-control" type="text" id="Telefono" name="Telefono" />
				<span id="sTelefono"></span>
    		</div>
			</div>
			<div class="row mb-4">
			<div class="col-md">
			   <label for="unidadMedAlt">Dirección</label>
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
				   <a href="." class="btn btn-success">REGRESAR</a>
			</div>
			</div>
	</div>	
	</form>




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
<script type="text/javascript" src="js/categoria.js"></script>

</body>
</html>
