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
$dis_infoes = $data["dis_infoes"];

//病种过滤
$dc = $data["dc"];
$di = $data["di"];
//病种过滤默认值
if(is_null($dc))
{
	$dc = 0;
}
if(is_null($di))
{
	$di = 0;
}
	
$di_data = array();

$data = $data["data"];


//分页
$pagination = new pagination($cnt, $curPageNum, $pageSize, $pageBtnLen);
if(is_null($q)){
	$q = "";
}


//病种数组
$pdc = array();
foreach ($dis_infoes as $item){
	if(!array_key_exists($item["pid"], $pdc)){
		$pdc[$item["pid"]] = $item["pd"];
	}
	if($item["pid"] == $dc){
		$di_data[$item["mid"]] = $item["md"];
	}
	//$dc[$item["pid"]][$item["mid"]] = array($item["md"],$item["pd"]);
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
var g_data = <?php print json_encode($dis_infoes);?>;
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
                   
                   
                   <form action="<?php print HTTP_ENTRY?>/priv/artical/reldis" class="form-horizontal">
                   	<input type="hidden" name="dc" id="dc_val" value="<?php print $dc?>">
                   	<input type="hidden" name="di" id="di_val" value="<?php print $di?>">
                   	<div class="form-group">
	                  <label for="inputEmail3" class="col-sm-1 control-label">病种:</label>
	
	                  <div class="col-sm-11">
	                  	<p class="form-control-static">
	                  	<span style="margin-right: 15px;" class="dc cate<?php if($dc == 0):?>-active<?php endif;?>" onclick="chooseDc(this,0)">全部</span>
	                   
	                    <?php foreach ($pdc as $pk => $pv):?>
	                    
	                    <span style="margin-right: 15px;" class="dc cate<?php if($dc == $pk):?>-active<?php endif;?>" onclick="chooseDc(this,<?php print $pk?>)"><?php print $pv?></span>
	                    
	                    <?php endforeach;?>
	                    </p>
	                  </div>
	                </div>
                   	<div class="form-group">
	                  <label for="inputEmail3" class="col-sm-1 control-label">疾病:</label>
	
	                  <div class="col-sm-11">
	                  <p class="form-control-static" id="di_con">
	                  	<span style="margin-right: 15px;" class="di cate<?php if($di == 0):?>-active<?php endif;?>" onclick="chooseDi(this,0)">全部</span>
	                   
	                   <?php foreach ($di_data as $dk => $dv):?>
	                    
	                    <span style="margin-right: 15px;" class="dc cate<?php if($di == $dk):?>-active<?php endif;?>" onclick="chooseDi(this,<?php print $dk?>)"><?php print $dv?></span>
	                    
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
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><input type="checkbox" name="sid[]" value="<?php print $item["sid"]?>"></td>
                      <td><?php print $item["title"]?></td>
                      <td><?php print $item["date"]?></td>
                      
                      <td>
                      	<!-- <i class="fa fa-edit"></i> -->
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/artical/edit?sid=<?php print $item["sid"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/artical/rm?sid=<?php print $item["sid"]?>">删除</a>
                        
                      </td>
                    </tr>
                    
                    
                    <?php endforeach;?>
                    
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
 
 
 
                  <div class="box-tools">
                  
                  	<div class="no-margin pull-left">
                  	对选中项:
                  	
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

$("#reverse").click(function(){
	//console
	$(this).parents("table").eq(0)
	.find("td>input[type=checkbox]").each(function(){

		this.checked = !this.checked

	});
	
});
</script>

