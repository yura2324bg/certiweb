<?php
include("bd.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $token = $_POST['token'] ?? '';
    $nueva = $_POST['nueva'] ?? '';
    $confirmar = $_POST['confirmar'] ?? '';

    if (empty($token) || empty($nueva) || empty($confirmar)) {
        die("Todos los campos son obligatorios.");
    }

    if ($nueva !== $confirmar) {
        die("Las contraseñas no coinciden."); 
    }

    // Buscar el usuario con ese token
    $stmt = $conn->prepare("SELECT id FROM usuarios WHERE token_recuperacion = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 0) {
        die("Token inválido o expirado.");
    }

    $usuario = $resultado->fetch_assoc();
    $id_usuario = $usuario['id'];

    // Encriptar la nueva contraseña
    $nueva_hash = password_hash($nueva, PASSWORD_DEFAULT);

    // Actualizar contraseña y eliminar el token
    $update = $conn->prepare("UPDATE usuarios SET contrasena = ?, token_recuperacion = NULL WHERE id = ?");
    $update->bind_param("si", $nueva_hash, $id_usuario);
    $update->execute();

    echo "✅ Contraseña actualizada correctamente. <a href='index.php'>Iniciar sesión</a>";
    exit;
} else {
    echo "Método no permitido.";
}
?>
