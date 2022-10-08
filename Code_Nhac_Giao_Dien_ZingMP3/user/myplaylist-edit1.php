<div class="zcontent">
           <h1 class="title-section has-border-bottom">Sửa Playlist</h1>
            <div class="clearfix"></div>

<?php 
$album_id	=	del_id($id);
$arrz 		= 	$mlivedb->query(" album_id, album_name, album_info, album_song,album_img,album_cat ","album"," album_poster = '".$_SESSION["mlv_user_id"]."' AND album_id = '".$album_id."'");
?>

<form method="post" action="<?php  echo $_SERVER["REQUEST_URI"]; ?>" name="Save">
 <div class="frm-edit-playlist">
                    <div class="avt-playlist fn-thumb" id="changeThumb" >
                        <img height="180" width="180" src="<?php  echo check_img($arrz[0][4]);?>" alt="<?php  echo un_htmlchars($arrz[0][1]);?>" />
                        <input id="thumbnail" name="thumbnail" type="hidden" value="<?php  echo check_img($arrz[0][4]);?>" />
                        <input id="itemOrderChanged" name="itemOrderChanged" type="hidden" value="0" />
                        <a href="#" class="edit-zone"><span class="zicon icon-edit"></span></a>
                        <a id="uploadTmp" style="visibility: hidden;"></a>
                    </div>
                    <div class="form-input">
                        
                        <div class="form-control-inline col-12">
                            <label for="name">Tên Playlist</label>
                            <input id="name" name="PLNAME" type="text" class="frm-textbox" value="<?php  echo un_htmlchars($arrz[0][1]);?>" />
                            <input id="id" name="id" type="hidden" class="frm-textbox" value="<?php  echo $arrz[0][0];?>" />
                        </div>
						 <div class="form-control-inline col-12">
                            <label for="name">IMG Playlist</label>
                            <input id="name" name="PLIMG" type="text" class="frm-textbox" value="<?php  echo $arrz[0][4];?>" />
                            <input id="id" name="id" type="hidden" class="frm-textbox" value="<?php  echo $arrz[0][0];?>" />
                        </div>
                        <div class="form-control-inline col-12">
                            <label for="description">Mô tả</label>
                            <textarea name="PLINFO" id="description" cols="30" rows="7" class="frm-textarea"><?php  echo un_htmlchars($arrz[0][2]);?></textarea>
                        </div>
						  <div class="form-control-inline box-set-ca col-12">
                            <label for="">Chọn thể loại</label>
                            <div class="set-ca">
                                <div class="form-control-inline col-12">
                                    <ul class="tab-link list-inline">
                                        
<select class="btn btn-warning dropdown-toggle" name="cat_name">
<option value=",1,"<?php  if($arrz[0][5]==',1,') echo ' selected';?>>Việt Nam</option>
<option value=",2,"<?php  if($arrz[0][5]==',2,') echo ' selected';?>>Âu Mỹ</option>
<option value=",3,"<?php  if($arrz[0][5]==',3,') echo ' selected';?>>Châu Á</option>
<option value=",4,"<?php  if($arrz[0][5]==',4,') echo ' selected';?>>Hòa Tấu</option>
</select>
                                            
                                    </ul>
                                </div> </div> </div>
<?php 
if($arrz[0][3] != ''){ ?>
                        <div class="form-control-inline box-set-ca col-12">
                            Bài hát trong playlist: (<?php  echo SoBaiHat($arrz[0][3]);?>)
                            
                        </div>
<?php } ?>
                    </div>
                </div>


             <div class="tab-pane">
                    <div class="row">
                        <div class="col-12">
                            <div class="list-item full-width">
			
		
 <center> <div id="response"></div></center>
 <ul id="LoadSongAlbum">
<?php 
if($arrz[0][3] != ''){
	$s = explode(',',$arrz[0][3]);
	foreach($s as $x=>$val) {
		$arr[$x] = $mlivedb->query(" m_id, m_title, m_singer, m_viewed ","data"," m_id = '".$s[$x]."'");
		$singer_name = GetSingerName($arr[$x][0][2]);
		$get_singer = GetSinger($arr[$x][0][2]);
		$stt	=	$x+1;
		$song_url 		= url_link($arr[$x][0][1]."-".$singer_name,$arr[$x][0][0],'nghe-bai-hat');
		
?>

 <li class="group" id="arrayorder_<?php  echo $arr[$x][0][0];?>" >
                                        <input type="hidden" name="item_id" value="<?php  echo en_id($arr[$x][0][0]);?>" />
                                        <div class="info-dp pull-left">
                                            <h3 class="txt-primary"><?php  echo $stt;?>. 
                                                <a href="<?php  echo $song_url;?>" title="Bài hát  <?php echo $arr[$x][0][1];?> - <?php  echo $singer_name;?>">
                                                    <?php echo rut_ngan($arr[$x][0][1].' - '.$singer_name,9);?>
                                                </a>
                                            </h3>
                                        </div>
                                        <div class="bar-chart"><span class="fn-bar" data-total="<?php  echo $arr[$x][0][3];?>" title="<?php  echo $arr[$x][0][3];?>" style="width:<?php  echo $arr[$x][0][3];?>%;"></span></div>                                    
                                        <div class="tool-song">
                                            <div class="i25 i-small remove"><a onClick="xSongAlbum(<?php  echo $arrz[0][0];?>,<?php  echo $arr[$x][0][0];?>);" title="Xóa" class="fn-rmitem" data-item="#song<?php  echo en_id($arr[$x][0][0]);?>"></a></div>
                                            <div class="i25 i-small drag"><a href="#"></a></div>
                                        </div>
                                    </li> 
	<?php  }} ?>
</ul>
 
 </div>
    </div>
                </div> 
 <div class="form-control align-center col-12"><input class="button btn-dark-blue" type="submit" name="Save" value="Lưu lại"></div>
</div>

<?php 
if($_POST['Save']) {
	$album_name 	= htmlchars(stripslashes($_POST['PLNAME']));
	$album_info 	= htmlchars(stripslashes($_POST['PLINFO']));
	$album_img 	= htmlchars(stripslashes($_POST['PLIMG']));
		$category 	= $_POST['cat_name'];
	if(!$album_name) mssBOX("Bạn chưa nhập tên album !",$_SERVER["REQUEST_URI"]);
	else {
	mysqli_query($link_music,"UPDATE table_album SET album_name = '".$album_name."',album_name_ascii = '".get_ascii($album_name)."', album_info = '".$album_info."', album_img = '".$album_img."',album_cat = '".$category."' WHERE album_id = '".$album_id."'");
	mssBOX("Playlist của bạn đã được lưu lại !","mymusic/myplaylist");
	}
}
?>
<input type="hidden" id="id_album" value="<?php  echo $album_id;?>">
<script type="text/javascript" src="./script/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="./script/jquery-ui-1.7.1.custom.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){ 	
function slideout(){
  setTimeout(function(){
  $("#response").slideUp("slow", function () {
});
}, 500);}
    $("#response").hide();
	$(function() {
	$("ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
			var order = $(this).sortable("serialize") + '&update=update&id_album=<?php  echo $album_id;?>'; 
			$.post("update-album.php", order, function(theResponse){
				$("#response").html(theResponse);
				$("#response").slideDown('slow');
				slideout();
			}); 															 
		}								  
		});
	});

});

</script>
</form>
</div>