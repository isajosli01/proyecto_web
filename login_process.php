<?php
session_start();
require_once 'conexion.php'; // Tu archivo de conexión a MySQL / MariaDB

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $correo = trim($_POST['usuario']);
    $password = trim($_POST['password']);

    if (!empty($correo) && !empty($password)) {
        // Consultar usuario en la base de datos
        $stmt = $conexion->prepare("SELECT id, nombre, correo, password, rol FROM usuarios WHERE correo = ?");
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();

        if ($resultado->num_rows === 1) {
            $usuario = $resultado->fetch_assoc();

            // Verificar la contraseña (admite contraseña en texto plano o password_verify)
            if ($password === $usuario['password'] || password_verify($password, $usuario['password'])) {
                
                // Guardar datos en la sesión
                $_SESSION['id_usuario'] = $usuario['id'];
                $_SESSION['usuario'] = $usuario['nombre'];
                $_SESSION['correo'] = $usuario['correo'];
                $_SESSION['rol'] = strtolower(trim($usuario['rol'])); // Normaliza a minúsculas ('admin' o 'cliente')

                // Redirección condicionada por el Rol
                if ($_SESSION['rol'] === 'admin') {
                    header("Location: admin.php");
                } else {
                    header("Location: index.php"); // Redirige al inicio si es Cliente
                }
                exit();
            } else {
                $_SESSION['error'] = "Contraseña incorrecta.";
            }
        } else {
            $_SESSION['error'] = "El correo electrónico no está registrado.";
        }
        $stmt->close();
    } else {
        $_SESSION['error'] = "Por favor completa todos los campos.";
    }

    header("Location: login.php");
    exit();
}
?>