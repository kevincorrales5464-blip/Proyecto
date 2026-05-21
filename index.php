<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $res = mysqli_query($conexion, $sql);

    if ($fila = mysqli_fetch_assoc($res)) {

        if (password_verify($password, $fila['password'])) {
            $_SESSION['usuario'] = $usuario;
            header("Location: home.php");
            exit();
        } else {
            echo "<p>Contraseña incorrecta</p>";
        }

    } else {
        echo "<p>Usuario no existe</p>";
    }
}
?>