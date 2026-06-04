<?php
session_start();
include("conexion.php");

$id_usuario = $_SESSION['id_usuario'];

$sql = "SELECT * FROM carrito WHERE usuario_id='$id_usuario'";
$resultado = mysqli_query($conexion, $sql);

$total = 0;
?>

<h1>Tu carrito 🛒</h1>

<?php while($fila = mysqli_fetch_assoc($resultado)) { 
    $subtotal = $fila['precio'] * $fila['cantidad'];
    $total += $subtotal;
?>

<div>
  <?= $fila['producto'] ?> - <?= $fila['cantidad'] ?> x $<?= $fila['precio'] ?>
  = $<?= $subtotal ?>

  <a href="eliminar.php?id=<?= $fila['id'] ?>">❌</a>
</div>

<?php } ?>

<h2>Total: $<?= $total ?></h2>

<a href="finalizar.php">Finalizar compra</a>