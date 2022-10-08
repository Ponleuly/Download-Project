	<div class="sidebar fn-sidebar-fixed">
		<?php
$arr = $mlivedb->query(" * ","user"," userid = '".$_SESSION['mlv_user_id']."' ");
	$user_url = url_link($arr[0][1],$act,'users');
	$fav_song 	= get_data("user","user_like_song","userid = '".$_SESSION['mlv_user_id']."'");
$fav_album 	= get_data("user","user_like_album","userid = '".$_SESSION['mlv_user_id']."'");
$fav_video 	= get_data("user","user_like_video","userid = '".$_SESSION['mlv_user_id']."'");
$fav_following 	= get_data("user","user_following","userid = '".$_SESSION['mlv_user_id']."'");
	$sql_tt = "SELECT m_id  FROM table_data WHERE m_poster = '".$_SESSION['mlv_user_id']."' AND m_type = 1 AND m_mempost = 1 ORDER BY m_id DESC LIMIT ".LIMITSONG;
		$tong_so_bai_hat=mysqli_query($link_music,"$sql_tt") or die(mysqli_error());
	$bai_hat = mysqli_num_rows($tong_so_bai_hat);
$tong_album = "SELECT album_id  FROM table_album WHERE  album_poster = '".$_SESSION['mlv_user_id']."' AND album_type = 1 ORDER BY album_id DESC LIMIT ".LIMITSONG;	
	$tong_so_album=mysqli_query($link_music,"$tong_album") or die(mysqli_error());
	$tong_a = mysqli_num_rows($tong_so_album);
	$tong_bhv = "SELECT m_id  FROM table_data WHERE  m_poster = '".$_SESSION['mlv_user_id']."' AND m_type = 2 AND m_mempost = 1 ORDER BY m_id DESC LIMIT ".LIMITSONG;
$tong_so_bai_hatv=mysqli_query($link_music,"$tong_bhv") or die(mysqli_error());
	$bai_hatv = mysqli_num_rows($tong_so_bai_hatv);
?>
            <ul class="data-list" id="navLeft">        
    <li class="profile-row">
        <i class="fn_zme_info" style="display: none;" data_uid="" data-thumb="#navLeft .fn-thumb"></i>
        <img class="fn-thumb" src="<?php echo check_img($arr[0][7]);?>" />
        <a href="<?php echo $user_url;?>" class="ellipsis"><?=$arr[0][1];?></a>
        
    </li>
    <li><a class="<?php  if($act == "p") echo 'active';?>" href="<?php echo $user_url;?>" title="Kênh của tôi">Kênh của tôi</a>
        <ul>
            <li><a class="<?php  if($act == "upload") echo 'active';?>" href="./mymusic/upload" title="Bài hát">Bài hát <span class="pull-right">(<?=$bai_hat;?>)</span></a></li>
            <li><a class="<?php  if($act == "myplaylist") echo 'active';?>" href="./mymusic/myplaylist" title="Playlist">Playlist <span class="pull-right">(<?=$tong_a;?>)</span></a></li>            
            <li><a class="<?php  if($act == "upload-video") echo 'active';?>" href="./mymusic/upload-video" title="Video">Video <span class="pull-right">(<?=$bai_hatv;?>)</span></a></li>
        </ul>
    </li>
    <li><a href="./mymusic/favorites-song">Yêu Thích</a>
        <ul>
         <li><a class="<?php  if($act == "favorites-song") echo 'active';?>" href="./mymusic/favorites-song" title="Bài hát">Bài hát <span class="pull-right">(<?php  if($fav_song == ',') { echo '0';}
						else { echo SoBaiHat(substr(substr($fav_song,1),0,-1)); }?>)</span></a></li>
            <li><a class="<?php  if($act == "favorites-playlist") echo 'active';?>" href="./mymusic/favorites-playlist" title="Playlist">Playlist <span class="pull-right">(<?php  if($fav_album == ',') { echo '0';}
						else { echo  SoBaiHat(substr(substr($fav_album,1),0,-1)); }?>)</span></a></li>            
            <li><a class="<?php  if($act == "favorites-video") echo 'active';?>" href="./mymusic/favorites-video" title="Video">Video <span class="pull-right">(<?php  if($fav_video == ',') { echo '0';}
						else { echo SoBaiHat(substr(substr($fav_video,1),0,-1)); }?>)</span></a></li>
        </ul>
    </li>
	<li><a href="./mymusic/following-artist">Quan tâm</a>
        <ul>
            <li><a class="<?php  if($act == "following-artist") echo 'active';?>" href="./mymusic/following-artist" title="Nghệ sĩ">Nghệ sĩ <span class="pull-right">(<?php  if($fav_following == ',') { echo '0';}
						else { echo SoBaiHat(substr(substr($fav_following,1),0,-1)); }?>)</span></a></li>
            <!--<li><a class="" href="./mymusic/following-radio" title="Radio">Radio <span class="pull-right">(0)</span></a></li>-->
        </ul>
    </li>
    <li><a class="<?php  if($act == "upload") echo 'active';?>" href="./mymusic/upload" title="Nhạc upload">Nhạc upload</a></li>
</ul>
        </div><!-- END .sidebar-->