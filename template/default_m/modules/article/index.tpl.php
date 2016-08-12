<?php 
/**
 * Sihangzhang
 * @var articleModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;



$pageSize = 12;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}



$pagination = new pagination($m->getAllFullCnt(), $page, $pageSize, 10);

$req = new httpRequest();
$url = new url($req->requestUri());


$a=$m->allThumbnail($pageSize,($page-1)*$pageSize);

// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
?>
<div class="public_width">

<div class="head_tc blue_bg">
        <a class="goback" href="" title="返回上页"><span>返回</span></a>
        <div class="head_tit" >陈希球医生页文章列表</div>
    <a href="javascript:;" class="oc_list_new"><span class="red_out"><img src="<?php print AppUrl::getMediaPath()?>/images/nav_xl.png" /><i id="redpoint" class=""></i></span></a>
  </div>
<div class="black_bg"></div>
<div class="head_tc_nav_new">
  <form class="clearfix" action="" method="GET" accept-charset="GBK">
      <div class="text">
        <div class="in_out">
          <input id="uniqueKeyword20151125" type="text" placeholder="医院名、疾病名或医生姓名" class="head_tc_nav_new_input" name="key"/>
        </div>  
      </div>
      <div class="sub">
        <input type="button" id="nav_bar_search_btn" value="搜索"/>
      </div>
  </form>
  <div class="search_dor clearfix">
    <a href="" class="anyiyuan" id="cnzz_yiyuan203">找大夫咨询</a>
    <a href="" class="anjibing" id="cnzz_jibing204">好评医院</a>
  </div>
  <div class="three_btn clearfix">
    <a href="" id="cnzz_zixun205"><span></span></a>
    <a href="" id="cnzz_dianhua206"><span></span></a>
    <a href="" id="cnzz_jihao207" class="mr0"><span></span></a>
  </div>
  <div class="three_a clearfix">
    <a href="" class="" id="cnzz_shouye208">首页</a>
    <a href="" class=" " id="cnzz_zhishi209">疾病知识</a>
 </div>
 <div class="three_dl clearfix">
    <a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/top_nav_dl.png" class="three_dl_sm1" /></a>
    <a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/top_nav_zc.png" /></a>
 </div>
  <div id="percenter"> </div>
  <div class="battom_waitao"><div class="bottom_bac"></div></div>
  <div class="arrow"></div>
</div>
<input id="isShowRedPoint" type="hidden" value="">
<script src="js/nav_bar.0e2272c9.js"></script>

<!--head end-->

<div class="hui_bg">
<div class="blank10"></div>
<div class="hd_hsx"></div>
<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="" class="blue fz28">前列腺炎"最爱"八种人，有冇你？</a></dt>
        <dd>值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最大的副性腺，位于盆腔内膀胱出口的下方，它底朝</dd>
        <dd class="kp_dd1">发表于 2016.03.08<span>12579人已读</span></dd>
    </dl>
</div>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>

<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="" class="blue fz28">前列腺炎"最爱"八种人，有冇你？</a></dt>
        <dd>值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最大的副性腺，位于盆腔内膀胱出口的下方，它底朝</dd>
        <dd class="kp_dd1">发表于 2016.03.08<span>12579人已读</span></dd>
    </dl>
</div>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>

<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="" class="blue fz28">前列腺炎"最爱"八种人，有冇你？</a></dt>
        <dd>值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最大的副性腺，位于盆腔内膀胱出口的下方，它底朝</dd>
        <dd class="kp_dd1">发表于 2016.03.08<span>12579人已读</span></dd>
    </dl>
</div>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>

<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="" class="blue fz28">前列腺炎"最爱"八种人，有冇你？</a></dt>
        <dd>值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最大的副性腺，位于盆腔内膀胱出口的下方，它底朝</dd>
        <dd class="kp_dd1">发表于 2016.03.08<span>12579人已读</span></dd>
    </dl>
</div>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>

<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="" class="blue fz28">前列腺炎"最爱"八种人，有冇你？</a></dt>
        <dd>值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最大的副性腺，位于盆腔内膀胱出口的下方，它底朝</dd>
        <dd class="kp_dd1">发表于 2016.03.08<span>12579人已读</span></dd>
    </dl>
</div>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>

<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="" class="blue fz28">前列腺炎"最爱"八种人，有冇你？</a></dt>
        <dd>值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最大的副性腺，位于盆腔内膀胱出口的下方，它底朝</dd>
        <dd class="kp_dd1">发表于 2016.03.08<span>12579人已读</span></dd>
    </dl>
</div>
<div class="hd_hsx"></div>


<div class="blank30"></div>

</div>

</div>