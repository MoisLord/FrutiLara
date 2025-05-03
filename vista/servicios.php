<html> 
<title>SERVICIOS</title>
<?php require_once("comunes/encabezado.php"); ?>
<?php require_once("./modelo/session.php"); ?>
<body>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<?php require_once('comunes/menu.php'); ?>
<div class="container text-center h2 text-success">
<br/>
<br/>
<br/>
GESTIÓN DE SERVICIOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> <!-- todo el contenido ira dentro de esta etiqueta-->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">Registro de Servicios</h4>

	<div class="container">	
		<div class="row mb-3">
			<div class="col-md">
			   <label for="codigo_servicio">Codigo del servicio</label>
			   <input class="form-control" type="text" id="codigo_servicio" name="codigo_servicio"/>
			   <span id="scodigo_servicio">El formato incorrecto</span>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col-md">
			   <label for="descripcion_servicio">Descripcion</label>
			   <input class="form-control" type="text" id="descripcion_servicio"
				name="descripcion_servicio" maxlength="30"/>
			   <span id="sdescripcion_servicio">Solo letras  entre 3 y 30 caracteres</span>
			</div>
		</div>
		
	

		<div class="row mb-3">
			<div class="col-md">
			   <label for="estado_servicio">Estado</label>
			   <input class="form-control" type="text" id="estado_servicio" name="estado_servicio" 
			   />
			   <span id="sestado_servicio">Solo letras y/o numeros entre 6 y 35 caracteres</span>
			</div>
		</div>

		<div class="row">
			<div class="col-md-12">
            <hr class="border border-success border-3 opacity-65">
			</div>
		</div>

		<div class="row mt-3 justify-content-left">
			<div class="col-md-3">
				<button type="button" class="btn btn-success" id="incluir" >REGISTRAR</button>
			</div>
			<div class="col-md-3">	
		   		<button type="button" class="btn btn-success" id="modificar" >EDITAR</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="eliminar" >BORRAR</button>
			</div>
			</div>
			<div class="row mt-3 justify-content-left">
			<div class="col-md-2">	
				   <a href="?pagina=principal" class="btn btn-success">REGRESAR</a>
			</div>
			</div>
	</div>	
	</form>

	<div class="col-8 p-4">
	<div class="container">
	<h5 class="modal-title text-center text-success">SERVICIOS REGISTRADOS</h5>
	<hr class="border border-success border-3 opacity-65">
	<span>*Ayuda: Se debe seleccionar una fila para que envíe la información al formulario*</span>
	    <!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablaservicios">
		<thead>
		  <tr>
			<th>Codigo</th>
			<th>Descripcion</th>
			<th>Estado</th>	
			
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">
		  
		</tbody>
		</table>
		
    </div>
</div> <!-- fin de container -->
<?php require_once("comunes/body.php"); ?>
<script type="text/javascript" src="js/servicios.js"></script>

</body>
</html>