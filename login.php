<?php
session_start();
include("conexion.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($usuario) && !empty($password)) {

        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $resultado = mysqli_query($conexion, $sql);

        if ($fila = mysqli_fetch_assoc($resultado)) {

            if (password_verify($password, $fila['password'])) {
                $_SESSION['usuario'] = $usuario;
                header("Location: home.php");
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }

        } else {
            echo "Usuario no existe.";
        }

    } else {
        echo "Faltan datos.";
    }

} else {
    header("Location: index.php");
    exit();
}
?>