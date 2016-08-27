<?php 
/**
 * Sihangzhang
 * @var articleModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;

$this->title = "推荐医院-上海九龙男子医院";
$this->description = "";
$this->keyword = "";


?>
  <div class="blank20"></div>
  <?php include dirname(dirname(dirname(__FILE__)))."/inc/banner.php"?>
  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a<?php print App::useTarget()?> href="<?php print AppUrl::navHome()?>">首页</a> > <a<?php print App::useTarget()?> href="<?php print AppUrl::navHospital() ?>">推荐医院</a></div>
  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
          
          <div class="fz13">
                
               <div class="clr">
               	<div class="wid680 fl">
                
                    
                    <div class="padd20 border2">
                    	<div class="zjtdwztit fz18"><span></span>医院介绍</div>
                        <div class="blank20"></div>
                        <div class="clr">
                        	<img src="<?php print AppUrl::getMediaPath()?>/images/yyjs_img1.jpg" class="fl" />
                            <div class="fl yyjs_box1_sm1">
                            	<p class="fz18 color3" style="margin-bottom:10px;">上海九龙男子医院</p>
                                <p class="color9 fz13"><img src="<?php print AppUrl::getMediaPath()?>/images/yyjs_tb1.png" class="fl" />021-52733999</p>
                                <p class="color9 fz13"><img src="<?php print AppUrl::getMediaPath()?>/images/yyjs_tb2.png" class="fl" />上海市长宁区中山西路333号（近中山公园）</p>
                            </div>
                            <div class="fr yyjs_box1_sm2">
                            	<!-- <p><span class="yellow">559</span> 位  可挂号医生</p>
                                <p><span class="yellow">2366</span> 人 已预约</p>
                                <p><span class="yellow">902</span> 次  收藏</p>-->
                                <p><a href="<?php print AppUrl::navSubscribe() ?>" class="fz16 tc">挂号</a></p>
                            </div>
                        </div>
                        <div class="blank20"></div>
                        <p class="fz13 color6 lh24 clr">上海九龙男子医院成立于2005年12月29日，张祥南为现任院长，是一所集预防保健，医疗，康复服务为一体的现代化综合男性专科医院。特开设前列腺专科，性功能专科，生殖整形专科，生殖感染专科，性传播疾病科，男性不育专科...<a href="<?php print AppUrl::intro() ?>" class="bule">[详细]</a></p>
                	</div>
                    
                    <div class="blank20"></div>
                    
                    <div class="padd20 border2">
                    	<div class="zjtdwztit fz18"><span></span>科室划分</div>
                        <div class="blank20"></div>
                        <div class="clr">
                        <div  id="index_zhuanjia">
                            <div  class="zhuanjiaowl"  style="opacity: 1; display: block;">
                             <?php foreach($m->getLv0Infoes() as $dis):?> 
                                  <div  class="owl-item fl">
                                    <div  class="item">
                                      <div  class="wrap">
                                          <div  class="boxone">
                                              <div  class="mask">
                                              	<div class="mask_sm1 padd20">
                                                	  <?php foreach ($m->getLv1InfoesByDid($dis["sid"]) as $xbz):?>
                                                      <a<?php print App::useTarget()?> href="<?php print AppUrl::disHomeByDiseasekey($xbz['key'])?>">
                    	<?php print ($xbz['data']) ?></a>
                                                    <?php endforeach;?>
                                                </div>
                                              </div>
                                                <dl class="boxtwo clr tc">
                                                	<dt><img  class="doctor"  src="<?php print AppUrl::getMediaPath()?>/images/hospital<?php print ($dis['key']) ?>.png"></dt>
                                                    <div class="blank20"></div>
                                                    <dd><a  href="javascript:void()"  class="fz18 color3"><?php print($dis["data"])?></a></dd>
                                                </dl>
                                          </div>
                                      </div>
                                    </div>
                                  </div>
                           <?php endforeach;?>      
                                  
                            </div>
                        </div>
                        
                	</div>
                    </div>
                    <div class="blank20"></div>
                    
                    <div class="padd20 border2">
                    	<div class="zjtdwztit fz18"><span></span>上海九龙男子医院  推荐专家</div>
                        <div class="blank20"></div>
                        
                        <div class="yyjs_box2">
                            <h6 class="tc color6 fz16">患者推荐（根据患者投票推荐）</h6>
                            <p class="blank20"></p>
                            
                           
                            
                            <?php foreach($m->getLv0Infoes() as $disdoc):?> 
  
                            <div class="clr">
                            	<span class="tc fl fz13"><?php print($disdoc["data"])  ?></span>
                                <p class="fl">
                                 <?php foreach($m->getDodDataByDid($disdoc["sid"]) as $doclist):?> 
                              
                                 <?php $docname=$m->getNameByDod($doclist["dod"]) ?>
                              
                                	        <a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDod($doclist["dod"]);?>"><?php print ($docname)?>(<?php print $doclist["weight"] ?>)</a>
                                	                            

                                    <?php endforeach;?>    
                              </p>
                            </div>
                             <?php endforeach;?>    
                           
                            
                        </div>
                        <div class="blank15"></div>
                        <div class="yyjs_box2">
                            <h6 class="tc color6 fz16">诊后服务星（根据医生看诊经验推荐）</h6>
                            <p class="blank20"></p>
                          
                          
                            <div class="fromjbzj clearfix">
                          <ul class="ulbot clearfix">
                          
                      	<?php foreach($model->getTopStar(3) as $doc):?>
                            <li>
                              <dl class="clearfix">
                                <dt class="fl"><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print $doc["avatar"]?>" width="80" height="80" /></a></dt>
                                <dd class="fl">
                                  <p class="blank10"></p>
                                  <p class="black fz18"><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><?php print $doc["name"]; ?></a></p>
                                  <p class="blank5"></p>
                                  <p class="p2 fz13 gray"><img src="<?php print AppUrl::getMediaPath()?>/images/jbzjdot.jpg" width="8" height="8" /> 在线</p>
                                  <p class="p3 tc"><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>">个人网站</a></p>
                                </dd>
                              </dl>
                              <div class="blank20"></div>
                              <div class="zjsc">
                                <p class="fz13 gray">擅长： <?php print utility::utf8Substr($doc["spec"], 0, 13); ?>...
                                  等</p>
                              </div>
                            </li>
                          	<?php endforeach;?>
                          
                          
                          
                          
                          </ul>
                        </div>
                       
            </div>
              </div>
                    <div class="blank20"></div>
                    
                    <div class="border2">
                        
                        <div class="yyjs_sstab clearfix dgray fz18 color6">
                            <ul class="clr">
                              <li class="selected" style="border-left:0;">最新咨询</li>
                              <li>最新文章</li>
                           
                            </ul>
                        </div>
      
      					<div class="yyjs_ssall">
                        <div class="yyjs_ssbox selected">
                        	
                          <div class="wlzxnr tabcon selected fz13">
                         <?php $all = $m->getAllQuestions(0,8); ?> 
                          	<?php foreach ($all["data"] as $allitem):?>

                            <dl>
                              <dt class="fl"><a <?php print App::useTarget()?> href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>"><span class="fl"><?php print ($allitem["title"]) ?>...</span></a>
                              <span class="fr"><?php print $m->getNameByDod($allitem["dod"])?></span></dt>
                           
                              <dd class="fr gray"><a <?php print App::useTarget()?> href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>">回复</a></dd>
                            </dl>
                            	<?php endforeach;?>
                          </div>
                            
                        </div>
                        <div class="yyjs_ssbox" style="display: none;">
                        	<div class="wlzxnr tabcon fz13">
                        	
                        	
                        	 	<?php foreach($m->allThumbnail(8,8) as $listarticle):?>
                        	 	  <?php $docname= $m->getFirstDod($listarticle["aid"])?>
                        	 	
                            	
                            <dl>
                              <dt class="fl"><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($listarticle["aid"])?>"><span class="fl"><?php print utility::utf8Substr($listarticle["title"], 0, 30) ?>...</span></a><span class="fr">
                              <?php print $m->getNameByDod($docname)?>
                              </span></dt>
                              <dd class="fr gray"><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($listarticle["aid"])?>">回复</a></dd>
                            </dl>
                            
                               	<?php endforeach;?>
                            
                            
                          </div>
                        </div>
                       
                      </div>
                        
                	</div>
                    
                    
                    
                    
                </div>
               
               
    			<!--left end-->
                
                <div class="fr wid300 fz13">
                  
                  <div class="doctj border2">
    
    <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师推荐</a><a class="fz13 blue fr" href="<?php print AppUrl::navDoctors() ?>">+更多</a></div>
    <div class="doctjbox">
    
     <?php foreach($m->getDoctors(3) as $doc):?>
    <dl class="clearfix"><dt class="fl"><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print $doc["avatar"]?>" width="80" height="80" /></a></dt>
      <dd class="fl">
      <p class="blank5"></p>
      <p class="fz18"><?php print $doc["name"]; ?> <span class="gray fz13"><?php print $doc["lv"]; ?></span></p>
      <p class="blank5"></p>
      <p class="fz13 gray">擅长：<?php print utility::utf8Substr($doc["spec"],0,20); ?></p>
      <p class="blank5"></p>
      <p class="p3 tc"><a href="<?php AppUrl::getSwtUrl()?>" onclick="openZoosUrl();return false;">咨询</a></p>
      </dd></dl>
     	<?php endforeach;?> 
      
      
      </div>
    
    
    
    </div>
                      
                  <div class="blank20"></div>
                   <?php include dirname(dirname(dirname(__FILE__)))."/inc/guahao.tpl.php"?>
                  
                  <div class="blank20"></div>
                  
                  <div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a class="fl">热门标签</a></div>
                        <div class="hotbqbox fz13">
                          <ul class="clearfix">
                          
                            <?php foreach($m->getRandomDid(15) as $dis):?>
                  
                            <li><a<?php print App::useTarget()?> href="<?php print AppUrl::disHomeByDid($dis["sid"]) ?>"><?php print $dis["data"] ?></a></li>
                       <?php endforeach;?> 
                          </ul>
                        </div>
                      </div>
                      
                  <div class="blank20"></div>
                  
                  <div class="syrbox5 border2">
                    <div class="syrboxtit fz18 graybg">心意礼物</div>
                    <div class="syrbox5nr">
                      <div class="syrbox5nr_1" id="toplw">
                        <?php foreach ($m->getData(4) as $lw):?>
            
              <?php $user=$m->getNameByUid($lw["uid"]);?>
      
            <?php $pre=$m->rowpid($lw["pid"]);?>      
         
            <?php $doc=($m->getInfoByDod($lw["dod"]))?> 
            <dl class="clearfix" >
              <dt class="fl"><img src="<?php print AppUrl::getMediaPath()?>/present/<?php print $pre["avatar"]?>" width="61" height="57" /></dt>
              <dd class="fl">
                <p class="ddp1"><strong><a href="<?php print AppUrl::docHomeByDod($lw["dod"])?>"><?php print $doc["name"];?></a></strong>医生收到了<strong>
               
                <?php print preg_replace("/^(\d{3})-?\d{4}(\d{4})$/","$1****$2",$user); ?>
                
                </strong>精心挑选的礼物<strong><?php print $pre["data"]?></strong>医生爱心值+<?php print $pre["cost"]?></p>
                <p class="ddp2 fr blue"><a<?php print App::useTarget()?> href="<?php print AppUrl::docPresentHomeByDocid($doc["id"]); ?>">我也要送</a></p>
              </dd>
            </dl>
            <?php endforeach;?>
                      </div>
                   
                    
                    </div>
                  </div>
                  
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
