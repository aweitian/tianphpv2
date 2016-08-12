<?php 
/**
 * zhangsihang
 * @var doctorsModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;


$pageSize = 6;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($m->getAllCnt(), $page, $pageSize, 6);
 

$req = new httpRequest();
$url = new url($req->requestUri());


// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
?>
 <div class="public_width">

<div class="head_tc blue_bg">
        <a class="goback" href="" title="返回上页"><span>返回</span></a>
        <div class="head_tit" >全部医生</div>
        <a href="" class="top_ss"><img src="<?php print AppUrl::getMediaPath()?>/images/top_ss.png" class="img_width" /></a>
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
<?php foreach($m->getDoctors(6,($page-1)*$pageSize) as $doc):?>

<div class="zjtd">
	<div class="mzy30 zjtd_box1">
    	<a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" class="fl zjtd_box1_img1" /></a>
        <dl class="fl">
        	<dt class="fz24"><b><a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>" class="blue fz28"><?php print $doc["name"]; ?></a></b>  <?php print $doc["lv"]; ?></dt>
            <dd>患者推荐热度：<span class="red"><?php print $doc["hot"]; ?></span><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img3.png" /></dd>
            <dd>咨询量：<span class="red"><?php print rand(200,300);?></span></dd>
        </dl>
        <a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img2.png" class="fr zjtd_box1_img2" /></a>
    </div>
    <div class="blank20"></div>
    <div class="hd_hsx"></div>
    <p class="mzy30  zjtd_box1_p1">医生擅长：<?php print $doc["spec"]; ?>...</p>
    <div class="hd_hsx"></div>
</div>
<div class="blank10"></div>
<div class="hd_hsx"></div>
<?php endforeach;?>


<div class="pagenum tc gray fz13"><?php if ($pagination->hasPre()):?>
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
  