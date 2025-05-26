<?php
class AdminModel {
    private $conn;

    public function __construct($conexion) {
        $this->conn = $conexion;
    }

    public function crearAdministrador($data) {
        $hashed = password_hash($data['clave'], PASSWORD_DEFAULT);
        $fecha_reg = date('Y-m-d');

        $this->conn->beginTransaction();
        try {
            $stmt = $this->conn->prepare("INSERT INTO usuarios 
                (nom_usu, cor_usu, pas_usu, fec_reg_usu, tip_doc_usu, doc_usu, tel_usu, dir_usu) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $data['nombre'], $data['correo'], $hashed, $fecha_reg,
                $data['tipo_doc'], $data['doc'], $data['tel'], $data['dir']
            ]);

            $id_usu = $this->conn->lastInsertId("usuarios_id_usu_seq");

            $stmt2 = $this->conn->prepare("INSERT INTO administradores (id_usu, fec_asi_adm) VALUES (?, ?)");
            $stmt2->execute([$id_usu, $data['fecha']]);

            $this->conn->commit();
            return true;
        } catch (PDOException $e) {
            $this->conn->rollBack();
            return false;
        }
    }
}
?>
