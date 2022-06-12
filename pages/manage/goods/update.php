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
//echo $sql;exit();
//thuc thi cau lenh sql
$cates = select_list($sql);

$cookie_name = "user";
$cookie_value = $result['title'];
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

$sql = "select * from categories";
$result_parents = select_list($sql);

$errors = array('img' => '', 'title' => '', 'product_code' => '', 'price' => '');

if (isset($_POST['submit'])) {
    if (empty($_POST['img'])) {
        $errors['img'] = 'Please choose a new images <br />';
    } else {
        $img = $_POST['img'];
    }

    if (empty($_POST['title'])) {
        $errors['title'] = ' A title is required <br />';
    } else {
        $title = $_POST['title'];
    }

    if (empty($_POST['product_code'])) {
        $errors['product_code'] = ' A Product code is required <br />';
    } else {
        $product_code = $_POST['product_code'];
    }

    if (empty($_POST['price'])) {
        $errors['price'] = ' A price is required <br />';
    } else {
        $price = $_POST['price'];
    }
}
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
<?php top('Sửa thông tin sản phẩm') ?>
</head>

<body>
    <div id="toast"></div>
    <?php require_once('../../../root/manage/header.php') ?>

    <!-- EDIT -->
    <div class="exec__content wrapper">
        <div class="exec__top">
            <h1>Sửa thông tin</h1>
            <div class="exec__more">
                <ul>
                    <li><a href="./"><i class="fas fa-plus"></i></a></li>
                    <li><a href="./search.php"><i class="fas fa-search"></i></a></li>
                </ul>
            </div>
        </div>
        <br />

        <form class="form" action="./process/process_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $result["id"] ?>" />

            <label>Category</label>
            <select name="cid">
                <option value="">Chọn chuyên mục</option>
                <?php foreach ($cates as $item) { ?>
                    <option value="<?php echo $item["id"] ?>" <?php if ($item["id"] == $result["cid"]) { ?>selected<?php } ?>><?php echo $item["name"] ?></option>
                <?php } ?>
            </select>

            <label>Old image</label>
            <img src="<?php $img = explode(',', $result['img']);
                        echo $img[0]; ?>" width="200px" />
            <label>Choose new image <span class="text-red">*</span></label>
            <input name="img" type="file" value="<?php echo $result["img"] ?>" required />
            <div class="text-red"><?php echo $errors['img']; ?></div>

            <label>Title <span class="text-red">*</span></label>
            <input name="title" value="<?php echo $result["title"] ?>" placeholder="Title" required />
            <div class="text-red"><?php echo $errors['title']; ?></div>

            <label>Product Code <span class="text-red">*</span></label>
            <input name="product_code" value="<?php echo $result["product_code"] ?>" placeholder="ABCD123" required />
            <div class="text-red"><?php echo $errors['product_code']; ?></div>

            <label>Product Info</label>
            <textarea placeholder="" name="product_info" value="<?php echo $result["product_info"] ?>"></textarea>

            <label>Start Price</label>
            <input name="start_price" value="<?php echo $result["start_price"] ?>" />

            <label>Price <span class="text-red">*</span></label>
            <input name="price" value="<?php echo number_format($result['price'], 0, '.', '.') ?>" placeholder="xxxxxxxx" required />
            <div class="text-red"><?php echo $errors['price'] ?></div>

            <label>Sale</label>
            <input name="sale" value="<?php echo $result["sale"] ?>" placeholder="(Tiết kiệm: đ )" />

            <label>Insurance</label>
            <input name="insurance" value="<?php echo $result["insurance"] ?>" placeholder="x Tháng" />

            <label>Gifts</label>
            <textarea placeholder="Gift" name="gift" value="<?php echo $result["gift"] ?>"></textarea>

            <label>Description</label>
            <textarea placeholder="Description" name="description" value="<?php echo $result["description"] ?>"></textarea>

            <div class="exec_bottom">
                <button name="submit" type="submit" value="submit">Edit</button>
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

    <!--  -->
    <script src="../../../assets/js/all.js"></script>
    <script src="../../../assets/js/toast_msg.js"></script>
    <?php require_once('../../../root/show_toast.php'); ?>

</body>

</html>