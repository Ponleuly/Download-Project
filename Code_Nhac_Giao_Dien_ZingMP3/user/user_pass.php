
		 <div class="zcontent">
            <h3 class="title-section">Đổi mật khẩu <?=$arr[0][1];?></h3>
            <div class="tab-menu group"></div><!-- END .tab-menu -->
            <div class="clearfix"></div>
           
            <div class="tab-pane">
                <div class="row">
                    <div class="col-12">
                        <div class="list-item full-width">

<?php
if(!$_SESSION['mlv_user_id']) mss("Bạn chưa đăng nhập","".SITE_LINK."");
else {
$arr = $mlivedb->query(" password, salt  ","user"," userid = '".$_SESSION['mlv_user_id']."'");
if($_POST['pass_edit'] && $_SESSION['mlv_user_id']) {
	$pass 	= addslashes(urldecode($_POST['pass']));
	$pass2 	= addslashes(urldecode($_POST['pass2']));
	$pwd_0 	= md5(md5($pass) . $arr[0][1]);
	if($pass == "" || $pass2 == "") mss("Vui lòng nhập đầy đủ thông tin !","./thanh-vien/doi-mat-khau.html");
	elseif($pwd_0 != $arr[0][0]) mss("Mật khẩu cũ của bạn không đúng !","./thanh-vien/doi-mat-khau.html");
	elseif($pass == $pass2) mss("Mật khẩu cũ và mới không được giống nhau!","./thanh-vien/doi-mat-khau.html");
	else {
	$pwd = md5(md5($pass2) . $arr[0][1]);
	mysqli_query($link_music,"UPDATE table_user SET password = '".$pwd."',pass_new = '' WHERE userid = '".$_SESSION['mlv_user_id']."'");
	mss("Đổi mật khẩu thành công !","".SITE_LINK."");
	}
}
?>
			<form method="post">
			<li>Mật khẩu cũ:</li> <li class="title-section"><input type="password" name="pass"  /></li>
            <li>Mật khẩu mới:</li> <li class="title-section"><input type="password" name="pass2"  /></li>
            <input type="submit" class="button btn-dark-blue" name="pass_edit" value="Gửi đi" />
            </form>
			<?php } ?>
			</div>
</div>
</div>
</div>
</div>