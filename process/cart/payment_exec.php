<?php
session_start();
require_once('../../connect.php');

$user_id = isset($_REQUEST["user_id"]) ? $_REQUEST["user_id"] : "";

$pay_mode = isset($_REQUEST["pay_mode"]) ? $_REQUEST["pay_mode"] : "";

$order_id = mysqli_insert_id($conn);
$sql = "insert into user_order (order_id, user_id, product_id, qty, price, pay_mode)
	values 
	(?,?,?,?,?,?)";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "iisiss", $order_id, $user_id, $product_id, $qty, $price, $pay_mode);
    foreach ($_SESSION['cart'] as $key => $val) {
        $product_id = $val['product_id'];
        $qty = $val['qty'];
        $price = $val['price'];
        mysqli_stmt_execute($stmt);
    }
    unset($_SESSION['cart']);
    echo '<script>alert("Bạn đã đặt hàng thành công!")</script>';
    echo "<script>
            window.location.href = '../../pages/cart.php';
        </script>";
} else {
    echo '<script>alert("Query prepare error!")</script>';
    echo "<script>
        window.location.href = '../../pages/cart.php';
    </script>";
}
