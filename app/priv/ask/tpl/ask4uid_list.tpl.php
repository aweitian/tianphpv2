<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */

/* ***************************************************
 ["sid"]=>
 string(1) "1"
 ["uid"]=>
 string(1) "2"
 ["name"]=>
 string(9) "李美龙"
 ["title"]=>
 string(6) "adfadf"
 ["did"]=>
 string(1) "2"
 ["data"]=>
 string(12) "前列腺炎"
 ["desc"]=>
 string(5) "asdfa"
 ["svr"]=>
 string(8) "dfadsfad"
 ["files"]=>
 string(13) "aa.jpg,qq.png"
 ["date"]=>
 string(19) "2016-05-24 00:00:00"
 *  */



$q  = $data["q"];
/**
 * 
 * @var pmcaiUrl $url
 */

$url  = $data["url"];
$cnt  = $data["cnt"];
$pageSize = $data["pageSize"];
$pageBtnLen = $data["pageBtnLen"];
$curPageNum = $data["curPageNum"];
$data = $data["data"];

$pagination = new pagination($cnt, $curPageNum, $pageSize, $pageBtnLen);
if(is_null($q)){
	$q = "";
}

?>
<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">问答列表</h3>
                   
                   
                   <div class="box-tools">
                   <form action="<?php print HTTP_ENTRY?>/priv/ask/usrec">
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
                      <th>医生</th>
                      <th>标题</th>
                      <th>病种</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td><?php print $item["name"]?></td>
                      <td><?php print $item["title"]?></td>
                      <td><?php print $item["data"]?></td>
                      
                      <td>
                      	
  						<a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/ask/edit?sid=<?php print $item["sid"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/ask/rm?sid=<?php print $item["sid"]?>">删除</a>
                      
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

