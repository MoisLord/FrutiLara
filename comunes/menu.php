<link rel="stylesheet" type="text/css" href="css/menu.css">

<div class="col-12">
  <nav class="navbar navbar-expand-lg bg-success bg-gradient fixed-top">
    <nav class="navbar navbar-expand-lg fixed-top">
      <div class="container-fluid">

        <img src="img/logo.png" alt="" style="width:50px;">
        <a class="navbar-brand text-white" style="font-weight: 600; font-size: 14;" href=".">FRUTILARA</a>


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

            if (!empty($nivel)) {
              if ($nivel == 'SUPERUSUARIO') {
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
            if (!empty($nivel)) {
              if ($nivel == 'ADMINISTRADOR') {
            ?>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
                      <img src="iconos/registro.svg" alt="registro" style="width:25px; height:25px; margin-bottom:3px;">
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
                      <img src="iconos/inventario.svg" alt="inventario" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>INVENTARIO</span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="entrada">Notas de Entrada</a>
                      <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="salida">Prefacturación</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-lg-2 d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="pagoEmpleados">
                      <img src="iconos/empleado.svg" alt="empleados" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>PAGO DEL EMPLEADO</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-lg-2 d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="pservicios">
                      <img src="iconos/servicios.svg" alt="servicios" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>PAGOS DE SERVICIOS</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-lg-2 d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="conciliacion">
                      <img src="iconos/conciliacion.svg" alt="conciliacion" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>CONCILIACIÓN BANCARIA</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-lg-2 d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="usuario">
                      <img src="iconos/usuarios.svg" alt="usuarios" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>USUARIOS</span>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
                      <img src="iconos/reportes.svg" alt="reportes" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>REPORTES</span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reportentrada">Reporte de Entrada</a>
                      <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reportesalida">Reporte de Prefacturación</a>
                      <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reporteinventario">Reporte General</a>
                    </div>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-lg-2 d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;"
                      href="vista/manual.php" target="_blank">
                      <img src="iconos/manual.svg" alt="manual" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>MANUAL DEL SISTEMA</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-lg-2 d-flex flex-column align-items-center justify-content-center" style="font-weight: 600; font-size: 12;"
                      href="vista/bitacora.php">
                      <img src="iconos/bitacora.svg" alt="bitacora" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>BITACORA</span>
                    </a>
                  </li>
                </ul>
              <?php
              }
              ?>
              <?php
              //aqui se coloca la vista del empleado
              if ($nivel == 'EMPLEADO') {
              ?>
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                  <li class="nav-item">
                    <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;"
                      href="vista/manual.php" target="_blank">
                      <img src="iconos/manual.svg" alt="manual" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>MANUAL DEL SISTEMA</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link mx-lg-2" style="font-weight: 600; font-size: 12;" href="cliente">
                      <img src="iconos/clientes.svg" alt="empleados" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>CLIENTES</span>
                    </a>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
                      <img src="iconos/inventario2.svg" alt="empleados" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>INVENTARIO</span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="salida">
                        <span>Prefacturación</span>
                      </a>
                    </div>
                  </li>
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="font-weight: 600; font-size: 12;" href="#" id="navbardrop" data-bs-toggle="dropdown">
                      <img src="iconos/reportes2.svg" alt="empleados" style="width:25px; height:25px; margin-bottom:3px;">
                      <span>REPORTES</span>
                    </a>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" style="font-weight: 600; font-size: 12;" href="reporteinventario">
                        <span>Reporte General</span>
                      </a>
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

          if (!empty($nivel) and $nivel != "") {
          ?>
            <a href="/FrutiLara/controlador/logout.php" class="btn btn-outline-danger my-2 my-sm-0">Cerrar sesión</a>
      </div>
    <?php
          } else {
    ?>
      <a href="?pagina=login" class="btn btn-outline-orange my-2 my-sm-0">Entrar</a>
</div>

<?php
          }
?>
<div class="collapse navbar-collapse" id="navbarNavDropdown">
</div>
</div>
</nav>
</div>