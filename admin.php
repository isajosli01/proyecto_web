<?php
session_start();
include("conexion.php");

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$mensaje = "";

// Procesar Formulario para Registrar Nuevo Producto
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_agregar_producto'])) {
    $nombre       = mysqli_real_escape_string($conexion, $_POST['nombre']);
    $descripcion  = mysqli_real_escape_string($conexion, $_POST['descripcion']);
    $precio       = floatval($_POST['precio']);
    $stock        = intval($_POST['stock']);
    $id_categoria = intval($_POST['id_categoria']);
    $imagen       = mysqli_real_escape_string($conexion, $_POST['imagen']);

    $sql_insert = "INSERT INTO producto (nombre, descripcion, precio, stock, id_categoria, imagen) 
                   VALUES ('$nombre', '$descripcion', $precio, $stock, $id_categoria, '$imagen')";

    if ($conexion->query($sql_insert)) {
        $mensaje = "<div class='alert success'>¡Producto agregado exitosamente al catálogo!</div>";
    } else {
        $mensaje = "<div class='alert error'>Error al agregar el producto: " . $conexion->error . "</div>";
    }
}

// Consultar usuarios y productos para las estadísticas
$res_usuarios = $conexion->query("SELECT id FROM usuario");
$total_usuarios = $res_usuarios ? $res_usuarios->num_rows : 0;

$res_prod = $conexion->query("SELECT p.*, c.nombre AS categoria FROM producto p INNER JOIN categoria c ON p.id_categoria = c.id ORDER BY p.id DESC");
$total_productos = $res_prod ? $res_prod->num_rows : 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración | MAK-PC</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        body { background: #0f172a; color: #f8fafc; min-height: 100vh; }
        .navbar { background: #1e293b; padding: 16px 32px; display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid #334155; }
        .navbar h1 { font-size: 22px; color: #38bdf8; font-weight: 800; }
        .btn-logout { background: #ef4444; color: white; padding: 8px 16px; border-radius: 6px; text-decoration: none; font-size: 14px; font-weight: 600; }
        .container { max-width: 1100px; margin: 40px auto; padding: 0 20px; }
        .welcome-card { background: #1e293b; padding: 24px; border-radius: 12px; border: 1px solid #334155; margin-bottom: 30px; display: flex; justify-content: space-between; align-items: center; }
        .stats-group { display: flex; gap: 15px; }
        .stat-box { background: #0f172a; padding: 16px 24px; border-radius: 8px; border: 1px solid #334155; text-align: center; }
        .stat-box h3 { font-size: 28px; color: #38bdf8; }
        .form-container, .table-container { background: #1e293b; border-radius: 12px; border: 1px solid #334155; padding: 24px; margin-bottom: 30px; }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; margin-top: 15px; }
        .form-group { display: flex; flex-direction: column; gap: 6px; }
        .form-group.full { grid-column: span 2; }
        input, select, textarea { background: #0f172a; border: 1px solid #334155; color: #fff; padding: 10px; border-radius: 6px; }
        .btn-submit { background: #2563eb; color: #fff; border: none; padding: 12px; border-radius: 6px; font-weight: 600; cursor: pointer; grid-column: span 2; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px; border-bottom: 1px solid #334155; text-align: left; }
        th { background: #0f172a; color: #94a3b8; }
        .alert { padding: 12px; border-radius: 6px; margin-bottom: 15px; text-align: center; }
        .alert.success { background: rgba(34, 197, 94, 0.15); color: #4ade80; border: 1px solid rgba(34, 197, 94, 0.3); }
        .alert.error { background: rgba(239, 68, 68, 0.15); color: #f87171; border: 1px solid rgba(239, 68, 68, 0.3); }
    </style>
</head>
<body>

    <div class="navbar">
        <h1><i class="fa-solid fa-desktop"></i> MAK-PC Admin</h1>
        <div>
            <span>Hola, <strong><?php echo $_SESSION['usuario']; ?></strong></span>
            <a href="logout.php" class="btn-logout" style="margin-left: 15px;"><i class="fa-solid fa-right-from-bracket"></i> Salir</a>
        </div>
    </div>

    <div class="container">
        <?php echo $mensaje; ?>

        <div class="welcome-card">
            <div>
                <h2>Panel de Control</h2>
                <p style="color: #94a3b8;">Gestión global de tienda e inventario</p>
            </div>
            <div class="stats-group">
                <div class="stat-box">
                    <h3><?php echo $total_usuarios; ?></h3>
                    <p style="color: #94a3b8; font-size: 12px;">Usuarios</p>
                </div>
                <div class="stat-box">
                    <h3><?php echo $total_productos; ?></h3>
                    <p style="color: #94a3b8; font-size: 12px;">Productos</p>
                </div>
            </div>
        </div>

        <div class="form-container">
            <h2><i class="fa-solid fa-cart-plus"></i> Agregar Nuevo Producto</h2>
            <form action="admin.php" method="POST" class="form-grid">
                <div class="form-group">
                    <label>Nombre del Producto</label>
                    <input type="text" name="nombre" required placeholder="Ej. Procesador Intel i5">
                </div>
                <div class="form-group">
                    <label>Categoría</label>
                    <select name="id_categoria" required>
                        <option value="1">Memorias RAM</option>
                        <option value="2">Almacenamiento SSD</option>
                        <option value="3">Periféricos Gamer</option>
                        <option value="4">Componentes y Fuentes</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Precio (S/)</label>
                    <input type="number" step="0.01" name="precio" required placeholder="185.00">
                </div>
                <div class="form-group">
                    <label>Stock Disponible</label>
                    <input type="number" name="stock" required placeholder="10">
                </div>
                <div class="form-group full">
                    <label>Ruta de la Imagen</label>
                    <input type="text" name="imagen" placeholder="img/ram-fury.jpg">
                </div>
                <div class="form-group full">
                    <label>Descripción</label>
                    <textarea name="descripcion" rows="3" required placeholder="Escribe los detalles del producto..."></textarea>
                </div>
                <button type="submit" name="btn_agregar_producto" class="btn-submit"><i class="fa-solid fa-save"></i> Guardar Producto</button>
            </form>
        </div>

        <div class="table-container">
            <h2><i class="fa-solid fa-boxes-stacked"></i> Productos en Inventario</h2>
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($total_productos > 0): ?>
                        <?php while ($p = $res_prod->fetch_assoc()): ?>
                            <tr>
                                <td>#<?php echo $p['id']; ?></td>
                                <td><strong><?php echo $p['nombre']; ?></strong></td>
                                <td><?php echo $p['categoria']; ?></td>
                                <td>S/ <?php echo number_format($p['precio'], 2); ?></td>
                                <td><?php echo $p['stock']; ?> unids.</td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr><td colspan="5">Sin productos registrados.</td></tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>