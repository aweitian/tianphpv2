<?php 
/**
 * @var mainModel;
 */
$m = $model;

// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;

$tree_dis = array();
foreach ($m->getDisease() as $item){
	if(!array_key_exists($item["pid"], $tree_dis)){
		$tree_dis[$item["pid"]] = array(
			"text" => $item["pd"],
			"children" => array()
		);
	}
	$tree_dis[$item["pid"]]["children"][$item["mid"]] = array($item["md"],$item["url"]);
}
 



?>
<div class="blank30"></div>

<div id="content" class="w1000 clearfix">

	<p class="con_ptit">
    	<b>男科图片：</b>
        <a href="">包皮过长图片</a>
        <a href="">包皮过长图片</a>
        <a href="">包皮过长图片</a>
        <a href="">包皮过长图片</a>
        <a href="">包皮过长图片</a>
        <a href="">包皮过长图片</a>
        <a href="">包皮过长图片</a>
        <a href="">包皮过长图片</a>
        <a href="">包皮过长图片</a>
    </p>
	<div class="blank30"></div>
    
    <div class="hmleft">



  <div class="hml1">



	
<div class="hmright">

		 <div class="bd">

			 <div class="ulWrap">

				<ul class="picList">

					 										<li>

						<div class="pic"><a href="/pic/bp/" title="包皮过长图片"><img src="<?php print HTTP_ENTRY?>/static/images/class_35_250_80.jpg" alt="包皮过长图片"/></a></div>

					</li>

															<li>

						<div class="pic"><a href="/pic/yw/" title="阳痿症状图片"><img src="<?php print HTTP_ENTRY?>/static/images/class_36_250_80.jpg" alt="阳痿症状图片"/></a></div>

					</li>

															<li>

						<div class="pic"><a href="/pic/zx/" title="早泄症状图片"><img src="<?php print HTTP_ENTRY?>/static/images/class_37_250_80.jpg" alt="早泄症状图片"/></a></div>

					</li>

										</ul>

					<ul class="picList">

															<li>

						<div class="pic"><a href="/pic/xb/" title="性病症状图片"><img src="<?php print HTTP_ENTRY?>/static/images/class_38_250_80.jpg" alt="性病症状图片"/></a></div>

					</li>

															<li>

						<div class="pic"><a href="/pic/sy/" title="尖锐湿疣图片"><img src="<?php print HTTP_ENTRY?>/static/images/class_39_250_80.jpg" alt="尖锐湿疣图片"/></a></div>

					</li>

															<li>

						<div class="pic"><a href="/pic/pz/" title="疱疹症状图片"><img src="<?php print HTTP_ENTRY?>/static/images/class_40_250_80.jpg" alt="疱疹症状图片"/></a></div>

					</li>

										</ul>

					<ul class="picList">

															<li>

						<div class="pic"><a href="/pic/ndy/" title="尿道炎图片"><img src="<?php print HTTP_ENTRY?>/static/images/class_41_250_80.jpg" alt="尿道炎图片"/></a></div>

					</li>

															<li>

						<div class="pic"><a href="/pic/md/" title="梅毒症状图片"><img src="<?php print HTTP_ENTRY?>/static/images/class_42_250_80.jpg" alt="梅毒症状图片"/></a></div>

					</li>

															<li>

						<div class="pic"><a href="/pic/lb/" title="淋病症状图片"><img src="<?php print HTTP_ENTRY?>/static/images/class_43_250_80.jpg" alt="淋病症状图片"/></a></div>

					</li>

										</ul>

					<ul class="picList">

															<li>

						<div class="pic"><a href="/pic/qlxy/" title="前列腺炎图片"><img src="<?php print HTTP_ENTRY?>/static/images/class_44_250_80.jpg" alt="前列腺炎图片"/></a></div>

					</li>

															<li>

						<div class="pic"><a href="/pic/gty/" title="龟头炎图片"><img src="<?php print HTTP_ENTRY?>/static/images/class_45_250_80.jpg" alt="龟头炎图片"/></a></div>

					</li>

									</ul>

			  </div>

		  </div>

	<a class="prev" href="javascript:void(0)"></a>

	<a class="next" href="javascript:void(0)"></a>

