<?php
    session_start();
    if(isset($_POST['change_qnt'])) {
        foreach($_SESSION['cart'] as $key => $val) {
            if($val['title'] == $_POST['title']) {
                $_SESSION['cart'][$key]['qnt'] = $_POST['change_qnt'];

                // print_r($_SESSION['cart']);exit();
                // header('location: cart.php');
                echo"<script>
                    window.location.href = '../../pages/cart.php';
                </script>";
            }
        }
    }
