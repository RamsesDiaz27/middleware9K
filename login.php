<?php
include 'conexion.php';
session_start();

// Middleware de autenticación
$email = $_POST["txtEmail"];

if ($email == 'admin@gmail.com') {
    $role = '1';
} else {
    $role = '2';
}

// Verifica si el usuario ha iniciado sesión como administrador
if ($role !== '1') {
    // El usuario no es administrador, redirige al inicio de sesión
    header('Location: indexLogin.php');
    exit;
}

$password = $_POST["txtPassword"];

// Verifica las credenciales del usuario
$con = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);
$sql = mysqli_query($con,"SELECT * FROM usuarios WHERE correo_electronico ='$email' and contraseña = '$password' and id_rol = '$role'");

if (mysqli_num_rows($sql) == 1 ) { 
  $row = mysqli_fetch_assoc($sql);
  $_SESSION["username"] = $row["codigo"]; // Asumiendo que el nombre de usuario está en la columna 'codigo'
  header("Location: index.php");
} else {
  echo "<script> alert('Usuario o contraseña incorrecto');window.location= 'indexLogin.php' </script>";
}
?>
