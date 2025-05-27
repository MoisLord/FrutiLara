<?php
class verifica {
    function leesesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        return $_SESSION['nivel'] ?? ""; // Retorna el nivel o cadena vacía
    }
    
    function destruyesesion() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset(); // Limpia todas las variables de sesión
        session_destroy();
        header("Location: index.php?pagina=login");
        exit;
    }
}
?>