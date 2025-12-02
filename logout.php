<?php
include("config/config.php");

session_destroy();

// $QueryUpdateToekn = "UPDATE tbl_login_token SET token_status = 'Deactive' WHERE user_id = '" . $_SESSION['rtokend'] . "'";
// updateQuery($connection, $QueryUpdateToekn);

// setcookie('Rtoken', null, -1, '/');
// unset($_COOKIE['Rtoken']);

// setcookie('bckD', null, -1, '/');
// unset($_COOKIE['bckD']);

// setcookie('nm', null, -1, '/');
// unset($_COOKIE['nm']);

unset($_SESSION["LOGIN"]);
header("location:" . SITE_URL . "login.php");
exit;
?>