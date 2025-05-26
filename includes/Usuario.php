<?php
require_once 'Conexion.php';

class Usuario {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    public function obtenerUsuarioPorCorreo($correo) {
        $conn = $this->conexion->getConexion();
        if (!$conn) {
            return false;
        }

        $query = "SELECT * FROM USUARIOS WHERE COR_USU = $1";
        $result = pg_query_params($conn, $query, array($correo));

        if ($result && pg_num_rows($result) > 0) {
            return pg_fetch_assoc($result);
        } else {
            return false;
        }
    }

    public function cerrarConexion() {
        $this->conexion->cerrar();
    }
}
?>
