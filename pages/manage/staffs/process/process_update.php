<?php
session_start();
require_once("../../../../libs/lib_db.php");
require_once("../../../../libs/util.php");
//print_r($_FILES);exit();
//echo "img = [{$img}]"; exit();

$data = array();
$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;

$username = isset($_REQUEST["username"]) ? $_REQUEST["username"] : "";
$new_password = isset($_REQUEST["new_password"]) ? md5($_REQUEST["new_password"]) : "";
$phone = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : "";
$email = isset($_REQUEST["email"]) ? $_REQUEST["email"] : "";
$address = isset($_REQUEST["address"]) ? $_REQUEST["address"] : "";

$data["username"] = $username;
$data["password"] = $new_password;
$data["phone"] = $phone;
$data["email"] = $email;
$data["address"] = $address;
$tbl = "user_table";
$cond = "id={$id}";
$sql = data_to_sql_update($tbl, $data, $cond);
$ret = exec_update($sql);
$user = "";
if (isset($_SESSION['account'])) {
	$user = $_SESSION['account'];
}
$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
header("location:http://localhost/PTDAPM_N6/pages/account.php");
