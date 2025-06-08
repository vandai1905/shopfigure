
  <div class="content">
    	<div class="content_left">
        	<?php
				include('modules/left/list_pro.php');
			?>
        </div>
        
        <div class="content_right">
        	<?php
			if(isset($_GET['xem'])){
				$tam=$_GET['xem'];
			}else{
				$tam='';
				}
				if($tam=='chitiet'){
				include('modules/right/chitiet_sanpham.php');
			}else if($tam=='loai'){
				include('modules/right/game.php');
			}else if($tam=='hieu'){
				include('modules/right/nhanvat.php');
			}else if($tam=='cart'){
				include('modules/right/your_cart.php');
			}elseif($tam=='tintuc'){
				include('modules/right/tin_tuc.php');
			}elseif($tam=='chitiettintuc'){
				include('modules/right/chitiet_tintuc.php');
			}elseif($tam=='video'){
				include('modules/right/video.php');
			}elseif($tam=='playvideo'){
				include('modules/right/playvideo.php');
			
			}else if($tam=='trangchu'){
				include('modules/right/product.php');
			}else if($tam=='ketqua'){
				include('modules/right/ketqua.php');
			}elseif($tam=='taikhoan'){
				include('modules/right/taikhoan.php');
			}elseif($tam=='contact'){
				include('modules/right/contact.php');
			}elseif($tam=='dangky'){
				include('modules/right/dangky.php');
			}elseif($tam=='camon'){
				include('modules/right/cam_on.php');
			
			}elseif($tam=='huongdan'){
				include('modules/right/huongdanmuahang.php');
			}else
					include('modules/right/product.php');
				
			?>
        </div>
    </div>
    <div class="clear"></div>