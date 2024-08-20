<?php
// Configuración de la base de datos
$host = "localhost";
$user = "vida_azul"; // Cambiar si es necesario
$password = "vidaazul"; // Cambiar si es necesario
$database = "vida_azul";

// Crear conexión
$conexion = new mysqli($host, $user, $password, $database,"3307");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Establecer el conjunto de caracteres para la conexión
$conexion->set_charset("utf8mb4");
?>