
        <!--2-->
		        <div class="zcontent">
            <h1 class="title-section">Đăng ký thành viên</h1>
            <div class="tab-menu group"></div>
		
<?php 
if($_SESSION['mlv_user_id'])
	mss("Bạn Đã đăng nhập","".SITE_LINK."");
else {

if($_POST['dang_ky']) {

	$name 	= addslashes(urldecode($_POST['name']));
	$pass 	= addslashes(urldecode($_POST['pass']));
	$pass2 	= addslashes(urldecode($_POST['pass2']));
	$email 	= addslashes(urldecode($_POST['email']));
	
	if($name == "" || $pass == "" || $pass2 == "" || $email == "") {
		mss("Vui lòng nhập đầy đủ thông tin !","./thanh-vien/dang-ky.html");
	}
	elseif ($pass != $pass2) {
		mss("Mật khẩu ko giống nhau !","./thanh-vien/dang-ky.html");
	}
	elseif (mysqli_num_rows(mysqli_query($link_music,"SELECT userid FROM table_user WHERE username = '".$name."'",$link_music))) {
		mss("Tài khoản này đã có người sử dụng","./thanh-vien/dang-ky.html");
	}
	elseif (mysqli_num_rows(mysqli_query($link_music,"SELECT userid FROM table_user WHERE email = '".$email."'",$link_music))) {
		mss("Email này đã có người sử dụng","./thanh-vien/dang-ky.html");
	}
	else {
	$salt = rand(100000,999999);
	$pwd = md5(md5($pass) . $salt);
	mysqli_query($link_music,"INSERT INTO table_user (username,password,email,salt,time) VALUES ('".$name."','".$pwd."','".$email."','".$salt."','".time()."')");
	header("Location: ".SITE_LINK."");
	}
}

?>
			<form method="post">
            <li>Tên đăng nhập:</li><li class="title-section"><input type="text" name="name" size="50" /></li>
            <li>Mật khẩu:</li><li class="title-section"><input type="password" name="pass" size="50" /></li>
            <li>Nhập lại mật khẩu:</li><li class="title-section"><input type="password" name="pass2" size="50" /></li>
            <li>Email:</li><li class="title-section"><input type="email" name="email" size="50" /></li>
			<div style="float:center;">
            <input type="submit" name="dang_ky" class="button btn-dark-blue" value="Đăng ký" />  <input class="button btn-dark-blue" type="reset" value="Nhập lại" />
            </div>
            </form>
            <?php  } ?>
			
			</div>