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
<?php require_once("comunes/menu.php"); ?>
<div class="container text-center h2 text-primary">
Salida de Productos
<hr/>
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
<form method="post" action="" id="f">
<input type="text" name="accion" id="accion" style="display:none"/>
<div class="container
    <!-- FILA DE BOTONES -->
	<div class="row">
		<div class="col-md-8">
			   <button type="button" class="btn btn-success" id="registrar" name="registrar">REGISTRAR</button>
			   <button type="button" class="btn btn-success" id="listadodeareas" name="listadodeareas">LISTADO DE CLIENTES</button>
			   <button type="button" class="btn btn-success" id="listadodeequipo" name="listadodeequipo">LISTADO DE PRODUCTOS</button>
		</div>
	</div>
    <!-- FIN DE FILA BOTONES -->
	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>
    <!-- FILA DE INPUT Y BUSCAR Productos -->
	<h6>Cedula del Cliente</h6>
	<div class="row">
		<div class="col-md-8 input-group">
		   <input class="form-control" type="text" id="cedula_cliente" name="cedula_cliente"/>
		   <input class="form-control" type="text" id="codigo_producto" name="codigo_producto" style="display:none"/>
		</div>
	</div>
	<!-- FIN DE FILA INPUT Y BUSCAR Productos -->
	
	<!-- FILA DE DATOS DEL AREA -->
	<div class="row">
		<div class="col-md-12" id="datosdelarea">
		   
		</div>
	</div>
	<!-- FIN DE FILA DATOS DEL AREA -->
		
	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>

    <!-- FILA DE INPUT Y BUSQUEDA DE EQUIPO -->
	<h6>Codigo del Producto</h6>
	<div class="row">
		<div class="col-md-8 input-group">
		   <input class="form-control" type="text" id="codigo_producto" name="codigo_producto" />
		   <input class="form-control" type="text" id="cifra" name="cifra" style="display:none"/>
		   <input class="form-control" type="text" id="fecha" name="fecha" style="display:none"/>
		</div>
	</div>
	<!-- FIN DE FILA DE INPUT Y BUSQUEDA DE EQUIPO -->
	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>

	<!-- FILA DE REGISTRAR -->
	<div class="row">
		<div class="col-md-12">
		   <table class="table table-striped table-hover">
				<thead>
				  <tr>
					<th style="display:none">Id</th>
					<th>Cedula de los Clientes</th>
					<th>Codigo de los Productos</th>
					<th>Cifra</th>
					<th>Fecha</th>
				  </tr>
				</thead>
				<tbody id="detallederegistrar">

				</tbody>
			</table>
		</div>
	</div>
	<!-- FIN DE FILA DE REGISTRAR -->
</div>
</form>
</div> <!-- fin de container -->
</input>


<!-- seccion del modal areas -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modalareas">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">Listado de Clientes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
		    <th style="display:none">Id</th>
			<th>Cedula del cliente</th>
			<th>Codigo del Producto</th>
		  </tr>
		</thead>
		<tbody id="listadodeareas">
		  <?php
			if(!empty($consultaareas)){
				echo $consultaareas;
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

<!-- seccion del modal equipo -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modalequipo">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">Listado de Productos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
		    <th style="display:none">Id</th>
			<th>Cedula del Cliente</th>
			<th>Codigo del Producto</th>
			<th>cifra</th>
			<th>Fecha</th>
		  </tr>
		</thead>
		<tbody id="listadodeequipo">
		  <?php
			if(!empty($consultaequipo)){
				echo $consultaequipo;
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

<script type="text/javascript" src="js/salida_producto.js"></script>

</body>
</html>