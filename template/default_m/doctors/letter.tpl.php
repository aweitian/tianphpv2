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


$pagination = new pagination($m->getDataCntByDod($m->data["sid"]), $page, $pageSize, 6);


$req = new httpRequest();
$url = new url($req->requestUri());
?>
<div class="public_width">

<?php $doctors_header_title = "医生的感谢信"?>
<?php include dirname(dirname(__FILE__))."/inc/header.doc.php"?>

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

<?php foreach($m->getLetterByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $let):?> 
<?php $dis=$m->getNameByDid($let["did"])?>  
<?php $user=$m->getNameByUid($let["uid"])  ?>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>
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
<?php include dirname(dirname(__FILE__))."/inc/bottom.tpl.php";?>
</div>
<div class="box_b">
    <p class="box_center2">
        <a href="<?php print AppUrl::userWriteLetter()?>" class="btn_b1">给医生写信</a>
        <a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="btn_b2">联系医生</a>
    </p> 
</div>
</div>