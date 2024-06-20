<html>
<?php require_once("comunes/encabezado.php"); ?>
<body> 
<?php require_once("comunes/menu.php"); ?>

<header>
<style>
    .carousel-item img {
      border-radius: 10px;
      margin: 0 auto;
      display: block;
    }

    .carousel-item span.mask {
      opacity: 0.5;
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
                <img src="img/fondo.jpg" class="d-block w-100 h-100 mx-auto p-2" alt="...">
              </span>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
              <h1 class="font-weight-bolder mb-6 display-1" style="font-weight: 600;">Bienvenido a Frutilara</h1>
              <p class="font-weight-bolder lead display-4" style="font-weight: 200;">Donde Comer Saludable es mas Sabroso</p>
            </div>
            <div class="carousel-item">
              <span class="mask bg-dark opacity-50 d-block w-100 h-100 mx-auto">
                <img src="img/2.jpg" class="d-block w-100 h-100 mx-auto p-2" alt="...">
              </span>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
              <h1 class="font-weight-bolder mb-6 display-1" style="font-weight: 600;">Bienvenido a Frutilara</h1>
              <p class="font-weight-bolder lead display-4" style="font-weight: 200;">Donde Comer Saludable es mas Sabroso</p>
            </div>
            <div class="carousel-item">
              <span class="mask bg-dark opacity-50 d-block w-100 h-100 mx-auto">
                <img src="img/3.jpg" class="d-block w-100 h-100 mx-auto p-2" alt="...">
              </span>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
              <h1 class="font-weight-bolder mb-6 display-1" style="font-weight: 600;">Bienvenido a Frutilara</h1>
              <p class="font-weight-bolder lead display-4" style="font-weight: 200;">Donde Comer Saludable es mas Sabroso</p>
            </div>
          </div>
          <!-- agregar marco blanco -->
          <div class="carousel-inner-border">
            <div class="border border-white rounded"></div>
          </div>
          <!-- fin marco blanco -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</header>

    

<!--
<header>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <span class="mask bg-dark opacity-50 d-block w-100 h-100 mx-auto">
                <img src="img/fondo.jpg" class="d-block w-100 h-100" alt="...">
              </span>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
              <h1 class="font-weight-bolder mb-6 display-1" style="font-weight: 600;">Bienvenido a Frutilara</h1>
              <p class="font-weight-bolder lead display-4" style="font-weight: 200;">Donde Comer Saludable es mas Sabroso</p>
            </div>
            <div class="carousel-item">
              <span class="mask bg-dark opacity-50 d-block w-100 h-100 mx-auto">
                <img src="img/2.jpg" class="d-block w-100 h-100" alt="...">
              </span>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
              <h1 class="font-weight-bolder mb-6 display-1" style="font-weight: 600;">Bienvenido a Frutilara</h1>
              <p class="font-weight-bolder lead display-4" style="font-weight: 200;">Donde Comer Saludable es mas Sabroso</p>
            </div>
            <div class="carousel-item">
              <span class="mask bg-dark opacity-50 d-block w-100 h-100 mx-auto">
                <img src="img/3.jpg" class="d-block w-100 h-100" alt="...">
              </span>
            </div>
            <div class="carousel-caption d-flex flex-column justify-content-center align-items-center h-100">
              <h1 class="font-weight-bolder mb-6 display-1" style="font-weight: 600;">Bienvenido a Frutilara</h1>
              <p class="font-weight-bolder lead display-4" style="font-weight: 200;">Donde Comer Saludable es mas Sabroso</p>
            </div>
          </div>
             agregar marco blanco 
          <div class="carousel-inner-border">
            <div class="border border-white rounded"></div>
          </div>
          -->
          <!-- fin marco blanco 
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</header>
<---->
</body>
</html>