
 <div class="zcontent">
            <h3 class="title-section">Nhạc yêu thích</h3>
            <div class="tab-menu group">
                <ul>
                         <li class="active"><a href="./mymusic/upload">Bài hát</a></li>
                    <li><a href="./mymusic/myplaylist">Playlist</a></li>                    
                    <li><a href="./mymusic/upload-video">Video</a></li>
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
	$sql_tt = "SELECT m_id  FROM table_data WHERE  m_poster = '".$_SESSION["mlv_user_id"]."' AND m_mempost = 1 AND m_type = 1 ORDER BY m_id DESC LIMIT ".LIMITSONG;

	$rStar = HOME_PER_PAGE * ($page -1 );
	$arr_song = $mlivedb->query(" m_id, m_title, m_singer, m_viewed  ","data"," m_poster = '".$_SESSION["mlv_user_id"]."' AND m_mempost = 1 AND m_type = 1 ORDER BY m_id DESC LIMIT ".$rStar .",". HOME_PER_PAGE,"");
	$phantrang = linkPage($sql_tt,HOME_PER_PAGE,$page,"./mymusic/upload&p=#page#","");
$tong_so_bai_hat=mysqli_query($link_music,"$sql_tt") or die(mysqli_error());
	$bai_hat = mysqli_num_rows($tong_so_bai_hat);
?>
<?php  if(!$arr_song) {
	echo '<div style="padding-left: 10px;">Hiện tại bạn chưa có bài hát nào.</div>';	
}else {  ?>


            <div class="tab-pane">
                <div class="row">
                    <div class="col-12">
                        <div class="list-item full-width">
 <ul>
<?php 
for($i=0;$i<count($arr_song);$i++) {
	$singer_name = get_data("singer","singer_name"," singer_id = '".$arr_song[$i][2]."'");
	$type = check_type($arr_song[$i][5],$arr_song[$i][0]);
$song_url 		= url_link(un_htmlchars($arr_song[$i][1]),$arr[$i][0],'nghe-bai-hat');
$singer_url = 'nghe-si/'.replace($singer_name);

	$download = 'down.php?id='.$arr_song[$i][0].'&key='.md5($arr_song[$i][0].'tgt_music');
?>		
 <li id="song<?php  echo en_id($arr_song[$i][3]);?>" class="group fn-song" data-name="<?php  echo un_htmlchars($arr_song[$i][1]); ?>" data-from="fav" data-type="song" data-id="<?php  echo en_id($arr_song[$i][3]);?>" data-code="LGcGTZmsAlbBcWStkDcyFnkH" data-active="show-tool">
      <div class="info-dp pull-left">
       <h3 class="txt-primary">
       <a class="ellipsis  _trackLink" tracking="_frombox=mymusic_favoritesong_" href="<?php  echo $song_url; ?>" title="<?php  echo un_htmlchars($arr_song[$i][1]); ?> - <?php  echo un_htmlchars($singer_name); ?>">
	   <?php  echo un_htmlchars($arr_song[$i][1]); ?> 
            - 
          <span>
         <?php  echo un_htmlchars($singer_name); ?>
          </span>
        </a>
          </h3>
         </div>
		 
        <div class="bar-chart">
		<span class="fn-bar" data-total="<?php  echo $arr_song[$i][3];?>" title="<?php  echo $arr_song[$i][3];?>" style="width: <?php  echo $arr_song[$i][3];?>%;"></span>
         </div>
        <div class="tool-song">                                        
         <div class="i25 i-small download"><a title="Tải về" class="fn-dlsong" data-item="#song<?php  echo en_id($arr_song[$i][3]);?>" href="<?php  echo $download;?>"></a></div>
<!-- Playlist ADD -->
<div class="i25 i-small addlist" id="playlist_<?=$arr_song[$i][0]?>"><a href="javascript:;"  title="Thêm vào" class="fn-addto" onclick="_load_box(<?=$arr_song[$i][0]?>);"></a></div>
<!-- End playlist ADD -->
		<div class="i25 i-small remove"><a  title="Xóa" class="fn-rmitem" data-item="#song<?php  echo en_id($arr_song[$i][3]);?>"></a></div>
          </div>
        </li>
		
<?php 	} ?>
		</ul></div>
		</div>
		</div>
		
<?php  echo $phantrang; ?>	
</div>
<?php  } ?>
</div>
