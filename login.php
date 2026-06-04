<?php
session_start();
include("conexion.php");

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    if (empty($usuario) || empty($password)) {
        $error = "Debes ingresar usuario y contraseña.";
    } else {
        $sql = "SELECT * FROM usuarios WHERE usuario = ?";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("s", $usuario);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();

            if (password_verify($password, $fila['password'])) {
                $_SESSION['usuario'] = $fila['usuario'];
                $_SESSION['id_usuario'] = $fila['id'];
                
                header("Location: index.php?bienvenido=1");
                exit();
            } else {
                $error = "Contraseña incorrecta";
            }
        } else {
            $error = "Usuario no existe";
        }
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="estilo.css">
<title>Login</title>
</head>
<body>
    <h1>Repincar</h1>
    <p class="bienvenida">¡Bienvenido a Repincar! Tu plataforma de gestión de pintura automotriz.</p>

<div class="form-container">
    <h2>Inicio de sesion</h2>
    <p>Ingresa tus datos para acceder</p>

    <?php if($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <?php

    if (isset($_SESSION['mensaje'])) {
        echo "<div class='alert-success'>" . $_SESSION['mensaje'] . "</div>";
        unset($_SESSION['mensaje']);
    }
    ?>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
    </form>

    <button class="btn" onclick="window.location.href='registro.php'">Crear cuenta</button>
</div>


</body>
</html>