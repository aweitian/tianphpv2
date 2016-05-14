<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
$err = $data["err"];
$data = $data["data"];



?>
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
                      <th>职位名称</th>
                      <th>缩略图</th>
                      <th>消耗积分</th>
                      <th>爱心点数</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td><?php print $item["data"]?></td>
                      <td><img width="40" height="40" src="<?php print HTTP_ENTRY?>/static/present/<?php print $item["avatar"]?>"></td>
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




<script>



$(".btn-danger").click(function(){

	return confirm("?");
});

</script>

