<?php
session_start();
require_once("../../../../libs/lib_db.php");
require_once("../../../../libs/util.php");

//get input
$fields = "cid,img,title,product_code,product_info,start_price,price,sale,insurance,gift,description,status";
$data = array();
$cid = isset($_REQUEST["cid"]) ? $_REQUEST["cid"] : 0;
$img = upload_file_by_name("img");

$title = isset($_REQUEST["title"]) ? $_REQUEST["title"] : "";
$product_code = isset($_REQUEST["product_code"]) ? $_REQUEST["product_code"] : "";
$product_info = isset($_REQUEST["product_info"]) ? $_REQUEST["product_info"] : "";
$start_price = isset($_REQUEST["start_price"]) ? $_REQUEST["start_price"] : "";
$price = isset($_REQUEST["price"]) ? $_REQUEST["price"] : "";
$sale = isset($_REQUEST["sale"]) ? $_REQUEST["sale"] : "";
$insurance = isset($_REQUEST["insurance"]) ? $_REQUEST["insurance"] : "";
$gift = isset($_REQUEST["gift"]) ? $_REQUEST["gift"] : "";
$description = isset($_REQUEST["description"]) ? $_REQUEST["description"] : "";
//tao sql
$sql = "insert into products 
	(cid,img,title,product_code,product_info,start_price,price,sale,insurance,gift,description)
	values 
	('$cid','$img','$title','$product_code','$product_info','$start_price','$price','$sale','$insurance','$gift','$description')";
// echo $sql;exit();
$ret = exec_update($sql);
// print_r($ret);exit();

$sql = "select * from categories";
$result_parents = select_list($sql);
$user = "";
if (isset($_SESSION['account'])) {
	$user = $_SESSION['account'];
}
$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
