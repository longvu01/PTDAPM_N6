<?php
session_start();
require_once("../libs/lib_db.php");
// include("checklogin.php");
// $user = checkLoggedUser();
$q = isset($_REQUEST["q"]) ? $_REQUEST["q"] : "";
$q = trim($q);
// page
$p = isset($_REQUEST["p"]) ? $_REQUEST["p"] * 1 : 0;
if ($p < 1) $p = 1;
$cond = "";
// $q = htmlspecialchars($q);
if ($q !== htmlspecialchars($q)) {
    echo '<h1>Tìm kiếm không hợp lệ, quay lại <a href="./">Trang chủ</a></h1>';
    exit();
}
if (strpos($q, "'")) $q = str_replace("'", "\'", $q);
if (strpos($q, '"')) $q = str_replace('"', '\"', $q);
if ($q) {
    $cond = "where title like '%{$q}%'";
    $cond .= " or product_info like '%{$q}%'";
    $cond .= " or description like '%{$q}%'";
}
$sql = " select * from products {$cond} ";
// print_r($sql);exit();
$result_search = select_one($sql);
// print_r($result_search);exit();
$sqlCount = "select count(*) as c from products {$cond}";
$count = select_one($sqlCount);
$total = $count['c'];
$nop = 12;
$offset = $nop * ($p - 1);
$num = ceil($total / $nop);

$sql = "select * from sub_cate where name in (SELECT DISTINCT name from sub_cate)";
// }
// echo $sql;
$sub_cate = select_list($sql);
// print_r($sub_cate);exit();

$sql = "select * from products {$cond} limit {$nop} offset {$offset}";
$products = select_list($sql);

$sql = "select * from categories";
$result_parents = select_list($sql);

$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
$user = "";
if (isset($_SESSION['account'])) {
    $user = $_SESSION['account'];
}
$flagDM = 1;
?>

<!-- Start HTML -->
<?php require_once('../root/top.php') ?>
<?php top('Tìm kiếm') ?>
</head>

