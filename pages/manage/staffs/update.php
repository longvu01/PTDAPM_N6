<?php
session_start();
require_once("../../../libs/lib_db.php");

$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
if ($id <  1) return;
//tao sql
$sql = "select * from user_table 
	where id={$id}";
//echo $sql;exit();
//thuc thi cau lenh sql
$result = select_one($sql);
//print_r($result);exit();
if (isset($_SESSION['account'])) {
    $user = $_SESSION['account'];
}
if ($user['role'] == 0) {
    header("location:index.php");
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

        <form class="form" action="./process/process_update.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $result["id"] ?>" />


            <label>Tên người dùng </label>
            <input class="form-control" name="username" value="<?php echo $result["username"] ?>" placeholder="Tên người dùng mới" style="width: 815px;" />


            <label>Mật khẩu mới</label>
            <input class="form-control" type="text" name="new_password" placeholder="Mật khẩu mới" />

            <label>Số điện thoại </label>
            <input class="form-control" name="phone" value="<?php echo $result["phone"] ?>" placeholder="Số điện thoại mới" />

            <label>Email </label>
            <input class="form-control" name="email" value="<?php echo $result["email"] ?>" placeholder="Email mới" />

            <label>Địa chỉ </label>
            <input class="form-control" name="address" value="<?php echo $result["address"] ?>" placeholder="Địa chỉ mới" />


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