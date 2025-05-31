/**
 * Funcionalidades de la Bitácora:
 * 1. Carga y muestra registros en DataTable
 * 2. Filtrado por fechas
 * 3. Operaciones CRUD completas
 * 4. Validación de formularios
 * 5. Interacción con la tabla
 */

$(document).ready(function () {
    // Inicialización - Carga los registros al cargar la página
    cargarBitacora();

    // Evento para filtrar registros por fecha
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

    // Evento para seleccionar registros de la tabla
    $('#tabla-bitacora tbody').on('click', 'tr', function() {
        $(this).toggleClass('table-primary');
        // Puedes agregar más lógica de selección aquí si es necesario
    });
});

/**
 * CARGAR BITÁCORA - Carga los registros con opción de filtrado
 */
function cargarBitacora() {
    mostrarCargando();
    
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
                actualizarTabla(response.datos);
            } else {
                mostrarError(response.mensaje);
            }
        },
        error: function(xhr, status, error) {
            mostrarError("Error al cargar bitácora: " + error);
        }
    });
}

/**
 * ACTUALIZAR TABLA - Actualiza la tabla con nuevos datos
 * @param {Array} datos - Array de registros de bitácora
 */
function actualizarTabla(datos) {
    // Destruye DataTable si ya existe
    if ($.fn.DataTable.isDataTable("#tabla-bitacora")) {
        $("#tabla-bitacora").DataTable().destroy();
    }

    // Limpia y llena el cuerpo de la tabla
    let tbody = $('#tabla-bitacora tbody');
    tbody.empty();

    if (datos.length === 0) {
        tbody.append('<tr><td colspan="6" class="text-center">No hay registros</td></tr>');
    } else {
        datos.forEach(function(registro) {
            let fila = `
                <tr>
                    <td>${registro.id_bitacora}</td>
                    <td>${registro.usuario}</td>
                    <td>${registro.modulo}</td>
                    <td>${registro.accion}</td>
                    <td>${formatFecha(registro.fecha)}</td>
                    <td>${formatHora(registro.fecha)}</td>
                </tr>`;
            tbody.append(fila);
        });
    }

    // Inicializa DataTable
    inicializarDataTable();
}

/**
 * INICIALIZAR DATATABLE - Configura la tabla con DataTables
 */
function inicializarDataTable() {
    $("#tabla-bitacora").DataTable({
        language: {
            lengthMenu: "Mostrar _MENU_ registros por página",
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
        order: [[4, "desc"]], // Ordena por fecha descendente
        responsive: true,
        autoWidth: false,
        pageLength: 10
    });
}

/**
 * FORMATO DE FECHA - Formatea fecha para mostrar
 * @param {string} fechaStr - Fecha en formato ISO
 * @return {string} Fecha formateada
 */
function formatFecha(fechaStr) {
    if (!fechaStr) return '';
    let fecha = new Date(fechaStr);
    return fecha.toLocaleDateString('es-ES');
}

/**
 * FORMATO DE HORA - Formatea hora para mostrar
 * @param {string} fechaStr - Fecha en formato ISO
 * @return {string} Hora formateada
 */
function formatHora(fechaStr) {
    if (!fechaStr) return '';
    let fecha = new Date(fechaStr);
    return fecha.toLocaleTimeString('es-ES');
}

/**
 * MOSTRAR CARGANDO - Muestra estado de carga
 */
function mostrarCargando() {
    let tbody = $('#tabla-bitacora tbody');
    tbody.html('<tr><td colspan="6" class="text-center"><div class="spinner-border text-success" role="status"><span class="visually-hidden">Cargando...</span></div></td></tr>');
}

/**
 * MOSTRAR ERROR - Muestra mensaje de error
 * @param {string} mensaje - Mensaje de error a mostrar
 */
function mostrarError(mensaje) {
    let tbody = $('#tabla-bitacora tbody');
    tbody.html(`<tr><td colspan="6" class="text-center text-danger">${mensaje}</td></tr>`);
}

/**
 * REGISTRAR ACCIÓN - Función para registrar acciones en la bitácora
 * @param {string} modulo - Módulo donde ocurre la acción
 * @param {string} accion - Descripción de la acción
 */
function registrarAccion(modulo, accion) {
    $.ajax({
        url: '?pagina=bitacora',
        type: 'POST',
        data: {
            accion: 'registrar',
            modulo: modulo,
            accion: accion
        },
        dataType: 'json',
        success: function(response) {
            if (response.resultado !== 'exito') {
                console.error("Error al registrar en bitácora:", response.mensaje);
            }
        },
        error: function(xhr, status, error) {
            console.error("Error al registrar en bitácora:", error);
        }
    });
}

// Ejemplo de uso para registrar acciones desde otros módulos:
// registrarAccion('Usuarios', 'Creación de nuevo usuario');