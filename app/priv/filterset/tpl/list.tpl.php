<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */

$msg  = $data["msg"];
$model = $data["model"];
$pid = 0;
$depth = 0;
if(isset($msg["?pid"]))
{
	$pid = $msg["?pid"];
}

if($pid > 0)
{
	//因为求的是PID的DEPTH。
	$depth = $model->getDepth($pid)->return + 1;
}


$mid = $msg["?mid"];
$data = $model->getChildren($pid,$mid)->return;
$path = $model->path($pid,$mid);



$str_path = "<ul class='breadcrumb'>";
$str_path .= '<li><a href="'.HTTP_ENTRY.'/priv/filterset?pid=0&mid='.$mid.'">根目录</a></li>';
foreach($path as $p)
{
	$str_path .= '<li><a href="'.HTTP_ENTRY.'/priv/filterset?pid='.$p["pid"].'&mid='.$mid.'">'.$p["pname"].'</a></li>';
}
$str_path .= "</ul>";

$meta = $model->getMetaData($_REQUEST["mid"]);
// var_dump();exit;
//这个地方要获取节点所在路径的最大长度来决定使用那个META组，
//每个META组用|分隔

$meta = explode(",", $meta->return["data"]);
// var_dump($depth);
$what = $depth < count($meta) ? $meta[$depth] : "***";
?>
<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $str_path?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	 <a class="btn bg-olive btn-flat margin" href="<?php print HTTP_ENTRY?>/priv/filterset/add?pid=<?php print $pid?>&mid=<?php print $mid?>">
                	 <i class="fa fa-plus"></i> 添加一个<?php print $what?>
                	 </a>
                        
                
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>栏目名称</th>
                      <th>URL路径</th>
                      <th>排序</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td>
	                      	<a href="<?php print HTTP_ENTRY?>/priv/filterset?pid=<?php print $item["sid"]?>&mid=<?php print $mid?>">
	                      	<?php print $item["name"]?>
	                      	</a>
                      </td>
                      <td><?php print $item["url"]?></td>
                      <td><?php print $item["ord"]?></td>
                      <td>
                      	<!-- <i class="fa fa-edit"></i> -->
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/filterset/add?pid=<?php print $item["sid"]?>">添加</a>
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/filterset/edit?sid=<?php print $item["sid"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/filterset/rm?sid=<?php print $item["sid"]?>">删除</a>
                        
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

