<?php
//aid,kw,desc,thumb,title,content,date
$aid = intval($_REQUEST["id"]);

$data = $m->row($aid);

if(empty($data)){
	exit("removed.");
}
defTplData::getInstance()->title = $data["title"];
defTplData::getInstance()->keyword = $data["kw"];
defTplData::getInstance()->description = $data["desc"];
// 	["sid"]=> string(1) "7" 
// 	["id"]=> string(3) "cxq"
// 	["name"]=> string(9) "陈希球" 
// 	["lv"]=> string(7) "ccccccc" 
// 	["avatar"]=> string(7) "cxq.jpg" 
// 	["date"]=> string(10) "2016-05-16" 
// 	["dod"]=> string(1) "7" 
// 	["dlv"]=> string(1) "3" 
// 	["start"]=> string(1) "0" 
// 	["hot"]=> string(1) "0" 
// 	["love"]=> string(1) "0" 
// 	["contribution"]=> string(1) "0" 
// 	["desc"]=> string(3) "doc" 
// 	["spec"]=> string(4) "spce" }

?>
<div class="public_width">

<?php $doctors_header_title = ""?>
<?php include dirname(dirname(__FILE__))."/inc/header.doc.php"?>
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
        <a href="<?php print AppUrl::docHomeByDocid($m->data["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/images/memer_img1.png" class="fr zjtd_box1_img4" /></a>
    </div>
    <div class="blank20"></div>
    
</div>
</div>
<div class="hd_hsx"></div>

<div class="mzy30">
	<div class="blank25"></div>
	<h5 class="fz28 color3"><?php print $data["title"]?></h5>
    <div class="blank30"></div>
    <div class="hd_xhsx"></div>
    <div class="blank30"></div>
    <div class="color9"><span class="fl">发表于 <?php print $data["date"]?></span><span class="fr">已阅读<?php print rand(10000,13000);?>次</span></div>
    <div class="blank30"></div>
    <div class="jbkp_page">
        <?php print ($data["content"])?>
        <div class="jbkp_page_zx">
        	<a href="" class="fl kp_bn1">赞赏(<?php print rand(300,600);?>)</a>
        </div>
        <div class="blank30"></div>
    </div>
   
    
</div>

<?php $did=$m->getFirstDid($data["aid"]) ?>
<?php if ( $did !== 0 ) { ?>
<?php $dis=$m->getNameByDid($did) ?>
<div class="blank10"></div>
<div class="index_hotzx">
    <h2 class="title_name_lan"><?php print ($dis) ?><b class="fz28 color3">的相关文章</b><a href="" class="fr blue"><img src="<?php print AppUrl::getMediaPath()?>/images/index_hyh.png" />换一换</a></h2>
</div>



  <div class="bg_fff">
	<div class="yswd_jb bg_fff">
   <div class="mzy30">
       <?php foreach ($m->getAll($did,5) as $wz):?>
    	
    	
        <p class="clr"><a href="<?php print AppUrl::articleByAid($wz["aid"]) ?>" class="color3"><?php print $m->utf8cut($wz["title"],0,16)?></a></p>
        <div class="hd_hsx"></div>
        <?php endforeach; ?>
    </div>
    </div>
    </div>


<div class="blank10"></div>
<div class="index_hotzx">
    <h2 class="title_name_lan"><?php print ($dis) ?><b class="fz28 color3">的相关疾病</b></h2>
</div>
<div class="bg_fff">
	<div class="yswd_jb bg_fff">
        <div class="mzy30">
           <?php foreach($m->getRandomDid(5) as $dis):?>                  	
            <p class="clr"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disHomeByDid($dis["sid"]) ?>" class="fl"><?php print $dis["data"] ?></a><a href="<?php print AppUrl::disHomeByDid($dis["sid"]) ?>"><img src="<?php print AppUrl::getMediaPath()?>/images/memer_img1.png" class="fr" /></a></p>
            <div class="hd_hsx"></div>    
            <?php endforeach;?>

            
         </div>
    </div>
    <div class="hd_hsx"></div>
</div>
<?php } ?>


<div class="blank10"></div>

<?php include dirname(dirname(__FILE__))."/inc/bottom.tpl.php";?>
</div>
<div style="height:1rem;"></div>
<div class="box_e">
    <p class="box_center2">
        <a href="<?php print AppUrl::getSwtUrl()?>" class="btn_e1" >预约挂号</a>
        <a href="tel:021-52733999" class="btn_e2">电话咨询</a>
        <a href="<?php print AppUrl::getSwtUrl()?>" class="btn_e3">在线咨询</a>
    </p> 
</div>

</div>


  
<?php 

  $doc_img=$m->data["avatar"];
  $doc_name=$m->data["name"];
  $doc_desc=$m->data["desc"];
  $doc_spec=$m->data["spec"];
  
  ?>
  <?php if(!utility::isMobile()):?>
 <?php include dirname(dirname(__FILE__))."/template/default/bottom_swt.tpl.php";?>
 <?php endif?>