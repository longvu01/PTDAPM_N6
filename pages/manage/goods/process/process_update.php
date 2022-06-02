<?php
session_start();
require_once("../../../../libs/lib_db.php");
require_once("../../../../libs/util.php");
//print_r($_FILES);exit();
$img = upload_file_by_name("img");
//echo "img = [{$img}]"; exit();

$data = array();
$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;
$cid = isset($_REQUEST["id"]) ? $_REQUEST["cid"]  * 1 : 0;
$title = isset($_REQUEST["title"]) ? $_REQUEST["title"] : "";
$product_code = isset($_REQUEST["product_code"]) ? $_REQUEST["product_code"] : "";
$product_info = isset($_REQUEST["product_info"]) ? $_REQUEST["product_info"] : "";
$start_price = isset($_REQUEST["start_price"]) ? $_REQUEST["start_price"] : "";
$price = isset($_REQUEST["price"]) ? $_REQUEST["price"] : "";
$sale = isset($_REQUEST["sale"]) ? $_REQUEST["sale"] : "";
$insurance = isset($_REQUEST["insurance"]) ? $_REQUEST["insurance"] : "";
$gift = isset($_REQUEST["gift"]) ? $_REQUEST["gift"] : "";
$description = isset($_REQUEST["description"]) ? $_REQUEST["description"] : "";

$data["img"] = $img;
$data["cid"] = $cid;
$data["title"] = $title;
$data["product_code"] = $product_code;
$data["product_info"] = $product_info;
$data["start_price"] = $start_price;
$data["price"] = $price;
$data["sale"] = $sale;
$data["insurance"] = $insurance;
$data["gift"] = $gift;
$data["description"] = $description;
$tbl = "products";
$cond = "id={$id}";
$sql = data_to_sql_update($tbl, $data, $cond);
//echo "sql = [{$sql}]"; exit();
$ret = exec_update($sql);

$_SESSION['info_title'] = "Thành công!";
$_SESSION['info_message'] = "Bạn đã sửa sản phẩm thành công!";
$_SESSION['info_type'] = "success";

header('Location: ../');
