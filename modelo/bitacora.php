<?php
require_once 'modelobase.php';

class Bitacora extends ModeloBase
{
    private $pdo;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
        $this->pdo = $pdo;
    }

    /**
     * Registra una acción en la bitácora
     * @param string $usuario
     * @param string $modulo
     * @param string $accion
     * @return bool
     */
    public function registrar($usuario, $modulo, $accion)
    {
        $sql = "INSERT INTO bitacora (usuario, modulo, accion, fecha) VALUES (?, ?, ?, NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$usuario, $modulo, $accion]);
    }

    /**
     * Lista todos los registros de la bitácora
     * @return array
     */
    public function listar()
    {
        $sql = "SELECT id, usuario, modulo, accion, fecha FROM bitacora ORDER BY fecha DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Filtra registros por rango de fechas
     * @param string $fechaInicio
     * @param string $fechaFin
     * @return array
     */
    public function filtrarPorFecha($fechaInicio, $fechaFin)
    {
        $sql = "SELECT * FROM bitacora WHERE fecha BETWEEN ? AND ? ORDER BY fecha DESC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$fechaInicio, $fechaFin]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>