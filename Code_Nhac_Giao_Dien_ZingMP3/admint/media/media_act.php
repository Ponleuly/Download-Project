		 <section class="content">          <div class="row">            <div class="col-md-12">           <div class="box box-danger">                              <div class="box-header">                  <h3 class="box-title">Thêm<small>/Sửa Media</small></h3>                  <!-- tools box -->                  <div class="pull-right box-tools">                    <button class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>                  </div><!-- /. tools -->                </div><!-- /.box-header -->                <div class="box-body pad">				 <form action="<?=$action;?>" method="post" enctype="multipart/form-data" >                <div class="box-body">					<button type="submit" name="submit" class="btn btn-info pull-right">ĐỒNG Ý</button>				<div class="form-group has-success">                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Tên</label>					  <input type="text" name="song" placeholder="Tên Media" value="<?php  echo un_htmlchars($arrz[0][1]);?>" class="form-control" id="inputSuccess">					  </div>				<div class="form-group has-success">                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Ca Sĩ:</label>				 	 <b> <?=GetSingerNameAdmin($arrz[0][2]);?></b> <?=them_moi_singer_form();?> 					</div>				<div class="form-group has-success">                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Sáng Tác</label>					<input type="text" name="sangtac"  placeholder="Nhập tên tác giả" value="<?php  echo $arrz[0][9];?>" class="form-control">						</div>							<div class="form-group has-success">                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Link MEDIA</label>                    <input type="text" name="url" placeholder="Nhập Link MEDIA" value="<?php  echo $arrz[0][4];?>" class="form-control">                  </div>					<div class="form-group has-success">                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Thể loại</label><br/>				<?=acp_cat($arrz[0][3]);?>                  </div><br/><br/><br/><br/><br/><br/>							   <div class="form-group has-success">                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Định Dạng MEDIA</label>				 <?=acp_type($arrz[0][8]);?> <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Server MEDIA</label>				 <?=acp_server($arrz[0][6])?>                  </div>				   <div class="form-group has-success">                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i>HÌNH ẢNH CHO VIDEO</label>					<input type="file" name="img" size=50> <br/>					<div class="input-group">                     <span class="input-group-addon"> <input type="checkbox" name="grab_img"></span>                        <div class="form-control">IMG (Youtube, Zing Video) [ <?php  echo $arrz[0][5];?> ]</div>                    <span class="input-group-addon"><i class="fa fa-picture-o"></i></span>                  </div><!-- /input-group -->				  </div>					<div class="input-group">                    <div class="input-group-btn">                      <button type="button" class="btn btn-danger"><i class="fa fa-picture-o"></i></button>                    </div><!-- /btn-group -->                   <input name="img" type="text" placeholder="Nhập Link Ảnh VIDEO" value="<?php echo $arrz[0][5];?>" class="form-control">					                  </div><!-- /input-group -->				  <br/>							<div class="form-group has-success">                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> Link Lời Nhạc Động LRC Karaoke</label>                    <input type="text" name="lrc" placeholder="Nhập Link URL" value="<?php  echo $arrz[0][12];?>" class="form-control">                  </div>				  	<div class="form-group has-success">                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> ID Album bằng Số ID</label>                    <input type="text" name="id_album" placeholder="Số ID MV" value="<?php  echo $arrz[0][14];?>" class="form-control">                  </div>				  		<div class="form-group has-success">                      <label class="control-label" for="inputSuccess"><i class="fa fa-check"></i> ID OFFICIAL bằng Số ID</label>                    <input type="text" name="official" placeholder="Số ID MV" value="<?php  echo $arrz[0][13];?>" class="form-control">                  </div>				   <div class="form-group has-warning">                     <label class="control-label" for="inputWarning"><i class="fa fa-bell-o"></i> Lời nhạc:</label>			<textarea class="form-control" rows="3" placeholder="Nhập Lời Nhạc ..." name="lyric"><?=un_htmlchars($arrz[0][7]);?></textarea>                    </div>                   	<div class="box-footer">                    <button type="submit" name="submit" class="btn btn-primary">ĐỒNG Ý</button>					<button type="submit" type="reset" class="btn btn-default">Nhập Lại</button>                  </div>				  </form>				   </div> <!-- /box-body -->				   </div> <!-- /box box-danger -->				   
</div></div></div></section>