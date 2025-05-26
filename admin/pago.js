const buscarBtn = document.getElementById('buscarBtn');
const userInfoDiv = document.getElementById('userInfo');
const eventSectionDiv = document.getElementById('eventSection');
const userNameSpan = document.getElementById('userName');
const userCedulaSpan = document.getElementById('userCedula');
const userEmailSpan = document.getElementById('userEmail');
const eventSelect = document.getElementById('eventSelect');
const eventTableBody = document.querySelector('#eventTable tbody');
const confirmPagoBtn = document.getElementById('confirmPagoBtn');

// Datos de ejemplo para usuarios y eventos
const usuarios = {
  "1234567890": { nombre: "Juan Pérez", cedula: "1234567890", email: "juan.perez@mail.com" },
  "0987654321": { nombre: "María López", cedula: "0987654321", email: "maria.lopez@mail.com" }
};

const eventos = {
  "1": {
    nombre: "Concierto Rock",
    fecha: "2025-06-15",
    lugar: "Estadio Central",
    precio: "$50",
    cupos: "2000"
  },
  "2": {
    nombre: "Conferencia Tecnología",
    fecha: "2025-07-01",
    lugar: "Centro de Convenciones",
    precio: "$30",
    cupos: "500"
  },
  "3": {
    nombre: "Feria del Libro",
    fecha: "2025-08-10",
    lugar: "Parque Principal",
    precio: "Gratis",
    cupos: "Ilimitados"
  }
};

buscarBtn.addEventListener('click', () => {
  const cedula = document.getElementById('cedula').value.trim();
  if (!cedula) {
    alert("Por favor ingrese una cédula.");
    return;
  }

  const usuario = usuarios[cedula];
  if (usuario) {
    userNameSpan.textContent = usuario.nombre;
    userCedulaSpan.textContent = usuario.cedula;
    userEmailSpan.textContent = usuario.email;
    userInfoDiv.style.display = 'block';

    eventSectionDiv.style.display = 'none';
    eventSelect.value = "";
    eventTableBody.innerHTML = "";
  } else {
    alert("Usuario no encontrado.");
    userInfoDiv.style.display = 'none';
    eventSectionDiv.style.display = 'none';
  }
});

eventSelect.addEventListener('change', () => {
  const eventoId = eventSelect.value;
  eventTableBody.innerHTML = "";

  if (!eventoId) {
    eventSectionDiv.querySelector('table').style.display = 'none';
    confirmPagoBtn.style.display = 'none';
    return;
  }

  const evento = eventos[eventoId];

  for (const [detalle, info] of Object.entries(evento)) {
    const row = document.createElement('tr');
    const tdDetalle = document.createElement('td');
    const tdInfo = document.createElement('td');

    tdDetalle.textContent = detalle.charAt(0).toUpperCase() + detalle.slice(1);
    tdInfo.textContent = info;

    row.appendChild(tdDetalle);
    row.appendChild(tdInfo);

    eventTableBody.appendChild(row);
  }

  eventSectionDiv.querySelector('table').style.display = 'table';
  confirmPagoBtn.style.display = 'block';
});

confirmPagoBtn.addEventListener('click', () => {
  const cedula = document.getElementById('cedula').value.trim();
  const eventoId = eventSelect.value;

  if (!cedula || !eventoId) {
    alert("Debe seleccionar un usuario y un evento primero.");
    return;
  }

  alert(`Pago confirmado para el usuario con cédula ${cedula} en el evento "${eventos[eventoId].nombre}".`);
});

// Inicialmente ocultamos tabla y botón
eventSectionDiv.querySelector('table').style.display = 'none';
confirmPagoBtn.style.display = 'none';
