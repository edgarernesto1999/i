<?php
session_set_cookie_params([
    'lifetime' => 60 * 60 * 24 * 30,
    'path' => '/',
    'httponly' => true,
    'secure' => false,
    'samesite' => 'Lax'
]);
session_start();
require_once 'conifg/Usuario.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];

    $usuario = Usuario::autenticar($nombre, $apellido);

    if ($usuario) {
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['apellido'] = $usuario['apellido'];
        $_SESSION['rol'] = $usuario['rol'];

        if ($usuario['rol'] === 'admin') {
            header("Location: vistas/admin.php");
        } else {
            header("Location: vistas/estudiante.php");
        }
        exit;
    } else {
        $_SESSION['error'] = "Usuario no encontrado.";
        header("Location: vistas/login.php");
        exit;
    }
} else {
    header("Location: vistas/login.php");
    exit;
}
?>
