<?php
//Conexión
include('registro_middleware.php');



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $edad = $_POST['edad'];
    $numero = $_POST['numero'];
    $correo = $_POST['correo'];

    $host = 'localhost'; 
    $usuario = 'root';
    $contrasena = '';
    $base_de_datos = 'cursos';

    $conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

    // Verifica si la conexión fue exitosa
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Prepara la consulta SQL
    $sql = "INSERT INTO alumnos (nombre, apellidos, edad, numero, correo, fecha_registro) VALUES (?, ?, ?, ?, ?, NOW())";

    // Prepara la sentencia
    $stmt = $conexion->prepare($sql);

    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conexion->error);
    }

    // Vincula los parámetros
    $stmt->bind_param("ssiss", $nombre, $apellidos, $edad, $numero, $correo);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        // Registro exitoso, establece la variable de sesión con el mensaje y la fecha
        $_SESSION['registro_exitoso'] = [
            'mensaje' => 'El usuario se ha registrado con éxito.',
            'fecha' => date('Y-m-d H:i:s')
        ];

        // Redirige a donde desees
        header('Location: index.php');
        exit;
    } else {
        // Registro fallido, establece la variable de sesión con el mensaje y la fecha
        $_SESSION['registro_exitoso'] = [
            'mensaje' => 'Error al registrar el usuario.',
            'fecha' => date('Y-m-d H:i:s')
        ];

        die("Error al insertar el registro: " . $stmt->error);
    }

    // Cierra la sentencia y la conexión
    $stmt->close();
    $conexion->close();
}