<?php
session_start();
require_once("../libs/lib_db.php");

$sql = 'SELECT * FROM grab_category';
$categories = select_list($sql);
$result_parents = select_list($sql);
$sql = 'SELECT * FROM grab_content ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
$user = "";
if (isset($_SESSION['account'])) {
    $user = $_SESSION['account'];
}
?>

<!-- Start HTML -->
<?php require_once('../root/top.php') ?>
<?php top('Trang chủ') ?>
</head>

<body>
    <?php require_once('../root/header_index.php') ?>

    <div class="wrapper">
        <!-- MAIN__CONTENT -->
        <section class="main__content">
            <!--main__content-menu--left-->
            <ul class="main__content-menu-left">

                <?php foreach ($categories as $category) { ?>
                    <li class="main__content-item-left">
                        <a href="./category.php?id=<?php echo $category['id']; ?>">
                            <i class=" <?php echo htmlspecialchars($category['icon_name']); ?> "></i>
                            <?php echo htmlspecialchars($category['name']); ?>
                        </a>
                    </li>
                <?php } ?>

            </ul>

            <!--main__content-right-->
            <div class="main__content-right">
                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/AhkWegIvt1U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen class="main__content-right-1"></iframe>

                <a href="#" class="main__content--link main__content-right-2"><img src="../assets/images/banners/thaydoitenct.png" alt=""></a>

                <a href="#" class="main__content--link main__content-right-3"><img src="../assets/images/banners/lamviectainha.png" alt=""></a>

                <a href="#" class="main__content--link main__content-right-4"><img src="../assets/images/banners/trumlaptop.png" alt=""></a>

                <a href="#" class="main__content--link main__content-right-5"><img src="../assets/images/banners/aw.png" alt=""></a>

                <div class="slider">
                    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6" aria-label="Slide 7"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="7" aria-label="Slide 8"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="8" aria-label="Slide 9"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="9" aria-label="Slide 10"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="10" aria-label="Slide 11"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <a href="#"></a>
                                <img src="../assets/images/slider/21_Oct0468af6801f667e65b977404965133ce.png" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <a href="#"></a>
                                <img src="../assets/images/slider/09_Sep30f9cb2011418ee4304d9939723c94fb.jpg" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <a href="#"></a>
                                <img src="../assets/images/slider/16_Sepcc01c685f8d18a12de9426960a76cbd8.png" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <a href="#"></a>
                                <img src="../assets/images/slider/17_Aug64b3660eb57428b518472ecbf1d89651.jpg" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <a href="#"></a>
                                <img src="../assets/images/slider/20_Jula0d037d74f1f932f062ec28ba166e18b.jpg" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <a href="#"></a>
                                <img src="../assets/images/slider/21_Sepa0f67c51cb5b23015c7983183a9df4c9.png" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <a href="#"></a>
                                <img src="../assets/images/slider/23_Sep0bb263ab134125ab780683af11dddf9e.png" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <a href="#"></a>
                                <img src="../assets/images/slider/26_Julca8e600d08b85456c41a0a04c861ea9c.png" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <a href="#"></a>
                                <img src="../assets/images/slider/29_Seped75375d994936c22bbe17181f9c0292.jpg" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <a href="#"></a>
                                <img src="../assets/images/slider/28_Oct3fc5db4a3766ae57f05a7871bbf3161d.jpg" class="d-block w-100" alt="">
                            </div>
                            <div class="carousel-item">
                                <a href="#"></a>
                                <img src="../assets/images/slider/29_Oct393561cce627c5ced42a0735598efec0.jpg" class="d-block w-100" alt="">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- SERVICE__LIST -->
        <div class="service__list d-none">
            <div class="service__item">
                <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas0" aria-controls="offcanvasExample">
                    <i class="service__item-icon fas fa-bars"></i>
                </button>
                <span>Danh mục sản phẩm</span>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas0" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title service__canvas-top" id="offcanvasExampleLabel">
                            <i class="fas fa-user service__canvas-icon"></i>
                            <a href="#">Đăng ký</a>/
                            <a href="./login.php">Đăng nhập</a>

                        </h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <h3 class="service__canvas-title">
                            <i class="fas fa-bars"></i>
                            Danh mục sản phẩm
                        </h3>
                        <!-- accordion -->
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <i class="fas fa-laptop"></i>
                                        <a href="#">Laptop, Máy tính xách Tay</a>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="accordion__list">
                                            <li class="accordion__item"><a href="#">Laptop Asus</a></li>
                                            <li class="accordion__item"><a href="#">Laptop Dell</a></li>
                                            <li class="accordion__item"><a href="#">Laptop HP</a></li>
                                            <li class="accordion__item"><a href="#">Laptop Lenovo</a></li>
                                            <li class="accordion__item"><a href="#">Laptop Acer</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <i class="fas fa-chalkboard-teacher"></i>
                                        <a href="#">PC Gaming, Streaming</a>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="accordion__list">
                                            <li class="accordion__item"><a href="#">Máy Tính Chơi Game HACOM</a></li>
                                            <li class="accordion__item"><a href="#">Máy Tính Live Stream, PC Stream, Youtuber</a></li>
                                            <li class="accordion__item"><a href="#">Máy Tính Chơi Game Asus</a></li>
                                            <li class="accordion__item"><a href="#">Máy Tính Chơi Game MSI</a></li>
                                            <li class="accordion__item"><a href="#">Máy Tính Chơi Game Gigabyte</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <i class="fas fa-stream"></i>
                                        <a href="#">PC Đồ Họa, Render, Máy Chủ</a>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="accordion__list">
                                            <li class="accordion__item"><a href="#">PC Đồ Họa, Render HACOM</a></li>
                                            <li class="accordion__item"><a href="#">Máy Chủ HACOM</a></li>
                                            <li class="accordion__item"><a href="#">Máy Trạm Hãng</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        <i class="fas fa-temperature-low"></i>
                                        <a href="#">Tản nhiệt PC, Cooling</a>
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <ul class="accordion__list">
                                            <li class="accordion__item"><a href="#">Quạt Tản Nhiệt</a></li>
                                            <li class="accordion__item"><a href="#">Tản nhiệt khí cho PC</a></li>
                                            <li class="accordion__item"><a href="#">Tản nhiệt nước cho PC</a></li>
                                            <li class="accordion__item"><a href="#">Linh phụ kiện tản nhiệt nước</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        <i class="fas fa-desktop"></i>
                                        <a href="#">Màn Hình Máy Tính</a>
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <i class="fab fa-teamspeak"></i>
                                        <a href="#">Phím Chuột, Ghế Game, Gear</a>
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        <i class="fas fa-gamepad"></i>
                                        <a href="#">Máy Chơi Game, Tay Game</a>
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        <i class="fas fa-volume-up"></i>
                                        <a href="#">Loa, Tai Nghe, Mic, Webcam</a>
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingNine">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                        <i class="fas fa-camera"></i>
                                        <a href="#">Camera Quan Sát, Điều Hòa</a>
                                    </button>
                                </h2>
                                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTen">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                        <i class="fas fa-print"></i>
                                        <a href="#">Máy In, Máy Chấm Công</a>
                                    </button>
                                </h2>
                                <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingEleven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                        <i class="far fa-plus-square"></i>
                                        <a href="#">Thiết Bị Văn Phòng Khác</a>
                                    </button>
                                </h2>
                                <div id="collapseEleven" class="accordion-collapse collapse" aria-labelledby="headingEleven" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end accordion -->
                    </div>
                    <a href="tel:19001903" class="service__canvas-link mt-4">
                        <i class="fas fa-phone-volume"></i>
                        <span class="text-red text-italic text-bold">1900 1903</span> <span class="fs-6 m-0">(1000đ/phút)</span>
                    </a>
                    <a href="#" class="service__canvas-link">
                        <i class="fas fa-headphones"></i>
                        <span>Tư vấn mua hàng</span>
                    </a>
                    <a href="#" class="service__canvas-link">
                        <i class="fas fa-wrench"></i>
                        <span>Xây dựng cấu hình</span>
                    </a>
                    <a href="#" class="service__canvas-link">
                        <i class="far fa-eye"></i>
                        <span>Sản phẩm đã xem</span>
                    </a>
                    <a href="#" class="service__canvas-link">
                        <i class="fas fa-temperature-low"></i>
                        <span>Xây dựng tản nhiệt nước</span>
                    </a>
                    <a href="#" class="service__canvas-link">
                        <i class="fas fa-id-card-alt"></i>
                        <span>Liên hệ hợp tác</span>
                    </a>
                    <a href="#" class="service__canvas-link">
                        <i class="fas fa-user-shield"></i>
                        <span>Tra cứu bảo hành</span>
                    </a>

                </div>
            </div>

            <div class="service__item">
                <a href="#" class="btn">
                    <i class="service__item-icon fas fa-tags"></i>
                </a>
                <span>Chương trình khuyến mãi</span>
            </div>

            <div class="service__item">
                <a href="#" class="btn">
                    <i class="service__item-icon fas fa-search"></i>
                </a>
                <span>Sản phẩm vừa xem</span>
            </div>

            <div class="service__item">
                <a href="#" class="btn">
                    <i class="service__item-icon fas fa-wrench"></i>
                </a>
                <span>Xây dựng cấu hình</span>
            </div>
        </div>

        <!-- BANNERS -->
        <section class="mt-3 banners">
            <div class="row">
                <div class="col">
                    <a href="#"><img src="../assets/images/banners/toplaptop.png" alt=""></a>
                </div>
                <div class="col">
                    <a href="#"><img src="../assets/images/banners/vanphongtaigia.png" alt=""></a>
                </div>
                <div class="col">
                    <a href="#"><img src="../assets/images/banners/trongoisp.png" alt=""></a>
                </div>
                <div class="col">
                    <a href="#"><img src="../assets/images/banners/gamemuadich.png" alt=""></a>
                </div>
            </div>
        </section>

        <!-- BESTSELLER -->
        <section class="bestseller mt-3">
            <div class="bestseller__list">
                <div class="bestseller__item">
                    <div class="bestseller__title">
                        <h2 class="bestseller__title-text">laptop học tập</h2>
                        <h2 class="bestseller__title-text">làm việc tại nhà</h2>
                    </div>
                    <div class="bestseller__item-slider">
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller/250_53486_microsoft_surface_pro_7_4.png" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                    <span class="bestseller__qnt">(0)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: ltsu040</span></div>
                            </div>
                            <a href="#" class="bestseller__name">Microsoft Surface Pro 7 (i5 1035G4/8GB RAM/128GB SSD/12.3" Cảm ứng/Win10 Home/Bạc)</a>
                            <div class="bestseller__price">
                                <span class="start__price">24.239.000 đ</span>
                                <span class="sale">(Tiết kiệm: 17%)</span>
                                <h3 class="current__price">19.990.000đ</h3>
                                <div class="status-goods">
                                    <span class="stocking"><i class="fas fa-check"></i>Còn hàng</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller/250_59417_laptop_lenovo_gaming_3_16.png" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                    <span class="bestseller__qnt">(2)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: ltle686</span></div>
                            </div>
                            <a href="#" class="bestseller__name">Laptop Lenovo Gaming 3-15ARH05 (82EY00LBVN) (R5 4600H/8GB RAM/512GB SSD/15.6 FHD 120HZ/GTX1650 4G/Win/Đen)</a>
                            <div class="bestseller__price">
                                <span class="start__price">20.199.000 đ</span>
                                <span class="sale">(Tiết kiệm: 9%)</span>
                                <h3 class="current__price">18.999.000đ</h3>
                                <div class="status-goods">
                                    <span class="stocking"><i class="fas fa-check"></i>Còn hàng</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller/250_53486_microsoft_surface_pro_7_4.png" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                    <span class="bestseller__qnt">(0)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: ltsu040</span></div>
                            </div>
                            <a href="#" class="bestseller__name">Microsoft Surface Pro 7 (i5 1035G4/8GB RAM/128GB SSD/12.3" Cảm ứng/Win10 Home/Bạc)</a>
                            <div class="bestseller__price">
                                <span class="start__price">24.239.000 đ</span>
                                <span class="sale">(Tiết kiệm: 17%)</span>
                                <h3 class="current__price">19.990.000đ</h3>
                                <div class="status-goods">
                                    <span class="stocking"><i class="fas fa-check"></i>Còn hàng</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn bestseller__btn">Xem tất cả sản phẩm</a>
                </div>

                <div class="bestseller__item">
                    <div class="bestseller__title">
                        <h2 class="bestseller__title-text">văn phòng tại gia</h2>
                        <h2 class="bestseller__title-text">làm việc thật đã</h2>
                    </div>
                    <div class="bestseller__item-slider">
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller/250_52594_may_in_hp_laser_107a_4zb77a__5_.jpg" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="bestseller__qnt">(1)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: inhp259</span></div>
                            </div>
                            <a href="#" class="bestseller__name">Máy in HP Neverstop Laser 1000w (4RY23A)</a>
                            <div class="bestseller__price">
                                <span class="start__price">4.649.000 đ</span>
                                <span class="sale">(Tiết kiệm: 32%)</span>
                                <h3 class="current__price">3.149.000đ</h3>
                                <div class="status-goods">
                                    <span class="stocking"><i class="fas fa-check"></i>Còn hàng</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller//250_55839_may_quet_hp_scanjet_pro_2000_s2_6fw06a_1__5_.jpg" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="bestseller__qnt">(1)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: schp041</span></div>
                            </div>
                            <a href="#" class="bestseller__name">Máy quét HP ScanJet Pro 2000 s2 (6FW06A)</a>
                            <div class="bestseller__price">
                                <span class="start__price">8.079.000 đ</span>
                                <span class="sale">(Tiết kiệm: 15%)</span>
                                <h3 class="current__price">6.899.000đ</h3>
                                <div class="status-goods">
                                    <span class="stocking"><i class="fas fa-check"></i>Còn hàng</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller/250_52594_may_in_hp_laser_107a_4zb77a__5_.jpg" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="bestseller__qnt">(1)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: inhp259</span></div>
                            </div>
                            <a href="#" class="bestseller__name">Máy in HP Neverstop Laser 1000w (4RY23A)</a>
                            <div class="bestseller__price">
                                <span class="start__price">4.649.000 đ</span>
                                <span class="sale">(Tiết kiệm: 32%)</span>
                                <h3 class="current__price">3.149.000đ</h3>
                                <div class="status-goods">
                                    <span class="stocking"><i class="fas fa-check"></i>Còn hàng</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn bestseller__btn">Xem tất cả sản phẩm</a>
                </div>

                <div class="bestseller__item">
                    <div class="bestseller__title">
                        <h2 class="bestseller__title-text">làm việc học tập tại nhà</h2>
                        <h2 class="bestseller__title-text">tất cả trong một</h2>
                    </div>
                    <div class="bestseller__item-slider">
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller/250_60007_pc_hp_all_in_one_proone_600_g6.jpg" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="bestseller__qnt">(1)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: pchp674</span></div>
                            </div>
                            <a href="#" class="bestseller__name">PC HP All in One ProOne 400 G6 (i3-10100/4GB RAM/256GB SSD/23.8 inch/Touch/DVDRW/WL+BT/K+M/Win 10) (231Q3PA)</a>
                            <div class="bestseller__price">
                                <span class="start__price">19.189.000 đ</span>
                                <span class="sale">(Tiết kiệm: 5%)</span>
                                <h3 class="current__price">18.149.000đ</h3>
                                <div class="status-goods">
                                    <span class="outstock"><i class="fas fa-phone-alt"></i>Liên hệ</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller/250_60030_pc_asus_all_in_one_v241e_i5.png" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="bestseller__qnt">(1)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: pchp674</span></div>
                            </div>
                            <a href="#" class="bestseller__name">PC Asus All in One V241E (i3-1115G4/8GB RAM/512GB SSD/23.8 inch Full HD/Touch/WL+BT/K+M/Win 10) (V241EAT-BA066T)</a>
                            <div class="bestseller__price">
                                <span class="start__price">17.979.000 đ</span>
                                <span class="sale">(Tiết kiệm: 3%)</span>
                                <h3 class="current__price">17.449.000đ</h3>
                                <div class="status-goods">
                                    <span class="outstock"><i class="fas fa-phone-alt"></i>Liên hệ</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller/250_60007_pc_hp_all_in_one_proone_600_g6.jpg" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="bestseller__qnt">(1)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: pchp674</span></div>
                            </div>
                            <a href="#" class="bestseller__name">PC HP All in One ProOne 400 G6 (i3-10100/4GB RAM/256GB SSD/23.8 inch/Touch/DVDRW/WL+BT/K+M/Win 10) (231Q3PA)</a>
                            <div class="bestseller__price">
                                <span class="start__price">19.189.000 đ</span>
                                <span class="sale">(Tiết kiệm: 5%)</span>
                                <h3 class="current__price">18.149.000đ</h3>
                                <div class="status-goods">
                                    <span class="outstock"><i class="fas fa-phone-alt"></i>Liên hệ</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn bestseller__btn">Xem tất cả sản phẩm</a>
                </div>
                <div class="bestseller__item">
                    <div class="bestseller__title">
                        <h2 class="bestseller__title-text">học và làm tại nhà</h2>
                        <h2 class="bestseller__title-text">mua sắm thả ga</h2>
                    </div>
                    <div class="bestseller__item-slider">
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller/250_50383_tai_nghe_steelseries_arctis_7_2019_edition_white_61508_0002_1.jpg" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="bestseller__qnt">(1)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: tnss0077</span></div>
                            </div>
                            <a href="#" class="bestseller__name">Tai nghe SteelSeries Arctis 3 Edition White 61506</a>
                            <div class="bestseller__price">
                                <span class="start__price">2.019.000 đ</span>
                                <span class="sale">(Tiết kiệm: 11%)</span>
                                <h3 class="current__price">1.799.000đ</h3>
                                <div class="status-goods">
                                    <span class="stocking"><i class="fas fa-check"></i>Còn hàng</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller/250_55856_elgato_wave_3__4_.jpg" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="bestseller__qnt">(1)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: micro066</span></div>
                            </div>
                            <a href="#" class="bestseller__name">MICROPHONE ELGATO WAVE 3</a>
                            <div class="bestseller__price">
                                <span class="start__price">5.049.000 đ</span>
                                <span class="sale">(Tiết kiệm: 14%)</span>
                                <h3 class="current__price">4.359.000đ</h3>
                                <div class="status-goods">
                                    <span class="stocking"><i class="fas fa-check"></i>Còn hàng</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="bestseller__info">
                            <div class="bestseller__content">
                                <a href="#"><img src="../assets/images/bestseller/250_50383_tai_nghe_steelseries_arctis_7_2019_edition_white_61508_0002_1.jpg" alt="" class="bestseller__img"></a>
                            </div>
                            <div class="bestseller__info-top">
                                <div class="bestseller__rate">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="bestseller__qnt">(1)</span>
                                </div>
                                <div class="bestseller__code"><span>mã: tnss0077</span></div>
                            </div>
                            <a href="#" class="bestseller__name">Tai nghe SteelSeries Arctis 3 Edition White 61506</a>
                            <div class="bestseller__price">
                                <span class="start__price">2.019.000 đ</span>
                                <span class="sale">(Tiết kiệm: 11%)</span>
                                <h3 class="current__price">1.799.000đ</h3>
                                <div class="status-goods">
                                    <span class="stocking"><i class="fas fa-check"></i>Còn hàng</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="#" class="btn bestseller__btn">Xem tất cả sản phẩm</a>
                </div>
            </div>
        </section>

        <!--  -->
        <?php foreach ($categories as $category) { ?>
            <?php if ($category['id'] > 8) break; ?>
            <section class="products mt-3">

                <div class="products__top">
                    <a href="./category.php?id=<?php echo $category['id'] ?>" class="products__title"><?php echo $category['name'] ?></a>
                    <ul class="products__list">
                        <?php foreach (explode(',', $category['more']) as $more) { ?>
                            <li class="products__item"><a href="tim-kiem.php?q=<?php echo $more ?>"><?php echo $more ?></a></li>
                        <?php } ?>
                    </ul>
                    <a href="./category.php?id=<?php echo $category['id'] ?>" class="products__seeall">Xem tất cả</a>
                </div>

                <?php
                $sql = "select * from grab_content where cid={$category['id']}";
                $resultOther = select_list($sql);
                ?>

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

                                <a href="./detail.php?id=<?php echo $item["id"] ?>" class="product__name"><?php echo $item["title"] ?></a>

                                <div class="product__price">
                                    <div>
                                        <span class="start__price"><?php echo $item["start_price"] ?></span>
                                        <span class="sale"><?php echo $item["sale"] ?></span>
                                    </div>
                                    <h3 class="current__price"><?php echo number_format($item['price'], 0, '.', '.') ?>₫</h3>
                                    <div class="status-goods">
                                        <span class="<?php echo $item["product_status"] ?>"><i class="<?php echo $item["product_status-icon"] ?>"></i><?php echo $item["product_status-text"] ?></span>
                                        <a href="../process/cart/cart_exec.php?id=<?php echo $item["id"] ?>"><i class="fas fa-shopping-cart"></i></a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                </div>

            </section>

        <?php } ?>
        <!--  -->

        <!-- FORM -->
        <?php require_once('../root/bottom.php') ?>

        <!--  -->
        <script src="../assets/js/libs/slick.min.js"></script>
        <!--  -->
        <script src="../assets/js/slider-config/slick-slider.js"></script>
        <script src="../assets/js/all.js"></script>
        <script src="../assets/js/ajax/ajax_fetch_showroom.js"></script>
        <script src="../assets/js/mail.js"></script>
</body>

</html>