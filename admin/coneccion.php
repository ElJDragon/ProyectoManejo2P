<?php
public class Conectionn
{
    public function __construct()
    {
        $this->conectar();
    }

    public function conectar()
    {
        $servidor = "localhost";
        $usuario = "postgres";
        $password = "root";
        $bd = "Proyecto2PManejo";
try {
            $conexion = new PDO("pgsql:host=$servidor;dbname=$bd", $usuario, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Conexión exitosa a la base de datos.";
        } catch (PDOException $e) {
            echo "Error de conexión: " . $e->getMessage();
        }
        return $conexion;        
    }

}
?>