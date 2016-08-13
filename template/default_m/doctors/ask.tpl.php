<?php



$pageSize = 8;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($m->getAnswersCnt($askid), $page, $pageSize, 6);



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
<div class="bg_fff">
	<div class="zjtd  yswd_wap">
	<div class="mzy30 zjtd_box1 clr">
    	<a href=""><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $m->data["avatar"]?>" class="fl" style="width:.98rem; height:.98rem;" /></a>
        <dl class="fl">
        	<dt class="fz24 jbkp_zjzx clr"><b class="blue fz28"><?php print $m->data["name"]?></b></dt>
            <dd><?php print $m->data["lv"]?></dd>
        </dl>
        <dl class="fl" style="margin-left:.3rem;">
        	<dd class="color3">疗效：<span class="red">100%满意</span></dd>
            <dd class="color3">态度：<span class="red">100%满意</span></dd>
        </dl>
        <a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/memer_img1.png" class="fr zjtd_box1_img4" /></a>
        <img src="<?php print AppUrl::getMediaPath()?>/images/yswd_img4.png" class="yswd_j1" />
    </div>
    <div class="blank20"></div>
    
</div>
</div>
<div class="hd_hsx"></div>
<div class="blank30"></div>
<?php $askq= $m->getQuestionByAskid($askid) ?> 
<?php $user= $m->rowuser($askq["uid"]); ?>  
<?php $doc=$m->getDocRowByDod($askq["dod"]) ?>
<?php $dis=$m->getNameByDid($askq["did"]) ?>
<div class="yswd_box1 mzy30 clr">
	<span class="color9 fl">提问标题：</span>
    <p class="fl"><?php print($askq["title"]) ?></p>
</div>
<div class="mzy30">
    <div class="blank10"></div>
    <p class="color9 tc"><?php print $askq["date"] ?></p>
    <p class="color9 tr">患者</p>
    <div class="blank10"></div>
    <div class="yswd_box2">
    	<h5><?php print $user["name"] ?> 男 </h5>
        <div class="blank10"></div>
        <div class="hd_xhsx"></div>
        <div class="blank20"></div>
        <p><span class="blue">疾病：</span><?php print ($dis) ?></p>
        <p><span class="blue">描述：</span><?php print $askq["desc"] ?></p>
        <p><span class="blue">想获得的帮助：</span><?php print $askq["svr"] ?></p>
        <p class="color9"><img src="<?php print AppUrl::getMediaPath()?>/images/yswd_img2.png" />病历资料仅医生及患者本人登录后可见 </p>
        <img src="<?php print AppUrl::getMediaPath()?>/images/ys_wd2.png" class="yswd_box2_t1" />
    </div>
    <div class="blank10"></div>
</div>
<?php foreach ($m->getAnswers($askid,$pageSize,($page-1)*$pageSize)as $wd):?>
<div class="mzy30">
<?php if($wd["role"] == "user"): ?>
	<div class="blank10"></div>
    <p class="color9 tc"><?php print $wd["date"] ?></p>
    <p class="color9 tr">患者</p>
    <div class="blank10"></div>
    <div class="yswd_box2">
        <div class="blank10"></div>
        <p><span class="blue"><?php print $wd["content"] ?></span></p>
        <img src="<?php print AppUrl::getMediaPath()?>/images/ys_wd2.png" class="yswd_box2_t1" />
    </div>
    <div class="blank10"></div>
<?php else:?>
    <p class="color9 tc"><?php print $wd["date"] ?></p>
    <div class="blank10"></div>
    <div class="yswd_box3">
    	<dl class="clr">
        	<dt class="fl"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"] ?>" /></dt>
              <dd class="fl">
                <h5 class="fz26 color6 fw400"><span class="blue fz30"><?php print $doc["name"] ?></span>  <?php print $doc["lv"] ?></h5>
                <p class="blank10"></p>
                <div><?php print $wd["content"] ?><img src="<?php print AppUrl::getMediaPath()?>/images/ys_wd1.png" class="yswd_box3_t1" /></div>
            </dd>
        </dl>
    </div>
    <div class="blank30"></div>
