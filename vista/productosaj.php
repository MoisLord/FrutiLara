<html>
<?php require_once("comunes/encabezado.php"); ?>
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
<hr/>
<hr/>
<hr/>
<hr/>
<hr/>
<hr/>
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
			   <input class="form-control" type="text" id="codigo" name="codigo"/>
			   <span id="scodigo"></span>
			</div>
			</div>
			<div class="row mb-3">
			<div class="col-md">
			   <label for="nombre">Nombre del Producto</label>
			   <input class="form-control" type="text" id="nombre" name="nombre"/>
			   <span id="snombre"></span>
			</div>
		</div>    
		<div class="row mb-3">
		<div class="row mb-4">
			<div class="col-md">
        		<label for="">Existencia Total</label>
       			<input class="form-control" type="text" id="cantidad_total" name="cantidad_total"/>
				<span id="cantidad_total"></span>
    		</div>
		</div>    

		<div class="row mb-4">
			<div class="col-md">
        		<label for="minimo">Minima Existencia</label>
       			<input class="form-control" type="text" id="minimo" name="minimo"/>
				<span id="sminimo"></span>
    		</div>

			<div class="col-md">
			   <label for="maximo">Maxima Existencia</label>
			   <input class="form-control" type="text" id="maximo" name="maximo"/>
			   <span id="smaximo"></span>
			</div>
		</div>
		
		<div class="row mb-4">
		<div class="input-group mb-3">
		<button type="button" class="btn btn-success" id="listadodeMarca" name="listadodeMarca">LISTADO DE MARCA</button>
		<input class="form-control" type="text" id="idMarca" name="idMarca"/>
		</div>
		</div>

	<div class="row">
		<div class="col-md-12" id="datosmarca">   
		</div>
	</div>
		
		<div class="row mb-4">
		<div class="input-group mb-3">
		  <button type="button" class="btn btn-success" id="listadodeCategoria" name="listadodeCategoria">LISTADO DE CATEGORIAS</button>
		  <input class="form-control" type="text" id="idCategoria" name="idCategoria" />
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
	<h5 class="modal-title text-center text-success">PRODUCTOS REGISTRADOS</h5>
	<hr class="border border-success border-3 opacity-65">
	    <!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablaproducto">
		<thead>
		  <tr>
			<th>Codigo Productos</th>
			<th>Nombre Productos</th>
			<th>Existencia total</th>
			<th>Minimo</th>	
			<th>Maximo</th>
			<th>Marca</th>
			<th>Categoria</th>
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		  
		  
		</tbody>
		</table>
		
    </div>
	</div>
	<!-- seccion del modal marca -->
	<div class="modal fade" tabindex="-1" role="dialog"  id="modalMarca">
  	<div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">LISTADO DE MARCA</h5>
        <button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
			<th>Codigo de Marcas</th>
			<th>Marca</th>
		  </tr>
		</thead>
		<tbody id="listadoMarca">
		 
		</tbody>
		</table>
    </div>
	<div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
<!--fin de seccion modal-->

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
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>



<script type="text/javascript" src="js/producto.js"></script>

</body>
</html>