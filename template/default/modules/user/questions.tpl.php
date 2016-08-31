<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月21日
 * @Desc: 
 * 依赖:
 */
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
  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a<?php print App::useTarget()?> href="/">首页</a> > 会员中心</div>
  
  <div class="blank15"></div>
  
  
  <div class="clr">
  	<?php include dirname(__FILE__)."/common/left.tpl.php";?>
    
    <div class="fr border2 wid738 memer_box2">
  
<?php $con= $model->getQuestionsByUidCnt($userinfo) ?>

        <dl class="clr">
            <dt class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/hyfr_img1.png" /></dt>
            <dd class="fl">
                <p class="fz24">我的提问</p>
                <p class="blank10"></p>
                <p class="fz13"><?php print($con) ?>条</p>
            </dd>
        </dl>
        <div class="memer_box3">
        	<?php $data = $model->getQuestionsDataByUid($pageSize,($page-1)*$pageSize)?>
        	 	<?php if(count($data)):?>
            <table cellpadding="0" cellspacing="0" border="0">
            	<tr class="tbtr1">
                	<th width="329px">提问内容</th>
                    <th width="86px">医生</th>
                    <th width="125">时间</th>
                    <th width="54px">通过</th>
                    <th width="80px">操 作</th>
                </tr>
              <?php foreach($data as $q):?>

                <?php $con=AppFilter::filterOut($q["title"]);?>
                <?php $doc=$model->getNameByDod($q["dod"])?>
            
                <tr>
                	<td class="tbtd1 color3"><?php print ($con) ?></td>
                    <td class="color9"><?php print ($doc) ?></td>
                    <td class="color9"><?php print utility::utf8Substr($q["date"] , 0, 10) ?></td>
                    <td class="green">
<?php if(($q["v"])==1){ echo "是";}else {echo "否";}
                    ?>
                
                    </td>
                  
                  <td class="tbtd2"><?php if(!$q["v"]):?><a<?php print App::useTarget()?> onclick='return confirm("友情提醒：是否要删除！")' href="<?php print AppUrl::userRmQuestion()?>?sid=<?php print $q["sid"]?>">删除</a><?php endif?></td>      
                </tr>
               	<?php endforeach;?>
                  <?php endif?>
               
               
            </table>
             <p class="blank10"></p>
            <div class="pagenum tc gray fz13"> <?php if ($pagination->hasPre()):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?> </div>
            <div class="blank10"></div>
        </div>
        
    </div>
    
  </div>
  
  <div class="blank40"></div>
  <!--sybox end-->
  