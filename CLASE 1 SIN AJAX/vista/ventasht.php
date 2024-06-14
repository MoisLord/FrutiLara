<html> 
<?php require_once("comunes/encabezado.php"); ?>
<body>
<!--Div oculta para colocar el mensaje a mostrar-->
<div id="mensajes" style="display:none">
<?php
	if(!empty($mensaje)){
		echo $mensaje;
	}
?>	
</div>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>
<div class="container text-center h2 text-primary">
Pantalla Ventas
<hr/>
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
<form method="post" action="" id="f">
<input type="text" name="accion" id="accion" style="display:none"/>
<div class="container">
    <!-- FILA DE BOTONES -->
	<div class="row">
		<div class="col-md-4">
			   <button type="button" class="btn btn-primary" id="facturar" name="facturar">FACTURAR</button>
		</div>
	</div>
	<!-- FIN DE FILA BOTONES -->
	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>
	<!-- FILA DE INPUT Y BUSCAR CLIENTE -->
	<div class="row">
		<div class="col-md-8 input-group">
		   <input class="form-control" type="text" id="cedulacliente" name="cedulacliente" />
		   <input class="form-control" type="text" id="idcliente" name="idcliente" style="display:none"/>
		   <button type="button" class="btn btn-primary" id="listadodeclientes" name="listadodeclientes">LISTADO DE CLIENTES</button>
		</div>
	</div>
	<!-- FIN DE FILA INPUT Y BUSCAR CLIENTE -->
	
	<!-- FILA DE DATOS DEL CLIENTE -->
	<div class="row">
		<div class="col-md-12" id="datosdelcliente">
		   
		</div>
	</div>
	<!-- FIN DE FILA DATOS DEL CLIENTE -->
		
	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>

    <!-- FILA DE BUSQUEDA DE PRODUCTOS -->
	<div class="row">
		<div class="col-md-8 input-group">
		   <input class="form-control" type="text" id="codigoproducto" name="codigoproducto" />
		   <input class="form-control" type="text" id="idproducto" name="idproducto" style="display:none"/>
		   <button type="button" class="btn btn-primary" id="listadodeproductos" name="listadodeproductos">LISTADO DE PRODUCTOS</button>
		</div>
	</div>
	<!-- FIN DE FILA BUSQUEDA DE PRODUCTOS -->
	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>
	<!-- FILA DE DETALLES DE LA VENTA -->
	<div class="row">
		<div class="col-md-12">
		   <table class="table table-striped table-hover">
				<thead>
				  <tr>
				    <th>X</th>
					<th style="display:none">Id</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>CANT</th>
					<th>PVP</th>
					<th>SUB TOT</th>
				  </tr>
				</thead>
				<tbody id="detalledeventa">

				</tbody>
			</table>
		</div>
	</div>
	<!-- FIN DE FILA DETALLES DE LA VENTA -->
</div>
</form>
</div> <!-- fin de container -->


<!-- seccion del modal clientes -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modalclientes">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-info">
        <h5 class="modal-title">Listado de clientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
		    <th style="display:none">Id</th>
			<th>Cedula</th>
			<th>Nombre</th>
			<th>Telefono</th>
			<th>Direccion</th>
		  </tr>
		</thead>
		<tbody id="listadodeclientes">
		  <?php
			if(!empty($consultaclientes)){
				echo $consultaclientes;
			}
		  ?>
		</tbody>
		</table>
    </div>
	<div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
<!--fin de seccion modal-->

<!-- seccion del modal productos -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modalproductos">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-info">
        <h5 class="modal-title">Listado de productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
		    <th style="display:none">Id</th>
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Existencia</th>
			<th>PVP</th>
		  </tr>
		</thead>
		<tbody id="listadodeproductos">
		  <?php
			if(!empty($consultaproductos)){
				echo $consultaproductos;
			}
		  ?>
		</tbody>
		</table>
    </div>
	<div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
<!--fin de seccion modal-->

<script type="text/javascript" src="js/ventasht.js"></script>

</body>
</html>