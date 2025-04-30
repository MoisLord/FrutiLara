<html> 
<title>N SALIDAS</title>
<?php require_once("comunes/encabezado.php"); ?>
<?php require_once("./modelo/session.php"); ?>
<body>
<!--Div oculta para colocar el mensaje a mostrar-->

<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>
<br/>
<br/>
<br/>
<br/>
<br/>

<div class="container text-center h2 text-success">
NOTAS DE SALIDA DE PRODUCTOS
<hr class="border border-success border-3 opacity-65"/>
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
<form method="post" action="" id="f">
<input type="text" name="accion" id="accion" style="display:none"/>
<div class="container">
    <!-- FILA DE BOTONES -->
	<div class="row">
		<div class="col-md-8">
			   <button type="button" class="btn btn-success" id="registrar" name="registrar">REGISTRAR</button>
			   <button type="button" class="btn btn-success" id="listadodeclientes" name="listadodeclientes">LISTADO DE EMPLEADOS</button>
			   
			   <a href="?pagina=principal" class="btn btn-success">REGRESAR</a>
		</div>
	</div>
	<!-- FIN DE FILA BOTONES -->
	<div class="row">
		<div class="col">
			<hr class="border border-success border-3 opacity-65"/>
		</div>
	</div>
	<!-- FILA DE INPUT Y BUSCAR PROVEEDOR -->
	<h6>Cedula del empleado</h6>
	<div class="row">
		<div class="col-md-8 input-group">
		<input class="form-control" type="text" id="idcliente" name="idcliente"/>	 
		   <input class="form-control" type="text" id="cedulacliente" name="cedulacliente" style="display:none" />
		     
		   
		</div>
	</div>
	<!-- FIN DE FILA INPUT Y BUSCAR PROVEEDOR -->
	
	<!-- FILA DE DATOS DEL PROVEEDOR -->
	<div class="row">
		<div class="col-md-12" id="datosdelcliente">
		   
		</div>
	</div>
	<!-- FIN DE FILA DATOS DEL PROVEEDOR -->
		
	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>

    <!-- FILA DE BUSQUEDA DE PRODUCTOS -->
	
	<!-- FIN DE FILA BUSQUEDA DE PRODUCTOS -->
	<div class="row">
		<div class="col">
			<hr class="border border-success border-3 opacity-65"/>
		</div>
	</div>
	<!-- FILA DE DETALLES DE SALIDA -->
	<div class="row">
		<div class="col-md-12">
		   <table class="table table-striped table-hover">
				<thead>
				  <tr>
				  <th>X</th>
				  <th>Cedula</th>
					<th>Nombre</th>
					<th>Pago Realizado</th>
					<th>Fecha del pago</th>
					<th>Estado del pago</th>
					
				  </tr>
				</thead>
				<tbody id="salida">

				</tbody>
			</table>
		</div>
	</div>
	<!-- FIN DE FILA DETALLES DE SALIDA -->
</div>
</form>
</div> <!-- fin de container -->


<!-- seccion del modal clientes -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modalclientes">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">Listado de cliente</h5>
        <button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
		   
		  	<th>Cédula</th>
			<th>Nombre y Apellido</th>
			<th>Télefono</th>
			<th>Dirección</th>
		  </tr>
		</thead>
		<tbody id="listadoclientes">
		  
		</tbody>
		</table>
    </div>
	<div class="modal-footer bg-light">
	<span>*Ayuda: Debe seleccionar una fila y presionar el boton "Cerrar" para salir*</span>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
<!--fin de seccion modal-->

<!-- seccion del modal productos -->

<!-- Modal -->
<div class="modal fade" id="cantidadModal" tabindex="-1" role="dialog" aria-labelledby="cantidadModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-light bg-success">
        <h5 class="modal-title" id="cantidadModalLabel">Aviso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        La cantidad no puede ser menor que cero!!.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"id="cerrarModal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!--fin de seccion modal-->
<?php require_once("comunes/body.php"); ?>
<script type="text/javascript" src="js/salida.js"></script>

</body>
</html>