<html>
<?php require_once("comunes/encabezado.php"); ?>
<body> 
<?php require_once("comunes/menu.php"); ?>

<header>
  <style>
    .carousel-item {
      height: 100vh;
      width: 100vw;
    }

    .carousel-item span.mask {
      background-color: rgba(0, 0, 0, 0.5);
      height: 100%;
      width: 100%;
      display: block;
    }

    .carousel-item img {
      height: 100%;
      width: 100%;
      object-fit: cover;
      border-radius: 0;
    }
  </style>
  <!-- Resto del código -->
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <span class="mask bg-dark opacity-50 d-block w-100 h-100 mx-auto">
                <img src="img/fondo.jpg" class="d-block w-100 h-100 mx-auto" alt="...">
              </span>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
              <h1 class="font-weight-bolder mb-6 display-1" style="font-weight: 600;">Bienvenido a Frutilara</h1>
              <p class="font-weight-bolder lead display-4" style="font-weight: 200;">Donde Comer Saludable es mas Sabroso</p>
            </div>
            <div class="carousel-item">
              <span class="mask bg-dark opacity-50 d-block w-100 h-100 mx-auto">
                <img src="img/2.jpg" class="d-block w-100 h-100 mx-auto" alt="...">
              </span>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
              <h1 class="font-weight-bolder mb-6 display-1" style="font-weight: 600;">Bienvenido a Frutilara</h1>
              <p class="font-weight-bolder lead display-4" style="font-weight: 200;">Donde Comer Saludable es mas Sabroso</p>
            </div>
            <div class="carousel-item">
              <span class="mask bg-dark opacity-50 d-block w-100 h-100 mx-auto">
                <img src="img/3.jpg" class="d-block w-100 h-100 mx-auto" alt="...">
              </span>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
              <h1 class="font-weight-bolder mb-6 display-1" style="font-weight: 600;">Bienvenido a Frutilara</h1>
              <p class="font-weight-bolder lead display-4" style="font-weight: 200;">Donde Comer Saludable es mas Sabroso</p>
            </div>
          </div>
</body>
</html>