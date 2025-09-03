<?php
include("conexion.php");

$usuario = $_POST['nombre_usuario'];
$clave_plana = $_POST['contrasena'];

$clave_segura = password_hash($clave_plana, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre_usuario, contrasena) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $clave_segura);
$stmt->execute();

echo "✅ Usuario registrado correctamente.";
?>