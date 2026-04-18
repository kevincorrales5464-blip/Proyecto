document.getElementById("contacto-form").addEventListener("submit", function(e) {
  e.preventDefault(); // evita recargar la página
  
  const mensaje = document.getElementById("mensaje-exito");
  mensaje.classList.add("visible");
  
  this.reset(); // limpia el formulario
  
  // ocultar mensaje después de unos segundos
  setTimeout(() => {
    mensaje.classList.remove("visible");
  }, 4000);
});
