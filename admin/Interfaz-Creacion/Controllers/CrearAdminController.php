<?php
require_once "../../../coneccion.php";
require_once "../Models/AdminModel.php";

$model = new AdminModel($conn);
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'nombre'    => $_POST['nombre'],
        'correo'    => $_POST['correo'],
        'clave'     => $_POST['clave'],
        'fecha'     => $_POST['fecha'],
        'tipo_doc'  => $_POST['tipo_doc'],
        'doc'       => $_POST['doc'],
        'tel'       => $_POST['tel'],
        'dir'       => $_POST['dir']
    ];
    $ok = $model->crearAdministrador($data);
    $mensaje = $ok ? "Administrador creado correctamente." : "Error al crear administrador.";
}

include "../Views/crear_admin.php";
?>
