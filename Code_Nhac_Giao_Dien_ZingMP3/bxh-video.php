<?php 
define('MLive-Channel',true);
include("./includes/configurations.php");
include("./includes/ajax.php");
include("./includes/class.inputfilter.php");
$myFilter = new InputFilter();
if(isset($_GET["id"])) $id = $myFilter->process($_GET['id']); $id = del_id($id);
if(isset($_GET["name"])) $name = $myFilter->process($_GET['name']);
if(isset($_GET["w"])) $w = $myFilter->process($_GET['w']);
if(isset($_GET["y"])) $y = $myFilter->process($_GET['y']);
if($id	== IDCATVN) { 
$cat_bxh = "AND charts_cat = '1' ";
$title = 'Bảng Xếp Hạng MV Việt Nam';
$title_2 = 'BXH MV Việt Nam';
$title_3 = 'Bảng Xếp Hạng MV Việt Nam';  
$intro = 'BXH '.NAMEWEB.' (Z-Chart) là bảng xếp hạng nhạc Việt uy tín được cập nhật vào mỗi Thứ Hai hàng tuần, dựa trên các số liệu thống kê trên '.NAMEWEB.'. Các tiêu chí dùng để xác định điểm xếp hạng (Z-score) của mỗi tác phẩm bao gồm lượt nghe, yêu thích, bình luận, chia sẻ của người dùng trên cả phiên bản web desktop và ứng dụng mobile.'; 
$bxh_link = 'bang-xep-hang/bai-hat-Viet-Nam/'.en_id($id).'.html';
$bxh_linkv = 'bang-xep-hang/video-Viet-Nam/'.en_id($id).'.html';
$bxh_linka = 'bang-xep-hang/album-Viet-Nam/'.en_id($id).'.html';
$bxh_embed = 'embedv/bang-xep-hang/video-Viet-Nam/'.en_id($id).'.html';
$title_web = 'BXH MV Việt Nam | '.NAMEWEB.''; 
$des_web = 'MV chọn lọc hay đẹp nhất đứng đầu BXH Việt Nam cập nhật hàng tuần được người xem đánh giá cao, xem nhiều nhất'; 
$key_web = 'bang xep hang, bxh, chart, top, viet nam, video, Soompi, MTV, Zing, xem nhieu, dep nhat, yeu thich,' ;}
elseif($id	== IDCATAM) { 
$cat_bxh = "AND charts_cat = '2' ";
$title = 'Bảng Xếp Hạng Âu Mỹ';
$title_2 = 'BXH MV Âu Mỹ'; 
$title_3 = 'Bảng Xếp Hạng MV Âu Mỹ';  
$intro = 'BXH nhạc Âu Mỹ gồm các bảng xếp hạng các bài hát, album, MV nhạc USUK đang hot được cập nhật vào mỗi Thứ Hai hàng tuần, tham khảo dựa trên kết quả của các BXH âm nhạc uy tín hàng đầu thế giới như Billboard. MTV, iTunes … và dữ liệu lượt nghe xem, yêu thích, chia sẻ và bình luận… trên '.NAMEWEB.'.'; 
$bxh_link = 'bang-xep-hang/bai-hat-Au-My/'.en_id($id).'.html';
$bxh_linkv = 'bang-xep-hang/video-Au-My/'.en_id($id).'.html';
$bxh_linka = 'bang-xep-hang/album-Au-My/'.en_id($id).'.html';
$bxh_embed = 'embedv/bang-xep-hang/video-Au-My/'.en_id($id).'.html';
$title_web = 'BXH MV Âu Mỹ | '.NAMEWEB.''; $des_web = 'MV chọn lọc hay đẹp nhất đứng đầu BXH Âu Mỹ cập nhật hàng tuần được người xem đánh giá cao, xem nhiều nhất'; $key_web = 'bang xep hang, bxh, chart, top, au my, video, Soompi, MTV, Zing, xem nhieu, dep nhat, yeu thich' ;}
elseif($id	== IDCATCA) { 
$cat_bxh = "AND charts_cat = '3' ";
$title = 'Bảng Xếp Hạng Châu Á';
$title_2 = 'BXH MV Châu Á'; 
$title_3 = 'Bảng Xếp Hạng MV Châu Á';   
$intro = 'BXH nhạc Hàn Quốc gồm các bảng xếp hạng các bài hát, album, MV nhạc K-POP đang hot được cập nhật vào mỗi Thứ Hai hàng tuần, tham khảo dựa trên kết quả của các BXH âm nhạc uy tín hàng đầu châu Á như Soompi, Mnet, Gaon … và dữ liệu lượt nghe xem, yêu thích, chia sẻ và bình luận… trên '.NAMEWEB.'.'; 
$bxh_link = 'bang-xep-hang/bai-hat-Chau-A/'.en_id($id).'.html';
$bxh_linkv = 'bang-xep-hang/video-Chau-A/'.en_id($id).'.html';
$bxh_linka = 'bang-xep-hang/album-Chau-A/'.en_id($id).'.html';
$bxh_embed = 'embedv/bang-xep-hang/video-Chau-A/'.en_id($id).'.html';
$title_web = 'BXH MV Châu Á | '.NAMEWEB.''; $des_web = 'MV chọn lọc hay đẹp nhất đứng đầu BXH Hàn Quốc cập nhật hàng tuần được người xem đánh giá cao, xem nhiều nhất'; $key_web = 'bang xep hang, bxh, chart, top, han quoc, video, Soompi, MTV, Zing, xem nhieu, dep nhat, yeu thich' ;}
	if($w != '') $sql_w = " AND charts_week = '".$w."'";
