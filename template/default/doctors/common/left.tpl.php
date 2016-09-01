    <div class="fr wid300 fz13">             
                	<div class="hotbq border2">
                	  <div class="syrboxtit fz18 graybg clearfix"><a target="_blank" class="fl"><?php print $m->data["name"]?>大夫的信息</a></div>
                	  <div class="ysxx fz13">
                	    <ul>
                          <li>感谢信： <b><?php print $m->getDataCntByDod($m->data["sid"]) ?></b><img src="<?php print AppUrl::getMediaPath()?>/images/syjytb2.jpg">　　礼物： <b><?php print $m->getDataByDodCntall($m->data["sid"]) ?></b></li>
                          <li>咨询量： <b><?php print $m->getQuestionsCountByDod($m->data["sid"]) ?></b> 条</li>
                          <li>医院： 上海九龙男子医院</li>
                        </ul>
              	    </div>
                
              	  </div>
                	<div class="blank20"></div>
               
             
                	<div class="zjtd_zxfw border4">
                    	<textarea placeholder="在此简单描述病情，向陈希球医生提问" class="border4"></textarea>
                        <p class="blank10"></p>
                        <p class="color6"><b><?php print($m->data["name"]) ?>的咨询范围： </b><?php print($m->data["spec"]) ?>... <a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="blue">[更多]</a></p>
                        <p class="blank10"></p>
                        <p><a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="zjtd_rgzx tc">咨询<?php print($m->data["name"]) ?>医生</a></p>
                    </div>
                    
                  	<div class="blank20"></div>
              <div class="syrbox5 border2">
        <div class="syrboxtit fz18 graybg">大家都在送什么?</div>
        <div class="syrbox5nr">
          <div class="syrbox5nr_1" id="toplw">

       <?php foreach ($m->getPresentDataByDod($m->data["sid"],5,0) as $lw):?>
                
              <?php $user=$m->getNameByUid($lw["uid"]);?>

            <?php $pre=$m->rowpid($lw["pid"]);?>      
         
            <?php $doc=($m->getDocRowByDod($lw["dod"]))?> 
            <dl class="clearfix" >
              <dt class="fl"><img src="<?php print AppUrl::getMediaPath()?>/present/<?php print $pre["avatar"]?>" width="61" height="57" /></dt>
              <dd class="fl">
                <p class="ddp1"><strong><a href="<?php print AppUrl::docHomeByDod($lw["dod"])?>"><?php print $doc["name"]; ?></a></strong>医生收到了<strong>
               
                <?php print preg_replace("/^(\d{3})-?\d{4}(\d{4})$/","$1****$2",$user); ?>
                
                </strong>精心挑选的礼物<strong><?php print $pre["data"]?></strong>医生爱心值+<?php print $pre["cost"]?></p>
                <p class="ddp2 fr blue"><a<?php print App::useTarget()?> href="<?php  print AppUrl::docPresentHomeByDocid($doc["id"]); ?>">我也要送</a></p>
              </dd>
            </dl>
            <?php endforeach;?>
 
 
           
                      </div>
        
        </div>
      </div>
  <div class="blank20"></div>
    <!--syboxr end--> 
     <div class="syrbox5 border2">
                    <div class="syrboxtit fz18 graybg"><?php print $m->data["name"]?>医生的最新咨询<a<?php print App::useTarget()?> href="<?php print AppUrl::docAskHomeByDocid($m->data["id"])?>" class="blue fz13 fr">+更多</a></div>
<div class="zjtd_r2">
                    	<div class="blank10"></div>
                    
              
                    
                    
               
        <?php $x=1;?>            	
                    <?php foreach($m->getQuestionsByDod($m->data["sid"],8) as $ask):?> 
          
                  <?php $ans = $m->getAnswerByAskid($ask["sid"])?>

               
                        <dl <?php if($x==1){?> class="selected"<?php }?>>
                          <dt class="fz18 blue"><a<?php print App::useTarget()?> href="<?php print AppUrl::askByAsdDocidAsd($m->data["id"], $ask["sid"])?>"><?php print utility::utf8Substr($ask["title"],0,15) ?></a></dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img7.png" class="fl" /><p class="fl"><?php if (!empty($ans["content"]))  :?>
                             
                             <a<?php print App::useTarget()?> href="<?php print AppUrl::askByAsdDocidAsd($m->data["id"], $ask["sid"])?>">
                            <?php 
                             print empty($ans) ? "" : utility::utf8Substr($ans["content"], 0, 25)?>...
                            </a>
                             <?php endif; ?>...</p>
                          </dd>
                        </dl>
                      <?php $x++;?>
                         <?php endforeach; ?> 
                      
                      
                      
                      </div>
                    
                    <div class="zjtd_r3 clr"><a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;">立刻咨询</a></div>
                 
      </div>
       <div class="blank20"></div>             
      				<div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a<?php print App::useTarget()?> class="fl">医师推荐</a></div>
                        <div class="hotbqbox fz13">
                          <ul class="clearfix">
                                     
                          <?php foreach($m->getRandomDid(12) as $dis):?>
                  
                            <li><a<?php print App::useTarget()?> href="<?php print AppUrl::disHomeByDid($dis["sid"]) ?>"><?php print $dis["data"] ?></a></li>
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
  <!--sybox end-->
