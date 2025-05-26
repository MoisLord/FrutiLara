<html>
<title>BITÁCORA DE SESIONES</title>
<?php require_once('comunes/menu.php'); ?>
<?php

 require_once(__DIR__ . '/../comunes/encabezado.php');
 require_once(__DIR__ . '/../modelo/session.php');
 if (!isset($entries) || !is_array($entries)) $entries = [];
?>
<body>
<body>

<div class="container mt-5">
    <h2 class="text-success text-center">Bitácora</h2>
    <hr class="border border-success border-2 opacity-75" />
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <thead class="bg-success text-white">
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Modulo</th>
                    <th>Acción</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>
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

<?php require_once(__DIR__ . '/../comunes/body.php'); ?>
</body>
</html>