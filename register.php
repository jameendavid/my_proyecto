<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Encriptar contraseña

    $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$contrasena')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
