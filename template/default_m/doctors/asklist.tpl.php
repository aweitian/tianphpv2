<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月13日
 * @Desc: 
 */
$this->title = "患者服务区-".$m->data["name"]."-找大夫咨询-上海九龙男子医院";
$this->description = "";
$this->keyword = "";

$pageSize = 6;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($m->getQuestionsCountByDod($m->data["sid"]), $page, $pageSize, 6);



$req = new httpRequest();
$url = new url($req->requestUri());


?>
<div class="public_width">

<?php $disease_header_title = $m->data["name"]."医生咨询列表";?>
<?php include dirname(dirname(__FILE__))."/inc/header.tc.php"?>

<!--head end-->

<div class="hui_bg">
<?php include dirname(__FILE__)."/common/nav.tpl.php";?>

<?php foreach ($m->getQuestionsByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $ask): ?>
 
<?php $user=$m->getNameByUid($ask["uid"])  ?>
<?php $dis=$m->getNameByDid($ask["did"])?>
        
<?php $count=$m->getAnswersCnt($ask["sid"]) ?>
<?php $docount= $m->getAnswersDocReplyCnt($ask["sid"]) ?>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="hd_hsx"></div>
<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="<?php print AppUrl::askByAsdDocidAsd($m->data["id"], $ask["sid"])?>"><img src="<?php print AppUrl::getMediaPath()?>/images/kp_wen.png" /><?php print AppFilter::filterOut(utility::utf8Substr($ask["title"], 0, 18));?></a></dt>
        <dd>疾病 ：<a href="<?php print AppUrl::disHomeByDid($ask["did"])?>"><?php print($dis) ?></a></dd>
        <dd class="clr color9"><span class="fl">患者： <?php print ($user) ?></span><span class="fr">共<?php print($docount) ?>条对话   <?php print utility::utf8Substr($ask["date"], 0, 10)?></span></dd>
    </dl>
</div>
 <?php endforeach; ?>  
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
<div class="blank30"></div>
<?php include dirname(dirname(__FILE__))."/inc/bottom.tpl.php";?>
</div>

</div>
  