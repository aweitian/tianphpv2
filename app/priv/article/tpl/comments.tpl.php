<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
/**
 * 
 * @var pmcaiUrl $url
 */
$req = new httpRequest();
$url  = new pmcaiUrl($req->requestUri());
$pageSize = $data["pageSize"];
$pageBtnLen = $data["pageBtnLen"];
$curPageNum = $data["curPageNum"];
$cnt  = $data["ori"]->info;
$data = $data["ori"]->return;

$pagination = new pagination($cnt, $curPageNum, $pageSize, $pageBtnLen);

?>
<script src="<?php print HTTP_ENTRY?>/static/bower_components/smalot-bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/smalot-bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css">

<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">文章评论列表</h3>
                   
                </div><!-- /.box-header -->
                <div class="box-body">
                	<a class="btn bg-olive btn-flat margin" href="<?php print HTTP_ENTRY?>/priv/article/addcomment?aid=<?php print $_REQUEST["sid"]?>">
                	 <i class="fa fa-plus"></i> 添加评论
                	 </a>
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>用户</th>
                      <th>评论</th>
                      <th>验证</th>
                      <th>日期</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td><?php print $item["name"]?></td>
                      <td><?php print $item["comment"]?></td>
                      <td><span class="<?php if( $item["verify"] == "1" ):?>text-green<?php else:?>text-muted<?php endif;?>"><?php print $item["verify"] == "1" ? "已" : "未"?>验证</span></td>
                      <td><?php print $item["datetime"]?></td>
                      
                      <td>
                      	<!-- <i class="fa fa-edit"></i> -->
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/article/editcomment?sid=<?php print $item["sid"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/article/rmcomment?sid=<?php print $item["sid"]?>">删除</a>
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/article/vercomment?sid=<?php print $item["sid"]?>"><?php if( $item["verify"] == "1" ):?><i class="glyphicon glyphicon-remove"></i> 取消<?php else:?><i class="glyphicon glyphicon-ok"></i> 通过<?php endif;?>验证</a>
                        
                      </td>
                    </tr>
                    
                    
                    <?php endforeach;?>
                    
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
 
 
 
                  <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    <?php if($pagination->hasPre()):?>
                      <li><a href="<?php print $url->setQuery("page", $pagination->getPre())->getUrl();?>">&laquo;</a></li>
                      <?php endif;?>
                      
                      <?php for($i=0;$i<$pagination->getMaxPage();$i++):?>
                      <li><a href="<?php print $url->setQuery("page", $pagination->getStartPage() + $i)->getUrl()?>"><?php print $pagination->getStartPage() + $i?></a></li>
                      <?php endfor;?>
                      <?php if($pagination->hasNext()):?>
                      <li><a href="<?php print $url->setQuery("page", $pagination->getNext())->getUrl()?>">&raquo;</a></li>
                      <?php endif;?>
                    </ul>
                  </div>
 
 
 
 
 
                </div>
              </div><!-- /.box -->


</section>
<script>
$(".btn-danger").click(function(){

	return confirm("?");
});

</script>

