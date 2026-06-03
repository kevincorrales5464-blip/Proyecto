function registrar() {

  let usuario = document.getElementById("nuevo_usuario").value;
  let email = document.getElementById("nuevo_email").value;
  let password = document.getElementById("nueva_contraseña").value;

  let formData = new FormData();
  formData.append("usuario", usuario);
  formData.append("email", email);
  formData.append("password", password);

  fetch("registro_ajax.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(data => {
      alert(data);
      cargarUsuarios();
  });
}

function eliminarUsuario(id) {

  if (confirm("¿Estás seguro de eliminar este usuario?")) {
      return;
  }

  let formData = new FormData();
  formData.append("id", id);

  fetch("eliminar_usuario.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(data => {
      alert(data);
      cargarUsuarios();
  }); 
}

function editarUsuario(id, usuario, email) {

  let nuevoUsuario = prompt("Ingrese el nuevo nombre de usuario:", usuario);
  let nuevoEmail = prompt("Ingrese el nuevo email:", email);

  if (nuevoUsuario === null || nuevoEmail === null) return;

  let formData = new FormData();
  formData.append("id", id);
  formData.append("usuario", nuevoUsuario);
  formData.append("email", nuevoEmail);

  fetch("actualizar_usuario.php", {
    method: "POST",
    body: formData
  })
  .then(res => res.text())
  .then(data => {
      alert(data);
      cargarUsuarios();
  });
}

function cargarUsuarios() {
  fetch("usuarios.php")
    .then(res => res.text())
    .then(data => {
      document.getElementById("tablaUsuarios").innerHTML = data;
    });
}