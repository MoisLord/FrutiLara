

<?php
// Evita warnings si $entries no está definido
if (!isset($entries) || !is_array($entries)) {
    $entries = [];
}
?>
<?php require_once(__DIR__ . '/../comunes/encabezado.php'); ?>
<?php require_once(__DIR__ . '/../comunes/menu.php'); ?>

<div class="container mt-5">
    <h2 class="text-success text-center">Bitácora</h2>
    <hr class="border border-success border-2 opacity-75" />
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
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
            <tbody>
                <?php foreach ($entries as $e): ?>
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
    </div>
</div>


<?php require_once(__DIR__ . '/../comunes/body.php'); ?>