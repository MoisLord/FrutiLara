<html>
<title>BITÁCORA DEL SISTEMA</title>
<?php require_once(__DIR__ . '/../comunes/encabezado.php'); ?>
<body>
    <?php require_once(__DIR__ . '/../comunes/menu.php'); ?>

    <div class="container mt-4">
        <h2 class="text-center text-success">REGISTROS DE BITÁCORA</h2>
        <hr class="border border-success border-2 opacity-50">

        <!-- Filtro por fechas (opcional) -->
        <form method="post" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label>Fecha inicio:</label>
                    <input type="date" name="fecha_inicio" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Fecha fin:</label>
                    <input type="date" name="fecha_fin" class="form-control">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-success">Filtrar</button>
                </div>
            </div>
        </form>

        <!-- Tabla de registros -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="bg-success text-white">
                    <tr>
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Módulo</th>
                        <th>Acción</th>
                        <th>Fecha/Hora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($entries as $entry): ?>
                        <tr>
                            <td><?= htmlspecialchars($entry['id']) ?></td>
                            <td><?= htmlspecialchars($entry['usuario']) ?></td>
                            <td><?= htmlspecialchars($entry['modulo']) ?></td>
                            <td><?= htmlspecialchars($entry['accion']) ?></td>
                            <td><?= date('d/m/Y H:i', strtotime($entry['fecha'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require_once(__DIR__ . '/../comunes/body.php'); ?>
</body>
</html>