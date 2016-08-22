<?php 
/**
 * zhangsihang
 * @var doctorsModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;


$this->title = "推荐专家_上海九龙男子医院";
$this->description = "汇总了患者在上海九龙男子医院的就医经验7153篇，热评疾病100多个，热评疾病的推荐大夫25位，指导患者就医，帮助您找到好大夫。";
$this->keyword = "";

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

<?php $disease_header_title = "全部医生"?>
	<?php include dirname(dirname(dirname(__FILE__)))."/inc/header.tc.php"?>

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
    <p class="mzy30  zjtd_box1_p1">医生擅长：<?php print AppFilter::filterOut(utility::utf8substr($doc["spec"],0,16)); ?>...</p>
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

<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom.tpl.php";?>
</div>


  

</div>
  