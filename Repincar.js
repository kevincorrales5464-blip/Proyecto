// Ejemplo: mostrar secciones dinámicamente
function mostrarSeccion(id) {
  document.querySelectorAll("section.active")
    .forEach(sec => sec.classList.remove("active"));

  const seccion = document.getElementById(id);
  if (seccion) {
    seccion.classList.add("active");
  }
}
