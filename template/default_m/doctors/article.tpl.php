<?php

$this->title = "文章-找大夫咨询-上海九龙男子医院";
$this->description = "";
$this->keyword = "";
$pageSize = 10;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}
$pagination = new pagination($m->allByDodCnt($m->data["sid"]), $page, $pageSize, 6);


$req = new httpRequest();
$url = new url($req->requestUri());

?>
<div class="public_width">


<?php $disease_header_title = $m->data["name"]."医生页文章列表";?>
<?php include dirname(dirname(__FILE__))."/inc/header.tc.php"?>
<!--head end-->

<div class="hui_bg">
<?php include dirname(__FILE__)."/common/nav.tpl.php";?>

<?php foreach($m->allByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $aitem):?>           
<?php $a= $m->rowNoContent($aitem)?> 	
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>
<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="<?php print AppUrl::articleByAid($a["sid"])?>" class="blue fz28"><?php print AppFilter::filterOut(utility::utf8Substr($a["title"], 0, 15));?>...</a></dt>
        <dd><?php print AppFilter::filterOut(utility::utf8Substr( $a["desc"], 0, 65));?>...</dd>
        <dd class="kp_dd1">发表于 <?php print ($a["date"])?><span><?php echo rand(12000,15000);?>人已读</span></dd>
    </dl>
</div>
<?php endforeach;?> 
                  

<div class="hd_hsx"></div>
<div class="blank15"></div>
                       <div class="pagenum tc gray fz13"> <?php if ($pagination->hasPre()):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?></div>
<div class="blank10"></div>
<?php include dirname(dirname(__FILE__))."/inc/bottom.tpl.php";?>
</div>

</div>
 