<?php
// controlador/bitacora.php

require_once 'controlador/ControlBitacora.php';

$bitacora = new ControlBitacora();
$bitacora->mostrarBitacora(); // carga los datos y llama a la vista
?>