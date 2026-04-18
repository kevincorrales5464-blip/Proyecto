document.getElementById("contacto-form").addEventListener("submit", function(event) {
  event.preventDefault(); // Evita envío inmediato

  if (this.checkValidity()) {
    document.getElementById("mensaje-exito").style.display = "block";
    this.reset(); // Limpia el formulario
  } else {
    alert("Por favor, revisa los campos: nombre, teléfono y descripción.");
  }
});

