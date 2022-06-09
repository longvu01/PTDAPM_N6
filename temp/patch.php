<?php
require_once("../connect.php");
require_once("../root/decode_ajax.php");

$qty_sold = addslashes($decoded['qty_sold']);
$id = addslashes($decoded['id']);

$sql = "UPDATE products
SET qty_sold = $qty_sold
WHERE id = $id";

mysqli_query($conn, $sql);
