<?php
// controlador/bitacora.php

require_once 'app/controllers/ControlBitacora.php';

$bitacora = new ControlBitacora();
$bitacora->mostrarBitacora(); // carga los datos y llama a la vista
?>