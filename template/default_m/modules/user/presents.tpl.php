<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月21日
 * @Desc: 
 * 依赖:
 */
$m = $model;
$userinfo = AppUser::getInstance()->auth->getInfo();
?>
<div class="public_width">

<div class="head_tc blue_bg">
        <a class="goback" href="" title="返回上页" onclick="history.go(-1)"><span>返回</span></a>
        <div class="head_tit" ><?php print $userinfo["name"]?>送的礼物</div>
    <a href="<?php print AppUrl::userLogout()?>" class="fr login_top bor_rad green_topbg">退出</a>
  </div>
<div class="black_bg"></div>


<!--head end-->

<div class="mzy30">
	<div class="blank30"></div>
	
    <div class="pj_con borddd clr">
    	<h5 class="fz24 color9 plr20 fw400"><span class="fl">To:<a href="#">陈希球</a>医生</span><span class="fr">2016.06.05</span></h5>
        <div class="blank20"></div>
        <p class="plr20 fz28">昨天检查前列腺炎好了，可还是早泄,请问医生，我该怎么治疗。</p>
        <div class="blank20"></div>
        <h6 class="plr20 clr fz24 fw400"><span class="fl color9">通过：<b class="fw400 green">是</b></span><a href="" class="fr">删除</a><a href="" class="fr">编辑</a></h6>
    </div>
    <div class="blank10"></div>
   
    
    
</div>
<div class="blank30"></div>
</div>