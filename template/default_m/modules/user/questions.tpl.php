<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月21日
 * @Desc: 
 * 依赖:
 */
$m = $model;
$userinfo = AppUser::getInstance()->auth->getInfo();
$pageSize = 5;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}

$pagination = new pagination($model->getQuestionsByUidCnt($userinfo["sid"]), $page, $pageSize, 10);

$req = new httpRequest();
$url = new url($req->requestUri());
?>
<div class="public_width">

<div class="head_tc blue_bg">
        <a class="goback" href="" title="返回上页" onclick="history.go(-1)"><span>返回</span></a>
        <div class="head_tit" ><?php print $userinfo["name"]?>的提问</div>
    <a href="<?php print AppUrl::userLogout()?>" class="fr login_top bor_rad green_topbg">退出</a>
  </div>
<div class="black_bg"></div>


<!--head end-->

<div class="mzy30">
	<div class="blank30"></div>
	<?php $data = $model->getQuestionsDataByUid($pageSize,($page-1)*$pageSize)?>
	<?php if(count($data)):?>
	<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="dgreen" href="<?php print AppUrl::navPut()?>" style="color:#ff8800;">我要提问</a>
	<?php foreach($data as $q):?>
    <?php $con=AppFilter::filterOut($q["title"]);?>
    <?php $doc=$model->getNameByDod($q["dod"])?>
    <div class="pj_con borddd clr">
    	<h5 class="fz24 color9 plr20 fw400"><span class="fl">To:<a href="<?php print AppUrl::docHomeByDod($q["dod"]);?>"><?php print ($doc) ?></a>医生</span><span class="fr"><?php print utility::utf8Substr($q["date"] , 0, 10) ?></span></h5>
        <div class="blank20"></div>
        <p class="plr20 fz28"><?php print utility::utf8Substr($con, 0, 50)?>...</p>
        <div class="blank20"></div>
        <h6 class="plr20 clr fz24 fw400"><span class="fl color9">通过：<b class="fw400 green"><?php if(($q["v"])==1){ echo "是";}else {echo "否";}?></b></span><?php if(!$q["v"]):?><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> onclick='return confirm("友情提醒：是否要删除！")' href="<?php print AppUrl::userRmQuestion()?>?sid=<?php print $q["sid"]?>" class="fr">删除</a><?php endif?></h6>
    </div>
    <div class="blank10"></div>
    <?php endforeach;?>
    
    <div class="pagenum tc gray fz13"> <?php if ($pagination->hasPre()):?>
        	<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?> </div>
    
    <?php else:?> 
           		您还没有提过问题，<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="dgreen" href="<?php print AppUrl::navPut()?>" style="color:#ff8800;">现在就提问</a>
           <?php endif?>
    
    
</div>
<div class="blank30"></div>
</div>