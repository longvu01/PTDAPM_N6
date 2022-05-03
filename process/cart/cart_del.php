<?php
session_start();
if (!isset($_SESSION['cart'])) {
    header('location:./');
}
$location = "window.location = '../../pages/cart.php'";
$key = isset($_GET['key']) ? (int)$_GET['key'] : '';
if ($key) {
    if (array_key_exists($key, $_SESSION['cart'])) {
        unset($_SESSION['cart'][$key]);
        echo "<script>alert('Bạn đã xóa sản phẩm khỏi giỏ hàng!')</script>";
    }
}

echo "<script>$location</script>";
