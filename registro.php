<?php
include("conexion.php");

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre   = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $email    = mysqli_real_escape_string($conexion, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $id_rol   = 2; // Rol 'cliente' por defecto

    $sql = "INSERT INTO usuario (nombre, email, password, id_rol) VALUES ('$nombre', '$email', '$password', $id_rol)";

    if ($conexion->query($sql) === TRUE) {
        $mensaje = "<div class='alert success'>¡Cuenta creada con éxito! Ya puedes iniciar sesión.</div>";
    } else {
        $mensaje = "<div class='alert error'>Error al registrar: " . $conexion->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | MAK-PC</title>
    <!-- FontAwesome para íconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        body {
            background: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: radial-gradient(circle at 50% 50%, #1e293b 0%, #0f172a 100%);
        }
        .card-container {
            background: #1e293b;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.5), 0 8px 10px -6px rgba(0, 0, 0, 0.5);
            width: 100%;
            max-width: 420px;
            border: 1px solid #334155;
        }
        .logo {
            text-align: center;
            margin-bottom: 24px;
        }
        .logo h1 {
            font-size: 28px;
            font-weight: 800;
            color: #38bdf8;
            letter-spacing: 1px;
        }
        .logo p {
            color: #94a3b8;
            font-size: 14px;
            margin-top: 4px;
        }
        .form-group {
            margin-bottom: 20px;
            position: relative;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            color: #cbd5e1;
            font-weight: 500;
        }
        .input-wrapper {
            position: relative;
        }
        .input-wrapper i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
        }
        .form-group input {
            width: 100%;
            padding: 12px 14px 12px 42px;
            background: #0f172a;
            border: 1px solid #334155;
            border-radius: 8px;
            color: #fff;
            font-size: 15px;
            transition: all 0.3s ease;
        }
        .form-group input:focus {
            outline: none;
            border-color: #38bdf8;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.2);
        }
        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #0284c7 0%, #2563eb 100%);
            border: none;
            border-radius: 8px;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            margin-top: 10px;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(37, 99, 235, 0.4);
        }
        .alert {
            padding: 12px 16px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 20px;
            text-align: center;
        }
        .alert.success {
            background: rgba(34, 197, 94, 0.15);
            color: #4ade80;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }
        .alert.error {
            background: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        .footer-link {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
            color: #94a3b8;
        }
        .footer-link a {
            color: #38bdf8;
            text-decoration: none;
            font-weight: 600;
        }
        .footer-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="card-container">
        <div class="logo">
            <h1>MAK-PC</h1>
            <p>Crea tu cuenta de cliente</p>
        </div>

        <?php echo $mensaje; ?>

        <form action="registro.php" method="POST">
            <div class="form-group">
                <label>Nombre Completo</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="nombre" placeholder="Ej: Juan Pérez" required>
                </div>
            </div>

            <div class="form-group">
                <label>Correo Electrónico</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" placeholder="correo@ejemplo.com" required>
                </div>
            </div>

            <div class="form-group">
                <label>Contraseña</label>
                <div class="input-wrapper">
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="password" placeholder="••••••••" required>
                </div>
            </div>

            <button type="submit" class="btn-submit">Registrarse <i class="fa-solid fa-arrow-right"></i></button>
        </form>

        <div class="footer-link">
            ¿Ya tienes cuenta? <a href="login.php">Inicia sesión aquí</a>
        </div>
    </div>

</body>
</html>