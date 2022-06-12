<?php
session_start();
require_once("../../../libs/lib_db.php");

$sql = "select * from categories";
$cates = select_list($sql);

$sql = "select * from categories";
$result_parents = select_list($sql);
$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);

if (isset($_SESSION['account'])) {
    $user = $_SESSION['account'];
}
if ($user['role'] == 0) {
    header("location:../../");
}
?>

<!-- Start HTML -->
<?php require_once('../../../root/manage/top.php') ?>
<?php top('Thêm sản phẩm') ?>
<script defer src="../../../assets/js/toast_msg.js"></script>
<script type="module" defer src="./js/insert.js"></script>
</head>

<body>
    <div id="toast"></div>

    <?php require_once('../../../root/manage/header.php') ?>

    <!-- ADD -->
    <div class="exec__content wrapper">
        <div class="exec__top">
            <h1>Thêm thông tin</h1>
            <div class="exec__more">
                <ul>
                    <li><a href="./search.php"><i class="fas fa-search"></i></a></li>
                </ul>
            </div>
        </div>
        <br />
        <form class="form" id="form-add" enctype="multipart/form-data" method="post" action="./process/process_insert.php">
            <label>Chuyên mục <span class="text-red">*</span></label>
            <select name="cid">
                <option value="">Chọn chuyên mục</option>
                <?php foreach ($cates as $item) { ?>
                    <option value="<?php echo $item["id"] ?>"><?php echo $item["name"] ?></option>
                <?php } ?>
            </select>

            <label>Hình ảnh <span class="text-red">*</span></label>
            <input name="img" type="file" value="" />
            <img src="" width="200px" />

            <label>Tên sản phẩm <span class="text-red">*</span></label>
            <input name="title" value="" placeholder="Title" />

            <label>Mã SP: <span class="text-red">*</span></label>
            <input name="product_code" value="" placeholder="ABCD123" />

            <label>Thông tin SP:</label>
            <textarea placeholder="Thông tin sản phẩm" name="product_info"></textarea>

            <label>Giá ban đầu</label>
            <input name="start_price" value="" />

            <label>Giá hiện tại <span class="text-red">*</span></label>
            <input name="price" value="" placeholder="Nhập giá tiền" />

            <label>Phần trăm giảm giá</label>
            <input name="sale" value="" placeholder="(Tiết kiệm: x% )" />

            <label>Thời gian bảo hành</label>
            <input name="insurance" value="" placeholder="x Tháng" />

            <label>Quà khuyến mãi</label>
            <textarea placeholder="Quà khuyến mãi" name="gift"></textarea>

            <label>Mô tả sản phẩm</label>
            <textarea placeholder="Mô tả sản phẩm" name="description"></textarea>

            <div class="exec_bottom">
                <button type="submit" name="submit">ADD</button>
                <div class="exec__more">
                    <ul>
                        <li><a href="./search.php"><i class="fas fa-search"></i></a></li>
                    </ul>
                </div>
            </div>
        </form>
        <br />
        <br />
    </div>

    <?php require_once('../../../root/manage/bottom.php') ?>

    <!--  -->
    <script src="../../../assets/js/all.js"></script>
    <script src="../../../assets/js/toast_msg.js"></script>
    <?php require_once('../../../root/show_toast.php') ?>

</body>

</html>