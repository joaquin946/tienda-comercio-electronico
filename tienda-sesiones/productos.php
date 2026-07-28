<?php
// Medidas de configuración para evitar expiración prematura
ini_set('session.gc_maxlifetime', 3600);
ini_set('session.cookie_lifetime', 3600);
ini_set('session.cache_expire', 60);

session_start();

// Regenerar identificador de sesión por seguridad
if (!isset($_SESSION['iniciada'])) {
    session_regenerate_id(true);
    $_SESSION['iniciada'] = true;
}

// Verificar si existe un carrito en la sesión; si no, crear uno vacío
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

$productos = [
    ['id' => 1, 'nombre' => 'Notebook Gaming',    'precio' => 899990],
    ['id' => 2, 'nombre' => 'Mouse Inalámbrico',   'precio' => 25990],
    ['id' => 3, 'nombre' => 'Teclado Mecánico',    'precio' => 65990],
    ['id' => 4, 'nombre' => 'Lámpara LED',          'precio' => 15990]
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Tienda de Comercio Electrónico</title>
</head>
<body>
    <h1>Tienda de Comercio Electrónico</h1>

    <nav class="menu">
        <a href="productos.php">Productos</a>
        <a href="carrito.php">Ver carrito (<?php echo count($_SESSION['carrito']); ?>)</a>
    </nav>

    <section class="lista-productos">
        <?php foreach ($productos as $producto): ?>
            <div class="producto-card">
                <h3><?php echo $producto['nombre']; ?></h3>
                <p>Precio: $<?php echo number_format($producto['precio'], 0, ',', '.'); ?></p>
                <a class="btn" href="agregar.php?id=<?php echo $producto['id']; ?>">Agregar al carrito</a>
            </div>
        <?php endforeach; ?>
    </section>
</body>
</html>
