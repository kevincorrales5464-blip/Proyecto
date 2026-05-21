<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = mysqli_query($conexion, $sql);

    if ($fila = mysqli_fetch_assoc($resultado)) {

        if (password_verify($password, $fila['password'])) {
            $_SESSION['usuario'] = $usuario;
            echo "Bienvenido, " . $usuario . "! Has iniciado sesión correctamente.";
            exit();
        } else {
            echo "Contraseña incorrecta.";
        }

    } else {
        echo "Usuario no existe.";
    }

} else {
    echo "Acceso inválido.";
}
?>