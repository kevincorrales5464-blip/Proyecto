<?php
session_start();
include 'conexion.php';

$usuario = $_POST['usuario'];
$password = $_POST['password'];

    //busca el usuario en la base de datos
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$resultado = mysqli_query($conexion, $sql);

if ($fila = mysqli_fetch_assoc($resultado)) {
    
    //verifica la contraseña
    if (password_verify($password, $fila['password'])) {
        //si la contraseña es correcta, inicia sesión
        $_SESSION['usuario'] = $fila['usuario'];
        header("Location: index.php");
    } else {
        //si la contraseña es incorrecta, muestra un mensaje de error
        echo "Contraseña incorrecta";
    }
} else {
    //si el usuario no existe, muestra un mensaje de error
    echo "Usuario no encontrado";
}
?>