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


$pagination = new pagination($m->getLetterCnt($m->data["sid"]), $page, $pageSize, 6);


$req = new httpRequest();
$url = new url($req->requestUri());
?>
<div class="public_width">

<div class="head_tc blue_bg">
        <a class="goback" href="" title="返回上页"><span>返回</span></a>
        <div class="head_tit" ><?php print $m->data["name"]?>医生的感谢信</div>
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
<div class="blank30"></div>
<div class="mzy30 zjtd_box1">
        <div class="fz30 color6">患者推荐热度(综合) : <span><?php print $m->data["hot"]?></span><img src="<?php print AppUrl::getMediaPath()?>/images/ys_tj.png" class="zjtd_box1_img3" /></div>
        <div class="blank15"></div>
        <div class="zjtd_box1_p2 clr">
            <p class="fl">疗效：<img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><span class="red">100%满意</span></p>
            <p class="fr">态度：<img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><span class="red">100%满意</span></p>
        </div>
    </div>
    <div class="blank20"></div>
<div class="bg_fff">
	<div class="hd_hsx"></div>
    <div class="mzy30">
       <div class="blank30"></div>
       <div class="zj_tp clr">
            <a href="">全部<span class="blue"><?php print $m->getLetterCnt()?></span></a>
            <a href="">前列腺增生<span class="blue">7</span></a>
            <a href="">前列腺肥大<span class="blue">3</span></a>
            <a href="">早泄<span class="blue">1</span></a>
            <a href="">前列腺痛<span class="blue">5</span></a>
            <a href="">前列腺囊肿<span class="blue">3</span></a>
            
        </div>
        <div class="blank20"></div>
    </div>
</div>

<?php foreach($m->getDataByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $dodpj):?> 
<?php $a=appraiseLvMeta::getMeta() ?>
<?php $b= $m->getNameByDid($dodpj["did"])?> 
<?php $c=$m->rowuser($m->data["sid"])?>
<?php $let=$m->getLetter($m->data["sid"])?>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>
<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="" class="yellow">所患疾病：<?php print ($b)  ?></a></dt>
        <dd class="color3">满意度：<?php print ($a[$dodpj["lv"]]) ?></dd>
        <dd class="color3">感谢信：<?php print $m->utf8cut($let["content"],0,64)?>...</dd>
        <div class="blank15"></div>
        <div class="hd_hsx"></div>
        <div class="blank15"></div>
        <dd class="clr color9"><span class="fl"> 患者：<?php print ($c["name"]) ?> </span><span class="fr"><?php print ($dodpj["date"]) ?></span></dd>
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
<div class="box_b">
    <p class="box_center2">
        <a href="<?php print AppUrl::letterPut()?>" class="btn_b1">给医生写信</a>
        <a href="" class="btn_b2">联系医生</a>
    </p> 
</div>
</div>