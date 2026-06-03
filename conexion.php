<?php
$servername = "localhost";
$username = "root";   // cambia si tu usuario MySQL es distinto
$password = "";       // cambia si tu contraseña es distinta
$dbname = "repincar_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