</div>

<script type="text/javascript">



		 jQuery(".hmright").slide({titCell:".hd ul",mainCell:".bd .ulWrap",autoPage:true,effect:"leftLoop",autoPlay:true,vis:1});

</script>
	
</div>
<div class="hmdt">

	<div class="clearfix">
    <div class="hmbzbt">
      <ul class="tab_nav">
        <li class="selected"><a href="">热点文章</a></li>
        <li class="nobor"><a href="">相关问答</a></li>
      </ul>
    </div>
    <div class="tab_switch  clearfix">
      <div class="tabcon selected">
       	<div class="p10 clearfix">
          <dl class="clearfix">
            <dt class="fl"><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/index_img1.jpg" /></a></dt>
            <dd class="fr">
              <h4 class="blue"><a href="">梅毒有什么需要注意的</a></h4>
              <p class="indent">上海九龙男子医院秉承"弘扬医德、尊重科学、诚信求精、毕生奉献"的办院宗旨，医院广纳海内外具有专业权威男科医学专家、生殖整形外科专家和学科带头人实现了…<a href="" class="blue">【详细】</a></p>
              <ul class="tab_ul">
                <li><a href="">早泄该怎么调理 <img src="<?php print HTTP_ENTRY?>/static/images/hot.png" /></a></li>
                <li><a href="">前列腺炎对健康都会有哪些不好的影响</a></li>
                <li><a href="">得了梅毒要注意什么问题</a></li>
              </ul>
            </dd>
          </dl>
        </div>
      </div>
      <div class="tabcon ">
       	<div class="p10 clearfix">
          <dl class="clearfix">
            <dt class="fl"><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/index_img1.jpg" /></a></dt>
            <dd class="fr">
              <h4 class="blue"><a href="">2梅毒有什么需要注意的</a></h4>
              <p class="indent">上海九龙男子医院秉承"弘扬医德、尊重科学、诚信求精、毕生奉献"的办院宗旨，医院广纳海内外具有专业权威男科医学专家、生殖整形外科专家和学科带头人实现了…<a href="" class="blue">【详细】</a></p>
              <ul class="tab_ul">
                <li><a href="">早泄该怎么调理 <img src="<?php print HTTP_ENTRY?>/static/images/hot.png" /></a></li>
                <li><a href="">前列腺炎对健康都会有哪些不好的影响</a></li>
                <li><a href="">得了梅毒要注意什么问题</a></li>
              </ul>
            </dd>
          </dl>
        </div>
      </div>
    </div>
  </div>
  
 
  
    
  </div>


