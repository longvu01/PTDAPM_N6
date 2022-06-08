<?php
session_start();
require_once("../libs/lib_db.php");
//1. get input, id của bài viết
$id = isset($_REQUEST["id"]) ? (int)$_REQUEST["id"] : 0;
$p = isset($_REQUEST["p"]) ? $_REQUEST["p"] * 1 : 0;
if ($p < 1) $p = 1;

//2.1. Thông tin chi tiết của chuyên mục
$sql = "select * from categories where id = {$id}";
$result = select_one($sql);

$sub_cate_id = $result['id'];

$nop = 12;
$offset = $nop * ($p - 1);
$cond = "where cid = {$id}";
$sql = "select * from products {$cond} limit {$nop} offset {$offset} ";
$products = select_list($sql);

// Đếm số lượng các sản phẩm trong db
$sqlCount = "select count(*) as c from products {$cond}";
//2.2. Thực thi sql
$count = select_one($sqlCount);
$total = $count['c'];
// print_r($total);exit();
// print_r($count);exit();
$num = ceil($total / $nop);

/* subcate */
$sql = "select * from sub_cate where cid = {$sub_cate_id}";
$sub_cate = select_list($sql);

$user = isset($_SESSION['account']) ? $_SESSION['account'] : null;

$sql = "select * from categories";
$result_parents = select_list($sql);

$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);

?>

<!-- Start HTML -->
<?php require_once('../root/top.php') ?>
<?php top($result["name"]) ?>
</head>

<body>
    <div id="toast"></div>
    <?php require_once('../root/header.php') ?>

    <div class="wrapper">
        <input type="hidden" id="page">
        <div class="category">
            <div class="category__top">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $result["name"] ?></li>
                    </ol>
                </nav>
                <h2 class="category__title" id="textChange"><?php echo $result["name"] ?> <span>(Tổng <?php echo $total ?> sản phẩm)</span></h2>
            </div>

            <div class="category__content">
                <!-- left -->
                <div class="category__content-left">
                    <h3 class="filter-text">LỌC SẢN PHẨM</h3>

                    <input type="hidden" id="cid" value="<?php echo $result['id'] ?>">

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
                                        <ul>
                                            <?php switch ($item['name']):
                                                case ('DANH MỤC'): ?>
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="product_check form-check-input" id="cate_brand" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label class="form-check-label">
                                                                    <input type="checkbox" class="product_check" id="cate_price" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="cate_demand" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="cate_cpu" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="cate_ram" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="cate_hd" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="cate_vga" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="cate_dvdrw" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="cate_sc_hd" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="cate_sc_hz" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="cate_os" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
                                                                <label>
                                                                    <input type="checkbox" class="product_check" id="cate_insurance" value="<?php echo $content ?>">
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
                                                                <input type="hidden" id="<?php echo $sub_cate_id ?>" checked>
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
                                <input type="text" id="filter-start" placeholder="2.000.000 ">
                                <span>đ</span>
                                <label for="filter-end"> - </label>
                                <input type="text" id="filter-end" placeholder="189.999.000 ">
                                <span>đ</span>
                                <a href="#" class="btn category__btn">Lọc</a>
                                <!-- <input type="hidden" id="hidden_minimum_price" value = "0"> 
                                <input type="hidden" id="hidden_maximum_price" value = "65000">
                                <p id="price_show">2.000.000 đ - 189.999.000 đ</p>
                                <div id="price_range"></div> -->
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

                            <select class="form-select" id="select_sort">
                                <option selected>Lọc sản phẩm</option>
                                <option value="rate">Đánh giá</option>
                                <option value="alphabet">Tên A->Z</option>
                            </select>
                            <nav aria-label="Page navigation">
                                <ul class="pagination">
                                    <?php for ($i = 1; $i <= $num; $i++) { ?>
                                        <li class="page-item"><a class="page-link" href="category.php?id=<?php echo $id ?>
                                    &p=<?php echo $i ?>"><?php echo $i ?>

                                            </a></li>
                                    <?php } ?>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="category__products" id="cate_res">
                        <svg viewBox="25 25 50 50" class="hide" id="loader">
                            <circle cx="50" cy="50" r="20"></circle>
                        </svg>
                        <?php foreach ($products as $data) { ?>
                            <div class="product">
                                <!--  -->
                                <div class="aspect-ratio">
                                    <a href="detail.php?id=<?php echo $data["id"] ?>" class="product__img"><img src="<?php $img = explode(',', $data['img']);
                                                                                                                        echo $img[0]; ?>" alt=""></a>
                                    <div class="product__item--info">
                                        <a href="detail.php?id=<?php echo $data["id"] ?>" class="product__item--info-title"><?php echo $data["title"] ?></a>
                                        <p class="product__item--info-text">- Giá bán:&emsp;&emsp;&emsp;<?php echo $data["price"] ?>đ [Đã bao gồm VAT]</p>
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
                                <!--  -->
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
                                            <span class="sale"><?php echo $data['sale'] ?></span>
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
                                    <li class="page-item"><a class="page-link" href="category.php?id=<?php echo $id ?>&p=<?php echo $i ?>"><?php echo $i ?></a></li>
                                <?php } ?>
                            </ul>
                        </nav>
                    </div>

                    <div class="category__more">
                        <?php echo $result["body"] ?>
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
    <script src="../assets/js/slick-slider.js"></script>
    <!--  -->
    <script src="../assets/js/all.js"></script>
    <script src="../assets/js/toast_msg.js"></script>
    <script src="../assets/js/ajax_fetch_showroom.js"></script>
    <script src="../assets/js/mail.js"></script>
    <!--  -->
    <script src="../assets/js/actions/action.js"></script>

    <?php require_once('../root/show_toast.php'); ?>
</body>

</html>