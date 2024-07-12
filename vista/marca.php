<html> 
<?php require_once("comunes/encabezado.php"); ?>
<body>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>

<!--Aqui coloque el Contenedor del Texto del Modulo Marca-->
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
<div class="container-fluid row"> <!--Aqui contendra el registro con sus inputs-->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">Registro de Marcas</h4>
	
	<div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			   <label for="id_marca">Codigo de la marca</label>
			   <input class="form-control" type="text" id="id_marca" name="id_marca"/>
			   <span id="sid_marca"></span>
			</div>
			</div>
			<div class="row mb-3">
			<div class="col-md">
			   <label for="descripcion_marca">Descripción de la Marca</label>
			   <input class="form-control" type="text" id="descripcion_marca" name="descripcion_marca"/>
			   <span id="smarca"></span>
			</div>
		</div>
		<!--Fin de los Inputs-->
		
		<!--Aqui me encargue de hacer una linea divisora-->
		<div class="row">
			<div class="col-md-12">
            <hr class="border border-success border-3 opacity-65">
			</div>
		</div>
		<!--Fin de la linea divisora-->
		
		<!--Aqui Contiene los botones del CRUD-->
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
	<!--Fin de los botones del CRUD-->




	<div class="col-8 p-4">
	<div class="container">
	<h5 class="modal-title text-center text-success">MARCAS REGISTRADAS</h5>
	<hr class="border border-success border-3 opacity-65">
	    <!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablamarca">
		<thead>
		  <tr>
			<th>Codigo de Marcas</th>
			<th>Marcas</th>
		  </tr>
		</thead>
		<tbody>
		<?php
			if(!empty($consulta)){
				echo $consulta;
			}
		  ?>

		</tbody>
		</table>
		
    </div>
</div>

</div>

<script type="text/javascript" src="js/marca.js"></script>

</body>
</html>