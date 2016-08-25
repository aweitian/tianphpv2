<?php

$this->title = "患者咨询-".$m->data["name"]."-找大夫咨询-上海九龙男子医院";
$this->description = "";
$this->keyword = "";

$pageSize = 8;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($m->getAnswersCnt($askid), $page, $pageSize, 6);



$req = new httpRequest();
$url = new url($req->requestUri());
?>

   <?php include dirname(__FILE__)."/common/location.tpl.php";?>

  <div class="sybox clearfix">
    <div>
      
      <div class="zjtd">
      
        <ul class="zjtdtit fz16 clearfix">
        <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
       </ul>
    	
          <div class="tabcon selected fz13">
            
            <div class="blank20"></div>
                
               <div class="clr">
               <?php $askq= $m->getQuestionByAskid($askid) ?>  
               <?php $user= $m->rowuser($askq["uid"]); ?>  
    	       <?php $doc=$m->getDocRowByDod($askq["dod"]) ?> 
    	       <?php $dis=$m->getNameByDid($askq["did"]) ?>     
               <div class="wid680 fl">
                  <div class="zjtdhzfw_tit"><?php print($askq["title"]) ?></div>
                  
                  <div class="blank20"></div>
          <div class="zjtd_hzfw clr">
                  	
                    	<div class="zjtd_hzfw_fl tc fl">
                        	<img src="<?php print AppUrl::getMediaPath()?>/avatar/<?php print $user["avatar"] ?>" width="61" height="62" />
                            <p><?php print $user["name"] ?></p>
                            <p><?php print $user["date"] ?></p>
                        </div>
                        
                        <div class="zjtd_hzfw_fr border2 hzfw_hz fr">
                        	
                            <div class="color3 fz14">
                           <p><span class="blue">疾病：</span><?php print ($dis) ?></p>
                           <p><span class="blue">描述：</span><?php print(AppFilter::filterOut($askq["desc"] ))?></p>
                           <p><span class="blue">想获得的帮助：</span><?php print(AppFilter::filterOut($askq["svr"])) ?></p>
                            </div>
                            <div class="hzfw_wdl">
                            	<img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img14.png" class="fl" />病例资料仅医生及患者本人登录后可见
                            </div>
                            <div class="blank15"></div>
                            <p class="fr color9 fz13">发表于：  <?php print $askq["date"] ?></p>
                            <img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img17.png" class="hzfw_jian" />
                        </div>
                    
                  </div>
                  
                  <div class="blank20"></div>
          <?php foreach ($m->getAnswers($askid,$pageSize,($page-1)*$pageSize)as $wd):?>
        
   
     		<?php if($wd["role"] == "user"): ?>
     		 <div class="zjtd_hzfw clr">
                  	
                    	<div class="zjtd_hzfw_fl tc fl">
                        	<img src="<?php print AppUrl::getMediaPath()?>/avatar/<?php print $user["avatar"] ?>" width="61" height="62" />
                            <p><?php print(AppFilter::filterOut($user["name"]))  ?></p>
                            <p><?php print $user["date"] ?></p>
                        </div>
                        
                        <div class="zjtd_hzfw_fr border2 hzfw_hz fr">
                        	
                            <div class="color3 fz14">
                            <?php if($wd["conmeta"] == "text"):?>
                            <?php print $wd["content"] ?>
                            <?php else:?>
		          	
		                 	<?php $tmp = explode(",", $wd["content"]);?>
		                	<i class="fa fa-gift" style="font-size:28px;"></i> <?php print $tmp[1]?><br/>
		          	
		                	<img style="width:64px;height:64px;" src="<?php print AppUrl::getMediaPath()?>/present/<?php print $tmp[0]?>">
        
		          	
		                	<?php endif;?>
                            </div>
                            <p class="fr color9 fz13">发表于：  <?php print $wd["date"] ?></p>
                            <img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img17.png" class="hzfw_jian" />
                        </div>
                    
                  </div>
                  
                  <div class="blank20"></div>
     		<?php else:?>
     		
     		
     		  <div class="zjtd_hzfw clr">
                  	
                  	
                    	<div class="zjtd_hzfw_fl tc fl">
                        	<img src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print $doc["avatar"] ?>" width="61" height="62"  />
                            <p><span class="blue">  <?php print $doc["name"] ?></span> 医生</p>
                            <p><?php print $doc["date"] ?></p>
                        </div>
                        
                        <div class="zjtd_hzfw_fr border2 hzfw_ys fr">
                        	
                            <div class="yellow fz14"><?php print $wd["content"] ?></div>
                            <div class="blank15"></div>
                            <p class="fr color9 fz13">发表于：<?php print $wd["date"] ?></p>
                            <img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img17.png" class="hzfw_jian" />
                        </div>
                    
                  </div>
                  
                  <div class="blank20"></div>
     		
     		
     		<?php endif;?>
   
                 
                  
                
				  
                      <?php endforeach; ?>
            
                  
                  
                  <div class="pagenum tc  fz13"><?php if ($pagination->hasPre()):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a<?php print App::useTarget()?><?php if($pagination->getCurPageNum() - 1 == $i):?> class="current"<?php endif;?> href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?></div>

                </div>
    			<!--left end-->
                
                <div class="fr wid300 fz13">
                  <div class="syrbox3 border2">
                    <div class="syrboxtit fz18 graybg"><?php print $m->data["name"]?> &middot; 出诊时间</div>
                  	<div class="syrbox4nr zjtd_r1">
                     <div>
                        	<table cellpadding="0" cellspacing="0" border="0">
                        	<?php for($i=0;$i<3;$i++):?>
                            	<tr>
                            	<?php for($j=0;$j<7;$j++):?>
                            	<?php if(substr($m->data["duty"],$i * 7 + $j,1) == "0"):?>
                            	<td></td>
                            	<?php else:?>
                            	<td><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_time<?php print substr($m->data["duty"],$i * 7 + $j,1)?>.jpg" /></td>
                            	<?php endif;?>
                            	<?php endfor;?>
                                </tr>
                             <?php endfor;?>
                            </table>
                        </div>
                        <p class="tc color9" style="margin:10px 0; line-height:20px;">注：所有门诊时间仅供参考，最终以医院当日公布为准。</p>
                        <p class="color6"><b class="color3">预约提示：</b>以下病情患者，可在官方网站预约我的预约加号：阴茎延长，精索静脉曲张、阴茎弯曲，<a<?php print App::useTarget()?> href="" class="blue">免费申请→</a></p>
                    </div>
                  </div>
                  
                  <div class="blank20"></div>
                  
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
                             
                             <a<?php print App::useTarget()?> href="<?php print AppUrl::askByAsdDocid($ask["dod"], $ask["sid"])?>">
                            <?php 
                             print empty($ans) ? "" : utility::utf8Substr($ans["content"], 0, 25)?>...
                            </a>
                             <?php endif; ?></p>
                          </dd>
                        </dl>
                      <?php $x++;?>
                         <?php endforeach; ?> 
                       
                       
                      </div>
                    
                    <div class="zjtd_r3 clr"><a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl(); ?>">立刻咨询</a></div>
                    <div class="blank20"></div>
                  </div>
                  
                  <div class="blank20"></div>
                  
                  <div class="docsug border2">
    <div class="syrboxtit fz18 graybg clearfix"><a<?php print App::useTarget()?> class="fl">医师观点</a><a<?php print App::useTarget()?> class="fz13 blue fr" href="<?php print AppUrl::navArticle()?>">+更多</a></div>
    <div class="docsugbox fz13">
    
    <?php $thumb = $m->getRowThumbnail();?>
   
    <?php if (!empty($thumb)):?>
       <dl class="clearfix">
    	<dt class="fl">
    		
    			
							<?php if (!empty($thumb["thumb"])):?>
                        	<a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($thumb["aid"])?>">
    		<img src="<?php print $thumb["thumb"]?>" width="80" height="60" />
    		</a>
                        	<?php else:  ?>
                        	
                        		<a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($thumb["aid"])?>"><img src="<?php print AppUrl::getMediaPath()?>/images/zt_img1.jpg" width="80" heigth="60" /></a>
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
      	
          
          	
       <?php foreach($m->getNewest(5) as $aitem):?>   	
      <li><p class="p1"><a<?php print App::useTarget()?> class="black" href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print utility::utf8Substr($aitem["title"], 0, 18) ?></a></p><p class="p2"><a<?php print App::useTarget()?> class="gray" href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print $m->getContent($aitem["aid"],16)?>...[全文]</a></p></li>
     <?php endforeach;?>
      </ul>      
                
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
  
  <?php 

  $doc_id=$m->data["id"];
  $doc_name=$m->data["name"];
  $doc_lv=$m->data["lv"];
  $doc_desc=$m->data["desc"];
  $doc_spec=$m->data["spec"];
  
  ?>
<?php include dirname(dirname(__FILE__))."/bottom_swt.tpl.php";?>
  
 