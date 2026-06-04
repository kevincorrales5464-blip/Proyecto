<?php
include("conexion.php");

$id = $_GET['id'];

mysqli_query($conexion, "DELETE FROM carrito WHERE id=$id");

header("Location: carrito.php");
?>