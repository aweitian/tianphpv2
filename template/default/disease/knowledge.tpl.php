<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月12日
 * @Desc: 
 */
$row = $model->data;


$ext = diseaseExtInfoes::getExtData();





$pageSize = 8;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($model->knowledgeCnt($row["sid"],$model->subid), $page, $pageSize, 6);



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
                    
                    <div class="jb_zstab clearfix dgray fz13 color6">
                            <ul class="clr">
                              <li <?php if($model->subid =="0"):?> class="selected" <?php endif?>><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],0) ?>">全部文章</a></li>
                                <li <?php if($model->subid =="1"):?> class="selected" <?php endif?>><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],1) ?>">病因</a></li>
                         <li <?php if($model->subid =="2"):?> class="selected" <?php endif?>><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],2) ?>">症状</a></li>
                          <li <?php if($model->subid =="3"):?> class="selected" <?php endif?>><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],3) ?>">检查</a></li>
                           <li <?php if($model->subid =="4"):?> class="selected" <?php endif?>><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],4) ?>">治疗</a></li>
                          <li <?php if($model->subid =="5"):?> class="selected" <?php endif?>><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],5) ?>">危害</a></li>
                            <li <?php if($model->subid =="6"):?> class="selected" <?php endif?>><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],6) ?>">保健</a></li>
                            </ul>
                        </div>
                     
                         
                    <div class="blank20"></div>
                    	
      
      				<div class="jb_zsall">
      				
                        <div class="jb_zsbox selected">
                        <?php if( $model->subid =="0"): ?>
                      <div class="padd20 border2">
                            <div class="zjtdwztit fz18"><span></span><?php print $row["data"]?>精华文章</div>
                            <div class="blank20"></div>
                                <div class="jb_ssbox_sm2 clr">
                                <ul class="fl">
                                <?php foreach ($model->getEssenceAidByDid($row["sid"],6) as $jh):?>
                                    <li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($jh["sid"]) ?>"><?php print $jh["title"] ?></a></li>
                             <?php endforeach; ?>
                                </ul>
                            </div>
                           </div> 
                           	
                            <div class="blank20"></div>
        
                        <?php endif; ?>
                           
                            
                            <div class="padd20 border2">
                            	
                                <ul class="kart_list"> 
                                   <?php foreach ($model->knowledge($row["sid"],$model->subid,0,($page-1)*$pageSize,$pageSize, 6) as $list): ?>
                                  	<?php $tag=$model->getTag($list["tid"]) ?>
                                  
                                   
                   <?php $dod= $model->getOwner($list["aid"])?> 
                
	              <?php  $doc=($model->getInfoByDod($dod))?> 
                              <?php $nuber=$model->getCountByAid($list["aid"]) ?>     
                      
                                
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($list["aid"]) ?>" class="fl kart_title"><h2><?php print $list["title"] ?></h2></a>
                                        <span class="fl kart_label "><?php print ($tag) ?></span></span>
                                      	<p class="fr color9">发布时间：<?php print $list["date"] ?></p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?>  href="<?php print AppUrl::articleByAid($list["aid"]) ?>" class="blue"><?php print $doc["name"] ?> </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> <?php print utility::utf8Substr( $list["desc"], 0, 80)?>...<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($list["aid"]) ?>"  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($list["aid"]) ?>" ><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" width="80" height="80"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($list["aid"]) ?>"  class="g_home1">个人网站</a></p>
                                              <p><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?>  href="<?php print AppUrl::getSwtUrl(); ?>" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="javascript:;" class="prev2"></a> <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                    
                                        <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="g_comment" rel="nofollow">评论  <?php print($nuber) ?></a> 
                                
                             
                                        <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::docArticleHomeByDocid($doc["id"]); ?>" class="g_sub" style="margin-right:0px">查看<?php print $doc["name"] ?>的全部文章</a>
                                        
                                        <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl(); ?>" class="gray_a">全部咨询</a> 
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
                                  <?php endforeach; ?>
                                  <div class="blank30"></div>
                                  <div class="pagenum tc gray fz13">
                              
                        <?php if ($pagination->hasPre()):?>
        	<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?> </div>
                                  <div class="blank15"></div>
                                </ul>

                                
                            </div>
                           
                           
                           
                        </div>
                                         
                    
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
  