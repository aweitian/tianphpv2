<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月21日
 * @Desc: 
 * 依赖:
 */
if ($_SERVER ["HTTP_REFERER"]) {
	$url = new url ( $_SERVER ["HTTP_REFERER"] );
	if ($url->path != HTTP_ENTRY . "/user/writeappraise") {
		$redirectUrl = "?return=". urlencode($_SERVER ["HTTP_REFERER"]) ;
	} else {
		$redirectUrl = "";
	}
} else {
	$redirectUrl = "";
}



$tree_dis = array();
foreach ($model->getDisease() as $item){
	if(!array_key_exists($item["pid"], $tree_dis)){
		$tree_dis[$item["pid"]] = array(
				"text" => $item["pd"],
				"children" => array()
		);
	}
	$tree_dis[$item["pid"]]["children"][$item["mid"]] = array($item["md"],$item["url"]);
}
$this->title = "写评价-上海九龙男子医院";
$this->description = "";
$this->keyword = "";
?>
<div class="listpos fz13">
	<span class="gray">当前位置：</span><a<?php print App::useTarget()?> href="">首页 > 给医生写评价</a>
</div>
<div class="clearfix">
	<div class="wid680 fl">
		<div class="padd20 border2 clr">

			<form name="gh" onSubmit="return chk(this)" action="<?php print AppUrl::userWriteAppraise().$redirectUrl?>" method="post">

				<div class="twtit fl">
					<div class="twtitl fl fz16 pt7">疾病：</div>
					<div class="twtitr2 fl border2">
						<select class="fz16 gray" name="j">

							<option value="0">选择疾病</option>
						  <?php foreach($model->getLv0KeyInfoes() as $xbz):?>   	
                       	<option value="<?php print $xbz["sid"] ?>"><?php print $xbz["data"] ?></option>     
            <?php endforeach;?>
					</select>
					</div>

				</div>
				<div class="twtit fl" style="margin-left: 50px;">
					<div class="twtitl fl fz16 pt7">医 生：</div>
					<div class="twtitr2 fl border2">
						<select class="fz16 gray" name="d">

							<option value="0">选择医生</option>
						<?php foreach($model->getAllDoc() as $doc):?>
						<option value="<?php print $doc["sid"]?>"><?php print $doc["name"]?></option>
						<?php endforeach;?>
					</select>
					</div>

				</div>
				<div class="blank20"></div>
				<div class="twtit">
					<div class="twtitl fl fz16 pt7">满意度：</div>
					    <div class="twtitl fl fz16 pt7">
						<input name="m" type="radio" value="0" />  一般&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="m" type="radio" value="1" />  满意&nbsp;&nbsp;&nbsp;&nbsp;
						<input name="m" type="radio" value="2" />  很满意
					    </div>

				</div>
				<div class="blank20"></div>
				<div class="twtit">

					<div class="twtitl fl fz16 pt7">内 容：</div>
					<div class="twtitr2 fl pj_myd fz16">
						<textarea maxlength="2048" name="c"></textarea>
						<br> 最大2048个长度
					</div>
				</div>


				<div class="blank40"></div>
				<div class="tjtodoc">
					<button class="nobor tc white fz18" type="submit">确认提交</button>
				</div>
				<div class="blank20"></div>
			</form>
		</div>
	</div>
	
	<script type="text/javascript">
			
function chk(f){
if (f.j.value=="0")
{ 
	alert("请选择疾病");
	f.j.focus();
	return false;
}
if (f.d.value=="0")
{ 
	alert("请选择医生");
	f.j.focus();
	return false;
}

if (f.m.value == "")
{ 
alert("请选择满意度");
f.j.focus();
return false;
}

if (f.c.value=="")
{ 
	alert("请填写内容");
	f.c.focus();
	return false;
}





return true;



}

</script>
	<!--left end-->
	<div class="wid300 fr">
		<div class="hotbq border2">
			<div class="syrboxtit fz18 graybg clearfix">
				<a<?php print App::useTarget()?> class="fl">热门标签</a>
			</div>
			<div class="hotbqbox fz13">
				<ul class="clearfix">
					<li><a<?php print App::useTarget()?> href="">前列腺炎</a></li>
					<li><a<?php print App::useTarget()?> href="">前列腺增生</a></li>
					<li><a<?php print App::useTarget()?> href="">包皮包茎</a></li>
					<li><a<?php print App::useTarget()?> href="">前列腺痛</a></li>
					<li><a<?php print App::useTarget()?> href="">前列腺肥大</a></li>
					<li><a<?php print App::useTarget()?> href="">早泄</a></li>
					<li><a<?php print App::useTarget()?> href="">前列腺囊肿</a></li>
					<li><a<?php print App::useTarget()?> href="">前列腺癌</a></li>
					<li><a<?php print App::useTarget()?> href="">前列腺炎</a></li>
					<li><a<?php print App::useTarget()?> href="">前列腺增生</a></li>
					<li><a<?php print App::useTarget()?> href="">包皮包茎</a></li>
					<li><a<?php print App::useTarget()?> href="">前列腺痛</a></li>
					<li><a<?php print App::useTarget()?> href="">前列腺肥大</a></li>
					<li><a<?php print App::useTarget()?> href="">早泄</a></li>
					<li><a<?php print App::useTarget()?> href="">前列腺囊肿</a></li>
					<li><a<?php print App::useTarget()?> href="">前列腺癌</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!--right end-->
</div>
