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
$url  = $data["url"];
$cnt  = $data["count"];
$pageSize = $data["pageSize"];
$pageBtnLen = $data["pageBtnLen"];
$curPageNum = $data["curPageNum"];
$doc_infoes = $data["doc_infoes"];

//病种过滤
$do = $data["do"];
//病种过滤默认值
if(is_null($do))
{
	$do = 0;
}

$data = $data["data"];


//分页
$pagination = new pagination($cnt, $curPageNum, $pageSize, $pageBtnLen);
if(is_null($q)){
	$q = "";
}

// var_dump($di_data);exit;

//classname function
function cn($a,$b){
	if($a==$b){
		print "cate-active";
	}else{
		print "cate";
	}
}
?>
<style>
<!--

span.cate{
	color:#00c0ef;
	cursor:pointer;
}
span.cate-active{
	color:gray;
}
-->
</style>
<script>
var g_data = <?php print json_encode($doc_infoes);?>;
function di_item(id,text){
	return '<span style="margin-right: 15px;" class="di cate" onclick="chooseDi(this,'+id+')">'+text+'</span>';
}
function chooseDo(o,a){
	$("#dc_val").val(a);
	
	var v = ['<span style="margin-right: 15px;" class="di cate-active" onclick="chooseDi(this,0)">全部</span>'];

	$(".cate-active.dc").removeClass("cate-active").addClass("cate");
	$(o).addClass("cate-active");
}

</script>


<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">文章筛选</h3>
                   
                   
                   <form action="<?php print HTTP_ENTRY?>/priv/artical/revreldoc" class="form-horizontal">
                   	<input type="hidden" name="do" id="dc_val" value="<?php print $do?>">
                   	<div class="form-group">
	                  <label for="inputEmail3" class="col-sm-1 control-label">医生:</label>
	
	                  <div class="col-sm-11">
	                  	<p class="form-control-static">
	                  	<span style="margin-right: 15px;" class="dc cate<?php if($do == 0):?>-active<?php endif;?>" onclick="chooseDo(this,0)">全部</span>
	                   
	                    <?php foreach ($doc_infoes as $doc):?>
	                    
	                    <span style="margin-right: 15px;" class="dc cate<?php if($do == $doc["dod"]):?>-active<?php endif;?>" onclick="chooseDo(this,<?php print $doc["dod"]?>)"><?php print $doc["name"]?></span>
	                    
	                    <?php endforeach;?>
	                    </p>
	                  </div>
	                </div>
                   
                   <div class="form-group">
	                  <label for="inputEmail3" class="col-sm-1 control-label">文章标题:</label>
	
	                  <div class="col-sm-11">
	                    <input name="q" value="<?php print $q?>" class="form-control" id="inputEmail3" placeholder="Email">
	                  </div>
	                </div>
         
         		<div class="form-group">
         			<div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">筛选</button>
                    </div>
                </div>
         
         
         
                    </form>
                   
                   
                   
                </div><!-- /.box-header -->
                <div class="box-body">
    
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 20px"><input type="checkbox" id="reverse"></th>
                      <th>标题</th>
                      <th>日期</th>
                      <th>医生</th>
                      <th>操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><input type="checkbox" name="sid[]" value="<?php print $item["aid"]?>" data-dod="<?php print $item["dod"]?>"></td>
                      <td><?php print $item["title"]?></td>
                      <td><?php print $item["date"]?></td>
                      <td><?php print $item["name"]?></td>
                      <td>
                      
                      <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/artical/rmreldoc?aid=<?php print $item["aid"]?>&dod=<?php print $item["dod"]?>">删除</a>
                        
                      </td>
  						
                    </tr>
                    
                    
                    <?php endforeach;?>
                    
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
 
 
 
                  <div class="box-tools">
                  
                  	<div class="no-margin pull-left" style="width:30%">
                  	
                  			<form onsubmit="return chk(this)" action="<?php print HTTP_ENTRY?>/priv/artical/con_reldoc" method="post" class="form-horizontal">
		                  	<div class="form-group">
		                      <label for="inputEmail3" class="col-sm-3 control-label">对选中项:</label>
		                      <div class="col-sm-7">
		                      	
		                        <select class="form-control" name="di" id="sel_dd" onchange="submitBtnDisable()">
		                        <option value="0">删除</option>

		                        <?php foreach ($doc_infoes as $child):?>
		                        <option value="<?php print $child["dod"]?>"><?php print $child["name"]?></option>
		                        <?php endforeach;?>
		    
		                        </select>
		                      </div>
		                      <div class="col-sm-2">
		                      <input id="artical_ids" value="" name="ds" type="hidden">
		                      <input id="artical_dds" value="" name="dd" type="hidden">
		                      <input id="btn_submit_conrel" type="submit" value="确定" class="btn bg-olive btn-flat" disabled>
		                      </div>
		                    </div>
		                  	
		                  	</form>
                  	
                  	</div>
                  
                  
                  
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
function chk(fo){

	if(fo.di.value == "0"){
		return confirm("?");
	}
	return true;
}
function getChooseArticalIds(){
	var ds = [],dd=[];
	$("input[name='sid[]'").each(function(){
		this.checked && ds.push(this.value) && dd.push(this.getAttribute("data-dod"));
	});
	$("#artical_ids").val(ds.join());
	$("#artical_dds").val(dd.join());
	submitBtnDisable();
}
function submitBtnDisable(){
	$("#btn_submit_conrel")[0].disabled = !($("input[name='sid[]']:checked").length != 0);
}
$("#reverse").click(function(){
	//console
	
	$(this).parents("table").eq(0)
	.find("td>input[type=checkbox]").each(function(){
		this.checked = !this.checked
	});
	getChooseArticalIds();
});

$("input[name='sid[]'").click(getChooseArticalIds);
</script>
