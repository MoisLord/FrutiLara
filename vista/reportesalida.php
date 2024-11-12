<html>
<title>R SALIDAS</title>
<?php require_once('comunes/encabezado.php'); ?>
<body>
<!--linea para enlazar con el modal-->
<?php require_once('comunes/menu.php'); ?>
<?php require_once("comunes/modal.php"); ?>
<div class="container text-center h2 text-success">
<br/>
<br/>
<br/>
PANTALLA DE REPORTE DE SALIDA
<hr class="border border-success border-3 opacity-65">

<div class="container">
<hr/>
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->

<form method="post" action="" id="f" target="_blank">
<div class="container">
    <div class="row">
        <!-- Primera columna -->
        <div class="col-md-6 mb-3">
            <label for="Codigo">CODIGO DEL PRODUCTO</label>
            <input class="form-control" type="text" id="cedula" name="Codigo" />
            <span id="scedula"></span>
        </div>
        <div class="col-md-6 mb-3">
            <label for="Cantidad">NOMBRE DEL PRODUCTO</label>
            <input class="form-control" type="text" id="usuario" name="nombre" />
            <span id="susuario"></span>
        </div>
    </div>
    <div class="row">
        <!-- Segunda columna -->
        <div class="col-md-6 mb-3">
            <label for="Sumatoria">CATEGORIA DEL PRODUCTO</label>
            <input class="form-control" type="text" id="usuario" name="Categoria" />
            <span id="susuario"></span>
        </div>
        <div class="col-md-6 mb-3">
            <label for="Cantidad">MODELO DEL PRODUCTO</label>
            <input class="form-control" type="text" id="usuario" name="modelo" />
            <span id="susuario"></span>
        </div>
    </div>
    <div class="row" style="display:none">
        <!-- Elementos ocultos -->
        <div class="col-md-6 mb-3">
            <label for="Cantidad">CANTIDAD DEL PRODUCTO</label>
            <input class="form-control" type="text" id="usuario" name="Cantidad" />
            <span id="susuario"></span>
        </div>
        <div class="col-md-6 mb-3">
            <label for="Sumatoria">DIFERENCIA DEL PRODUCTO</label>
            <input class="form-control" type="text" id="usuario" name="diferencia" />
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



</body>
</html>