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
PANTALLA DE SERVICIOS
<hr class="border border-success border-3 opacity-65">
</div>
<div class="container-fluid row">
  <!-- Columna izquierda con el formulario -->
  <div class="col-4 p-2">
    <form method="post" id="f" autocomplete="off">
      <h4 class="text-center text-success">REGISTRO DE SERVICIOS</h4>

      <div class="row mb-3">
        <div class="col-md">
          <label for="codigo_servicio">Código</label>
          <input class="form-control" type="text" id="codigo_servicio" name="codigo_servicio" />
          <span id="scodigo_servicio">El formato debe ser 092348760 o 00003454</span>
        </div>
      </div>

      <div class="row mb-4">
        <div class="col-md">
          <label for="descripcion_servicio">Descripción</label>
          <input class="form-control" type="text" id="descripcion_servicio" name="descripcion_servicio" />
          <span id="sdescripcion_servicio">Solo letras y números entre 3 y 30 caracteres</span>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <hr class="border border-success border-3 opacity-65">
        </div>
      </div>

      <div class="row mt-3 justify-content-left">
        <div class="auto">
          <button type="button" class="btn btn-success" id="incluir">
            <img src="iconos/register.svg" alt="register" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
          </button>
        </div>
        <div class="auto">
          <button type="button" class="btn btn-success" id="modificar">
            <img src="iconos/edit.svg" alt="edit" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
          </button>
        </div>
        <div class="auto">
          <button type="button" class="btn btn-success" id="eliminar">
            <img src="iconos/delete.svg" alt="delete" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
          </button>
        </div>
      </div>
        <div class="auto">
          <button type="button" class="btn btn-success" id="consultadeDelete">
            <img src="iconos/list.svg" alt="list" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
          </button>
        </div>
        <div class="auto">
          <button type="button" class="btn btn-success" id="restaurar">
            <img src="iconos/restore.svg" alt="restore" style="width:25px; height:25px; margin-bottom:3px; filter: invert(1);">
          </button>
        </div>
      </div>
    </form>
  </div>

  <!-- Columna derecha con la tabla -->
  <div class="col-8 p-4">
    <div class="container">
      <h5 class="modal-title text-center text-success">SERVICIOS REGISTRADOS</h5>
      <hr class="border border-success border-3 opacity-65">
      <span>*Ayuda: Se debe seleccionar una fila para que envíe la información al formulario*</span>
      <table class="table table-striped table-hover" id="tablaproveedores">
        <thead>
          <tr>
            <th>Código</th>
            <th>Descripción</th>
          </tr>
        </thead>
        <tbody id="resultadoconsulta">
        </tbody>
      </table>
    </div>
  </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog"  id="modalProveedor">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">Listado de servicios</h5>
        <button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-content">
		<table class="table table-striped table-hover">
		<thead>
		  <tr>
		   
		  	<th>Codigo</th>
			<th>Descripciòn</th>
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
<script type="text/javascript" src="js/servicios.js"></script>

</body>
</html>