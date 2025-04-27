<html>
<title>REGISTRO DE USUARIO</title>
<?php require_once("comunes/encabezado.php"); ?>
<?php require_once("./modelo/sessionlogin.php"); ?>
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
                <h1>Registro de Usuario</h1>
            </div>
            <div class="input-group">
				<div class="col-md-12">
					<label for="cedula">Cedula</label><br></br>
					<input class="form-control" type="text" id="cedula" name="cedula"/>
					<span>El formato debe ser númerico</span>
				</div>
            </div>
            <input class="form-control" type="text" id="clave" name="tipos" value="SUPERUSUARIO" style="display: none;"/>
            <div class="input-group">
				<div class="col-md-12">
					<label for="clave">Clave</label><br></br>
					<input class="form-control" type="password" id="clave" name="clave"/>
					<span>Solo letras y numeros entre 7 y 15 caracteres</span>
				</div>
            </div>
			<div class="input-group">
				<div class="col-md-12">
					<label for="clave">Correo Electronico</label><br></br>
					<input class="form-control" id="clave" name="clave"/>
					<span>Solo letras y numeros entre 7 y 15 caracteres</span>
				</div>
            </div>
			
            <div class="input-group">
				<div class="row justify-content-center mt-5">
					<div class="col-md-6 d-flex justify-content-center">
					
					</div>
				</div>
            </div>
			
        </div>

</form>
</div> <!-- fin de container -->
<?php require_once("comunes/body.php"); ?>
<script type="text/javascript" src="js/login.js"></script>

</body>
</html>