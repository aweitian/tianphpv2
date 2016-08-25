<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */

/*
 * **************************************************
 * ["sid"]=>
 * string(1) "1"
 * ["uid"]=>
 * string(1) "2"
 * ["name"]=>
 * string(9) "李美龙"
 * ["title"]=>
 * string(6) "adfadf"
 * ["did"]=>
 * string(1) "2"
 * ["data"]=>
 * string(12) "前列腺炎"
 * ["desc"]=>
 * string(5) "asdfa"
 * ["svr"]=>
 * string(8) "dfadsfad"
 * ["files"]=>
 * string(13) "aa.jpg,qq.png"
 * ["date"]=>
 * string(19) "2016-05-24 00:00:00"
 */
$q = $data ["q"];
/**
 *
 * @var pmcaiUrl $url
 */

$req = new httpRequest ();
$url = new pmcaiUrl ( $req->requestUri () );
$cnt = $data ["cnt"];
$pageSize = $data ["pageSize"];
$pageBtnLen = $data ["pageBtnLen"];
$curPageNum = $data ["curPageNum"];
$data = $data ["data"];

// var_dump($data);
// var_dump($cnt, $curPageNum, $pageSize, $pageBtnLen);exit;

$pagination = new pagination ( $cnt, $curPageNum, $pageSize, $pageBtnLen );
if (is_null ( $q )) {
	$q = "";
}

?>
<section class="content">

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">问答列表</h3>


			<div class="box-tools">
				<!-- 
                   <form action="<?php print HTTP_ENTRY?>/priv/ask/usrec">
                    <div class="input-group" style="width: 256px;">
                    
                      <input name="q" value="<?php print $q?>" type="text" name="table_search" class="form-control input-sm pull-right" placeholder="邮箱/手机号/UID/昵称">
                      <div class="input-group-btn">
                        <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                      </div>
                      
                    </div>
                    </form>
                     -->
			</div>



		</div>
		<!-- /.box-header -->
		<div class="box-body">

			<a class="btn bg-olive btn-flat margin"
				href="<?php print HTTP_ENTRY?>/priv/ask/add"> <i class="fa fa-plus"></i>
				添加提问
			</a>


			<table class="table table-bordered">
				<tr>
					<th style="width: 20px">#</th>
					<th>用户</th>
					<th>验证</th>
					<th>医生</th>
					<th>标题</th>
					<th>病种</th>
					<th>操作</th>
				</tr>
                    <?php foreach ($data as $item):?>
                    <tr>
					<td class="askid4sel"><?php print $item["aid"]?></td>
					<td><?php print $item["user_name"]?></td>
					<td><a
						href="<?php print HTTP_ENTRY?>/priv/ask/ver?sid=<?php print $item["aid"]?>"><?php if( $item["v"] == "1" ):?>取消<?php else:?>通过<?php endif;?></a>
					</td>
					<td><?php print $item["doc_name"]?></td>
					<td><?php print $item["title"]?></td>
					<td><?php print $item["dis_name"]?></td>

					<td><a class="btn bg-navy"
						href="<?php print HTTP_ENTRY?>/priv/ask/viewappend?sid=<?php print $item["aid"]?>">
							查看</a> <a class="btn btn-default"
						href="<?php print HTTP_ENTRY?>/priv/ask/edit?sid=<?php print $item["aid"]?>">
							编辑</a> <a class="btn btn-danger"
						href="<?php print HTTP_ENTRY?>/priv/ask/rm?sid=<?php print $item["aid"]?>">删除</a>
						<a class="btn bg-olive"
						href="<?php print HTTP_ENTRY?>/priv/ask/append?r=d&askid=<?php print $item["aid"]?>">回答</a>
						<a class="btn bg-purple"
						href="<?php print HTTP_ENTRY?>/priv/ask/append?r=u&askid=<?php print $item["aid"]?>">追问</a>
						<a class="btn bg-maroon"
						href="<?php print HTTP_ENTRY?>/priv/ask/present?askid=<?php print $item["aid"]?>">送花</a>

					</td>
				</tr>
                    
                    
                    <?php endforeach;?>
                    
                    
                  </table>
		</div>
		<!-- /.box-body -->
		<div class="box-footer clearfix">



			<div class="box-tools">

				<a id="vall" class="btn bg-olive">本页全部通过验证</a>


				<ul class="pagination pagination-sm no-margin pull-right">
					<li><a> <select onchange="window.location=this.value">
	                  	<?php for($i=0;$i<$pagination->getMaxPage();$i++):?>
	                  	
	                  	<option <?php if($curPageNum==$i+1):?> selected
									<?php endif;?>
									value="<?php print $url->setQuery("page", $i+1)->getUrl();?>"><?php print $i+1;?></option>
	                  	
	                  	<?php endfor;?>
	                  	</select>
					</a></li>
                    <?php if($pagination->hasPre()):?>
                      <li><a
						href="<?php print $url->setQuery("page", $pagination->getPre())->getUrl();?>">&laquo;</a></li>
                      <?php endif;?>
                      
                      <?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
                      <li><a
						href="<?php print $url->setQuery("page", $pagination->getStartPage() + $i)->getUrl()?>"><?php print $pagination->getStartPage() + $i?></a></li>
                      <?php endfor;?>
                      <?php if($pagination->hasNext()):?>
                      <li><a
						href="<?php print $url->setQuery("page", $pagination->getNext())->getUrl()?>">&raquo;</a></li>
                      <?php endif;?>
                     
                    </ul>
			</div>





		</div>
	</div>
	<!-- /.box -->


</section>



























<script>
$(".btn-danger").click(function(){
	return confirm("?");
});
$("#vall").click(function(){
	$(".askid4sel").each(function(i,e){
		$.get("<?php print HTTP_ENTRY?>/priv/ask/ver?sid="+e.innerHTML,function(d,s){
			if(d.result == "0")
			{
				$(e).parent().find("td").eq(2).html("成功操作");
			}
		},"json");
	});
});
</script>