if($y != '') $sql_y = " AND charts_year = '".$y."'";
		if($w) $cim1 = "&w=$w";
		if($w) $cim2 = "&y=$y";

	// phan trang
	$sql_tt = "SELECT charts_id  FROM table_charts WHERE  charts_type = '3' $cat_bxh $sql_w $sql_y ORDER BY charts_id DESC LIMIT 1";
	$up = $mlivedb->query(" * ","charts"," charts_type = '3' $cat_bxh $sql_w $sql_y ORDER BY charts_id DESC LIMIT 1");
$album_url 		= url_link($up[0][1],$up[0][7],'nghe-album');
	if (!$w || !$y){
	$arr_vn_ = $mlivedb->query(" m_id, m_title, m_singer, m_viewed_week, m_hot, m_hq,m_downloaded,m_img ","data"," m_cat LIKE '%,".$id.",%' AND m_type = 2 ORDER BY m_viewed_week DESC LIMIT 1");
	$singer_imgz = check_img($arr_vn_[0][7]);
	}
	if ($w !='' || $y !=''){
	$s = explode(',',$up[0][2]);
	$arr_vn_ = $mlivedb->query(" m_id, m_title, m_singer, m_viewed, m_hot, m_hq,m_downloaded,m_img ","data"," m_id = '".$s[0]."' AND m_type = 2 LIMIT 1");
	  $singer_imgz = check_img($arr_vn_[0][7]);
	 }
?>
<!DOCTYPE html>
<html lang="vi">
    <head>
        <title><?php  echo $title_web;?></title>
<link rel="alternate" media="only screen and (max-width: 640px)" href="">
<meta name="title" content="<?php  echo $title_web;?>" />
<meta name="description" content="<?php  echo $des_web;?>" />
<meta name="keywords" content="<?php  echo $key_web;?>" />
<meta property="og:title" content="<?php  echo $title_web;?>" />                
<meta property="og:description" content="<?php  echo $des_web;?>" />        
<meta property="og:image" content="<?php  echo $singer_imgz;?>" />
<meta property="og:image:url" content="<?php  echo $singer_imgz;?>" />
<meta property="og:url" content="<?php echo SITE_LINK.$bxh_linkv;?>" />
<link rel="image_src" href="<?php  echo $singer_imgz;?>" />
<?php  include("./theme/ip_java.php");?>
</head>
<body>
	<?php  include("./theme/ip_header.php");?>
<div class="wrapper-page"> <div class="wrap-body group page-bxh container">
<?=BANNER('top_banner_bxh','1006');?>
    <div class="wrap-content">
        <div class="section">
            <div class="title-filter group">
                <div class="wrap-filter pull-left">
                    <h1 class="title-section"><?php  echo $title;?></h1>                    
                </div><!-- END .wrap-filter -->
                <div class="weekly-show">
