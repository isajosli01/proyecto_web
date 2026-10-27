<?php
$host = "localhost";
$user = "root";      // Usuario por defecto de XAMPP
$pass = "";          // Contraseña por defecto (vacía)
$db   = "proyecto_web_db";

$conexion = new mysqli($host, $user, $pass, $db);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>