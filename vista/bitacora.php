<?php
require_once(__DIR__.'/../comunes/encabezado.php');
require_once(__DIR__.'/../modelo/session.php');
?>
<title>BITÁCORA DEL SISTEMA</title>

<body>
    <!--Aqui coloque el Contenedor del Texto del Modulo Marca-->
    <div class="container text-center h2 text-success">
    </div>
    <div class="container mt-4">
        <h2 class="text-center text-success">BITÁCORA</h2>
        <hr class="border border-success border-2 opacity-50">

        <!-- Filtro por fechas -->
        <form id="filtro-bitacora" class="mb-4">
            <div class="row">
                <div class="col-md-4">
                    <label>Fecha inicio:</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control">
                </div>
                <div class="col-md-4">
                    <label>Fecha fin:</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" class="form-control">
                </div>
                <div class="col-md-4 d-flex align-items-end">
                    <button type="submit" class="btn btn-success">Filtrar</button>
                    <button type="button" id="limpiar-filtros" class="btn btn-secondary ms-2">Limpiar</button>
                </div>
            </div>
        </form>
        <hr class="border border-success border-2 opacity-50">

        <!-- Tabla de registros -->
        <div class="table-responsive">
            <table id="tabla-bitacora" class="table table-striped table-hover">
                <thead class="bg-success text-white">
                    <tr>
                        <th>id bitacora</th>
                        <th>Usuario</th>
                        <th>Módulo</th>
                        <th>Acción</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Los datos se cargarán via AJAX -->
                </tbody>
            </table>
        </div>
    </div>

    <?php require_once(__DIR__ . '/../comunes/body.php'); ?>
    <script src="../js/bitacora.js"></script>
</body>
</html>