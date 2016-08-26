<?php
$this->title = "患者咨询-".$m->data["name"]."-找大夫咨询-上海九龙男子医院";
$this->description = "";
$this->keyword = "";


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


<?php $disease_header_title = $m->data["name"];?>
<?php include dirname(dirname(__FILE__))."/inc/header.tc.php"?>
<!--head end-->

<div class="hui_bg">
<div class="bg_fff">
	<div class="zjtd  yswd_wap">
	<div class="mzy30 zjtd_box1 clr">
    	<a href="<?php print AppUrl::docHomeByDocid($m->data["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $m->data["avatar"]?>" class="fl zjtd_xg2" style="width:.98rem; height:.98rem;" /></a>
        <dl class="fl">
        	<dt class="fz24 jbkp_zjzx clr"><b class="blue fz28"><?php print $m->data["name"]?></b></dt>
            <dd><?php print $m->data["lv"]?></dd>
        </dl>
        <dl class="fl" style="margin-left:.3rem;">
        	<dd class="color3">疗效：<span class="red">100%满意</span></dd>
            <dd class="color3">态度：<span class="red">100%满意</span></dd>
        </dl>
        <a href="<?php print AppUrl::docHomeByDocid($m->data["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/images/memer_img1.png" class="fr zjtd_box1_img4" /></a>
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
<?php $row=$m->getRowByDid($askq["did"]);?>
<div class="yswd_box1 mzy30 clr">
	<span class="color9 fl">提问标题：</span>
    <p class="fl"><?php print AppFilter::filterOut($askq["title"]); ?></p>
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
        <p><span class="blue">描述：</span><?php print AppFilter::filterOut($askq["desc"]); ?></p>
        <p><span class="blue">想获得的帮助：</span><?php print AppFilter::filterOut($askq["svr"]); ?></p>
        <p class="color9"><img src="<?php print AppUrl::getMediaPath()?>/images/yswd_img2.png" />病历资料仅医生及患者本人登录后可见 </p>
        <img src="<?php print AppUrl::getMediaPath()?>/images/ys_wd2.png" class="yswd_box2_t1" />
    </div>
    <div class="blank10"></div>
</div>

<div class="mzy30">
<?php foreach ($m->getAnswers($askid,$pageSize,($page-1)*$pageSize)as $wd):?>
<?php if($wd["role"] == "user"): ?>
	<div class="blank10"></div>
    <p class="color9 tc"><?php print $wd["date"] ?></p>
    <p class="color9 tr">患者</p>
    <div class="blank10"></div>
    <div class="yswd_box2">
        <div class="blank10"></div>
        <p><span class="blue">
        <?php if($wd["conmeta"] == "text"):?>
                            <?php print AppFilter::filterOut($wd["content"]); ?>
                            <?php else:?>
		          	
		                 	<?php $tmp = explode(",", $wd["content"]);?>
		                	<i class="fa fa-gift" style="font-size:28px;"></i> <?php print $tmp[1]?><br>
		          	
		                	<img style="width:64px;height:64px;" src="<?php print AppUrl::getMediaPath()?>/present/<?php print $tmp[0]?>">
        
		          	
		                	<?php endif;?>
        </span></p>
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
<?php endif;?>
<?php endforeach; ?>
</div>

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
    <h2 class="title_name_lan"><?php print ($dis) ?><b class="fz28 color3">的相关咨询</b><a href="<?php print AppUrl::disAskByDiseasekey($row["key"])?>" class="fr blue">+更多</a></h2>
</div>
<div class="bg_fff">
	<div class="kp_about  bg_fff">


	<?php foreach ($m->getQuestionsByDid($askq["did"],5,0) as $ask): ?>
	<?php $docount= $m->getAnswersDocReplyCnt($ask["sid"]) ?>
	<dl class="mzy30">
    	<div class="blank20"></div>
        <dd class="clr color9"><a href="<?php print AppUrl::askByAsdDocidAsd($docid, $ask["sid"]);?>"><span class="fl"><?php print $m->utf8cut($ask["title"],0,16)?></span><span class="fr yellow"><img src="<?php print AppUrl::getMediaPath()?>/images/yswd_img3.png" /><?php print($docount) ?></span></a></dd>
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
    <h2 class="title_name_lan"><?php print ($dis) ?><b class="fz28 color3">的相关文章</b><a href="<?php print AppUrl::disKnowledgeByDiseasekey($row["key"])?>" class="fr blue">+更多</a></h2>
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
<?php include dirname(dirname(__FILE__))."/inc/bottom.tpl.php";?>
</div>

<?php include dirname(dirname(__FILE__))."/inc/bottom_fd_ys.tpl.php";?>

</div>


<div class="ask_ys"><a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;"></a></div> 

 