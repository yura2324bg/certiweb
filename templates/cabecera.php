<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location:../index.php');
    exit(); // Asegura que el script se detiene después de la redirección
}
?>

<!DOCTYPE html>
<html lang="es"> <!-- Cambié a español si es más adecuado -->
<head>
    <title>Aplicación de Certificados</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.3.2 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous" />

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="../templates/styles.css">
</head>
<body>
   <!-- 
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="index.php">
                <i class="bi bi-house"></i> Inicio
            </a>
            <a class="nav-link text-white" href="vista_alumnos.php">
                <i class="bi bi-people"></i> Alumnos
            </a>
            <a class="nav-link text-white" href="vista_cursos.php">
                <i class="bi bi-journal"></i> Cursos
            </a>
          
        </div>
    </nav>
-->

    <div class="container">
        <div class="row">
            <div class="col-12">
                <br/>
                <div class="row">
  
                    <!-- Contenido adicional aquí -->
                </div>
            </div>
        </div>
    </div>
 

    <!-- Bootstrap JS (colocado al final para mejorar rendimiento) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-kenU1KFdBIe4zVFrrzHxRgxBq43GfF1zI1ZT5e0GkEK2wEHRkCNRgHNXg6R9i4Rs" 
        crossorigin="anonymous"></script>
   



</body>
</html>


