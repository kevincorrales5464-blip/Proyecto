<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificamos contraseña con password_hash
        if (password_verify($password, $row['password'])) {
            $_SESSION['usuario'] = $row['usuario'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Contraseña incorrecta ❌";
        }
    } else {
        $error = "Usuario no encontrado ❌";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login - RepinCar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <h2>RepinCar Taller Automotriz</h2>
    </nav>

    <div class="card">
        <h2>Iniciar Sesión 🔑</h2>
        <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>
        <form method="POST" action="index.php">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" required>

            <label for="password">Contraseña:</label>
            <input type="password" name="password" required>

            <button type="submit">Ingresar</button>
        </form>
        <p>¿No tienes cuenta? <a href="registro.php">Regístrate aquí</a></p>
    </div>
</body>
</html>
