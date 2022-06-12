<?php
require_once("../../connect.php");


if (isset($_POST['action'])) {
    // print_r($_POST['action']);
    if (isset($_POST['page'])) $page = ($_POST['page']);

    $cid =  ($_POST['cid']);

    $sql = ' SELECT * FROM products where cid = ' . $cid;


    if (isset($_POST['brand'])) {
        $brand = implode("','", $_POST['brand']);
        $sql .= " and (title like '%{$brand}%' or product_info like '%{$brand}%' or description like '%{$brand}%')";
    }
    if (isset($_POST['price'])) {
        $price = implode("','", $_POST['price']);
        $price = str_replace(" Triệu", '000000', $price);
        $price = str_replace(" triệu", '000000', $price);
        $price = str_replace(" ngàn", '000', $price);
        // echo $price;
        if (strpos($price, 'Trên') === false) {
            $price = filter_var($price, FILTER_SANITIZE_NUMBER_INT);
        }
        // echo $price;
        if ((strlen($price) <= 8)) {
            $sql .= " and price <= $price";
        } elseif (strpos($price, 'Trên') !== false) {
            $price = filter_var($price, FILTER_SANITIZE_NUMBER_INT);
            $sql .= " and price >= $price";
        } else {
            $price = str_replace('-', ' and ', $price);
            $sql .= " and price BETWEEN $price";
        }
    }
    if (isset($_POST['demand'])) {
        $demand = implode("','", $_POST['demand']);
        $sql .= " and (description like '%{$demand}%')";
    }
    if (isset($_POST['cpu'])) {
        $cpu = implode("','", $_POST['cpu']);
        if (strpos($cpu, 'Intel') !== false) {
            $cpu = str_replace('Intel ', '', $cpu);
            if (strpos($cpu, 'Core') !== false) {
                $cpu = str_replace('Core ', '', $cpu);
            }
        } else if (strpos($cpu, 'AMD') !== false) {
            $cpu = str_replace('AMD ', '(', $cpu);
        }
        // echo $cpu;
        $sql .= " and (title like '%{$cpu}%' or product_info like '%{$cpu}%' or description like '%{$cpu}%')";
    }
    if (isset($_POST['ram'])) {
        $ram = implode("','", $_POST['ram']);
        $sql .= " and (title like '%{$ram}%' or product_info like '%{$ram}%' or description like '%{$ram}%')";
    }
    if (isset($_POST['hard_drive'])) {
        $hard_drive = implode("','", $_POST['hard_drive']);
        if (strpos($hard_drive, 'SSD + HDD') !== false) {
            $hard_drive = str_replace('+', 'and like ', $hard_drive);
        }
        $sql .= " and (title like '%{$hard_drive}%' or product_info like '%{$hard_drive}%' or description like '%{$hard_drive}%')";
    }
    if (isset($_POST['vga'])) {
        $vga = implode("','", $_POST['vga']);
        if (strpos($vga, 'VGA') !== false) {
            $vga = str_replace('VGA ', '', $vga);
        }
        $sql .= " and (title like '%{$vga}%' or product_info like '%{$vga}%' or description like '%{$vga}%')";
    }
    if (isset($_POST['dvdrw'])) {
        $dvdrw = implode("','", $_POST['dvdrw']);
        $sql .= " and (title != 'DVDRW')";
    }
    if (isset($_POST['screen_hd'])) {
        $screen_hd = implode("','", $_POST['screen_hd']);
        $screen_hd = substr($screen_hd, 0, strpos($screen_hd, ' ('));
        if (strpos($screen_hd, 'Full HD') !== false) $screen_hd = 'FHD';
        $sql .= " and (title like '%{$screen_hd}%' or product_info like '%{$screen_hd}%' or description like '%{$screen_hd}%')";
    }
    if (isset($_POST['screen_hz'])) {
        $screen_hz = implode("','", $_POST['screen_hz']);
        $screen_hz = str_replace(' ', '', $screen_hz);
        $sql .= " and (title like '%{$screen_hz}%' or product_info like '%{$screen_hz}%' or description like '%{$screen_hz}%')";
    }
    if (isset($_POST['os'])) {
        $os = implode("','", $_POST['os']);
        $sql .= " and (title like '%{$os}%' or product_info like '%{$os}%' or description like '%{$os}%')";
    }
    if (isset($_POST['insurance'])) {
        $insurance = implode("','", $_POST['insurance']);
        $sql .= " and insurance like '%{$insurance}%'";
    }
    if (isset($_POST['new_product'])) {
        $new_product = implode("','", $_POST['new_product']);
        $sql .= " order by id desc";
    }
    if (isset($_POST['high_view'])) {
        $high_view = implode("','", $_POST['high_view']);
        $sql .= " order by view_qnt desc";
    }
    if (isset($_POST['much_lower'])) {
        $much_lower = implode("','", $_POST['much_lower']);
        $sql .= " order by sale desc";
    }
    if (isset($_POST['price_upper'])) {
        $price_upper = implode("','", $_POST['price_upper']);
        $sql .= " order by price asc";
    }
    if (isset($_POST['price_lower'])) {
        $price_lower = implode("','", $_POST['price_lower']);
        $sql .= " order by price desc";
    }
    // $sql .= " limit {$nop} offset {$offset}";
    $sql = str_replace(',', ' and ', $sql);
    // die($sql);
    $result = $conn->query($sql);
    $output = '';

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $img = explode(',', $row['img']);
            $output .= '
                    <div class="product">
                        <div class="aspect-ratio">
                        <a href="detail.php?id=' . $row["id"] . '" class="product__img"><img src="' . $img[0] . '"></a>
                        <div class="product__item--info">
                            <a href="detail.php?id=' . $row["id"] . '" class="product__item--info-title">' . $row["title"] . '</a>
                            <p class="product__item--info-text">- Giá bán:&emsp;&emsp;&emsp;' . $row["price"] . 'đ [Đã bao gồm VAT]</p>
                            <p class="product__item--info-text">- Giá thấp nhất:<span class="text-bold">' . number_format($row['price'], 0, '.', '.') . 'đ</span></p>
                            <p class="product__item--info-text">- Bảo hành:&emsp;&emsp;' . $row["insurance"] . '</p>
                            <p class="product__item--info-text">- Kho hàng:&emsp;&emsp;<i class="fas fa-map-marker-alt"></i><span>131 Lê Thanh Nghị - Hai Bà Trưng - Hà Nội</span></p>

                            <span class="product__item--info-more"><i class="fas fa-layer-group"></i>Thông số sản phẩm</span>
                            <ul class="product_infos">
                                ' . $row["product_info"] . '
                            </ul>

                            <span class="product__item--info-more"><i class="fas fa-gift"></i>Chương trình khuyến mại</span>
                            <p class="product__item--info-text">MIỄN PHÍ GIAO HÀNG TOÀN QUỐC (trừ ghế, bàn, màn chiếu) đến hết 31/12/2021. Chi tiết xem <a href="#">tại đây</a>.</p>
                        </div>
                        </div>
                        <!--  -->
                        <div class="product__info-top">
                                <div class="product__rate">
                                    <i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i><i class="far fa-star"></i>
                                    <span class="product__qnt">(' . $row["rate_qnt"] . ')</span>
                                </div>
                                <div class="product__code"><span>mã: ' . $row["product_code"] . '</span></div>
                            </div>
                        <div class="product__info">
                            <a href="detail.php?id=' . $row["id"] . '" class="product__name">' . $row["title"] . '</a>
                            <div class="product__info--main">
                                <ul class="product__info-list">
                                    <?php
                                        if($row["cid"] == 1){
                                            echo $row["product_info"];
                                        }
                                    ?>
                                </ul>
                            </div>
                            <div class="product__price">
                                <div>
                                    <span class="start__price">' . $row["start_price"] . '</span>
                                    <span class="sale">' . $row["sale"] . '</span>
                                </div>
                                <h3 class="current__price">' . number_format($row['price'], 0, '.', '.') . 'đ</h3>
                                <div class="status-goods">
                                    <span class="' . $row["product_status"] . '"><i class="' . $row["product_status-icon"] . '"></i>' . $row["product_status-text"] . '</span>
                                    <a href="#"><i class="fas fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>';
        }
    } else {
        $output = "<h3 class='d-block fs-1 p-5 text-center text-danger fw-bold lh-lg'>Không có sản phẩm được tìm thấy!</h3>";
    }
    echo $output;
}
