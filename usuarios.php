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

<h1>Usuarios registrados</h1>

<div id="noti" class="noti"></div>
<input type="text" id="buscador" placeholder="Buscar usuario..." class="buscador">

<button onclick="window.location.href='login.php'">
    ← Volver al Login
</button>

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

    <button onclick="eliminarUsuario(<?= $fila['id'] ?>)">Eliminar</button>
</td>
</tr>
<?php endwhile; ?>
</table>

<div id="modal" class="modal">
  <div class="modal-content">
    <span class="cerrar" onclick="cerrarModal()">&times;</span>
    

    <h3>Editar Usuario</h3>

    <form id="formEditar" method="POST">
      <input type="hidden" name="id" id="id">

      <input type="text" name="usuario" id="usuario" placeholder="Usuario">
      <input type="email" name="email" id="email" placeholder="Email">
      <input type="text" name="password" id="password" placeholder="Password">

      <button type="submit">Actualizar</button>
    </form>
  </div>
</div>

<script>
    document.getElementById("formEditar").addEventListener("submit", function(e) {
    e.preventDefault();

    let formData = new FormData(this);

    fetch("actualizar.php", {
        method: "POST",
        body: formData
    })
    .then(res => res.text())
    .then(data => {

        if (data.trim() === "ok") {

            mostrarNotificacion("Usuario actualizado ✅");

            cerrarModal();

            setTimeout(() => {
                location.reload(); // luego lo quitamos si quieres full dinámico
            }, 1000);

        } else {
            mostrarNotificacion("Error al actualizar ❌");
        }

    });
});

    document.getElementById("buscador").addEventListener("keyup", function() {
    let filtro = this.value.toLowerCase();
    let filas = document.querySelectorAll("table tr");

    filas.forEach((fila, index) => {
        if (index === 0) return;

        let texto = fila.innerText.toLowerCase();
        fila.style.display = texto.includes(filtro) ? "" : "none";
    });
});
    function mostrarNotificacion(mensaje) {
    let noti = document.getElementById("noti");

    noti.innerText = mensaje;
    noti.style.display = "block";

    setTimeout(() => {
        noti.style.display = "none";
    }, 2000);
}
    function eliminarUsuario(id) {
    if (confirm("¿Seguro que deseas eliminar este usuario?")) {
        window.location.href = "eliminar.php?id=" + id;
    }
}
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