<?php
session_start();
require_once("../../../libs/lib_db.php");

//get input
//tao sql
$sql = "select * from grab_category";
//echo $sql;exit();
//thuc thi cau lenh sql
$cates = select_list($sql);
//print_r($cates);exit();

// $statuses = default_statuses();

$sql = "select * from grab_category";
$result_parents = select_list($sql);
$sql = 'SELECT * FROM grab_content ORDER BY id DESC LIMIT 1';
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
<?php top('Trang chủ') ?>
</head>

<body>
    <?php require_once('../../../root/manage/header.php') ?>

    <!-- ADD -->
    <div class="exec__content wrapper">
        <div class="exec__top">
            <h1>Thêm thông tin</h1>
            <div class="exec__more">
                <ul>
                    <li><a href="add.php"><i class="fas fa-plus"></i></a></li>
                    <li><a href="search.php"><i class="fas fa-search"></i></a></li>
                </ul>
            </div>
        </div>
        <br />
        <form class="form" action="./process/process_insert.php" method="POST" enctype="multipart/form-data">
            <label>Category <span class="text-red">*</span></label>
            <select name="cid" required>
                <option value="">Chọn chuyên mục</option>
                <?php foreach ($cates as $item) { ?>
                    <option value="<?php echo $item["id"] ?>"><?php echo $item["name"] ?></option>
                <?php } ?>
            </select>

            <label>Image <span class="text-red">*</span></label>
            <input name="img" type="file" value="" required />
            <img src="" width="200px" />

            <label>Title <span class="text-red">*</span></label>
            <input name="title" value="" placeholder="Title" required />

            <label>Product Code <span class="text-red">*</span></label>
            <input name="product_code" value="" placeholder="ABCD123" required />

            <label>Product Info</label>
            <textarea placeholder="Remember to enter the data inside the <li></li> tag pair" name="product_info"></textarea>

            <label>Start Price</label>
            <input name="start_price" value="" placeholder="00.000.000đ" />

            <label>Price <span class="text-red">*</span></label>
            <input name="price" value="" placeholder="00.000.000" required />

            <label>Sale</label>
            <input name="sale" value="" placeholder="(Tiết kiệm: x% )" />

            <label>Insurance</label>
            <input name="insurance" value="" placeholder="x Tháng" />

            <label>Gifts</label>
            <textarea placeholder="Remember to use HTML tag <>" name="gift"></textarea>

            <label>Description</label>
            <textarea placeholder="Remember to use h2 <hr> h3 and p tag <>" name="description"></textarea>

            <div class="exec_bottom">
                <button type="submit" name="submit">ADD</button>
                <div class="exec__more">
                    <ul>
                        <li><a href="add.php"><i class="fas fa-plus"></i></a></li>
                        <li><a href="search.php"><i class="fas fa-search"></i></a></li>
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
    <script src="../../../assets/js/ajax/ajax_fetch_showroom.js"></script>
    <script src="../../../assets/js/mail.js"></script>

</body>

</html>