<p class="pull-left">
                        <strong><?php echo 'Tuần '.$up[0][8];?>:</strong>
                        <span><?php echo $up[0][3];?></span>
                    </p>
                    <input type="hidden" name="inputDate" id="inputDate" value=""/>
                    <i class="icon-calendar cur-p" id="btnCalendar"></i>
<?php
$cz = $mlivedb->query(" * ","charts"," charts_type = '3' $cat_bxh AND charts_id = '".$up[0][0]."' ");
$next = $mlivedb->query(" * ","charts"," charts_type = '3' $cat_bxh AND charts_id > '".$up[0][0]."'");
$prev = $mlivedb->query(" * ","charts"," charts_type = '3' $cat_bxh AND charts_id < '".$up[0][0]."'");
$week = ($up[0][8])-1;
$year = ($up[0][9]);
?>
<?php if (!$next) { echo '<a href="'.$bxh_linkv.'&w='.$up[0][8].'&y='.$up[0][9].'" class="w-nav w-next disabled"></a>'; } else { echo '<a href="'.$bxh_linkv.'&w='.$next[0][8].'&y='.$next[0][9].'" class="w-nav w-next "></a>';}?>
<?php if (!$prev) { echo '<a href="'.$bxh_linkv.'&w='.$week.'&y='.$year.'" class="w-nav w-prev disabled"></a>'; } else { echo '<a href="'.$bxh_linkv.'&w='.$week.'&y='.$year.'" class="w-nav w-prev "></a>';}?>
                </div><!--END .weekly-show -->
            </div><!-- END .title-filter -->
					            <div class="row">
                <div class="col-12">
                    <div class="intro">
 <p><?php  echo $intro ;?></p>
                    </div>
                    <div class="tab-menu group">
                        <ul>
                            <li><a href="<?php echo $bxh_link;?>">Bài Hát</a></li>
                            <li><a href="<?php echo $bxh_linka;?>">Album</a></li>
                            <li class="active"><a href="<?php echo $bxh_linkv;?>">MV</a></li>
 </ul>
                    </div><!-- END .tab-menu group -->
                    <div class="table-list">    
                        <div class="header-bar">
                            <h1 class="header-title-small"><?php echo $title_2;?></h1>
                            <div class="box-social">
                                <div class="fb-like" data-href="<?php echo $bxh_linkv;?><?php if ($w !=''){ echo $cim1;}?><?php if ($y !=''){ echo $cim2;}?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>									
                                <div class="g-plusone" data-size="medium"></div>
                            </div><!-- END .box-social -->
                            <a href="<?php echo $bxh_linkv;?>&act=play" class="play-all"><i class="zicon icon-play"></i>Nghe tất cả</a>
                        </div><!-- EMD .table-header -->
                   <div class="table-body none-point">
 <?php  if($act == 'play') { ?>
 <iframe scrolling="no" width="100%" height="366px" src="<?php echo $bxh_embed;?>" frameborder="0" allowfullscreen="true"></iframe>
 <?php  } ?>
