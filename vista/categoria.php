<html> 
<title>CATEGORIAS</title>
<?php require_once("comunes/encabezado.php"); ?>
<?php require_once("./modelo/session.php"); ?>
<body>
<!--Llamar al archivo modal.php, y menu.php-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>
<div class="container text-center h2 text-success">
<br/>
<br/>
<br/>

CATEGORIAS DE PRODUCTOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> <!-- comienzo del contenedor de campos -->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">Registro de Categorias de Productos</h4>
	
	<div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			<input class="form-control" style="display: none;" type="text" id="id_categoria" name="id_categoria"/>
			   <label for="codigo_categoria">Codigo de categoria</label>
			   <input class="form-control" type="text" id="codigo_categoria" name="codigo_categoria"maxlength="8"/>
			   <span>El codigo debe ser numerico, alfabetico o alfanumerico, entre 7 y 8 digitos</span>
			   </div>
			   <span id="scodigo_categoria" class="alert alert-success"></span>
			</div>
			<div class="row mb-3">
			<div class="col-md">
			   <label for="descripcion_categoria">Descripción de la categoria</label>
			   <input class="form-control" type="text" id="descripcion_categoria" name="descripcion_categoria" maxlength="20"/>
			   <span>Debe colocar una categoria de producto con solo letras, entre 3 a 20 digitos</span>
			</div>
			<span id="sdescripcion_categoria" class="alert alert-success"></span>
		</div>
		<div class="row mb-3">    
		
					<div class="row mb-3">
					
					   
					</div>
					</div>
		</div> <!-- fin del contenedor de campos -->

		<!-- linea divisora de campos y botones -->
		<div class="row">
			<div class="col-md-12">
			<hr class="border border-success border-3 opacity-65">
			</div>
		</div>

		<!-- Incio de la sección de contenedor de los botones -->
		<div class="row mt-3 justify-content-left">
			<div class="col-md-4">
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
			<div class="col-md-4">	
				   <button type="button" class="btn btn-success" id="consultadeDelete" >CONSULTAS ELIMINADAS</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="restaurar">RESTAURAR</button>
			</div>
			</div>
	
	</form><!-- fin de la sección de contenedor de los botones -->

	<div class="col-8 p-4">
	<div class="container">
	<h5 class="modal-title text-center text-success">CATEGORIAS REGISTRADAS</h5>
	<hr class="border border-success border-3 opacity-65">
	<span>*Ayuda: Se debe seleccionar una fila para que envíe la información al formulario*</span>
		<!--se coloca un id para enlazar con el datatablet y la configuración de esta en el archivo categoria.js--> 
		<table class="table table-striped table-hover" id="tablacategoria">
		<thead>
		  <tr>
		  <th style="display: none;">ID de categoria</th>
			<th>Codigo de categoria</th>
			<th>Descripción de la categoria</th>
			<th>estado de registro</th>
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		</tbody>
		</table>
		
	</div>
</div>
</div> <!-- fin de container -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modalCategoria">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-header text-light bg-success">
		<h5 class="modal-title">CATEGORIAS ELIMINADAS</h5>
		<button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
		  <span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
		  <th style="display: none;">ID de categoria</th>
			<th>Codigo de categoria</th>
			<th>Descripción de la categoria</th>
	
		  </tr>
		</thead>
		<tbody id="consultaDelete">
		 
		</tbody>
		</table>
	</div>
	<div class="modal-footer bg-light">
	<span>*Ayuda: Debe seleccionar una fila y presionar el boton "Cerrar" para salir*</span>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	</div>
  </div>
</div>
<?php require_once("comunes/body.php"); ?>
<script type="text/javascript" src="js/categoria.js"></script>

</body>
</html>