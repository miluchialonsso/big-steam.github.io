<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BigSteam-WEB</title>
  <link rel="stylesheet" href="estilomonitoreo.css">
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
<div class="datos-sensores" id="datos-sensores">
  <h3>Datos Recolectados</h3>
  <ul>
    <li>Temperatura: <span id="temp"></span> °C</li>
    <li>Humedad: <span id="humedad"></span> %</li>
    <li>pH: <span id="ph"></span></li>
    <li>Nivel de agua: <span id="nivel-agua"></span></li>
  </ul>
</div>
<div style="text-align: center;">
<select id="cultivo-select">
  <option value="tomate">Tomate</option>
  <option value="lechuga">Lechuga</option>
  <option value="zanahoria">Zanahoria</option>
  <!-- histórico dinámico -->
</select>

<button id="agregar-cultivo">+ Más</button>
</div>
<div style="text-align: center; margin-top: 10px;">
  <button id="enviar-parametros">Enviar parámetros al ESP32</button>
</div>
<!-- formulario emergente -->
<div id="formulario-cultivo" style="display:none;">
  <input type="text" id="nuevo-cultivo" placeholder="Nombre del cultivo">
  <input type="number" id="param-temp" placeholder="Temperatura ideal">
  <input type="number" id="param-humedad" placeholder="Humedad ideal">
  <input type="number" id="param-ph" placeholder="pH ideal">
  <button id="guardar-cultivo">Guardar</button>
</div>
<div id="mensaje-agradecimiento" style="display:none;">
  <p>Gracias por expandir la lista de opciones!</p>
  <p><a href="#" id="volver">Volver</a></p>
</div>

<section class="final">
  <hr>
  <div class="social-icons">
    <hr><br>
    <ul>
      <li>
        <a href="https://www.facebook.com/profile.php?id=61576969275347&mibextid=ZbWKwL" target="_blank">
          <img src="facebook.jpeg" alt="Facebook">
          <span>Big-Steam</span>
        </a>
      </li>
      <li>
        <a href="https://x.com/Big_Steam_Tec?t=pg7gP0OqniQ8XWARjt7xoQ&s=08" target="_blank">
          <img src="x.jpeg" alt="Twitter">
          <span>Big_Steam_Tec</span>
        </a>
      </li>
      <li>
        <a href="https://www.instagram.com/big.steam_tec/" target="_blank">
          <img src="instagram1.jpeg" alt="Instagram">
          <span>@big.steam_tec</span>
        </a>
      </li>
    </ul>
  </div>
</section>
<a href="logout.php" class="Cerrar">Cerrar sesión</a>

<script src="script3.js"></script>
</body>
</html>