<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
$path = $data["path"];
$meta = $data["meta"];
$maxl = $data["mxlv"];
$pid  = $data["pid"];
$data = $data["data"];

$str_path = "<ul class='breadcrumb'>";
for($i=0;$i<count($path);$i++){
	$str_path .= '<li><a href="'.HTTP_ENTRY.'/priv/disease?pid='.$path[$i][0].'">'.$path[$i][1].'</a></li>';
}
$str_path .= "</ul>";

function isEnableAddSub($lv,$maxl){
	return $lv < $maxl - 1;
}

?>
<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $str_path?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	 <a class="btn bg-olive btn-flat margin" href="<?php print HTTP_ENTRY?>/priv/disease/add?pid=<?php print $pid?>">
                	 <i class="fa fa-plus"></i> 添加一个<?php print $meta?>
                	 </a>
                        
                
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th><?php print $meta?></th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td>
                      	<?php if(isEnableAddSub($item["level"],$maxl)):?>
	                      	<a href="<?php print HTTP_ENTRY?>/priv/disease?pid=<?php print $item["sid"]?>">
	                      	<?php print $item["data"]?>
	                      	</a>
                      	<?php else:?>
                      		<?php print $item["data"]?>
                      	<?php endif?>
                      </td>
                      <td>
                      	<!-- <i class="fa fa-edit"></i> -->
                      	<?php if(isEnableAddSub($item["level"],$maxl)):?>
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/disease/add?pid=<?php print $item["sid"]?>">添加</a>
                        <?php endif?>
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/disease/edit?sid=<?php print $item["sid"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/disease/rm?sid=<?php print $item["sid"]?>">删除</a>
                        
                      </td>
                    </tr>
                    
                    
                    <?php endforeach;?>
                    
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
 
                </div>
              </div><!-- /.box -->


</section>
<script>
$(".btn-danger").click(function(){

	return confirm("?");
});

</script>

