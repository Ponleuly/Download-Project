var currentImage;
    var currentIndex = -1;
    var interval;
    function showImage(index){
        if(index < $('#bigPic img').length){
        	var indexImage = $('#bigPic img')[index]
            if(currentImage){   
            	if(currentImage != indexImage ){
                    $(currentImage).css('z-index',2);
                    clearTimeout(myTimer);
                    $(currentImage).fadeOut(250, function() {
					    myTimer = setTimeout("showNext()", 3000);
					    $(this).css({'display':'none','z-index':1})
					});
                }
            }
            $(indexImage).css({'display':'block', 'opacity':1});
            currentImage = indexImage;
            currentIndex = index;
            $('#thumbs li').removeClass('active');
            $($('#thumbs li')[index]).addClass('active');
        }
    }
    
    function showNext(){
        var len = $('#bigPic img').length;
        var next = currentIndex < (len-1) ? currentIndex + 1 : 0;
        showImage(next);
    }
    
    var myTimer;
    
    $(document).ready(function() {
	    myTimer = setTimeout("showNext()", 3000);
		showNext(); //loads first image
        $('#thumbs li').bind('click',function(e){
        	var count = $(this).attr('rel');
        	showImage(parseInt(count)-1);
        });
	});
jQuery.fn.scrollTo = function(elem, speed) { 
    $(this).animate({
        scrollTop:  $(this).scrollTop() - $(this).offset().top + $(elem).offset().top 
    }, speed == undefined ? 1000 : speed); 
    return this; 
};
	$("#UserUpload").click(function() {
			if(LoginMLV == 'NO') {
		Login_Box();
	}else {
		 window.location.href = mainURL+"upload.html";
		}});
	$('.toggle-filter').click(function(){
	   $(".fn-options").addClass("none");
	   $(".fn-options").removeClass("none");
});

$(document).ready(function(){
		$(document).on('click',"[like-song]",function(){
		var ID = $(this).attr("data-id");
		$('.fn-btn span').remove();
		$.ajax({
			type:'POST',
			url:'process/like_song.php',
			data:'id='+ID,
			success:function(html){
				$('[like-song]').html(html);
			}
		});	
	});
	$(document).on('click','#videoRec .load-more',function(){
		var ID = $(this).attr('id');
		$('#videoRec .load-more').remove();
		$.ajax({
			type:'POST',
			url:'process/video_more.php',
			data:'id='+ID,
			success:function(html){
				$('#videoRec .fn-list').append(html);
			}
		});
		
	});

		$(document).on('click','#songRec .load-more',function(){
		var ID = $(this).attr('id');
		$('#songRec .load-more').remove();
		$.ajax({
			type:'POST',
			url:'process/song_more.php',
			data:'id='+ID,
			success:function(html){
				$('#songRec .fn-list').append(html);
			}
		});
		
	});
		$(document).on('click','#playlistRec .load-more',function(){
		var ID = $(this).attr('id');
		$('#playlistRec .load-more').remove();
		$.ajax({
			type:'POST',
			url:'process/album_more.php',
			data:'id='+ID,
			success:function(html){
				$('#playlistRec .fn-list').append(html);
			}
		});
		
	});
// share b??i h??t , labum . video 

 $("#btnAddPlaylistNowPlaying").click(function () {
            $(".box_menu_player a").removeClass("active");
            $(this).addClass("active");
            $(".boxshowcase").addClass("hideShowCaseNoneHeight");
            $("#divUserPlaylistNowplaying").removeClass("hideShowCaseNoneHeight");
            //$("#btnShowShare").removeClass("active");
        });

        $("#btnCommentFB").click(function () {
            $(".box-comment a").removeClass("active");
            $(this).addClass("active");
            $(".tab-pane-cm ").addClass("none");
            $("#divFBBox").removeClass("none");
            //$("#btnShowShare").removeClass("active");
        });
		$("#btnCommentSite").click(function () {
            $(".box-comment a").removeClass("active");
            $(this).addClass("active");
            $(".tab-pane-cm ").addClass("none");
            $("#divWEBBox").removeClass("none");
            //$("#btnShowShare").removeClass("active");
        });
		

 $("#btnShareNowPlaying").click(function () {
  $(".media-func a").removeClass("active");
            $(this).addClass("active");
            $(".tab-pane ").addClass("none");
            $("#divShowShare").removeClass("none");
        });

        $("#btnDownloadBox").click(function () {
            $(".media-func a").removeClass("active");
            $(this).addClass("active");
            $(".tab-pane ").addClass("none");
            $("#divDownloadBox").removeClass("none");
            //$("#btnShowShare").removeClass("active");
        });
		
		$("#btnAddBox").click(function () {
	if(LoginMLV == 'NO') {
		Login_Box();
	}else {
            $(".media-func a").removeClass("active");
            $(this).addClass("active");
             $(".tab-pane ").addClass("none");
            $("#divAddBox").removeClass("none");
            //$("#btnShowShare").removeClass("active");
				}});
		    $("#btnReportError").click(function () {
					if(LoginMLV == 'NO') {
		Login_Box();
	}else {
            $(".media-func a").removeClass("active");
            $(this).addClass("active");
            $(".tab-pane ").addClass("none");
            $("#divReportErrorBox").removeClass("none");
            //$("#btnShowShare").removeClass("active");
			}});

        //init embed button
        $('input[id*="urlEmbed"]').unbind('click').click(function (e) {
            $(this).focus();
            $(this).select();
        });

   //init radio button
        $("#radioNormal").click(function () {
            var type = $(this).attr("rel");
            var key = $(this).attr("key");
            if (type == "song") {
                $("#urlEmbedBlog").val('<iframe src="' + mainURL + 'embed/song/normal/' + key + '" width="640" height="180" frameborder="0" allowfullscreen></iframe>');
            } else if (type == "video") {
                $("#urlEmbedBlog").val('<iframe src="' + mainURL + 'embed/mv/normal/' + key + '" width="560" height="355" frameborder="0" allowfullscreen></iframe>');
            } else if (type == "album") {
                $("#urlEmbedBlog").val('<iframe src="' + mainURL + 'embed/album/normal/' + key + '" width="640" height="180" frameborder="0" allowfullscreen></iframe>');
            }
        });

        $("#radioAuto").click(function () {
            var type = $(this).attr("rel");
            var key = $(this).attr("key");
            if (type == "song") {
                $("#urlEmbedBlog").val('<iframe src="' + mainURL + 'embed/song/' + key + '" width="640" height="180" frameborder="0" allowfullscreen></iframe>');
            } else if (type == "video") {
                $("#urlEmbedBlog").val('<iframe src="' + mainURL + 'embed/mv/' + key + '" width="560" height="355" frameborder="0" allowfullscreen></iframe>');
            } else if (type == "album") {
                $("#urlEmbedBlog").val('<iframe src="' + mainURL + 'embed/album/' + key + '" width="640" height="180" frameborder="0" allowfullscreen></iframe>');
            }
        });


});
if (localStorage.auto_next === undefined)
{
		$(".autoplay").trigger("click");
} else {
	if (localStorage.getItem("auto_next") == "on") {
		var html="<span class=\"label\">Autoplay</span>";
        html += "<span class=\"atip\">i<i>T??? ?????ng chuy???n sang b??i h??t ???????c g???i ?? khi k???t th??c b??i h??t ??ang nghe. (Y??u c???u player ??? ch??? ????? kh??ng l???p)</i></span>";
        html += "<span class=\"btn-sw btn-sw-on fn-autoplay\"><a onclick=\"change_auto_next();\"><i class=\"node\"></i><b class=\"zicon\"></b></a></span>";
		$(".autoplay").html(html);
	}
}
function change_auto_next() {
	if (localStorage.getItem("auto_next") == "off")
	{
		localStorage.setItem("auto_next", "on");
		$('.btn-sw').removeClass('btn-sw-off');
		$('.btn-sw').addClass('btn-sw-on');
		$('.btn-sw').html('<a onclick="change_auto_next();"><i class="node"></i><b class="zicon"></b></a>');
	} 
	else 
	{
		localStorage.setItem("auto_next", "off");
		$('.btn-sw').removeClass('btn-sw-on');	
		$('.btn-sw').addClass('btn-sw-off');
		$('.btn-sw').html('<a onclick="change_auto_next();"><i class="node"></i><b class="zicon"></b></a>');	
	}
}
$(document).ready(function(){
	$("#q").keyup(function(){
		key_vl = $(this).val();
		if (key_vl.length>1)
	{
		$.ajax({
		type: "POST",
		url: "get-search.php",
		data:'q='+$(this).val(),
		beforeSend: function(){
			$("#q").css("background","#FFF url(./theme/images/loading.gif) no-repeat 165px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#q").css("background","#FFF");
		}
		});
	} else 
	{
		$("#suggesstion-box").html("");
		$("#suggesstion-box").hide(500);
	}
	});
});

