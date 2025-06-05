// Inicializar el carrusel con deslizamiento automático.
$('#carouselExample').carousel({
    interval: 10000, // Desliza cada 5 segundos
    pause: false // No pausar el carrusel al pasar el mouse
  });

  document.addEventListener('DOMContentLoaded', function() {
  // 1. Efecto de desplazamiento suave para enlaces
  const smoothScrollLinks = document.querySelectorAll('a[href^="#"]');
  smoothScrollLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const targetId = link.getAttribute('href');
      if (targetId === '#') return;
      const targetElement = document.querySelector(targetId);
      if (targetElement) {
        targetElement.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // 2. Animación de aparición para las secciones (Scroll Animation)
  const animateOnScroll = () => {
    const sections = document.querySelectorAll('section');
    sections.forEach(section => {
      const sectionTop = section.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;
      if (sectionTop < windowHeight * 0.75) {
        section.style.opacity = '1';
        section.style.transform = 'translateY(0)';
      }
    });
  };

  // Configuración inicial para animaciones
  document.querySelectorAll('section').forEach(section => {
    section.style.opacity = '0';
    section.style.transform = 'translateY(20px)';
    section.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
  });

  window.addEventListener('scroll', animateOnScroll);
  animateOnScroll(); // Ejecutar al cargar

  // 3. Ajustar altura de imágenes en la sección de contenido
  const adjustImageHeights = () => {
    const imageContainers = document.querySelectorAll('.position-relative.h-75');
    imageContainers.forEach(container => {
      const textContent = container.closest('.row').querySelector('.col-lg-5');
      if (textContent) {
        container.style.height = `${textContent.offsetHeight}px`;
      }
    });
  };

  window.addEventListener('resize', adjustImageHeights);
  adjustImageHeights(); // Ejecutar al cargar
});