<?php
session_start();
require_once("../../../../libs/lib_db.php");

	//get input
	$id = isset($_REQUEST["id"]) ? $_REQUEST["id"] * 1 : 0;
	//tao sql
	$sql = "delete from review_table  " ;
	$sql .= " WHERE review_id =$id" ;
	//echo $sql;exit();
	$ret = exec_update($sql);
	$location = "window.location = '../cmt_search.php'";
    echo '<script>alert("Bạn đã xóa bình luận!")</script>';
    echo"<script>$location</script>";
