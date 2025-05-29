$(document).ready(function() {
    // Cargar bitácora al iniciar
    cargarBitacora();

    // Manejar filtro
    $('#filtro-bitacora').submit(function(e) {
        e.preventDefault();
        cargarBitacora();
    });

    // Limpiar filtros
    $('#limpiar-filtros').click(function() {
        $('#fecha_inicio').val('');
        $('#fecha_fin').val('');
        cargarBitacora();
    });

    function cargarBitacora() {
        $.ajax({
            url: '?pagina=bitacora',
            type: 'POST',
            data: {
                accion: 'listarBitacora',
                fecha_inicio: $('#fecha_inicio').val(),
                fecha_fin: $('#fecha_fin').val()
            },
            dataType: 'json',
            success: function(response) {
                if (response.resultado === 'exito') {
                    $('#tabla-bitacora tbody').html(response.mensaje);
                    inicializarDataTable();
                } else {
                    $('#tabla-bitacora tbody').html(
                        '<tr><td colspan="6" class="text-center">'+response.mensaje+'</td></tr>'
                    );
                }
            },
            error: function(xhr, status, error) {
                console.error("Error al cargar bitácora:", error);
                $('#tabla-bitacora tbody').html(
                    '<tr><td colspan="6" class="text-center">Error al cargar los datos</td></tr>'
                );
            }
        });
    }

    function inicializarDataTable() {
        if ($.fn.DataTable.isDataTable("#tabla-bitacora")) {
            $("#tabla-bitacora").DataTable().destroy();
        }
        
        $("#tabla-bitacora").DataTable({
            language: {
                lengthMenu: "Mostrar _MENU_ por página",
                zeroRecords: "No hay registros",
                info: "Mostrando página _PAGE_ de _PAGES_",
                infoEmpty: "No hay registros disponibles",
                infoFiltered: "(filtrado de _MAX_ registros totales)",
                search: "Buscar:",
                paginate: {
                    first: "Primera",
                    last: "Última",
                    next: "Siguiente",
                    previous: "Anterior"
                }
            },
            order: [[4, "desc"]]
        });
    }
});