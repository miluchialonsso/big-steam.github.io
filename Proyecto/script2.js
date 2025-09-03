document.addEventListener("DOMContentLoaded", () => {
  const carritoLista = document.getElementById("carrito");
  const totalElemento = document.getElementById("total");
  const ticketContainer = document.getElementById("ticket");
  const ticketProductos = document.getElementById("ticket-productos");
  const ticketIdElement = document.getElementById("ticket-id");
  const ticketFechaElement = document.getElementById("ticket-fecha");
  const ticketPropietarioElement = document.getElementById("ticket-propietario");
  const ticketTotalElement = document.getElementById("ticket-total");
  const ticketMetodoElement = document.getElementById("ticket-metodo");
  const nombreComprador = window.nombreComprador;
  const carrito = window.carrito || [];

  function guardarCarritoEnServidor() {
    fetch("guardar_carrito.php", {
      method: "POST",
      headers: { "Content-Type": "application/json" },
      body: JSON.stringify(carrito)
    })
    .then(response => response.text())
    .then(data => console.log("✔ Carrito guardado:", data))
    .catch(error => console.error("❌ Error al guardar:", error));
  }

  function actualizarCarrito() {
    carritoLista.innerHTML = "";
    let total = 0;

    carrito.forEach((producto, index) => {
      total += producto.precio;
      const item = document.createElement("li");
      item.textContent = `${producto.nombre} - $${producto.precio}`;
      const botonEliminar = document.createElement("button");
      botonEliminar.textContent = "❌";
      botonEliminar.addEventListener("click", () => {
        carrito.splice(index, 1);
        actualizarCarrito();
      });
      item.appendChild(botonEliminar);
      carritoLista.appendChild(item);
    });

    totalElemento.textContent = total;
    guardarCarritoEnServidor();
  }

  document.querySelectorAll(".btn-agregar").forEach((boton) => {
    boton.addEventListener("click", () => {
      const producto = boton.parentElement;
      const nombre = producto.dataset.nombre;
      const precio = parseFloat(producto.dataset.precio);
      carrito.push({ nombre, precio });
      actualizarCarrito();
    });
  });

  document.getElementById("vaciar-carrito").addEventListener("click", () => {
    carrito.length = 0;
    actualizarCarrito();
  });
guardarCarritoEnServidor();
  document.getElementById("realizar-pago").addEventListener("click", () => {
    console.log("🟢 Botón de pago presionado");

    if (carrito.length === 0) {
      alert("El carrito está vacío. Agrega productos antes de pagar.");
      return;
    }

    

    const metodoPago = document.querySelector('input[name="metodo-pago"]:checked').value;
    const ticketId = "TCK-" + Math.floor(Math.random() * 1000000);
    const fecha = new Date().toLocaleString();

    ticketIdElement.textContent = `Ticket ID: ${ticketId}`;
    ticketFechaElement.textContent = `Fecha: ${fecha}`;
    ticketPropietarioElement.textContent = `Cliente: ${nombreComprador}`;
    ticketTotalElement.textContent = totalElemento.textContent;
    ticketMetodoElement.textContent = metodoPago === "transferencia"
      ? "Pago por transferencia - Alias: big-steam.tec"
      : "Pago en efectivo - Dirección: Malvinas 1715";

    ticketProductos.innerHTML = "";
    carrito.forEach((producto) => {
      const item = document.createElement("li");
      item.textContent = `${producto.nombre} - $${producto.precio}`;
      ticketProductos.appendChild(item);
    });

    ticketContainer.style.display = "block";
    alert(
      metodoPago === "transferencia"
        ? "Pago realizado con éxito. ¡Gracias por tu compra!"
        : "Compra registrada. Presenta tu ticket en la sucursal."
    );
    const botonImprimir = document.getElementById("imprimir-ticket");
const botonWhatsappExistente = document.getElementById("boton-whatsapp");

if (botonImprimir) botonImprimir.style.display = "inline-block";
if (botonWhatsappExistente) botonWhatsappExistente.style.display = "inline-block";

if (metodoPago === "transferencia") {
  if (botonImprimir) botonImprimir.style.display = "none";
} else {
  if (botonWhatsappExistente) botonWhatsappExistente.style.display = "none";
}

const mensajeExtra = document.createElement("p");
mensajeExtra.style.marginTop = "10px";
mensajeExtra.style.color = "#074b13";
mensajeExtra.style.fontWeight = "bold";

if (metodoPago === "transferencia") {
  mensajeExtra.textContent = "📲 En breve contestaremos para verificar tu pago!!!";

  const nombreEncoded = encodeURIComponent(nombreComprador);
  const mensaje = `Hola,%20soy%20${nombreEncoded},%20adjunto%20mi%20comprobante%20de%20transferencia%20para%20el%20Ticket%20ID%20${ticketId}.%20El%20monto%20total%20es%20de%20${totalElemento.textContent}%20ARS.%20Gracias.`;

  const botonWhatsapp = document.createElement("a");
  botonWhatsapp.href = `https://wa.me/541128476049?text=${mensaje}`;
  botonWhatsapp.textContent = "📤 Enviar Comprobante por WhatsApp";
  botonWhatsapp.id = "boton-whatsapp";
  botonWhatsapp.target = "_blank";

  botonWhatsapp.style.display = "inline-block";
  botonWhatsapp.style.marginTop = "10px";
  botonWhatsapp.style.padding = "8px 12px";
  botonWhatsapp.style.backgroundColor = "#25D366";
  botonWhatsapp.style.color = "#fff";
  botonWhatsapp.style.textDecoration = "none";
  botonWhatsapp.style.fontWeight = "bold";
  botonWhatsapp.style.borderRadius = "5px";
  botonWhatsapp.style.boxShadow = "0 2px 6px rgba(0,0,0,0.2)";

  ticketContainer.querySelector(".ticket").appendChild(botonWhatsapp);
} else {
  mensajeExtra.textContent = "🏢 Presenta este ticket en la sucursal para completar tu compra.";
}

const mensajePrevio = ticketContainer.querySelector(".mensaje-extra");
if (mensajePrevio) mensajePrevio.remove();

mensajeExtra.classList.add("mensaje-extra");
ticketContainer.querySelector(".ticket").appendChild(mensajeExtra);


  });

  document.getElementById("imprimir-ticket").addEventListener("click", () => {
    window.print();
  });

  // Render inicial si carrito ya tiene productos
  if (carrito.length > 0) actualizarCarrito();
});