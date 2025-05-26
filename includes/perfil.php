<?php
session_start();

if (!isset($_SESSION['correo'])) {
    header('Location: login.php');
    exit();
}

require_once 'Usuario.php';

$correo = $_SESSION['correo'];
$usuarioObj = new Usuario();
$datos = $usuarioObj->obtenerUsuarioPorCorreo($correo);
$usuarioObj->cerrarConexion();

$nombre_completo = "Usuario desconocido";
$correo_mostrar = $correo;

if ($datos) {
    $nombre_completo = $datos['nom_pri_usu'] . ' ' . $datos['nom_seg_usu'] . ' ' .
                       $datos['ape_pri_usu'] . ' ' . $datos['ape_seg_usu'];
    $correo_mostrar = $datos['cor_usu'];
}

include 'perfil.php';
