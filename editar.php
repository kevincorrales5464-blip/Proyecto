<?php
include("conexion.php");

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id=$id";
$resultado = $conexion->query($sql);
$fila = $resultado->fetch_assoc();
?>

<form action="actualizar.php" method="POST">
<input type="hidden" name="id" value="<?= $fila['id'] ?>">
<input type="text" name="usuario" value="<?= $fila['usuario'] ?>">
<input type="email" name="email" value="<?= $fila['email'] ?>">
<input type="text" name="password" value="<?= $fila['password'] ?>">
<button type="submit">Actualizar</button>
</form>