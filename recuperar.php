<?php
include("bd.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    header('Content-Type: application/json');

    $correo = $_POST['correo'] ?? '';

    if (empty($correo)) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'El correo es requerido.']);
        exit;
    }

    // Verificar si existe el correo
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE correo = ?");
    $stmt->bind_param("s", $correo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        echo json_encode(['estado' => 'error', 'mensaje' => 'El correo no está registrado.']);
        exit;
    }

    // Generar token
    $token = bin2hex(random_bytes(16));

    // Guardar el token en la base de datos
    $update = $conn->prepare("UPDATE usuarios SET token_recuperacion = ? WHERE correo = ?");
    $update->bind_param("ss", $token, $correo);
    $update->execute();

    // Generar enlace
    $enlace = "http://localhost/tu-proyecto/recuperar.php?token=" . $token;

    // Simulación de envío de correo (realmente necesitas configurar un servidor SMTP o usar PHPMailer)
    mail($correo, "Recuperar contraseña", "Haz clic en este enlace: $enlace", "From: no-reply@tu-sitio.com");

    echo json_encode(['estado' => 'ok', 'mensaje' => 'Te hemos enviado un enlace a tu correo.', 'enlace' => $enlace]);
    exit;
}
?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Recuperar Contraseña</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center justify-content-center min-vh-100">

    <div class="card shadow p-4" style="max-width: 400px; width: 100%;">
        <h4 class="text-center mb-4">Recuperar Contraseña</h4>
        <form id="formRecuperar">
            <div class="mb-3">
                <label for="correo" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="correo" name="correo" placeholder="ejemplo@correo.com" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Enviar instrucciones</button>
        </form>
        <div class="text-center mt-3">
            <a href="index.php">Volver al inicio de sesión</a>
        </div>
    </div>

    <script>
    document.getElementById("formRecuperar").addEventListener("submit", function (e) {
        e.preventDefault();

        const datos = new FormData(this);

        fetch("recuperar.php", {
            method: "POST",
            body: datos
        })
        .then(res => res.json())
        .then(respuesta => {
            alert(respuesta.mensaje);
            if (respuesta.estado === "ok" && respuesta.enlace) {
                console.log("🔗 Enlace de recuperación:", respuesta.enlace); // Mostrar el enlace en consola
            }
        })
        .catch(error => console.error("Error:", error));
    });
    </script>

</body>
</html>