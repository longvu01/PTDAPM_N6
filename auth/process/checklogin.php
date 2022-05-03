<?php
function clearLoggedUser()
{
	unset($_SESSION['account']);
}
function getLoggedUser()
{
	$user = isset($_SESSION['account']) ? $_SESSION['account'] : 0;
	return $user;
}
function setLoggedUser($user)
{
	$_SESSION['account'] = $user;
}

function checkLoggedUser()
{
	$user = getLoggedUser();
	if (!$user) {
		echo "You need to <a href=\"../auth/login.php\">Login</a> first";
		exit();
	}
	return $user;
}
