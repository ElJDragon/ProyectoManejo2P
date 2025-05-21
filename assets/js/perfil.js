//  actualizado para el botón de Cambiar Contraseña
document.addEventListener('DOMContentLoaded', function() {

  // Botón de Cambiar Contraseña - ACTUALIZADO
  const btnCambiarPass = document.querySelector('button:last-of-type');
  btnCambiarPass.addEventListener('click', function() {
    // Redirección al formulario de cambio de contraseña
    window.location.href = 'usuarios/editar.html';
  });

  // Opcional: Añadir efectos hover a los botones
  const botones = document.querySelectorAll('button');
  botones.forEach(boton => {
    boton.addEventListener('mouseenter', function() {
      this.style.transform = 'scale(1.05)';
      this.style.transition = 'transform 0.2s ease';
    });
    
    boton.addEventListener('mouseleave', function() {
      this.style.transform = 'scale(1)';
    });
  });
});