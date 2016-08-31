  <div class="fr wid300 fz13">
                	
                    <div class="jb_rg">
                        <textarea placeholder="在此咨询，专业医师在线提供就医指导" class="jb_rg1 fl color9"></textarea>
                        <input type="button" class="jb_rg2 fl" />
                    </div>
                	
                   <div class="blank20"></div>
                	
                    <div class="docsug border2">
                      <div class="syrboxtit fz18 graybg clearfix"><a<?php print App::useTarget()?> class="fl">医师观点</a><a<?php print App::useTarget()?> class="fz13 blue fr" href="<?php print AppUrl::navArticle()?>">+更多</a></div>
    <div class="docsugbox fz13">
    
    <?php $thumb = $model->getRowThumbnail();?>
   
    <?php if (!empty($thumb)):?>
   
    <dl class="clearfix">
    	<dt class="fl">
    			<?php if (!empty($a1["thumb"])):?>
                        	<a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($thumb["aid"])?>">
    		<img src="<?php print $thumb["thumb"]?>" width="80" height="60" />
    		</a>
                        	<?php else:  ?>
                        	<img src="<?php print AppUrl::getMediaPath()?>/images/zt_img1.jpg" width="80" heigth="80" />
                        	           <?php endif?>
    	</dt>
      <dd class="fl">
      <p><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($thumb["aid"])?>"><?php print $thumb["title"]?></a></p>
      
      <p class="p2 clearfix">
      <a<?php print App::useTarget()?> class="fl gray"><?php print $thumb["date"]?></a>
      </p>
      </dd>
      </dl>
      <?php endif?>
      
      <p class="blank15"></p>
      <ul class="othsug">
      	
          
          	
       <?php foreach($model->getNewest(5) as $aitem):?>  
       <?php $dod= $model->getOwner($aitem["aid"])?> 
	              <?php  $doc=($model->getInfoByDod($dod))?> 
   <?php if (!empty($doc["name"])):?>
      <li><p class="p1"><a<?php print App::useTarget()?> class="black" href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print utility::utf8Substr($aitem["title"], 0, 18) ?></a></p><p class="p2"><a<?php print App::useTarget()?> class="gray" href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print $model->getContent($aitem["aid"],16)?>...[全文]</a></p></li>
    <?php endif?>  
     <?php endforeach;?>
      </ul>      
                          </div>          
                    </div>
                  
                  <div class="blank20"></div>
               
                
                  
                
                  <div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a<?php print App::useTarget()?> class="fl">症状自查</a></div>
                        <div class="jb_jbzc fz13">
                          <ul class="clearfix">
                             <?php foreach($model->getSydsBydid($row["sid"]) as $zz):?> 
                                                  
                            <li><a<?php print App::useTarget()?> href="<?php print AppUrl::articleBySyd($zz) ?>"><?php print $model->getNameBySyd($zz) ?></a></li>
                            <?php endforeach;?>
                          </ul>
                        </div>
                      </div>
                      
                  <div class="blank20"></div>
                  
              <?php include dirname(dirname(dirname(__FILE__)))."/inc/guahao.tpl.php"?>
                  
                  <div class="blank20"></div>
                  
                  <div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a<?php print App::useTarget()?> class="fl">热门标签</a></div>
                        <div class="hotbqbox fz13">
                          <ul class="clearfix">
                    <?php foreach($model->getSiblingDids($row["sid"]) as $xbz):?>   	
                  
                            <li><a<?php print App::useTarget()?> href="<?php print AppUrl::disHomeByDiseasekey($xbz["key"])?>"><?php print $xbz["data"] ?></a></li>
            <?php endforeach;?>
                          </ul>
                        </div>
                      </div>
                      
                  <div class="blank20"></div>
                  
              <?php include dirname(dirname(dirname(__FILE__)))."/inc/piclink.tpl.php"?>
                </div>