<?php
class datos
{
    private $ip = "localhost";
    private $bd = "protofrutilara";
    private $usuario = "root";
    private $contrasena = "";


   
    protected function conecta(){
        try {
            $this->pdo = new PDO("mysql:host=".$this->ip.";dbname=".$this->bd, $this->usuario, $this->contrasena, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Manejo de errores
                PDO::ATTR_EMULATE_PREPARES => false, // Evitar emulación de consultas preparadas
            ]);
            $this->pdo->exec("SET NAMES utf8");
            return $this->pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage()); // Evita mostrar errores internos al usuario
        }
    }
    protected function cerrarConexion(){
        // Cerrar la conexión estableciendo la variable como null
        $this->pdo = null;
    }
}

class Datos2 {
    public static function conectarBitacora()
    {
        try {
            $pdo = new PDO('mysql:host=localhost;dbname=bitacora_frutilara;charset=utf8', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }
}
