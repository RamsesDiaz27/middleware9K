<?php
session_start();

// Función para guardar el registro en un archivo TXT
function guardarRegistroEnArchivo($registro) {
    $archivo = 'registros.txt';
    
    // Abre el archivo en modo de escritura (si no existe, se crea)
    $fp = fopen($archivo, 'a');
    
    if ($fp) {
        // Escribe el registro en el archivo
        fwrite($fp, $registro . PHP_EOL);
        
        // Cierra el archivo
        fclose($fp);
    } else {
        echo "Error al abrir el archivo para escritura.";
    }
}

// Verifica si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recopila información sobre el usuario
    $usuario = $_SESSION['username'];
    
    // Obtiene la fecha y hora actual
    $fechaHora = date('Y-m-d H:i:s');
    
    // Recopila datos del alumno desde el formulario de registro
    $nombreAlumno = $_POST['nombre'] ?? '';
    $apellidosAlumno = $_POST['apellidos'] ?? '';
    $edadAlumno = $_POST['edad'] ?? '';
    $numeroAlumno = $_POST['numero'] ?? '';
    $correoAlumno = $_POST['correo'] ?? '';
    
    // Crea un registro con la información recopilada
    $registro = "Usuario: $usuario, Fecha y hora: $fechaHora, Datos del alumno: Nombre: $nombreAlumno, Apellidos: $apellidosAlumno, Edad: $edadAlumno, Número: $numeroAlumno, Correo: $correoAlumno";
    
    // Guarda el registro en un archivo de registro TXT
    guardarRegistroEnArchivo($registro);
}

// Continúa con la ejecución normal de la aplicación
?>

