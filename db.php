<?php
$servername = "localhost";
$username = "root"; // Por defecto en XAMPP
$password = ""; // Por defecto en XAMPP
$dbname = "usuarios_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
