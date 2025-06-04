<?php
session_start();

if ($_POST) {

    $mensaje='Usuario o contraseña incorrectos';

    if ($_POST['usuario'] == 'administrador' && $_POST['password'] == 'admin') {
        $_SESSION['usuario'] = $_POST['usuario'];
        
        header('Location: secciones/index.php');
    }
}
?>



<!doctype html>
<html lang="es">
<head>
    <title>Inicio de Sesión</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous"
    />
    <link rel="stylesheet" href="templates/styles.css">

    <style>
 body {
        background: linear-gradient(to bottom right, #87CEFA, #4682B4);
        font-family: 'Segoe UI', sans-serif;
    }

    .card {
        border-radius: 1rem;
    }

    .card-header {
        border-top-left-radius: 1rem;
        border-top-right-radius: 1rem;
    }

    a {
        color: #f8f9fa;
        transition: color 0.3s ease;
        text-decoration: none;
    }

    a:hover {
        color: #add8e6;
        text-decoration: underline;
    }
    </style>
</head>
<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-md-4">
            <form action="" method="post">
                <div class="card shadow-lg border-0">
                    <div class="card-header text-center bg-primary text-white">
                        <h5 class="mb-0">Inicio de Sesión</h5>
                    </div>
                    <div class="card-body">

                        <?php if (isset($mensaje)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <strong><?php echo $mensaje; ?></strong>
                            </div>
                        <?php } ?>

                        <div class="mb-3">
                            <label for="usuario" class="form-label">Usuario</label>
                            <input
                                type="text"
                                class="form-control"
                                name="usuario"
                                id="usuario"
                                placeholder="Usuario"
                            />
                            <small class="form-text text-muted">Escriba su usuario</small>
                        </div>

                        <div class="mb-3">
                            <label for="contraseña" class="form-label">Contraseña</label>
                            <input
                                type="password"
                                class="form-control"
                                name="password"
                                id="contraseña"
                                placeholder="Contraseña"
                            />
                            <small class="form-text text-muted">Escriba su contraseña</small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>

                        <div class="text-center mt-3">
    <a href="recuperar.php">¿Olvidaste tu contraseña?</a><br>
    <span class="d-block mt-2">¿No tienes cuenta? <a href="registro.php">Regístrate</a></span>
</div>

                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script
        src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"
    ></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
        crossorigin="anonymous"
    ></script>
</body>
</html>
