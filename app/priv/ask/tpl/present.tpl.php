<?php
/**
 * Date: 2016年5月25日
 * Auth: Awei.tian
 * Desc:
 * 		
 */

//  var_dump($data);
 ?>
 
<section class="content">
<div class="row">

		<?php foreach ($data as $item):?>
        <div class="col-md-3">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"><?php print $item["data"]?></h3>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            
	            <div class="attachment-block clearfix">
	            	<img class="attachment-img" src="<?php print HTTP_ENTRY?>/static/present/<?php print $item["avatar"]?>" alt="User Avatar">
        
	                <div class="attachment-pushed">
	
	                  <div class="attachment-text">
	                  	<div style="margin-bottom:8px;"><span class="text-maroon"><?php print $item["cost"]?></span> 积分</div>
	                  	<div style="margin-bottom:8px;">医生爱心值<span class="text-maroon"> + <?php print $item["ben"]?></span></div>
	                  	<div style="margin-bottom:8px;">
	                  	<form method="post" action="<?php print HTTP_ENTRY?>/priv/ask/present">
	                  	<input type="hidden" name="askid" value="<?php print $_REQUEST["askid"]?>">
	                  	<input type="hidden" name="pid" value="<?php print $item["sid"]?>">
	                  	<input type="hidden" name="present" value="<?php print $item["avatar"]?>">
	                  	<input type="hidden" name="name" value="<?php print $item["data"]?>">
	                  	<button class="btn btn-sm bg-olive">赠送</button>
	                  	</form>
	                  	
	                  	
	                  	</div>
	                  </div>
	                  <!-- /.attachment-text -->
	                </div>
	                <!-- /.attachment-pushed -->
	              </div>
		              </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		<?php endforeach;?>
     
      </div>

</section>