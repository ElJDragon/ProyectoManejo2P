<?php
if (session_status() === PHP_SESSION_NONE) session_start();
$mensaje = $_SESSION['mensaje'] ?? '';
unset($_SESSION['mensaje']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Crear Evento</title>
  <link rel="stylesheet" href="../../css/formulario.css">
</head>
<body>
  <div class="form-container">
    <h2>Crear Evento</h2>

    <?php if (!empty($mensaje)) echo "<p class='mensaje'>$mensaje</p>"; ?>

    <form method="POST" action="../Controllers/CrearEventoController.php">
      <label>Título:</label>
      <input type="text" name="titulo" required>

      <label>Descripción:</label>
      <textarea name="descripcion" rows="3"></textarea>

      <label>Fecha de inicio</label>
      <input type="date" name="fecha_inicio" required>

      <div class="grid-two">
        <div>
          <label>Fecha de fin:</label>
          <input type="date" name="fecha_fin" required>
        </div>
        <div>
          <label>Costo</label>
          <input type="number" step="0.01" name="costo" required>
        </div>
      </div>

      <label>Modalidad</label>
      <input type="text" name="modalidad" placeholder="Gratis o Pagado" required>

      <button type="submit">Crear</button>
    </form>
  </div>
</body>
</html>
