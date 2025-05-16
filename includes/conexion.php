<?php
    // Parámetros de conexión
    $host = "localhost";       // Dirección del servidor PostgreSQL
    $port = "5432";            // Puerto por defecto
    $dbname = "nombre_base";   // Reemplaza con el nombre de tu base de datos
    $user = "postgres";        // Nombre de usuario (por defecto suele ser postgres)
    $password = "tu_clave";    // Reemplaza con tu contraseña

    // Cadena de conexión
    $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

    // Intentar conexión
    $conexion = pg_connect($conn_string);

    /*
    if (!$conexion) {
        echo "Error: No se pudo conectar a la base de datos.";
    } else {
        echo "Conexión exitosa a PostgreSQL.";
    }
    */
?>
