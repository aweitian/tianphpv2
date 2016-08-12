<?php

defTplData::getInstance()->title = $m->data["name"] . " - 医师首页";
/**
  ["sid"]=> 	11
  ["id"]=>  	string(3) "zyl"
  ["name"]=>  	string(9) "张耀龙"
  ["lv"]=>  	string(7) "ccccccc"
  ["avatar"]=>  string(7) "zyl.jpg"
  ["date"]=>  	string(10) "2016-05-16"
  ["dod"]=>  	string(1) "2"
  ["dlv"]=>  	string(1) "3"
  ["star"]=>  	string(2) "10"
  ["hot"]=>  	string(2) "22"
  ["love"]=>  	string(1) "2"
  ["contribution"]=>  string(1) "2"
  ["desc"]=>  	string(2) "33"
  ["spec"]=>  	string(1) "3"
}
 */
// var_dump($m->data);exit;

$pageSize = 8;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}
$pagination = new pagination($m->getDataByDodCnt($m->data["sid"]), $page, $pageSize, 6);
$req = new httpRequest();
$url = new url($req->requestUri());


?>
<div class="public_width">

<div class="head_tc blue_bg">
        <a class="goback" href="" title="返回上页"><span>返回</span></a>
        <div class="head_tit" ><?php print $m->data["name"]?></div>
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

<div class="top_tit mzy30 color9"><a href="/" class="color9">首页</a>&nbsp;>&nbsp;<span class="blue"><?php print $m->data["name"]?></span></div>
<div class="hd_hsx"></div>
<div class="bg_fff">
	<div class="zjtd">
	<div class="mzy30 zjtd_box1">
    	<a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" class="fl zjtd_box1_img1" /></a>
        <dl class="fl">
        	<dt class="fz24 jbkp_zjzx clr"><b class="blue fz28"><?php print $m->data["name"]?></b></dt>
            <dd><?php print $m->data["lv"]?></dd>
            <dd>患者推荐热度(综合) : <span><?php print $m->data["hot"]?></span><img src="<?php print AppUrl::getMediaPath()?>/images/ys_tj.png" class="zjtd_box1_img3" /></dd>
        </dl>
    </div>
    <div class="blank20"></div>
    <div class="mzy30">
        <div class="ys_box1 clr">
            <p>感谢信<span class="red"><?php print $m->getLetterCnt()?></span></p><b>|</b>
            <p>咨询量<span class="red"><?php echo rand(5000,10000);?></span></p><b>|</b>
            <p>预约门诊<span class="red"><?php echo rand(300,600);?></span></p>
        </div>
        <div class="blank30"></div>
        <div class="ys_box1_sm1 clr">
        	<a href="<?php print AppUrl::getSwtUrl()?>" class="blue_bg fl">免费在线咨询</a>
            <a href="tel:021-52733999" class="new_green_bg fr">电话咨询</a>
        </div>
        <div class="blank30"></div>
    </div>
    
</div>
</div>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="index_hotzx">
    <div class="title_name">
        <img src="<?php print AppUrl::getMediaPath()?>/images/ysym_img1.png" class="fl ys_tb" /><b>出诊时间</b>
    </div>
</div>
<div class="bg_fff">
	<div class="blank30"></div>
    <div class="ys_time">

                        	<?php for($i=0;$i<3;$i++):?>
                            	<p>
                            	<?php for($j=0;$j<7;$j++):?>
                            	<?php if(substr($m->data["duty"],$i * 7 + $j,1) == "0"):?>
                            	<span></span>
                            	<?php else:?>
                            	<span><img src="<?php print AppUrl::getMediaPath()?>/images/yeym_time<?php print substr($m->data["duty"],$i * 7 + $j,1)?>.png" /></span>
                            	<?php endif;?>
                            	<?php endfor;?>
                                </p>
                             <?php endfor;?>
                                  
    </div>
    <div class="blank30"></div>
</div>

<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="index_hotzx">
    <div class="title_name_lan"><img src="<?php print AppUrl::getMediaPath()?>/images/ysym_img2.png" class="fl ys_tb" /><b>专业擅长</b></div>
</div>
<div class="bg_fff">
	<div class="blank10"></div>
	<p class="mzy30 fz24 color6 lh40"><?php print $m->data["spec"]?>...</p>
    <div class="blank10"></div>
</div>

<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="index_hotzx">
    <div class="title_name_lan clr" style="height:1.1rem;">
    <div class="fl ys_con_p2"><img src="<?php print AppUrl::getMediaPath()?>/images/ysym_img3.png" class="fl ys_tb" /><b>患者感谢信</b></div>
    
        <div class="ys_con_p1 fr">
            <p class="color6">疗效：<img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><span class="red">100%满意</span></p>
            <p class="color6">态度：<img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><span class="red">100%满意</span></p>
        </div>
    </div>
</div>

<?php foreach($m->getLetterByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $let):?> 
<?php $dis=$m->getNameByDid($let["did"])?>  
<?php $user=$m->getNameByUid($let["uid"])  ?>
<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="" class="yellow">所患疾病： <?php print($dis) ?></a></dt>
        <dd class="color3">感谢信：<?php print $m->utf8cut($let["content"],0,64)?>...</dd>
        <div class="blank15"></div>
        <div class="hd_hsx"></div>
        <div class="blank15"></div>
        <dd class="clr color9"><span class="fl"> 患者： <?php print ($user) ?></span><span class="fr"><?php print utility::utf8Substr($let["date"], 0, 10)?></span></dd>
    </dl>
