// Método para generar una ventana para acceder al PDF del Manual
// y funcionalidad del Sidebar

document.addEventListener("DOMContentLoaded", function() {
    // 1. Función original del manual PDF
    const manualLink = document.getElementById('manual');
    
    if (manualLink) {
        // Estilo del cursor
        manualLink.style.cursor = "pointer";
        
        // Evento para abrir PDF
        manualLink.addEventListener('click', function(event) {
            event.preventDefault();
            window.open('documento/Manual de Uso del Sistema Para Frutilara.pdf', '_blank');
        });
    } else {
        console.warn("El elemento con ID 'manual' no se encontró.");
    }

    // 2. Funcionalidad del Sidebar
    // Activar enlace actual en el sidebar
    const currentPage = window.location.pathname.split('/').pop() || 'index.php';
    const sidebarLinks = document.querySelectorAll('.sidebar-item a');
    
    sidebarLinks.forEach(link => {
        const linkPage = link.getAttribute('href');
        
        // Resaltar enlace activo
        if (currentPage === linkPage) {
            link.parentElement.style.backgroundColor = 'rgba(0,0,0,0.2)';
        }
        
        // Añadir hover effect dinámicamente
        link.parentElement.addEventListener('mouseenter', function() {
            this.style.backgroundColor = 'rgba(0,0,0,0.1)';
        });
        
        link.parentElement.addEventListener('mouseleave', function() {
            if (currentPage !== linkPage) {
                this.style.backgroundColor = 'transparent';
            }
        });
    });

    // 3. Responsive del Sidebar (opcional)
    const sidebar = document.querySelector('.sidebar');
    const sidebarToggle = document.createElement('div');
    sidebarToggle.className = 'sidebar-toggle';
    sidebarToggle.innerHTML = '<i class="ri-menu-line"></i>';
    document.body.appendChild(sidebarToggle);
    
    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
    });
    
    // Cerrar sidebar al hacer clic fuera (opcional)
    document.addEventListener('click', function(event) {
        if (!sidebar.contains(event.target) && !sidebarToggle.contains(event.target)) {
            sidebar.classList.add('collapsed');
        }
    });
});

// Función para manejar el tema oscuro/claro (opcional)
function setupThemeToggle() {
    const themeButton = document.getElementById('theme-button');
    if (themeButton) {
        themeButton.addEventListener('click', function() {
            document.body.classList.toggle('dark-theme');
            localStorage.setItem('theme', document.body.classList.contains('dark-theme') ? 'dark' : 'light');
        });
        
        // Cargar tema guardado
        if (localStorage.getItem('theme') === 'dark') {
            document.body.classList.add('dark-theme');
        }
    }
}

// Inicializar tema al cargar
document.addEventListener('DOMContentLoaded', setupThemeToggle);