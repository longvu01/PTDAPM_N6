<?php
session_start();
require_once("../../../../libs/lib_db.php");
require_once("../../../../libs/util.php");

//get input
$fields = "username,password,phone,email,address";
$data = array();
$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : "";
$password = isset($_REQUEST["password"]) ? $_REQUEST["password"] : "";
$phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : "";
$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
$address = isset($_REQUEST["address"]) ? $_REQUEST["address"] : "";
//tao sql
$sql = "insert into user_table 
	(username,password,phone,email,address)
	values 
	('$username','$password','$phone','$email','$address')";
// echo $sql;exit();
$ret = exec_update($sql);
// print_r($ret);exit();

$sql = "select * from user_table";
$result_parents = select_list($sql);
$user = "";
if (isset($_SESSION['account'])) {
	$user = $_SESSION['account'];
}
$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
header("location:http://localhost/PTDAPM_N6/pages/account.php");
