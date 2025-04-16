<html> 
<title>PROVEEDOR</title>
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
PANTALLA DE PROVEEDORES
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row"> <!-- todo el contenido ira dentro de esta etiqueta-->
   <form class="col-4 p-2" method="post" id="f" autocomplete="off">
   <h4 class="text-center text-success">REGISTRO DE PROVEEDORES</h4>
	<div class="container">	
		
		<div class="row mb-3">
		<div class="col-md">
			<larel>tipos de documento</larel>
			<select class="form-select" name="documento" id="documento" aria-label="Default select example">
  				<option selected>Seleccione el tipo de documento</option>
  				<option value="Venezolano">Venezolano</option>
  				<option value="jurídico">jurídico</option>
  				<option value="Gobernamental">Gobernamental</option>
				
			</select>
			</div>
			<div class="col-md">
			   <label for="rif">Rif</label>
			   <input class="form-control" type="text" id="rif" name="rif" />
			   <span id="srif">El formato debe ser 092348760 o 00003454</span>
			</div>
			</div>
			<div class="row mb-3">
			<div class="col-md">
			   <label for="nombre_proveedor">Nombre del proveedor</label>
			   <input class="form-control" type="text" id="Nombre" name="Nombre" />
			   <span id="sNombre">Solo letras y/o numeros entre 3 y 30 caracteres</span>
			</div>
		</div>    
	
		<div class="row mb-4">
			<div class="col-md">
        		<label for="telefono">Telefono</label>
				<input class="form-control" type="text" id="Telefono" name="Telefono" />
				<span id="sTelefono">El formato debe ser 041215478964</span>
    		</div>
		</div>
		<div class="row mb-4">
			<div class="col-md">
			   <label for="Direccion">Dirección</label>
			   <input class="form-control" type="text" id="direccion" name="direccion" />
			   <span id="sdireccion">Solo letras y numeros entre 3 y 30 caracteres</span>
			</div>
			
		</div>
		
		<div class="row">
			<div class="col-md-12">
            <hr class="border border-success border-3 opacity-65">
			</div>
		</div>

		<div class="row mt-3 justify-content-left">
		<div class="col-md-4">
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
			<div class="col-md-3">	
				   <a href="?pagina=principal" class="btn btn-success">REGRESAR</a>
			</div>
			<div class="col-md-4">	
				   <button type="button" class="btn btn-success" id="consultadeDelete" >CONSULTAS ELIMINADAS</button>
			</div>
			<div class="col-md-2">	
				   <button type="button" class="btn btn-success" id="restaurar">RESTAURAR</button>
			</div>
			</div>
	</div>		
	</form>




	<div class="col-8 p-4">
	<div class="container">
	<h5 class="modal-title text-center text-success">PROVEEDORES REGISTRADOS</h5>
	<hr class="border border-success border-3 opacity-65">
	<span>*Ayuda: Se debe seleccionar una fila para que envíe la información al formulario*</span>
	    <!--se agrega un id para poder enlazar con el datatablet--> 
		<table class="table table-striped table-hover" id="tablaproveedores">
		<thead>
		  <tr>
		 	<th>Documento Legal</th>
			<th>Rif</th>
			<th>Nombre del proveedor</th>
			<th>Telefonon</th>	
			<th>Direccion</th>
		  </tr>
		</thead>
		<tbody id="resultadoconsulta">

		  
		</tbody>
		</table>

    </div>
</div>

</div> <!-- fin de container -->

<div class="modal fade" tabindex="-1" role="dialog"  id="modalProveedor">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">Listado de proveedores</h5>
        <button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
		   
		  	<th>Documento Legal</th>
			<th>Rif</th>
			<th>Nombre del proveedor</th>
			<th>Telefonon</th>	
			<th>Direccion</th>
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
<script type="text/javascript" src="js/proveedor.js"></script>

</body>
</html>
