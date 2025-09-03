<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  http_response_code(401); // No autorizado
  exit;
}

include("conexion.php");

$usuario = $_SESSION['usuario'];
$carritoJson = file_get_contents("php://input");

// Verificamos si ya existe un carrito para este usuario
$sql_check = "SELECT id FROM carritos WHERE usuario = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $usuario);
$stmt_check->execute();
$stmt_check->store_result();

if ($stmt_check->num_rows > 0) {
  // Actualizar carrito existente
  $stmt_check->bind_result($id);
  $stmt_check->fetch();

  $sql_update = "UPDATE carritos SET datos = ?, actualizado = NOW() WHERE id = ?";
  $stmt_update = $conn->prepare($sql_update);
  $stmt_update->bind_param("si", $carritoJson, $id);
  $stmt_update->execute();
} else {
  // Insertar nuevo carrito
  $sql_insert = "INSERT INTO carritos (usuario, datos) VALUES (?, ?)";
  $stmt_insert = $conn->prepare($sql_insert);
  $stmt_insert->bind_param("ss", $usuario, $carritoJson);
  $stmt_insert->execute();
}

echo "Carrito guardado correctamente";
?>