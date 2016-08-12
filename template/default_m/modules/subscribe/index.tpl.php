<?php 
/**
 * @var subscribeModel;
 */

$m = $model;

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
<div class="public_width">

<div class="head_tc blue_bg">
        <a class="goback" href="" title="返回上页"><span>返回</span></a>
        <div class="head_tit" >预约挂号</div>
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
<script src="<?php print AppUrl::getMediaPath()?>/js/nav_bar.0e2272c9.js"></script>

<!--head end-->
<script src="<?php print AppUrl::getMediaPath()?>/js/guahao.js"></script>
<form name="form1" action="http://swt.gssmart.com/guahao/sockt.php" method="post" onSubmit="return guahao()" >
<div class="mzy30">
	<div class="blank30"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <label class="fl" style="width:1.5rem;">您的姓名：</label>
        <input type="text" name="名称" id="name"  class="fl" style="width:3.6rem;" />
    </div>
    <div class="blank20"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <label class="fl" style="width:1.5rem;">您的年龄：</label>
        <input type="text" name="年龄" id="age" class="fl" style="width:3.6rem;" />
    </div>
    <div class="blank20"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <label class="fl" style="width:2.1rem;">您的手机号码：</label>
        <input type="text" id="hometel" name="电话"  class="fl" style="width:3rem;" />
    </div>
    
    <div class="blank20"></div>
	<div class="yuy_warp bor_rad borddd clr">
        <select>
            <?php foreach($m->getDoctors(10) as $doc):?>
        	<option><?php print $doc["name"]; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="blank20"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <textarea placeholder="病情描述："></textarea>
    </div>
    <div class="blank20"></div>
	<div class="yuy_warp bor_rad borddd clr">
        <select>
            <?php foreach($tree_dis as $dis):?>  
        	<option><?php print ($dis["text"])?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="blank30"></div>
    <button class="login_dl bor_rad yellow_bg">提交</button>
    <div class="blank30"></div>
</div>

</form>

  
<div class="blank30"></div>
</div>