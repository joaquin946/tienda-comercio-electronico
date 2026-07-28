<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Compra Finalizada</title>
</head>
<body>
    <h1>Compra Finalizada</h1>
    <?php
    if (!empty($_SESSION['carrito'])) {
        echo "<p>Su compra ha sido procesada correctamente.</p>";
        session_unset();
        session_destroy();
    } else {
        echo "<p>No hay productos en el carrito.</p>";
    }
    ?>
    <a href="productos.php">Volver a la tienda</a>
</body>
</html>