</div>
<?php endif;?>
<?php endforeach; ?>
<div class="bg_fff yswd_box4">
    <div class="mzy30 ">
        <div class="blank20"></div>
        
        <dl class="clr">
        	<dt class="fl">
            	<a href="<?php print AppUrl::docHomeByDod($m->data["dod"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $m->data["avatar"]?>" /></a>
                <div class="blank15"></div>
            	<p><a href="<?php print AppUrl::docHomeByDod($m->data["dod"])?>" class="blue"><?php print $m->data["name"]?></a></p>
            </dt>
            <dd class="fr">
            	<h5 class="fw400 fz26">已解答<span class="red"><?php print $m->getQuestionsCountByDod($m->data["dod"])?></span>名患者的咨询</h5>
                <p class="color6">擅长：<?php print $m->data["lv"]?>... <a href="<?php print AppUrl::docHomeByDod($m->data["dod"])?>" class="fr blue">立即查看</a></p>
            </dd>
        </dl>
        
        
        <div class="blank20"></div>
    </div>
</div>


<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="index_hotzx">
    <h2 class="title_name_lan"><?php print ($dis) ?><b class="fz28 color3">的相关咨询</b><a href="" class="fr blue"><img src="<?php print AppUrl::getMediaPath()?>/images/index_hyh.png" />换一换</a></h2>
</div>
<div class="bg_fff">
	<div class="kp_about  bg_fff">


	<?php foreach ($m->getQuestionsByDid($askq["did"],5,0) as $ask): ?>
	<?php $docount= $m->getAnswersDocReplyCnt($ask["sid"]) ?>
	<dl class="mzy30">
    	<div class="blank20"></div>
        <dd class="clr color9"><a href=""><span class="fl"><?php print $m->utf8cut($ask["title"],0,16)?></span><span class="fr yellow"><img src="<?php print AppUrl::getMediaPath()?>/images/yswd_img3.png" /><?php print($docount) ?></span></a></dd>
        <dd class="color3"><span class="color9">描述：</span><?php print $m->utf8cut($ask["desc"],0,64)?>...</dd>
        <div class="blank15"></div>
    </dl>
    <div class="hd_hsx"></div>
    <?php endforeach; ?>


    
</div>
</div>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="index_hotzx">
    <h2 class="title_name_lan"><?php print ($dis) ?><b class="fz28 color3">的相关文章</b><a href="" class="fr blue"><img src="<?php print AppUrl::getMediaPath()?>/images/index_hyh.png" />换一换</a></h2>
</div>
<div class="bg_fff">
	<div class="kp_about  bg_fff">
	<?php foreach ($m->getAll($askq["did"],5) as $wz):?>

	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="<?php print AppUrl::articleByAid($wz["aid"]) ?>" class="color3"><?php print $m->utf8cut($wz["title"],0,16)?></a></dt>

    </dl>
    <div class="hd_hsx"></div>
    <?php endforeach; ?>
</div>
</div>


<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="index_hotzx">
    <h2 class="title_name_lan"><?php print ($dis) ?><b class="fz28 color3">的相关疾病</b></h2>
</div>
<div class="bg_fff">
	<div class="yswd_jb bg_fff">
        <div class="mzy30">
            <?php foreach($m->getSiblingDids($askq["did"]) as $xbz):?>   	
            <p class="clr"><a href="<?php print AppUrl::disHomeByDiseasekey($xbz["key"])?>" class="fl"><?php print $xbz["data"] ?></a><img src="<?php print AppUrl::getMediaPath()?>/images/memer_img1.png" class="fr" /></p>
            <div class="hd_hsx"></div>    
            <?php endforeach;?>
            
            
         </div>
    </div>
    <div class="hd_hsx"></div>
</div>



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



<div class="box_d">
    <div class="clr">
        <img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $m->data["avatar"]?>" class="fl" />
        <div class="fl">
        	<h5 class="fw400 color3"><?php print $m->data["name"]?><span class="color6 fz24"><?php print $m->data["lv"]?></span></h5>
            <p class="clr"><a href="<?php print AppUrl::getSwtUrl()?>" class="btn_b1">在线咨询</a><a href="tel:021-52733999" class="btn_b2">电话咨询</a></p>
        </div>
    </div> 
</div>

</div>


<div class="ask_ys"><a href="<?php print AppUrl::getSwtUrl()?>"></a></div> 

 