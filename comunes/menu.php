<div class= "col-12">
<nav class="navbar navbar-expand-lg bg-success bg-gradient fixed-top">
<nav class="navbar navbar-expand-lg fixed-top">
  <div class="container-fluid">

    <img src="img/logo.png" alt="" style="width:50px;">
    <a class="navbar-brand text-white" style="font-weight: 600;" href=".">FRUTILARA</a>


    <button class="navbar-toggler bg-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end bg-success" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title text-warning" id="offcanvasNavbarLabel">Donde Comer Saludable es mas Sabroso</h5>
        <button type="button" class="btn-close bg-danger" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">

      <?php
		   //verificamos que exista la variable nivel
		   //que es la que contiene el valor de la sesion
		   if(!empty($nivel)){
					  if($nivel=='ADMINISTRADOR'){
					?>
				<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="?pagina=marca">MARCAS DE PRODUCTOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="?pagina=modelo">MODELO DE PRODUCTOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="?pagina=categoria">CATEGORIAS DE PRODUCTOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="?pagina=productosaj">PRODUCTOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="?pagina=proveedor">PROVEEDORES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="?pagina=empleados">EMPLEADOS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="?pagina=cliente">CLIENTES</a>
          </li>
          
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-bs-toggle="dropdown">
                INVENTARIO
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="?pagina=entrada">Notas de Entrada</a>
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="?pagina=salida">Notas de Salida</a>
              </div>
            </li>
            
          <li class="nav-item">
            <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="?pagina=usuario">USUARIOS</a>
          </li>
         <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-bs-toggle="dropdown">
                 REPORTES
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="?pagina=reportentrada">Reporte de Entrada</a>
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="?pagina=reportesalida">Reporte de Salida</a>
              </div>
            </li>
        </ul>
					<?php
					  }
		 ?>
          <?php
					  if($nivel=='EMPLEADO'){
					?>
					<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="?pagina=cliente">CLIENTES</a>
          </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-bs-toggle="dropdown">
                INVENTARIO
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="?pagina=salida">Notas de Salida</a>
                <?php
           }
					?>
              </div>
            </li>
          </ul>
					<?php
					  }
					?>
        </div>
      </div>
      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      <?php
		        
            if(!empty($nivel) and $nivel!=""){
         ?>
      <a href="?pagina=salir" class="btn btn-outline-success my-2 my-sm-0">salir</a>
      <?php	
				}
				else{
		 ?>
      <a href="?pagina=login" class="btn btn-outline-success my-2 my-sm-0">entrar</a>
      <?php 		 
				}
		 ?>
           <div class="collapse navbar-collapse" id="navbarNavDropdown">
    </div>
  </div>
</nav>
</div>