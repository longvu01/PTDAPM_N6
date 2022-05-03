<?php
session_start();
require_once("../libs/lib_db.php");
require_once("./process/checklogin.php");
clearLoggedUser();
// session_unset();
unset($_SESSION['cart']);
// $_SESSION['user'] = "";
header("Location: ../");
