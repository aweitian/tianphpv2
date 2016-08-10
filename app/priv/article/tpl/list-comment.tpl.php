<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
// var_dump($data);exit;
$q  = $data["q"];
/**
 * 
 * @var pmcaiUrl $url
 */
$req = new httpRequest();
$url  = new pmcaiUrl($req->requestUri());
$cnt  = $data["ori"]->info;
$pageSize = $data["pageSize"];
$pageBtnLen = $data["pageBtnLen"];
$curPageNum = $data["curPageNum"];
$data = $data["ori"]->return;

$pagination = new pagination($cnt, $curPageNum, $pageSize, $pageBtnLen);
if(is_null($q)){
	$q = "";
}
?>
<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">文章列表</h3>
                   
                   
                   <div class="box-tools">
                   <form action="<?php print HTTP_ENTRY?>/priv/article/comment">
                    <div class="input-group" style="width: 256px;">
                    
                      <input name="q" value="<?php print $q?>" type="text" name="table_search" class="form-control input-sm pull-right" placeholder="输入标题查询">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                      
                    </div>
                    </form>
                  </div>
                   
                   
                   
                </div><!-- /.box-header -->
                <div class="box-body">
                <a class="btn bg-olive btn-flat margin" href="<?php print HTTP_ENTRY?>/priv/article/add">
                	 <i class="fa fa-plus"></i> 添加文章
                	 </a>
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>标题</th>
                      <th>评论数</th>
                      <th>日期</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td><?php print $item["title"]?></td>
                      <td><?php print $item["cnt"]?></td>
                      <td><?php print AppFilter::filterOut($item["date"]) ?></td>
                      
                      <td>
                      	<!-- <i class="fa fa-edit"></i> -->
                      	<?php if($item["cnt"] > 0):?>
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/article/commentlist?sid=<?php print $item["sid"]?>"><i class="glyphicon glyphicon-eye-open"></i> 查看甩有评论</a>
                        <?php else:?>
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/article/addcomment?aid=<?php print $item["sid"]?>"><i class="glyphicon glyphicon glyphicon-plus"></i> 添加评论</a>
                        <?php endif;?>
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