function selectCountry(val) {
$("#q").val(val);
$("#suggesstion-box").hide();
}
// JavaScript MLV 1.0
var loadingMLV 	= '<div align="center"><img src="'+mainURL+'/theme/images/loading.gif" /></div>';
var http = createRequestObject();
function SHOWHIDE(id) {
	$('#'+id).slideToggle(0);
}

$(document).ready(function () {
	$("#menu_nav").dropmenu();
	$.ajax({type:"POST",url:"script-ajax-mlv.php",data:"Login=1",success:function(html){$("#LoginMLV").html(html);}});
	$('#drlReason').change(function() {
		erid	=	$(this).val();
		if(erid == 1)
			$('#ERCT').show();
		else
			$('#ERCT').hide();
	});
});

$(function() {$('#deleteBOX').click(function() {Name = 'B???n ch???c ch???n mu???n x??a! <input class="zbtn-default fn-ok" type="submit" id="deleteBOX" name="deleteAll" value="[C??]" />  <input class="zbtn-default zbtn-gray fn-close" type="submit" value="[Kh??ng]" />';$('#ask_ok').show();$('#ask_ok').html(Name);});});
function createRequestObject() {
	var xmlhttp;
	try { xmlhttp=new ActiveXObject("Msxml2.XMLHTTP"); }
	catch(e) {
    try { xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");}
	catch(f) { xmlhttp=null; }
  }
  if(!xmlhttp&&typeof XMLHttpRequest!="undefined") {
	xmlhttp=new XMLHttpRequest();
  }
	return  xmlhttp;
}

function checkAllFields(ref)
{
var chkAll = document.getElementById('checkAll');
var checks = document.getElementsByName('delAnn[]');
var removeButton = document.getElementById('removeChecked');
var boxLength = checks.length;
var allChecked = false;
var totalChecked = 0;
	if ( ref == 1 )
	{
		if ( chkAll.checked == true )
		{
			for ( i=0; i < boxLength; i++ )
			checks[i].checked = true;
		}
		else
		{
			for ( i=0; i < boxLength; i++ )
			checks[i].checked = false;
		}
	}
	else
	{
		for ( i=0; i < boxLength; i++ )
		{
			if ( checks[i].checked == true )
			{
			allChecked = true;
			continue;
			}
			else
			{
			allChecked = false;
			break;
			}
		}
		if ( allChecked == true )
		chkAll.checked = true;
		else
		chkAll.checked = false;
	}
	for ( j=0; j < boxLength; j++ )
	{
		if ( checks[j].checked == true )
		totalChecked++;
	}
	removeButton.value = "Remove ["+totalChecked+"] Selected";
}
var str = '';
function setValue(obj)
{
		var str = 'Nh???p t??? kh??a ...';   
			if(obj.value == '')
			{
				obj.value = str;
				obj.style.color = '#848484';
			}
			else if(obj.value == str)
			{
				obj.value = '';
				obj.style.color = '#000000';
			}
}			
function nohandleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			response = http.responseText;
			field.innerHTML = response;
			if(!response) window.location.href = url;
		}
  	}
	catch(e){}
	finally{}
}

function handleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			response = http.responseText;
			field.innerHTML = response;
			field.scrollIntoView();
			if(!response) window.location.href = url;
		}
  	}
	catch(e){}
	finally{}
}

function AlbumNEW(singer_type,album_type,obj) {
	var linkList = document.getElementById("tab_click_album").getElementsByTagName("a");
   		for (i = 0; i < linkList.length; i++) {
      		linkList[i].className = "";
   		}
   	obj.className = "active";
	try {
		field = document.getElementById("load_album");
		field.innerHTML = loadingMLV;
		http.open('POST', mainURL);
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = nohandleResponse;
		http.send('load_album=1&singer_type='+singer_type+'&album_type='+album_type);
	}
	catch(e){}
	finally{}
	return false;
}

function VideoNEW(singer_type,obj) {
	var linkList = document.getElementById("tab_click_video").getElementsByTagName("a");
   		for (i = 0; i < linkList.length; i++) {
      		linkList[i].className = "";
   		}
   	obj.className = "active";
	try {
		field = document.getElementById("load_video");
		field.innerHTML = loadingMLV;
		http.open('POST', mainURL);
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = nohandleResponse;
		http.send('load_video=1&singer_type='+singer_type);
	}
	catch(e){}
	finally{}
	return false;
}

function showTop(num,page,number,apr) { 
    field = document.getElementById(num);
	field.innerHTML = loadingMLV;
	http.open('POST', mainURL);
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	http.onreadystatechange = handleResponse;
    http.send('showtop=1&num='+num+'&page='+page+'&number='+number+'&apr='+apr); 
  	return false; 
}

function showComment(media_id,page,comment_type) { 
	field = document.getElementById("comment_field");
	field.innerHTML = loadingMLV;
	http.open('POST',  mainURL);
	http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	http.onreadystatechange = handleResponse;
    http.send('showcomment=1&media_id='+media_id+'&page='+page+'&comment_type='+comment_type); 
  return false; 
} 

function comment_handleResponse() {
	try {
		if((http.readyState == 4)&&(http.status == 200)){
			var response = http.responseText;
			if (response == 'OK') {
				media_id = encodeURIComponent(document.getElementById("media_id").value);
				num = encodeURIComponent(document.getElementById("num").value);
				comment_type = encodeURIComponent(document.getElementById("comment_type").value);
				showComment(media_id,1,comment_type);
			}
			else $.notify(document.getElementById("comment_loading").innerHTML = response, 'error');

		}
  	}
	catch(e){}
	finally{}
}

function comment_check_values() {
	if(LoginMLV == 'NO') {
		Login_Box();
	}else {
		media_id = encodeURIComponent(document.getElementById("media_id").value);
		num = encodeURIComponent(document.getElementById("num").value);
		comment_poster = encodeURIComponent(document.getElementById("comment_poster").value);
		comment_type = encodeURIComponent(document.getElementById("comment_type").value);
		comment_content = encodeURIComponent(document.getElementById("comment_content").value);
				if(comment_content == 0) {
				$.notify('B???n c???n nh???p n???i dung b??nh lu???n.', 'error');
				return false;
		}
		if(comment_poster=="") {
				  $.notify('B???n ch??a nh???p c???m nh???n ho???c t??n ng?????i g???i.', 'error');
				return false;
		}
		try {
			document.getElementById("comment_loading").innerHTML = loadingMLV;
			document.getElementById("comment_loading").style.display = "block";
			http.open('POST',  mainURL+'/index.php');
			http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
			http.onreadystatechange = comment_handleResponse;
			http.send('comment=1&media_id='+media_id+'&num='+num+'&comment_poster='+comment_poster+'&comment_type='+comment_type+'&comment_content='+comment_content);
			document.getElementById("submit").disabled=true;document.getElementById("submit").value="LOADING...";
		}
		catch(e){}
		finally{}
	  return false;
	}
}
function LoadInfoSinger(name_singer,type,type_2) {jQuery.ajax({type:"POST",url:"index.php",data:"SingerInfo=1&name_singer="+name_singer+"&type="+type+"&type_2="+type_2,success:function(html){if(type_2 == 1){jQuery("#LoadSingerInfo").html(html);}else jQuery("#LoadLyricInfo").html(html);}});}

/*LOGIN*/
function Login_Box() {
               new Boxy('<div class="overlay" >'+
'<div class="box-popup no-padding">'+
'<h3 class="title-pop">????ng nh???p</h3>'+
'<div class="login-form fn-content">'+
'<iframe name="ifrLogin" frameborder="0" height="0" width="0"></iframe>'+
'<form method="post">'+
		'<p class="alert alert-danger fn-msg none"></p>'+
		'<p class="txt-input"><input name="name" type="text" placeholder="T??n ????ng nh???p"></p>'+
		'<p class="txt-input"><input name="pass" type="password" placeholder="M???t kh???u"></p>'+	
  	'<div class="radio-input">'+
		'<div class="pull-left">'+
		'<input type="checkbox" name="remember" value="1" checked="checked"><label for="longtime">Ghi Nh??? ????ng Nh???p</label>'+
			'<p class="txt-link"><a href="thanh-vien/quen-mat-khau.html">Qu??n m???t kh???u?</a></p>'+
		'</div>'+
		'<div class="pull-right">'+
			'<button type="submit" value="????ng nh???p" name="login_oki" class="button frm-button">????ng nh???p</button>'+
		'</div>'+
	'</div>'+
'</form>'+
'</div>'+
'<span class="close fn-close" ></span>'+
'</div>'+
'</div>', {title: '????ng nh???p', modal: true});
};

