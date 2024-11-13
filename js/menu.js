// Metodo de que genere una ventana para acceder al PDF del Manual

// Espera a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {
    // Obtén el elemento con ID 'manual'
    const manualLink = document.getElementById('manual');

    // Agrega un evento click al enlace
    manualLink.addEventListener('click', function(event) {
        // Prevenir el comportamiento por defecto del enlace
        event.preventDefault();

        // URL del PDF que deseas abrir
        const pdfUrl = 'documento/Manual de Uso del Sistema Para Frutilara.pdf'; //ruta al documento PDF

        // Abre el PDF en una nueva ventana
        window.open(pdfUrl, '_blank');
    });
    
    // Agregar el estilo cursor: pointer
    manualLink.style.cursor = "pointer";
});