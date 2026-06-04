<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <style>
        body {
            font-family: 'Segoe UI';
            background: #0f172a;
            color: white;
            margin: 0;
        }

        .navbar {
            background: #1e293b;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }

        .container {
            padding: 40px;
            text-align: center;
        }

        .card {
            background: #1e293b;
            padding: 30px;
            border-radius: 10px;
            display: inline-block;
        }

        .btn {
            background: #ef4444;
            padding: 8px 15px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div>RepinCar</div>

    <div>
        <a href="usuarios.php">Usuarios</a>
        <a href="logout.php" class="btn">Cerrar sesión</a>
    </div>
</div>

<div class="container">
    <div class="card">
        <h2>Bienvenido <?php echo $_SESSION['usuario']; ?> 👋</h2>
        <p>Panel de administración</p>
    </div>
</div>

</body>
</html>