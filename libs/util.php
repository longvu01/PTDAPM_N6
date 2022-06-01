<?php

function default_statuses()
{
	$ret[] = array("id" => 1, "name" => "Online");
	$ret[] = array("id" => 2, "name" => "Offline");
	return $ret;
}
function upload_file_by_name($name, $target_dir = "")
{
	//print("upload_file_by_name->name=[{$name}]");
	if (!isset($_FILES[$name])) {
		//print("upload_file_by_name->name=[{$name}], khong co file");
		return "";
	}
	if (!$target_dir) {
		$target_dir = "../uploads/";
	}
	//print("upload_file_by_name->target_dir=[{$target_dir}]");
	$fdata = $_FILES[$name];
	//print_r($fdata);
	$ext = strtolower(pathinfo($fdata["name"], PATHINFO_EXTENSION));
	$target_file = $target_dir . basename($fdata["name"], ".{$ext}") . date('-Ymd-his') . ".{$ext}";

	//print("upload_file_by_name->target_file=[{$target_file}]");
	//print("upload_file_by_name->ext=[{$ext}]");
	if (!is_dir($target_dir)) {
		mkdir($target_dir);
	}
	if (move_uploaded_file($fdata["tmp_name"], $target_file)) {
		return $target_file;
	}
	return "";
}
