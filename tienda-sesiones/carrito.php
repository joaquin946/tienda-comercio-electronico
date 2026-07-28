<?php
session_start();

$productos = [
    1 => ['nombre' => 'Notebook Gaming',   'precio' => 899990],
    2 => ['nombre' => 'Mouse Inalámbrico',  'precio' => 25990],
    3 => ['nombre' => 'Teclado Mecánico',   'precio' => 65990],
    4 => ['nombre' => 'Lámpara LED',         'precio' => 15990]
];

$total = 0;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Carrito de Compras</title>
</head>
<body>
    <h1>Carrito de Compras</h1>
    <nav class="menu">
        <a href="productos.php">Seguir comprando</a>
    </nav>

    <?php if (empty($_SESSION['carrito'])): ?>
        <p>El carrito está vacío.</p>
    <?php else: ?>
        <table>
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['carrito'] as $id => $cantidad): ?>
                    <?php
                    $nombre   = $productos[$id]['nombre'];
                    $precio   = $productos[$id]['precio'];
                    $subtotal = $precio * $cantidad;
                    $total   += $subtotal;
                    ?>
                    <tr>
                        <td><?php echo $nombre; ?></td>
                        <td>$<?php echo number_format($precio, 0, ',', '.'); ?></td>
                        <td><?php echo $cantidad; ?></td>
                        <td>$<?php echo number_format($subtotal, 0, ',', '.'); ?></td>
                        <td><a href="eliminar_prod.php?id=<?php echo $id; ?>">Eliminar</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <p class="total">Total: $<?php echo number_format($total, 0, ',', '.'); ?></p>
        <div class="acciones">
            <a class="btn" href="vaciar.php">Vaciar carrito</a>
            <a class="btn" href="finalizar.php">Finalizar compra</a>
        </div>
    <?php endif; ?>
</body>
</html>
