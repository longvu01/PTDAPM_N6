<header class="header">
    <div class="d-none header__mb-icon d-none">
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas0-header" aria-controls="offcanvasExample">
            <i class="service__item-icon fas fa-bars"></i>
        </button>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvas0-header" aria-labelledby="offcanvasExampleLabel-header">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title service__canvas-top" id="offcanvasExampleLabel-header">
                    <i class="fas fa-user service__canvas-icon"></i>
                    <?php if (isset($user)) { ?>
                        <div>
                            <p class="fs-3">Xin chào</p>
                            <a href="account.php" class="fs-2"><?php echo $user['user_name'] ?></a fs-3>
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
        <div class="header__top">
            <div class="header__top-item">
                <div class="header__info">
                    <i class="me-1 fas fa-map-marker-alt"></i>
                    TÌM CỬA HÀNG GẦN NHẤT
                </div>
                <!-- <div class="info__show--primary">
                    <div class="row">
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>1</span> MANGOES - hai bà trưng
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 129 + 131 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25398) - (0243) 6285551
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25393)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: kinhdoanh.haibatrung@hanoicomputer.com
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>2</span> MANGOES - đống đa
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 43 Thái Hà - Đống Đa - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25375) - (0243) 5380088
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25377)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: kinhdoanh.haibatrung@hanoicomputer.com
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h30 hàng ngày
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>3</span> MANGOES - hải phòng
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                406 Tô Hiệu - Lê Chân - Hải Phòng
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25387) - (0243) 58830013
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25389)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: kinhdoanh.haibatrung@hanoicomputer.com
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>4</span> MANGOES - cầu giấy
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 77 + 79 Nguyễn Văn Huyên - Cầu Giấy - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25378) - (0243) 38610088
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25380)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: kinhdoanh.haibatrung@hanoicomputer.com
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>5</span> MANGOES - hà đông
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 511+513 Quang Trung - Hà Đông - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25381) - (024) 38580088
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25383)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: kinhdoanh.haibatrung@hanoicomputer.com
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>6</span> MANGOES - tp. hồ chí minh
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 520 Cách Mạng Tháng Tám - Quận 3 - TP. Hồ Chí Minh
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25400) - (028) 73000322
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25394)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: kinhdoanh.haibatrung@hanoicomputer.com
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h30-20h30 hàng ngày
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>7</span> MANGOES - long biên
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 398 Nguyễn Văn Cừ - Long Biên - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25384) - (024) 7088877
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25386)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: kinhdoanh.haibatrung@hanoicomputer.com
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>8</span> MANGOES - từ sơn
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 299 Minh Khai - Từ Sơn - Bắc Ninh
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25390) - (0222) 3636088
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25392)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: kinhdoanh.haibatrung@hanoicomputer.com
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h30-18h30 hàng ngày
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 info-col">
                            <h2 class="info__location">
                                <span>9</span> MANGOES - hoàn kiếm
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 59 + 61 Thợ Nhuộm - Hoàn Kiếm - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25395) - (024) 32051005
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25397)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: kinhdoanh.haibatrung@hanoicomputer.com
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                        </div>
                        <div class="col-sm-3 info-col">
                            <h2 class="info__location">
                                <span>10</span> MANGOES - bắc từ liêm
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 170 Hồ Tùng Mậu - Cầu Giấy - Hà Nội
                            </h3>
                            <span class="status-open">
                                <i class="fas fa-bolt"></i>
                                sắp khai trương
                                <i class="fas fa-bolt"></i>
                            </span>
                        </div>
                    </div>
                    <div class="row row__info-last">
                        <div class="col info-col">
                            <h2 class="info__location">
                                phòng bán hàng trực tuyến
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 129 + 131 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội
                            </h3>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 1)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: thuydb@hanoicomputer.com
                            </a>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                bộ phận kinh doanh phân phối
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 129 + 131 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội
                            </h3>
                            <a href="tel:0962660316">
                                <i class="fas fa-phone-alt"></i>
                                Mobile: 0962660316 - 0962142200 - 0987957825 - 0963403553
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: thuydb@hanoicomputer.com
                            </a>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                bộ phận bán hàng cho doanh nghiệp
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 129 + 131 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội
                            </h3>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 620)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: thuydb@hanoicomputer.com
                            </a>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                phòng kinh doanh dự án
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 129 + 131 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội
                            </h3>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: diepnm@hanoicomputer.com
                            </a>
                        </div>

                    </div>
                </div> -->
            </div>
            <div class="header__top-item">
                <div class="header__info header__info--call">
                    <i class="me-1 fas fa-phone"></i>
                    Khách Cá Nhân
                </div>
                <!-- <div class="info__show--secondary">
                    <div class="row mt-5 text-center">
                        <div class="col-sm-4">
                            <a href="#" class="support__about support__about--active">hỗ trợ tại hà nội/toàn quốc</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="#" class="support__about">hỗ trợ tại hải phòng</a>
                        </div>
                        <div class="col-sm-4">
                            <a href="#" class="support__about">Hỗ trợ tại bắc ninh</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-4 m-auto text-center">
                            <a href="#" class="sell-online">BÁN HÀNG ONLINE (8h - 24h hàng ngày)</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col support">
                            <h3>Khách hàng cá nhân - Hotline 1900 1903 (máy lẻ 1)</h3>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Tuấn
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Thái
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Duy
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Đức
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Huy
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Hà
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Dương
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Mạnh
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Tùng
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Trường
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Ngọc
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Linh
                            </p>
                        </div>
                        <div class="col support">
                            <h3>Tư vấn Sản phẩm</h3>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Tuấn (Tản nhiệt, Cooling)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Thái (Tản nhiệt, Cooling)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Duy (Workstation, Sever)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Đức (Laptop Gaming)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Huy (Gaming Gear, Console)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Hà (Thiết bị văn phòng)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Dương (Thiết bị siêu thị)
                            </p>
                        </div>
                        <div class="col support">
                            <h3>Tư vấn Camera an ninh</h3>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Tuấn (Thái Hà)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Thái (Hà Đông)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Duy (Lê Thanh Nghị)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Đức (Từ Sơn)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Huy (Cầu Giấy)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Hà (Long Biên)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Dương (Hỗ trợ kỹ thuật)
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Hỗ trợ kỹ thuật
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Dương (Hỗ trợ kỹ thuật)
                            </p>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col"></div>
                        <div class="col">
                            <div class="col support">
                                <h3>Hỗ trợ kỹ thuật</h3>
                                <p class="contact">
                                    <i class="far fa-comment-dots"></i>
                                    <span>Zalo</span>
                                    <span>0949383246</span>
                                    Mr Cường
                                </p>
                            </div>
                        </div>
                        <div class="col">
                            <div class="col support">
                                <h3>Tư vấn bảo hành</h3>
                                <p>Tra cứu BH <a href="tel: 1900 1903">19001903 máy lẻ 3</a></p>
                                <p class="contact">
                                    <i class="far fa-comment-dots"></i>
                                    <span>Zalo</span>
                                    Khiếu nại BH
                                    <a href="tel:0949383246">0949383246</a> - <a href="mailto:baohanh@hanoicomputer.com">baohanh@hanoicomputer.com</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="header__top-item">
                <div class="header__info header__info--call">
                    <i class="me-1 fas fa-phone"></i>
                    Khách Doanh Nghiệp
                </div>
                <!-- <div class="info__show--secondary">
                    <div class="row text-center mt-5">
                        <div class="col-sm-4 m-auto">
                            <a href="#" class="support__about support__about--active">Khách hàng doanh nghiệp</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-sm-4 m-auto text-center">
                            <a href="#" class="sell-online">BÁN HÀNG ONLINE (8h - 24h hàng ngày)</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col support">
                            <h3>Khách hàng doanh nghiệp - Hotline 1900 1903 (máy lẻ 157)</h3>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Tuấn
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Thái
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Duy
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Đức
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Huy
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Hà
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Dương
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Mạnh
                            </p>
                        </div>
                        <div class="col support">
                            <h3>Khách hàng đại lý (mua buôn)</h3>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Hòa
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Ms Hà
                            </p>
                        </div>
                        <div class="col support">
                            <h3>Khách hàng dự án, thầu</h3>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Ms Hà
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Linh
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Hiếu
                            </p>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="header__top-item">
                <div class="header__info header__info--call">
                    <i class="me-1 fas fa-phone"></i>
                    Bán hàng - TP HCM
                </div>
                <!-- <div class="info__show--secondary">
                    <div class="row text-center mt-5">
                        <div class="col-sm-4 m-auto">
                            <a href="#" class="support__about support__about--active">hỗ trợ tại tp.hồ chí minh</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col support">
                            <h3>Bán hàng tại Showroom</h3>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Tuấn
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Thái
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Duy
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Đức
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Huy
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Hà
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Dương
                            </p>
                        </div>
                        <div class="col support">
                            <h3>Bán hàng Online (Doanh nghiệp, Cá nhân)</h3>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Hòa
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Ms Hà
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Ms Hà
                            </p>
                        </div>
                        <div class="col support">
                            <h3>Hỗ trợ bảo hành</h3>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Ms Hà
                            </p>
                            <h3 class="mt-4">Chăm sóc khách hàng</h3>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                Hỗ trợ
                                <a href="tel:0949383246">0949383246</a> - <a href="mailto:cskhh@hanoicomputer.com">cskh@hanoicomputer.com</a>
                            </p>

                        </div>
                    </div>
                </div> -->
            </div>
            <div class="header__top-item">
                <div class="header__info header__info--call">
                    <i class="me-1 fas fa-phone"></i>
                    Bán hàng - Showroom
                </div>
                <!-- <div class="info__show--primary">
                    <div class="row">
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>1</span> hanoicomputer - hai bà trưng
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 129 + 131 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25398)
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25393)
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Tuấn
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Tuấn
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>2</span> hanoicomputer - đống đa
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 43 Thái Hà - Đống Đa - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25375) - (0243) 5380088
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25393)
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Sơn
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Sơn
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>3</span> hanoicomputer - hải phòng
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 406 Tô Hiệu - Lê Chân - Hải Phòng
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25398)
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25393)
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Huy
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Dũng
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>4</span> hanoicomputer - cầu giấy
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 77 + 79 Nguyễn Văn Huyên - Cầu Giấy - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25398)
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25393)
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Hưng
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Việt
                            </p>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>5</span> MANGOES - hà đông
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 511+513 Quang Trung - Hà Đông - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25381) - (024) 38580088
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25383)
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Huy
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Dũng
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>6</span> MANGOES - tp. hồ chí minh
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 520 Cách Mạng Tháng Tám - Quận 3 - TP. Hồ Chí Minh
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25400) - (028) 73000322
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25394)
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h30-20h30 hàng ngày
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Huy
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Dũng
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>7</span> MANGOES - long biên
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 398 Nguyễn Văn Cừ - Long Biên - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25384) - (024) 7088877
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25386)
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Huy
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Dũng
                            </p>
                        </div>
                        <div class="col info-col">
                            <h2 class="info__location">
                                <span>8</span> MANGOES - từ sơn
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 299 Minh Khai - Từ Sơn - Bắc Ninh
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25390) - (0222) 3636088
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25392)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: kinhdoanh.haibatrung@hanoicomputer.com
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h30-18h30 hàng ngày
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-3 info-col">
                            <h2 class="info__location">
                                <span>9</span> MANGOES - hoàn kiếm
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 59 + 61 Thợ Nhuộm - Hoàn Kiếm - Hà Nội
                            </h3>
                            <a href="#">
                                <i class="far fa-images"></i>
                                Hình ảnh thực tế showroom
                            </a>
                            <a href="#">
                                <i class="far fa-map"></i>
                                Xem bản đồ đường đi
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Tel: 1900 1903 (máy lẻ 25395) - (024) 32051005
                            </a>
                            <a href="tel:1900 1903">
                                <i class="fas fa-phone-alt"></i>
                                Bảo hành: 1900 1903 (máy lẻ 25397)
                            </a>
                            <a href="mailto:kinhdoanh.haibatrung@hanoicomputer.com">
                                <i class="far fa-envelope"></i>
                                Email: kinhdoanh.haibatrung@hanoicomputer.com
                            </a>
                            <p>
                                <i class="far fa-clock"></i>
                                Thời gian mở cửa: từ 8h-20h hàng ngày
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Huy
                            </p>
                            <p class="contact">
                                <i class="far fa-comment-dots"></i>
                                <span>Zalo</span>
                                <span>0949383246</span>
                                Mr Dũng
                            </p>
                            <span class="status-open">
                                <i class="fas fa-bolt"></i>
                                mới khai trương
                                <i class="fas fa-bolt"></i>
                            </span>
                        </div>
                        <div class="col-sm-3 info-col">
                            <h2 class="info__location">
                                <span>10</span> MANGOES - bắc từ liêm
                            </h2>
                            <h3 class="fw-bold">
                                <i class="fas fa-map-marker-alt"></i>
                                Số 170 Hồ Tùng Mậu - Cầu Giấy - Hà Nội
                            </h3>
                            <span class="status-open">
                                <i class="fas fa-bolt"></i>
                                sắp khai trương
                                <i class="fas fa-bolt"></i>
                            </span>
                        </div>
                    </div>
                </div> -->
            </div>
            <a href="#" class="header__top-item">
                <a href="#" class="header__info">
                    <i class="me-1 fas fa-shield-alt"></i>
                    Tra cứu bảo hành
                </a>
            </a>
            <a href="#" class="header__top-item">
                <a href="#" class="header__info">
                    <i class="me-1 fas fa-file-invoice-dollar"></i>
                    In hóa đơn điện tử
                </a>
            </a>
            <a href="#" class="header__top-item">
                <a href="#" class="header__info">
                    <i class="me-1 fas fa-bullhorn"></i>
                    Tuyển dụng
                </a>
            </a>
        </div>

        <!-- HEADER__MAIN -->
        <div class="header__main my-2">
            <div class="wrapper d-flex justify-content-between align-items-center">
                <a href="./" class="header-logo">
                    <img src="../assets/images/logos/logo-trang.png" alt="">
                </a>

                <div class="header__main-content d-flex align-items-center">
                    <ul class="build-pcs d-flex me-xl-5">
                        <li class="build-pc me-3">
                            <a href="#" class="btn btn-danger p-3"><i class="fas fa-wrench me-1"></i>
                                Xây dựng cấu hình máy tính</a>
                        </li>
                        <li class="build-pc">
                            <a href="#" class="btn btn-danger p-3"><i class="fas fa-temperature-low me-1"></i>
                                Xây dựng tản nhiệt nước PC</a>

                        </li>
                    </ul>

                    <ul class="user-action-list d-flex">
                        <li class="user-action-item user-action-item--first d-flex align-items-center fs-5 fw-light">
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
                            <?php if (isset($user)) { ?>
                                <div>
                                    <p class="mb-3">Xin chào</p>
                                    <a href="login.php"><?php echo $user['user_name'] ?></a fs-3>
                                </div>
                                <ul class="sub__info--login">
                                    <li class="sub__info--login-item">
                                        <a href="account.php" class="tau">Tài khoản của tôi</a>
                                    </li>
                                    <li class="sub__info--login-item tau">
                                        <a href="cart.php" class="tau">Đơn hàng của tôi</a>
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
            <div class="d-flex mb-3">
                <a href="category.php?id=1" class="sell__link">Laptop</a>
                <a href="category.php?id=6" class="sell__link">CPU</a>
                <a href="category.php?id=3" class="sell__link">Máy Tính Chơi Game</a>
                <a href="category.php?id=8" class="sell__link">Màn Hình Máy Tính</a>
            </div>

            <div class="header__bottom--content d-flex align-items-center justify-content-between">
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
                <div class="selection selection-scroll me-2">
                    <a href="#" class="btn me-1 selection__links">danh mục sản phẩm
                        <i class="fas fa-angle-down"></i>
                    </a>
                    <div class="selection__content selection__content-scroll">
                        <ul class="main__content-menu-left-scroll">
                            <?php foreach ($categories as $category) { ?>
                                <li class="main__content-item-left">
                                    <a href="category.php?id=<?php echo $category['id']; ?>">
                                        <i class=" <?php echo htmlspecialchars($category['icon_name']); ?> "></i>
                                        <?php echo htmlspecialchars($category['name']); ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
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
                <!--  -->
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
                <!--  -->
                <a href="#" class="news__info ms-3 me-2">
                    <i class="fas fa-rss me-1"></i>
                    Tin công nghệ</a>
                <a href="#" class="news__info">
                    <i class="fas fa-tags me-1"></i>Khuyến mại</a>
            </div>
        </div>
    </div>
    <!-- <div class="input__search align-items-center d-none">
            <input type="text" placeholder="Nhập tên sản phẩm, từ khóa cần tìm">
            <button class="btn"><i class="fas fa-search"></i></button>
        </div> -->
    <a href="cart.php" class="header__mb-icon d-none">
        <i class="fas fa-shopping-cart position-relative">
            <?php
            if (isset($_SESSION['cart'])) {
                $count = count($_SESSION['cart']);
                echo "<span class=\"position-absolute header__mb-icon-qnt\" id=\"cart_count\">$count</span>";
            } else {
                echo '<span class="position-absolute header__mb-icon-qnt" id="cart_count">0</span>';
            }
            ?>
        </i>
    </a>
</header>