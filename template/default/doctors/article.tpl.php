<?php
$pageSize = 10;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}
$pagination = new pagination($m->allByDodCnt($m->data["sid"]), $page, $pageSize, 6);


$req = new httpRequest();
$url = new url($req->requestUri());

?>

 <?php include dirname(__FILE__)."/common/location.tpl.php";?>
      
      <div class="zjtd">
      
      <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
       
        </ul>
  
          <div class="tabcon selected fz13">
          	   <div class="blank20"></div>
               <div class="clr">
               
               <div class="wid680 fl">
               		<div class="zjtd_page_set clr">
                    	<input type="text" class="zjtd_pageset_inp1 border2 fl" />
                        <input type="button" class="zjtd_pageset_inp2 fr" value="个人网站站内搜索" />
                    </div>
                   <p class="blank20"></p>
                  <div class="norques border2">
                    <div class="zjtdwztit fz18"><span></span><?php print $m->data["name"]?>文章列表</div>
                    <p class="blank20"></p>
                    
                    <div class="zjtd_box3">
                             <?php foreach($m->allByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $aitem):?>           
                 <?php $a= $m->rowNoContent($aitem)?> 	
                        <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt><img src="<?php print AppUrl::getMediaPath()?>/images/bzdot.jpg" class="fl" /><a href="<?php print AppUrl::articleByAid($a["sid"])?>"><?php print ($a["title"])?></a> </dt>
                            <dd class="fr"> 发表于<?php print ($a["date"])?></dd>
                            <p class="blank20"></p>
                        </dl>
                    <?php endforeach;?> 
                  
                  
                        <div class="blank40"></div>
                       <div class="pagenum tc gray fz13"> <?php if ($pagination->hasPre()):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?></div>
                         <div class="blank20"></div>
                    </div>
                    
                  </div>
                  
                </div>
    			<!--left end-->	
                
                <div class="fr wid300 fz13">
                    
                	<div class="zjtd_zxfw border4">
                    	
                    	<textarea placeholder="在此简单描述病情，向<?php print $m->data["name"]?>医生提问" class="border4"></textarea>
                        <p class="blank10"></p>
                        <p class="color6"><b><?php print $m->data["name"]?>的咨询范围： </b><?php print $m->data["spec"]?>... <a href="<?php print AppUrl::getSwtUrl()?>" class="blue">[更多]</a></p>
                        <p class="blank10"></p>
                        <p><a href="<?php print AppUrl::getSwtUrl()?>" class="zjtd_rgzx tc">咨询<?php print $m->data["name"]?>医生</a></p>
                    </div>
                    
                  	<div class="blank20"></div>
                    
      				<div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师推荐</a></div>
                        <div class="hotbqbox fz13">
                          <ul class="clearfix">
       
                                  
                                  
                                    
                          <?php foreach($m->getRandomDid(8) as $dis):?>
                  
                            <li><a href="<?php print AppUrl::disHomeByDid($dis["sid"]) ?>"><?php print $dis["data"] ?></a></li>
                       <?php endforeach;?> 
                          </ul>
                        </div>
                      </div>
      
                </div>
                
                <!--right end-->
             </div>
             
          </div>
        
      </div>
      
      <!--fromjb end-->
      
      <div class="blank20"></div>
      
    </div>
    <!--syboxl end-->
  </div>
  
 