function _load_box(number) {
	if(LoginMLV == 'NO') {
		Login_Box();
	}else {
	offset = $('#playlist_'+number).offset();
	ID = document.getElementById('playlistBox');
	if (ID.style.display == "block") {
		ID.style.display = "none"; 
	}
	else {
			$('.playlistbox').hide();
			$.post("script-ajax-mlv.php", {song_id: ""+number+""}, function(data){
				if(data.length >0) {
					$('#playlistBox').show();
					$('#playlistBox').html(data);
					ID.style.top = offset.top+35+"px";
					ID.style.left = offset.left+13+"px";
				}
			});
		}
	}
}

function BXH(type,number,obj) {

	if(type == 'bxh_vn' || type == 'bxh_am' || type == 'bxh_ca') {
		id_load	 	= 'tab_click_top_song';
		id_load2	= 'load_bxh';
	}else if (type == 'new_vn' || type == 'new_am' || type == 'new_ca') {
		id_load	 	= 'tab_click_new_song';
		id_load2	= 'load_new_song';
	}else if (type == 'bxhal_vn' || type == 'bxhal_am' || type == 'bxhal_ca') {
		id_load	 	= 'tab_click_top_album';
		id_load2	= 'load_bxh_album';
	}else {
		id_load 	= 'tab_click_top_video';
		id_load2	= 'load_bxhv';
	}
	var linkList = document.getElementById(id_load).getElementsByTagName("a");
   		for (i = 0; i < linkList.length; i++) {
      		linkList[i].className = "fn-chart";
   		}
   	obj.className = "active";
	
	try {
		field = document.getElementById(id_load2);
		field.innerHTML = loadingMLV;
		http.open('POST', mainURL);
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = nohandleResponse;
		http.send('loadTopsong=1&type='+type+'&number='+number);
	}
	catch(e){}
	finally{}
	return false;
}

function BXH_PAGE(type,number,obj) {

	if(type == 'bxh_vn' || type == 'bxh_am' || type == 'bxh_ca') {
		id_load	 	= 'tab_click_bxh_page';
        $("#_chart").removeClass("widget-thumb-countdown");
        $("#_chart").addClass("widget-song-countdown");
		id_load2	= 'load_bxh_page';
	}else if (type == 'bxhv_vn' || type == 'bxhv_am' || type == 'bxhv_ca') {
		id_load	 	= 'tab_click_bxh_page';
        $("#_chart").removeClass("widget-song-countdown");
        $("#_chart").addClass("widget-thumb-countdown");
		id_load2	= 'load_bxh_page';
	}else if (type == 'bxhal_vn' || type == 'bxhal_am' || type == 'bxhal_ca') {
		id_load 	= 'tab_click_bxh_page';
        $("#_chart").removeClass("widget-song-countdown");
        $("#_chart").addClass("widget-thumb-countdown");
		id_load2	= 'load_bxh_page';
	}
	var linkList = document.getElementById(id_load).getElementsByTagName("a");
   		for (i = 0; i < linkList.length; i++) {
      		linkList[i].className = "fn-chart";
   		}
   	obj.className = "active";
	
	try {
		field = document.getElementById(id_load2);
		field.innerHTML = loadingMLV;
		http.open('POST', mainURL);
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = nohandleResponse;
		http.send('loadTopsong=1&type='+type+'&number='+number);
	}
	catch(e){}
	finally{}
	return false;
}

function BXH_PAGE_1(type,number,obj) {

	if(type == 'bxh_vn' || type == 'bxh_am' || type == 'bxh_ca') {
		id_load	 	= 'tab_click_bxh_page_1';
        $("#_chart_1").removeClass("widget-thumb-countdown");
        $("#_chart_1").addClass("widget-song-countdown");
		id_load2	= 'load_bxh_page_1';
	}else if (type == 'bxhv_vn' || type == 'bxhv_am' || type == 'bxhv_ca') {
		id_load	 	= 'tab_click_bxh_page_1';
        $("#_chart_1").removeClass("widget-song-countdown");
        $("#_chart_1").addClass("widget-thumb-countdown");
		id_load2	= 'load_bxh_page_1';
	}else if (type == 'bxhal_vn' || type == 'bxhal_am' || type == 'bxhal_ca') {
		id_load 	= 'tab_click_bxh_page_1';
        $("#_chart_1").removeClass("widget-song-countdown");
        $("#_chart_1").addClass("widget-thumb-countdown");
		id_load2	= 'load_bxh_page_1';
	}
	var linkList = document.getElementById(id_load).getElementsByTagName("a");
   		for (i = 0; i < linkList.length; i++) {
      		linkList[i].className = "fn-chart";
   		}
   	obj.className = "active";
	
	try {
		field = document.getElementById(id_load2);
		field.innerHTML = loadingMLV;
		http.open('POST', mainURL);
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = nohandleResponse;
		http.send('loadTopsong=1&type='+type+'&number='+number);
	}
	catch(e){}
	finally{}
	return false;
}

