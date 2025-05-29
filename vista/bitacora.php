<?php
require_once(__DIR__.'/../modelo/bitacora.php');
$bitacora = new bitacora();
$resultado = $bitacora->mostrarAccionesSesion();
?>
<html>
<?php require_once("comunes/encabezado.php"); ?>
<?php require_once("./modelo/session.php"); ?>
<title>BITÁCORA DEL SISTEMA</title>

<body>
    <?php require_once("comunes/menu.php"); ?>

    <div class="container mt-4">
        <h2 class="text-center text-success">REGISTROS DE BITÁCORA</h2>
        <hr class="border border-success border-2 opacity-50">

        <!-- Filtro por fechas -->
        <form method="post" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label>Fecha inicio:</label>
                    <input type="date" name="fecha_inicio" class="form-control" 
                           value="<?= $_POST['fecha_inicio'] ?? date('Y-m-01') ?>">
                </div>
                <div class="col-md-4">
                    <label>Fecha fin:</label>
                    <input type="date" name="fecha_fin" class="form-control" 
                           value="<?= $_POST['fecha_fin'] ?? date('Y-m-t') ?>">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-success">Filtrar</button>
                    <a href="?pagina=bitacora" class="btn btn-secondary ms-2">Limpiar</a>
                </div>
            </div>
        </form>

        <?php
        require_once(__DIR__.'/../modelo/bitacora.php');
        $bitacora = new bitacora();
        $resultado = $bitacora->listarBitacora();
        ?>

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
                <tbody>
                    <?php if (!empty($entries)): ?>
                        <?php foreach ($entries as $entry): ?>
                            <tr>
                                <td><?= htmlspecialchars($entry['id']) ?></td>
                                <td><?= htmlspecialchars($entry['usuario']) ?></td>
                                <td><?= htmlspecialchars($entry['modulo']) ?></td>
                                <td><?= htmlspecialchars($entry['accion']) ?></td>
                                <td><?= date('d/m/Y', strtotime($entry['fecha'])) ?></td>
                                <td><?= date('H:i:s', strtotime($entry['fecha'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No hay registros en la bitácora</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php require_once(__DIR__ . '/../comunes/body.php'); ?>
</body>
</html>