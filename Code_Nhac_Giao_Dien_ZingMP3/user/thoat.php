<?php
define('MLive-Channel',true);
include("../includes/configurations.php");
if(!$_SESSION["mlv_user_id"]) mss("Bạn chưa đăng nhập.","".SITE_LINK."");
else {
	_SETCOOKIE("member_id" , "" );
	_SETCOOKIE("pass_hash" , "" );
	$_SESSION["mlv_user_id"] = "";
	$_SESSION["mlv_user_name"] = "";
	mss("Thoát thành công","".SITE_LINK."");
}
?>