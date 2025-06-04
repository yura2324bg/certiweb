<?php
include("bd.php");

$token = $_GET['token'] ?? '';

if (empty($token)) {
    die("Token inválido.");
}

// Buscar el token en la base de datos
$stmt = $conn->prepare("SELECT * FROM usuarios WHERE token_recuperacion = ?");
$stmt->bind_param("s", $token);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 0) {
    die("Token no válido o expirado.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Restablecer Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">

    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h4 class="text-center mb-4">Restablecer Contraseña</h4>
        <form method="POST" action="procesar_nueva_contrasena.php">
            <input type="hidden" name="token" value="<?php echo htmlspecialchars($token); ?>">
            <div class="mb-3">
                <label for="nueva" class="form-label">Nueva contraseña</label>
                <input type="password" class="form-control" id="nueva" name="nueva" required>
            </div>
            <div class="mb-3">
                <label for="confirmar" class="form-label">Confirmar contraseña</label>
                <input type="password" class="form-control" id="confirmar" name="confirmar" required>
            </div>
            <button type="submit" class="btn btn-success w-100">Actualizar contraseña</button>
        </form>
    </div>

</body>
</html>
