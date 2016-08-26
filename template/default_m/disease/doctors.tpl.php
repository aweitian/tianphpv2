<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月12日
 * @Desc: 
 */

$row = $model->data;

$this->title = "【".$row["data"]."专家推荐】治疗".$row["data"]."最好的专家_1156位_".$row["data"]."专家排行榜_上海九龙男子医院";
$this->keyword = "".$row["data"]."专家，治疗".$row["data"]."最好的专家，".$row["data"]."专家排行榜";
$this->description = "上海九龙男子医院推荐25位治疗".$row["data"]."最好的专家。上海九龙男子医院".$row["data"]."专家排行榜由".$row["data"]."患者投票得出。去医院看".$row["data"]."前，可通过电话咨询，提前与".$row["data"]."专家沟通。通过预约挂号，可获得".$row["data"]."专家面诊资格。";

// var_dump($row);
$ext = diseaseExtInfoes::getExtData();


$pageSize = 6;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($model->getAllCnt($row["sid"]), $page, $pageSize, 6);


$req = new httpRequest();
$url = new url($req->requestUri());
?>
 <div class="public_width">
 
<?php $disease_header_title = $row["data"];?>
<?php include dirname(dirname(__FILE__))."/inc/header.tc.php"?>

<!--head end-->

<div class="hui_bg">

	<div class="blank30"></div>
    <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
     <div class="blank20"></div>
<div class="hd_hsx"></div>

<?php foreach($model->getDoctors($pageSize,($page-1)*$pageSize) as $doc):?>
<div class="zjtd">
	<div class="mzy30 zjtd_box1">
    	<a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" class="fl zjtd_box1_img1" /></a>
        <dl class="fl">
        	<dt class="fz24 jbkp_zjzx clr"><b class="color3 fz28"><a herf="<?php print AppUrl::docHomeByDocid($doc["id"])?>" class="doc_name"><?php print $doc["name"]; ?></a></b><a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;"><img src="<?php print AppUrl::getMediaPath()?>/images/kp_yy.png" class="img_width" /></a><a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;"><img src="<?php print AppUrl::getMediaPath()?>/images/kp_zx.png" class="img_width" /></a></dt>
            <dd><?php print $doc["lv"]; ?></dd>
            <dd>患者推荐热度：<span class="red"><?php print $doc["hot"]; ?></span><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img3.png" /></dd>
        </dl>
        <a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img2.png" class="fr zjtd_box1_img2" /></a>
    </div>
    <div class="blank20"></div>
    <div class="mzy30 fz22">
        <div class="hd_hsx"></div>
        <div class="zjtd_box1_p2 clr">
        <p class="fl">疗效：<img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><span class="red">100%满意</span></p>
        <p class="fr">态度：<img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><img src="<?php print AppUrl::getMediaPath()?>/images/star_man.png" /><span class="red">100%满意</span></p>
        </div>
        <div class="hd_hsx"></div>
        <p class="zjtd_box1_p1">擅长项目：<?php print utility::utf8substr($doc["spec"],0,20); ?> ...</p>
    </div>
</div>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>
<?php endforeach;?>


                        <div class="pagenum tc gray fz13">  <?php if ($pagination->hasPre()):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?>  </div>


<?php include dirname(dirname(__FILE__))."/inc/bottom.tpl.php";?>


</div>
<?php include dirname(dirname(__FILE__))."/inc/bottom_fd_sub.tpl.php";?>
</div>
