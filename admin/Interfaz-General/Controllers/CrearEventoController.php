<?php
session_start();
require_once "../../../coneccion.php";
require_once "../Models/EventoModel.php";

$model = new EventoModel($conn);
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $data = [
        'titulo'       => $_POST['titulo'],
        'descripcion'  => $_POST['descripcion'],
        'fecha_inicio' => $_POST['fecha_inicio'],
        'fecha_fin'    => $_POST['fecha_fin'],
        'costo'        => $_POST['costo'],
        'modalidad'    => $_POST['modalidad']
    ];

    $ok = $model->crearEvento($data);
    $_SESSION['mensaje'] = $ok ? "Evento creado exitosamente." : "Hubo un error al crear el evento.";
    header("Location: ../Views/crear_evento.php");
    exit;
}
?>