function BXH_PAGE_2(type,number,obj) {

	if(type == 'bxh_vn' || type == 'bxh_am' || type == 'bxh_ca') {
		id_load	 	= 'tab_click_bxh_page_2';
        $("#_chart_2").removeClass("widget-thumb-countdown");
        $("#_chart_2").addClass("widget-song-countdown");
		id_load2	= 'load_bxh_page_2';
	}else if (type == 'bxhv_vn' || type == 'bxhv_am' || type == 'bxhv_ca') {
		id_load	 	= 'tab_click_bxh_page_2';
        $("#_chart_2").removeClass("widget-song-countdown");
        $("#_chart_2").addClass("widget-thumb-countdown");
		id_load2	= 'load_bxh_page_2';
	}else if (type == 'bxhal_vn' || type == 'bxhal_am' || type == 'bxhal_ca') {
		id_load 	= 'tab_click_bxh_page_2';
        $("#_chart_2").removeClass("widget-song-countdown");
        $("#_chart_2").addClass("widget-thumb-countdown");
		id_load2	= 'load_bxh_page_2';
	}
	var linkList = document.getElementById(id_load).getElementsByTagName("a");
   		for (i = 0; i < linkList.length; i++) {
      		linkList[i].className = "fn-chart";
   		}
   	obj.className = "active";
	
	try {
		field = document.getElementById(id_load2);
		field.innerHTML = loadingMLV;
		http.open('POST', mainURL);
		http.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
		http.onreadystatechange = nohandleResponse;
		http.send('loadTopsong=1&type='+type+'&number='+number);
	}
	catch(e){}
	finally{}
	return false;
}
function _CREATPLAYLIST(id_song,num) {
	if(num == 0) {
		_V_ = '<p> <input id="_playlist_name_'+id_song+'" name="name" type="text" placeholder="T??n Playlist"> <input id="_playlist_name_'+id_song+'" name="item_id" type="hidden" value=""> <span class="close fn-showhide" data-show="#playlistBox .fn-btnnew" data-hide="#playlistBox .fn-new"></span> </p><button type="submit" onclick="_CREATPLAYLIST('+id_song+',1);" class="button btn-dark-blue small-button">?????ng ??</button>';
		$('#_CREATPLAYLIST_'+id_song).html(_V_);
	}
	else {
		album_name = encodeURIComponent(document.getElementById('_playlist_name_'+id_song).value);
		jQuery.ajax({
				 type:"POST",
				 url:"script-ajax-mlv.php",
				 data:"CreatPlaylist=1&album_name="+album_name+"&id="+id_song,
				 success:function(html){
					 	if(html == 0)
						$.notify('???? t???o playlist m???i v?? th??m v??o th??nh c??ng.', 'success');
						if(html == 1)
						$.notify('Playlist ???? c?? trong danh s??ch playlist c???a b???n.', 'error');
					 }
			});
		GETOKI(id_song,1);
	}
}
function GETOKI(song_id,type) {
	if(type == 1) {
		AddOK = '<div class="i25 i-small addlist" id="playlist_'+song_id+'"><a title="Th??m v??o" class="fn-addto" data-item="#song'+song_id+'" style="cursor:pointer;" onclick="_load_box('+song_id+');"></a></div>';
		$('#playlist_'+song_id).html(AddOK);
	}
	if(type == 2)  {
		AddOK = '<a href="javascript:;" onclick="UNFAV('+song_id+',2);" class="button-style-1 pull-left fn-add _trackLink added" ><i class="zicon icon-add"></i><span>???? th??m</span></a>';
		$('#Load_Album_'+song_id).html(AddOK);
	}
	if(type == 3)  {
		AddOK = '<a href="javascript:;" onclick="UNFAV('+song_id+',3);" class="button-style-1 pull-left fn-add _trackLink added" ><i class="zicon icon-add"></i><span>???? th??m</span></a>';
		$('#Load_Video_'+song_id).html(AddOK);
	}
		if(type == 4)  {
		AddOK = '<i class="button-follow fn-follow active" onclick="UNFAV('+song_id+',4);" data-type="artist"></i>';
		$('#Load_Singer_'+song_id).html(AddOK);
	}
}
function GETOKISINGERADD(song_id,type) {
	if(type == 4)  {
		AddOK = '<a href="javascript:void(0);" class="zicon xicon fn-rmitem" onclick="UNFAV('+song_id+',4);" title="X??a"></a>';
		$('#Load_SingerA_'+song_id).html(AddOK);
	}
}
function GETOKISINGERUN(song_id,type) {
		if(type == 4)  {
		AddOK = '<a href="javascript:void(0);" onclick="ADDFAV('+song_id+',4);" class="zicon addicon fn-follow" data-type="artist"></a>';
		$('#Load_SingerA_'+song_id).html(AddOK);
	}
}
function ADDFAV(add_id,type) {
		if(LoginMLV == 'NO') {
		Login_Box();
	}else {
		jQuery.ajax({
				 type:"POST",
				 url:"script-ajax-mlv.php",
				 data:"FAV=1&add_id="+add_id+"&type="+type,
				 success:function(html){
					 	if(type == '1') {
					 if(html == 'no') {
						$.notify('Th??m b??i h??t v??o y??u th??ch th??nh c??ng.', 'success');
						} else {
						$.notify('B??i h??t n??y ???? t???n t???i trong danh s??ch y??u th??ch c???a b???n', 'error');
						 } }
						else if (type == '4') {	
							$.notify('Th??m ngh??? s?? v??o danh s??ch quan t??m th??nh c??ng.', 'success');
						 }
						else if(type == '3') {
						$.notify('Th??m video v??o danh s??ch y??u th??ch th??nh c??ng.', 'success');
						 }
						 else if(type == '2') {
						$.notify('Th??m album v??o danh s??ch y??u th??ch th??nh c??ng.', 'success');
						 }
					 }
			});
		if(type == 1) GETOKI(add_id,1);
		if(type == 2) GETOKI(add_id,2);
		if(type == 3) GETOKI(add_id,3);
		if(type == 4) { GETOKI(add_id,4); GETOKISINGERADD(add_id,4);}
}
}
function GETOKIUNFAV(song_id,type) {
	if(type == 1) {
		AddOK = '<div class="i25 i-small addlist" id="playlist_'+song_id+'"><a title="Th??m v??o" class="fn-addto" data-item="#song'+song_id+'" style="cursor:pointer;" onclick="_load_box('+song_id+');"></a></div>';
		$('#playlist_'+song_id).html(AddOK);
	}
	if(type == 2)  {
		AddOK = '<a href="javascript:;" onclick="ADDFAV('+song_id+',2);" class="button-style-1 pull-left fn-add _trackLink" > <i class="zicon icon-add"> </i> <span>Th??m v??o</span> </a>';
		$('#Load_Album_'+song_id).html(AddOK);
	}
	if(type == 3)  {
		AddOK = '<a href="javascript:;" onclick="ADDFAV('+song_id+',3);" class="button-style-1 pull-left fn-add _trackLink" > <i class="zicon icon-add"> </i> <span>Th??m v??o</span> </a>';
		$('#Load_Video_'+song_id).html(AddOK);
	}
		if(type == 4)  {
		AddOK = '<i class="button-follow fn-follow " onclick="ADDFAV('+song_id+',4);" data-type="artist"></i>';
		$('#Load_Singer_'+song_id).html(AddOK);
	}
}
function UNFAV(add_id,type) {
		if(LoginMLV == 'NO') {
		Login_Box();
	}else {
		jQuery.ajax({
				 type:"POST",
				 url:"script-ajax-mlv.php",
				 data:"UNFAV=1&add_id="+add_id+"&type="+type,
				 success:function(html){
					if(type == '1') {
							$.notify('X??a b??i h??t kh???i y??u th??ch th??nh c??ng.', 'error');
						 }
					else if (type == '2') {	
							$.notify('X??a playlist kh???i y??u th??ch c???a b???n th??nh c??ng.', 'success');
						 }
					else if (type == '3') {	
							$.notify('X??a video kh???i danh s??ch y??u th??ch th??nh c??ng.', 'success');
						 }
					else if (type == '4') {	
							$.notify('X??a ngh??? s?? kh???i danh s??ch quan t??m th??nh c??ng.', 'success');
						 }
					 }
			});
		if(type == 1) GETOKIUNFAV(add_id,1);
		if(type == 2) GETOKIUNFAV(add_id,2);
		if(type == 3) GETOKIUNFAV(add_id,3);
		if(type == 4) { GETOKIUNFAV(add_id,4); GETOKISINGERUN(add_id,4);}
}
}
function THEMPLAYLIST(add_id,bh_id) {
		jQuery.ajax({
				 type:"POST",
				 url:"script-ajax-mlv.php",
				 data:"ADDPLAYLIST=1&add_id="+add_id+"&bh_id="+bh_id,
				 success:function(html){
					$.notify('Th??m b??i h??t v??o playlist th??nh c??ng.', 'success');

					 }
			});
		GETOKI(bh_id,1);
}

