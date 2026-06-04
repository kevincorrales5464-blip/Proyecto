<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = trim($_POST['usuario']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Validar campos vacíos
    if (empty($usuario) || empty($email) || empty($password)) {
        $_SESSION['mensaje'] = "❌ Todos los campos son obligatorios.";
        header("Location: registro.php");
        exit();
    }

    // Encriptar la contraseña
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Usar consulta preparada para evitar SQL Injection
    $sql = "INSERT INTO usuarios (usuario, email, password) VALUES (?, ?, ?)";
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("sss", $usuario, $email, $passwordHash);

    if ($stmt->execute()) {
        $_SESSION['mensaje'] = "✅ Usuario registrado correctamente, ya puedes iniciar sesión.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['mensaje'] = "❌ Error al registrar usuario.";
        header("Location: registro.php");
        exit();
    }

    $stmt->close();
}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="estilo.css">
<title>Registro</title>
</head>
<body>
    <h1>Repincar</h1>
    <p class="bienvenida">¡Registrate para recibir el mejor servicio de gestión de pintura automotriz!</p>

<div class="form-container">
    <h2>Registro de usuario</h2>
    <p>Completa el formulario para crear tu cuenta</p>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="email" name="email" placeholder="Correo" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Registrar</button>
    </form>

    <button class="btn" onclick="window.location.href='login.php'">Iniciar sesión</button>
</div>

<div class="form-container">
    <h2>Panel de administración</h2>
    <p>Accede al panel de usuarios para gestionar las cuentas</p>

    <button class="btn" onclick="window.location.href='usuarios.php'">Panel de Usuarios</button>
</div>

</body>
</html>