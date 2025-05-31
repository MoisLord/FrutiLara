/**
 * DOCUMENT READY - Se ejecuta cuando el DOM está completamente cargado
 * Aquí se inicializan todos los eventos y funciones principales
 */
$(document).ready(function () {
  // Cargar bitácora al iniciar la página
  consultar();

  // Evento para buscar registros al escribir en el campo ID
  $("#id_bitacora").on("keyup", function () {
    var codigo = $(this).val();
    var encontro = false;
    
    // Recorre cada fila de la tabla de registros eliminados
    $("#consultaDelete tr").each(function () {
      // Compara el código ingresado con el ID de cada registro
      if (codigo == $(this).find("td:eq(0)").text()) {
        coloca($(this)); // Si encuentra coincidencia, llena el formulario
        encontro = true;
      }
    });
    
    // Si no encontró coincidencia, limpia los datos mostrados
    if (!encontro) {
      $("#datosbitacora").html("");
    }
  });

  // ================= VALIDACIONES DE FORMULARIO =================
  
  /**
   * Validación del campo ID_Bitacora al presionar teclas
   * Solo permite números y teclas de control (backspace)
   */
  $("#id_bitacora").on("keypress", function (e) {
    validarkeypress(/^[0-9\b]*$/, e);
  });

  /**
   * Validación del campo ID_Bitacora al soltar tecla
   * Verifica que tenga entre 1 y 10 dígitos numéricos
   * Si es válido y tiene al menos 1 carácter, hace consulta AJAX
   */
  $("#id_bitacora").on("keyup", function () {
    validarkeyup(
      /^[0-9]{1,10}$/,
      $(this),
      $("#sid_bitacora"),
      "El ID debe ser numérico con máximo 10 dígitos"
    );
    
    if ($("#id_bitacora").val().length > 0) {
      var datos = new FormData();
      datos.append("accion", "consultatr");
      datos.append("id_bitacora", $(this).val());
      enviaAjax(datos);
    }
  });

  // Validaciones similares para otros campos:
  $("#usuario").on("keypress", function (e) {
    validarkeypress(/^[A-Za-z0-9\b\s\u00f1\u00d1\u00E0-\u00FC-]*$/, e);
  });

  $("#modulo").on("keypress", function (e) {
    validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/, e);
  });

  $("#accion").on("keypress", function (e) {
    validarkeypress(/^[A-Za-z\b\s\u00f1\u00d1\u00E0-\u00FC]*$/, e);
  });

  // ================= MANEJADORES DE BOTONES =================
  
  /**
   * Botón INCLUIR - Agrega un nuevo registro a la bitácora
   * Primero valida el formulario, luego envía los datos por AJAX
   */
  $("#incluir").on("click", function () {
    if (validarenvio()) {
      var datos = new FormData();
      datos.append("accion", "incluir");
      datos.append("id_bitacora", $("#id_bitacora").val());
      datos.append("usuario", $("#usuario").val());
      datos.append("modulo", $("#modulo").val());
      datos.append("accion", $("#accion").val());
      datos.append("fecha", $("#fecha").val());
      enviaAjax(datos);
    }
  });

  /**
   * Botón MODIFICAR - Actualiza un registro existente
   * Valida el formulario antes de enviar
   */
  $("#modificar").on("click", function () {
    if (validarenvio()) {
      var datos = new FormData();
      // ... (similar al botón incluir pero con acción "modificar")
    }
  });

  /**
   * Botón ELIMINAR - Marca un registro como eliminado
   * Verifica que el ID sea válido antes de proceder
   */
  $("#eliminar").on("click", function () {
    if (validarkeyup(/^[0-9]{1,10}$/, $("#id_bitacora"), $("#sid_bitacora"), "El ID de la bitácora debe ser numérico con máximo 10 dígitos") == 0) {
      muestraMensaje("El ID de la bitácora debe ser numérico con máximo 10 dígitos");
    } else {
      var datos = new FormData();
      datos.append("accion", "eliminar");
      datos.append("id_bitacora", $("#id_bitacora").val());
      enviaAjax(datos);
    }
  });

  /**
   * Botón RESTAURAR - Recupera un registro eliminado
   * Similar a eliminar pero con acción contraria
   */
  $("#restaurar").on("click", function () {
    // ... (similar a eliminar pero con acción "restaurar")
  });

  /**
   * Botón CONSULTAR ELIMINADOS - Muestra registros eliminados en un modal
   */
  $("#consultadeDelete").on("click", function () {
    $("#modalBitacora").modal("show");
    var datos = new FormData();
    datos.append("accion", "consultaDelete");
    enviaAjax(datos);
  });
});

// ================= FUNCIONES PRINCIPALES =================

/**
 * CONSULTAR - Obtiene todos los registros activos de la bitácora
 * Llama a enviaAjax con acción "consultar"
 */
function consultar() {
  var datos = new FormData();
  datos.append("accion", "consultar");
  enviaAjax(datos);
}

/**
 * DESTRUYE DATATABLE - Elimina la instancia DataTable existente
 * Previene problemas al recargar la tabla
 */
function destruyeDT() {
  if ($.fn.dataTable.isDataTable("#tabla-bitacora")) {
    $("#tabla-bitacora").DataTable().destroy();
  }
}

/**
 * CREA DATATABLE - Inicializa la tabla con DataTables
 * Configura paginación, idioma, orden inicial, etc.
 */