function _lstPlsAdd(bh_id) {
	add_id 		= encodeURIComponent(document.getElementById("_lstPls").value);
	if(add_id == "") {
		 $.notify('B???n ch??a c?? playlist n??o vui l??ng t???o m???t playlist m???i.', 'error');
	}else {
		 $.notify('Th??m b??i h??t v??o playlist th??nh c??ng.', 'success');
	}
}

function AddFAVAlbum(add_id) {
	if(LoginMLV == 'NO') {
		Login_Box();
	}else {
		jQuery.ajax({
				 type:"POST",
				 url:"script-ajax-mlv.php",
				 data:"AddFAVAlbum=1&add_id="+add_id,
				 success:function(html){
						 if(html == 'no') {
							$.notify('B???n ???? th??m v??o danh s??ch y??u th??ch', 'error');
						 }else {
							AddFAV(add_id,2);	
							$.notify('???? th??m playlist v??o danh s??ch Y??u th??ch th??nh c??ng.', 'success');
						 }
					 }
			});
	}
}
function AddFAVVideo(add_id) {
	if(LoginMLV == 'NO') {
		Login_Box();
	}else {
		jQuery.ajax({
				 type:"POST",
				 url:"script-ajax-mlv.php",
				 data:"AddFAVVideo=1&add_id="+add_id,
				 success:function(html){
						 if(html == 'no') {
						 	$.notify('???? c?? trong danh s??ch y??u th??ch', 'error');
						 }else {
							AddFAV(add_id,3);	
							$.notify('???? th??m Video v??o danh s??ch Y??u th??ch th??nh c??ng.', 'success');
						 }
					 }
			});
	}
}
function ADDFAVSinger(add_id,type) {
	if(LoginMLV == 'NO') {
		Login_Box();
	}else {
		jQuery.ajax({
				 type:"POST",
				 url:"script-ajax-mlv.php",
				 data:"liked=1&add_id="+add_id+"&type="+type,
				 success:function(html){
						$('#Singer_'+add_id).html("<b onclick=\"UNFAVSinger('+add_id+',4);\" class=\"zicon xicon fn-rmitem\" title=\"X??a\"></b>");
					 }
			});
		if(type == 4) GETOKILIKE(add_id,4,viewed);
	}
}
function UNFAVSinger(add_id,type) {
	if(LoginMLV == 'NO') {
		Login_Box();
	}else {
		jQuery.ajax({
				 type:"POST",
				 url:"script-ajax-mlv.php",
				 data:"unliked=1&add_id="+add_id+"&type="+type,
				 success:function(html){
							$('#Singer_'+add_id).html("<b onclick=\"ADDFAVSinger('+add_id+',4);\" class=\"zicon addicon fn-follow\" title=\"Quan t??m\"></b>");
					 }
			});
	if(type == 4) GETOKILIKE(add_id,4,viewed);
	}
}
function xSongAlbum(album_id,remove_id) {
				 var order = "xSongAlbum=1&album_id="+album_id+'&remove_id='+remove_id;
				 $.post("update-album.php", order, function(theResponse){
						 	$('#LoadSongAlbum').html(theResponse);
						 });
}
function xSongFAV(user_id,remove_id) {
		if(LoginMLV == 'NO') {
		Login_Box();
	}else {
				 var order = "xSongFAV=1&user_id="+user_id+'&remove_id='+remove_id;
				 $.post("./process/song_fav.php", order, function(html){
						 	$('#Load_FAV_Song').html(html);
							 $.notify('X??a b??i h??t kh???i y??u th??ch th??nh c??ng.', 'success');
						 });
		}
}
function xVideoFAV(user_id,remove_id) {
		if(LoginMLV == 'NO') {
		Login_Box();
	}else {
				 var order = "xVideoFAV=1&user_id="+user_id+'&remove_id='+remove_id;
				 $.post("./process/video_fav.php", order, function(html){
						 	$('#Load_FAV_Video').html(html);
							 $.notify('X??a MV kh???i y??u th??ch th??nh c??ng.', 'success');
						 });
		}
}
function xAlbumFAV(user_id,remove_id) {
		if(LoginMLV == 'NO') {
		Login_Box();
	}else {
				 var order = "xAlbumFAV=1&user_id="+user_id+'&remove_id='+remove_id;
				 $.post("./process/album_fav.php", order, function(html){
						 	$('#Load_FAV_Album').html(html);
							 $.notify('X??a Album kh???i y??u th??ch th??nh c??ng.', 'success');
						 });
		}
}
function xArtistFollowing(user_id,remove_id) {
		if(LoginMLV == 'NO') {
		Login_Box();
	}else {
				 var order = "xArtistFollowing=1&user_id="+user_id+'&remove_id='+remove_id;
				 $.post("./process/artist_following.php", order, function(html){
						 	$('#Load_Singer_Following').html(html);
							 $.notify('X??a ngh??? s?? kh???i danh s??ch quan t??m th??nh c??ng.', 'success');
						 });
		}
}
function xMyAlbum(album_id) {
		if(LoginMLV == 'NO') {
		Login_Box();
	}else {
				 var order = "xMyAlbum=1&album_id="+album_id;
				 $.post("./process/myplaylist.php", order, function(html){
						 	$('#Load_My_Playlist').html(html);
							 $.notify('X??a Playlist th??nh c??ng.', 'success');
						 });
		}
}
function SendError() {
	if(LoginMLV == 'NO') {
		Login_Box();
	}else {
		media_id 	= encodeURIComponent(document.getElementById("media_id").value);
		drlReason 	= encodeURIComponent(document.getElementById("drlReason").value);
		type 		= encodeURIComponent(document.getElementById("type").value);
		errortxt	=	drlReason;
		if(drlReason == 0) {
				$.notify('B???n ch??a ch???n n???i dung b??o l???i.', 'error');
				return false;
		}
		if(drlReason == 1) {
				errortxt  = 	encodeURIComponent(document.getElementById("txtContent").value);			
		}
		
		if(errortxt=="") {
				  $.notify('B???n ch??a nh???p n???i dung b??o l???i.', 'error');
				return false;
		}
		
		else {
					jQuery.ajax({
							 type:"POST",
							 url:"script-ajax-mlv.php",
							 data:"SendError=1&media_id="+media_id+"&errortxt="+errortxt+"&type="+type,
							 success:function(html){
								 if(html == 1) {
									  $.notify('N???i dung c???a b???n ch???a nhi???u h??n 250 k?? t???.', 'error');
									 }
								 if(html == 2) {
								 $.notify('C??m ??n b???n ???? quan t??m v?? s??? d???ng M Live. M???i ?? ki???n ????ng g??p c???a b???n s??? ???????c BQT M Live ti???p nh???n v?? gi???i quy???t trong th???i gian s???m nh???t.', 'success');

								 }
								 }
						});
		}

	}
	
	
}

