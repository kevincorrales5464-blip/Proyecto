<?php
include 'conexion.php';

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];

$sql = "UPDATE usuarios SET usuario='$usuario', email='$email' WHERE id=$id";

if (mysqli_query($conexion, $sql)) {
    echo "Usuario actualizado correctamente.";
} else {
    echo "Error al actualizar el usuario: " . mysqli_error($conexion);
}
mysqli_close($conexion);

?>