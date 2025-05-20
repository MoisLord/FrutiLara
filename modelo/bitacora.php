<?php
require_once 'BaseModel.php';

class Bitacora extends ModeloBase {
    private $table = 'bitacora';

    public function registrar($usuario_id, $accion) {
        $sql = "INSERT INTO {$this->table} (usuario_id, accion) VALUES (:uid, :acc)";
        $stmt = $this->bd->prepare($sql);
        $stmt->bindValue(':uid', htmlspecialchars(strip_tags($usuario_id)), PDO::PARAM_STR);
        $stmt->bindValue(':acc', htmlspecialchars(strip_tags($accion)),   PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function listar() {
        $sql = "SELECT * FROM {$this->table} ORDER BY fecha DESC";
        return $this->bd->query($sql)->fetchAll();
    }
}