<?php 
/**
 * Sihangzhang
 * @var articleModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;


$this->title = "疾病专题-上海九龙男子医院";
$this->description = "";
$this->keyword = "";

$pageSize = 12;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}



$pagination = new pagination($m->getAllFullCnt(), $page, $pageSize, 5);

$req = new httpRequest();
$url = new url($req->requestUri());


$a=$m->allThumbnail($pageSize,($page-1)*$pageSize);

// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
?>
<div class="public_width">

		<?php $disease_header_title = '全部文章'?>
		<?php include dirname(dirname(dirname(__FILE__)))."/inc/header.tc.php"?>

<!--head end-->

<div class="hui_bg">
<?php foreach($a as $lb):?>
<div class="blank10"></div>
<div class="hd_hsx"></div>
<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="<?php print AppUrl::articleByAid($lb["aid"])?>" class="blue fz28"><?php print utility::utf8Substr($lb["title"], 0, 16) ?></a></dt>
        <dd><?php print utility::utf8Substr($lb["desc"], 0, 60) ?>...</dd>
        <dd class="kp_dd1">发表于 <?php print utility::utf8Substr($lb["date"], 0, 10) ?><span><?php print rand(1200,3000);?>人已读</span></dd>
    </dl>
</div>
<div class="hd_hsx"></div>
<?php endforeach;?>
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
<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom.tpl.php";?>
</div>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom_fd_sub.tpl.php";?>
</div>
