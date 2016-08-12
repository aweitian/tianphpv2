<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月13日
 * @Desc: 
 */

$pageSize = 6;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($m->getQuestionsCountByDod($m->data["sid"]), $page, $pageSize, 6);



$req = new httpRequest();
$url = new url($req->requestUri());


?>
<div class="public_width">

<div class="head_tc blue_bg">
        <a class="goback" href="" title="返回上页"><span>返回</span></a>
        <div class="head_tit" ><?php print $m->data["name"]?>医生咨询列表</div>
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
<?php include dirname(__FILE__)."/common/nav.tpl.php";?>

<?php foreach ($m->getQuestionsByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $ask): ?>
 
<?php $user=$m->getNameByUid($ask["uid"])  ?>
<?php $dis=$m->getNameByDid($ask["did"])?>
        
<?php $count=$m->getAnswersCnt($ask["sid"]) ?>
<?php $docount= $m->getAnswersDocReplyCnt($ask["sid"]) ?>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>
<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="<?php print AppUrl::askByAsdDocidAsd($m->data["id"], $ask["sid"])?>"><img src="<?php print AppUrl::getMediaPath()?>/images/kp_wen.png" /><?php print utility::utf8Substr($ask["title"], 0, 18)?></a></dt>
        <dd>疾病 ：<a href="<?php print AppUrl::disHomeByDid($ask["did"])?>"><?php print($dis) ?></a></dd>
        <dd class="clr color9"><span class="fl">患者： <?php print ($user) ?></span><span class="fr">共<?php print($docount) ?>条对话   <?php print utility::utf8Substr($ask["date"], 0, 10)?></span></dd>
    </dl>
</div>
 <?php endforeach; ?>  
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
<div class="blank30"></div>

</div>

</div>
  