<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月12日
 * @Desc: 
 */
$row = $model->data;
//var_dump($row);

$this->title = "【".$row["data"]."专题】".$row["data"]."专家访谈_上海九龙男子医院";
$this->keyword = "".$row["data"]."专题，".$row["data"]."专家观点";
$this->description = "上海九龙男子医院为您提供".$row["data"]."详细介绍，".$row["data"]."症状，".$row["data"]."治疗，".$row["data"]."吃什么等。更多".$row["data"]."知识，25位".$row["data"]."专家观点。";

$ext = diseaseExtInfoes::getExtData();


$pageSize = 8;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($model->getAllCnt($row["sid"]), $page, $pageSize, 6);


$req = new httpRequest();
$url = new url($req->requestUri());
?>
  
  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
        <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
          
          <div class="fz13">
            
            <div class="blank20"></div>
                
               <div class="clr">
               
               	<div class="wid680 fl">
                
                     <div class="padd20 border2">
                            	
                                <ul class="kart_list">


	<?php foreach ($model->getAll($row["sid"],$pageSize,($page-1)*$pageSize) as $item):?>   
	              <?php $dod= $model->getOwner($item["aid"])?> 
	              <?php  $doc=($model->getInfoByDod($dod))?> 
	        <?php $nuber=$model->getCountByAid($item["aid"]) ?>     
	                         <?php if (!empty($doc["name"])):?>
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($item["aid"]) ?>" class="fl kart_title"><h2><?php print utility::utf8substr($item["title"],0,12); ?></h2></a>
                                        <span class="fl kart_label1">医生观点</span></span>
                                      	<p class="fr color9">发布时间：<?php print $item["date"] ?></p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a<?php print App::useTarget()?>  href="<?php print AppUrl::docHomeByDocid($doc["id"])?>" class="blue"><?php print  $doc["name"]?> </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"><?php print utility::utf8substr($item["desc"],0,80); ?> ...<a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($item["aid"]) ?>"  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                      
                                              <a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>" ><img src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print $doc["avatar"]?>" width="80" height="80"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"  class="g_home1">个人网站</a></p>
                                              <p><a<?php print App::useTarget()?>  href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a<?php print App::useTarget()?> href="javascript:;" class="prev2"></a> <a<?php print App::useTarget()?> href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                       
                                        <a<?php print App::useTarget()?> class="g_comment" rel="nofollow">评论
                                       <?php print($nuber) ?>
                                        </a> 
                                    
                                        <a<?php print App::useTarget()?> href="<?php print AppUrl::docArticleHomeByDocid($doc["id"])?>" class="g_sub" style="margin-right:0px">查看<?php print  $doc["name"]?>的全部文章</a>、 
                                        <a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print AppUrl::getMediaPath()?>/images/jbfx_tb1.png" />
                                            <img src="<?php print AppUrl::getMediaPath()?>/images/jbfx_tb2.png" />
                                            <img src="<?php print AppUrl::getMediaPath()?>/images/jbfx_tb3.png" />
                                            <img src="<?php print AppUrl::getMediaPath()?>/images/jbfx_tb4.png" />
                                            <img src="<?php print AppUrl::getMediaPath()?>/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                <?php endif?>          
                          <?php endforeach;?>  
                                 
<div class="pagenum tc gray fz13"> <?php if ($pagination->hasPre()):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?> </div>
                                  <div class="blank15"></div>
                                </ul>

                                
                            </div>
                            
                </div>
                
    			<!--left end-->
                
               <?php include dirname(__FILE__)."/common/right.tpl.php";?>
                <!--right end-->
             </div>
            
          </div>
          <!--zjtd_con2 end-->
        
      </div>
      
      <!--fromjb end-->
      
      <div class="blank20"></div>
      
    </div>
    <!--syboxl end-->
  </div>
  <!--sybox end-->

  