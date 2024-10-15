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
<hr/>
<hr/>
<hr/>
<hr/>
<hr/>
<div class="container text-center h2 text-success">
NOTAS DE ENTRADA DE PRODUCTOS
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
			   <button type="button" class="btn btn-success" id="listadodeproveedores" name="listadodeproveedores">LISTADO DE PROVEEDORES</button>
			   <button type="button" class="btn btn-success" id="listadodeproductos" name="listadodeproductos">LISTADO DE PRODUCTOS</button>
		</div>
	</div>
	<!-- FIN DE FILA BOTONES -->
	<div class="row">
		<div class="col">
			<hr class="border border-success border-3 opacity-65"/>
		</div>
	</div>
	<!-- FILA DE INPUT Y BUSCAR PROVEEDOR -->
	<h6>Rif del Proveedor</h6>
	<div class="row">
		<div class="col-md-8 input-group">
		   <input class="form-control" type="text" id="nombreprove" name="nombreprove" />
		   <input class="form-control" type="text" id="idproveedor" name="idproveedor" style="display:none"/>
		</div>
	</div>
	<!-- FIN DE FILA INPUT Y BUSCAR PROVEEDOR -->
	
	<!-- FILA DE DATOS DEL PROVEEDOR -->
	<div class="row">
		<div class="col-md-12" id="datosdelproveedor">
		   
		</div>
	</div>
	<!-- FIN DE FILA DATOS DEL PROVEEDOR -->
		
	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>

    <!-- FILA DE BUSQUEDA DE PRODUCTOS -->
	<h6>Codigo del Producto</h6>
	<div class="row">
		<div class="col-md-8 input-group">
		   <input class="form-control" type="text" id="codigoproducto" name="codigoproducto" />
		   <input class="form-control" type="text" id="idproducto" name="idproducto" style="display:none"/>
		</div>
	</div>
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
					<th style="display:none">Id</th>
					<th>Codigo</th>
					<th>Nombre Del producto</th>
					<th>Cantidad</th>
					<th>Minimo</th>
					<th>Modelo</th>
					<th>Categoria</th>
				  </tr>
				</thead>
				<tbody id="entrada">

				</tbody>
			</table>
		</div>
	</div>
	<!-- FIN DE FILA DETALLES DE SALIDA -->
</div>
</form>
</div> <!-- fin de container -->


<!-- seccion del modal proveedores -->
<div class="modal fade" tabindex="-1" role="dialog"  id="modalproveedor">
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
		    <th style="display:none">Id</th>
			<th>Rif</th>
			<th>Empresa</th>
			<th>Telefono</th>
			<th>Direccion</th>
		  </tr>
		</thead>
		<tbody id="listadoproveedor">
		  
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
    <div class="modal-header text-light bg-success">
        <h5 class="modal-title">Listado de productos</h5>
        <button type="button" class="close bg-success" data-dismiss="modal" aria-label="Cerrar">
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
			<th>Tipo</th>
			<th>Max</th>
			<th>Min</th>
			<th>Modelo</th>
			<th>Categoria</th>
		  </tr>
		</thead>
		<tbody id="listadoproductos">
		 
		</tbody>
		</table>
    </div>
	<div class="modal-footer bg-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
    </div>
  </div>
</div>
<!--fin de seccion modal-->

<script type="text/javascript" src="js/entrada.js"></script>

</body>
</html>