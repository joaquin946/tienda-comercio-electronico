<?php
session_start();

if (isset($_GET['id'])) {
    $productoId = $_GET['id'];
    unset($_SESSION['carrito'][$productoId]);
}

header('Location: carrito.php');
exit;
?>
