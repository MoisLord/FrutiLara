<html>
<title>R ENTRADAS</title>
<?php require_once('comunes/encabezado.php'); ?>
<?php require_once("./modelo/session.php"); ?>
<body>
<!--linea para enlazar con el modal-->
<?php require_once('comunes/menu.php'); ?>
<?php require_once("comunes/modal.php"); ?>
<div class="container text-center h2 text-success">
<br/>
<br/>
<br/>
PANTALLA DE REPORTE GENERAL
<hr class="border border-success border-3 opacity-65">

<div class="container">
<hr/>
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->

<form method="post" action="" id="f" target="_blank">
<div class="container"> 
	<div class="row"> 
		<!-- Primera columna --> 
		 <div class="col-md-6"> 
			<div class="mb-3"> 
				<label for="Codigo">CODIGO DEL PRODUCTO</label> 
				<input class="form-control" type="text" id="cedula" name="Codigo" /> 
				<span id="scedula"></span> 
			</div> 
			<div class="mb-3"> 
						<label for="Sumatoria">CATEGORIA DEL PRODUCTO</label> 
						<input class="form-control" type="text" id="usuario" name="categoria" /> 
						<span id="susuario"></span>
					 </div>
		</div> 
				<!-- Segunda columna -->
				  <div class="col-md-6"> 
				  <div class="mb-3"> 
				<label for="Cantidad">NOMBRE DEL PRODUCTO</label> 
				<input class="form-control" type="text" id="usuario" name="nombre" /> 
				<span id="susuario"></span> 
			</div> 
					
					  <div class="mb-3"> 
						<label for="Sumatoria">MODELO DEL PRODUCTO</label>
						 <input class="form-control" type="text" id="usuario" name="modelo" />
						  <span id="susuario"></span> </div> </div> 
						  <!-- Oculto, si es necesario --> 
						   <div class="col-12" style="display:none">
							 <div class="mb-3">
								 <label for="Sumatoria">CANTIDAD DEL PRODUCTO</label> 
								 <input class="form-control" type="text" id="usuario" name="cantidad" /> 
								 <span id="susuario"></span>
								 <label for="Sumatoria">minimo</label> 
								 <input class="form-control" type="text" id="usuario" name="minimo" /> 
								 <span id="susuario"></span>
								 <label for="Sumatoria">maximo</label> 
								 <input class="form-control" type="text" id="usuario" name="maximo" /> 
								 <span id="susuario"></span>
								 </div>
								 </div>
								 </div>

	
	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>

	<div class="row">
		<div class="col">
			   <button type="submit" class="btn btn-success" id="generar" name="generar">GENERAR REPORTE</button>
		</div>
		
	</div>
</div>
</form>
	
</div> <!-- fin de container -->

<?php require_once("comunes/body.php"); ?>

</body>
</html>