<?php 
/**
 * Sihangzhang
 * @var articleModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;



$pageSize = 12;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}



$pagination = new pagination($m->getAllFullCnt(), $page, $pageSize, 10);

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
  <div id="focusindex">
    <ul class="index_banner_box clearfix">
      <li><a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print AppUrl::getMediaPath()?>/images/sybanner1.jpg" width="998" height="238" /></a></li>
    </ul>
  </div>
  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a href="">首页</a> > <a href="">专题列表</a></div>
  
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
                            	<b class="fz18 color3"><a href="<?php print AppUrl::articleByAid($a1["aid"])?>"><?php print utility::utf8Substr($a1["title"], 0, 15) ?></a></b>
                                <p class="color9"><?php print utility::utf8Substr($a1["desc"], 0, 80) ?>...<a href="<?php print AppUrl::articleByAid($a1["aid"])?>" class="bule">[查看全文]</a></p>
                            </dd>
                        </dl>                  
                        <?php endif?>
                    
                        <div class="blank20"></div>
                        <div class="clr jb_box2">
                        <?php if (!empty($a2)):?>
                        	<div class="zt_box2 fl" style="padding-right:30px; border-bottom:1px dotted #d7d7d7;">
                            
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/syhot1.jpg" /></span>
                                    	<p class="fr"><a href="<?php print AppUrl::articleByAid($a2["aid"])?>"><?php print utility::utf8Substr($a2["title"], 0, 15) ?></a>...</p>
                                </div>
                                <div class="blank15"></div>
                            </div>
                           <?php endif?>   
                                     <?php if (!empty($a3)):?>
                            <div class="zt_box2 fr" style="padding-left:15px; border-left:1px dotted #d7d7d7; border-bottom:1px dotted #d7d7d7;">
                    
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/syhot1.jpg" /></span>
                                    	<p class="fr"><a href="<?php print AppUrl::articleByAid($a3["aid"])?>"><?php print utility::utf8Substr($a3["title"], 0, 15) ?></a>...</p>
                                </div>
                                <div class="blank15"></div>
                            </div>
                               <?php endif?>
                                      <?php if (!empty($a4)):?>
                            <div class="zt_box2 fl" style="width:290px; padding-right:30px;">
                            	<div class="blank15"></div>
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/syhot1.jpg" /></span>
                                    	<p class="fr"><a href="<?php print AppUrl::articleByAid($a4["aid"])?>"><?php print utility::utf8Substr($a4["title"], 0, 30) ?></a>...</p>
                                </div>
                                <div class="blank15"></div>
                                
                            </div>
                             <?php endif?>
                                 <?php if (!empty($a5)):?>
                            <div class="zt_box2 fr" style="width:290px; padding-left:20px; border-left:1px dotted #d7d7d7;">
                            	<div class="blank15"></div>
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/syhot1.jpg" /></span>
                                    	<p class="fr"><a href="<?php print AppUrl::articleByAid($a5["aid"])?>"><?php print utility::utf8Substr($a5["title"], 0, 30) ?></a>...</p>
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
                                	<a href="<?php print AppUrl::articleByAid($lb["aid"])?>"><?php print utility::utf8Substr($lb["title"], 0, 30) ?></a>
                                    <p><?php print utility::utf8Substr($lb["desc"], 0, 80) ?>...</p>
                                </li>
                                   	<?php endforeach;?>
                              
                            </ul>
                            
                        </div>
                        
                        <div class="blank35"></div>
                        <div class="pagenum tc gray fz13"> <?php if ($pagination->hasPre()):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getMaxPage();$i++):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?> </div>
                	</div>
                </div>
               
               
    			<!--left end-->
                
                <div class="fr wid300 fz13">
                	
                    <div class="doctj border2">
    
    <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师推荐</a><a class="fz13 blue fr" href="<?php print AppUrl::navDoctors() ?>">+更多</a></div>
    <div class="doctjbox">
    
        <?php foreach($m->getDoctors(3) as $doc):?>
      <dl class="clearfix"><dt class="fl"><a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" width="80" height="80" /></a></dt>
      <dd class="fl">
      <p class="blank5"></p>
      <p class="fz18"><?php print $doc["name"]; ?><span class="gray fz13"><?php print $doc["lv"]; ?></span></p>
      <p class="blank5"></p>
      <p class="fz13 gray">擅长：<?php print $doc["spec"]; ?></p>
      <p class="blank5"></p>
      <p class="p3 tc"><a href="<?php print AppUrl::getSwtUrl()?>">咨询</a></p>
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
              <button value=""><img src="<?php print AppUrl::getMediaPath()?>/images/syrth9.jpg" width="120" height="40" /></button>
            </div>
          </form>
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
 
  