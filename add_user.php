<?php
include 'db.php';

$usuario = 'testuser';
$contrasena = password_hash('password123', PASSWORD_DEFAULT); // Encriptar la contraseña

$sql = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$contrasena')";

if ($conn->query($sql) === TRUE) {
    echo "Usuario agregado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
