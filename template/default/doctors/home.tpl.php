<?php



defTplData::getInstance()->title = $m->data["name"] . " - 医师首页";
/**
  ["sid"]=> 	11
  ["id"]=>  	string(3) "zyl"
  ["name"]=>  	string(9) "张耀龙"
  ["lv"]=>  	string(7) "ccccccc"
  ["avatar"]=>  string(7) "zyl.jpg"
  ["date"]=>  	string(10) "2016-05-16"
  ["dod"]=>  	string(1) "2"
  ["dlv"]=>  	string(1) "3"
  ["star"]=>  	string(2) "10"
  ["hot"]=>  	string(2) "22"
  ["love"]=>  	string(1) "2"
  ["contribution"]=>  string(1) "2"
  ["desc"]=>  	string(2) "33"
  ["spec"]=>  	string(1) "3"
}
 */

// var_dump($m->data);exit;
$this->title = "".$m->data["name"]."大夫个人网站_上海九龙男子医院";
$this->keyword = "".$m->data["name"]."大夫,".$m->data["name"]."医生";
$this->description = "免费咨询".$m->data["name"]."医生,查看".$m->data["name"]."医生门诊,".$m->data["desc"]."";



$pageSize = 8;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}
$pagination = new pagination($m->getDataByDodCnt($m->data["sid"]), $page, $pageSize, 6);
$req = new httpRequest();
$url = new url($req->requestUri());


