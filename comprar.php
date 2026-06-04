<?php
session_start();
include("conexion.php");

$id_usuario = $_SESSION['id_usuario'];

mysqli_query($conexion, "DELETE FROM carrito WHERE usuario_id='$id_usuario'");

echo "<h2>✅ Compra realizada con éxito 🚗✨</h2>";
echo "<a href='tienda.php'>Volver a la tienda</a>";
?>