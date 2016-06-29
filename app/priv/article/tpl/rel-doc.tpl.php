<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
//$q  = $data["q"];
/**
 * 
 * @var pmcaiUrl $url
 */
$req = new httpRequest();
$url  = new pmcaiUrl($req->requestUri());
$cnt  = $data["count"];
$pageSize = $data["pageSize"];
$pageBtnLen = $data["pageBtnLen"];
$curPageNum = $data["curPageNum"];
$doc_infoes = $data["doc_infoes"];

// //病种过滤
// $dc = $data["dc"];
// $di = $data["di"];
// //病种过滤默认值
// if(is_null($dc))
// {
// 	$dc = 0;
// }
// if(is_null($di))
// {
// 	$di = 0;
// }
	
// $di_data = array();

$data = $data["data"];


//分页
$pagination = new pagination($cnt, $curPageNum, $pageSize, $pageBtnLen);
// if(is_null($q)){
// 	$q = "";
// }


//病种数组
// $pdc = array();
// foreach ($dis_infoes as $item){
// 	if(!array_key_exists($item["pid"], $pdc)){
// 		$pdc[$item["pid"]] = $item["pd"];
// 	}
// 	if($item["pid"] == $dc){
// 		$di_data[$item["mid"]] = $item["md"];
// 	}
// 	//$dc[$item["pid"]][$item["mid"]] = array($item["md"],$item["pd"]);
// }

// var_dump($doc_infoes);exit;

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
function chooseDc(o,a){
	$("#dc_val").val(a);
	
	var v = ['<span style="margin-right: 15px;" class="di cate-active" onclick="chooseDi(this,0)">全部</span>'];
	if(a != "0"){
		for(var x in g_data){
//	 		console.log(g_data[x]["pid"],a);

			if(g_data[x]["pid"] == a){
				//console.log(g_data[x]);
				var y = g_data[x];
				v.push(di_item(y["mid"],y["md"]));
			}
			
		}
	}else{
		$("#di_val").val(0);
	}

	$("#di_con").html(v.join(""));
	$(".cate-active.dc").removeClass("cate-active").addClass("cate");
	$(o).addClass("cate-active");
}
function chooseDi(o,a){
	$("#di_val").val(a);
	$(".cate-active.di").removeClass("cate-active").addClass("cate");
	$(o).addClass("cate-active");
}
</script>


<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">文章筛选</h3>
                   
                </div><!-- /.box-header -->
                <div class="box-body">
    
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 20px"><input type="checkbox" id="reverse"></th>
                      <th>标题</th>
                      <th>日期</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><input type="checkbox" name="sid[]" value="<?php print $item["sid"]?>"></td>
                      <td><?php print $item["title"]?></td>
                      <td><?php print $item["date"]?></td>
                      
      
                    </tr>
                    
                    
                    <?php endforeach;?>
                    
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
 
 
 
                  <div class="box-tools clearfix">
                  
                  	<div class="no-margin pull-left" style="width:30%">
                  	
                  	<form action="<?php print HTTP_ENTRY?>/priv/article/con_reldoc" method="post" class="form-horizontal">
                  	<div class="form-group">
                      <label for="inputEmail3" class="col-sm-4 control-label">对选中项分配到:</label>
                      <div class="col-sm-6">
                           <select class="form-control" name="di" id="sel_dd" onchange="submitBtnDisable()">
                        <option value="0">请选择</option>
              
                        <?php foreach ($doc_infoes as $child):?>
                        <option value="<?php print $child["dod"]?>"><?php print $child["name"]?></option>
                        <?php endforeach;?>
           
                        </select>
                      </div>
                      <div class="col-sm-2">
                      <input id="article_ids" value="" name="ds" type="hidden">
                      <input id="btn_submit_conrel" type="submit" value="分配" class="btn bg-olive btn-flat" disabled>
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
function getChooseArticleIds(){
	var ds = [];
	$("input[name='sid[]'").each(function(){
		this.checked && ds.push(this.value);
	});
	$("#article_ids").val(ds.join());
	submitBtnDisable();
}
function submitBtnDisable(){
	$("#btn_submit_conrel")[0].disabled = !($("input[name='sid[]']:checked").length != 0 && $("#sel_dd").val() != "0");
}
$("#reverse").click(function(){
	//console
	
	$(this).parents("table").eq(0)
	.find("td>input[type=checkbox]").each(function(){
		this.checked = !this.checked
	});
	getChooseArticleIds();
});

$("input[name='sid[]'").click(getChooseArticleIds);
</script>

