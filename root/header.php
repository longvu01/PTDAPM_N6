<header class="header">
    <div class="d-none header__mb-icon d-none">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas0-header" aria-controls="offcanvasExample">
            <i class="service__item-icon fas fa-bars"></i>
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas0-header" aria-labelledby="offcanvasExampleLabel-header">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title service__canvas-top" id="offcanvasExampleLabel-header">
                    <i class="fas fa-user service__canvas-icon"></i>
                    <?php if ($user) { ?>
                        <div>
                            <p class="fs-3">Xin chào</p>
                            <a href="account.php" class="fs-2"><?php echo $user['username'] ?></a fs-3>
                        </div>
                    <?php } else { ?>
                        <a href="../auth/signup.php">Đăng ký</a>/
                        <a href="../auth/login.php">Đăng nhập</a>
                    <?php } ?>
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
                    <?php foreach ($result_parents as $result_parent) { ?>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading<?php echo $result_parent['id'] ?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $result_parent['id'] ?>" aria-expanded="false" aria-controls="collapse<?php echo $result_parent['id'] ?>">
                                    <i class="<?php echo $result_parent['icon_name'] ?>"></i>
                                    <a href="search.php?q=<?php echo $result_parent['name'] ?>"><?php echo $result_parent['name'] ?></a>
                                </button>
                            </h2>
                            <div id="collapse<?php echo $result_parent['id'] ?>" class="accordion-collapse collapse " aria-labelledby="heading<?php echo $result_parent['id'] ?>" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <ul class="accordion__list">
                                        <?php foreach (explode(',', $result_parent['more']) as $more) { ?>
                                            <li class="accordion__item"><a href="search.php?q=<?php echo $more ?>"><?php echo $more ?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
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
    <div class="wrapper">
        <!-- HEADER__TOP -->
       

        <!-- HEADER__MAIN -->
        <div class="header__main my-2">
            <div class="wrapper d-flex justify-content-between align-items-center">
                <a href="./" class="header-logo">
                <img width = "100" height = "100" src="../assets/images/logos/logo.png" alt="">
                </a>

                <div class="header__main-content d-flex align-items-center">
                    

                    <ul class="user-action-list d-flex">
                        <li class="user-action-item user-action-item--first d-flex align-items-center fs-5 fw-light pe-4">
                            <i class="fas fa-phone-alt"></i>
                            <div>
                                <p class="mb-3">Mua hàng online</p>
                                <p class="fw-bold fs-3">1900.1903</p>
                            </div>
                            <ul class="sub__info--online">
                                <li class="sub__info--online-item">
                                    <span>1</span>
                                    Mua hàng trực tuyến (8h - 24h)
                                </li>
                                <li class="sub__info--online-item">
                                    <span>2</span>
                                    Hỗ trợ kỹ thuật (9h - 21h30)
                                </li>
                                <li class="sub__info--online-item">
                                    <span>3</span>
                                    Dịch vụ kỹ thuật - bảo hành (9h - 17h30)
                                </li>
                                <li class="sub__info--online-item">
                                    <span>0</span>
                                    Chăm sóc khách hàng (8h30 - 21h30)
                                </li>
                            </ul>
                        </li>
                        <li class="user-action-item d-flex align-items-center fs-5 fw-light">
                            <i class="fas fa-user"></i>
                            <?php if ($user) { ?>
                                <div>
                                    <p class="mb-3">Xin chào</p>
                                    <a href="account.php"><?php echo $user['username'] ?></a fs-3>
                                </div>
                                <ul class="sub__info--login">
                                    <li class="sub__info--login-item">
                                        <a href="account.php" class="tau">Tài khoản của tôi</a>
                                    </li>
                                    <li class="sub__info--login-item tau">
                                        <a href="cart" class="tau">Đơn hàng của tôi</a>
                                    </li>
                                    <li class="sub__info--login-item">
                                        <a href="#">Sản phẩm đã xem</a>
                                    </li>
                                    <li class="sub__info--login-item">
                                        <a href="#">Đánh giá của tôi</a>
                                    </li>
                                    <li class="sub__info--login-item">
                                        <a href="../auth/logout.php">Đăng xuất tài khoản</a>
                                    </li>
                                </ul>
                            <?php } else { ?>
                                <div>
                                    <a href="../auth/signup.php" class="mb-3">Đăng ký</a>
                                    <a href="../auth/login.php">Đăng nhập</a fs-3>
                                </div>
                                <ul class="sub__info--login">
                                    <li class="sub__info--login-item">
                                        <a href="../auth/login.php">Đăng nhập</a>
                                    </li>
                                    <li class="sub__info--login-item">
                                        <a href="../auth/signup.php">Đăng ký</a>
                                    </li>
                                    <li class="sub__info--login-item">
                                        <a href="#" class="p-0"><i class="fab fa-google"></i>
                                            Đăng nhập bằng Google</a>
                                    </li>
                                    <li class="sub__info--login-item">
                                        <a href="#" class="p-0"><i class="fab fa-facebook"></i>
                                            Đăng nhập bằng Google</a>
                                    </li>
                                    <li class="sub__info--login-item">
                                        <a href="#" class="p-0"><i class="fas fa-comment"></i>
                                            Đăng nhập bằng Zalo</a>
                                    </li>
                                </ul>
                            <?php } ?>
                        </li>
                        <li class="user-action-item d-flex align-items-center fs-5 fw-light ps-4">

                            <i class="fas fa-shopping-bag  position-relative">
                                <?php
                                if (isset($_SESSION['cart'])) {
                                    $count = count($_SESSION['cart']);
                                    echo "<span class=\"position-absolute\" id=\"cart_count\">$count</span>";
                                } else {
                                    echo '<span class="position-absolute" id="cart_count">0</span>';
                                }
                                ?>
                            </i>
                            <a href="cart.php">Giỏ hàng</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- HEADER__BOTTOM -->
        <div class="header__bottom">
            

            <div class="header__bottom--content d-flex align-items-center justify-content-between">
                <div class="selection selection-scroll me-2 d-block">
                    <a href="#" class="btn me-1 selection__links">danh mục sản phẩm
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="selection__content selection__content-scroll">
                        <ul class="main__content-menu-left-scroll">
                            <?php foreach ($result_parents as $result_parent) { ?>
                                <li class="main__content-item-left">
                                    <a href="category.php?id=<?php echo $result_parent["id"] ?>">
                                        <i class="<?php echo $result_parent['icon_name'] ?>"></i>
                                        <?php echo $result_parent['name'] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="selection">
                    <a href="#" class="btn me-1 selection__links">chính sách - hướng dẫn
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="selection__content">
                        <div class="row">
                            <div class="col">
                                <h2 class="policy__title">hỗ trợ khách hàng</h2>
                                <ul class="policy__list">
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Hướng dẫn mua hàng trực tuyến
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Hướng dẫn thanh toán
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Hướng dẫn mua hàng trả góp
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Tra cứu hóa đơn điện tử
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Tra cứu sản phẩm gửi bảo hành
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Gửi yêu cầu bảo hành
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Biểu mẫu hợp đồng
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Góp ý, khiếu nại
                                        </a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <h2 class="policy__title">chính sách chung</h2>
                                <ul class="policy__list">
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Chính sách chung
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Bảo mật thông tin khách hàng
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Chính sách hàng chính hãng
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Chính sách giao hàng
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Chính sách đổi trả và hoàn tiền
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Chính sách bảo hành
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Chính sách cho doanh nghiệp
                                        </a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <h2 class="policy__title">thông tin khuyến mại </h2>
                                <ul class="policy__list">
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Thông tin khuyến mại
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Sản phẩm khuyến mại
                                        </a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <h2 class="policy__title">thông tin MANGOES</h2>
                                <ul class="policy__list">
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Giới thiệu MANGOES
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Tuyển dụng
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Tin tức công nghệ
                                        </a></li>
                                    <li class="policy__item"><a href="#">
                                            <i class="fas fa-check"></i>
                                            Liên hệ hợp tác
                                        </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="selection">
                    <a href="#" class="btn me-2 selection__links">tìm theo hãng
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="selection__content selection__content--secondary">
                        <div class="brands__top">
                            <h3 class="brands__title">Thương hiệu nổi bật</h3>
                            <a href="#">Xem tất cả
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                        <div class="brands__list">
                            <div class="row brands__row">
                                <div class="col"><a href="search.php?q=asus"><img src="../assets/images/brands/asus.jpg" alt=""></a></div>
                                <div class="col"><a href="search.php?q=dell"><img src="../assets/images/brands/dell.jpg" alt=""></a></div>
                                <div class="col"><a href="search.php?q=msi"><img src="../assets/images/brands/msi.jpg" alt=""></a></div>
                                <div class="col"><a href="search.php?q=hp"><img src="../assets/images/brands/hp.jpg" alt=""></a></div>
                            </div>
                            <div class="row brands__row">
                                <div class="col"><a href="search.php?q=acer"><img src="../assets/images/brands/acer.jpg" alt=""></a></div>
                                <div class="col"><a href="search.php?q=intel"><img src="../assets/images/brands/intel.jpg" alt=""></a></div>
                                <div class="col"><a href="search.php?q=amd"><img src="../assets/images/brands/amd.jpg" alt=""></a></div>
                                <div class="col"><a href="search.php?q=lenovo"><img src="../assets/images/brands/lenovo.jpg" alt=""></a></div>
                            </div>
                            <div class="row brands__row">
                                <div class="col"><a href="search.php?q=gigabyte"><img src="../assets/images/brands/gigabyte.jpg" alt=""></a></div>
                                <div class="col"><a href="search.php?q=microsoft"><img src="../assets/images/brands/microsoft.jpg" alt=""></a></div>
                                <div class="col"><a href="search.php?q=lg"><img src="../assets/images/brands/lg.jpg" alt=""></a></div>
                                <div class="col"><a href="search.php?q=samsung"><img src="../assets/images/brands/samsung.jpg" alt=""></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="search.php" method="GET" class="input__search d-flex align-items-center">
                    <div class="input-outline">
                        <input id="input-outline" type="text" name="q" placeholder="Nhập tên sản phẩm, từ khóa cần tìm">
                        <span class="bottom"></span>
                        <span class="right"></span>
                        <span class="top"></span>
                        <span class="left"></span>
                    </div>
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>
                
            </div>
        </div>
    </div>
    <div class="header__mb-icon d-none">
        <i class="fas fa-shopping-cart ">
            <span class="header__mb-icon-qnt">0</span>
        </i>

    </div>
</header>