<html>
<?php require_once("comunes/encabezado.php"); ?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, 
	initial-scale=1.0, maximimum-scale=1.0, minimum-scale=1.0">
	<!--Llamada al CSS del Login-->
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
<!--Llamada a archivo modal.php, dentro de el hay una sección modal-->
<?php require_once("comunes/modal.php"); ?>
<!--Div oculta para colocar el mensaje a mostrar-->
<div id="mensajes" style="display:none">
<?php
	if(!empty($mensaje)){
		echo $mensaje;
	}
?>	
</div>

<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->

<form method="post" action="" id="f">
<input type="text" name="accion" id="accion" style="display:none"/>

<div class="login-box">
            <div class="header-img">
                <img src="img/logo.png" alt="">
            </div>
            <div class="header-text text-center h2 text-danger">
                <h1>Iniciar Sesión</h1>
            </div>
            <div class="input-group">
			<ion-icon name="id-card-outline" class="id-card"></ion-icon>
				<div class="col-md-12">
					<label for="cedula">Cedula</label><br></br>
					<input class="form-control" type="text" id="cedula" name="cedula"/>
					<span id="scedula">El formato debe ser númerico</span>
				</div>
            </div>
            <div class="input-group">
			<ion-icon name="lock-closed-outline" class="password-lock"></ion-icon>
				<div class="col-md-12">
					<label for="clave">Clave</label><br></br>
					<input class="form-control" type="password" id="clave" name="clave"/>
					<div class="toggle-eye open">
						<ion-icon name="eye-outline"></ion-icon>
					</div>
					<div class="toggle-eye close">
						<ion-icon name="eye-off-outline"></ion-icon>
					</div>
					<span id="sclave">Solo letras y numeros entre 7 y 15 caracteres</span>
				</div>
            </div>
            <div class="forgot-pass">
                <a href="#">Olvidaste la clave?</a>
            </div>
            <div class="input-group">
				<div class="row justify-content-center mt-5">
					<div class="col-md-6 d-flex justify-content-center">
						<a href="?pagina=principal" class="btn btn-danger w-100 small-width">ENTRAR <i class="bx bx-log-in"></i>
						    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bx bx-log-in" viewBox="0 0 16 16">
							    <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z"/>
							    <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z"/>
						    </svg>
					    </a>
					</div>
				</div>
            </div>
			
        </div>

</form>
</div> <!-- fin de container -->

<script type="text/javascript" src="js/login.js"></script>

</body>
</html>