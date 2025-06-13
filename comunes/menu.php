<link rel="stylesheet" type="text/css" href="css/menu.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.css">
<link rel="stylesheet" href="css/sidebar.css">

<!-- Sidebar -->
<nav class="sidebar">
    <div class="sidebar__header">
        <img src="img/logo.png" alt="Logo" class="sidebar__logo">
        <span class="sidebar__title">FRUTILARA</span>
    </div>

    <div class="sidebar__content">
        <?php if(!empty($nivel)): ?>
            <?php if($nivel == 'SUPERUSUARIO'): ?>
                <div class="sidebar__section">
                    <div class="sidebar__item">
                        <i class="ri-user-fill"></i>
                        <a href="usuario">USUARIOS</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($nivel == 'ADMINISTRADOR'): ?>
                <div class="sidebar__section">
                    <div class="sidebar__section-title">
                        <i class="ri-edit-box-fill"></i>
                        <span>REGISTRO DEL SISTEMA</span>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-price-tag-3-fill"></i>
                        <a href="marca">MARCAS</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-list-check-2"></i>
                        <a href="categoria">CATEGORÍAS</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-shopping-basket-fill"></i>
                        <a href="productosaj">PRODUCTOS</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-truck-fill"></i>
                        <a href="proveedor">PROVEEDORES</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-team-fill"></i>
                        <a href="empleados">EMPLEADOS</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-service-fill"></i>
                        <a href="servicios">SERVICIOS</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-user-3-fill"></i>
                        <a href="cliente">CLIENTES</a>
                    </div>
                </div>

                <div class="sidebar__section">
                    <div class="sidebar__section-title">
                        <i class="ri-store-2-fill"></i>
                        <span>INVENTARIO</span>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-arrow-down-circle-fill"></i>
                        <a href="entrada">ENTRADAS</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-arrow-up-circle-fill"></i>
                        <a href="salida">SALIDAS</a>
                    </div>
                </div>

                <div class="sidebar__section">
                    <div class="sidebar__section-title">
                        <i class="ri-money-dollar-circle-fill"></i>
                        <span>PAGOS</span>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-employee-fill"></i>
                        <a href="pagoEmpleados">EMPLEADOS</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-bank-card-fill"></i>
                        <a href="pservicios">SERVICIOS</a>
                    </div>
                </div>

                <div class="sidebar__section">
                    <div class="sidebar__section-title">
                        <i class="ri-file-chart-fill"></i>
                        <span>REPORTES</span>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-file-chart-line"></i>
                        <a href="reportentrada">ENTRADAS</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-file-chart-2-line"></i>
                        <a href="reportesalida">SALIDAS</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-file-info-line"></i>
                        <a href="reporteinventario">GENERAL</a>
                    </div>
                </div>
            <?php endif; ?>

            <?php if($nivel == 'EMPLEADO'): ?>
                <div class="sidebar__section">
                    <div class="sidebar__item">
                        <i class="ri-user-3-fill"></i>
                        <a href="cliente">CLIENTES</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-arrow-up-circle-fill"></i>
                        <a href="salida">SALIDAS</a>
                    </div>
                    <div class="sidebar__item">
                        <i class="ri-file-info-line"></i>
                        <a href="reporteinventario">REPORTE GENERAL</a>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="sidebar__section">
            <div class="sidebar__item">
                <i class="ri-book-2-fill"></i>
                <a href="vista/manual.php" target="_blank">MANUAL</a>
            </div>
            <div class="sidebar__item">
                <i class="ri-history-fill"></i>
                <a href="vista/bitacora.php">BITÁCORA</a>
            </div>
        </div>
    </div>

    <div class="sidebar__footer">
        <?php if(!empty($nivel) && $nivel != ""): ?>
            <a href="?pagina=logout" class="sidebar__logout">
                <i class="ri-logout-box-r-fill"></i>
                <span>CERRAR SESIÓN</span>
            </a>
        <?php else: ?>
            <a href="?pagina=login" class="sidebar__login">
                <i class="ri-login-box-fill"></i>
                <span>INICIAR SESIÓN</span>
            </a>
        <?php endif; ?>
    </div>
</nav>

<!-- llamadas a componentes -->
<div class="col-12">
    <?php require_once("comunes/encabezado.php"); ?>
    <?php require_once("./modelo/session.php"); ?>
    
    <?php require_once("comunes/modal.php"); ?>
    
    <br/><br/><br/><br/><br/>

    
    <?php require_once("comunes/body.php"); ?>
    <script type="text/javascript" src="js/menu.js"></script>
</div>