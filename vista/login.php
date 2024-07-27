<html>
<?php require_once("comunes/encabezado.php"); ?>
<body>
	<!--Llamada al CSS del Login-->
	<link rel="stylesheet" type="text/css" href="../css/login.css">
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
<div class="container">

<div class="login-box">
            <div class="header-img">
                <img src="img/logo.png" alt="">
            </div>
            <div class="header-text text-center h2 text-danger">
                <h1>Iniciar Sesión</h1>
            </div>
            <div class="input-group">
				<div class="col-md-12">
					<label for="cedula">Cedula</label><br></br>
					<input class="form-control" type="text" id="cedula" name="cedula" 
					/>
					<span id="scedula">El formato debe ser númerico</span>
				</div>
            </div>
            <div class="input-group">
				<div class="col-md-12">
					<label for="clave">Clave</label><br></br>
					<input class="form-control" type="password" id="clave" name="clave" 
					/>
					<span id="sclave">Solo letras y numeros entre 7 y 15 caracteres</span>
				</div>
            </div>
            <div class="forgot-pass">
                <a href="#">Forgot password?</a>
            </div>
            <div class="input-group">
				<div class="row justify-content-center mt-5">
					<div class="col-md-6 d-flex justify-content-center">
						<a href="?pagina=principal" class="btn btn-danger w-100 small-width">ENTRAR <i class="bx bx-log-in"></i></a>
					</div>
				</div>
            </div>
			
        </div>

</div>
</form>
</div> <!-- fin de container -->

<script type="text/javascript" src="js/login.js"></script>

</body>
</html>