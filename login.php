<?php session_start(); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Repincar</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Inicio de sesión</h2>
<p>REPINCAR</p> 

<form action="validar_login.php" method="post">
    <input type="text" name="username" placeholder="Usuario" required><br><br>
    <input type="password" name="password" placeholder="Contraseña" required><br><br>
    <button type="submit" value="Iniciar sesión">Iniciar sesión</button>
</form>

<p id="mensaje"></p>

<h3>Registrar nuevo usuario</h3>

<input type="text" id="nuevo_usuario" placeholder="Usuario"><br>
<input type="email" id="nuevo_email" placeholder="Email"><br>
<input type="password" id="nueva_contraseña" placeholder="Contraseña"><br>
<button onclick="registrarUsuario()">Registrar</button>

<script src="js/ajax.js"></script>

<h3>Usuarios registrados</h3>
<div id="tablaUsuarios"></div>

<script>
cargarUsuarios();
</script>


</body>
</html>