<?php
session_start();
require_once("../../../libs/lib_db.php");

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
if ($id <  1) return;
//tao sql
$sql = "select * from products 
	where id={$id}";
//echo $sql;exit();
//thuc thi cau lenh sql
$result = select_one($sql);
//print_r($result);exit();
if (!$result) return;
//print_r($result);exit();

$sql = "select * from categories";
$result_parents = select_list($sql);
$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
if (isset($_SESSION['account'])) {
    $user = $_SESSION['account'];
}
if ($user['role'] == 0) {
    header("location:index.php");
}
?>

<!-- Start HTML -->
<?php require_once('../../../root/manage/top.php') ?>
<?php top('Xóa sản phẩm') ?>
</head>

<body>
    <div id="toast"></div>
    <?php require_once('../../../root/manage/header.php') ?>

    <!-- DELETE -->
    <div class="exec__content wrapper">
        <div class="exec__top">
            <h1>Xóa thông tin</h1>
            <div class="exec__more">
                <ul>
                    <li><a href="./"><i class="fas fa-plus"></i></a></li>
                    <li><a href="./search.php"><i class="fas fa-search"></i></a></li>
                </ul>
            </div>
        </div>
        <br />
        <form class="form" action="./process/process_delete.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $result["id"] ?>" />

            <label>Category</label>
            <select name="cid" disabled>
                <option value="">Chọn chuyên mục</option>
                <?php foreach ($cates as $item) { ?>
                    <option value="<?php echo $item["id"] ?>" <?php if ($item["id"] == $result["cid"]) { ?>selected<?php } ?>><?php echo $item["name"] ?></option>
                <?php } ?>
            </select>

            <label>Image</label>
            <img src="<?php $img = explode(',', $result['img']);
                        echo $img[0]; ?>" width="200px" />

            <label>Title</label>
            <input name="title" value="<?php echo $result["title"] ?>" disabled />

            <label>Product Code</label>
            <input name="title" value="<?php echo $result["product_code"] ?>" disabled />

            <label>Product Info</label>
            <textarea name="description" disabled><?php echo $result["product_info"] ?></textarea>

            <label>Start Price</label>
            <input name="start_price" value="" disabled />

            <label>Price</label>
            <input name="price" value="<?php echo number_format($result['price'], 0, '.', '.') . 'đ' ?>" disabled />

            <label>Sale</label>
            <input name="sale" value="" disabled />

            <label>Insurance</label>
            <input name="title" value="" disabled />

            <label>Gifts</label>
            <textarea name="description" disabled><?php echo $result["gift"] ?></textarea>

            <label>Description</label>
            <textarea name="description" disabled><?php echo $result["description"] ?></textarea>

            <div class="exec_bottom">
                <button type="submit" name="submit">DELETE</button>
                <div class="exec__more">
                    <ul>
                        <li><a href="./"><i class="fas fa-plus"></i></a></li>
                        <li><a href="./search.php"><i class="fas fa-search"></i></a></li>
                    </ul>
                </div>
            </div>
        </form>
        <br />
        <br />
    </div>

    <?php require_once('../../../root/manage/bottom.php') ?>

    <script src="../../../assets/js/all.js"></script>
    <script src="../../../assets/js/toast_msg.js"></script>
    <script src="../../../assets/js/ajax/ajax_fetch_showroom.js"></script>
    <script src="../../../assets/js/mail.js"></script>

    <?php require_once('../../../root/show_toast.php'); ?>

</body>

</html>