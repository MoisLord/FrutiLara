<?php
class datos{
	private $ip = "localhost";
    private $bd = "protofrutilara";
    private $usuario = "root";
    private $contrasena = "";
    
    
    
    protected function conecta(){
        //tira de conexión a la base de datos
        //varia segun el gestor, en este caso es mysql
        $pdo = new PDO("mysql:host=".$this->ip.";dbname=".$this->bd."",$this->usuario,$this->contrasena);
        
        $pdo->exec("set names utf8");
        return $pdo;
    }
}
?>