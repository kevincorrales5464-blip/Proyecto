<?php
include("conexion.php");

$sql = "SELECT * FROM usuarios";
$resultado = $conexion->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
<link rel="stylesheet" href="estilo.css">

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
    <button onclick="abrirModal(
        '<?= $fila['id'] ?>',
        '<?= $fila['usuario'] ?>',
        '<?= $fila['email'] ?>',
        '<?= $fila['password'] ?>'
    )">Editar</button>

    <a href="eliminar.php?id=<?= $fila['id'] ?>">Eliminar</a>
</td>
</tr>
<?php endwhile; ?>
</table>

<div id="modal" class="modal">
  <div class="modal-content">
    <span class="cerrar" onclick="cerrarModal()">&times;</span>

    <h3>Editar Usuario</h3>

    <form action="actualizar.php" method="POST">
      <input type="hidden" name="id" id="id">

      <input type="text" name="usuario" id="usuario" placeholder="Usuario">
      <input type="email" name="email" id="email" placeholder="Email">
      <input type="text" name="password" id="password" placeholder="Password">

      <button type="submit">Actualizar</button>
    </form>
  </div>
</div>

<script>
function abrirModal(id, usuario, email, password) {
    document.getElementById("modal").style.display = "flex";

    document.getElementById("id").value = id;
    document.getElementById("usuario").value = usuario;
    document.getElementById("email").value = email;
    document.getElementById("password").value = password;
}

function cerrarModal() {
    document.getElementById("modal").style.display = "none";
}
</script>

</body>
</html>