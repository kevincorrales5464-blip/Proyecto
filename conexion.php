<?php
$conexion = mysqli_connect("localhost", "root", "", "login_repincar");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}
?>