<?php
abstract class ModeloBase {
    protected $bd;
    public function __construct(PDO $pdo) {
        $this->bd = $pdo;
    }
}