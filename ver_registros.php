<?php
// Lee los registros del archivo "registros.txt"
$registros = file('registros.txt', FILE_IGNORE_NEW_LINES);

// Si el archivo no existe o está vacío, muestra un mensaje
if (empty($registros)) {
    $registros = array("No hay registros disponibles.");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style2.css">
    <title>Ver Registros</title>
</head>
<body class="bg-dark text-white">
    <div class="container">
        <h1 class="mt-5">Registros Guardados</h1>
            <!-- Agrega aquí la información del usuario si es necesario -->
        </a>

       <!-- Tabla para mostrar los registros -->
<table class="table table-bordered table-striped table-light text-dark mt-4">
    <thead>
        <tr>
            <th>Usuario</th>
            <th>Fecha y Hora</th>
            <th>Datos del Alumno</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($registros as $registro) : ?>
            <tr>
                <?php
                // Divide el registro en partes usando la coma como separador
                $parts = explode(', ', $registro);
                if (count($parts) >= 3) {
                    list($usuario, $fechaHora, $datosAlumno) = $parts;
                    echo "<td>$usuario</td>";
                    echo "<td>$fechaHora</td>";
                    echo "<td>$datosAlumno</td>";
                } else {
                    // Si el registro no tiene el formato esperado, muestra una celda de error
                    echo "<td colspan='3'>Registro no válido</td>";
                }
                ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


        <a href="index.php" class="btn btn-primary">Volver</a>
    </div>
</body>
</html>
