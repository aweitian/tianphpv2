<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月21日
 * @Desc: 
 * 依赖:
 */

if ($_SERVER ["HTTP_REFERER"]) {
	$url = new url ( $_SERVER ["HTTP_REFERER"] );
	if ($url->path != HTTP_ENTRY . "/user/writeletter") {
		$redirectUrl = "?return=". urlencode($_SERVER ["HTTP_REFERER"]) ;
	} else {
		$redirectUrl = "";
	}
} else {
	$redirectUrl = "";
}

?>
<div class="listpos fz13">
	<span class="gray">当前位置：</span><a href="">首页 > 给医生写感谢信</a>
</div>
<div class="clearfix">
	<div class="wid680 fl">
		<div class="padd20 border2 clr">

			<form action="<?php print AppUrl::userWriteLetter().$redirectUrl?>" method="post">

				<div class="twtit">
					<div class="twtitl fl fz16 pt7" style="margin-left: 35px;">医 生：</div>
					<div class="twtitr2 fl border2">
						<select class="fz16 gray" name="d">

							<option>选择医生</option>
						<?php foreach($model->getAllDoc() as $doc):?>
						<option value="<?php print $doc["sid"]?>"><?php print $doc["name"]?></option>
						<?php endforeach;?>
					</select>
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
	<!--left end-->
	<div class="wid300 fr">
		<div class="hotbq border2">
			<div class="syrboxtit fz18 graybg clearfix">
				<a class="fl">热门标签</a>
			</div>
			<div class="hotbqbox fz13">
				<ul class="clearfix">
					<li><a href="">前列腺炎</a></li>
					<li><a href="">前列腺增生</a></li>
					<li><a href="">包皮包茎</a></li>
					<li><a href="">前列腺痛</a></li>
					<li><a href="">前列腺肥大</a></li>
					<li><a href="">早泄</a></li>
					<li><a href="">前列腺囊肿</a></li>
					<li><a href="">前列腺癌</a></li>
					<li><a href="">前列腺炎</a></li>
					<li><a href="">前列腺增生</a></li>
					<li><a href="">包皮包茎</a></li>
					<li><a href="">前列腺痛</a></li>
					<li><a href="">前列腺肥大</a></li>
					<li><a href="">早泄</a></li>
					<li><a href="">前列腺囊肿</a></li>
					<li><a href="">前列腺癌</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!--right end-->
</div>
