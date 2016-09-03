<?php 
/**
 * Sihangzhang
 * @var articleModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;

$this->title = "疾病专题-上海九龙男子医院";
$this->description = "";
$this->keyword = "";

$pageSize = 15;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}



$pagination = new pagination($m->getAllFullCnt(), $page, $pageSize, 7);

$req = new httpRequest();
$url = new url($req->requestUri());


$a=$m->allThumbnail($pageSize,($page-1)*$pageSize);
if(count($a)>1){$a1=array_shift($a);}else{$a1=array();}
if(count($a)>1){$a2=array_shift($a);}else{$a2=array();}
if(count($a)>1){$a3=array_shift($a);}else{$a3=array();}
if(count($a)>1){$a4=array_shift($a);}else{$a4=array();}
if(count($a)>1){$a5=array_shift($a);}else{$a5=array();}

// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
?>
  <div class="blank20"></div>
  <?php include dirname(dirname(dirname(__FILE__)))."/inc/banner.php"?>
  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a<?php print App::useTarget()?> href="<?php print AppUrl::navHome()?>">首页</a> > <a<?php print App::useTarget()?> href="<?php print AppUrl::navArticle() ?>" class="blue">专题列表</a></div>
  
  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
      	
        
          
          <div class="fz13">
                
               <div class="clr">
               
               	<div class="wid680 fl">
                    <div class="padd20 border2">
                 
                        <?php if (!empty($a1)):?>
                    	<dl class="clr zt_box1">
                        	<dt class="fl">
                        	<?php if (!empty($a1["thumb"])):?>
                        	<img src="<?php print ($a1["thumb"])?>" width="135" height="92" />
                        	<?php else:  ?>
                        	<img src="<?php print AppUrl::getMediaPath()?>/images/zt_img1.jpg" />
                        	           <?php endif?>
                        	</dt>
                            <dd class="fl">
                            	<b class="fz18 color3"><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($a1["aid"])?>"><?php print utility::utf8Substr($a1["title"], 0, 15) ?></a></b>
                                <p class="color9"><?php print utility::utf8Substr($a1["desc"], 0, 80) ?>...<a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($a1["aid"])?>" class="bule">[查看全文]</a></p>
                            </dd>
                        </dl>                  
                        <?php endif?>
                    
                        <div class="blank20"></div>
                        <div class="clr jb_box2">
                        <?php if (!empty($a2)):?>
                        	<div class="zt_box2 fl" style="padding-right:30px; border-bottom:1px dotted #d7d7d7;">
                            
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/syhot1.jpg" /></span>
                                    	<p class="fr"><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($a2["aid"])?>"><?php print utility::utf8Substr($a2["title"], 0, 15) ?></a>...</p>
                                </div>
                                <div class="blank15"></div>
                            </div>
                           <?php endif?>   
                                     <?php if (!empty($a3)):?>
                            <div class="zt_box2 fr" style="padding-left:15px; border-left:1px dotted #d7d7d7; border-bottom:1px dotted #d7d7d7;">
                    
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/syhot1.jpg" /></span>
                                    	<p class="fr"><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($a3["aid"])?>"><?php print utility::utf8Substr($a3["title"], 0, 15) ?></a>...</p>
                                </div>
                                <div class="blank15"></div>
                            </div>
                               <?php endif?>
                                      <?php if (!empty($a4)):?>
                            <div class="zt_box2 fl" style="width:290px; padding-right:30px;">
                            	<div class="blank15"></div>
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/syhot1.jpg" /></span>
                                    	<p class="fr"><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($a4["aid"])?>"><?php print utility::utf8Substr($a4["title"], 0, 15) ?></a>...</p>
                                </div>
                                <div class="blank15"></div>
                                
                            </div>
                             <?php endif?>
                                 <?php if (!empty($a5)):?>
                            <div class="zt_box2 fr" style="width:290px; padding-left:20px; border-left:1px dotted #d7d7d7;">
                            	<div class="blank15"></div>
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/syhot1.jpg" /></span>
                                    	<p class="fr"><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($a5["aid"])?>"><?php print utility::utf8Substr($a5["title"], 0, 15) ?></a></p>
                                </div>
                                <div class="blank15"></div>
                            </div>
                                    <?php endif?>
                        </div>
                        <div class="blank20"></div>
                        <div class="hx"></div>
                        <div class="blank20"></div>
                        
                        <div class="zt_box3">
                        	
                            <ul class="clr">
                            
                               	<?php foreach($a as $lb):?>
                               
                            	<li>
                                	<a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($lb["aid"])?>"><?php print utility::utf8Substr($lb["title"], 0, 30) ?></a>
                                    <p><?php print utility::utf8Substr($lb["desc"], 0, 80) ?>...</p>
                                </li>
                                   	<?php endforeach;?>
                              
                            </ul>
                            
                        </div>
                        
                        <div class="blank35"></div>
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
                </div>
               
               
    			<!--left end-->
                
                <div class="fr wid300 fz13">
                	
                    <div class="doctj border2">
    
    <div class="syrboxtit fz18 graybg clearfix"><a<?php print App::useTarget()?> class="fl">医师推荐</a><a<?php print App::useTarget()?> class="fz13 blue fr" href="<?php print AppUrl::navDoctors() ?>">+更多</a></div>
    <div class="doctjbox">
    
        <?php foreach($m->getDoctors(3) as $doc):?>
      <dl class="clearfix"><dt class="fl"><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print $doc["avatar"]?>" width="80" height="80" /></a></dt>
      <dd class="fl">
      <p class="blank5"></p>
      <p class="fz18"><?php print $doc["name"]; ?><span class="gray fz13"><?php print $doc["lv"]; ?></span></p>
      <p class="blank5"></p>
      <p class="fz13 gray">擅长：<?php print utility::utf8Substr($doc["spec"],0,20); ?>...</p>
      <p class="blank5"></p>
      <p class="p3 tc"><a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;">咨询</a></p>
      </dd></dl>
      	<?php endforeach;?>

      
      </div>
    
    
    
    </div>
                      
                  <div class="blank20"></div>

                    <div class="syrbox5 border2">
                    <div class="syrboxtit fz18 graybg">相关问答<a<?php print App::useTarget()?> href="<?php print AppUrl::navAsk() ?>" class="blue fz13 fr">+更多</a></div>
                    
                    <div class="zjtd_r2">
                    	<div class="blank10"></div>
                    	
                       <?php $y=1;?>	
                    	<?php $asks = $m->getAllQuestions(0,4);foreach($asks["data"] as $ask):?>
                        <dl <?php if($y==1){?> class="selected"<?php } ?> >
                          <dt class="fz18 blue"><a<?php print App::useTarget()?> href="<?php print AppUrl::askByAsdDocid($ask["dod"], $ask["sid"])?>"><?php print utility::utf8Substr($ask["title"],0,16);?></a></dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img7.png" class="fl" /><p class="fl">
                            <a<?php print App::useTarget()?> href="<?php print AppUrl::askByAsdDocid($ask["dod"], $ask["sid"])?>">
                            <?php $content = $m->getAnswerByAskid($ask["sid"]);
                             print empty($content) ? "" : utility::utf8Substr($content["content"], 0, 25)?>...
                            </a>
                            </p>
                          </dd>
                        </dl>
                   <?php $y++;?>      
<?php endforeach;?>
                        
                      </div>
                    
                    <div class="zjtd_r3 clr"><a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;">立刻咨询</a></div>
                    <div class="blank20"></div>
                  </div>
                	
                    <div class="blank20"></div>
                 <?php include dirname(dirname(dirname(__FILE__)))."/inc/guahao.tpl.php"?>
                  
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
 
  