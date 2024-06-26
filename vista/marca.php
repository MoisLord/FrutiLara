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
MARCAS DE PRODUCTOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> <!-- todo el contenido ira dentro de esta etiqueta-->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">Registro de Marcas</h4>
	
	<div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			   <label for="codigo">Modelo o modelo de marca</label>
			   <input class="form-control" type="text" id="modelo" name="modelo"/>
			   <span id="smodelo"></span>
			</div>
			</div>
			<div class="row mb-3">
			<div class="col-md">
			   <label for="nombre">Marca</label>
			   <input class="form-control" type="text" id="marca" name="marca"/>
			   <span id="smarca"></span>
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
	<h5 class="modal-title text-center text-success">MARCAS REGISTRADAS</h5>
	<hr class="border border-success border-3 opacity-65">
	    <!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablamarca">
		<thead>
		  <tr>
			<th>Registro de Marcas</th>
			<th>Marca</th>
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		  
		  
		</tbody>
		</table>
		
    </div>
</div>

</div>

<script type="text/javascript" src="js/marca.js"></script>

</body>
</html>