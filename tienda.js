const productos = [
  { nombre: "Kit de Limpieza", precio: 50000 },
  { nombre: "Kit Partes Negras", precio: 70000 },
  { nombre: "Kit de Brillado", precio: 90000 }
];

let carrito = [];

// Mostrar productos
function mostrarProductos() {
  const contenedor = document.getElementById("productos");

  productos.forEach((prod, i) => {
    contenedor.innerHTML += `
      <div class="card">
        <h3>${prod.nombre}</h3>
        <p>Precio: $${prod.precio}</p>

        <input type="number" id="cant-${i}" value="1" min="1">

        <button onclick="agregar(${i})">Agregar</button>
      </div>
    `;
  });
}

// Agregar al carrito
function agregar(i) {
  const cantidad = parseInt(document.getElementById(`cant-${i}`).value);
  const prod = productos[i];

  carrito.push({
    nombre: prod.nombre,
    precio: prod.precio,
    cantidad: cantidad
  });

  actualizarCarrito();
}

// Mostrar carrito
function actualizarCarrito() {
  const div = document.getElementById("carrito");
  const totalDiv = document.getElementById("total");

  div.innerHTML = "";
  let total = 0;

  carrito.forEach((item, i) => {
    const subtotal = item.precio * item.cantidad;
    total += subtotal;

    div.innerHTML += `
      <div>
        ${item.nombre} x${item.cantidad} - $${subtotal}
        <button onclick="eliminar(${i})">X</button>
      </div>
    `;
  });

  totalDiv.textContent = "Total: $" + total;
}

// Eliminar producto
function eliminar(i) {
  carrito.splice(i, 1);
  actualizarCarrito();
}

// Finalizar compra
function comprar() {
  if (carrito.length === 0) {
    alert("El carrito está vacío");
    return;
  }

  alert("Compra realizada con éxito 🚗✨");
  carrito = [];
  actualizarCarrito();
}

// Inicializar
mostrarProductos();