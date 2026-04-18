// Lista de productos simulada
const productos = [
  { nombre: "kit piezas mate", precio: 120000, stock: 15 },
  { nombre: "Kit restauración partes negras", precio: 250000, stock: 8 },
  { nombre: "kit detalling", precio: 90000, stock: 20 }
];

// Carrito vacío
let carrito = [];

// Mostrar productos
function mostrarProductos() {
  const contenedor = document.getElementById("lista-productos");
  contenedor.innerHTML = "";

  productos.forEach((prod, index) => {
    contenedor.innerHTML += `
      <div class="col-md-4">
        <div class="card futuristic-card shadow">
          <div class="card-body">
            <h5 class="card-title">${prod.nombre}</h5>
            <p class="card-text">Precio: $${prod.precio.toLocaleString("es-CO")}</p>
            <p class="card-text">Disponibles: ${prod.stock}</p>
            <label for="cantidad-${index}">Cantidad:</label>
            <input type="number" id="cantidad-${index}" min="1" max="${prod.stock}" value="1" class="form-control mb-2">
            <button class="btn btn-custom" onclick="agregarAlCarrito(${index})">Agregar al carrito</button>
          </div>
        </div>
      </div>
    `;
  });
}

// Agregar producto al carrito
function agregarAlCarrito(index) {
  const input = document.getElementById(`cantidad-${index}`);
  const cantidad = parseInt(input.value);
  const producto = productos[index];

  if (!isNaN(cantidad) && cantidad > 0 && cantidad <= producto.stock) {
    
    // Verificar si el producto ya está en el carrito
    const existente = carrito.find(item => item.nombre === producto.nombre);

    if (existente) {
      existente.cantidad += cantidad;
    } else {
      carrito.push({ ...producto, cantidad });
    }

    actualizarCarrito();

  } else {
    alert("Cantidad inválida");
  }
}
