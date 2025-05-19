document.addEventListener('DOMContentLoaded', function() {
    const formulario = document.querySelector('form');
    
    // Validar fechas para que la fecha de fin no sea anterior a la de inicio
    const fechaInicio = document.getElementById('fechaInicio');
    const fechaFin = document.getElementById('fechaFin');
    
    fechaFin.addEventListener('change', function() {
        if (fechaInicio.value && fechaFin.value) {
            if (new Date(fechaFin.value) < new Date(fechaInicio.value)) {
                alert('La fecha de finalización no puede ser anterior a la fecha de inicio');
                fechaFin.value = '';
            }
        }
    });
    
    // Validación y envío del formulario
    formulario.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Validar campos
        const titulo = document.getElementById('titulo').value.trim();
        const descripcion = document.getElementById('descripcion').value.trim();
        const tipo = document.getElementById('tipo').value;
        const fechaInicioValue = fechaInicio.value;
        const fechaFinValue = fechaFin.value;
        const costo = document.getElementById('costo').value.trim();
        const modalidad = document.getElementById('modalidad').value;
        
        // Validación básica
        if (!titulo || !descripcion || !tipo || !fechaInicioValue || !fechaFinValue || !costo || !modalidad) {
            alert('Por favor, complete todos los campos obligatorios');
            return;
        }
        
        // Formato de costo adecuado (número o "Gratis")
        if (costo !== 'Gratis' && isNaN(parseFloat(costo))) {
            alert('El costo debe ser un número o "Gratis"');
            return;
        }
        
        // Si todas las validaciones pasan, enviar datos al servidor
        const formData = new FormData(formulario);
        
        // Mostrar indicador de carga
        const boton = document.querySelector('button[type="submit"]');
        const textoOriginal = boton.textContent;
        boton.textContent = 'Guardando...';
        boton.disabled = true;
        
        // Obtener la ruta base del servidor
        const baseUrl = window.location.protocol + '//' + window.location.hostname + (window.location.port ? ':' + window.location.port : '');
        
        fetch(baseUrl + '/guardar_evento.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Evento guardado correctamente');
                formulario.reset();
            } else {
                alert('Error al guardar el evento: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Ocurrió un error al procesar la solicitud');
        })
        .finally(() => {
            // Restaurar el botón
            boton.textContent = textoOriginal;
            boton.disabled = false;
        });
    });
});