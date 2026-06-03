<?php
include("conexion.php");

$sql = "SELECT * FROM usuarios";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="estilo.css">
<title>Usuarios</title>
</head>
<body>

<h2>Usuarios registrados</h2>

<table>
<tr>
<th>ID</th>
<th>Usuario</th>
<th>Email</th>
<th>Acciones</th>
</tr>

<?php while($fila = $resultado->fetch_assoc()): ?>
<tr>
<td><?= $fila['id'] ?></td>
<td><?= $fila['usuario'] ?></td>
<td><?= $fila['email'] ?></td>
<td>
    <a href="editar.php?id=<?= $fila['id'] ?>">Editar</a>
    <a href="eliminar.php?id=<?= $fila['id'] ?>">Eliminar</a>
</td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>