<html> 
<title>MODELOS</title>
<?php require_once("comunes/encabezado.php"); ?>
<body>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>
<div class="container text-center h2 text-success">
<br/>
<br/>
<br/>
MODELO DE PRODUCTOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> <!-- todo el contenido ira dentro de esta etiqueta-->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">Registro de modelos</h4>

   <div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			   <label for="id_modelo">Codigo de modelo</label>
			   <input class="form-control" type="text" id="id_modelo" name="id_modelo"/>
			   <span id="sid_modelo"></span>
			</div>
			</div>
			<div class="row mb-3">
			<div class="col-md">
			   <label for="descripcion_modelo">Descripción del Modelo</label>
			   <input class="form-control" type="text" id="descripcion_modelo" name="descripcion_modelo"/>
			   <span id="smodelo"></span>
			</div>
		</div>
		<div class="row mb-4">
		<div class="input-group mb-3">
		<button type="button" class="btn btn-success" id="listadodeMarca" name="listadodeMarca">LISTADO DE MARCA</button>
		<input class="form-control" type="text" id="id_marca" name="id_marca" />
		
		<span id="sid_marca"></span>
		</div>
		</div>

		<div class="row">
		<div class="col">

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
	<h5 class="modal-title text-center text-success">MODELOS REGISTRADOS</h5>
	<hr class="border border-success border-3 opacity-65">
	<span>*Ayuda: Se debe seleccionar una fila para que envíe la información al formulario*</span>
	    <!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablamodelo">
		<thead>
		  <tr>
		  <th style="display:none">id Modelo</th>
		  <th>Codigo de Modelos</th>
		  <th>Modelos</th>
		  <th>Marca</th>
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		  
		</tbody>
		</table>
		
    </div>
</div> <!-- fin de container -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modalMarca">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">Listado de Marca</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
			<th>Codigos de Marcas</th>
			<th>Marca</th>
			
		  </tr>
		</thead>
		<tbody id="listadoMarca">
		
		</tbody>
		</table>
    </div>
	<div class="modal-footer bg-light">
		<span>*Ayuda: Debe seleccionar una fila y presionar el boton "Cerrar" para salir*</span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>

<script type="text/javascript" src="js/modelo.js"></script>

</body>
</html>