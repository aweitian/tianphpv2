<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月12日
 * @Desc: 
 */

$row = $model->data;

$row = $model->data;
$this->title = "".$row["data"]."专家咨询_".$row["data"]."最新问题_上海九龙男子医院";
$this->keyword = "".$row["data"]."咨询，".$row["data"]."在线咨询，".$row["data"]."网上咨询，".$row["data"]."专家咨询，".$row["data"]."电话咨询";
$this->description = "上海九龙男子医院为您提供".$row["data"]."咨询，".$row["data"]."网上咨询，".$row["data"]."专家咨询，".$row["data"]."电话咨询。为您解答".$row["data"]."相关问题";

$pageSize = 8;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}

	$data = $model->getQuestionsByDid($row["sid"],$pageSize,($page - 1) * $pageSize);
	$cnt = $model->getQuestionsByDidCnt($row["sid"]);
	$all = array(
			"count" => $cnt,
			"data"  => $data
	);


$pagination = new pagination($all["count"], $page, $pageSize, 10);

// foreach($m->getDisease() as $item)
	// {


// }

// exit;
$req = new httpRequest();
$url = new url($req->requestUri());

// var_dump($row);
$ext = diseaseExtInfoes::getExtData();
$a=Appctrl::$msg->getControl()



?>
 <div class="public_width">

<?php $disease_header_title = $row["data"];?>
<?php include dirname(dirname(__FILE__))."/inc/header.tc.php"?>

<!--head end-->

<div class="hui_bg">

	<div class="blank30"></div>
    <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
     <div class="blank20"></div>

<?php foreach ($all["data"] as $allitem):?>
<?php $user= $model->row($allitem["uid"])?> 
<?php $doc= $model->getInfoByDod($allitem["dod"])?> 
<?php $ans = $model->getAnswerByAskid($allitem["sid"])?>   
<?php $docount= $model->getAnswersDocReplyCnt($allitem["sid"]) ?>

<div class="hd_hsx"></div>
<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>"><img src="<?php print AppUrl::getMediaPath()?>/images/kp_wen.png" /><?php print $allitem["title"]?></a></dt>
        <dd>疾病 ：<a href="<?php print AppUrl::disHomeByDid($allitem["did"])?>"><?php print $row["data"]?></a></dd>
        <dd class="clr"><span class="fl">患者：<?php print $user["name"]?></span><span class="fr">共<?php print($docount) ?>条对话    <?php print utility::utf8Substr($allitem["date"], 0, 10)?></span></dd>
    </dl>
</div>
<div class="hd_hsx"></div>
<div class="blank10"></div>
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
<div class="blank15"></div>

<?php include dirname(dirname(__FILE__))."/inc/bottom.tpl.php";?>
</div>

<div class="box_a">
    <p class="box_center2">
        <a href="tel:021-52733999" class="btn_a1" >预约通话</a>
        <a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="btn_a2">免费咨询</a>
    </p> 
</div>


</div>