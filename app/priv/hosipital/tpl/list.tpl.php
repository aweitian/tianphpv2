<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */

// var_dump($data);exit;
// $data = $data->return;
?>




<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">文章标签</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				<a href="<?php print HTTP_ENTRY;?>/priv/tags/add" class="btn bg-olive btn-flat margin">
					<i class="fa fa-plus"></i> 添加
				</a>
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                     <th>医院名</th>
                      <th>医院距离</th>
                      <th>医院热度</th>
                      <th>最牛专家</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                     <tr>
                      <td><?php print $item["sid"]?></td>
                      <td><?php print $item["name"]?></td>
                      <td><?php print $item["dis"]?></td>
                      <td><?php print $item["hot"]?></td>
                      <td><?php print $item["expert"]?></td>
  
                      <td>
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/hosipital/edit?sid=<?php print $item["sid"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/hosipital/rm?sid=<?php print $item["sid"]?>">删除</a>
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/hosipital_filterset/?hid=<?php print $item["sid"]?>"> 集合条件管理</a>
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
	return confirm("Sihangzhang友情提醒:是否要删除？");
});


</script>

