<html> 
<?php require_once("comunes/encabezado.php"); ?>
<body>
<!--Llamar al archivo modal.php, y menu.php-->
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
<div class="container-fluid row"> <!-- comienzo del contenedor de campos -->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">Registro de Categorias de Productos</h4>
	
	<div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			   <label for="codigo_categoria">Codigo de categoria</label>
			   <input class="form-control" type="text" id="codigo_categoria" name="codigo_categoria"/>
			   <span id="scodigo_categoria"></span>
			</div>
			</div>
			<div class="row mb-3">
			<div class="col-md">
			   <label for="descripcion_categoria">Descripción de la categoria</label>
			   <input class="form-control" type="text" id="descripcion_categoria" name="descripcion_categoria"/>
			   <span id="sdescripcion_categoria"></span>
			</div>
		</div>
		<div class="row mb-4">    
        <div class="col-md-12">
					   <label for="unidadMedNormal">Unidad de medida común</label>
					   <select class="form-control" id="unidadMedNormal">
					   		<option selected>Seleccione una unidad de medida</option>
							<option value="KILOGRAMOS">Kilogramos</option>
							<option value="MILIGRAMOS">Miligramos</option>
							<option value="LITROS">Litros</option>
							<option value="MILITROS">Militros</option>
							<option value="UNIDADES">Unidades</option>
					   </select>
					</div>
					</div>
					<div class="row mb-4">
					<div class="col-md-12">
					   <label for="unidadMedAlt">Unidad de Medida Alternativa</label>
					   <select class="form-control" id="unidadMedAlt">
					   		<option selected>Seleccione una unidad de medida</option>
					   		<option value="N/A">No aplica</option>
							<option value="CAJAS">Cajas</option>
							<option value="CESTAS">Cestas</option>
							<option value="SACOS">Sacos</option>
					   </select>
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
			</div><!-- fin de la sección de contenedor de los botones -->
	</div> <!-- fin de la sección de contenedor  -->
	</form>




	<div class="col-8 p-4">
	<div class="container">
	<h5 class="modal-title text-center text-success">CATEGORIAS REGISTRADAS</h5>
	<hr class="border border-success border-3 opacity-65">
	    <!--se coloca un id para enlazar con el datatablet y la configuración de esta en el archivo categoria.js--> 
		<table class="table table-striped table-hover" id="tablacategoria">
		<thead>
		  <tr>
			<th>Codigo de categoria</th>
			<th>Descripción de la categoria</th>
			<th>Unidad de medida común</th>	
			<th>Unidad de Medida Alternativa</th>
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

</div> <!-- fin de container -->
<script type="text/javascript" src="js/categoria.js"></script>

</body>
</html>