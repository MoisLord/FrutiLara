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
REGISTRO DE PRODUCTOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
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
        <label for="tipo-producto">Tipo de Producto</label>
        <select class="form-select" aria-label="Default select example" id="tipo-producto"> 
            <option selected></option> 
            <option value="tipo">Viveres</option> 
            <option value="tipo">Hortalizas</option> 
            <option value="tipo">Frutas</option> 
            <option value="tipo">Charcuteria</option> 
            <option value="tipo">Bebidas</option> 
            <option value="tipo">Empaquetados</option> 
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
</div> <!-- fin de container -->


<!-- seccion del modal -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">PRODUCTOS REGISTRADOS</h5>
        <button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
	    <!--se agrega un id para poder enlazar con el datatablet--> 
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
<!--fin de seccion modal-->
<script type="text/javascript" src="js/producto.js"></script>

</body>
</html>