function eventPlayerZing(nameEvent, messegeEvent) {
	switch(nameEvent)
	{
		case 'zoomSizeOn':
			if ($.cookie('zoom') == 1) {
				$('#v_load_x1').removeClass('player_fjx');
				$('#m_3').removeClass('fjx_margin');
				$.cookie('zoom',0);
			}else {
				$('#v_load_x1').addClass('player_fjx');
				$('#m_3').addClass('fjx_margin');
				$.cookie('zoom',1);
			}
			break;
		case 'zoomSizeOff':
			$('#v_load_x1').removeClass('player_fjx');
			$('#v_load_x2').removeClass('fjx_margin');
			break;
		case 'nextButton':
		case 'prevButton':
			$('#playlistItems').children('ul').children('li').each(function(){$(this).removeClass('playing fn-current');});
			$('#song'+messegeEvent).addClass('playing fn-current');			
			break;
	}
}

function SINGERSHOWHIDE() {
	$('#singer_info').slideToggle(0);
	ID = document.getElementById('singer_info');
	if (ID.style.display == "block") {
		$('#singer_txt').html('???n th??ng tin');
	}else {
		$('#singer_txt').html('Xem th??ng tin');	
	}
}

function LYRICSHOWHIDE(show) {
	if(show == 1) {
		$('#lyric_load').css({ height: 'auto' });
		$('.iLyric').html('<a href="javascript:;" onclick="LYRICSHOWHIDE(0);" class="ml0 pull-left fn-expand">R??t g???n</a>');
	}else {
		$('#lyric_load').css({ height: '300px' });
		$('.iLyric').html('<a href="javascript:;" onclick="LYRICSHOWHIDE(1);" class="ml0 pull-left fn-expand" >Xem th??m</a>');
	}	
}

