<html>
<?php require_once("comunes/encabezado.php"); ?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Font Awesome (para íconos) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<!-- Bootstrap JS (requiere Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<body>
  <?php require_once("comunes/menu.php"); ?>

  <header>
    <link rel="stylesheet" type="text/css" href="css/principal.css">
    <link rel="stylesheet" type="text/css" href="css/menu.css">
    <link rel="stylesheet" type="text/css" href="css/footer.css">


    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/fondo.jpg" class="d-block w-100 h-100" alt="...">
          <div class="mask bg-dark opacity-50 d-block w-100 h-100 mx-auto"></div>
          <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="font-weight-bolder mb-6 display-1" style="font-size: 150;">Bienvenido a Frutilara</h1>
            <p class="font-weight-bolder lead display-4">donde comer saludable es mas sabroso</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/2.jpg" class="d-block w-100 h-100" alt="...">
          <div class="mask bg-dark opacity-50 d-block w-100 h-100 mx-auto"></div>
          <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="font-weight-bolder mb-6 display-1" style="font-size: 150;">Bienvenido a Frutilara</h1>
            <p class="font-weight-bolder lead display-4">donde comer saludable es mas sabroso</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="img/3.jpg" class="d-block w-100 h-100" alt="...">
          <div class="mask bg-dark opacity-50 d-block w-100 h-100 mx-auto"></div>
          <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
            <h1 class="font-weight-bolder mb-6 display-1" style="font-size: 150;">Bienvenido a Frutilara</h1>
            <p class="font-weight-bolder lead display-4">donde comer saludable es mas sabroso</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div>
      
    <!-- Inicio de la seccion de contenido -->
<section class="py-6 position-relative">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-8 order-2 order-md-2 order-lg-1">
        <div class="position-relative ms-md-5 mb-0 mb-md-7 mb-lg-0 d-none d-md-block d-lg-block d-xl-block h-75">
          <div class="bg-gradient-info w-100 h-100 border-radius-xl position-absolute" alt=""></div>
          <img src="img/6.jpg" class="w-100 border-radius-xl mt-6 ms-5 position-absolute" alt="">
        </div>
      </div>
      <div class="col-lg-5 col-md-12 ms-auto order-1 order-md-1 order-lg-1">
        <div class="p-6 pt-0">
            <div class="icon icon-shape bg-gradient-info rounded-circle shadow text-center mb-4">
              <img src="iconos/fruits.svg" alt="fruits" class="icon" style="width:30px; height:30px; margin-bottom:3px; filter: invert(1);">
            </div>
            <h4 class="text-gradient text-success mb-0">FrutiLara Te brinda</h4>
            <h4 class="mb-4">para tu bienestar</h4>
            <p>frutas, verduras, legumbres, hortalizas y más.</p>
            <a href="vista/manual.php:;" target="_blank" class="text-dark icon-move-right">Más sobre nosotros
              <i class="fas fa-arrow-right text-sm ms-1"></i>
            </a>
          </div>
      </div>
    </div>
    <div class="row mt-0 mt-md-5 mt-lg-8">
      <div class="col-lg-5 col-md-12 me-auto">
        <div class="p-3 pt-0">
            <div class="icon icon-shape bg-gradient-warning rounded-circle shadow text-center mb-4">
              <img src="iconos/fruits.svg" alt="fruits" class="icon" style="width:30px; height:30px; margin-bottom:3px; filter: invert(1);">
            </div>
            <h4 class="text-gradient text-warning mb-0">Negocio Familiar</h4>
            <h4 class="mb-4">Donde la comida saludable es una tradición</h4>
            <p>Como frutas, verduras, legumbres, hortalizas y más.</p>
          </div>
      </div>
      <div class="col-lg-6 col-md-8">
        <div class="position-relative ms-md-5 d-none d-md-block d-lg-block d-xl-block h-75">
          <div class="w-100 h-100 bg-gradient-warning border-radius-xl position-absolute" alt=""></div>
          <img src="img/7.jpg" class="w-100 border-radius-xl mt-6 ms-n5 position-absolute" alt="">
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Fin de la seccion de contenido -->

  <?php // Aqui comienza el footer; ?>
      <footer class="footer">
        <div>
          <ul class="social-icon">
            <li class="icon-elem">
              <a href="https://www.instagram.com/fruti_lara?igsh=MWh5MW9mb3JpOGlxYg==" class="icon">
                <ion-icon name="logo-instagram"></ion-icon>
                <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
                <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
              </a>
            </li>
            <li class="icon-svg">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
                <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.37 2.37 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0M1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5M4 15h3v-5H4zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1zm3 0h-2v3h2z" />
              </svg>
          </ul>
        </div>

        <p class="text"> Frutilara | donde comer saludable es mas sabroso</p>
        <div class="footer-inner">
          <nav>
            <ul class="text">
              <li>Registro del Sistema</li>
              <li>Inventario</li>
              <li>Pago del Empleado</a></li>
              <li>Pago de Servicios</a></li>
              <li>Usuarios</a></li>
              <li>Reportes</li>
              <li>Manual del Sistema</a></li>
              <li>Bitacora</a></li>
            </ul>
          </nav>
        </div>
      </footer>
    </div>
  </header>
  <?php // require_once("comunes/body.php"); ?>
  <script type="text/javascript" src="js/principal.js"></script>
</body>

</html>