function crearDT() {
  if (!$.fn.dataTable.isDataTable("#tabla-bitacora")) {
    $("#tabla-bitacora").DataTable({
      "language": { // Configuración de textos en español
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "No se encontraron registros",
        // ... más configuraciones de idioma
      },
      "autoWidth": false,   // No ajustar ancho automáticamente
      "order": [[4, "desc"]], // Ordenar por fecha descendente (columna 4)
      "responsive": true,   // Hacer tabla responsive
      "pageLength": 10      // Mostrar 10 registros por página
    });
  }
}

/**
 * VALIDAR ENVÍO - Valida todos los campos del formulario
 * Retorna true si todo es válido, false si hay errores
 */
function validarenvio() {
  // Valida campo ID (numérico, 1-10 dígitos)
  if (validarkeyup(/^[0-9]{1,10}$/, $("#id_bitacora"), $("#sid_bitacora"), "El ID debe ser numérico con máximo 10 dígitos") == 0) {
    muestraMensaje("El ID debe ser numérico con máximo 10 dígitos");
    return false;
  } 
  // Valida campo usuario (alfanumérico, 2-50 caracteres)
  else if (validarkeyup(/^[A-Za-z0-9\s\u00f1\u00d1\u00E0-\u00FC-]{2,50}$/, $("#usuario"), $("#susuario"), "El usuario debe ser alfanumérico y tener entre 2 y 50 caracteres") == 0) {
    muestraMensaje("Usuario inválido. Debe ser alfanumérico y tener entre 2 y 50 caracteres.");
    return false;
  }
  // ... validaciones similares para otros campos
  
  return true; // Si pasa todas las validaciones
}

/**
 * MUESTRA MENSAJE - Muestra un mensaje en modal y lo oculta después de 2 segundos
 * @param {string} mensaje - Texto a mostrar
 */
function muestraMensaje(mensaje) {
  $("#contenidodemodal").html(mensaje);
  $("#mostrarmodal").modal("show");
  setTimeout(function () {
    $("#mostrarmodal").modal("hide");
  }, 2000);
}

/**
 * VALIDAR KEYPRESS - Valida teclas mientras se presionan
 * @param {RegExp} er - Expresión regular para validar
 * @param {Event} e - Evento de teclado
 */
function validarkeypress(er, e) {
  key = e.keyCode;
  tecla = String.fromCharCode(key);
  a = er.test(tecla);
  if (!a) {
    e.preventDefault(); // Cancela la tecla si no cumple
  }
}

/**
 * VALIDAR KEYUP - Valida campo después de soltar tecla
 * @param {RegExp} er - Expresión regular
 * @param {jQuery} etiqueta - Elemento input a validar
 * @param {jQuery} etiquetamensaje - Elemento para mostrar error
 * @param {string} mensaje - Mensaje de error
 * @returns {number} 1 si es válido, 0 si no
 */
function validarkeyup(er, etiqueta, etiquetamensaje, mensaje) {
  a = er.test(etiqueta.val());
  if (a) {
    etiquetamensaje.text(""); // Limpia error si es válido
    return 1;
  } else {
    etiquetamensaje.text(mensaje); // Muestra error
    return 0;
  }
}

/**
 * COLOCA - Llena el formulario con datos de una fila de tabla
 * @param {jQuery} linea - Fila de tabla (tr) con los datos
 */
function coloca(linea) {
  $("#id_bitacora").val($(linea).find("td:eq(0)").text()); // ID
  $("#usuario").val($(linea).find("td:eq(1)").text());    // Usuario
  $("#modulo").val($(linea).find("td:eq(2)").text());     // Módulo
  $("#accion").val($(linea).find("td:eq(3)").text());     // Acción
  $("#fecha").val($(linea).find("td:eq(4)").text());      // Fecha
}

/**
 * ENVIA AJAX - Maneja todas las comunicaciones con el servidor
 * @param {FormData} datos - Datos a enviar al servidor
 */
function enviaAjax(datos) {
  $.ajax({
    async: true,
    url: "", // Mismo archivo (bitacora.php)
    type: "POST",
    contentType: false,
    data: datos,
    processData: false,
    cache: false,
    timeout: 10000, // 10 segundos máximo de espera
    
    // Manejo de respuesta exitosa
    success: function (respuesta) {
      try {
        var lee = JSON.parse(respuesta);
        
        // Diferentes acciones según respuesta
        if (lee.resultado == "consultar") {
          destruyeDT(); // Destruye tabla existente
          $("#resultadoconsulta").html(lee.mensaje); // Inserta nuevos datos
          crearDT(); // Vuelve a crear DataTable
          $("#modalBitacora").modal("show"); // Muestra modal
        } 
        // ... otros casos (modificar, eliminar, etc.)
        
      } catch (e) {
        alert("Error en JSON " + e.name);
      }
    },
    
    // Manejo de errores
    error: function (request, status, err) {
      if (status == "timeout") {
        muestraMensaje("Servidor ocupado...");
      } else {
        muestraMensaje("ERROR: " + request + status + err);
      }
    }
  });
}

/**
 * LIMPIA - Vacía todos los campos del formulario
 */
function limpia() {
  $("#id_bitacora").val("");
  $("#usuario").val("");
  $("#modulo").val("");
  $("#accion").val("");
  $("#fecha").val("");
}