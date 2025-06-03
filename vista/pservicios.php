<html>
<title>PAGO SERVICIOS</title>
<?php require_once("comunes/encabezado.php"); ?>
<?php require_once("./modelo/session.php"); ?>

<body>
	<!--Div oculta para colocar el mensaje a mostrar-->

	<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
	<?php require_once("comunes/modal.php"); ?>
	<?php require_once('comunes/menu.php'); ?>
	<br />
	<br />
	<br />
	<br />
	<br />

	<div class="container text-center h2 text-success">
		PAGO SERVICIOS
		<hr class="border border-success border-3 opacity-65" />
	</div>
	<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
		<form method="post" action="" id="f">
			<input type="text" name="accion" id="accion" style="display:none" />
			<div class="container">
				<!-- FILA DE BOTONES -->
				<div class="row">
					<div class="col-md-8">
						<button type="button" class="btn btn-success" id="registrar" name="registrar">REGISTRAR</button>
						<input type="button" class="btn btn-success" id="listadodeservicios" name="listadoservicios" value="LISTADO DE SERVICIOS"/>

						<a href="." class="btn btn-success">REGRESAR</a>
					</div>
				</div>
				<!-- FIN DE FILA BOTONES -->
				<div class="row">
					<div class="col">
						<hr class="border border-success border-3 opacity-65" />
					</div>
				</div>
				<!-- FILA DE INPUT Y BUSCAR SERVICIO -->
				<h6>Servicio</h6>
				<div class="row">
					<div class="col-md-8 input-group">
						<input class="form-control" type="text" id="idservicios" name="idservicios" />
						<input class="form-control" type="text" id="codigoservicios" name="codigoservicios" style="display:none" />


					</div>
				</div>
				<!-- FIN DE FILA INPUT Y BUSCAR SERVICIO -->

				<h6>Costo</h6>
				<div class="row">
					<div class="col-md-8 input-group">
						<input class="form-control" type="text" id="costo" name="costo" />
						<input class="form-control" type="text" id="scosto" name="scosto" style="display:none" />


					</div>
				</div>

				<div class="mb-3">
					<label for="pago">
						<h6>Metodo de Pago</h6>
					</label>
					<select class="form-select" aria-label="Default select example" id="spago">
						<option value="PAGOMOVIL">Pagomóvil</option>
						<option value="EFECTIVO">Efectivo</option>
					</select>
				</div>

				<h6>Fecha de Pago Servicio</h6>
				<div class="row">
					<div class="col-md-8 input-group">
						<input class="form-control" type="date" id="fservicio" name="fservicio" />
					</div>
				</div>

				<!-- FILA DE DATOS DEL SERVICIO -->
				<div class="row">
					<div class="col-md-12" id="datosdelservicio">

					</div>
				</div>
				<!-- FIN DE FILA DATOS DEL SERVICIO -->

				<div class="row">
					<div class="col">
						<hr />
					</div>
				</div>


				<!-- FILA DE DETALLES DE SALIDA -->
				<div class="row">
					<div class="col-md-12">
						<table class="table table-striped table-hover">
							<thead>
								<tr>
									<th>X</th>
									<th>Servicio</th>
									<th>Costo</th>
									<th>Metodo de Pago</th>
									<th>Fecha del pago</th>
								</tr>
							</thead>
							<tbody id="pservicios">

							</tbody>
						</table>
					</div>
				</div>
				<!-- FIN DE FILA DETALLES DE SALIDA -->
			</div>
		</form>
	</div> <!-- fin de container -->


	<!-- seccion del modal servicios -->
	<div class="modal fade" tabindex="-1" role="dialog" id="modalservicios">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-header text-light bg-success">
				<h5 class="modal-title">Listado de Servicios</h5>
				<button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-content">
				<table class="table table-striped table-hover">
					<thead>
						<tr>

							<th>Código Servicios</th>
							<th>Descripción Servicios</th>
						</tr>
					</thead>
					<tbody id="listadoservicios">

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
					<button type="button" class="btn btn-secondary" data-dismiss="modal" id="cerrarModal">Cerrar</button>
				</div>
			</div>
		</div>
	</div>

	<!--fin de seccion modal-->
	<?php require_once("comunes/body.php"); ?>
	<script type="text/javascript" src="js/pservicios.js"></script>

</body>

</html>