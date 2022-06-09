<?php
session_start();
require_once("../libs/lib_db.php");

$user_id = isset($_SESSION['user']) ? $_SESSION['user']['id'] : null;

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;
//$q = isset($_REQUEST["q"]) ? trim($_REQUEST["q"]) : "";
if ($id <  1) return;
//$sql = "select * from products where id={$id}";
$sql = "select * from products where id=" . $id;
// echo $sql;exit();
$result = select_one($sql);
// print_r($result);exit();
if (!$result) return;

$sql = "select * from products 
	where cid={$result['cid']} and id !=" . $id;
//echo $sql;exit();
$resultOther = select_list($sql);
// print_r($resultOther);exit();

$cid = $result['cid'];
$sql = "select * from categories where id=" . $cid;
$result_cate = select_one($sql);
// print_r($result_parent);exit();

$sql = "select * from categories";
$result_parents = select_list($sql);
// print_r($result_parents);exit();
$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
$user = "";
if (isset($_SESSION['account'])) {
    $user = $_SESSION['account'];
}

/* select user_review */
$sql = "SELECT * FROM review_table WHERE pid =" . $id;
$user_reviews = select_list($sql);
// print_r ($user_reviews);exit();
?>

<!-- Start HTML -->
<?php require_once('../root/top.php') ?>
<?php top($result["title"]) ?>
</head>

