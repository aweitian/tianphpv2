           <div class="fr wid300 fz13">
                	
                    <div class="doctj border2">
    
    <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师推荐</a><a class="fz13 blue fr" href="<?php print AppUrl::navDoctors() ?>">+更多</a></div>
    <div class="doctjbox">
<?php foreach($model->getInfoes(3,0) as $doc):?>
      	      <dl class="clearfix"><dt class="fl"><a href="/zdz"><img src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print ($doc["avatar"])?>" width="80" height="80" /></a></dt>
      <dd class="fl">
      <p class="blank5"></p>
      <p class="fz18"><?php print ($doc["name"])?><span class="gray fz13"><?php print ($doc["lv"])?></span></p>
      <p class="blank5"></p>
      <p class="fz13 gray">擅长：<?php print utility::utf8Substr($doc["spec"],0,20)?></p>
      <p class="blank5"></p>
      <p class="p3 tc"><a href="<?php print AppUrl::getSwtUrl() ?>" onClick="openZoosUrl();return false;">咨询</a></p>
      </dd></dl>
      
    <?php endforeach;?>
      	
      
      </div>
    
    
    
    </div>
                      
                  <div class="blank20"></div>

                    <div class="syrbox5 border2">
                    <div class="syrboxtit fz18 graybg">相关问答<a href="<?php print AppUrl::navAsk() ?>" class="blue fz13 fr">+更多</a></div>
                    
                    <div class="zjtd_r2">
                    	<div class="blank10"></div>
                    	
                      
                    <?php $y=1;?>	
                    	<?php $asks = $model->getAllQuestions(0,4);foreach($asks["data"] as $ask):?>
                        <dl <?php if($y==1){?> class="selected"<?php } ?> >
                          <dt class="fz18 blue"><a<?php print App::useTarget()?> href="<?php print AppUrl::askByAsdDocid($ask["dod"], $ask["sid"])?>"><?php print utility::utf8Substr($ask["title"],0,16);?></a></dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img7.png" class="fl" /><p class="fl">
                            <a<?php print App::useTarget()?> href="<?php print AppUrl::askByAsdDocid($ask["dod"], $ask["sid"])?>">
                            <?php $content = $model->getAnswerByAskid($ask["sid"]);
                             print empty($content) ? "" : utility::utf8Substr($content["content"], 0, 25)?>...
                            </a>
                            </p>
                          </dd>
                        </dl>
                   <?php $y++;?>      
<?php endforeach;?>
                         
                        
                         
                        
                      </div>
                    
                    <div class="zjtd_r3 clr"><a href="<?php print AppUrl::getSwtUrl() ?>" onClick="openZoosUrl();return false;">立刻咨询</a></div>
                    <div class="blank20"></div>
                  </div>
                	
                    <div class="blank20"></div>
             <?php include dirname(dirname(dirname(__FILE__)))."/default/inc/guahao.tpl.php"?>
                </div>
                
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
 