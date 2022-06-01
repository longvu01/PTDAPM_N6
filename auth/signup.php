<?php
session_start();
require_once("../libs/lib_db.php");

if (isset($_POST['create'])) {
	$username = $_POST['username'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];


	$sql = "select * from user_table where username = '{$username}'";
	// echo $sql;exit();
	$check = select_one($sql);
	if (!empty($check)) {
		echo '<script>alert("Tên đăng nhập đã tồn tại!")</script>';
		$location = "window.location = 'signup.php'";
		echo "<script>$location</script>";
		exit();
	}

	$sql = "INSERT INTO user_table (username, password, phone) VALUES ('$username', '$password', '$phone')";
	$ret = exec_update($sql);
	$location = "window.location = 'login.php'";
	echo '<script>alert("Bạn đã đăng ký thành công!")</script>';
	echo "<script>$location</script>";
}
?>

<!-- Start HTML -->
<?php require_once('../root/top.php') ?>
<?php top('Đăng ký') ?>
</head>

<body>

	<div class="login_form-bgc">
		<form class="login__form" action="signup.php" method="POST">
			<div class="login__content">
				<h1>Sign Up</h1>

				<div class="form_group">
					<label for="username">Username</label>
					<br>
					<input type="text" name="username" placeholder="Enter user name" required>
				</div>
				<div class="form_group">
					<label for="phone">Your phone</label>
					<br>
					<input type="number" name="phone" placeholder="Enter phone number" required id="user_phone-input">
				</div>
				<div class="form_group">
					<label for="password">Password</label>
					<br>
					<input type="password" name="password" id="" placeholder="Enter password" required>
				</div>
				<br />
				<br />
				<p>
					<a href="../pages"> Back to home page</a>
				</p>
				<p>or</p>
				<p>
					<a href="#"> Login with :</a>
				</p>
				<div class="icons">
					<a href="#"><i class="fab fa-google"></i>
					</a>
					<a href="#"><i class="fab fa-facebook"></i>
					</a>
					<a href="#"><i class="fas fa-comment"></i>
					</a>
				</div>
				<button type="submit" name="create" value="signup" class="login__btn">Sign Up</button>
			</div>

			<div class="form_img">
				<img src="images/logos/bg-pop-login-phone.png" alt="">
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

	<script src="js/all.js"></script>
</body>

</html>