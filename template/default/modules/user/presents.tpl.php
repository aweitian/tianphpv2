<?php
/**
 * @Author: zhangsihang
 * @Date: 2016年8月18日
 */
$userinfo = AppUser::getInstance()->auth->getInfo();

$pageSize = 5;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}

$pagination = new pagination($model->getPresentDataByUidCnt($userinfo["sid"]), $page, $pageSize, 10);

$req = new httpRequest();
$url = new url($req->requestUri());

?>
  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="/">首页</a> > 会员中心</div>
  
  <div class="blank15"></div>
  
  
  <div class="clr">
  	<?php include dirname(__FILE__)."/common/left.tpl.php";?>
    
    <div class="fr border2 wid738 memer_box2">

        <dl class="clr">
            <dt class="fl" style="margin-top:10px;"><img src="<?php print AppUrl::getMediaPath()?>/images/hyfr_img3.png" /></dt>
            <dd class="fl">
                <p class="fz24">心意礼物 </p>
                <p class="blank10"></p>
              
            </dd>
        </dl>
        <div class="memer_box3">
        	<?php $data = $model->getPresentDataByUid($pageSize,($page-1)*$pageSize)?>
        	 	<?php if(count($data)):?>
            <table cellpadding="0" cellspacing="0" border="0">
            	<tr class="tbtr1">
                    <th width="135px">时间</th>
                    <th width="135">医生</th>
                    <th width="135px">礼物</th>
                    <th width="135px">礼物名称</th>
                    <th width="134px">通过</th>
                     <th width="134px">操作</th>
                </tr>
                
                  <?php foreach($data as $q):?>
      
                <?php $doc=$model->getNameByDod($q["dod"])?> 
                   
                <?php $pid=$model->row($q["pid"]) ?>          
                <tr>
                	<td class="color9"><?php print utility::utf8Substr($q["date"], 0, 10)  ?></td>
                    <td class="color6"><?php print ($doc) ?></td>
                    <td><img src="<?php print AppUrl::getMediaPath()?>/images/<?php print $pid["avatar"] ?>" /></td>
                    <td class="fhs"><?php print $pid["data"] ?></td>
                    <td class="fhs"><?php if(($q["v"])==1){ echo "是";}else {echo "否";}
                    ?></td>
                    
                      <td class="tbtd2"><?php if(!$q["v"]):?><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> onclick='return confirm("友情提醒：是否要删除！")' href="<?php print AppUrl::userRmPresents()?>?sid=<?php print $q["sid"]?>">删除</a><?php endif?></td>      
                </tr>
               	<?php endforeach;?>
                  <?php endif?> 
            
                
            </table>
              <p class="blank10"></p>
            <div class="pagenum tc gray fz13"> <?php if ($pagination->hasPre()):?>
        	<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?> </div>
            <div class="blank10"></div>
        </div>
        
    </div>
    
  </div>
  
  <div class="blank40"></div>