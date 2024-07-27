<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Login | FrutiLara</title>
    <?php require_once("comunes/encabezado.php"); ?>
</head>
<body>
    <div class="container">
        <div class="login-box">
            <div class="header-img">
                <img src="img/logo.png" alt="">
            </div>
            <div class="header-text text-center h2 text-danger">
                <h1>Iniciar Sesión</h1>
            </div>
            <form method="post" action="" id="f">
                <input type="text" name="accion" id="accion" style="display:none"/>
                <div class="input-group">
                    <input type="text" class="input-field" id="cedula" name="cedula" required>
                    <label for="cedula">Cedula</label>
                    <span id="scedula">El formato debe ser númerico</span>
                </div>
                <div class="input-group">
                    <input type="password" class="input-field" id="clave" name="clave" required>
                    <label for="clave">Clave</label>
                    <span id="sclave">Solo letras y numeros entre 7 y 15 caracteres</span>
                </div>
                <div class="forgot-pass">
                    <a href="#">Olvidaste la Clave?</a>
                </div>
                <div class="input-group">
                    <div class="row justify-content-center mt-5">
                        <div class="col-md-6 d-flex justify-content-center">
                            <a href="?pagina=principal" class="btn btn-danger w-100 small-width">ENTRAR <i class="bx bx-log-in"></i></a>
                        </div>
                    </div>
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