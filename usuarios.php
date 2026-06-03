<?php
include 'conexion.php';

$sql = "SELECT * FROM usuarios";
$resultado = mysqli_query($conexion, $sql);

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Usuario</th><th>Email</th><th>Acciones</th></tr>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
            <td>{$fila['id']}</td>
            <td>{$fila['usuario']}</td>
            <td>{$fila['email']}</td>
            <td>
                <button onclick='editarUsuario({$fila['id']}, \"{$fila['usuario']}\", \"{$fila['email']}\")'>Editar</button>
                <button onclick='eliminarUsuario({$fila['id']})'>Eliminar</button>
            </td>
        </tr>";
}

echo "</table>";
mysqli_close($conexion);
?>