</div>

  
  <div class="hr_c"></div>
  <div class="hmbt"><a href="/zjtd/" class="fr">查看更多</a>医师专栏<font>Famous doctor</font></div>
  <div class="hmmb clearfix">
    <div class="bigzj tab_switch">
      <div class="tabcon  selected">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51290834.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165517_909.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51290834.html">韩用涛</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：泌尿男性疾病的诊断与治疗。其独特的治疗方法对久治不愈的男性不育症、性功能障碍、慢性前列腺炎和各类生殖...</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291672.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165240_787.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291672.html">张俊峰</a></span>主治医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：泌尿生殖系统疾病的疑难杂症、性传播疾病及相关合并症、后遗症，前列腺疾病、性功能障碍等男性疾病</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291617.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165248_829.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291617.html">郑殿增</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：各种感染引起的顽固性前列腺炎、尿道炎、前列腺肥大、阳痿早泄、男性不育</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291559.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165305_879.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291559.html">陈开亮</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：前列腺炎(急慢性)、性功能障碍、阳痿早泄、不育症</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291294.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165357_190.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291294.html">张耀龙</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：对各种生殖器皮肤病，如湿疹、银屑病的诊治</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51290763.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_183513_477.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51290763.html">陈希球</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：生殖整形外科手术，如精索静脉曲张、阴茎延长、阴茎增粗等微创术</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51377043.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_171818_343.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51377043.html">刘彦强</a></span>主治医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：擅长治疗前列腺疾病，阳痿、早泄、精液异常、睾丸异常、男性不育症等疾病。</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291843.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165210_773.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291843.html">李志公</a></span>主治医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：急慢性前列腺炎、性功能障碍(阳痿、早泄)和男性不育症</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291473.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165317_589.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291473.html">张河清</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：急性前列腺炎、慢性前列腺炎、前列腺增生、前列腺肥大、性功能障碍、男性不育</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291357.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165329_383.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291357.html">吴任红</a></span>主治医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：前列腺疾病、性功能障碍、泌尿生殖感染</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51290958.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165409_652.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51290958.html">彭立</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：慢性前列腺炎、尿道炎、性功能障碍、性传播疾病、不育症</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51290900.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165449_145.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51290900.html">孙志国</a></span>医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：前列腺疾病、男性不育症、性功能障碍、静脉曲张等男科多见病、多发病的诊治。</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291672.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165240_787.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291672.html">张俊峰</a></span>主治医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：泌尿生殖系统疾病的疑难杂症、性传播疾病及相关合并症、后遗症，前列腺疾病、性功能障碍等男性疾病</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291617.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165248_829.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291617.html">郑殿增</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：各种感染引起的顽固性前列腺炎、尿道炎、前列腺肥大、阳痿早泄、男性不育</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291559.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165305_879.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291559.html">陈开亮</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：前列腺炎(急慢性)、性功能障碍、阳痿早泄、不育症</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291294.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165357_190.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291294.html">张耀龙</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：对各种生殖器皮肤病，如湿疹、银屑病的诊治</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51290763.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_183513_477.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51290763.html">陈希球</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：生殖整形外科手术，如精索静脉曲张、阴茎延长、阴茎增粗等微创术</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51377043.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_171818_343.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51377043.html">刘彦强</a></span>主治医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：擅长治疗前列腺疾病，阳痿、早泄、精液异常、睾丸异常、男性不育症等疾病。</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291843.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165210_773.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291843.html">李志公</a></span>主治医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：急慢性前列腺炎、性功能障碍(阳痿、早泄)和男性不育症</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291473.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165317_589.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291473.html">张河清</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：急性前列腺炎、慢性前列腺炎、前列腺增生、前列腺肥大、性功能障碍、男性不育</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51291357.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165329_383.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51291357.html">吴任红</a></span>主治医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：前列腺疾病、性功能障碍、泌尿生殖感染</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51290958.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165409_652.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51290958.html">彭立</a></span>副主任医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：慢性前列腺炎、尿道炎、性功能障碍、性传播疾病、不育症</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"><a href="/zjtd/51290900.html"><img src="<?php print HTTP_ENTRY?>/static/images/20151229_165449_145.jpg" width="294" height="348" /></a></dt>
          <dd>
            <h4><span class="blue"><a href="/zjtd/51290900.html">孙志国</a></span>医师</h4>
            <p>临床经验：</p>
            <p>擅长项目：前列腺疾病、男性不育症、性功能障碍、静脉曲张等男科多见病、多发病的诊治。</p>
            <div class="zjbtn"><a href="javascript:void(0)" onclick="openZoosUrl();return false;" class="bg1">我要咨询</a><a onclick="bookzj()" class="bg2">预约挂号</a></div>
          </dd>
        </dl>
      </div>
    </div>
    
    <div  class="zjleft">
    	
        <div id="zjscoll">
    	<div class="smallzj"  id="zjcontent">
      <ul class="tab_nav">
        <li  class="selected"> <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165918_760.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51290834.html">
              <h4>韩用涛</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165747_335.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291672.html">
              <h4>张俊峰</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165756_913.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291617.html">
              <h4>郑殿增</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165804_426.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291559.html">
              <h4>陈开亮</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165836_937.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291294.html">
              <h4>张耀龙</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165926_737.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51290763.html">
              <h4>陈希球</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_171804_281.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51377043.html">
              <h4>刘彦强</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165641_656.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291843.html">
              <h4>李志公</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165814_887.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291473.html">
              <h4>张河清</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165824_278.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291357.html">
              <h4>吴任红</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165844_177.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51290958.html">
              <h4>彭立</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165903_149.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51290900.html">
              <h4>孙志国</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165747_335.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291672.html">
              <h4>张俊峰</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165756_913.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291617.html">
              <h4>郑殿增</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165804_426.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291559.html">
              <h4>陈开亮</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165836_937.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291294.html">
              <h4>张耀龙</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165926_737.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51290763.html">
              <h4>陈希球</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_171804_281.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51377043.html">
              <h4>刘彦强</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165641_656.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291843.html">
              <h4>李志公</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165814_887.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291473.html">
              <h4>张河清</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165824_278.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51291357.html">
              <h4>吴任红</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165844_177.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51290958.html">
              <h4>彭立</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
        <li > <img src="<?php print HTTP_ENTRY?>/static/images/20151229_165903_149.jpg" width="79" height="73" class="pic" />
          <div class="zjjs">
            <div class="bg"><a href="/zjtd/51290900.html">
              <h4>孙志国</h4>
              <p>查看详情</p>
              </a> </div>
            <em></em> </div>
        </li>
      </ul>
    </div>


	  </div>
    	    
    	<!--<div id="scrollbar4" style="display: block; top: 0px;">

		<div class="scroller4" id="scroller4" style="height: 100px; top: 0px;"></div>

		<script type="text/javascript"> 

		TINY.scroller.init('zjscoll','zjcontent','scrollbar4','scroller4','buttonclick');
		
		</script> 
    </div>-->
    
    </div>
      
  </div>
  <div class="hr_c"></div>
  <div class="hmbt"><a href="" class="fr">查看更多</a>重点学科<font>Key discipline</font></div>
  <div class="hmmb clearfix">
    <div class="hmbzbt">
      <ul class="tab_nav">
        <li class="selected"><a href="/qlxjb/">前列腺疾病</a></li>
        <li><a href="/xgnza/">性功能障碍</a></li>
        <li><a href="/xcbjb/">性传播疾病</a></li>
        <li><a href="/szzx/">生殖整形</a></li>
        <li><a href="/szgr/">泌尿感染</a></li>
        <li class="nobor"><a href="/nxby/">男性不育</a></li>
      </ul>
    </div>
    <div class="tab_switch hmbz clearfix">
      <div class="tabcon selected">
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_2_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/qlxjb/qlxy/">前列腺炎</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/qlxjb/qlxy/66229874.html">前列腺炎对健康都会有哪些不好的</a></li>
              <li><a href="/qlxjb/qlxy/63541865.html">前列腺炎的症状是什么</a></li>
              <li><a href="/qlxjb/qlxy/60182746.html">哪些男性容易患前列腺炎</a></li>
              <li><a href="/qlxjb/qlxy/56918824.html">前列腺炎治疗偏方</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_3_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/qlxjb/qlxt/">前列腺痛</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/qlxjb/qlxt/63368435.html">前列腺痛的治疗方法有哪些</a></li>
              <li><a href="/qlxjb/qlxt/59825338.html">前列腺痛的治疗方式有哪些</a></li>
              <li><a href="/qlxjb/qlxt/53299431.html">前列腺痛是怎么回事</a></li>
              <li><a href="/qlxjb/qlxt/51803857.html">前列腺痛都有哪些症状出现</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_4_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/qlxjb/qlxzs/">前列腺增生</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/qlxjb/qlxzs/65182388.html">前列腺增生要不要禁欲</a></li>
              <li><a href="/qlxjb/qlxzs/61209289.html">前列腺增生有哪些危害</a></li>
              <li><a href="/qlxjb/qlxzs/57078767.html">怎么预防前列腺增生</a></li>
              <li><a href="/qlxjb/qlxzs/55707062.html">前列腺增生的治疗方法</a></li>
            </ul>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_6_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/xgnza/zx/">早泄</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/xgnza/zx/66490378.html">早泄该怎么调理</a></li>
              <li><a href="/xgnza/zx/64140933.html">早泄的病因是什么</a></li>
              <li><a href="/xgnza/zx/61649378.html">早泄男人的误区</a></li>
              <li><a href="/xgnza/zx/60440373.html">早泄的护理方法</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_7_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/xgnza/sjza/">射精障碍</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/xgnza/sjza/65711201.html">逆行射精一般都是由哪些由哪些原</a></li>
              <li><a href="/xgnza/sjza/62937967.html">射精障碍有哪些</a></li>
              <li><a href="/xgnza/sjza/61035556.html">不射精症对身体会产生哪些危害</a></li>
              <li><a href="/xgnza/sjza/58715050.html">预防射精障碍的方法是什么</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_8_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/xgnza/yw/">阳痿</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/xgnza/yw/64764702.html">阳痿要怎么调理呢</a></li>
              <li><a href="/xgnza/yw/62944989.html">怎样预防阳痿的发生</a></li>
              <li><a href="/xgnza/yw/61035668.html">阳痿的发生原因</a></li>
              <li><a href="/xgnza/yw/60440292.html">阳痿的危害你知道哪些</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_9_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/xgnza/bqza/">勃起障碍</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/xgnza/bqza/62514971.html">出现有勃起障碍对男性会造成什么</a></li>
              <li><a href="/xgnza/bqza/59825137.html">什么是勃起障碍</a></li>
              <li><a href="/xgnza/bqza/51803879.html">阴茎勃起障碍的症状有哪些</a></li>
            </ul>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_11_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/xcbjb/jrsy/">尖锐湿疣</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/xcbjb/jrsy/65885992.html">尖锐湿疣能根治吗</a></li>
              <li><a href="/xcbjb/jrsy/64592504.html">患上尖锐湿疣的途径有哪些</a></li>
              <li><a href="/xcbjb/jrsy/62966122.html">阴茎赘生物电灼术</a></li>
              <li><a href="/xcbjb/jrsy/62966077.html">红外线治疗技术</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_12_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/xcbjb/md/">梅毒</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/xcbjb/md/68216500.html">梅毒有什么需要注意的</a></li>
              <li><a href="/xcbjb/md/66058784.html">得了梅毒要注意什么问题</a></li>
              <li><a href="/xcbjb/md/63971748.html">梅毒患者要注意什么</a></li>
              <li><a href="/xcbjb/md/62342433.html">没有性接触会感染梅毒吗</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_13_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/xcbjb/szqpz/">生殖器疱疹</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/xcbjb/szqpz/65367382.html">生殖器疱疹复发的原因有哪些</a></li>
              <li><a href="/xcbjb/szqpz/63108951.html">生殖器疱疹手术怎么护理</a></li>
              <li><a href="/xcbjb/szqpz/61985397.html">生殖器疱疹怎么得的</a></li>
              <li><a href="/xcbjb/szqpz/59145298.html">生殖器疱疹是如何传播的</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_14_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/xcbjb/lb/">淋病</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/xcbjb/lb/62762122.html">淋病有哪些传播途径</a></li>
              <li><a href="/xcbjb/lb/61649496.html">淋病怎么治疗</a></li>
              <li><a href="/xcbjb/lb/59489376.html">如何判断自己是否患有淋病</a></li>
              <li><a href="/xcbjb/lb/57677844.html">淋病的注意事项有哪些</a></li>
            </ul>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_17_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/szzx/bpgc/">包皮过长</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/szzx/bpgc/64938300.html">治疗包皮过长需要注意哪些事项</a></li>
              <li><a href="/szzx/bpgc/62966022.html">包皮环切术</a></li>
              <li><a href="/szzx/bpgc/62762278.html">包皮过长会有哪些并发症</a></li>
              <li><a href="/szzx/bpgc/60778637.html">包皮过长手术收费项目有哪些</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_18_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/szzx/bj/">包茎</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/szzx/bj/62966177.html">嵌顿包茎松解术</a></li>
              <li><a href="/szzx/bj/60602166.html">包茎有哪些危害</a></li>
              <li><a href="/szzx/bj/58106932.html">包茎手术怎么调理</a></li>
              <li><a href="/szzx/bj/57677739.html">男性包茎图片有哪些</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_19_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/szzx/yjyc/">阴茎延长</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/szzx/yjyc/62966233.html">阴茎延长术</a></li>
              <li><a href="/szzx/yjyc/59489536.html">阴茎短小的危害有什么</a></li>
              <li><a href="/szzx/yjyc/58106766.html">阴茎延长的好处</a></li>
              <li><a href="/szzx/yjyc/53109772.html">不做小男人生殖器延长手术谁能做</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_20_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/szzx/yjzc/">阴茎增粗</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/szzx/yjzc/61381377.html">哪些人需要进行阴茎增粗手术</a></li>
              <li><a href="/szzx/yjzc/58539615.html">阴茎短小的危害有哪些</a></li>
              <li><a href="/szzx/yjzc/52154265.html">阴茎增粗有哪些好方法呢</a></li>
            </ul>
          </dd>
        </dl>
        
        
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_24_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/szgr/ndy/">尿道炎</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/szgr/ndy/63712173.html">尿道炎饮食要注意什么</a></li>
              <li><a href="/szgr/ndy/62342385.html">尿道炎的注意事项</a></li>
              <li><a href="/szgr/ndy/59998465.html">尿道炎的护理措施</a></li>
              <li><a href="/szgr/ndy/56111111.html">尿道炎的预防方法</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_25_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/szgr/gty/">龟头炎</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/szgr/gty/63368242.html">龟头炎如何治好</a></li>
              <li><a href="/szgr/gty/60602266.html">包皮龟头炎能治好吗</a></li>
              <li><a href="/szgr/gty/59145019.html">龟头发炎应该怎么治疗</a></li>
              <li><a href="/szgr/gty/56294676.html">龟头边上长小红点是怎么回事</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_26_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/szgr/gwy/">睾丸炎</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/szgr/gwy/63108783.html">睾丸炎患者可以选择什么食疗</a></li>
              <li><a href="/szgr/gwy/58887049.html">睾丸炎的并发症</a></li>
              <li><a href="/szgr/gwy/57517920.html">有哪些预防睾丸炎的方法</a></li>
              <li><a href="/szgr/gwy/52759727.html">患有睾丸炎会有那些危害呢</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_27_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/szgr/jny/">精囊炎</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/szgr/jny/61381518.html">精囊炎的危害要当心</a></li>
              <li><a href="/szgr/jny/58280121.html">精囊炎应该如何预防</a></li>
              <li><a href="/szgr/jny/53968496.html">为什么会出现精囊炎</a></li>
            </ul>
          </dd>
        </dl>
      </div>
      <div class="tabcon ">
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_29_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/nxby/sj/">死精</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/nxby/sj/60778789.html">少精症是怎么引起的呢</a></li>
              <li><a href="/nxby/sj/57078690.html">死精症是什么原因造成的</a></li>
              <li><a href="/nxby/sj/53968472.html">引起死精症的原因是什么</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_30_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/nxby/sj/">少精</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/nxby/sj/62515119.html">男性患上少精症都会有哪些影响</a></li>
              <li><a href="/nxby/sj/53968443.html">少精症的早期症状</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_31_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/nxby/sx/">肾虚</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/nxby/sx/61813149.html">肾虚早泄的症状</a></li>
              <li><a href="/nxby/sx/57337200.html">导致肾虚的原因有哪些</a></li>
              <li><a href="/nxby/sx/53968539.html">男性肾虚会出现哪些症状表现</a></li>
            </ul>
          </dd>
        </dl>
        <dl class="clearfix">
          <dt class="fl"> <img src="<?php print HTTP_ENTRY?>/static/images/class_32_176_122.jpg" width="176" height="122" />
            <div class="bg"></div>
            <div class="nr"><a href="/nxby/jzbyh/">精子不液化</a></div>
          </dt>
          <dd>
            <ul>
              <li><a href="/nxby/jzbyh/60182486.html">精液不液化影响男性生育吗</a></li>
              <li><a href="/nxby/jzbyh/53968517.html">精子不液化需要吃什么药呢</a></li>
            </ul>
          </dd>
        </dl>
      </div>
    </div>
  </div>
  <div class="hr_b"></div>
  <div class="linkbt">
    <ul class="tab_nav">
      <li class="li1 selected">
        <p>监管机制</p>
      </li>
      <li class="li2">
        <p>友情链接</p>
      </li>
    </ul>
  </div>
  <div class="hr_a"></div>
  <div class="tab_switch link">
    <div class="tabcon selected"><img src="" /></div>
    <div class="tabcon">
      <ul>
        <li><a href="http://www.lznjyy.org">兰州男科医院哪个好</a></li>
      </ul>
    </div>
  </div>
</div>