// Show and Hide 
function showComm(e){document.getElementById(e)&&("none"!=document.getElementById(e+"-show").style.display?(document.getElementById(e+"-show").style.display="none",document.getElementById(e).style.display="block"):(document.getElementById(e+"-show").style.display="block",document.getElementById(e).style.display="none"))};
function showCommalbum(e){document.getElementById(e)&&("none"!=document.getElementById(e+"-show").style.display?(document.getElementById(e+"-show").style.display="none",document.getElementById(e).style.display="block"):(document.getElementById(e+"-show").style.display="block",document.getElementById(e).style.display="none"))};

function GETOKILIKE(song_id,type,viewed) {
	if(type == 1) {
		AddOK = '<a class="fn-btn" href="javascript:;" onclick="UNLIKE('+song_id+',1,'+viewed+');"><span class="zicon"></span>B??? Th??ch</a><span><i></i><b></b><s class="fn-count">'+viewed+'</s></span>';
		$('#Load_Like_'+song_id).html(AddOK);
	}
		if(type == 2) {
		AddOK = '<a class="fn-btn" href="javascript:;" onclick="UNLIKE('+song_id+',2,'+viewed+');"><span class="zicon"></span>B??? Th??ch</a><span><i></i><b></b><s class="fn-count">'+viewed+'</s></span>';
		$('#Load_LikeAlbum_'+song_id).html(AddOK);
	}
	if(type == 3) {
		AddOK = '<a class="fn-btn" href="javascript:;" onclick="UNLIKE('+song_id+',3,'+viewed+');"><span class="zicon"></span>B??? Th??ch</a><span><i></i><b></b><s class="fn-count">'+viewed+'</s></span>';
		$('#Load_LikeVideo_'+song_id).html(AddOK);
	}
	if(type == 4) {
		AddOK = '<a href="javascript:;"  onclick="UNLIKE('+song_id+',4,'+viewed+');" class="fn-follow _trackLink active" tracking="_frombox=play_artistfollow"  ><span></span>Quan t??m</a><span><i></i><b></b><s class="fn-followed" >'+viewed+'</s></span>';
		$('#Load_LikeSinger_'+song_id).html(AddOK);
	}
}
function ADDLIKE(add_id,type,viewed) {
		if(LoginMLV == 'NO') {
		Login_Box();
	}else {
		jQuery.ajax({
				 type:"POST",
				 url:"script-ajax-mlv.php",
				 data:"liked=1&add_id="+add_id+"&type="+type,
				 success:function(html){
					 if(type == '4') {
						 $.notify('Th??m ngh??? s?? v??o danh s??ch quan t??m th??nh c??ng.', 'success');
					 } else {
					 $.notify('???? th??ch th??nh c??ng.', 'success');
					}
					 }
			});
		if(type == 1) GETOKILIKE(add_id,1,viewed);
		if(type == 2) GETOKILIKE(add_id,2,viewed);
		if(type == 3) GETOKILIKE(add_id,3,viewed);
		if(type == 4) GETOKILIKE(add_id,4,viewed);
}
}
function GETOKIUNLIKE(song_id,type,viewed) {
	if(type == 1) {
		AddOK = '<a class="fn-btn" href="javascript:;" onclick="ADDLIKE('+song_id+',1,'+viewed+');" ><span class="zicon"></span>Th??ch</a><span><i></i><b></b><s class="fn-count">'+viewed+'</s></span>';
		$('#Load_Like_'+song_id).html(AddOK);
	}
if(type == 2) {
		AddOK = '<a class="fn-btn" href="javascript:;" onclick="ADDLIKE('+song_id+',2,'+viewed+');" ><span class="zicon"></span>Th??ch</a><span><i></i><b></b><s class="fn-count">'+viewed+'</s></span>';
		$('#Load_LikeAlbum_'+song_id).html(AddOK);
	}
	if(type == 3) {
		AddOK = '<a class="fn-btn" href="javascript:;" onclick="ADDLIKE('+song_id+',3,'+viewed+');" ><span class="zicon"></span>Th??ch</a><span><i></i><b></b><s class="fn-count">'+viewed+'</s></span>';
		$('#Load_LikeVideo_'+song_id).html(AddOK);
	}
		if(type == 4) {
		AddOK = '<a href="javascript:;"  onclick="ADDLIKE('+song_id+',4,'+viewed+');" class="fn-follow _trackLink" tracking="_frombox=play_artistfollow"  ><span></span>Quan t??m</a><span><i></i><b></b><s class="fn-followed" >'+viewed+'</s></span>';
		$('#Load_LikeSinger_'+song_id).html(AddOK);
	}
}
function UNLIKE(add_id,type,viewed) {
		if(LoginMLV == 'NO') {
		Login_Box();
	}else {
		jQuery.ajax({
				 type:"POST",
				 url:"script-ajax-mlv.php",
				 data:"unliked=1&add_id="+add_id+"&type="+type,
				 success:function(html){
					 if(type == '4') {
						 $.notify('X??a ngh??? s?? kh???i danh s??ch quan t??m th??nh c??ng.', 'success');
					 } else {
					  $.notify('???? b??? th??ch th??nh c??ng.', 'success');
					 }
					 }
			});
		if(type == 1) GETOKIUNLIKE(add_id,1,viewed);
		if(type == 2) GETOKIUNLIKE(add_id,2,viewed);
		if(type == 3) GETOKIUNLIKE(add_id,3,viewed);
		if(type == 4) GETOKIUNLIKE(add_id,4,viewed);
}
}