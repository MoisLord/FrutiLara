<html> 
<title>GESTIÓN DE PAGOS</title>
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
GESTIÓN DE PAGOS
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
			   <button type="button" class="btn btn-success" id="listado_pagos" name="listado_pagos">HISTORIAL DE PAGOS</button>
			   <a href="." class="btn btn-success">REGRESAR</a>
		</div>
	</div>
	<!-- FIN DE FILA BOTONES -->
	<div class="row">
		<div class="col">
			<hr class="border border-success border-3 opacity-65"/>
		</div>
	</div>
	
	<!-- FILA DE TIPO DE PAGO -->
	<div class="row mb-3">
		<div class="col-md-4">
			<label class="form-label">Tipo de Pago</label>
			<select class="form-select" id="tipo_pago" name="tipo_pago">
				<option value="EMPLEADO">Pago a Empleado</option>
				<option value="SERVICIO">Pago de Servicio</option>
			</select>
		</div>
	</div>
	
	<!-- FILA DE REFERENCIA -->
	<h6>Referencia (Cédula o Código)</h6>
	<div class="row">
		<div class="col-md-8 input-group">
			<input class="form-control" type="text" id="referencia_id" name="referencia_id"/>	 
			<button type="button" class="btn btn-success" id="buscar_referencia">BUSCAR</button>
		</div>
	</div>
	
	<!-- FILA DE DATOS DE LA REFERENCIA -->
	<div class="row">
		<div class="col-md-12" id="datos_referencia">
		   
		</div>
	</div>
	
	<!-- FILA DE DATOS DEL PAGO -->
	<div class="row mt-3">
		<div class="col-md-4">
			<label class="form-label">Monto/Costo</label>
			<input class="form-control" type="number" step="0.01" id="monto_costo" name="monto_costo"/>
		</div>
		<div class="col-md-4">
			<label class="form-label">Fecha de Pago</label>
			<input class="form-control" type="date" id="fecha_pago" name="fecha_pago"/>
		</div>
		<div class="col-md-4">
			<label class="form-label">Método de Pago</label>
			<select class="form-select" id="metodo_pago" name="metodo_pago">
				<option value="EFECTIVO">Efectivo</option>
				<option value="TRANSFERENCIA">Transferencia</option>
				<option value="CHEQUE">Cheque</option>
				<option value="TARJETA">Tarjeta</option>
			</select>
		</div>
	</div>
	
	<!-- FILA DE OBSERVACIONES -->
	<div class="row mt-3">
		<div class="col-md-12">
			<label class="form-label">Observaciones</label>
			<textarea class="form-control" id="observaciones" name="observaciones" rows="2"></textarea>
		</div>
	</div>
	
	<div class="row">
		<div class="col">
			<hr class="border border-success border-3 opacity-65"/>
		</div>
	</div>
	
	<!-- FILA DE TABLA DE PAGOS -->
	<div class="row">
		<div class="col-md-12">
		   <table class="table table-striped table-hover">
				<thead>
				  <tr>
					<th>Tipo</th>
					<th>Referencia</th>
					<th>Descripción</th>
					<th>Monto</th>
					<th>Fecha</th>
					<th>Método</th>
					<th>Estado</th>
				  </tr>
				</thead>
				<tbody id="tabla_pagos">
				</tbody>
			</table>
		</div>
	</div>
</div>
</form>
</div> <!-- fin de container -->

<!-- Modal para listado de referencias -->
<div class="modal fade" tabindex="-1" role="dialog" id="modal_referencias">
  <div class="modal-dialog modal-lg" role="document">
	<div class="modal-header text-light bg-success">
		<h5 class="modal-title">Listado de Referencias</h5>
		<button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
		  <span aria-hidden="true">&times;</span>
		</button>
	</div>
	<div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
			<th>Código/Cédula</th>
			<th>Descripción/Nombre</th>
		  </tr>
		</thead>
		<tbody id="listado_referencias">
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
<script type="text/javascript" src="js/gestion_pagos.js"></script>

</body>
</html>