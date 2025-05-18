<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
    <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z"/>
</svg>
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
          <a class="nav-link dropdown-toggle d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
              <img src="iconos/registro.svg" alt="registro" style="width:30px; height:30px; margin-bottom:3px;">
              <span>REGISTRO DEL SISTEMA</span>
          </a>
              <div class="dropdown-menu">
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="marca">MARCAS DE PRODUCTOS</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="categoria">CATEGORIAS DE PRODUCTOS</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="productosaj">PRODUCTOS</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="proveedor">PROVEEDORES</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="empleados">EMPLEADOS</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="servicios">SERVICIOS</a>
            <a class="dropdown-item mb-2" style="font-weight: 600; font-size: 12;" href="cliente">CLIENTES</a>
            </div>
          </li>
          
          <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
                <img src="iconos/inventario.svg" alt="inventario" style="width:30px; height:30px; margin-bottom:3px;">
                <span>INVENTARIO</span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="entrada">Notas de Entrada</a>
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="salida">Prefacturación</a>
              </div>
            </li>
            <li class="nav-item">
            <a class="nav-link mx-lg-2 d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="pagoEmpleados">
              <img src="iconos/empleados.svg" alt="empleados" style="width:30px; height:30px; margin-bottom:3px;">
              <span>PAGO DEL EMPLEADO</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2 d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="pagoservicio">
              <img src="iconos/servicios.svg" alt="servicios" style="width:30px; height:30px; margin-bottom:3px;">
              <span>PAGOS DE SERVICIOS</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2 d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="conciliacion">
              <img src="iconos/conciliacion.svg" alt="conciliacion" style="width:30px; height:30px; margin-bottom:3px;">
              <span>CONCILIACIÓN BANCARIA</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-lg-2 d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="usuario">
              <img src="iconos/usuarios.svg" alt="usuarios" style="width:30px; height:30px; margin-bottom:3px;">
              <span>USUARIOS</span>
            </a>
          </li>
         <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
                <img src="iconos/reportes.svg" alt="reportes" style="width:30px; height:30px; margin-bottom:3px;">
                <span>REPORTES</span>
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reportentrada">Reporte de Entrada</a>
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reportesalida">Reporte de Prefacturación</a>
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reporteinventario">Reporte General</a>
              </div>
            </li>
            <li class="nav-item">
               <a id="manual" class="nav-link mx-lg-2 d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;">
                 <img src="iconos/manual.svg" alt="manual" style="width:30px; height:30px; margin-bottom:3px;">
                   <span>MANUAL DEL SISTEMA</span>
               </a>
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
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="salida">Prefacturación</a>
                </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
                REPORTES
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reporteinventario">Reporte General</a>
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
