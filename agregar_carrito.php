<?php
session_start();
include("conexion.php");

$id_usuario = $_SESSION['id_usuario'];

$producto = $_POST['producto'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO carrito (usuario_id, producto, precio, cantidad)
        VALUES ('$id_usuario', '$producto', '$precio', '$cantidad')";

mysqli_query($conexion, $sql);

header("Location: carrito.php");
?>