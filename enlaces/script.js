// Capturamos el formulario y el mensaje de éxito
const form = document.getElementById("contacto-form");
const mensajeExito = document.getElementById("mensaje-exito");

// Evento al enviar el formulario
form.addEventListener("submit", function(event) {
  event.preventDefault(); // Evita que se recargue la página

  // Verifica si todos los campos cumplen las validaciones HTML5
  if (form.checkValidity()) {
    // Mostrar mensaje de éxito con animación
    mensajeExito.style.display = "block";
    mensajeExito.style.opacity = "0";
    setTimeout(() => {
      mensajeExito.style.opacity = "1";
    }, 100);

    // Limpiar el formulario
    form.reset();

    // Ocultar el mensaje después de unos segundos
    setTimeout(() => {
      mensajeExito.style.opacity = "0";
      setTimeout(() => {
        mensajeExito.style.display = "none";
      }, 500);
    }, 4000); // visible durante 4 segundos
  } else {
    // Si hay errores, muestra alerta
    alert("Por favor, revisa los campos: nombre, teléfono y descripción.");
  }
});
