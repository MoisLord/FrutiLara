<html>
<title>BITÁCORA DE SESIONES</title>
<?php

 require_once(__DIR__ . '/../comunes/encabezado.php');
 require_once(__DIR__ . '/../modelo/session.php');
 if (!isset($entries) || !is_array($entries)) $entries = [];
?>
<body>
<div class="col-10 mx-auto p-4">
    <div class="container">
        <h5 class="modal-title text-center text-success">BITÁCORA DE SESIONES</h5>
        <hr class="border border-success border-3 opacity-65">
        <div class="table-responsive mt-3">
            <table class="table table-striped table-hover border border-success" id="tablabitacora">
                <thead class="bg-success text-white">
                    <tr>
                        <th>#</th>
                        <th>Usuario</th>
                        <th>Módulo</th>
                        <th>Acción</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody id="resultadoconsulta">
                    <?php foreach ($entries as $i => $e): ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= htmlspecialchars($e['usuario']) ?></td>
                            <td><?= htmlspecialchars($e['modulo']) ?></td>
                            <td><?= htmlspecialchars($e['accion']) ?></td>
                            <td><?= date('Y-m-d', strtotime($e['fecha'])) ?></td>
                            <td><?= date('H:i:s', strtotime($e['fecha'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php require_once(__DIR__ . '/../comunes/body.php'); ?>
</body>
</html>