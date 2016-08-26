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


$pagination = new pagination($m->getDataByDodCnt($m->data["sid"]), $page, $pageSize, 6);


$req = new httpRequest();
$url = new url($req->requestUri());
?>
<div class="public_width">



<?php $disease_header_title = $m->data["name"]."医生的评价";?>
<?php include dirname(dirname(__FILE__))."/inc/header.tc.php"?>
<!--head end-->

<div class="hui_bg">
<div class="bg_fff">
		<div class="blank30"></div>
        <div class="fz28 color3 tc">诊治过的患者：<span class="yellow"><?php echo rand(3000,6000);?></span>例</div>
    <div class="blank30"></div>
 </div>



<?php foreach($m->getDataByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $dodpj):?> 
<?php $a=appraiseLvMeta::getMeta() ?>
<?php $b= $m->getNameByDid($dodpj["did"])?> 
<?php $c=$m->getNameByUid($dodpj["uid"])  ?>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>
<div class="kp_about  bg_fff">
	<dl class="mzy30 fz26">
    	<div class="blank20"></div>
        <dd class="clr color3 "><span class="fl"> 患者：<?php print ($c) ?></span><span class="fr"><?php print ($dodpj["date"]) ?></span></dd>
    	<dt class="clr">所患疾病：<a href="<?php print AppUrl::disHomeByDid($dodpj["did"])?>" class="yellow"><?php print ($b)  ?></a>&nbsp;&nbsp;&nbsp;&nbsp;满意度：<span class="yellow"><?php print ($a[$dodpj["lv"]]) ?></span></dt>
        <div class="blank15"></div>
        <div class="hd_hsx"></div>
        <div class="blank15"></div>
        <dd class="color3 fz22"><?php print AppFilter::filterOut(utility::utf8substr($dodpj["txt"],0,40)); ?></dd>
        <div class="blank15"></div>
        <dd class="clr color9"><?php print ($dodpj["date"]) ?></dd>
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


<div class="blank10"></div>
<?php include dirname(dirname(__FILE__))."/inc/bottom.tpl.php";?>
</div>
<?php include dirname(dirname(__FILE__))."/inc/bottom_fd_sub.tpl.php";?>
</div>