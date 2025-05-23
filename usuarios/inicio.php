<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: usuarios/login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Inicio de Usuario</title>
  <link rel="stylesheet" href="css/estilos.css" />
</head>
<body>

  <header>
    <h1>Bienvenido, <?= htmlspecialchars($_SESSION['usuario']) ?></h1>
    <nav>
      <a href="perfil.html">Perfil</a>
      <a href="eventos.html">Eventos</a>
      <a href="../logout.php">Cerrar sesión</a>
    </nav>
  </header>

  <main>
    <section>
      <h2>Mis eventos inscritos</h2>
      <ul>
        <li>Curso de Programación Básica</li>
        <li>Taller de Diseño Web</li>
      </ul>
    </section>

    <section>
      <h2>Eventos disponibles para inscripción</h2>
      <ul>
        <li>Curso Avanzado de JavaScript</li>
        <li>Introducción a Python</li>
        <li>Base de Datos con MySQL</li>
      </ul>
    </section>
  </main>

</body>
</html>
