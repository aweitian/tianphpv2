<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */

$msg  = $data["msg"];
$model = $data["model"];
$hid = intval($msg["?hid"]);
$data = $model->showDetail($hid)->return;

// var_dump($data);exit;
?>
<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">医院集合选中情况</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th>医院名称</th>
                      <th>集合名称</th>
                      <th>选中元素</th>
                      <th>操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                        <td><?php print $item["h_name"]?></td>
                      	<td><?php print $item["s_name"]?></td>
                      	<td>
                      	<?php if (!is_null($item["u_name"])):?>
                      	<?php print $item["u_name"];?>
                      	
                      	<?php else:?>
                      	
                      	<?php endif?>
                      	</td>
                      	
                      	<td>
                      		<?php if (!is_null($item["u_name"])):?>
                      		<a href="<?php print HTTP_ENTRY?>/priv/hosipital_filterset/rm?hid=<?php print $hid?>&m=<?php print $item["mid"]?>">删除</a>
                      		
                      		&nbsp; | &nbsp;
                      		
                      		<a href="<?php print HTTP_ENTRY?>/priv/hosipital_filterset/reassign?hid=<?php print $hid?>&m=<?php print $item["mid"]?>">编辑</a>
                      		
                      		<?php else:?>
                      	<a href="<?php print HTTP_ENTRY?>/priv/hosipital_filterset/assign?hid=<?php print $hid?>&m=<?php print $item["mid"]?>">分配属性</a>
                      		<?php endif?>
                      		
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

