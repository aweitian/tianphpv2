<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
$path = $data["path"];
$pid  = $data["pid"];
$data = $data["data"]->return;



$str_path = "<ul class='breadcrumb'>";
$str_path .= '<li><a href="'.HTTP_ENTRY.'/priv/tree?pid=0">根目录</a></li>';
foreach($path as $p)
{
	$str_path .= '<li><a href="'.HTTP_ENTRY.'/priv/tree?pid='.$p["pid"].'">'.$p["pname"].'</a></li>';
}
$str_path .= "</ul>";

?>
<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title"><?php print $str_path?></h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	 <a class="btn bg-olive btn-flat margin" href="<?php print HTTP_ENTRY?>/priv/tree/add?pid=<?php print $pid?>">
                	 <i class="fa fa-plus"></i> 添加一个栏目
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
       
	                      	<a href="<?php print HTTP_ENTRY?>/priv/tree?pid=<?php print $item["sid"]?>">
	                      	<?php print $item["name"]?>
	                      	</a>
      
                  
                      </td>
                      <td><?php print $item["url"]?></td>
                      <td><?php print $item["order"]?></td>
                      <td>
                      	<!-- <i class="fa fa-edit"></i> -->
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/tree/add?pid=<?php print $item["sid"]?>">添加</a>
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/tree/edit?sid=<?php print $item["sid"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/tree/rm?sid=<?php print $item["sid"]?>">删除</a>
                        
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

