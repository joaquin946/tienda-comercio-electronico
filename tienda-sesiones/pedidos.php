<?php
session_start();

// Lista de pedidos guardada en la sesión
if (!isset($_SESSION['pedidos'])) {
    $_SESSION['pedidos'] = [];
}

// Contador propio para que la numeración no se repita
if (!isset($_SESSION['ultimo_pedido'])) {
    $_SESSION['ultimo_pedido'] = 0;
}

// Registra un pedido con los productos del carrito
if (!empty($_SESSION['carrito'])) {
    $_SESSION['ultimo_pedido'] = $_SESSION['ultimo_pedido'] + 1;
    $numeroPedido = $_SESSION['ultimo_pedido'];

    $_SESSION['pedidos'][$numeroPedido] = [
        'estado'    => 'pendiente',
        'productos' => $_SESSION['carrito']
    ];

    // Limpia el carrito para no duplicar el pedido al recargar
    unset($_SESSION['carrito']);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Gestión de Pedidos</title>
</head>
<body>
    <h1>Gestión de Pedidos</h1>

    <?php if (empty($_SESSION['pedidos'])): ?>
        <p>No hay pedidos registrados.</p>
    <?php else: ?>
        <?php foreach ($_SESSION['pedidos'] as $numero => $pedido): ?>
            <p>Pedido N° <?php echo $numero; ?> - Estado: <?php echo $pedido['estado']; ?></p>
        <?php endforeach; ?>
    <?php endif; ?>

    <a href="productos.php">Volver a la tienda</a>
</body>
</html>
