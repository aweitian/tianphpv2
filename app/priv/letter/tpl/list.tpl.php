<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
$err = $data["err"];
$data = $data["data"];

// var_dump($data);exit;

?>
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/lightbox2/dist/css/lightbox.min.css">
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/jqnotifybar/css/jquery.notifyBar.css">
<script type="text/javascript" src="<?php print HTTP_ENTRY?>/static/bower_components/lightbox2/dist/js/lightbox.min.js"></script>
<script type="text/javascript" src="<?php print HTTP_ENTRY?>/static/bower_components/jqnotifybar/jquery.notifyBar.js"></script>

<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">感谢信列表</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				<a href="<?php print HTTP_ENTRY;?>/priv/letter/add" class="btn bg-olive btn-flat margin">
					<i class="fa fa-plus"></i> 添加
				</a>
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>用户</th>
                      <th>医生</th>
                      <th>病种</th>
                      <th>是否通过验证</th>
                      <th>感谢信内容</th>
                      <th>时间</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td><?php print $item["username"]?></td>
                      <td><?php print $item["docname"]?></td>
                      <td><?php print $item["data"]?></td>
                      <td><?php if( $item["verify"] == "1" ):?>已通过<?php else:?>侍审核<?php endif;?></td>
                      <td><?php print $item["content"]?></td>
                      <td><?php print $item["date"]?></td>
                      <td>
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/letter/edit?sid=<?php print $item["sid"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/letter/rm?sid=<?php print $item["sid"]?>">删除</a>
                      	<a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/letter/verify?sid=<?php print $item["sid"]?>"><?php if( $item["verify"] == "1" ):?><i class="glyphicon glyphicon-remove"></i> 取消<?php else:?><i class="glyphicon glyphicon-ok"></i> 通过<?php endif;?>验证</a>
                        
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


</script>

