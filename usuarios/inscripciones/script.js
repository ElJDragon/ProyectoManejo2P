document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('inscripcionForm');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validar que al menos un interés esté seleccionado
        const intereses = document.querySelectorAll('input[name="intereses[]"]:checked');
        if (intereses.length === 0) {
            alert('Por favor seleccione al menos un interés.');
            return;
        }
        
        // Validar términos y condiciones
        const terminos = document.getElementById('terminos').checked;
        if (!terminos) {
            alert('Debe aceptar los términos y condiciones para continuar.');
            return;
        }
        
        // Si todo está correcto, enviar el formulario
        alert('Formulario enviado con éxito. ¡Gracias por su inscripción!');
        form.submit();
    });
    
    // Mejorar la experiencia de usuario en la fecha de nacimiento
    const fechaNacimiento = document.getElementById('fecha_nacimiento');
    const hoy = new Date().toISOString().split('T')[0];
    fechaNacimiento.setAttribute('max', hoy);
});