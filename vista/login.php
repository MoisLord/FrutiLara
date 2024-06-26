<html>
<?php require_once("comunes/encabezado.php"); ?>
<body>
	<!--Llamada al CSS del Login-->
	<link rel="stylesheet" type="text/css" href="css/login.css">
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

<div class="container text-center h2 text-danger">
Iniciar Sesion
<hr/>
</div>



<div class="container"> <!-- todo el contenido ira dentro de esta etiqueta-->

<form method="post" action="" id="f">
<input type="text" name="accion" id="accion" style="display:none"/>
<div class="container">
    
    <div class="row mt-3">
		
		<div class="col-md-6">
		   <label for="cedula">Cedula</label>
		   <input class="form-control" type="text" id="cedula" name="cedula" 
		   />
		   <span id="scedula"></span>
		</div>
		
		<div class="col-md-6">
		   <label for="clave">Clave</label>
		   <input class="form-control" type="password" id="clave" name="clave" 
		   />
		   <span id="sclave"></span>
		</div>
		
	</div>
	
	
	
	
	<div class="row">
		<div class="col">
			<hr/>
		</div>
	</div>

	<div class="row justify-content-center mt-5">
		<div class="col-md-3 d-flex justify-content-center">
			   <button type="button" class="btn btn-danger w-100 small-width" 
			   id="entrar" name="entrar">ENTRAR</button>
		</div>
	</div>
</div>
</form>

</div> <!-- fin de container -->

<script type="text/javascript" src="js/login.js"></script>

  <!--  <form action="principal.php" method="POST">
        <h1>Iniciar Sesion</h1>
        <hr>
        <label>Cedula</label>
        <input type="text" name="cedula" placeholder="Cedula del Usuario">

        <label>Contraseña</label>
        <input type="text" name="clave" placeholder="Contraseña del Usuario">
        <hr>
        <button type="submit">Iniciar Sesion</button>
        <a href="registrarusuario.php">Crear Cuenta</a>
    </form> -->

   <!-- <div class="form-container">
        <div class="signup-container slide-up">
            <h2 class="form-title">Iniciar Sesion</h2>
            <form action="vista/principal.php" method="post">
                <div class="form-holder">
                    <input type="text" class="input" placeholder="CEDULA">
                    <input type="password" class="input" placeholder="CLAVE">
                </div>
                <button class="submit-btn">Entrar</button>
            </form>
        </div>

    </div> -->
</body>
</html>