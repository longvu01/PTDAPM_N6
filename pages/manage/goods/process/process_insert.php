<?php
session_start();
require_once("../../../../connect.php");

// if (
// 	empty($_POST['cid']) || empty($_POST['title'])
// 	|| empty($_POST['product_code']) || empty($_POST['product_info']) || empty($_POST['price'])
// ) {
// 	$_SESSION['info_title'] = "Có lỗi!";
// 	$_SESSION['info_message'] = "❌Cần điền đầy đủ các trường bắt buộc!";
// 	$_SESSION['info_type'] = "error";

// 	header('Location: ../');
// 	exit;
// }
// ----------------------------------------------------------------
$cid = addslashes($_POST['cid']);
$img_link = $_FILES['img'];
$title = addslashes($_POST['title']);
$product_code = addslashes($_POST['product_code']);
$product_info = addslashes($_POST['product_info']);
$start_price = addslashes($_POST['start_price']);
$price = addslashes($_POST['price']);
$sale = addslashes($_POST['sale']);
$insurance = addslashes($_POST['insurance']);
$gift = addslashes($_POST['gift']);
$description = addslashes($_POST['description']);


$folder = '../../../uploads/';
$file_extension = explode('.', $img_link['name'])[1];
$file_name = time() . '.' . $file_extension;
$file_path = $folder . $file_name;
move_uploaded_file($img_link["tmp_name"], $file_path);

// Kiểm tra tên sản phẩm đã tồn tại trong DB chưa
$sql = "select count(*) from products where title = '$title'";
$result = mysqli_query($conn, $sql);
$number_rows = mysqli_fetch_array($result)['count(*)'];
// Nếu đã tồn tại tên sản phẩm thì thông báo và điều hướng quay lại
if ($number_rows == 1) {
	$_SESSION['info_title'] = "Thông báo!";
	$_SESSION['info_message'] = "Tên sản phẩm này đã được đặt!";
	$_SESSION['info_type'] = "info";

	header('Location: ../');
	exit;
}

$sql = "insert into products 
		(cid,img,title,product_code,product_info,start_price,price,sale,insurance,gift,description)
    values 
    ('$cid','$file_path','$title','$product_code','$product_info','$start_price','$price','$sale','$insurance','$gift','$description')";
// die($sql);
mysqli_query($conn, $sql);

$_SESSION['info_title'] = "Thành công!";
$_SESSION['info_message'] = "Bạn đã thêm sản phẩm mới thành công!";
$_SESSION['info_type'] = "success";

header('Location: ../');


mysqli_close($conn);
