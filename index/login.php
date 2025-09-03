<?php
session_start();
include("conexion.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $usuario = $_POST['nombre_usuario'] ?? null;
  $contrasena = $_POST['contrasena'] ?? null;

  if ($usuario && $contrasena) {
    $sql = "SELECT contrasena FROM usuarios WHERE nombre_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $stmt->bind_result($hash);
      $stmt->fetch();

      if (password_verify($contrasena, $hash)) {
        $_SESSION['usuario'] = $usuario;
        header("Location: index.php"); // redirige a la página principal
        exit;
      } else {
        echo "❌ Contraseña incorrecta.";
      }
    } else {
      echo "❌ Usuario no encontrado.";
    }
  } else {
    echo "⚠️ Faltan datos. Completá ambos campos.";
  }
} else {
  echo "⛔ Acceso no válido. Esta página se usa solo desde el formulario.";
}
?>