
 <div class="zcontent">
            <h3 class="title-section">VIDEO</h3>
            <div class="tab-menu group">
                <ul>
                       <li><a href="./mymusic/upload">Bài hát</a></li>
                    <li><a href="./mymusic/myplaylist">Playlist</a></li>                    
                    <li class="active"><a href="./mymusic/upload-video">Video</a></li>
                </ul>
            </div><!-- END .tab-menu -->
            <div class="clearfix"></div>
<?php 
if(isset($_GET["p"])) $page=$myFilter->process($_GET["p"]);

if($page > 0 && $page!= "")
	$start=($page-1) * HOME_PER_PAGE;
else{
	$page = 1;
	$start=0;
}

	// phan trang
	$sql_tt = "SELECT m_id  FROM table_data WHERE  m_poster = '".$_SESSION["mlv_user_id"]."' AND m_mempost = 1 AND m_type = 2 ORDER BY m_id DESC LIMIT ".LIMITSONG;
	$rStar = HOME_PER_PAGE * ($page -1 );
	$arr = $mlivedb->query(" m_id, m_title, m_singer, m_img  ","data"," m_poster = '".$_SESSION["mlv_user_id"]."' AND m_mempost = 1 AND m_type = 2 ORDER BY m_id DESC LIMIT ".$rStar .",". HOME_PER_PAGE,"");
	$phantrang = linkPage($sql_tt,HOME_PER_PAGE,$page,"./mymusic/favorites-video&p=#page#","");
$tong_so_bai_hat=mysqli_query($link_music,"$sql_tt") or die(mysqli_error());
	$bai_hat = mysqli_num_rows($tong_so_bai_hat);
 ?>

<form name="myform" method="post" action="mymusic/favorites-video">

<div id="ask_ok" style="display:none;"></div>
<?php  if(!$arr) {
	echo '<div style="padding-left: 10px;">Hiện tại bạn chưa có Video nào.</div>';	
}else {  ?>

            <div class="tab-pane">

<?php 
echo	"<div>";
for($i=0;$i<count($arr);$i++) {
$singer_name = GetSingerName($arr[$i][2]);
$get_singer = GetSinger($arr[$i][2]);
$nguoi_gui		= get_user($arr[$i][3]);
$user_url 		= url_link('user',$arr[$i][3],'user');
$video_url 		= url_link(un_htmlchars($arr[$i][1])."-".$singer_name,$arr[$i][0],'xem-video');
$download 		= 'down.php?id='.$arr[$i][0].'&key='.md5($arr[$i][0].'tgt_music');
	if($i == 0 || $i == 4 || $i == 8 || $i == 12 || $i == 16 )	{
		$class1[$i]	=	"</div><div class=\"row\">";
		
	}
		elseif($i == 3 || $i == 7 || $i == 11 || $i == 15)	{
		$class2[$i]	=	"</div>";
	}
?>
  <?php  echo $class1[$i]; ?>
<div class="pone-of-four">
            <div class="item">
                <a href="<?php  echo $video_url; ?>" class="thumb" title="<?php  echo un_htmlchars($arr[$i][1]); ?> - <?php  echo un_htmlchars($singer_name); ?>"> 
                    <img src="<?php  echo check_img($arr[$i][3]); ?>" width="182px" height="102px" alt="<?php  echo un_htmlchars($arr[$i][1]); ?> - <?php  echo un_htmlchars($singer_name); ?>" /> 
                    <span class="icon-circle-play otr"></span> 
					  <span class="func-icon">
					 <!-- <b class="zicon xicon fn-rmitem" data-item="#videoZW7UEAZW" title="Xóa"></b>-->
					 
               </span>
			   </a> 
                <div class="description">
                    <h3 class="title-item ellipsis">
                        <a href="<?php  echo $video_url; ?>" title="<?php  echo un_htmlchars($arr[$i][1]); ?> - <?php  echo un_htmlchars($singer_name); ?>" class="txt-primary"><?php  echo un_htmlchars($arr[$i][1]); ?></a>
                    </h3>
                    <div class="inblock ellipsis">
                        
                        <h4 class="title-sd-item txt-info"><?=$get_singer?></h4>
                    </div>
                </div>
                
            </div>
        </div>
<?php  } echo	"</div>"; ?>
</div>
<?php  } ?>
</form>

<?php  echo $phantrang; ?>

			</div>