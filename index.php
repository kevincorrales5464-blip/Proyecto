<?php
// 1. Iniciamos la sesión al principio de todo
session_start();

// 2. Incluimos el archivo de conexión
include("home.php");

// Verificación y corrección de la variable de conexión en caso de fallos externos
if (!isset($conexion)) {
    $conexion = mysqli_connect("localhost", "root", "", "login_repincar");
}

// 3. Capturamos los datos del formulario de login
$correo = mysqli_real_escape_string($conexion, $_POST['usuario']);
$password = mysqli_real_escape_string($conexion, $_POST['password']);

// 4. Consulta SQL para validar las credenciales
$sql = "SELECT * FROM usuarios WHERE password='$password'";
$resultado = mysqli_query($conexion, $sql);

// 5. Verificamos si encontramos una coincidencia exacta
if (mysqli_num_rows($resultado) > 0) {

    // Extraemos los datos del usuario que acaba de ingresar
    $fila = mysqli_fetch_assoc($resultado);

    // GUARDADO CLAVE: Guardamos el 'nombre' (ej: leandro) en la sesión dinámica
    $_SESSION['usuario_login'] = $fila['nombre'];
    $usuario = $fila['nombre'];

    // Renderizamos SweetAlert2 para la bienvenida profesional
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Procesando...</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>body { background-color: #f4f7fb; }</style>
    </head>
    <body>
        <script>
            Swal.fire({
                title: "¡Inicio de Sesión Exitoso!",
                text: "Bienvenido de nuevo, ' . htmlspecialchars($usuario) . '",
                icon: "success",
                confirmButtonColor: "#0d6efd", 
                confirmButtonText: "Ingresar al Panel",
                timer: 2500, 
                timerProgressBar: true,
                willClose: () => {
                    window.location.href = "index.php";
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "index.php";
                }
            });
        </script>
    </body>
    </html>';
    exit();

} else {
    // Si los datos no coinciden, mostramos el modal de error de forma estética
    echo '<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Error</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    </head>
    <body>
        <script>
            Swal.fire({
                title: "Error de Autenticación",
                text: "Usuario o contraseña incorrectos. Por favor, verifica.",
                icon: "error",
                confirmButtonColor: "#dc3545",
                confirmButtonText: "Intentarlo de nuevo"
            }).then(() => {
                window.location.href = "login.html";
            });
        </script>
    </body>
    </html>';
    exit();
}
?>