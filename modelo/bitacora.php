<?php
require_once 'modelobase.php';

class Bitacora extends ModeloBase {
    private $pdo;

    public function __construct() {
        $this->pdo = Datos2::conectarBitacora(); // Conecta a la BD secundaria
    }

    public function listar() {
        $sql = "SELECT id, usuario, modulo, accion, fecha FROM bitacora ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrar($usuario, $modulo, $accion) {
        $sql = "INSERT INTO bitacora (usuario, modulo, accion, fecha) VALUES (?, ?, ?, NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$usuario, $modulo, $accion]);
    }
}

?>