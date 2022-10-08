
		<div class="zcontent">                  
            <h1 class="title-section has-border-bottom">
               Thông tin <?=$arr[0][1];?>
                
            </h1>

                <div class="frm-edit-playlist">
                    <div class="avt-playlist fn-thumb" id="changeThumb"  data-flash-swf-url="/plugins/plupload/Moxie.swf">
                        <img height="180" width="180" src="<?php echo check_img($arr[0][7]);?>" alt="Việt Tổng Hợp" />
                        <input id="thumbnail" name="thumbnail" type="hidden" value="<?php echo check_img($arr[0][7]);?>" />
                        <input id="itemOrderChanged" name="itemOrderChanged" type="hidden" value="0" />
                        <a href="#" class="edit-zone"><span class="zicon icon-edit"></span></a>
                        <a id="uploadTmp" style="visibility: hidden;"></a>
                    </div>
                    <div class="form-input">
                        
                        <div class="form-control-inline col-12">
                            <label for="name">Tên Tài Khoản</label>
                           <li class="title-section"><?php echo $arr[0][1];?></li>
                        </div>
						<div class="form-control-inline col-12">
                            <label for="name">Ngày Tham Gia</label>
                           <li class="title-section"><?php echo date('d-m-Y',$arr[0][9]);?></li>
                        </div>
						<div class="form-control-inline col-12">
                            <label for="name">Email:</label>
                           <li class="title-section"><?php echo $arr[0][3];?></li>
                        </div>
                          <label for="name">Thông Tin Chi Tiết:</label>
                           <li class="title-section"><?php echo $arr[0][8];?></li>
                        </div>
                        
						</div>
						</div>

