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
   //aqui se coloca la vista del super usuario
   
   if(!empty($nivel)){
			  if($nivel=='SUPERUSUARIO'){
			?>
		<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      <li class="nav-item">
        <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="usuario">USUARIOS</a>
      </li>
    </ul>
			<?php
			  }
      }
 ?>

      <?php
       //aqui se coloca la vista del administrador
		   if(!empty($nivel)){
					  if($nivel=='ADMINISTRADOR'){
					?>
				<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
               REGISTRO DEL SISTEMA
              </a>
              <div class="dropdown-menu">
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="marca">MARCAS DE PRODUCTOS</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="/FrutiLara/modelo">MODELO DE PRODUCTOS</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="categoria">CATEGORIAS DE PRODUCTOS</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="productosaj">PRODUCTOS</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="proveedor">PROVEEDORES</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="empleados">EMPLEADOS</a>
	    <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="servicio">SERVICIOS</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="cliente">CLIENTES</a>
            </div>
          </li>
          
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
                INVENTARIO
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="entrada">Notas de Entrada</a>
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="salida">Notas de Salida</a>
              </div>
            </li>
            
          <li class="nav-item">
            <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="usuario">USUARIOS</a>
          </li>
         <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
                 REPORTES
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reportentrada">Reporte de Entrada</a>
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reportesalida">Reporte de Salida</a>
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reporteinventario">Reporte de inventario</a>
              </div>
            </li>
            <li class="nav-item">
               <a id="manual" class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;">MANUAL DEL SISTEMA</a>
            </li>
        </ul>
					<?php
					  }
		 ?>
          <?php
          //aqui se coloca la vista del empleado
					  if($nivel=='EMPLEADO'){
					?>
					<ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a id="manual" class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;">MANUAL DEL SISTEMA</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="cliente">CLIENTES</a>
          </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
                INVENTARIO
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="salida">Notas de Salida</a>
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
                REPORTES
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reporteinventario">Reporte de Inventario</a>
              </div>
            </li>
          </ul>
                <?php
           }
					?>
              
					<?php
					  }
					?>
        </div>
      </div>
      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
      <?php
		        
            if(!empty($nivel) and $nivel!=""){
         ?>
      <a href="salir" class="btn btn-outline-success my-2 my-sm-0">salir</a>
            </div>
      <?php	
				}
				else{
		 ?>
    
        
            <a href="login" class="btn btn-outline-success my-2 my-sm-0">Entrar</a>
        
    </div>
    
      <?php 		 
				}
		 ?>
           <div class="collapse navbar-collapse" id="navbarNavDropdown">
    </div>
  </div>
</nav>
</div>
