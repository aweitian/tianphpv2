<?php
/**
 * @Author: awei.tian
 * @Date: 2016年9月2日
 * @Desc: 
 * 依赖:
 */
$row=($model->getRow());


$pageSize = 15;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}



$pagination = new pagination($model->getAidArrByTrdCnt($row["sid"]), $page, $pageSize, 7);

$req = new httpRequest();
$url = new url($req->requestUri());

?>


<div class="public_width">



<!--head end-->
  <?php $disease_header_title=$row["name"]?>
<?php include dirname((dirname(__FILE__)))."/inc/header.tc.php";?>


	<?php foreach($model->getAidArrByTrd(($row["sid"]),$pageSize,($page-1)*$pageSize) as $lb):?>
                              	<?php $list=$model->row($lb,50) ?>
                
<div class="hui_bg">
<div class="blank10"></div>
<div class="hd_hsx"></div>
<div class="kp_about  bg_fff">
	<dl class="mzy30">
    	<div class="blank20"></div>
    	<dt class="clr"><a href="<?php print  AppUrl::articleByAid($lb) ?>" class="blue fz28"><?php print utility::utf8Substr($list["title"], 0, 30) ?></a></dt>
        <dd><?php print ($list["content"]) ?></dd>
        <dd class="kp_dd1">发表于<?php print ($list["date"]) ?><span><?php print rand(1000,2000);?>人已读</span></dd>
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

<?php include dirname((dirname(__FILE__)))."/inc/bottom.tpl.php";?>
</div>
<?php include dirname((dirname(__FILE__)))."/inc/bottom_fd_sub.tpl.php";?>
</div>
<!-- bottom -->