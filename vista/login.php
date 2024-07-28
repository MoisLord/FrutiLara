<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Login | FrutiLara</title>
</head>
<body>
    <?php require_once("comunes/encabezado.php"); ?>
    <div class="container">
        <div class="login-box">
            <div class="header-img">
                <img src="img/logo.png" alt="">
            </div>
            <div class="header-text">
                <p>Iniciar Sesión</p>
            </div>
            <form method="post" action="" id="f">
                <input type="text" name="accion" id="accion" style="display:none"/>
                <div class="input-group">
                    <input type="text" class="input-field" id="cedula" name="cedula" required>
                    <label for="cedula">Cedula</label>
                </div>
                <div class="input-group">
                    <input type="password" class="input-field" id="clave" name="clave" required>
                    <label for="clave">Clave</label>
                </div>
                <div class="forgot-pass">
                    <a href="#">¿Olvidaste la clave?</a>
                </div>
                <div class="input-group">
                    <button href="?pagina=principal" class="input-submit">Entrar <i class="bx bx-log-in"></i></button>
                </div>
            </form>
        </div>
    </div>
    <?php require_once("comunes/modal.php"); ?>
    <div id="mensajes" style="display:none">
        <?php
            if(!empty($mensaje)){
                echo $mensaje;
            }
        ?>
    </div>
    <script type="text/javascript" src="js/login.js"></script>
</body>
</html>