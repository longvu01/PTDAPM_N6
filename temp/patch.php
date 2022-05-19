<?php
require_once("../connect.php");
require_once("../root/decode_ajax.php");

$view_qnt = addslashes($decoded['view_qnt']);
$id = addslashes($decoded['id']);

$sql = "UPDATE products
SET view_qnt = $view_qnt
WHERE id = $id";

mysqli_query($conn, $sql);
