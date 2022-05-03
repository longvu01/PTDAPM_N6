<?php
session_start();
require_once('../../connect.php');
// print_r($_SESSION['cart']);exit();

$buyer_id = isset($_REQUEST["buyer_id"]) ? $_REQUEST["buyer_id"] : "";
// $product_code = isset($_REQUEST["product_code"]) ? $_REQUEST["product_code"] : "";
// $qnt[] = isset($_REQUEST["qnt"]) ? $_REQUEST["qnt"] : "";
// $price[] = isset($_REQUEST["price"]) ? $_REQUEST["price"] : "";
// $sum_price = isset($_REQUEST["sum_price"]) ? $_REQUEST["sum_price"] : "";
$pay_mode = isset($_REQUEST["pay_mode"]) ? $_REQUEST["pay_mode"] : "";

// $sql = "insert into user_order (buyer_id, product_code, qnt, price, sum_price, pay_mode)
// values 
// ('$buyer_id','$product_code','$qnt','$price','$sum_price','$pay_mode')";
// echo $sql;exit();
// $ret = exec_update($sql);

$order_id = mysqli_insert_id($conn);
$sql = "insert into user_order (order_id, buyer_id, product_code, qnt, price, pay_mode)
	values 
	(?,?,?,?,?,?)";
$stmt = mysqli_prepare($conn, $sql);

// print_r($_SESSION['cart']);exit();

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "iisiss", $order_id, $buyer_id, $product_code, $qnt, $price, $pay_mode);
    foreach ($_SESSION['cart'] as $key => $val) {
        $product_code = $val['product_code'];
        $qnt = $val['qnt'];
        $price = $val['price'];
        // $sum_price = $val['sum_price'];
        // $pay_mode = $val['pay_mode'];
        //         $buyer_id = isset($_REQUEST["buyer_id"]) ? $_REQUEST["buyer_id"] : "";
        // $product_code = isset($_REQUEST["product_code"]) ? $_REQUEST["product_code"] : "";
        // $qnt = isset($_REQUEST["qnt"]) ? $_REQUEST["qnt"] : "";
        // $price = isset($_REQUEST["price"]) ? $_REQUEST["price"] : "";
        // $sum_price = isset($_REQUEST["sum_price"]) ? $_REQUEST["sum_price"] : "";
        // $pay_mode = isset($_REQUEST["pay_mode"]) ? $_REQUEST["pay_mode"] : "";
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
    // $location = "window.location = '../../pages/cart.php'";
    // echo '<script>alert("Bạn đã đặt hàng thành công!")</script>';
    // unset($_SESSION['cart']);
    // echo"<script>$location</script>";
