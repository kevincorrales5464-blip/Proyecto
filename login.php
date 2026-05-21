<?php
session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contraseña'];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contraseña='$contraseña'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $_SESSION['usuario'] = $usuario;
    echo "Bienvenido, " . $usuario . "! Has iniciado sesión correctamente.";
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>