<body>
    <div id="toast"></div>
    <?php require_once('../root/header.php') ?>

    <!-- DETAIL -->
    <div class="wrapper">
        <div class="product__detail">
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb mt-4 product__detail-breadcrumb">
                    <li class="breadcrumb-item"><a href="./">Trang chủ</a></li>
                    <li class="breadcrumb-item" aria-current="page"><a href="./category.php?id=<?php echo $result_cate['id'] ?>"><?php echo $result_cate['name'] ?></a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $result["title"] ?></li>
                </ol>
            </nav>
            <h2 class="product__detail-title"><?php echo $result["title"] ?></h2>
            <!--  -->
            <div class="product__detail-content">
                <div class="product__detail-left">
                    <div class="product__slider">
                        <?php foreach (explode(',', $result['img']) as $img) { ?>
                            <div class="product__slider-item">
                                <img src="<?php echo $img ?>" alt="">
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="product__detail-main">
                    <div class="product__detail-top">
                        <h2 class="product__detail-top-title d-none"><?php echo $result["title"] ?></h2>
                        <ul>
                            <li class="product__detail-top-item">
                                Mã SP: <span><?php echo $result["product_code"] ?></span>
                            </li>
                            <li class="product__detail-top-item">
                                Đánh giá: <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                <span id="user_rating"><?php echo $result["rate_qnt"] ?></span>
                            </li>
                            <li class="product__detail-top-item">
                                Bình luận: <span><?php echo $result["comment_qnt"] ?></span>
                            </li>
                            <li class="product__detail-top-item">
                                Lượt xem: <span><?php echo $result["view_qnt"] ?></span>
                            </li>
                        </ul>
                    </div>
                    <div class="product__detail-info">
                        <h3>Thông số sản phẩm</h3>
                        <ul>
                            <?php foreach (explode(',', $result["product_info"]) as $info) { ?>
                                <li><?php echo $info ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <div class="product__detail-price">
                        <span><?php echo number_format($result['price'], 0, '.', '.') ?> đ</span>
                        <span><?php echo $result["start_price"] ?></span>
                        <span><?php echo $result["sale"] ?></span>
                        <span class="product__detail-price--mb d-none">(Giá đã bao gồm VAT)</span>
                    </div>
                    <div class="product__detail-more">
                        <span>Giá đã có VAT</span>
                        <span>Bảo hành <?php echo $result["insurance"] ?></span>
                        <br>
                        <span class="ribbon">Quét VNPAYQR giảm thêm 100k</span>
                    </div>
                    <div class="product__detail-gifts">
                        <h3 class="product__detail-gifts-title">
                            <i class="fas fa-gift"></i>
                            Quà tặng và ưu đãi kèm theo
                        </h3>
                        <?php echo $result["gift"] ?>
                    </div>
                    <a class="addtocart" href="../process/cart/cart_exec.php?id=<?php echo $result["id"] ?>"><i class="fas fa-cart-plus"></i>Thêm vào giỏ hàng</a>
                    <div class="product__detail-buy">
                        <button class="btn" type="submit" name="add">ĐẶT MUA NGAY
                            <span>Giao hàng tận nơi nhanh chóng</span>
                        </button>
                        <a href="#" class="btn">TRẢ GÓP QUA THẺ VISA, MASTER,...
                            <span>Chỉ từ 3.249.917đ/ tháng (12 tháng)</span>
                            </button>
                            <a href="#" class="btn">TRẢ GÓP HỒ SƠ DUYỆT 15 PHÚT
                                <span>Chỉ từ 6.499.834đ/ tháng (6 tháng)</span>
                            </a>
                    </div>
                </div>


            </div>
            <!--  -->
        </div>
        <div class="product__desc">
            <?php echo $result["description"] ?>
        </div>
        <!-- REVIEW -->
        <div class="card">
            <div class="card-header fs-1 py-4">Khách hàng chấm điểm, đánh giá, nhận xét</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-4 text-center ">
                        <h1 class="text-danger mt-4 mb-4 fs-3">
                            <span id="average_rating">0.0</span> / 5
                        </h1>
                        <div class="mb-3 fs-3">
                            <i class="fas fa-star star-light mr-1 main_star star-light"></i>
                            <i class="fas fa-star star-light mr-1 main_star star-light"></i>
                            <i class="fas fa-star star-light mr-1 main_star star-light"></i>
                            <i class="fas fa-star star-light mr-1 main_star star-light"></i>
                            <i class="fas fa-star star-light mr-1 main_star star-light"></i>
                        </div>
                        <h3 class="fs-3"><span id="total_review">0</span> đánh giá</h3>
                    </div>

                    <div class="col-sm-4">
                        <div class="rate__progress">
                            <div class="progress-label-left"><span class="progress-num">5</span> <i class="fas fa-star text-danger"></i></div>

                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="five_star_progress"></div>
                            </div>
                            <div class="progress-label-right">(<span id="total_five_star_review">0</span>) đánh giá</div>
                        </div>
                        <!--  -->
                        <div class="rate__progress">
                            <div class="progress-label-left"><span class="progress-num">4</span> <i class="fas fa-star text-danger"></i></div>

                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="four_star_progress"></div>
                            </div>
                            <div class="progress-label-right">(<span id="total_four_star_review">0</span>) đánh giá</div>
                        </div>
                        <!--  -->
                        <div class="rate__progress">
                            <div class="progress-label-left"><span class="progress-num">3</span> <i class="fas fa-star text-danger"></i></div>

                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="three_star_progress"></div>
                            </div>
                            <div class="progress-label-right">(<span id="total_three_star_review">0</span>) đánh giá</div>
                        </div>
                        <!--  -->
                        <div class="rate__progress">
                            <div class="progress-label-left"><span class="progress-num">2</span> <i class="fas fa-star text-danger"></i></div>

                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="two_star_progress"></div>
                            </div>
                            <div class="progress-label-right">(<span id="total_two_star_review">0</span>) đánh giá</div>
                        </div>
                        <!--  -->
                        <div class="rate__progress">
                            <div class="progress-label-left"><span class="progress-num">1</span> <i class="fas fa-star text-danger"></i></div>

                            <div class="progress">
                                <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" id="one_star_progress"></div>
                            </div>
                            <div class="progress-label-right">(<span id="total_one_star_review">0</span>) đánh giá</div>
                        </div>
                    </div>

                    <div class="col-sm-4 text-center">
                        <h3 class="my-4 fs-2 fw-bold">Chia sẻ nhận xét về sản phẩm</h3>
                        <button type="button" name="add_review" id="add_review" class="btn btn-primary fs-3 py-3 px-4">Viết nhận xét của bạn</button>
                    </div>
                </div>
            </div>

            <!-- User review content -->
            <div class="mt-5 p-4" id="review_content"></div>
            <!--  -->
            <div id="review_modal" class="modal fade" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fs-1">Đánh giá sản phẩm</h5>
                            <button type="button" class="btn-close fs-3 p-4" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <h4 class="text-center mt-2 mb-4 fs-3">
                                <i class="fas fa-star star-light submit_star mr-1 text-danger" id="submit_star_1" data-rating="1"></i>
                                <i class="fas fa-star star-light submit_star mr-1 text-danger" id="submit_star_2" data-rating="2"></i>
                                <i class="fas fa-star star-light submit_star mr-1 text-danger" id="submit_star_3" data-rating="3"></i>
                                <i class="fas fa-star star-light submit_star mr-1 text-danger" id="submit_star_4" data-rating="4"></i>
                                <i class="fas fa-star star-light submit_star mr-1" id="submit_star_5" data-rating="5"></i>
                            </h4>
                            <div class="form-group mb-3">
                                <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>" />
                            </div>
                            <div class="form-group">
                                <textarea name="user_review" id="user_review" class="form-control fs-3" placeholder="Nhập đánh giá sản phẩm (tối thiểu 80 ký tự)"></textarea>
                                <input type="hidden" id="product_id" value="<?php echo $id ?>">
                            </div>
                            <div class="form-group text-center mt-4">
                                <button type="button" class="btn btn-primary fs-3" id="save_review">Gửi đánh giá</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- OTHER -->
            <div class="wrapper">
                <div class="product_other">
                    <div class="product_other-title">
                        <span>Sản phẩm tương tự</span>
                    </div>
                    <div class="products__content">
                        <?php foreach ($resultOther as $item) { ?>
                            <div class="product">
                                <div class="aspect-ratio">
                                    <a href="./detail.php?id=<?php echo $item["id"] ?>" class="product__img">
                                        <img src=" <?php $img = explode(',', $item['img']);
                                                    echo $img[0]; ?> " alt="">
                                    </a>
                                </div>
                                <div class="product__info">
                                    <div class="product__info-top">
                                        <div class="product__rate">
                                            <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                            <span class="product__qnt">(<?php echo $item["rate_qnt"] ?>)</span>
                                        </div>
                                        <div class="product__code"><span>mã: <?php echo $item["product_code"] ?></span></div>
                                    </div>
                                    <a href="#" class="product__name"><?php echo $item["title"] ?></a>
                                    <div class="product__price">
                                        <span class="start__price"><?php echo $item["start_price"] ?></span>
                                        <span class="sale"><?php echo $item["sale"] ?></span>
                                        <h3 class="current__price"><?php echo number_format($item['price'], 0, '.', '.') ?>đ</h3>
                                        <div class="status-goods">
                                            <span class="<?php echo $item["product_status"] ?>"><i class="<?php echo $item["product_status-icon"] ?>"></i><?php echo $item["product_status-text"] ?></span>
                                            <a href="../process/cart/cart_exec.php?id=<?php echo $item["id"] ?>"><i class="fas fa-shopping-cart"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php require_once('../root/bottom.php') ?>

            <!--  -->
            <script src="../assets/js/libs/slick.min.js"></script>
            <!--  -->
            <script src="../assets/js/slider-config/slick-slider.js"></script>
            <script src="../assets/js/all.js"></script>
            <script src="../assets/js/toast_msg.js"></script>
            <script src="../assets/js/ajax/ajax_fetch_showroom.js"></script>
            <script src="../assets/js/mail.js"></script>
            <script src="../assets/js/review.js"></script>

            <?php require_once('../root/show_toast.php'); ?>
</body>

</html>