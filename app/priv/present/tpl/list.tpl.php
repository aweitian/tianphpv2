<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
$err = $data["err"];
$data = $data["data"];



?>
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/lightbox2/dist/css/lightbox.min.css">
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/jqnotifybar/css/jquery.notifyBar.css">
<script type="text/javascript" src="<?php print HTTP_ENTRY?>/static/bower_components/lightbox2/dist/js/lightbox.min.js"></script>
<script type="text/javascript" src="<?php print HTTP_ENTRY?>/static/bower_components/jqnotifybar/jquery.notifyBar.js"></script>

<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">礼物列表</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<a href="<?php print HTTP_ENTRY;?>/priv/present/add" class="btn bg-olive btn-flat margin">
                	 <i class="fa fa-plus"></i> 添加
                	 </a>
                	 
                        
                
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>礼物名称</th>
                      <th>缩略图</th>
                      <th>消耗积分</th>
                      <th>爱心点数</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td><?php print $item["data"]?></td>
                      <td>
                      	<a href="<?php print AppUrl::getMediaPath()?>/present/<?php print $item["avatar"]?>" data-lightbox="present" data-title="<?php print $item["data"]?>">
                      	<img width="40" height="40" src="<?php print AppUrl::getMediaPath()?>/present/<?php print $item["avatar"]?>">
                      	</a>
                      
                      </td>
                      <td><?php print $item["cost"]?></td>
                      <td><?php print $item["ben"]?></td>
                      <td>
                      	<!-- <i class="fa fa-edit"></i> -->
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/present/edit?sid=<?php print $item["sid"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/present/rm?sid=<?php print $item["sid"]?>">删除</a>
                        
                      </td>
                    </tr>
                    
                    
                    <?php endforeach;?>
                    
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
 
                </div>
              </div><!-- /.box -->


</section>


<style>
<!--
.jquery-notify-bar{
	width:256px;
	left:50%;
	margin-left:-128px;
}
-->
</style>

<script>



$(".btn-danger").click(function(){

	return confirm("?");
});



<?php if(!is_null($from) && $from == "frpw"):?>
jQuery(function () {
  jQuery.notifyBar({
    html: "<?php print $msg?>",
    delay: 2000,
    cssClass: <?php if(!is_null($r) && $r == 1):?>"success"<?php else:?>"error"<?php endif?>,
    animationSpeed: "normal"
  });  
});
<?php endif;?>
</script>

