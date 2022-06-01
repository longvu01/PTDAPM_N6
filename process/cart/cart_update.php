<?php
session_start();

require_once('../../root/decode_ajax.php');

$change_qnt = addslashes($decoded['change_qnt']);
$title = addslashes($decoded['title']);

foreach ($_SESSION['cart'] as $key => $val) {
    if ($val['title'] == $title) {
        $_SESSION['cart'][$key]['qty'] = $change_qnt;

        // print_r($_SESSION['cart']);
        // exit();
        // header('location: ../../pages/cart.php');
    }
}







// if (isset($_POST['change_qnt'])) {

//     foreach ($_SESSION['cart'] as $key => $val) {
//         if ($val['title'] == $_POST['title']) {
//             $_SESSION['cart'][$key]['qnt'] = $_POST['change_qnt'];

//             // print_r($_SESSION['cart']);
//             // exit();
//             // header('location: ../../pages/cart.php');
//         }
//     }
// }