</div>
<div class="hd_hsx"></div>
<?php endforeach;?>

<div class="bg_fff tc fz26">
	<div class="blank30"></div>
	<a href="<?php print AppUrl::docLetterHomeByDocid($m->data["id"])?>" class="color3">查看更多患者感谢信</a>
    <div class="blank30"></div>
</div>

<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="index_hotzx">
    <div class="title_name">
        <img src="<?php print AppUrl::getMediaPath()?>/images/ysym_img4.png" class="fl ys_tb" /><b>诊后服务星</b>
    </div>
</div>
<div class="bg_fff fz26">
	<div class="blank30"></div>
	<p class="color6 tc">诊治过的患者: <span class="yellow"><?php echo rand(300,600);?></span>例   随访中的患者: <span class="yellow"><?php echo rand(290,590);?></span>例</p>
    <div class="blank30"></div>
    <div class="hd_hsx"></div>
    
    
</div>






<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="index_hotzx">
    <h2 class="title_name_lan">在线咨询<span class="fw400 fz28">(<?php print $m->getDataByDodCnt($m->data["sid"])?>)</span><a href="<?php print AppUrl::docAskHomeByDocid($m->data["id"])?>" class="fr">+更多</a></h2>
</div>
<div class="kp_about  bg_fff">
<div class="mzy30">
   <?php foreach ($m->getQuestionsByDod($m->data["sid"],3,0) as $ask): ?>
<?php $user=$m->getNameByUid($ask["uid"])  ?>
<?php $dis=$m->getNameByDid($ask["did"])?>        
<?php $count=$m->getAnswersCnt($ask["sid"]) ?>
<?php $docount= $m->getAnswersDocReplyCnt($ask["sid"]) ?>
	<dl>
    	<div class="blank20"></div>
    	<dt class="clr"><a href="<?php print AppUrl::askByAsdDocidAsd($m->data["id"], $ask["sid"])?>"><img src="<?php print AppUrl::getMediaPath()?>/images/kp_wen.png" /><?php print utility::utf8Substr($ask["title"], 0, 18)?></a></dt>
        <dd>疾病 ：<a href="<?php print AppUrl::disHomeByDid($ask["did"])?>"><?php print($dis) ?></a></dd>
        <dd class="clr color9"><span class="fl">患者： <?php print ($user) ?></span><span class="fr">共<?php print($docount) ?>条对话    <?php print utility::utf8Substr($ask["date"], 0, 10)?></span></dd>
    </dl>
    <div class="hd_hsx"></div>
    <?php endforeach;?> 
    
</div>
</div>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="index_hotzx">
    <h2 class="title_name_lan">专家文章<span class="fw400 fz28">(<?php print $m->allByDodCnt($m->data["sid"])?>)</span><a href="<?php print AppUrl::docArticleHomeByDocid($m->data["id"])?>" class="fr">+更多</a></h2>
</div>
<?php foreach($m->allByDod($m->data["sid"],2,0) as $aitem):?>           
<?php $a= $m->rowNoContent($aitem)?> 
<div class="kp_about  bg_fff">
    <dl class="mzy30">
        <div class="blank20"></div>
        <dt class="clr"><a href="<?php print AppUrl::articleByAid($a["sid"])?>" class="color3 fz28"><?php print utility::utf8Substr($a["title"], 0, 18)?></a></dt>
        <dd><?php print utility::utf8Substr($a["desc"], 0, 65)?>...</dd>
        <div class="blank20"></div>
        <div class="hd_hsx"></div>
        <dd class="kp_dd1">发表于<?php print ($a["date"])?><span><?php echo rand(1000,2000);?>人已读</span></dd>
    </dl>
</div>
<div class="hd_hsx"></div>
<?php endforeach;?>  

<div class="blank10"></div>
<div class="new_footer">
    <div class="what_version"> 
        <a href="<?php print AppUrl::getSwtUrl()?>" class="colorf">在线咨询</a>&nbsp;&nbsp;|&nbsp;&nbsp
        <a href="#">知识库</a>&nbsp;&nbsp;|&nbsp;&nbsp;
        <a href="" class="colorf">个人中心</a>
    </div>
    <div class="blank30"></div>
    <div class="hd_hx"></div>
    <div class="what_version"> 
        <a href="" class="cur">触屏版</a>&nbsp;&nbsp;|&nbsp;&nbsp
        <a href="#" class="cur">电脑版</a>
    </div>
    <p class="company_title">版权所有 上海九龙男子医院</p>
  </div>
</div>



<div class="box_c">
    <p class="box_center2">
        <a href="<?php print AppUrl::getSwtUrl()?>" class="btn_b1">预约挂号</a>
        <a href="<?php print AppUrl::letterPut()?>" class="btn_b2">写感谢信</a>
        <a href="" class="btn_b3">送暖心</a>
    </p> 
</div>

</div>
  