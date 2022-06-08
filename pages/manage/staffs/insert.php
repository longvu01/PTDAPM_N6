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
<?php top('Sửa thông tin nhân viên') ?>
</head>

<body>
    <?php require_once('../../../root/manage/header.php') ?>

    <!-- EDIT -->
    <div class="exec__content wrapper">
        <div class="exec__top">
            <h1>Sửa thông tin nhân viên</h1>
            <div class="exec__more">
                <ul>
                    <li><a href="./insert.php"><i class="fas fa-plus"></i></a></li>

                </ul>
            </div>
        </div>
        <br />

        <form class="form" action="./process/process_insert.php" method="POST" enctype="multipart/form-data">
            <input class = "form-control" type="hidden" name="id" value="" />


            <label>Tên người dùng <span class="text-red">*</span></label>
            <input style="width: 815px;" class = "form-control" name="username" value="" placeholder="" required />


            <label>Mật khẩu <span class="text-red">*</span></label>
            <input class = "form-control" type = "password" name="password" value="" placeholder="" required />

            <label>Số điện thoại <span class="text-red">*</span></label>
            <input class = "form-control" name="phone" value="" placeholder="" required />

            <label>Email <span class="text-red">*</span></label>
            <input class = "form-control" name="email" value="" placeholder="" required />

            <label>Địa chỉ <span class="text-red">*</span></label>
            <input class = "form-control" name="address" value="" placeholder="" required />


            <div class="exec_bottom">
                <button name="submit" type="submit" value="submit">Edit</button>
                <div class="exec__more">
                    <ul>

                    </ul>
                </div>
            </div>
        </form>
    </div>

    <?php require_once('../../../root/manage/bottom.php') ?>

    <!--  -->
    <script src="../../../assets/js/all.js"></script>
</body>

</html>