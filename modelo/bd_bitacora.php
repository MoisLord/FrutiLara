<?php
class bd_bitacora
{
    private $ip  = 'localhost';
    private $bd = 'bitacora_frutilara';
    private $usuario = 'root';
    private $contrasena = "fuck24";
    private $charset = 'utf8mb4';
    public  $pdo;

    public function __construct()
    {
        $dsn = "mysql:host={$this->ip};dbname={$this->bd};charset={$this->charset}";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, $this->usuario, $this->contrasena, $opt);
    }
}
