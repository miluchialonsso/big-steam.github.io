<?php
session_start();
session_destroy(); // Cierra la sesión por completo

header("Location: login.html"); // Redirige al login
exit;
?>