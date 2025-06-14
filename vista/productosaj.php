<html>
<title>PRODUCTOS</title>
<?php require_once("comunes/encabezado.php"); ?>
<?php require_once("./modelo/session.php"); ?>
<body>
<div id="mensajes" style="display:none">
<?php
	if(!empty($mensaje)){
		echo $mensaje;
	}
?>	
</div>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>


<div class="container text-center h2 text-success">
<br/>
<br/>
<br/>
PRODUCTOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> <!-- todo el contenido ira dentro de esta etiqueta-->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">Registro de Productos</h4>
	
	<div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			   <label for="codigo">Codigo del Producto</label>
			   <input class="form-control" type="text" id="codigo" name="codigo"maxlength="15"/>
			   <span id="scodigo">El código debe tener mínimo 2 dígitos</span>
			</div>
			</div>
			<div class="row mb-3">
			<div class="col-md">
			   <label for="nombre">Nombre del Producto</label>
			   <input class="form-control" type="text" id="nombre" name="nombre"maxlength="30"/>
			   <span id="snombre">Solo letras minimo 3 caracteres</span>
			</div>
		</div>    
		<div class="row mb-3">
		<div class="row mb-4">
			<div class="col-md">
				<label for="minimo">Minima Existencia</label>
				<input class="form-control" type="text" id="minimo" name="minimo"maxlength="10"/>
				<span id="sminimo">Debe tener mínimo 2 caracteres</span>
			</div>

			<div class="col-md">
			   <label for="maximo">Maxima Existencia</label>
			   <input class="form-control" type="text" id="maximo" name="maximo"maxlength="10"/>
			   <span id="smaximo">Debe tener mínimo 2 caracteres</span>
			</div>
		</div>
		
		
		
		<div class="row mb-4">
		<div class="input-group mb-3">
		  <button type="button" class="btn btn-success" id="listadodeCategoria" name="listadodeCategoria">LISTADO DE CATEGORIAS</button>
		  <input class="form-control" type="text" id="id_categoria" name="id_categoria" disabled/>
		  <span>*Ayuda: Presione el boton "LISTADO DE CATEGORIAS" para seleccionar la categoria*</span>
		</div>
		</div>

	<div class="row">
		<div class="col-md-12" id="datoscategoria">   
		</div>
	</div>
	</div>
		<div class="row">
			<div class="col-md-12">
			<hr class="border border-success border-3 opacity-65">
			</div>
		</div>

		<div class="row mt-3 justify-content-left">
			<div class="col-md-2">
				<button type="button" class="btn btn-success" id="incluir" >
					<img src="iconos/register.svg" alt="register" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				</button>
			</div>
			
			<div class="col-md-2">	
				<button type="button" class="btn btn-success" id="modificar" >
					<img src="iconos/edit.svg" alt="edit" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="eliminar" >
					   <img src="iconos/delete.svg" alt="delete" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				   </button>
			</div>
			</div>
			<div class="row mt-3 justify-content-left">

			<div class="col-md-4">	
				   <button type="button" class="btn btn-success" id="consultadeDelete" >
					   <img src="iconos/list.svg" alt="list" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				   </button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="restaurar">
					   <img src="iconos/restore.svg" alt="restore" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				   </button>
			</div>
			</div>
	</div>	
	</form>

	<div class="col-8 p-4">
	<div class="container">
	<h5 class="modal-title text-center text-success">PRODUCTOS REGISTRADOS</h5>
	<hr class="border border-success border-3 opacity-65">
	<span>*Ayuda: Se debe seleccionar una fila para que envíe la información al formulario*</span>
		<!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablaproducto">
		<thead>
		  <tr>
			<th style="Display:none">Codigo Productos</th>
			<th style="Display:none">Codigo Productos</th> <!-- filas para que funcione el datatable -->
			<th>Codigo Productos</th>
			<th>Nombre Productos</th>
			<th>Minimo</th>	
			<th>Maximo</th>
			<th>Categoria</th>
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		  
		</tbody>
		</table>
		
	</div>
	</div>
	
	<div class="modal fade" tabindex="-1" role="dialog"  id="modalProductos">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-header text-light bg-success">
		<h5 class="modal-title">Listado de productos</h5>
		<button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
		  <span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
			<th style="Display:none">Codigo Productos</th>
			<th style="Display:none">Codigo Productos</th> <!-- filas para que funcione el datatable -->
			<th>Codigo Productos</th>
			<th>Nombre Productos</th>
			<th>Minimo</th>	
			<th>Maximo</th>
			<th>Categoria</th>
		  </tr>
		</thead>
		<tbody id="consultaDelete">
		 
		</tbody>
		</table>
	</div>
	<div class="modal-footer bg-light">
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
	</div>
  </div>
</div>

<!-- seccion del modal categoria -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modalCategoria">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-header text-light bg-success">
		<h5 class="modal-title">LISTADO DE CATEGORIAS</h5>
		<button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
		  <span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
			<th>Codigo de categoria</th>
			<th>Descripción de la categoria</th>
			<th>Unidad de medida común</th>	
			<th>Unidad de Medida Alternativa</th>
		  </tr>
		</thead>
		<tbody id="listadoCategoria">
		 
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
<script type="text/javascript" src="js/producto.js"></script>

</body>
</html>