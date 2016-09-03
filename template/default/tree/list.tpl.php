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

    <div id="focusindex">
    <ul class="index_banner_box clearfix">
      <li><a onClick="openZoosUrl();return false;" href="javascript:void(0)"><img src="/static/pc/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a onClick="openZoosUrl();return false;" href="javascript:void(0)"><img src="/static/pc/images/998x238.jpg" width="998" height="238" /></a></li>
    
    </ul>
  </div>  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a <?php print App::useTarget()?> href="<?php print AppUrl::articleByChannel($row["url"])?>" class="blue"><?php print($row["name"]); ?></a></div>
  
  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
      	
        
          
          <div class="fz13">
                
               <div class="clr">
               
               	<div class="wid680 fl">
                    <div class="padd20 border2">

                        
                        <div class="zt_box3">
                        	
                            <ul class="clr">
                           
                              	<?php foreach($model->getAidArrByTrd(($row["sid"]),$pageSize,($page-1)*$pageSize) as $lb):?>
                              	<?php $list=$model->row($lb,80) ?>
                           	<li>
                                	<a href="<?php print  AppUrl::articleByAid($lb) ?>"><?php print utility::utf8Substr($list["title"], 0, 30) ?></a>
                                    <p><?php print ($list["content"]) ?>...</p>
                                </li>
                                
                            
                                   	<?php endforeach;?>
                                                  
                            </ul>
                            
                        </div>
                        
                        <div class="blank35"></div>
                        <div class="pagenum tc  fz13">     <?php if ($pagination->hasPre()):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a<?php print App::useTarget()?><?php if($pagination->getCurPageNum() - 1 == $i):?> class="current"<?php endif;?> href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?>
       		</div>
                	</div>
                </div>
               
               
    			<!--left end-->
    <?php include dirname(__FILE__)."/right.tpl.php";?>
            
 
  
