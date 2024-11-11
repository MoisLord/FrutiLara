<html>
<title>R ENTRADAS</title>
<?php require_once('comunes/encabezado.php'); ?>
<body>
<!--linea para enlazar con el modal-->
<?php require_once('comunes/menu.php'); ?>
<?php require_once("comunes/modal.php"); ?>
<div class="container text-center h2 text-success">
<hr/>
<hr/>
<hr/>
<hr/>
<hr/>
<hr/>
PANTALLA DE REPORTE DE ENTRADA
<hr class="border border-success border-3 opacity-65">

<div class="container">
<hr/>
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->

<form method="post" action="" id="f" target="_blank">
<div class="container">
    <div class="row">
		<div class="col">
		   <label for="Codigo">Codigo del producto</label>
		   <input class="form-control" type="text" id="cedula" name="Codigo" />
		   <span id="scedula"></span>
		</div>
		<div class="col">
		   <label for="Cantidad">Nombre del producto</label>
		   <input class="form-control" type="text" id="usuario" name="Cantidad" />
		   <span id="susuario"></span>
		</div>
		<div class="col">
		   <label for="Sumatoria">Categoria</label>
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
			   <button type="submit" class="btn btn-success" id="generar" name="generar">GENERAR REPORTE</button>
		</div>
		
	</div>
</div>
</form>
	
</div> <!-- fin de container -->



</body>
</html>