<body>
    <div id="toast"></div>
    <?php require_once('../root/header.php') ?>
    <div class="wrapper">
        <div class="category">
            <div class="category__top">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="./">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">TÌM KIẾM: <?php echo $q ?></li>
                    </ol>
                </nav>
                <h2 class="category__title">TÌM KIẾM : <?php echo $q ?> <span>(Tổng <?php echo $total ?> sản phẩm)</span></h2>
            </div>

            <div class="category__content">
                <!-- left -->
                <div class="category__content-left">
                    <h3 class="filter-text">LỌC SẢN PHẨM</h3>

                    <div class="accordion accordion--category" id="accordionExample">
                        <?php foreach ($sub_cate as $item) { ?>

                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading<?php echo ($item['id']); ?>">
                                    <button class="accordion-button text-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo ($item['id']); ?>" aria-expanded="true" aria-controls="collapse<?php echo ($item['id']); ?>">
                                        <?php echo ($item['name']); ?>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo ($item['id']); ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo ($item['id']); ?>" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <input type="hidden" id="q" value="<?php echo $q ?>">
                                        <ul>
                                            <?php switch ($item['name']):
                                                case ('DANH MỤC'): ?>
                                                    <?php $flagDM++;
                                                    if ($flagDM > 2) break; ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <a href="search.php?q=<?php echo $content ?>" class="category__content-link">
                                                                <i class="fas fa-caret-right"></i>
                                                                <?php echo $content; ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('HÃNG SẢN XUẤT'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="product_check form-check-input" id="search_brand" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('KHOẢNG GIÁ'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="product_check" id="search_price" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('NHU CẦU SỬ DỤNG'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="search_demand" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('CPU'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="search_cpu" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('RAM'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="search_ram" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('Ổ CỨNG'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="search_hd" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('VGA - CARD MÀN HÌNH'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="search_vga" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('DVDRW'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="search_dvdrw" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('ĐỘ PHÂN GIẢI MÀN HÌNH'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="search_sc_hd" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('TẦN SỐ MÀN HÌNH'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="search_sc_hz" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('HỆ ĐIỀU HÀNH'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="search_os" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                case ('THỜI HẠN BẢO HÀNH'): ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="search_insurance" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                                    <?php break; ?>
                                                <?php
                                                default: ?>
                                                    <?php foreach (explode(',', $item['content']) as $content) { ?>
                                                        <li>
                                                            <p class="category__content-link">
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="<?php echo $item['name'] ?>" value="<?php echo $content ?>">
                                                                    <?php echo $content ?>
                                                                </label>
                                                            </p>
                                                        </li>
                                                    <?php } ?>
                                            <?php endswitch; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        <?php } ?>
                    </div>

                </div>
                <!-- right -->
                <div class="category__content-right">
                    <div class="category__top-box">
                        <div class="category__top-box--1">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Tình trạng kho hàng</option>
                                <option value="1">Còn hàng</option>
                            </select>
                            <div class="form__filter-price">
                                <label for="filter-start">Lọc theo giá tiền:</label>
                                <input type="text" id="filter-start" placeholder="2.009.000 ">
                                <span>đ</span>
                                <label for="filter-end"> - </label>
                                <input type="text" id="filter-end" placeholder="189.999.000 ">
                                <span>đ</span>
                                <a href="#" class="btn category__btn">Lọc</a>
                            </div>
                        </div>
                        <div class="category__top-box--2">
                            <ul>
                                <li><label class="category-box-choice " data-order="desc"><input type="radio" name="cate_radio" id="cate_new" class="product_check">Hàng Mới</label></li>
                                <li><label class="category-box-choice" data-order="desc"><input type="radio" name="cate_radio" id="cate_high-view" class="product_check">Xem Nhiều</label></li>
                                <li><label class="category-box-choice" data-order="desc"><input type="radio" name="cate_radio" id="cate_much-lower" class="product_check">Giá giảm nhiều</label></li>
                                <li><label class="category-box-choice" data-order="desc"><input type="radio" name="cate_radio" id="cate_price-upper" class="product_check">Giá Tăng Dần</label></li>
                                <li><label class="category-box-choice" data-order="desc"><input type="radio" name="cate_radio" id="cate_price-lower" class="product_check">Giá Giảm Dần</label></li>
                            </ul>

                            <select class="form-select" aria-label="Default select example 2">
                                <option selected>Lọc sản phẩm</option>
                                <option value="rate">Đánh giá</option>
                                <option value="sort">Tên A->Z</option>
                            </select>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <?php for ($i = 1; $i <= $num; $i++) { ?>
                                        <li class="page-item"><a class="page-link" href="search.php?q=<?php echo $q ?>&p=<?php echo $i ?>"><?php echo $i ?></a></li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="category__products" id="search_res">
                        <svg viewBox="25 25 50 50" class="hide" id="loader">
                            <circle cx="50" cy="50" r="20"></circle>
                        </svg>
                        <?php foreach ($products as $data) { ?>
                            <div class="product">
                                <div class="aspect-ratio">
                                    <a href="detail.php?id=<?php echo $data["id"] ?>" class="product__img"><img src="<?php $img = explode(',', $data['img']);
                                                                                                                        echo $img[0]; ?>" alt=""></a>
                                    <div class="product__item--info">
                                        <a href="detail.php?id=<?php echo $data["id"] ?>" class="product__item--info-title"><?php echo $data["title"] ?></a>
                                        <p class="product__item--info-text">- Giá bán:&emsp;&emsp;&emsp;<?php echo number_format($data['price'], 0, '.', '.') ?>đ [Đã bao gồm VAT]</p>
                                        <p class="product__item--info-text">- Giá thấp nhất:<span class="text-bold"><?php echo number_format($data['price'], 0, '.', '.') ?>đ</span></p>
                                        <p class="product__item--info-text">- Bảo hành:&emsp;&emsp;<?php echo $data["insurance"] ?></p>
                                        <p class="product__item--info-text">- Kho hàng:&emsp;&emsp;<i class="fas fa-map-marker-alt"></i><span>131 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội</span></p>

                                        <span class="product__item--info-more"><i class="fas fa-layer-group"></i>Thông số sản phẩm</span>
                                        <ul class="product_infos">
                                            <?php foreach (explode(',', $data["product_info"]) as $info) { ?>
                                                <li><?php echo $info ?></li>
                                            <?php } ?>
                                        </ul>

                                        <span class="product__item--info-more"><i class="fas fa-gift"></i>Chương trình khuyến mại</span>
                                        <p class="product__item--info-text">MIỄN PHÍ GIAO HÀNG TOÀN QUỐC (trừ ghế, bàn, màn chiếu) đến hết 31/12/2021. Chi tiết xem <a href="#">tại đây</a>.</p>
                                    </div>
                                </div>

                                <div class="product__info-top">
                                    <div class="product__rate">
                                        <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                        <span class="product__qnt">(<?php echo $data["rate_qnt"] ?>)</span>
                                    </div>
                                    <div class="product__code"><span>mã: <?php echo $data["product_code"] ?></span></div>
                                </div>
                                <div class="product__info">
                                    <a href="detail.php?id=<?php echo $data["id"] ?>" class="product__name"><?php echo $data["title"] ?></a>
                                    <div class="product__info--main">
                                        <ul class="product__info-list">
                                            <?php foreach (explode(',', $data["product_info"]) as $info) { ?>
                                                <li><?php echo $info ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                    <div class="product__price">
                                        <div>
                                            <span class="start__price"><?php echo $data["start_price"] ?></span>
                                            <span class="sale"><?php echo $data["sale"] ?></span>
                                        </div>
                                        <h3 class="current__price"><?php echo number_format($data['price'], 0, '.', '.') ?>đ</h3>
                                        <div class="status-goods">
                                            <span class="<?php echo $data["product_status"] ?>"><i class="<?php echo $data["product_status-icon"] ?>"></i><?php echo $data["product_status-text"] ?></span>
                                            <a href="cart_exec.php?id=<?php echo $data["id"] ?>"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>

                    <div class="category__pagination">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <?php for ($i = 1; $i <= $num; $i++) { ?>
                                    <li class="page-item"><a class="page-link" href="search.php?q=<?php echo $q ?>&p=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php require_once('../root/bottom.php') ?>


    <!--  -->
    <script src="../assets/js/libs/slick.min.js"></script>
    <script src="../assets/js/slick.js"></script>
    <!--  -->
    <script src="../assets/js/slider-config/slick-slider.js"></script>
    <script src="../assets/js/all.js"></script>
    <script src="../assets/js/toast_msg.js"></script>
    <script src="../assets/js/ajax/ajax_fetch_showroom.js"></script>
    <script src="../assets/js/mail.js"></script>
    <script src="../assets/js/actions/action-search.js"></script>

    <?php require_once('../root/show_toast.php'); ?>
</body>

</html>