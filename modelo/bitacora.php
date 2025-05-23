<?php
require_once 'modelobase.php';


class Bitacora extends ModeloBase {
    private $pdo;

    public function __construct($pdo) {
        parent::__construct($pdo);
        $this->pdo = $pdo;
    }

    public function listar() {
        $sql = "SELECT id, usuario, modulo, accion, fecha FROM bitacora ORDER BY id DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function registrar($usuario, $modulo, $accion) {
        $sql = "INSERT INTO bitacora (usuario, modulo, accion, fecha) VALUES (usuario, modulo, accion, fecha, NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$usuario, $modulo, $accion]);
    }
}

?>