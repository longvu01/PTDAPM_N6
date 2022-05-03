<?php
session_start();
require_once("../libs/lib_db.php");
require_once("./process/checklogin.php");
$user = getLoggedUser();
if ($user) {
	header("Location: ../");
	exit();
}
//1. get input
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : "";
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";
// print_r($username);exit();
// print_r($user);

// print_r($_SESSION);exit();
$error = '';
$checkLogin = 1;
$user = 0;
if (isset($_REQUEST["username"])) {
	unset($_SESSION['username']);
	//da nhap thong tin
	//2. Kiem tra
	//2.1.1 tao sql
	$sql = "select * from mvc_user";
	$sql .= " where username='{$username}'";
	// echo "sql=[$sql]"; exit();
	//2.1.2 Thuc thi sql
	$user = select_one($sql);
	// print_r($user);exit();
	//co user
	if (!$user) {
		//thuc hien co user o day
		$checkLogin = 0;
		$error = 'Không tồn tại username';
	} else {
		//kiem tra pass
		// if (md5($password) != $user['password']){
		if (($password) != $user['password']) {
			$checkLogin = 0;
			$error = 'Password không đúng';
		}
	}
	//dung
	if ($checkLogin) {
		// session_start();
		setLoggedUser($user);
		$_SESSION['user'] = $user;
		// print_r($_SESSION['user']);exit();
		echo "Ban da login thanh cong,username=[$username],password=[$password]";
		// exit();
		//chuyen den trang account
		header("Location: ../pages/account.php");
		exit();
	}
}
?>

<!-- Start HTML -->
<?php require_once('../root/top.php') ?>
<?php top('Trang chủ') ?>
</head>

<body>

	<div class="login_form-bgc">
		<form class="login__form" action="login.php" method="POST">
			<div class="login__content">
				<h1>Login</h1>

				<div class="form_group">
					<label for="">Username</label>
					<br>
					<input type="text" name="username" value="<?php echo $username ?>" placeholder="Enter user name">
				</div>
				<div class="form_group">
					<label for="">Password</label>
					<br>
					<input type="password" name="password" id="" placeholder="Enter password">
				</div>
				<?php if ($error) { ?>
					<p class="text-warning"><?php echo $error; ?></p>
				<?php } ?>
				<br />
				<br />
				<p>
					<a href="signup.php"> Sign Up?</a>
				</p>
				<p>or</p>
				<p>
					<a href="./"> Back to home page</a>
				</p>
				<div class="icons">
					<a href="#"><i class="fab fa-google"></i>
					</a>
					<a href="#"><i class="fab fa-facebook"></i>
					</a>
					<a href="#"><i class="fas fa-comment"></i>
					</a>
				</div>
				<button type="submit" name="login" value="login" class="login__btn">Login</button>
			</div>

			<div class="form_img">
				<img src="../assets/images/logos/bg-pop-login-phone.png" alt="">
				<h2 class="fs-3 pt-4 fw-bold">Mua sắm tại Hanoicomputer</h2>
				<p class="fs-4 pt-4">Siêu ưu đãi mỗi ngày</p>
			</div>
		</form>
	</div>
	<?php
	// if(isset($_POST['login'])) {
	// 	$_SESSION['username'] = $_POST['username'];
	// 	$_SESSION['password'] = $_POST['password'];
	// 	header('location: account.php');
	// }
	?>
	</div>
	</div>


	<!--  -->
	<!-- <script src="js/slick.min.js"></script>
	<script src="js/slick.js"></script>
	<script src="js/slickslider.js"></script> -->
	<script src="js/all.js"></script>
</body>

</html>