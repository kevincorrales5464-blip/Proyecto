<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" type="text/css" href="stileInicio.css">
</head>
<body>

<div clas="container">
    <h2> Crear Cuenta</h2>

    <form method="POST">
        <input type="text" name="usuario" placeholder="Usuario" required>
        <input type="password" name="contraseña" placeholder="Contraseña" required>
        <button type="submit" name="register">Registrarse</button>
    </form>

    <a href="index.php">¿Ya tienes una cuenta? Inicia sesión aquí</a>

    <?php
    if (isset($_POST['registro'])) {
        include("conexion.php");

        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contraseña'], PASSWORD_DEFAULT;

        $sql = "INSERT INTO usuarios (usuario, contraseña) VALUES ('$usuario', '$contraseña')";
        
        if (mysqli_query($conexion, $sql)) {
            echo "Usuario registrado exitosamente.";
        } else {
            echo "<p>Error: el usuario ya existe</p>";
        }
    }
    ?>
</div>

</body>
</html>