<html>
<?php require_once("comunes/encabezado.php"); ?>
<link href="css/login.css" rel="stylesheet">
<body>
    <form action="principal.php" method="POST">
        <h1>Iniciar Sesion</h1>
        <hr>
        <label>Cedula</label>
        <input type="text" name="cedula" placeholder="Cedula del Usuario">

        <label>Contraseña</label>
        <input type="text" name="clave" placeholder="Contraseña del Usuario">
        <hr>
        <button type="submit">Iniciar Sesion</button>
        <a href="registrarusuario.php">Crear Cuenta</a>
    </form>

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