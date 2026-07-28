<?php
session_start();

if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

if (isset($_GET['id'])) {
    $productoId = $_GET['id'];

    if (isset($_SESSION['carrito'][$productoId])) {
        $_SESSION['carrito'][$productoId] += 1;
    } else {
        $_SESSION['carrito'][$productoId] = 1;
    }
}

header('Location: productos.php');
exit;
?>
