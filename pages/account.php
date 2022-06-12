<?php
session_start();
require_once("../libs/lib_db.php");
require_once("../auth/process/checklogin.php");
$user = checkLoggedUser();
$sql1 = 'SELECT * FROM user_table ORDER BY id DESC LIMIT 1';
$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
$resultLast1 = select_one($sql1);
$sql = "select * from categories";
$result_parents = select_list($sql);
$user = "";
if (isset($_SESSION['account'])) {
    $user = $_SESSION['account'];
}

$data = array();
$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : "";
$new_password = isset($_REQUEST["new_password"]) ? md5($_REQUEST["new_password"]) : "";
$phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : "";
$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
$gender = isset($_REQUEST["gender"]) ? $_REQUEST["gender"] * 1 : 0;
$address = isset($_REQUEST["address"]) ? $_REQUEST["address"] : "";

$data["username"] = $username;
$data["password"] = $new_password;
$data["phone"] = $phone;
$data["email"] = $email;
$data["gender"] = $gender;
$data["address"] = $address;
$tbl = "user_table";
$cond = "id={$id}";
$sql = data_to_sql_update($tbl, $data, $cond);
$ret = exec_update($sql);
if ($id) {
    echo '<script>alert("Bạn đã cập nhật thông tin thành công!")</script>';
    header('Refresh: 1; url=account.php');
}

?>

<!-- Start HTML -->
<?php require_once('../root/top.php') ?>
<?php top('Thông tin tài khoản') ?>
</head>

<body>
    <div id="toast"></div>
    <?php require_once('../root/header.php') ?>

    <div class="account__top">
        <h2>Xin chào <span class="text-danger"><?php echo $user['username'] ?></span>! Bạn đã đăng nhập thành công</h2>
    </div>

    <?php if ($user['role'] == 1) { ?>
        <div class="account__form row wrapper">
            <div class="col"><a href="./" class="account__item">Home<i class="fas fa-home"></i></a></div>
            <div class="col"><a href="./manage/goods/" class="account__item">Add<i class="fas fa-plus"></i></a></div>
            <div class="col"><a href="./manage/goods/delete.php?id=<?php echo $resultLast['id'] ?>" class="account__item">Delete<i class="far fa-trash-alt"></i></a></div>
            <div class="col"><a href="./manage/goods/update.php?id=<?php echo $resultLast['id'] ?>" class="account__item">Edit<i class="far fa-edit"></i></i></a></div>
            <div class="col"><a href="./manage/goods/search.php" class="account__item">Search<i class="fas fa-search"></i></a></div>
            <div class="col"><a href="../auth/logout.php" class="account__item">Logout<i class="fas fa-sign-out-alt"></i></a></div>
        </div>
        <div class="account__top">
            <h2><span class="text-danger">Quản lý Nhân Viên</span>! </h2>
        </div>
        <div class="account__form row wrapper">

            <div class="col"><a href="./manage/staffs/insert.php" class="account__item">Add<i class="fas fa-plus"></i></a></div>
            <div class="col"><a href="./manage/staffs/delete.php?id=<?php echo $resultLast1['id'] ?>" class="account__item">Delete<i class="far fa-trash-alt"></i></a></div>
            <div class="col"><a href="./manage/staffs/update.php" class="account__item">Edit<i class="far fa-edit"></i></i></a></div>
        </div>
    <?php } else { ?>

        <form class="form form__account" action="account.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $user["id"] ?>" />

            <div class="form-group">
                <p>Họ tên</p>
                <input name="username" value="<?php echo $user["username"] ?>" placeholder="Tên tài khoản" />
            </div>

            <div class="form-group">
                <p>Mật khẩu mới</p>
                <input name="new_password" placeholder="Mật khẩu mới" />
            </div>

            <div class="form-group">
                <p>Số điện thoại</p>
                <input name="phone" value="<?php echo $user["phone"] ?>" placeholder="Số điện thoại" />
            </div>

            <div class="form-group">
                <p>Email</p>
                <input name="email" value="<?php echo $user["email"] ?>" placeholder="Email" />
            </div>


            <div class="form-group form-gender">
                <p>Giới tính</p>
                <div><input class="form-check-input" type="radio" name="gender" id="gender1" value='1' <?php if ($user["gender"] == 1) echo 'checked' ?>>
                    <label class="form-check-label" for="gender1">
                        Nam
                    </label>
                </div>
                <div><input class="form-check-input" type="radio" name="gender" id="gender0" value='0' <?php if ($user["gender"] == 0) echo 'checked' ?>>
                    <label class="form-check-label" for="gender0">
                        Nữ
                    </label>
                </div>
            </div>

            <div class="form-group">
                <p>Địa chỉ</p>
                <input name="address" value="<?php echo $user["address"] ?>" placeholder="Địa chỉ của bạn" />
            </div>

            <button name="update" type="update" value="update" class="btn btn-danger fs-2 px-4 py-1 mx-auto mt-4">Cập nhật</button>

        </form>
    <?php } ?>

    <?php require_once('../root/bottom.php') ?>

    <!--  -->
    <script src="../assets/js/all.js"></script>
    <script src="../assets/js/toast_msg.js"></script>

    <?php require_once('../root/show_toast.php'); ?>
</body>

</html>