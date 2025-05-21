<?php
// Verificamos si hay datos disponibles
if (!isset($entries) || !is_array($entries)) {
    $entries = [];
}
?>

<link rel="stylesheet" href="/public/css/bitacora.css"> <!-- Asegúrate de tener estilos CSS apropiados -->

<h2>Bitácora</h2>

<table class="table table-striped table-bordered">
    <thead style="background-color: #78c879; color: white;">
        <tr>
            <th>#</th>
            <th>Usuario</th>
            <th>Módulo</th>
            <th>Acción</th>
            <th>Fecha</th>
            <th>Hora</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($entries as $index => $e): ?>
            <tr>
                <td><?= htmlspecialchars($e['id']) ?></td>
                <td><?= htmlspecialchars($e['usuario']) ?></td>
                <td><?= htmlspecialchars($e['modulo']) ?></td>
                <td><?= htmlspecialchars($e['accion']) ?></td>
                <td><?= date('Y-m-d', strtotime($e['fecha'])) ?></td>
                <td><?= date('H:i:s', strtotime($e['fecha'])) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>