<?php
/**
 *Author
 * Sihangzhang
 * ["sid"]=> string(3) "325" 
 * ["key"]=> string(4) "gwxc" 
 * ["data"]=> string(12) "睾丸异常" 
 * ["pid"]=> string(3) "322" 
 * ["metaid"]=> string(1) "2"
 */
$row = $model->data;
// var_dump($row);
$ext = diseaseExtInfoes::getExtData();
// var_dump($ext);exit;
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
                
                	<div class="padd20 border2 clr">
                    	<img src="<?php print AppUrl::getMediaPath()?>/disease<?php print AppUrl::disHomeByDid($row["sid"])?>.jpg" class="fl" />
                        
                        <div class="jb_box1 fr">
                        	<div class="blank10"></div>
                        	<span class="fz18 bule"><?php print $row["data"]?>知识介绍</span>
                            <div class="blank10"></div>
                           
          
             <?php foreach($model->getArticleTag7ByDid($row["sid"],1,0) as $aitem):?> 
               

                            <p class="fz13 color3"> <?php print utility::utf8substr($aitem["desc"],0,80); ?>...<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($aitem["aid"]) ?>" class="bule">疾病介绍→</a></p>
                        
                              <?php endforeach;?>    
                            <div class="blank10"></div>
                            <div class="jbbox1_sm1 fz13">
      <?php $xy = 0; ?>
  <?php foreach($model->getAll($row["sid"],6,0) as $wz):?> 
<?php $xy++; ?>
<?php if ($xy % 2 == 1) { ?>
            <p>
<?php } ?>
               <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($wz["aid"]) ?>"><?php print utility::utf8substr($wz["title"],0,12); ?></a>
