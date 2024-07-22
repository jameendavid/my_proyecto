<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    $sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar la contraseña
        if (password_verify($contrasena, $row['contrasena'])) {
            echo "Autenticación satisfactoria";
        } else {
            echo "Error en la autenticación: Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form action="login.php" method="POST">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        <br>
        <input type="submit" value="Iniciar Sesión">
    </form>
</body>
</html>


<?php
include 'db.php';

$usuario = 'testuser'; // Cambia esto por el usuario deseado
$nueva_contrasena = 'password123'; // Cambia esto por la nueva contraseña deseada
$hash_contrasena = password_hash($nueva_contrasena, PASSWORD_DEFAULT);

// Verifica si el usuario ya existe
$sql = "SELECT * FROM usuarios WHERE usuario='$usuario'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // El usuario ya existe, actualiza la contraseña
    $sql = "UPDATE usuarios SET contrasena='$hash_contrasena' WHERE usuario='$usuario'";
} else {
    // El usuario no existe, inserta uno nuevo
    $sql = "INSERT INTO usuarios (usuario, contrasena) VALUES ('$usuario', '$hash_contrasena')";
}

if ($conn->query($sql) === TRUE) {
    echo "Operación exitosa.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
