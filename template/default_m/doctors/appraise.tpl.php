<?php
/**
 * @Author: awei.tian
 * @Date: 2016年8月12日
 * @Desc: 
 * 依赖:
 */

$row = $m->data;
// var_dump($row);exit;


$pageSize = 6;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($m->getAppraise($m->data["sid"]), $page, $pageSize, 6);


$req = new httpRequest();
$url = new url($req->requestUri());
?>
<div class="public_width">

<div class="head_tc blue_bg">
        <a class="goback" href="" title="返回上页"><span>返回</span></a>
        <div class="head_tit" ><?php print $m->data["name"]?>医生的评价</div>
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
<div class="bg_fff">
		<div class="blank30"></div>
        <div class="fz28 color3 tc">诊治过的患者：<span class="yellow"><?php echo rand(3000,6000);?></span>例</div>
    <div class="blank30"></div>
 </div>
<div class="bg_fff">
	<div class="hd_hsx"></div>
    <div class="mzy30">
       <div class="blank30"></div>
       <div class="zj_tp clr">
            <a href="">全部<span class="blue">50</span></a>
            <a href="">前列腺增生<span class="blue">7</span></a>
            <a href="">前列腺肥大<span class="blue">3</span></a>
            <a href="">早泄<span class="blue">1</span></a>
            <a href="">前列腺痛<span class="blue">5</span></a>
            <a href="">前列腺囊肿<span class="blue">3</span></a>
            
        </div>
        <div class="blank20"></div>
    </div>
</div>


<?php foreach($m->getAppraise($m->data["sid"],$pageSize,($page-1)*$pageSize) as $app):?> 
<?php $c=$m->rowuser($m->data["sid"])?>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>
<div class="kp_about  bg_fff">
	<dl class="mzy30 fz26">
    	<div class="blank20"></div>
        <dd class="clr color3 "><span class="fl"> 患者：<?php print ($c["name"]) ?> </span><span class="fr"><?php print ($app["date"]) ?></span></dd>
    	<dt class="clr"><a href="" class="yellow">所患疾病：<a href="<?php print AppUrl::disHomeByDid($app["did"])?>"><?php print $m->getNameByDid($app["did"])?></a></a></dt>
        <div class="blank15"></div>
        <div class="hd_hsx"></div>
        <div class="blank15"></div>
        <dd class="color3 fz22"><?php print $app["txt"]?></dd>
        <div class="blank15"></div>
        <dd class="clr color9"><?php print ($app["date"]) ?></dd>
    </dl>
</div>
<?php endforeach;?>

<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="pagenum tc gray fz13"> <?php if ($pagination->hasPre()):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?> </div>


<div class="blank15"></div>

</div>

</div>