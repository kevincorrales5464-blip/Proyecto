<?php
session_start();
include("conexion.php");



$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();

        if ($password == $fila['password']) {

            $_SESSION['usuario'] = $fila['usuario'];

            header("Location: index.php?bienvenido=1");
            exit();

        } else {
            $error = "Contraseña incorrecta";
        }

    } else {
        $error = "Usuario no existe";
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

<div class="form-container">
    <h2>Iniciar Sesión</h2>

    <?php if($error): ?>
        <p class="error"><?= $error ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit">Ingresar</button>
    </form>

    <a href="registro.php">Crear cuenta</a>
</div>

</body>
</html>