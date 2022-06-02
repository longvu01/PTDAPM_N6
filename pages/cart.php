<?php
session_start();
require_once("../libs/lib_db.php");

// $cart = [];
$_SESSION['sum_price'] = 0;
$count = 0;
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
}

/* --------------------------------------------- */
$sql = "select * from categories";
$result_parents = select_list($sql);
$user = "";
if (isset($_SESSION['account'])) {
    $user = $_SESSION['account'];
}

$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
?>
<!-- Start HTML -->
<?php require_once('../root/top.php') ?>
<?php top('Giỏ hàng') ?>
</head>

<body>
    <div id="toast"></div>
    <?php require_once('../root/header.php') ?>

    <!-- CART -->
    <div class="wrapper">
        <div class="cart">
            <div class="cart__top">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Giỏ hàng của bạn</li>
                    </ol>
                </nav>
            </div>
            <h2>Giỏ hàng</h2>
            <div class="cart__content">
                <div class="cart__content--left">
                    <div class="cart__content--left-top">
                        <div class="cart__total-item">
                            <input type="checkbox" name="" id="" checked>
                            <p>Tất cả ( <?php echo $count ?> sản phẩm)</p>
                        </div>
                        <span>Đơn giá</span>
                        <span>Số lượng</span>
                        <span class="cart_content--total">Thành tiền</span>
                        <a href="#" class="text-center"><i class="fas fa-trash-alt"></i></a>
                    </div>

                    <div class="cart__content--left-body">
                        <?php if (isset($_SESSION['cart'])) { ?>
                            <?php foreach ($_SESSION['cart'] as $key => $val) { ?>
                                <div class="cart__product mb-3">
                                    <div class="cart__product-info">
                                        <input type="checkbox" name="" id="" checked>
                                        <a href="./detail.php?id=<?php echo $key ?>"><img src="<?php $img = explode(',', $val['img']);
                                                                                                echo $img[0]; ?>" alt=""></a>
                                        <div class="cart__product-more">
                                            <a href="./detail.php?id=<?php echo $key ?>" class="cart__product-name"><?php echo $val['title'] ?></a>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <div class="cart__product-price">
                                        <?php echo number_format($val['price'], 0, '.', '.') ?> đ
                                        <input type="hidden" name="" class="iprice" value="<?php echo $val['price'] ?>">
                                    </div>
                                    <!--  -->
                                    <div action="../process/cart/cart_update.php" method="post" class="cart__product-qnt">
                                        <button id="decBtn">-</button>
                                        <input type="number" class="form-control d-inline iquantity" min="1" max="10" value="<?php echo $val['qty'] ?>" name="change_qnt">
                                        <input type="hidden" class="ititle" name="title" value="<?php echo $val['title'] ?>">
                                        <button id="incBtn">+</button>
                                    </div>
                                    <!--  -->
                                    <div class="cart__total-price">
                                        <span class="itotal"></sp>
                                            <?php
                                            $productPrice = (float)$val['price'];
                                            $product_total_price = $productPrice * $val['qty'];
                                            $_SESSION['sum_price'] += $product_total_price;
                                            echo number_format($product_total_price, 0, '.', '.');
                                            ?> đ
                                    </div>
                                    <!--   -->
                                    <a href="../process/cart/cart_del.php?key=<?php echo $key ?>"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            <?php } ?>
                            <!-- endif -->
                        <?php }
                        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) { ?>
                            <div class="cart__empty">
                                <img src="images/logos/empty_cart.png" alt="" class="cart__empty-img">
                                <p>Không có sản phẩm nào trong giỏ hàng của bạn</p>
                                <a href="./" class="btn cart__empty-btn">Tiếp tục mua sắm</a>
                            </div>
                        <?php } ?>
                    </div>

                </div>

                <form action="payment.php" class="cart__content-right" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Mã giảm giá/ quà tặng">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2">Áp dụng</button>
                    </div>
                    <div class="cart__payment">
                        <div>
                            <span>Tạm tính</span>
                            <span id="gtotal_temp"><?php echo number_format($_SESSION['sum_price'], 0, '.', '.') ?> đ</span>
                        </div>
                        <div>
                            <span>Giảm giá</span>
                            <span>0 đ</span>
                        </div>
                        <div>
                            <span>Thành tiền</span>
                            <span id="gtotal"><?php echo number_format($_SESSION['sum_price'], 0, '.', '.') ?> đ</span>
                        </div>
                        <p class="vat">(Đã bao gồm VAT nếu có)</p>
                    </div>
                    <input type="hidden" name="sum_price" value="<?php echo $_SESSION['sum_price'] ?>">
                    <button class="btn btn__payment w-100">Tiến hành đặt hàng</button>
                </form>
            </div>
        </div>
    </div>

    <?php require_once('../root/bottom.php') ?>


    <!--  -->
    <!-- <script src="../assets/js/cart.js"></script> -->
    <script type="module" defer src="../assets/js/cart.js"></script>
    <!--  -->
    <script src="../assets/js/all.js"></script>
    <script src="../assets/js/toast_msg.js"></script>
    <script src="../assets/js/ajax_fetch_showroom.js"></script>
    <script src="../assets/js/mail.js"></script>
    <!--  -->

    <?php require_once('../root/show_toast.php'); ?>
</body>

</html>