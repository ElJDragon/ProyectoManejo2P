<?php
// Parámetros de conexión
$host = 'localhost';
$port = '5432';
$dbname = 'postgres'; // <-- Reemplázalo con el nombre real de tu base de datos
$user = 'postgres';
$password = 'root';

try {
    $conn = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    // Opciones para lanzar excepciones si ocurre un error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}
?>
