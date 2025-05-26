<?php
session_start();
$mensaje = $_SESSION['mensaje'] ?? '';
unset($_SESSION['mensaje']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Administrador</title>
  <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
  <div class="form-container">
    <h2>Crear Administrador</h2>
    <?php if (!empty($mensaje)) echo "<p class='mensaje'>$mensaje</p>"; ?>
    <form method="POST" action="../Controllers/CrearAdminController.php">
      <label>Nombre completo</label>
      <input type="text" name="nombre" required>
      <label>Correo electrónico</label>
      <input type="email" name="correo" required>
      <label>Contraseña</label>
      <input type="password" name="clave" required>
      <label>Fecha de asignación</label>
      <input type="date" name="fecha" required>
      <div class="grid-two">
        <div>
          <label>Tipo de documento</label>
          <input type="text" name="tipo_doc">
        </div>
        <div>
          <label>Número de documento</label>
          <input type="text" name="doc">
        </div>
      </div>
      <div class="grid-two">
        <div>
          <label>Teléfono</label>
          <input type="text" name="tel">
        </div>
        <div>
          <label>Dirección</label>
          <input type="text" name="dir">
        </div>
      </div>
      <button type="submit">Registrar</button>
    </form>
  </div>
</body>
</html>
