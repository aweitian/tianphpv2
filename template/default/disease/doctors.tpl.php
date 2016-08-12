<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月12日
 * @Desc: 
 */

$row = $model->data;
// var_dump($row);
$ext = diseaseExtInfoes::getExtData();


$pageSize = 6;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($model->getAllCnt($row["sid"]), $page, $pageSize, 6);


$req = new httpRequest();
$url = new url($req->requestUri());
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
                  
                    <div class="padd20 border2">
                    	<div class="zjtdwztit fz18"><span></span>诊后服务星<a href="" class="fr fz13 color9">+更多</a></div>
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
                        
                        
                          	<?php foreach($model->getDoctors($pageSize,($page-1)*$pageSize) as $doc):?>
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
                        <div class="pagenum tc gray fz13">  <?php if ($pagination->hasPre()):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?>  </div>
                        <div class="blank15"></div>
                        
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
  