<?php
$conexion = mysqli_connect("localhost", "root", "", "repincar_db");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>