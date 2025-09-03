<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: ../login/login.html");
  exit;
}

$usuario = $_SESSION['usuario'];
include("conexion.php");

$carritoGuardado = "[]"; // Valor por defecto

$sql = "SELECT datos FROM carritos WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$stmt->bind_result($datos);
if ($stmt->fetch()) {
  $carritoGuardado = $datos;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <title>BigSteam-WEB</title>
  <link rel="stylesheet" href="estilocompra.css" />

  <script>
    window.nombreComprador = <?php echo json_encode($usuario); ?>;
    window.carrito = <?php echo json_encode(json_decode($carritoGuardado)); ?>;
  </script>
</head>

<body>
  <div class="menu-container">
    <a href="index.php" class="logo">Big-Steam</a>
    <input type="checkbox" id="menu">
    <label for="menu">
      <a href="index.php"><img src="hoja_logo.jpeg" class="menu-icono" alt="Logo Big-Steam"></a>
    </label>
    <nav class="navbar">
      <a href="compra.php">Compra</a> |
      <a href="monitoreo.php">Monitoreo</a>
    </nav>
  </div>

<section class="productos">
  <div class="producto" data-nombre="Producto 1" data-precio="100000">
    <img src="huerta.jpeg" alt="">
    <h2>BIG-STEAM</h2>
    <p class="descripcion">Huerta hidroponica completa.</p>
    <p class="precio">$100.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>

  <div class="producto" data-nombre="Producto 2" data-precio="86000">
    <img src="huerta.jpeg" alt="">
    <h2>BIG-STEAM 2.0</h2>
    <p class="descripcion">Huerta hidroponica completa (sin codificacion)</p>
    <p class="precio">$86.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>
  <div class="producto" data-nombre="Producto 3" data-precio="20000">
    <img src="cajon.jpeg" alt="">
    <h2>Base de madera.</h2>
    <p class="descripcion">Huerta hidroponica completa (sin codificacion)</p>
    <p class="precio">$20.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>
  <div class="producto" data-nombre="Producto 4" data-precio="50000">
    <img src="tecnico.jpeg" alt="">
    <h2>Tecnico.</h2>
    <p class="descripcion">Paquete de contratacion de arreglo digital.</p>
    <p class="precio">$50.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>
  <div class="producto" data-nombre="Producto 5" data-precio="20000">
    <img src="bombaagua.jpeg" alt="">
    <h2>Bomba de agua.</h2>
    <p class="descripcion">Bomba de agua con sus conectores.</p>
    <p class="precio">$20.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>
  <div class="producto" data-nombre="Producto 6" data-precio="6000">
    <img src="cañospvc.jpeg" alt="">
    <h2>Caños de PVC.</h2>
    <p class="descripcion">x3 caños PVC (medida estandar).</p>
    <p class="precio">$6.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>
  <div class="producto" data-nombre="Producto 7" data-precio="4000">
    <img src="codospvc.jpeg" alt="">
    <h2>Codos de caño PVC.</h2>
    <p class="descripcion">x3 codos de caño PVC.</p>
    <p class="precio">$4.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>
  <div class="producto" data-nombre="Producto 8" data-precio="20000">
    <img src="esp32.jpeg" alt="">
    <h2>ESP32.</h2>
    <p class="descripcion">Microcontrolador con codigo previamente cargado.</p>
    <p class="precio">$20.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>
  <div class="producto" data-nombre="Producto 9" data-precio="5000">
    <img src="lampara.jpeg" alt="">
    <h2>Lampara de calor.</h2>
    <p class="descripcion">Lampara que genera calor por si sola.</p>
    <p class="precio">$5.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>
  <div class="producto" data-nombre="Producto 10" data-precio="3000">
    <img src="macetas.jpeg" alt="">
    <h2>Macetas.</h2>
    <p class="descripcion"> x10 macetas canasta para hidroponia.</p>
    <p class="precio">$3.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>
  <div class="producto" data-nombre="Producto 11" data-precio="20000">
    <img src="nutrientes.jpeg" alt="">
    <h2>Nutrientes.</h2>
    <p class="descripcion">Nutrientes que se disuelven en agua.</p>
    <p class="precio">$20.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>
  <div class="producto" data-nombre="Producto 12" data-precio="10000">
    <img src="plastico.jpeg" alt="">
    <h2>Nylon agricola.</h2>
    <p class="descripcion">Nylon agricola cristal para hidropinia.</p>
    <p class="precio">$10.000</p>
    <button class="btn-agregar">Añadir al carrito</button>
  </div>
  

</section>

<div class="carrito-container">
  <h2>Carrito de Compras</h2>
  <ul id="carrito"></ul>
  <p>Total: <span id="total">0</span> ARS</p>
  <button id="vaciar-carrito">Vaciar carrito</button>
  <h2>Opciones de Pago</h2>
  <label>
    <input type="radio" name="metodo-pago" value="transferencia" checked> Transferencia
  </label>
  <label>
    <input type="radio" name="metodo-pago" value="efectivo"> Efectivo en sucursal
  </label>
  
 <button id="realizar-pago">Realizar Pago</button>

  <div class="ticket-container" id="ticket" style="display: none;">
    <div class="ticket">
      <h2>Big-Steam - Ticket de Compra</h2>
      <p id="ticket-id"></p>
      <p id="ticket-fecha"></p>
      <p id="ticket-propietario"></p>
      <ul id="ticket-productos"></ul>
      <p>Total: <span id="ticket-total"></span> ARS</p>
      <p id="ticket-metodo"></p>
      <button id="imprimir-ticket">Imprimir Ticket</button>
    </div>
  </div>

</div>



 <section class="final">
    <hr>
  <div class="social-icons">
    <hr>
    <br>
    <ul>
   <li><a href="https://www.facebook.com/profile.php?id=61576969275347&mibextid=ZbWKwL" target="_blank">
        <img src="facebook.jpeg" alt="Facebook">
        <span>Big-Steam</span>
    </li> </a>
    <li><a href="https://x.com/Big_Steam_Tec?t=pg7gP0OqniQ8XWARjt7xoQ&s=08" target="_blank">
        <img src="x.jpeg" alt="Twitter">
        <span>Big_Steam_Tec</span>
    </li></a>
    <li><a href="https://www.instagram.com/big.steam_tec/" target="_blank">
        <img src="instagram1.jpeg" alt="Instagram">
        <span >@big.steam_tec</span>
    </li></a></ul>
</div>


 </section>
<a href="logout.php" class="Cerrar">Cerrar sesión</a>
<script src="script2.js" defer></script>
</body>
</html>