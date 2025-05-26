<?php
class EventoModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function crearEvento($data) {
        try {
            $stmt = $this->conn->prepare("INSERT INTO eventos_cursos 
                (tit_eve_cur, des_eve_cur, fec_ini_eve_cur, fec_fin_eve_cur, cos_eve_cur, mod_eve_cur)
                VALUES (?, ?, ?, ?, ?, ?)");
            return $stmt->execute([
                $data['titulo'],
                $data['descripcion'],
                $data['fecha_inicio'],
                $data['fecha_fin'],
                $data['costo'],
                $data['modalidad']
            ]);
        } catch (PDOException $e) {
            return false;
        }
    }
}
?>
