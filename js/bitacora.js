$(document).ready(function() {
    // Cargar la bitácora al iniciar
    cargarBitacora();

    // Manejar el filtro por fechas
    $('#filtro-bitacora').submit(function(e) {
        e.preventDefault();
        cargarBitacora();
    });

    // Función para cargar los registros de bitácora
    function cargarBitacora() {
        var datos = new FormData();
        datos.append('accion', 'listarBitacora');
        
        // Agregar fechas de filtro si existen
        if($('#fecha_inicio').val()) {
            datos.append('fecha_inicio', $('#fecha_inicio').val());
        }
        if($('#fecha_fin').val()) {
            datos.append('fecha_fin', $('#fecha_fin').val());
        }

        enviaAjaxBitacora(datos, function(respuesta) {
            if(respuesta.resultado === 'exito') {
                $('#tabla-bitacora tbody').html(respuesta.mensaje);
                inicializarDataTable();
            } else {
                $('#tabla-bitacora tbody').html('<tr><td colspan="6" class="text-center">'+respuesta.mensaje+'</td></tr>');
            }
        });
    }

    // Función para cargar solo acciones de sesión
    function cargarAccionesSesion() {
        var datos = new FormData();
        datos.append('accion', 'mostrarAccionesSesion');
        
        enviaAjaxBitacora(datos, function(respuesta) {
            if(respuesta.resultado === 'exito') {
                $('#tabla-sesiones tbody').html(respuesta.mensaje);
            } else {
                $('#tabla-sesiones tbody').html('<tr><td colspan="6" class="text-center">'+respuesta.mensaje+'</td></tr>');
            }
        });
    }

    // Función AJAX específica para bitácora
    function enviaAjaxBitacora(datos, callback) {
        $.ajax({
            async: true,
            url: 'controladores/bitacora.php', // Ajusta esta ruta según tu estructura
            type: 'POST',
            contentType: false,
            data: datos,
            processData: false,
            cache: false,
            timeout: 10000,
            success: function(respuesta) {
                try {
                    var lee = JSON.parse(respuesta);
                    callback(lee);
                } catch(e) {
                    console.error("Error en JSON", e);
                    callback({
                        resultado: 'error',
                        mensaje: 'Error al procesar los datos'
                    });
                }
            },
            error: function(request, status, err) {
                console.error("Error AJAX", status, err);
                callback({
                    resultado: 'error',
                    mensaje: 'Error de conexión con el servidor'
                });
            }
        });
    }

    // Inicializar DataTable
    function inicializarDataTable() {
        if ($.fn.DataTable.isDataTable("#tabla-bitacora")) {
            $("#tabla-bitacora").DataTable().destroy();
        }
        
        $("#tabla-bitacora").DataTable({
            language: {
                lengthMenu: "Mostrar _MENU_ por página",
                zeroRecords: "No se encontraron registros",
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
            order: [[4, "desc"]], // Ordenar por fecha descendente
            autoWidth: false
        });
    }

    // Registrar acciones automáticamente (inicio/cierre de sesión)
    function registrarAccion(accion, modulo = 'Autenticación') {
        var datos = new FormData();
        datos.append('accion', 'registrarAccion');
        datos.append('tipo_accion', accion);
        datos.append('modulo', modulo);
        
        enviaAjaxBitacora(datos, function(respuesta) {
            if(respuesta.resultado !== 'exito') {
                console.error("Error al registrar acción:", respuesta.mensaje);
            }
        });
    }

    // Ejemplo: Registrar inicio de sesión (debes llamar esto cuando ocurra el login)
    // registrarAccion('Inicio de sesión');
    
    // Ejemplo: Registrar cierre de sesión (debes llamar esto cuando ocurra el logout)
    // registrarAccion('Cierre de sesión');
});