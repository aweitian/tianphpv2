<?php
$this->title = "医生-感谢信-上海九龙男子医院";
$this->description = "";
$this->keyword = "";

$pageSize = 5;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}
$pagination = new pagination($m->getDataCntByDod($m->data["sid"]), $page, $pageSize, 6);


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
<?php foreach($m->getLetterByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $letter):?>   

    <?php $user=$m->getNameByUid($letter["uid"]) ?>
 <?php $disname= $m->getNameByDid($letter["did"])?>
                     
                    <div class="zjtd_box4 clr">
                      <img src="<?php print AppUrl::getMediaPath()?>/images/letter.jpg"  width="60" height="60" class="fl" />
                      <div class="zjtd_box4_sm1 fr">
                          <dl>
                              <dt class="color9">
                                  <p class="fl" style="width:200px;" >患者： <span class="color3">   <?php print($user) ?>&nbsp;</span></p>
                                   <p class="fl" style="width:150px;">疾病： <span class="yellow"><?php print($disname) ?> &nbsp;</span></p>
                                  <p class="fl">疗效:<span class="yellow"> 很满意&nbsp;</span></p>
                                    <p class="fl" >态度： <span class="yellow"> 很满意</span></p>
                              </dt>
                              <dd class=" fz12">
                            <?php print(AppFilter::filterOut($letter["content"])) ?>
                              </dd>
                              <dd class="color9"><?php print($letter["date"]) ?></dd>
                          </dl>
                      </div>
                  </div>
                    
                     <?php endforeach;?>   

                    <div class="blank20"></div>  
                    <div class="pagenum tc  fz13"> 
              <?php if ($pagination->hasPre()):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a<?php print App::useTarget()?><?php if($pagination->getCurPageNum() - 1 == $i):?> class="current"<?php endif;?> href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?>
                    </div>
                     
        
                   
                                
                         <div class="blank20"></div>
                
                    
                  </div>
                  
                </div>
    			<!--left end-->	
                
                <div class="fr wid300 fz13">
                    
                	<div class="zjtd_zxfw border4">
                    	
                    	<textarea placeholder="在此简单描述病情，向<?php print $m->data["name"]?>医生提问" class="border4"></textarea>
                        <p class="blank10"></p>
                        <p class="color6"><b><?php print $m->data["name"]?>的咨询范围： </b><?php print $m->data["spec"]?>... <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="blue">[更多]</a></p>
                        <p class="blank10"></p>
                        <p><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="zjtd_rgzx tc">咨询<?php print $m->data["name"]?>医生</a></p>
                    </div>
                    
                  	<div class="blank20"></div>
                    
      				<div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="fl">医师推荐</a></div>
                        <div class="hotbqbox fz13">
                          <ul class="clearfix">
       
                                  
                                  
                                    
                          <?php foreach($m->getRandomDid(8) as $dis):?>
                  
                            <li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disHomeByDid($dis["sid"]) ?>"><?php print $dis["data"] ?></a></li>
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
 
  
 