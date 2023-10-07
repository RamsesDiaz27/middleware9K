<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Registro de Alumnos</title>
</head>
<?php
include('registro_middleware.php');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<body class="bg-dark text-white">
    <div class="container">
        <h1 class="mt-5">Registro de Alumnos</h1>
        <a  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #1E88E5;">
                Bienvenido <?php echo $_SESSION["username"]; ?>
            </a>
        <form action="registrar.php" method="post">
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="mb-3">
                <label for="apellidos" class="form-label">Apellidos:</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            </div>
            <div class="mb-3">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="mb-3">
                <label for="numero" class="form-label">Número:</label>
                <input type="tel" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar</button>
        </form>
    </div>
<br>
<a href="ver_registros.php" class="btn btn-secondary btn-center btn-max-width">Ver Registros</a>
</body>
</html>
