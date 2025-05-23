<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: usuarios/login.php");
    exit();
}

$nombreCompleto = $_SESSION['usuario'];
$correo = $_SESSION['correo'];
$usuarioID = $_SESSION['cedula']; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Perfil del Usuario</title>
  <link rel="stylesheet" href="css/estilo2.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
</head>
<body>

  <header>
    <h1>Mi Perfil</h1>
    <nav>
      <a href="inicio.php"><i class="fas fa-home"></i> Inicio</a>
      <a href="eventos.html"><i class="fas fa-calendar-alt"></i> Eventos</a>

      <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>

      <a href="../logout.php"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</a>

    </nav>
  </header>

  <main>
    <section class="tarjeta-perfil">
      <img src="https://via.placeholder.com/120" alt="Foto de perfil" class="foto-perfil">
      <div class="datos-usuario">

        <h2><i class="fas fa-user"></i> <?= htmlspecialchars($nombre_completo) ?></h2>
        <p><i class="fas fa-envelope"></i> <?= htmlspecialchars($correo_mostrar) ?></p>
        <p><i class="fas fa-user-circle"></i> Usuario: <?= htmlspecialchars($correo_mostrar) ?></p>

        <h2><i class="fas fa-user"></i> <?= htmlspecialchars($nombreCompleto) ?></h2>
        <p><i class="fas fa-envelope"></i> <?= htmlspecialchars($correo) ?></p>
        <p><i class="fas fa-user-circle"></i> Usuario: <?= htmlspecialchars($usuarioID) ?></p>

      </div>
    </section>

    <section>
      <h2><i class="fas fa-cog"></i> Preferencias</h2>
      <ul>
        <li>Notificaciones por correo: Activadas</li>
        <li>Idioma preferido: Español</li>
      </ul>
    </section>

    <section>
      <h2><i class="fas fa-wrench"></i> Opciones</h2>
      <button><i class="fas fa-edit"></i> Editar Perfil</button>
      <button><i class="fas fa-key"></i> Cambiar Contraseña</button>
    </section>
  </main>

</body>
</html>
