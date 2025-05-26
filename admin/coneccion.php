<?php
class Conectionn
{
    public function conectar()
    {
        $servidor = "localhost";
        $usuario = "postgres";
        $password = "root";
        $bd = "Proyecto2PManejo";
        try {
            $conexion = new PDO("pgsql:host=$servidor;dbname=$bd", $usuario, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // Puedes quitar el echo para evitar mensajes innecesarios
            // echo "Conexión exitosa a la base de datos.";
            echo ("conectado");
        } catch (PDOException $e) {
            // Mejor lanza la excepción para manejarla fuera
            throw new Exception("Error de conexión: " . $e->getMessage());
        }
        return $conexion;        
    }
}
?>