<html> 
<title>MARCAS</title>
<?php require_once("comunes/encabezado.php"); ?>
<?php require_once("./modelo/session.php"); ?>
<body>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>

<!--Aqui coloque el Contenedor del Texto del Modulo Marca-->
<div class="container text-center h2 text-success">
<br/>
<br/>
<br/>
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
			   <input class="form-control" type="text" id="id_marca" name="id_marca"maxlength="20"/>
			   <span id="sid_marca">El Formato Debe Ser Alfanúmerico</span>
			</div>
			</div>
			<div class="row mb-3">
			<div class="col-md">
			   <label for="descripcion_marca">Descripción de la Marca</label>
			   <input class="form-control" type="text" id="descripcion_marca" name="descripcion_marca"maxlength="40"/>
			   <span id="smarca">Solo letras entre 3 y 40 caracteres</span>
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
			<div class="col-md-4">
				<button type="button" class="btn btn-success" id="incluir" >
					<img src="iconos/register.svg" alt="delete" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				</button>
			</div>
		</div>
	</div>	
	</form>
	<!--Fin de los botones del CRUD-->
	
	<div class="col-8 p-4">
	<div class="container">
	<h5 class="modal-title text-center text-success">MARCAS REGISTRADAS</h5>
	<hr class="border border-success border-3 opacity-65">
	<span>*Ayuda: Se debe seleccionar una fila para que envíe la información al formulario*</span>
	    <!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablamarca">
		<thead>
		  <tr>
			<th>Codigo de Marcas</th>
			<th>Marcas</th>
		  </tr>
		  <tr>
			<th colspan="2" class="text-center">
			  <div class="row justify-content-center">
				<div class="col-auto">
				  <button type="button" class="btn btn-success" src="iconos/delete.svg" alt="delete" id="modificar">
					<img src="iconos/edit.svg" alt="delete" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				  </button>
				</div>
				<div class="col-auto">
				  <button type="button" class="btn btn-success" id="eliminar">
					<img src="iconos/delete.svg" alt="delete" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				  </button>
				</div>
				<div class="col-auto">
				  <button type="button" class="btn btn-success" id="consultadeDelete">
					<img src="iconos/list.svg" alt="delete" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				  </button>
				</div>
				<div class="col-auto">
				  <button type="button" class="btn btn-success" id="restaurar">
					<img src="iconos/restore.svg" alt="delete" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
				  </button>
				</div>
			  </div>
			</th>
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		  
		</tbody>
		</table>
		
    </div>
</div> 
<!-- fin de container -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modalMarca">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">MARCAS ELIMINADAS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
			<th>Codigo de Marcas</th>
			<th>Marca</th>
		  </tr>
		</thead>
		<tbody id="consultaDelete">
		
		</tbody>
		</table>
    </div>
	<div class="modal-footer bg-light">
		<span>*Ayuda: Debe seleccionar una fila y presionar el boton "Cerrar" para salir*</span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
<?php require_once("comunes/body.php"); ?>
<script type="text/javascript" src="js/marca.js"></script>

</body>
</html>