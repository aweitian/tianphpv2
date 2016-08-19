<?php
?>
<div class="head_tc blue_bg">
        <a class="goback" href="" title="返回上页" onclick="history.go(-1)"><span>返回</span></a>
        <div class="head_tit" ><?php print $m->data["name"]?><?php print $doctors_header_title;?></div>
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
    <a href="<?php print AppUrl::navDoctors()?>" class="anyiyuan" id="cnzz_yiyuan203">找大夫咨询</a>
    <a href="<?php print AppUrl::helpAbout()?>" class="anjibing" id="cnzz_jibing204">好评医院</a>
  </div>
  <div class="three_btn clearfix">
    <a href="<?php print AppUrl::getSwtUrl()?>" id="cnzz_zixun205"><span></span></a>
    <a href="tel:021-52733999" id="cnzz_dianhua206"><span></span></a>
    <a href="<?php print AppUrl::getSwtUrl()?>" id="cnzz_jihao207" class="mr0"><span></span></a>
  </div>
  <div class="three_a clearfix">
    <a href="/" class="" id="cnzz_shouye208">首页</a>
    <a href="<?php print AppUrl::navArticle()?>" class=" " id="cnzz_zhishi209">疾病知识</a>
 </div>
  <?php if(!AppUser::getInstance()->auth->isLogined()):?>
 <div class="three_dl clearfix">
    <a href="<?php print AppUrl::userLogout()?>"><img src="<?php print AppUrl::getMediaPath()?>/images/top_nav_dl.png" class="three_dl_sm1" /></a>
    <a href="<?php print AppUrl::userRegister()?>"><img src="<?php print AppUrl::getMediaPath()?>/images/top_nav_zc.png" /></a>
 </div>
 <?php else:?>
 <?php $userinfo = AppUser::getInstance()->auth->getInfo()?>
 <div class="three_dl clearfix">
    <a style="color:#fe8100;"><?php print AppFilter::filterOut($userinfo["name"]) ?></a> 
    <a href="<?php print AppUrl::userLogout()?>" style="color:#fff;">退出</a>
 </div>
 <?php endif;?>
  <div id="percenter"> </div>
  <div class="battom_waitao"><div class="bottom_bac"></div></div>
  <div class="arrow"></div>
</div>
<input id="isShowRedPoint" type="hidden" value="">
<script src="<?php print AppUrl::getMediaPath()?>/js/nav_bar.0e2272c9.js"></script>