<?php
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (usuario, email, password)
            VALUES ('$usuario', '$email', '$password')";

    if ($conexion->query($sql)) {
        header("Location: login.php");
    } else {
        echo "Error al registrar";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="estilo.css">
<title>Registro</title>
</head>
<body>

<div class="form-container">
    <h2>Registro</h2>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="email" name="email" placeholder="Correo" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Registrar</button>
    </form>

    <a href="login.php">Ya tengo cuenta</a>
</div>

</body>
</html>