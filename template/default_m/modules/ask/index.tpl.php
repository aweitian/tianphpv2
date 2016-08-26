<?php 
/**
 * Sihangzhang
 * @var askModel;
 */
$m = $model;
$row = $m->data;

$this->title = "网上咨询男科在线专家_咨询男科医院在线医生_上海九龙男子医院";
$this->keyword = "";
$this->description = "上海九龙男子医院有25位医生根据你的病情给些相应的治疗建议，网上咨询男科在线医生，咨询男科医院在线专家，疾病查询，网上咨询疾病，咨询男科医生专家就去上海九龙男子医院。";


$pageSize = 20;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}
if ($row["sid"] == 0) {
	$all = $m->getAllQuestions(($page - 1) * $pageSize,$pageSize);
} else {
	$data = $m->getQuestionsByLv0Did($row["sid"],$pageSize,($page - 1) * $pageSize);
	$cnt = $m->getQuestionsCountByLv0Did($row["sid"]);
	$all = array(
		"count" => $cnt,
		"data"  => $data	
	);
}


$pagination = new pagination($all["count"], $page, $pageSize, 10);

// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
$req = new httpRequest();
$url = new url($req->requestUri());

?>
<div class="public_width">
	
		<?php $disease_header_title = '常见问题'?>
		<?php include dirname(dirname(dirname(__FILE__)))."/inc/header.tc.php"?>
<!--head end-->

<div class="hui_bg">

     <div class="blank20"></div>
     
     
<?php foreach ($all["data"] as $allitem):?>     
<?php $user=$m->getNameByUid($allitem["uid"])  ?>
<?php $dis=$m->getNameByDid($allitem["did"])?>

<?php $docount= $m->getAnswersDocReplyCnt($allitem["sid"]) ?>
<div class="hd_hsx"></div>
<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>"><img src="<?php print AppUrl::getMediaPath()?>/images/kp_wen.png" /><?php print AppFilter::filterOut(utility::utf8Substr($allitem["title"], 0, 16));?></a></dt>
        <dd>疾病 ：<a href="<?php print AppUrl::disHomeByDid($allitem["did"])?>"><?php print($dis) ?></a></dd>
        <dd class="clr"><span class="fl">患者：<?php print ($user) ?></span><span class="fr">共<?php print($docount) ?>条对话    <?php print utility::utf8Substr($allitem["date"], 0, 10)?></span></dd>
    </dl>
</div>
<div class="hd_hsx"></div>
<div class="blank10"></div>
<?php endforeach;?>


<div class="pagenum tc gray fz13"> 
            <?php if ($pagination->hasPre()):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?>
</div>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom.tpl.php";?>

</div>


<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom_fd_sub.tpl.php";?>
</div>