?>

  <?php include dirname(__FILE__)."/common/location.tpl.php";?>
  <div class="sybox clearfix">
    <div>
      
      <div class="zjtd">
      
    <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
       
          <div class="tabcon selected fz13">
              <div class="blank20"></div>
              <div class="zjtdcon1_box1 clr">
                  
                  <div class="zjtdcon1box1_sm1 fl">
                  	
                   	 <div class="fl">
                       <p>	
                  <img src="<?php print AppUrl::getMediaPath()?>/doctor/200x220/<?php print $m->data["avatar"]?>" class="fl" width="200" height="220" /></p>
                       <p class="gddt"><img src="<?php print AppUrl::getMediaPath()?>/images/icon3.gif" width="62" height="39"/></p>
                     </div>
                 <?php $doclettercnt=$m->getDataCntByDod($m->data["sid"]) ?>
            
               <?php $docpresent=$m->getPresentDataByDodCnt($m->data["sid"]) ?>
              
                     <div class="fr">
                          <h4 class="fz24 tc"><?php print $m->data["name"]?>大夫的个人网站</h4>
                          <div class="blank20"></div>
                   
                          <div class="blank10"></div>
                          <p class="clr"><em><img src="<?php print AppUrl::getMediaPath()?>/images/icon1.gif" />感谢信<span class="red">   <?php print($doclettercnt) ?></span>封</em><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img2.png" class="fl" />所属医院：上海九龙男子医院</p>
                          <p class="clr"><em><img src="<?php print AppUrl::getMediaPath()?>/images/icon2.gif" />礼物<span class="red"> <?php print($docpresent) ?></span>个</em><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img2.png" class="fl" />职　　称：<?php print $m->data["lv"]?></p>
                          <p class="clr"><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img3.png" class="fl" style="margin-bottom:30px;" />擅长项目：<?php print $m->data["spec"]?><a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;"> [点击咨询]</a></p>
                     </div>
                  </div>
                  
                  <div class="fr zjtdcon1box1_sm2">
                  		<div class="zjtdcon1box1_sm3">
                        	<dl style="margin-left:60px;">
                            	<dt><a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;"><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_tit1.png" /></a></dt>
                                <dd>挂号</dd>
                            </dl>
                            <dl class="zjtdbox1_d1">
                            	<dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_tit2_1.png" /></dt>
                                <dd>图文</dd>
                            </dl>
                            <dl>
                            	<dt><a class="dh_a"><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_tit3.png" /></a></dt>
                                <dd>电话</dd>
                            </dl>
                        </div>
                  
                  
                  <div class="zjtdcon1box1_sm4 tc">
                  	<p><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_tit4.png" /><b>9.9</b></p>
                    <p class="clr">总预约量 <span><?php print rand(5000,6000);?></span>    问诊量 <span><?php print rand(6000,7000);?></span></p>
                  </div>
                 </div> 
             </div>
             <div class="blank20"></div>
              <!--zjtdcon1_box1 end-->
              
               <div class="clr">
               		
               
               <div class="wid680 fl">
               
                   
                   <div class="zjtd_box2 clr">
                        <img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img4.jpg" class="fl" />
                        
                        <div class="zjtd_box2_sm1 fl">
                        
                        	<div class="zjtd_box2_sm2 clr">
                            	<div class="fl">
                                	<p>您有任何关于男科疾病方面的问题，都可在线点击咨询，我会立刻为您解答！您的聊天信息，我们严格保密！</p>
                                    <p class="color9"> [ 患者提问：<span class="yellow"><?php print rand(9000,10000);?></span>问，<?php print $m->data["name"]?>本人已回复：<span class="yellow"><?php print rand(8000,9000);?></span>问 ]</p>
                                </div>
                                <a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="fr tc">在线咨询</a>
                            </div>
                            
                            <div class="zjtd_box2_sm2 clr">
                            	<div class="fl">
                                	<p>直接和<?php print $m->data["name"]?>医生本人通话，私密安全！便捷！（我们会及时给您回电）</p>
                                    <p class="color9"> [ <span class="yellow"><?php print rand(500,600);?></span>人已使用电话咨询服务，<span class="yellow"><?php print rand(400,500);?></span>人已成功预约 ]</p>
                                </div>
                                <a<?php print App::useTarget()?> class="fr tc dh_a">一键通话</a>
                            </div>
                            
                            <div class="zjtd_box2_sm2 clr">
                            	<div class="fl">
                                	<p><?php print $m->data["spec"]?></p>
                                    <p class="color9"> [ 已有<span class="yellow"><?php print rand(400,600);?></span>位患者加号预约成功 ]</p>
                                </div>
                                <a<?php print App::useTarget()?> href="<?php print AppUrl::navSubscribe()?>" class="fr tc">申请加号</a>
                            </div>
                            
                        </div>
                        <?php include dirname(dirname(__FILE__))."/inc/dhwz.tpl.php";?>
                   </div>
                   
                   <div class="blank20"></div>

                  <div class="norques border2">
                    <div class="zjtdwztit fz18"><span></span><?php print $m->data["name"]?>文章列表</div>
                    <p class="blank20"></p>
                    
                    <div class="zjtd_box3">
                    	
                  <?php foreach($m->allByDod($m->data["sid"],4,0) as $aitem):?>           
                 <?php $a= $m->rowNoContent($aitem)?> 
 
                        <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt><img src="<?php print AppUrl::getMediaPath()?>/images/bzdot.jpg" class="fl" />
                        		<a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($a["sid"])?>">
                        		<?php print ($a["title"])?>
                        		</a>
                        		</dt>
                            <dd class="fr"> 发表于<?php print ($a["date"])?></dd>
                            <p class="blank20"></p>
                        </dl>
                        
                            <?php endforeach;?>  
                        
                        <div class="tc"><div class="blank20"></div><a<?php print App::useTarget()?> href="<?php print AppUrl::docArticleHomeByDocid($m->data["id"])?>" class="blue">查看全部文章</a></div>
                        
                    </div>
                    
                    
                  </div>
                  
                  
                  <div class="blank20"></div>
                  <div class="norques border2">
                    <div class="zjtdwztit fz18"><span></span>患者评价</div>

                    
                    
                
                      <?php foreach($m->getDataByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $dodpj):?>   
    
                      <?php $a=appraiseLvMeta::getMeta() ?>

                     <?php $b= $m->getNameByDid($dodpj["did"])?>
                     
					<?php  $c=$m->rowuser($m->data["sid"])?> 	        
                    <div class="zjtd_box4 clr">
                      <img src="<?php print AppUrl::getMediaPath()?>/avatar/<?php print ($c["avatar"]) ?>"  width="60" height="60" class="fl" />
                      <div class="zjtd_box4_sm1 fr">
                          <dl>
                              <dt class="color9">
                                  <p class="fl" style=" width:250px;">疾病： <span class="color3"> <?php print ($b)  ?></span></p>
                                  <p class="fl" style=" width:250px;">满意度： <span class="yellow"> <?php print ($a[$dodpj["lv"]]) ?></span></p>
                              </dt>
                              <dd class=" fz15">
                              <?php print AppFilter::filterOut(utility::utf8substr($dodpj["txt"],0,200)); ?>
                              </dd>
                              <dd class="color9"><?php print ($dodpj["date"]) ?>  来源： <?php print ($b)  ?></dd>
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
                     
                  </div>
                  <div class="blank20"></div>
                  
                  
                </div>
    		<!--left end-->
               
               
               
                
                <div class="fr wid300 fz13">
                  
                  <div class="syrbox2">
                    <p><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByDocidAid("hyt","338") ?>"><img src="<?php print AppUrl::getMediaPath()?>/images/syrth1.jpg" width="300" height="100" /></a></p>
        <p class="blank10"></p>
        <p><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByDocidAid("hyt","339") ?>"><img src="<?php print AppUrl::getMediaPath()?>/images/syrth2.jpg" width="300" height="100" /></a></p>
        <p class="blank10"></p>
        <p><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByDocidAid("hyt","340") ?>"><img src="<?php print AppUrl::getMediaPath()?>/images/syrth3.jpg" width="300" height="100" /></a></p>
                  </div>
                  <div class="blank20"></div>
                  <div class="syrbox3 border2">
                    <div class="syrboxtit fz18 graybg"><?php print $m->data["name"]?>&middot; 出诊时间</div>
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
                        <p class="color6"><b class="color3">预约提示：</b>以下病情患者，可在官方网站预约我的预约加号：阴茎延长，精索静脉曲张、阴茎弯曲，<a<?php print App::useTarget()?> href="<?php print AppUrl::navSubscribe()?>" class="blue">免费申请→</a></p>
                    </div>
                  </div>
                  
                  <div class="blank20"></div>
                 <script src="<?php print AppUrl::getMediaPath()?>/js/guahao.js"></script>
                    <div class="syrbox4 border2">
        <div class="syrboxtit fz18 graybg">预约挂号</div>
        <div class="syrbox4nr fz13">
                      <form name="form1" action="http://swt.gssmart.com/guahao/sockt.php" method="post" onSubmit="return guahao()" >
            <table>
              <tr>
                <td height="26"  width="62">姓      名</td>
                <td><input name="名称" id="name" class="input1 border2" type="text" /></td>
              </tr>
              <tr height="14">
                <td></td>
              </tr>
              <tr>
                <td width="62">联系电话</td>
                <td><input id="hometel" name="电话" class="input1 border2" type="text" /></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
              <tr>
                <td width="62">预约时间</td>
                <td><input id="yudate" name="预约时间"  class="input2 gray border2"  onclick="WdatePicker()" placeholder="请选择预约时间" type="text" /></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
              <tr>
                <td width="62">就诊状态</td>
                <td><input id="ismode" type="radio" name="就诊状态"  checked="checked" />
                  <label> 初诊</label>
                  <input id="ismode" class="input3" type="radio" name="就诊状态" />
                  <label> 复诊</label></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
            </table>
            <div class="sybtn">
              <button class="sybtn1" type="submit" value=""><img src="<?php print AppUrl::getMediaPath()?>/images/syrth8.jpg" width="120" height="40" /></button>
              <a class="sqjh" href="<?php print AppUrl::navSubscribe()?>" <?php print App::useTarget()?>><img src="<?php print AppUrl::getMediaPath()?>/images/syrth9.jpg" width="120" height="40" /></a>
            </div>
          </form>
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
                    <div class="blank20"></div>
                  </div>
                </div>
                
                <!--right end-->
             </div>   
             
          
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
  
  