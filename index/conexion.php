<?php
$host = "localhost";            // o la IP de tu servidor
$usuario = "root";              // tu usuario de MySQL
$contrasena = "";               // tu contraseña
$base_de_datos = "login_db";    // el nombre de tu base de datos

$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar conexión
if ($conn->connect_error) {
  die("❌ Error de conexión: " . $conn->connect_error);
}
?>