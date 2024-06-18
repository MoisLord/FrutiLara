<html> 
<?php require_once("comunes/encabezado.php"); ?>
<body>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>


<div class="container text-center h3 text-success">
<hr/>
<hr/>
<hr/>
PRODUCTOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row">
<form class="col-4 p-2">
	<h4 class="text-center text-success">Registro de Productos</h4>
<div class="mb-3">
			   <label for="codigo">Codigo del Producto</label>
			   <input class="form-control" type="text" id="codigo"
				name="codigo"/>
			   <span id="scodigo"></span>
			</div>

			<div class="mb-3">
			   <label for="nombre">Nombre del Producto</label>
			   <input class="form-control" type="text" id="nombre"
				name="nombre"/>
			   <span id="snombre"></span>
			</div>

			<div class="mb-3">
        <label for="minimo">Mínimo</label>
        <input class="form-control" type="text" id="minimo" name="minimo"/>
		<span id="sminimo"></span>
    </div>

	<div class="mb-3">
		<label for="maximo">Maximo</label>
		   <input class="form-control" type="text" id="maximo"
				name="maximo"/>
		   <span id="smaximo"></span>
	</div>
		
	<div class="mb-3">
	   <label for="id_marca">Marca</label>
		   <input class="form-control" type="text" id="id_marca" name="id_marca"/>
    	    <span id="sid_marca"></span>
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

	<div class="mb-3">
	  <button type="button" class="btn btn-success" id="incluir" >INCLUIR</button>
	</div>
</form>

<div class="col-8 p-4">
<div class="container">
	</div>
	<div class="container">
	   <div class="table-responsive">
		<table class="table table-striped table-hover" id="tablaproducto">
			<thead>
			  <tr>
				<th>Acciones</th>
				<th>Codigo Producto</th>
				<th>Nombre Producto</th>
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





<!--<div class="container text-center h2 text-success">
<hr/>
<hr/>
<hr/>
REGISTRO DE PRODUCTOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container">
   <form method="post" id="f" autocomplete="off">
	
	<div class="container">	
		<div class="row mb-3">
			<div class="col-md-4">
			   <label for="codigo">Codigo del Producto</label>
			   <input class="form-control" type="text" id="codigo"
				name="codigo"/>
			   <span id="scodigo"></span>
			</div>
			<div class="col-md-8">
			   <label for="nombre">Nombre del Producto</label>
			   <input class="form-control" type="text" id="nombre"
				name="nombre"/>
			   <span id="snombre"></span>
			</div>
		</div>

		<div class="row"> 
    <div class="col-md-5">
        <label for="tipo">Tipo de Producto</label>
        <select class="form-select" aria-label="Default select example" id="tipo"> 
            <option selected></option> 
            <option value="Viveres">Viveres</option> 
            <option value="Hortalizas">Hortalizas</option> 
            <option value="Frutas">Frutas</option> 
            <option value="Charcuteria">Charcuteria</option> 
            <option value="Bebidas">Bebidas</option> 
            <option value="Empaquetados">Empaquetados</option> 
        </select> 
    </div> 
    <div class="col-md-7">
        <label for="minimo">Mínimo</label>
        <input class="form-control" type="text" id="minimo" name="minimo"/>
		<span id="sminimo"></span>
    </div>
</div>

        
		<div class="row mb-4">
            
			<div class="col-md-6">
			   <label for="maximo">Maximo</label>
			   <input class="form-control" type="text" id="maximo"
					name="maximo"/>
			   <span id="smaximo"></span>
			</div>
			<div class="col-md-6">
			   <label for="porcentaje">Porcentaje</label>
			   <input class="form-control" type="text" id="porcentaje" name="porcentaje"/>
               <span id="sporcentaje"></span>
			</div>
		</div>
		
		<div class="row">
			<div class="col-md-12">
            <hr class="border border-success border-3 opacity-65">
			</div>
		</div>

		<div class="row mt-3 justify-content-center">
			<div class="col-md-2">
				   <button type="button" class="btn btn-success" id="incluir" >INCLUIR</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="consultar" >CONSULTAR</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="modificar" >MODIFICAR</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="eliminar" >ELIMINAR</button>
			</div>
			<div class="col-md-2">	
				   <a href="." class="btn btn-success">REGRESAR</a>
			</div>
		</div>
	</div>	
	</form>
</div> 



<div class="modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">PRODUCTOS REGISTRADOS</h5>
        <button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
	    
		<table class="table table-striped table-hover" id="tablaclientes">
		<thead>
		  <tr>
			<th>Codigo Producto</th>
			<th>Nombre Producto</th>
			<th>Tipo de Productos</th>
			<th>Minimo</th>
			<th>Maximo</th>
			<th>Porcentaje</th>
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
-->
<script type="text/javascript" src="js/producto.js"></script>

</body>
</html>