<?php if ($xy % 2 == 0) { ?>
            </p>
<?php } ?>
  <?php endforeach;?>  

                      
                            </div>
                        </div>
                    </div>
                	
                    <div class="blank20"></div>
                    
                    <div class="padd20 border2">
                    	<div class="zjtdwztit fz18"><span></span>相关问答<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="" class="fr fz13 color9">+更多</a></div>
                        <div class="blank20"></div>
                        <div class="clr jb_box2">
                     
                        <?php $data = $model->getQuestionsByDid($row["sid"])?>
                        <!-- sid title date dod -->
                           <?php $m=1;?>
                           
                        <?php foreach ($data as $ask):?>
                  
                          
                        	<div class="jbbox2_sm1 fl">                    
                            	<div class="jbbox2_sm1top clr">
                                	<div class="fl jbbox2_p1 tc fz16 jb_ys<?php print $m ?>">
                                	<?php print preg_match_all('/([\xC0-\xFF][\x80-\xBF]+){2}|([\xC0-\xFF][\x80-\xBF]+)/',$model->getDisnameByDid($row["pid"]),$match) ? join("<br>",$match[0]) : ""?>
                                	
                                	
                                	</div>
                                    <div class="fr">
                                    	<p><?php print $ask["title"]?> ...<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::askByAsdDocid($ask["dod"], $ask["sid"])?>" class="bule"> 详细→</a></p>
                                        <p class="fr color9"></p>
                                    </div>
                                </div>
                                <div class="blank20"></div>
                                <div class="jbbox2_sm1top clr">
                                	<?php $doc = $model->getDocRowByDod($ask["dod"])?>
                                	<?php $ans = $model->getAnswerByAskid($ask["sid"])?>
                                
                                	
                                	<img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" width="66" height="66" class="fl" />
                                    <div class="fr">
                                    <!-- sid,id,name,lv,avatar,date,dod,dlv,star,hot,love,contribution,desc,spec -->
                                    	<span class="jb_ys<?php print $m ?>col"><?php print $doc["name"]?>，<?php print $doc["lv"]?></span>
                                        <p>
                                        
                                             <?php if (!empty($ans["content"]))  :?>
                             
                              	<?php print utility::utf8Substr($ans["content"], 0, 40) ?>
                             <?php endif; ?>
                                        
                                        </p>
                                    </div>
                                	
                                </div>
                                <div class="blank25"></div>
                            </div>
                 <?php $m++;?>
                        <?php endforeach;?>  

                        </div>
                        
                	</div>
                    
                    <div class="blank20"></div>
                    <div class="padd20 border2">
                    	<div class="zjtdwztit fz18" style="border-bottom:0;"><span></span><?php print $row["data"]?>全面详解</div>
                        <?php 
                          $all=array("病因","症状","检查","治疗","危害","保键")
                        ?>
                        <div class="jb_sstab clearfix dgray fz13 color6">
                            <ul class="clr">
                             <?php $m=1;?>
                            <?php foreach ($all as $al):?>
                              <li <?php if($m==1){?> class="selected"<?php } ?> ><?php print $al?></li>
                               <?php $m++;?>
                         <?php endforeach; ?>
                            </ul>
                        </div>
      
      					<div class="jb_ssall">
      					  <?php $y=1;?>
      			<?php foreach ($all as $al):?>
      			<?php $tid= ($model->getTagId("$al")) ?>
      			<?php $data = $model->knowledge($row["sid"], $tid, 25, 0, 7)?>
      			<?php $thumb = array_shift($data)?>
                        <div class="jb_ssbox <?php if($y==1){?>selected<?php } ?>">
                        
                        	<?php if(!is_null($thumb)):?>
                            <div class="clr jb_ssbox_sm1">
                            
                          
                         		<?php if($thumb["thumb"]):?>
                            	<img src="<?php print $thumb["thumb"]?>" class="fl" />
                            	<?php else:?>
                            	<img width="105" height="106" src="<?php print AppUrl::getMediaPath()?>/images/default.png" class="fl" />
                            	<?php endif?>
                                <div class="fr">
                                	<span class="fz16 color3"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="/"><?php print $thumb["title"]?></a></span>
                                    <p class="fz13 color6"><?php print $thumb["content"]?>...<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($thumb["aid"])?>" class="bule">[详细]</a></p>
                                </div>
           
                                
                                <div class="blank20"></div>
                            </div>
                            <?php endif;?>
                            <div class="blank15"></div>
                            <div class="jb_ssbox_sm2 clr">
                        	<ul class="fl">
                        		<?php foreach ($data as $art):?>

     
                            	<li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($art["aid"]) ?>"><?php print utility::utf8substr($art["title"],0,20);?></a></li>
 	
 	
 	
 								<?php endforeach;?>
                            </ul>
                        </div>             
                        </div>
                       <?php $y++;?>
                       
                      
             	<?php endforeach; ?>
                      
                      
                      </div>
                        
                	</div>
                    
                     
                     
                     
                     
                    <div class="blank20"></div>
                    
                    <div class="padd20 border2 clr">
                    	<div class="zjtdwztit fz18"><span></span>好评医生<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::navDoctors() ?>" class="fr fz13 color9">+更多推荐</a></div>
                        
                        <ul class="hp_doc1 clearfix">
                        
                  
                        	<?php foreach($model->getTopStar(4) as $doc):?>
                        	<?php $count=$model->getQuestionsCountByDod($doc["dod"]);?>

                            <li class="hp_doc_box1">
                            <div class="clr">
                            <div class="hp_doc_box2">
                                <div class="fl pr20">
                                <p class="tc">
                                    <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="" target="_blank">
                                   <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" width="80" height="65" /></a>
                                    </a>
                                </p>
                                        <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> target="_blank" href="<?php print AppUrl::docHomeByDocid($doc["id"])?>" class="personweb-sickness-btn">个人网站</a>
                                </div>
                                <div class="fl hp_doc_xq">
                                    <p><?php print $doc["name"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php print $doc["lv"]; ?></p>
                                    <p>
                                        <span class="patient_recommend">患者推荐热度：
                                        <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href=""><i class="blue" style="margin-left:-5px;"><?php print $doc["hot"]; ?></i></a></span>
                                        <span><img src="<?php print AppUrl::getMediaPath()?>/images/jian.png" style="vertical-align:-3px;"></span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;近两周回复<b class="yellow"><?php print ($count)?></b>问 
                                        </span>
                                    </p>
                                    <p><img src="<?php print AppUrl::getMediaPath()?>/images/jb_img6.png" class="fl" style="margin:5px 5px 0 0;" />擅长：<?php print utility::utf8Substr($doc["spec"],0,25); ?>...</p>
                                    <p><img src="<?php print AppUrl::getMediaPath()?>/images/jb_img7.png" class="fl" style="margin:5px 5px 0 0;" /><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>" class="colora">查看<?php print $doc["name"]; ?>的全部文章、全部咨询</a></p>
                                </div>
                            </div>
                            
                            <div class="doc_rela_link">
                                <p><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl()?>" class="online_btn"><span>点击咨询</span></a><p>
                                <p><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl()?>" class="jiahao_btn"><span>预约挂号</span></a><p>
                            </div>
                            </div>
                            </li>
                           
                               	<?php endforeach;?>
                           
                           
                           
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
  