
        <!--2-->
		        <div class="zcontent">
            <h1 class="title-section">Quên mật khẩu ?</h1>
            <div class="tab-menu group"></div>

<?php 

if($_SESSION['mlv_user_id']) mss("Bạn vui lòng thoát.","".SITE_LINK."");

else {


if($_POST['sendpass']) {
	
	$email 	= addslashes(urldecode($_POST['email']));

	$arr = $mlivedb->query("userid, salt ","user"," email = '".$email."'");
	if($email == ""){
		mss("Vui lòng nhập email!",'./thanh-vien/quen-mat-khau.html');
	}
	else if($arr){
		$pass =	rand(1000000,9999999);
		$pwd = md5(md5($pass) . $arr[0][1]);
		@mysqli_query($link_music,"UPDATE table_user SET pass_new = '".$pwd."' WHERE userid = '".$arr[0][0]."'");
		# cấu hình gửi email
		$pfw_header = "[ ".NAMEWEB." ] - Mật Khẩu Mới";
		$pfw_subject = "[ ".NAMEWEB." ] - Mật Khẩu Mới"; // tiêu đề email
		$pfw_email_to = $email;
		$pfw_message = "Mật khẩu mới của bạn là : $pass\n"
				. "Vui lòng truy cập vào ".NAMEWEB." và đổi lại mật khẩu của bạn ngay sau khi đăng nhập\n"
				. "-----------------------------------------------------------------\n"
				. "Hệ Thống Liên Hệ ".NAMEWEB."\n"
				. "[C] ".NAMEWEB." - ".VER." \n";
				
		$send_mail = @mail($pfw_email_to, $pfw_subject ,$pfw_message ,$pfw_header ) ;
		if($send_mail) mss("Mật khẩu mới của bạn đã được gửi tới Email : !".$email." Bạn vui lòng kiểm tra lại hộp mail của bạn !","".SITE_LINK."");
		else mss("Hostting của bạn không hỗ trợ hàm gửi mail","".SITE_LINK."");
	}
	else {
		mss("Email của bạn không tồn tại trên hệ thống website!",'./thanh-vien/quen-mat-khau.html');
	}

}



?>
			<form method="post">
          
			 <li>Email Của Bạn:</li><li class="title-section"><input type="email" name="email" size="50" /></li>

			<li class="title-section"><input type="submit" class="button btn-dark-blue" name="sendpass" value="Gửi đi" /></li>
          

            </form>

			<?php  } ?>
    </div>
