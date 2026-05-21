<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="stileInicio.css">
</head>
<body>
    <div class="container">
        <h2> Iniciar Sesiòn</h2>
        
        <form method="POST" action="login.php">

            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contrasena" placeholder="Contraseña" required>
            <button type="submit" name="login">Ingresar</button>
        </form>

        <a href="registro.php">¿No tienes una cuenta? Regístrate aquí</a>

        <?php
        if (isset($_SESSION['usuario'])) {
            include("conexion.php");

            $usuario = $_POST['usuario'];
            $contrasena = $_POST['contrasena'];

            $sql = "SELECT * FROM  usuarios WHERE usuario=`$usuario'";
            $res = mysqli_query($conexion, $sql);

            if ($fila = mysqli_fetch_assoc($res)) {
                if ($password_verify($contrasena, $fila['contrasena'])) {
                    $_SESSION['usuario'] = $usuario;
                    header("Location: home.php");
                }
                } else {
                    echo "<p>Contraseña incorrecta</p>";
                }
            }else {
                echo "<p>Usuario no existente</p>";
            }
    </div>
</body>
</html>