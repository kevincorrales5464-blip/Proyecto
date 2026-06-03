<?php
include("conexion.php");

$id = $_POST['id'];
$usuario = $_POST['usuario'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "UPDATE usuarios 
        SET usuario='$usuario', email='$email', password='$password'
        WHERE id=$id";

if ($conexion->query($sql)) {
    echo "ok";
} else {
    echo "error";
}
?>