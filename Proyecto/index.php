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
  <link rel="stylesheet" href="estilo.css">
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

<hr>

<header class="header">
  <div class="header-content container">
    <div class="header-txt">
      <h1>Big-Steam</h1>
      <span>El futuro nos necesita</span>
      <p>Descubre una alternativa ecológica que no solo cuida el planeta, sino que también protege tu salud.</p>
      <p>¿Estás listo para ser parte del cambio?</p>
      <a href="informacion.html" class="btn-1-1">Información</a>

      <?php if (isset($_SESSION['usuario'])): ?>
        <p class="bienvenida">👋 Hola <strong><?php echo $_SESSION['usuario']; ?></strong>, tu sesión está activa.</p>
      <?php endif; ?>
    </div>

    <div class="header-dir">
      <div class="dir">
        <h3>Dirección</h3>
        <p>Malvinas 1715</p>
      </div>
      <div class="dir">
        <h3>Teléfono</h3>
        <p>11 4051-9298</p>
      </div>
      <div class="dir">
        <h3>Horario</h3>
        <p>9am - 17:30pm</p>
      </div>
    </div>
  </div>
</header>

<hr>

<section class="welcome">
  <div class="welcome-1">
    <div class="carousel">
      <div class="carousel-container">
        <img src="huerta.jpeg" alt="Imagen 1">
        <img src="avance.jpeg" alt="Imagen 2">
        <img src="tecnico.jpeg" alt="Imagen 3">
      </div>
      <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
      <button class="next" onclick="moveSlide(1)">&#10095;</button>
    </div>
  </div>

  <div class="welcome-2">
    <h2>Bienvenidos a</h2>
    <h2>Big-Steam</h2>
    <p class="b1">
      BigSteam no solo transforma la manera de cultivar, sino que reinventa el futuro de la agricultura.
      Su innovadora estructura vertical optimiza el espacio y protege el suelo, eliminando el uso de insecticidas y químicos dañinos.
      A través de una nutrición pura con minerales esenciales diluidos en agua, ofrece un cultivo más saludable, eficiente y sostenible.
      Porque si no puedes olerlo… ¿realmente deberías comerlo?
    </p>
    <a href="vermas.html" class="btn-1">Ver más</a>
  </div>
</section>

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

<script src="script.js"></script>
</body>
</html>