<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
$q  = $data["q"];
/**
 * 
 * @var pmcaiUrl $url
 */
$oplnk = $data["oplnk"];

$req = new httpRequest();
$url  = new pmcaiUrl($req->requestUri());
$cnt  = $data["cnt"];
$pageSize = $data["pageSize"];
$pageBtnLen = $data["pageBtnLen"];
$curPageNum = $data["curPageNum"];
$data = $data["data"];

$pagination = new pagination($cnt, $curPageNum, $pageSize, $pageBtnLen);
if(is_null($q)){
	$q = "";
}

if($oplnk == "/priv/ask"){
	$optext = "<i class=\"fa fa-plus\"></i> 添加问题";
}else{
	$optext = "<i class=\"fa fa-mouse-pointer\"></i> 查询记录";
}

?>
<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">用户列表</h3>
                   
                   
                   <div class="box-tools">
                   <form action="<?php print HTTP_ENTRY?>/priv/ask/usr">
                    <div class="input-group" style="width: 256px;">
                    
                      <input name="q" value="<?php print $q?>" type="text" name="table_search" class="form-control input-sm pull-right" placeholder="邮箱/手机号/UID/昵称">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                      
                    </div>
                    </form>
                  </div>
                   
                   
                   
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>邮箱</th>
                      <th>昵称</th>
                      <th>手机</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td><?php print $item["email"]?></td>
                      <td><?php print $item["name"]?></td>
                      <td><?php print $item["phone"]?></td>
                      
                      <td>
                      	<!-- <i class="fa fa-edit"></i> -->
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?><?php print $oplnk?>?uid=<?php print $item["sid"]?>">
                        
                         		<?php print $optext?>
                         	</a>
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
                      
                      <?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
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

