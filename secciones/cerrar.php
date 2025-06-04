<?php
session_start();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrando sesión...</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<script>
Swal.fire({
    title: "Sesión cerrada",
    text: "Tu sesión se ha cerrado correctamente. ¡Vuelve pronto!",
    icon: "success",
    timer: 3000,
    showConfirmButton: false
}).then(() => {
    window.location.href = "../index.php";
});
</script>
</body>
</html>