<ul class="bxh-video">
<?php 
if (!$w || !$y){
				$arr_vn_ = $mlivedb->query(" m_id, m_title, m_singer, m_viewed_week, m_hot, m_hq,m_downloaded,m_img ","data"," m_cat LIKE '%,".$id.",%' AND m_type = 2 ORDER BY m_viewed_week DESC LIMIT 20");
					if (count($arr_vn_)<1) header("Location: ".SITE_LINK."bang-xep-hang/index.html");
				for($i=0;$i<count($arr_vn_);$i++) {
					$list_song	.=	$arr_vn_[$i][0].',';
					$list_song_ = 	substr($list_song,0,-1);
				mysqli_query($link_music,"UPDATE table_charts SET charts_value ='".$list_song_."' WHERE charts_id = '".$up[0][0]."'");
				$title = un_htmlchars($arr_vn_[$i][1]);
				$singer_name 	=	GetSingerName($arr_vn_[$i][2]);
				$get_singer = GetSinger($arr_vn_[$i][2]);
				$song_img = check_img($arr_vn_[$i][7]);
				$song_url = url_link($arr_vn_[$i][1].'-'.$singer_name,$arr_vn_[$i][0],'xem-video');
				$checkhq		= check_song($arr[$i][4],$arr[$i][5]);
                $number = $i+1;
				$download		= 'down.php?id='.$arr_vn_[$i][0].'&key='.md5($arr_vn_[$i][0].'tgt_music');
					if($i == 0 || $i == 1 || $i == 2 || $i == 3 || $i == 4  || $i == 5  || $i == 6  || $i == 7  || $i == 8 )	{
		$number0[$i]	=	"0";
	}
 ?>
<li id="song<?php  echo en_id($arr_vn_[$i][0]);?>" class="po-<?php  echo $number0[$i];?><?php  echo $number;?> group" data-type="song" data-id="<?php  echo en_id($arr_vn_[$i][0]);?>" data-code="ZncmTZnsWNNkQFxyLFcyvmZH" data-active="show-tool">
    <div class="row-display group po-r">
       <span class="txt-rank"><?php  echo $number0[$i];?><?php  echo $number;?></span>
          <span class="statistics up"><i></i><?php  echo $arr_vn_[$i][6];?></span>
               <div class="e-item">
                   <a href="<?php  echo $song_url;?>" title="Video <?php  echo $title;?> - <?php  echo $singer_name;?>" class="thumb pull-left _trackLink" tracking="_frombox=chartsong_vietnam_<?php  echo $number0[$i];?><?php  echo $number;?>">
            <img width="100" height="60" src="<?php  echo check_img($song_img);?>" alt="Bài hát <?php  echo $title;?> - <?php  echo $singer_name;?>" />
                    </a>
              <h3 class="title-item">
               <a href="<?php  echo $song_url;?>" title="<?php  echo $title;?>" class="txt-primary _trackLink" tracking="_frombox=chartsong_vietnam_<?php  echo $number0[$i];?><?php  echo $number;?>"><?php  echo rut_ngan($title,9);?></a>
                </h3>
                 <div class="inblock ellipsis"> 
                  <h4 class="title-sd-item">
                             <span class="txt-info"><?=$get_singer?></span>
                        </h4>
                   </div>
                   </div><!-- END .e-item -->
                  <div class="tool-song">
                  <div class="i25 i-small download"><a title="Tải về" class="fn-dlsong" data-item="#song<?php  echo en_id($arr_vn_[$i][0]);?>" href="<?php  echo $download;?>" target="_blank"></a></div>
                          <div class="i25 i-small addlist"><a title="Thêm vào MV Yêu Thích" class="fn-addto" data-item="#song<?php  echo en_id($arr_vn_[$i][0]);?>" style="cursor:pointer;" onclick="ADDFAV(<?php  echo $arr_vn_[$i][0]; ?>,3);"></a></div>
                <!-- End playlist ADD -->
                 <div class="i25 i-small share"><a title="Chia sẻ" class="fn-share" data-item="#song<?php  echo en_id($arr_vn_[$i][0]);?>" href="<?php  echo $song_url;?>"></a></div>
                 </div>

                 </div>
                  <div class="clearfix"></div>
				</li>
<?php  } 
				$date = date('Y-m-d');
				while (date('w', strtotime($date)) != 1) {
				$tmp = strtotime('-1 day', strtotime($date));
				$date = date('Y-m-d', $tmp);
				}
				$week = 'Tuần '.date('W', strtotime($date));
				$week = str_replace('Tuần 0','',$week);
				$name_cff = $title_3.' - Tuần '.$week.', '.date("Y");
				 $cf_ascii = strtolower(get_ascii(str_replace('-'," ",replace($name_cff))));	
				if(date("w") == 0 && $up[0][4] == '1') {
				mysqli_query($link_music,"INSERT INTO table_charts (charts_value,charts_name,charts_name_ascii,charts_type,charts_cat,charts_date_old,charts_up,charts_date,charts_week,charts_year,charts_album,charts_time) 
						 VALUES ('".$list_song_."','".$name_cff."','".$cf_ascii."','3','".$up[0][5]."','".date("d/m/Y")." - ".tinh_tuan(7)."','0','".date("d/m")." - ".w_m_noyear(7)."','".$week."','".date("Y")."','".$up[0][7]."','".NOW."')");
				}
}?>
<?php 
if ($w !='' || $y !=''){
			$s = explode(',',$up[0][2]);
            foreach($s as $x=>$val) {
				$arr[$x] = $mlivedb->query(" m_id, m_title, m_singer, m_viewed, m_hot, m_hq,m_downloaded,m_img ","data"," m_id = '".$s[$x]."' AND m_type = 2 LIMIT 20");
					if (count($arr[$x])<1) header("Location: ".SITE_LINK."bang-xep-hang/index.html");
				$title = un_htmlchars($arr[$x][0][1]);
				$singer_name 	=	GetSingerName($arr[$x][0][2]);
				$get_singer = GetSinger($arr[$x][0][2]);
				$song_img = check_img($arr[$x][0][7]);
				$song_url = url_link($arr[$x][0][1].'-'.$singer_name,$arr[$x][0][0],'xem-video');
                $number = $x+1;
				$download		= 'down.php?id='.$arr[$x][0][0].'&key='.md5($arr[$x][0][0].'tgt_music');
					if($x == 0 || $x == 1 || $x == 2 || $x == 3 || $x == 4  || $x == 5  || $x == 6  || $x == 7  || $x == 8  )	{
		$number0[$x]	=	"0";
	}
 ?>
 <li id="song<?php  echo en_id($arr[$x][0][0]);?>" class="po-<?php  echo $number0[$x];?><?php  echo $number;?> group" data-type="song" data-id="<?php  echo en_id($arr[$x][0][0]);?>" data-code="ZncmTZnsWNNkQFxyLFcyvmZH" data-active="show-tool">
    <div class="row-display group po-r">
       <span class="txt-rank"><?php  echo $number0[$x];?><?php  echo $number;?></span>
          <span class="statistics up"><i></i><?php  echo $arr[$x][0][6];?></span>
               <div class="e-item">
                   <a href="<?php  echo $song_url;?>" title="Bài hát <?php  echo $title;?> - <?php  echo $singer_name;?>" class="thumb pull-left _trackLink" tracking="_frombox=chartsong_vietnam_<?php  echo $number0[$x];?><?php  echo $number;?>">
            <img width="100" height="60" src="<?php  echo check_img($song_img);?>" alt="Bài hát <?php  echo $title;?> - <?php  echo $singer_name;?>" />
                    </a>
              <h3 class="title-item">
               <a href="<?php  echo $song_url;?>" title="<?php  echo $title;?>" class="txt-primary _trackLink" tracking="_frombox=chartsong_vietnam_<?php  echo $number0[$x];?><?php  echo $number;?>"><?php  echo rut_ngan($title,9);?></a>
                </h3>
                 <div class="inblock ellipsis"> 
                  <h4 class="title-sd-item">
                             <span class="txt-info"><?=$get_singer?></span>
                        </h4>
                   </div>
                   </div><!-- END .e-item -->
                  <div class="tool-song">
                  <div class="i25 i-small download"><a title="Tải về" class="fn-dlsong" data-item="#song<?php  echo en_id($arr[$x][0][0]);?>" href="<?php  echo $download;?>" target="_blank"></a></div>
                          <div class="i25 i-small addlist"><a title="Thêm vào MV Yêu Thích" class="fn-addto" data-item="#song<?php  echo en_id($arr[$x][0][0]);?>" style="cursor:pointer;" onclick="ADDFAV(<?php  echo $arr[$x][0][0]; ?>,3);"></a></div>
                <!-- End playlist ADD -->
                 <div class="i25 i-small share"><a title="Chia sẻ" class="fn-share" data-item="#song<?php  echo en_id($arr[$x][0][0]);?>" href="<?php  echo $song_url;?>"></a></div>
                 </div>

                 </div>
                  <div class="clearfix"></div>
				</li>
 <?php  } }?>
						 </ul>
                        </div><!-- END .table-body -->
                    </div><!-- END .table-list -->
                </div><!-- END .col-12 -->
            </div><!-- END .row -->
        </div><!-- END .section -->
    </div><!-- END .wrap-content -->
                    <div class="wrap-sidebar">
						<div class="widget widget-tab ">
					        	<?=BANNER('home_right_1','322');?>
						</div>
<?php if($id	== IDCATCA || $id	== IDCATAM) { ?>						
<div class="widget widget-tab "> 
<h2 class="title-section sz-title-sm"> <a href="bang-xep-hang/index.html">BXH Việt Nam <i class="icon-arrow"></i></a>
   <a title="Xem tất cả" href="#" class="none icon-play-all pull-right fn-play_link"></a>
</h2> 
			<h2>
			 <ul class="tab-nav" id="tab_click_bxh_page_2">
			<li><a class="fn-chart" href="javascript:void(0);" onClick="return BXH_PAGE_2('bxh_vn',10,this); return false;">Bài Hát</a></li>
			<li><a class="fn-chart" href="javascript:void(0);" onClick="return BXH_PAGE_2('bxhal_vn',5,this); return false;">Album</a></li>
			<li><a class="active fn-chart" href="javascript:void(0);" onClick="return BXH_PAGE_2('bxhv_vn',5,this); return false;">Video</a></li>
			</ul>
			</h2>
			 <div id="_chart_2" class="tab-pane widget-thumb-countdown">
 <div class="widget-content no-padding no-border "> 
 <ul class="fn-list" id="load_bxh_page_2">   
                    <?=top_song('bxhv_vn',5);?>
</ul>
			</div></div></div>
<?php }?>
<?php if($id	== IDCATCA || $id	== IDCATVN) { ?>		
<div class="widget widget-tab "> 
<h2 class="title-section sz-title-sm"> <a href="bang-xep-hang/index.html">BXH Âu Mỹ <i class="icon-arrow"></i></a>
   <a title="Xem tất cả" href="#" class="none icon-play-all pull-right fn-play_link"></a>
</h2> 
			<h2>
			 <ul class="tab-nav" id="tab_click_bxh_page">
			<li><a class="fn-chart" href="javascript:void(0);" onClick="return BXH_PAGE('bxh_am',10,this); return false;">Bài Hát</a></li>
			<li><a class="fn-chart" href="javascript:void(0);" onClick="return BXH_PAGE('bxhal_am',5,this); return false;">Album</a></li>
			<li><a class="active fn-chart" href="javascript:void(0);" onClick="return BXH_PAGE('bxhv_am',5,this); return false;">Video</a></li>
			</ul>
			</h2>
			 <div id="_chart" class="tab-pane widget-thumb-countdown">
 <div class="widget-content no-padding no-border "> 
 <ul class="fn-list" id="load_bxh_page">   
                     <?=top_song('bxhv_am',5);?>
</ul>
			</div></div></div>
<?php }?>
						<div class="widget widget-tab ">
					        	<?=BANNER('home_right_2','322');?>
						</div>
<?php if($id	== IDCATAM || $id	== IDCATVN) { ?>		
<div class="widget widget-tab "> 
<h2 class="title-section sz-title-sm"> <a href="bang-xep-hang/index.html">BXH Châu Á <i class="icon-arrow"></i></a>
   <a title="Xem tất cả" href="#" class="none icon-play-all pull-right fn-play_link"></a>
</h2> 
			<h2>
			 <ul class="tab-nav" id="tab_click_bxh_page_1">
			<li><a class="fn-chart" href="javascript:void(0);" onClick="return BXH_PAGE_1('bxh_ca',10,this); return false;">Bài Hát</a></li>
			<li><a class="fn-chart" href="javascript:void(0);" onClick="return BXH_PAGE_1('bxhal_ca',5,this); return false;">Album</a></li>
			<li><a class="active fn-chart" href="javascript:void(0);" onClick="return BXH_PAGE_1('bxhv_ca',5,this); return false;">Video</a></li>
			</ul>
			</h2>
			 <div id="_chart_1" class="tab-pane widget-thumb-countdown">
 <div class="widget-content no-padding no-border "> 
 <ul class="fn-list" id="load_bxh_page_1">   
                     <?=top_song('bxhv_ca',5);?>
</ul>
			</div></div></div>
	<?php }?>				
</div><!-- END .wrap-sidebar -->
</div><!-- END .container -->
<div class="clearfix"></div>
</div>
    <?php  include("./theme/ip_footer.php");?>
</body>
</html>