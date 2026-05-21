<?php
session_start();
include("conexion.php");

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$sql = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$contrasena'";
$resultado = mysqli_query($conexion, $sql);

if (mysqli_num_rows($resultado) > 0) {
    $_SESSION['usuario'] = $usuario;
    echo "Bienvenido, " . $usuario . "! Has iniciado sesión correctamente.";
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>