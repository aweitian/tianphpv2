<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
/**
 * @var filterModel
 */

$model = $data["model"];
$info = $data["info"];
require_once FILE_SYSTEM_ENTRY . "/app/data/_meta/filterTypeMeta.php";

$data = $model->all();
if(!$data->isTrue())
{
	$this->showOpResult($info,"数据为空","");
	exit;
}
$data = $data->return;

$fields_name = filterTypeMeta::getData();
?>
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/lightbox2/dist/css/lightbox.min.css">
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/jqnotifybar/css/jquery.notifyBar.css">
<script type="text/javascript" src="<?php print HTTP_ENTRY?>/static/bower_components/lightbox2/dist/js/lightbox.min.js"></script>
<script type="text/javascript" src="<?php print HTTP_ENTRY?>/static/bower_components/jqnotifybar/jquery.notifyBar.js"></script>

<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">条件列表</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
				<a href="<?php print HTTP_ENTRY;?>/priv/filter/add" class="btn bg-olive btn-flat margin">
					<i class="fa fa-plus"></i> 添加
				</a>
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>类型</th>
                      <th>数据</th>
                      <th>是否可用</th>
                      <th>排序</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td><?php print $fields_name[$item["type"]]?></td>
                      <td><?php print $item["data"]?></td>
                      <td><?php if( $item["enabled"] == "1" ):?>可用<?php else:?>已禁用<?php endif;?></td>
                      <td><?php print $item["order"]?></td>
                      <td>
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/filter/edit?sid=<?php print $item["sid"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/filter/rm?sid=<?php print $item["sid"]?>">删除</a>
                      	<a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/filter/toggle?sid=<?php print $item["sid"]?>"><?php if( $item["enabled"] == "1" ):?><i class="glyphicon glyphicon-remove"></i> 禁用<?php else:?><i class="glyphicon glyphicon-ok"></i> 启用<?php endif;?></a>
                      	<a class="btn bg-olive" <?php if($item["type"] != "set"):?>disabled<?php else:?>href="<?php print HTTP_ENTRY?>/priv/filterset?mid=<?php print $item["sid"]?>"<?php endif?>>管理集合</a>
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

