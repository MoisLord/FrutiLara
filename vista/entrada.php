<html> 
<title>N ENTRADAS</title>
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
	<h6>Rif del Proveedor</h6>
	<div class="row">
		<div class="col-md-8 input-group">
		<input class="form-control" type="text" id="idproveedor" name="idproveedor"/>	 
		   <input class="form-control" type="text" id="nombreprove" name="nombreprove" style="display:none" />
		     
		   
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
		   <input class="form-control" type="text" id="codigoproducto" name="codigoproducto"/>
		   <input class="form-control" type="text" id="idproducto" name="idproducto" style="display:none"/>
		</div>
	</div>
	<!-- FIN DE FILA BUSQUEDA DE PRODUCTOS -->

	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>

	<!-- FILA DE INPUT Y BUSCAR CANTIDAD DE PRODUCTO ENTRANTE -->
	<h6>Cantidad de Producto</h6>
	<div class="row">
		<div class="col-md-8 input-group">
		<input class="form-control" type="text" id="idcantidad" name="idcantidad"/>	 
		   <input class="form-control" type="text" id="cantproducto" name="cantproducto" style="display:none" />
		     
		   
		</div>
	</div>
	<!-- FIN DE FILA INPUT Y BUSCAR CANTIDAD DE PRODUCTO ENTRANTE -->

	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>

	<!-- FILA DE INPUT Y BUSCAR PRECIO DE PRODUCTO -->
	<h6>Precio de Producto</h6>
	<div class="row">
		<div class="col-md-8 input-group">
		<input class="form-control" type="number" id="precioproducto" name="precioproducto"/>	 
		   <input class="form-control" type="number" id="idprecio" name="idprecio" style="display:none" />
		     
		   
		</div>
	</div>
	<!-- FIN DE FILA INPUT Y BUSCAR PRECIO DE PRODUCTO -->
	<!-- FILA DE INPUT Y BUSCAR TASA DE PRECIO -->
	<h6>Tasa de Precio</h6>
	<div class="row">
		<div class="col-md-8 input-group">
		<input class="form-control" type="text" id="idtasa" name="idtasa"/>	 
		   <input class="form-control" type="text" id="tasaprecio" name="tasaprecio" style="display:none" />
		     
		   
		</div>
	</div>
	<!-- FIN DE FILA INPUT Y BUSCAR TASA DE PRECIO -->
	<div class="row">
		<div class="col">
			<hr class="border border-success border-3 opacity-65"/>
		</div>
	</div>
	<!-- FILA DE DETALLES DE SALIDA -->
	<div class="row">
		<div class="col-md-12">
		   <table  class="table table-striped table-hover py-4">
				<thead>
				  <tr>
				  <th>X</th>
					<th>Codigo</th>
					<th>Nombre</th>
					<th>Cantidad</th>
					<th>minimo</th>
					<th>maximo</th>
					
					
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
		   
			<th>Rif</th>
			<th>Documento</th>
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
	<span>*Ayuda: Debe seleccionar una fila y presionar el boton "Cerrar" para salir*</span>
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
			<th>Codigo</th>
			<th>Nombre</th>
			<th>Minimo</th>
			<th>Maximo</th>
			
		  </tr>
		</thead>
		<tbody id="listadoproductos">
		 
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
<!--<div class="modal fade" id="cantidadModal" tabindex="-1" role="dialog" aria-labelledby="cantidadModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header text-light bg-success">
        <h5 class="modal-title" id="cantidadModalLabel">Aviso</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        La cantidad Se esta pasando de los limites del stocks!!!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"id="cerrarModal">Cerrar</button>
      </div>
    </div>
  </div>
</div>-->
<?php require_once("comunes/body.php"); ?>
<script type="text/javascript" src="js/entrada.js"></script>

</body>
</html>