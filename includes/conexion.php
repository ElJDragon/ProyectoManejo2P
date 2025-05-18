<?php
    $host = "localhost";       
    $port = "5432";           
    $dbname = "gestion_cursos";   
    $user = "postgres";        
    $password = "ligacampeon";    

    // Cadena de conexión
    $conn_string = "host=$host port=$port dbname=$dbname user=$user password=$password";

    // Intentar conexión
    $conexion = pg_connect($conn_string);

    
    if (!$conexion) {
        echo "Error: No se pudo conectar a la base de datos.";
    } else {
        echo "Conexión exitosa a PostgreSQL.";
    }
    
?>
