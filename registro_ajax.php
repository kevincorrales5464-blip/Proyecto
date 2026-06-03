<?php
include 'conexion.php';

$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

//Insertar el nuevo usuario en la base de datos
$sql = "INSERT INTO usuarios (usuario, email, password) 
        VALUES ('$usuario', '$email', '$password')";

if (mysqli_query($conexion, $sql)) {
    echo "Usuario registrado exitosamente";
} else {
    echo "Error al registrar usuario: ";
}
?>