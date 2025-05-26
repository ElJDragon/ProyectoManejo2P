document.addEventListener('DOMContentLoaded', () => {
    const modalidad = document.getElementById("modalidad");
    const costo = document.getElementById("costo");
    const form = document.getElementById("eventoForm");

     // Habilita o deshabilita el campo "costo" según la modalidad
    modalidad.addEventListener("change", () => {
        if (modalidad.value === "Gratis") {
            costo.value = "0.00";
            costo.disabled = true;
        } else {
            costo.value = "";
            costo.disabled = false;
        }
    });

    
    // Validación y envío del formulario
    formulario.addEventListener('submit', function(e) {
        e.preventDefault();
        
     // Validar fechas
        const fechaInicio = new Date(document.getElementById("fechaInicio").value);
        const fechaFin = new Date(document.getElementById("fechaFin").value);
        if (fechaFin < fechaInicio) {
            alert("La fecha de fin no puede ser anterior a la fecha de inicio.");
            return;
        }

        const datos = new FormData(form);

        fetch("crearEv.php", {
            method: "POST",
            body: datos
        })
        .then(response => response.text())
        .then(data => {
            alert(data);
            form.reset();
            costo.disabled = false;
        })
        .catch(error => {
            alert("Error al guardar el evento.");
            console.error(error);
        
        });
    });  
});