<html>
<?php require_once('comunes/cabecera.php'); ?>
<body>
<!--linea para enlazar con el modal-->
<?php require_once("comunes/modal.php"); ?>
<div class="container">
   <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button> 
        <img src="img/logo.jpeg" alt="" style="width:50px;">
		<label class="navbar-brand" >Reporte de Usuarios</label>
		<?php require_once('comunes/menu.php'); ?>
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
		   <label for="cedula">Cedula</label>
		   <input class="form-control" type="text" id="cedula" name="cedula" />
		   <span id="scedula"></span>
		</div>
		<div class="col">
		   <label for="usuario">Usuario</label>
		   <input class="form-control" type="text" id="usuario" name="usuario" />
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