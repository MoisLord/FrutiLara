<html>
<title>BITÁCORA DEL SISTEMA</title>
<?php require_once(__DIR__ . '/../comunes/encabezado.php'); ?>
<body>
    <?php require_once(__DIR__ . '/../comunes/menu.php'); ?>

    <div class="container mt-4">
        <h2 class="text-center text-success">REGISTROS DE BITÁCORA</h2>
        <hr class="border border-success border-2 opacity-50">

        <!-- Filtro por fechas (para buscar por fechas las sesiones ingresadas) -->
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
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody id="resultadoconsulta">
                    <?php if (!empty($entries)): // Valida que $entries exista y no esté vacía ?>
                    <?php foreach ($entries as $entry): ?>
                        <tr>
                            <td><?= htmlspecialchars($entry['id']) ?></td>
                            <td><?= htmlspecialchars($entry['usuario']) ?></td>
                            <td><?= htmlspecialchars($entry['modulo']) ?></td>
                            <td><?= htmlspecialchars($entry['accion']) ?></td>
                            <td><?= date('d/m/Y', strtotime($entry['fecha'])) ?></td>
                            <td><?= date('H:i', strtotime($entry['fecha'])) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No hay registros en la bitácora</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require_once(__DIR__ . '/../comunes/body.php'); ?>
</body>
</html>