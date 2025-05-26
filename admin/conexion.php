<?php
// Datos de conexión a la base de datos PostgreSQL
define('DB_HOST', 'localhost');   // Cambia si es otro host
define('DB_PORT', '5432');        // Puerto por defecto de PostgreSQL
define('DB_NAME', 'Proyecto_manejo');  // Cambia por el nombre de tu BD
define('DB_USER', 'postgres');         // Cambia por tu usuario
define('DB_PASS', 'hitman4525');      // Cambia por tu contraseña

function conectarDB() {
    $conn_string = "host=" . DB_HOST . " port=" . DB_PORT . " dbname=" . DB_NAME . " user=" . DB_USER . " password=" . DB_PASS;
    $conn = pg_connect($conn_string);

    if (!$conn) {
        die("❌ Error en la conexión a la base de datos.");
    } else {
        echo "✅ Conexión exitosa a la base de datos.";
    }

    return $conn;
}

// Llamas a la función para probar
conectarDB();
?>
