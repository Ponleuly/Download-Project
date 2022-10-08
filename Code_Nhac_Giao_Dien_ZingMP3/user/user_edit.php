
		 <div class="zcontent">
            <h3 class="title-section">Đổi thông tin cá nhân <?=$arr[0][1];?></h3>
            <div class="tab-menu group"></div><!-- END .tab-menu -->
            <div class="clearfix"></div>
           
            <div class="tab-pane">
                <div class="row">
                    <div class="col-12">
                        <div class="list-item full-width">

<?php 
if(!$_SESSION['mlv_user_id']) mss("Bạn chưa đăng nhập","".SITE_LINK."");
else {
	$arr = $mlivedb->query(" avatar, email, info, yahoo  ","user"," userid = '".$_SESSION['mlv_user_id']."'");
if($_POST['edit'] && $_SESSION['mlv_user_id']) {
	$avatar 	= addslashes(urldecode($_POST['avatar']));
	$yahoo 	= addslashes(urldecode($_POST['yahoo']));
	$info 	= addslashes(urldecode($_POST['user_info']));
	if($email == "") mss("Bạn chưa nhập tên email !","./thanh-vien/doi-thong-tin.html");
	else {
	mysqli_query($link_music,"UPDATE table_user SET avatar = '".$avatar."', info = '".$info."', yahoo = '".$yahoo."' WHERE userid = '".$_SESSION['mlv_user_id']."'");
	mss("Đổi thông tin thành công !",'".SITE_LINK."');
	header("Location: ".SITE_LINK."");
	}
}
?>
			<form method="post">
            <li>Avatar:</li><li class="title-section"><input type="text" name="avatar" value="<?php  echo $arr[0][0];?>" size="55" /></li>
            <li>Email:</li><li class="title-section"><input type="text" name="email" value="<?php  echo $arr[0][1];?>" size="55" /></li>
			
            <li>Yahoo:</li>
			<li class="title-section"><input type="text" name="yahoo" value="<?php  echo $arr[0][3];?>" size="55" /></li>
            <li>Thông tin thêm:</li><li class="title-section">

			
			<div class="frm-lyrics group">
			<textarea name="user_info" cols="30" rows="10"><?php  echo $arr[0][2];?></textarea> 
			</div>
			</li>
			<li class="title-section"><input type="submit" class="button btn-dark-blue" name="edit" value="Gửi đi" /></li>
            </form>
			<?php  } ?>
			</div>
</div>
</div>
</div>
</div>