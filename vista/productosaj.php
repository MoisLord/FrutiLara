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
        
		<div class="row mb-4">
			<div class="col-md">
        		<label for="minimo">Minimo</label>
       			<input class="form-control" type="text" id="minimo" name="minimo"/>
				<span id="sminimo"></span>
    		</div>

			<div class="col-md">
			   <label for="maximo">Maximo</label>
			   <input class="form-control" type="text" id="maximo" name="maximo"/>
			   <span id="smaximo"></span>
			</div>
		</div>

			<div class="row mb-4">
			<div class="col-md">
			   <label for="id_marca">Marca</label>
			   <input class="form-control" type="text" id="id_marca" name="id_marca"/>
			   <span id="sid_marca"></span>
			</div>
		</div>

		<div class="mb-3">
        <label for="id_categoria">Categoria</label>
        <select class="form-select" aria-label="Default select example" id="id_categoria"> 
            <option selected></option> 
            <option value="Viveres">Viveres</option> 
            <option value="Hortalizas">Hortalizas</option> 
            <option value="Frutas">Frutas</option> 
            <option value="Charcuteria">Charcuteria</option> 
            <option value="Bebidas">Bebidas</option> 
            <option value="Empaquetados">Empaquetados</option> 
        </select> 
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
	<h5 class="modal-title text-center text-success">PRODUCTOS REGISTRADOS</h5>
	<hr class="border border-success border-3 opacity-65">
	    <!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablaproducto">
		<thead>
		  <tr>
			<th>Codigo Productos</th>
			<th>Nombre Productos</th>
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

</div>

<script type="text/javascript" src="js/producto.js"></script>

</body>
</html>