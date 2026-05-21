<?php
session_start();
include("conexion.php");

// Verificar método
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    if (!empty($usuario) && !empty($password)) {

        // Buscar usuario
        $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
        $resultado = mysqli_query($conexion, $sql);

        if ($fila = mysqli_fetch_assoc($resultado)) {

            // Verificar contraseña encriptada
            if (password_verify($password, $fila['password'])) {

                $_SESSION['usuario'] = $usuario;

                // 🔥 REDIRECCIÓN REAL
                header("Location: login.php");
                exit();

            } else {
                echo "Contraseña incorrecta.";
            }

        } else {
            echo "Usuario no existe.";
        }

    } else {
        echo "Faltan datos.";
    }

} else {
    header("Location: index.php");
    exit();
}
?>