<?php
session_start();
require_once("../../../../libs/lib_db.php");
require_once("../../../../libs/util.php");
//get input
$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;
//tao sql
$sql = "delete from products  ";
$sql .= " WHERE id =$id";
//echo $sql;exit();
$ret = exec_update($sql);
header("Location: ../");
