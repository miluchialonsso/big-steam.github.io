<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  header("Location: login.html");
  exit;
}
?>

<h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h2>
<p>Tu sesión está activa. Ya podés acceder a los módulos disponibles.</p>