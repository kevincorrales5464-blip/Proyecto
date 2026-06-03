<?php
include 'conexion.php';

//recibir el id del usuario a eliminar
$id = $_POST['id'];

//consulta para eliminar el usuario
$sql = "DELETE FROM usuarios WHERE id = $id";

if (mysqli_query($conexion, $sql)) {
    echo "Usuario eliminado correctamente";
} else {
    echo "Error al eliminar el usuario: " . mysqli_error($conexion);
}
mysqli_close($conexion);

?>