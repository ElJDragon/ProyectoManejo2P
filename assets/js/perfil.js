document.addEventListener('DOMContentLoaded', function() {
//cambiar contra
  const btnCambiarPass = document.querySelector('button:last-of-type');
  btnCambiarPass.addEventListener('click', function() {

    // Redirige a editar.html correctamente desde perfil.php
    window.location.href = 'editar.html';
  });

  // Efectos hover
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
