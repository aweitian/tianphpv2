<?php 
/**
 * zhangsihang
 * @var doctorsModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;


$pageSize = 6;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($m->getAllCnt(), $page, $pageSize, 6);
 

$req = new httpRequest();
$url = new url($req->requestUri());


// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
?>
  <div class="blank20"></div>
  <div id="focusindex">
    <ul class="index_banner_box clearfix">
      <li><a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/sybanner1.jpg" width="998" height="238" /></a></li>
    </ul>
  </div>
  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a href="/">首页</a> > <a href="<?php print AppUrl::navDoctors()?>">医护团队</a> </div>
  
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
      	

          
          <div class="fz13">
            
            <div class="blank20"></div>
                
               <div class="clr">
               	<div class="wid680 fl">
                    
                    <div class="padd20 border2">
                    	<div class="zjtdwztit fz18"><span></span>诊后服务星</div>
                        <div class="fromjbzj clearfix">
                          <ul class="ulbot clearfix">
                           	<?php foreach($model->getTopStar(3) as $doc):?>
                            <li>
                              <dl class="clearfix">
                                <dt class="fl"><a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" width="80" height="80" /></a></dt>
                                <dd class="fl">
                                  <p class="blank10"></p>
                                  <p class="black fz18"><a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><?php print $doc["name"]; ?></a></p>
                                  <p class="blank5"></p>
                                  <p class="p2 fz13 gray"><img src="<?php print AppUrl::getMediaPath()?>/images/jbzjdot.jpg" width="8" height="8" /> 在线</p>
                                  <p class="p3 tc"><a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>">个人网站</a></p>
                                </dd>
                              </dl>
                              <div class="blank20"></div>
                              <div class="zjsc">
                                <p class="fz13 gray">擅长： <?php print $doc["spec"]; ?>...
                                  等</p>
                              </div>
                            </li>
                          	<?php endforeach;?>
                          
                          
                          
                          
                          
                          </ul>
                        </div>
                        
                	</div>
                    
                    <div class="blank20"></div>
                    
                    <div class="padd20 border2 clr">
                    	<div class="zjtdwztit fz18"><span></span>全部推荐医生</div>
                        
                        <ul class="hp_doc1 clearfix">
                        
                        
                            	<?php foreach($m->getDoctors(6,($page-1)*$pageSize) as $doc):?>
                            <li class="hp_doc_box1">
                            <div class="clr">
                            <div class="hp_doc_box2">
                                <div class="fl pr20">
                                <p class="tc">
                                    <a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>" target="_blank">
                                    <img alt="" src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" width="80" height="65">
                                    </a>
                                </p>
                                        <a target="_blank" href="<?php print AppUrl::docHomeByDocid($doc["id"])?>" class="personweb-sickness-btn">个人网站</a>
                                </div>
                                <div class="fl">
                                    <p><?php print $doc["name"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php print $doc["lv"]; ?></p>
                                    <p>
                                        <span class="patient_recommend">患者推荐热度：
                                        <a href=""><i class="blue" style="margin-left:-5px;"><?php print $doc["hot"]; ?></i></a></span>
                                        <span><img src="<?php print AppUrl::getMediaPath()?>/images/jian.png" style="vertical-align:-3px;"></span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;近两周回复<b class="yellow">37</b>问 
                                        </span>
                                    </p>
                                    <p><img src="<?php print AppUrl::getMediaPath()?>/images/jb_img6.png" class="fl" style="margin:5px 5px 0 0;" />擅长：<?php print $doc["spec"]; ?>...</p>
                                    <p><img src="<?php print AppUrl::getMediaPath()?>/images/jb_img7.png" class="fl" style="margin:5px 5px 0 0;" /><a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>" class="colora">查看<?php print $doc["name"]; ?>的全部文章、全部咨询</a></p>
                                </div>
                            </div>
                            
                            <div class="doc_rela_link">
                                <p><a href="<?php print AppUrl::getSwtUrl()?>" class="online_btn"><span>点击咨询</span></a><p>
                                <p><a href="<?php print AppUrl::getSwtUrl()?>" class="jiahao_btn"><span>预约挂号</span></a><p>
                            </div>
                            </div>
                            </li>
                            	<?php endforeach;?>
                           
                           
                           
                           
                            
                        </ul>
                        
                        <div class="blank30"></div>
                        <div class="pagenum tc gray fz13"><?php if ($pagination->hasPre()):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?> </div>
                        <div class="blank15"></div>
                        
                	</div>
                </div>
               
               
    			<!--left end-->
                
                <div class="fr wid300 fz13">
                	
                    <div class="jb_rg">
                        <textarea placeholder="在此咨询，专业医师在线提供就医指导" class="jb_rg1 fl color9"></textarea>
                      <a href="<?php print AppUrl::getSwtUrl() ?>"><input type="button" class="jb_rg2 fl" /></a>  
                    </div>
                    
                    <div class="blank20"></div>
                    
                    <div class="syrbox5 border2">
                    <div class="syrboxtit fz18 graybg">相关问答<a href="<?php print AppUrl::navAsk()?>"" class="blue fz13 fr">+更多</a></div>
                    
                    <div class="zjtd_r2">
                    	<div class="blank10"></div>
                         	
                     <?php $y=1;?>	
                    	<?php $asks = $m->getAllQuestions(0,4);foreach($asks["data"] as $ask):?>
                        <dl <?php if($y==1){?> class="selected"<?php } ?> >
                          <dt class="fz18 blue"><a href="<?php print AppUrl::askByAsdDocid($ask["dod"], $ask["sid"])?>"><?php print $ask["title"]?></a></dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img7.png" class="fl" /><p class="fl">
                            <a href="<?php print AppUrl::askByAsdDocid($ask["dod"], $ask["sid"])?>">
                            <?php $content = $m->getAnswerByAskid($ask["sid"]); print empty($content) ? "" :$content["content"]?>...
                            </a>
                            </p>
                          </dd>
                        </dl>
                   <?php $y++;?>      
<?php endforeach;?>
                        
                      </div>
                    
                    <div class="zjtd_r3 clr"><a href="<?php print AppUrl::getSwtUrl() ?>">立刻咨询</a></div>
                    <div class="blank20"></div>
                  </div>
                    <div class="blank20"></div>
                    <div class="docsug border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师观点</a><a class="fz13 blue fr" href="<?php print AppUrl::navArticle()?>">+更多</a></div>
                        <div class="docsugbox fz13">
                      <?php $thumb = $m->getRowThumbnail()?>
    <?php if (!empty($thumb)):?>
    <?php /*var_dump($thumb)*/?>
    <dl class="clearfix">
    	<dt class="fl">
    		
    			
							<?php if (!empty($thumb["thumb"])):?>
                        	<a href="<?php print AppUrl::articleByAid($thumb["aid"])?>">
    		<img src="<?php print $thumb["thumb"]?>" width="80" height="60" />
    		</a>
                        	<?php else:  ?>
                        	
                        		<a href="<?php print AppUrl::articleByAid($thumb["aid"])?>"><img src="<?php print AppUrl::getMediaPath()?>/images/zt_img1.jpg" width="80" heigth="60" /></a>
                        	           <?php endif?>
    		
    	</dt>
      <dd class="fl">
      <p><a href="<?php print AppUrl::articleByAid($thumb["aid"])?>"><?php print $thumb["title"]?></a></p>
      
      <p class="p2 clearfix">
      <a class="fl gray"><?php print $thumb["date"]?></a>
      </p>
      </dd>
      </dl>
      <?php endif?>
      
      <p class="blank15"></p>
      <ul class="othsug">
      	
          
          	
       <?php foreach($m->getNewest(5) as $aitem):?>   	
      <li><p class="p1"><a class="black" href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print utility::utf8Substr($aitem["title"], 0, 18) ?></a></p><p class="p2"><a class="gray" href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print $m->getContent($aitem["aid"],18)?>...[全文]</a></p></li>
     <?php endforeach;?>
      </ul>      
                          </div>          
                    </div>
                    
                  <div class="blank20"></div>
                  
                  <div class="syrbox2">
                    <p>
                    <a href="<?php print AppUrl::getSwtUrl() ?>">
                    <img src="<?php print AppUrl::getMediaPath()?>/images/syrth1.jpg" width="300" height="100" />
                    </a>
                    </p>
                    <p class="blank10"></p>
                    <p>
                        <a href="<?php print AppUrl::getSwtUrl() ?>">
                    <img src="<?php print AppUrl::getMediaPath()?>/images/syrth2.jpg" width="300" height="100" />
                    </a>
                    </p>
                    <p class="blank10"></p>
                    <p>
                        <a href="<?php print AppUrl::getSwtUrl() ?>">
                    <img src="<?php print AppUrl::getMediaPath()?>/images/syrth3.jpg" width="300" height="100" />
                    </a>
                    </p>
                  </div>
                  
                  <div class="blank20"></div>
                  
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
  