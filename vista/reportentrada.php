<html>
<?php require_once('comunes/encabezado.php'); ?>
<body>
<!--linea para enlazar con el modal-->
<?php require_once('comunes/menu.php'); ?>
<?php require_once("comunes/modal.php"); ?>
<div class="container">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button> 
		<label class="navbar-brand" >Reporte de Usuarios</label>
		
  </nav>
</div>  

<div class="container">
<hr/>
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->

<form method="post" action="" id="f" target="_blank">
<div class="container">
    <div class="row">
		<div class="col">
		   <label for="Codigo">Codigo de producto</label>
		   <input class="form-control" type="text" id="cedula" name="Codigo" />
		   <span id="scedula"></span>
		</div>
		<div class="col">
		   <label for="Cantidad">Cantidad de producto</label>
		   <input class="form-control" type="text" id="usuario" name="Cantidad" />
		   <span id="susuario"></span>
		</div>
		<div class="col">
		   <label for="Sumatoria">Sumatoria</label>
		   <input class="form-control" type="text" id="usuario" name="Sumatoria" />
		   <span id="susuario"></span>
		</div>
	</div>

    
	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>

	<div class="row">
		<div class="col">
			   <button type="submit" class="btn btn-primary" id="generar" name="generar">GENERAR PDF</button>
		</div>
		
	</div>
</div>
</form>
	
</div> <!-- fin de container -->



</body>
</html>