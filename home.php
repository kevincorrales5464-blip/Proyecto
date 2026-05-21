<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: index.php");
    exit();
}  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="stileInicio.css">
</head>
<body>

<div class="container">

    <h2>Bienvenido <?php echo $_SESSION['usuario']; ?> </h2>
    <a href="logout.php"><button>Cerrar Sesión</button></a>
</div>

</body>
</html>