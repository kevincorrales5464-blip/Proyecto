<?php
session_start();
include("conexion.php");

// SIMULACIÓN de usuario logueado (si ya tienes login, usamos ese)
$_SESSION['id_usuario'] = 1;
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Tienda PRO 🚗</title>
<link rel="stylesheet" href="tienda.css">
</head>
<body>

<h1>Tienda Automotriz 🚗</h1>

<div class="contenedor">

  <!-- PRODUCTOS -->
  <div class="card">
    <h3>Kit de Limpieza</h3>
    <p>$60.000</p>
    <form action="agregar.php" method="POST">
      <input type="hidden" name="producto" value="Kit de Limpieza">
      <input type="hidden" name="precio" value="60000">
      <input type="number" name="cantidad" value="1">
      <button type="submit">Agregar</button>
    </form>
  </div>

  <div class="card">
    <h3>Kit Partes Negras</h3>
    <p>$90.000</p>
    <form action="agregar.php" method="POST">
      <input type="hidden" name="producto" value="Kit Partes Negras">
      <input type="hidden" name="precio" value="90000">
      <input type="number" name="cantidad" value="1">
      <button type="submit">Agregar</button>
    </form>
  </div>

  <div class="card">
    <h3>Kit de Brillado</h3>
    <p>$140.000</p>
    <form action="agregar.php" method="POST">
      <input type="hidden" name="producto" value="Kit de Brillado">
      <input type="hidden" name="precio" value="140000">
      <input type="number" name="cantidad" value="1">
      <button type="submit">Agregar</button>
    </form>
  </div>

  <div class="card">
    <h3>Kit Detailing</h3>
    <p>$200.000</p>
    <form action="agregar.php" method="POST">
      <input type="hidden" name="producto" value="Kit Detailing">
      <input type="hidden" name="precio" value="200000">
      <input type="number" name="cantidad" value="1">
      <button type="submit">Agregar</button>
    </form>
  </div>

</div>

<a href="carrito.php">🛒 Ver Carrito</a>

</body>
</html>