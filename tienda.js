const productos = [
  { nombre: "Kit Restauración", precio: 250000 },
  { nombre: "Kit Detailing", precio: 90000 },
  { nombre: "Kit Lavado", precio: 120000 }
];

let carrito = [];

// Mostrar productos
function mostrarProductos() {
  const lista = document.getElementById("lista-productos");
  lista.innerHTML = "";

  productos.forEach((prod, i) => {
    lista.innerHTML += `
      <div class="col-md-4">
        <div class="futuristic-card p-3 text-center">
          <h5>${prod.nombre}</h5>
          <p>$${prod.precio}</p>

          <input type="number" id="cant-${i}" value="1" min="1" class="form-control mb-2">

          <button class="btn btn-custom" onclick="agregar(${i})">
            Comprar
          </button>
        </div>
      </div>
    `;
  });
}

// Agregar al carrito
function agregar(i) {
  const cantidad = parseInt(document.getElementById(`cant-${i}`).value);
  const prod = productos[i];

  if (cantidad <= 0) return;

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