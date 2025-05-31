// Metodo de que genere una ventana para acceder al PDF del Manual

// Espera a que el DOM esté completamente cargado
document.addEventListener("DOMContentLoaded", function() {
    const manualLink = document.getElementById('manual');
    if (manualLink) {
        manualLink.addEventListener('click', function(event) {
            event.preventDefault();
            const pdfUrl = 'documento/Manual de Uso del Sistema Para Frutilara.pdf';
            window.open(pdfUrl, '_blank');
        });
    }
});

document.addEventListener("DOMContentLoaded", () => {
    // Obtén el elemento con ID 'manual'
    const manualLink = document.getElementById('manual');
    
    // Verificar si el elemento existe antes de aplicar estilos
    if (manualLink) {
        manualLink.style.cursor = "pointer";
    } else {
        console.warn("El elemento con ID 'manual' no se encontró.");
    }
});