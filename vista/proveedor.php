<html> 
<?php require_once("comunes/encabezado.php"); ?>
<body>
<div class="container-fluid p-0">
  <div class="row no-gutters min-vh-100">
    <div class="col-12 d-flex flex-column justify-content-center align-items-center" style="background-image: url('img/fondo.jpg'); background-size: cover; background-position: center;">
      <h1 class="text-danger font-weight-bold mb-6 display-1">Biea Frutilara</h1>
      <p class="text-danger font-weight-bold lead display-4">Donde Comer Saludable es mas </p>
    </div>
  </div>
</div>

<?php require_once('comunes/menu.php'); ?>
<div class="container text-center h2 text-primary">
Pantalla Personal
<hr/>
</div>
<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
	<div class="container">
		<div class="row mt-3 justify-content-center">
		    <div class="col-md-2">
			   <button type="button" class="btn btn-primary" id="incluir" >INCLUIR</button>
			</div>
					
			<div class="col-md-2">	
			    <a href="." class="btn btn-primary">REGRESAR</a>
			</div>
		</div>
	</div>
	<div class="container">
	   <div class="table-responsive">
		<table class="table table-striped table-hover" id="tablapersona">
			<thead>
			  <tr>
				<th>Acciones</th>
				<th>Cedula</th>
				<th>Apellidos</th>
				<th>Nombres</th>
				<th>Fecha Nac</th>
				<th>Sexo</th>
				<th>Grado Instruccion</th>
				<th>Correo</th>
				<th>Telefono</th>
				<th>Estado Civil</th>
			  </tr>
			</thead>
			<tbody id="resultadoconsulta">
			  
			  
			</tbody>
	   </table>
	  </div>
  </div>
</div> <!-- fin de container -->


<!-- seccion del modal -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modal1">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-info">
        <h5 class="modal-title">Formulario de Personas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->
		   <form method="post" id="f" autocomplete="off">
			<input autocomplete="off" type="text" class="form-control" name="accion" id="accion" style="display: none;">
			<div class="container">	
				<div class="row mb-3">
					<div class="col-md-4">
					   <label for="cedula">Cedula</label>
					   <input class="form-control" type="text" id="cedula" />
					   <span id="scedula"></span>
					</div>
					<div class="col-md-8">
					   <label for="apellidos">Apellidos</label>
					   <input class="form-control" type="text" id="apellidos" />
					   <span id="sapellidos"></span>
					</div>
				</div>
				
				<div class="row mb-3">
					<div class="col-md-8">
					   <label for="nombres">Nombres</label>
					   <input class="form-control" type="text" id="nombres"  />
					   <span id="snombres"></span>
					</div>
					<div class="col-md-4">
					   <label for="fechadenacimiento">Fecha de Nacimiento</label>
					   <input class="form-control" type="date" id="fechadenacimiento" name="fechadenacimiento" />
					   <span id="sfechadenacimiento"></span>
					</div>
				</div>
				
				<div class="row mb-3">
					<div class="col-md-3">
						<label  for="masculino">
						   Masculino	
						   <input class="form-control" type="radio" value="M" id="masculino" name="sexo" />
						</label>
						<label  for="femenino">
						   Femenino	
						   <input class="form-control" type="radio" value="F" id="femenino" name="sexo" />
						</label>
					</div>
					<div class="col-md-9">
					   <label for="gradodeinstruccion">Grado de Instruccion</label>
					   <select class="form-control" id="gradodeinstruccion">
							<option value="PRIMARIA">Primaria</option>
							<option value="BACHILLER">Bachiller</option>
							<option value="TSU">TSU</option>
							<option value="GRADO">Grado Superior</option>
							<option value="POSTGRADO">Post Grado</option>
					   </select>
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-8">
					   <label for="correo">Correo</label>
					   <input class="form-control" type="email" id="correo"  />
					   <span id="scorreo"></span>
					</div>
					<div class="col-md-4">
					   <label for="telefono">Telefono</label>
					   <input class="form-control" type="text" id="telefono"  />
					   <span id="stelefono"></span>
					</div>
				</div>
				<div class="col-md-14">
					   <label for="estadocivil">Estado Civil</label>
					   <select class="form-control" id="estadocivil">
							<option value="SOLTERO">Soltero</option>
							<option value="CASADO">Casado</option>
							<option value="VIUDO">Viudo</option>
					   </select>
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-12">
						<hr/>
					</div>
				</div>

				<div class="row mt-3 justify-content-center">
					<div class="col-md-2">
						   <button type="button" class="btn btn-primary" 
						   id="proceso" ></button>
					</div>
				</div>
			</div>	
			</form>
		</div> <!-- fin de container -->
		<!--
		
		-->
    </div>
	
  </div>
</div>
<!--fin de seccion modal-->
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<script type="text/javascript" src="js/personasaj2.js"></script>

</body>
</html>