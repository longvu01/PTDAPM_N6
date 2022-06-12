<?php
session_start();
require_once("../../../../libs/lib_db.php");
require_once("../../../../libs/util.php");
//get input
$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;
//tao sql
$sql = "delete from user_table  ";
$sql .= " WHERE id =$id";
//echo $sql;exit();
$ret = exec_update($sql);
// header("Location:search.php");
//print_r($ret);exit();
$sql = 'SELECT * FROM products ORDER BY id DESC LIMIT 1';
$resultLast = select_one($sql);
$user = "";
if (isset($_SESSION['account'])) {
	$user = $_SESSION['account'];
}

header("location:http://localhost/PTDAPM_N6/pages/account.php");
