<?php
$host = 'localhost'; // Cambia esto si tu servidor de MySQL no está en localhost
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'cursos';

$conexion = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verifica si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
