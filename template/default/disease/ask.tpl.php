<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月12日
 * @Desc: 
 */

$row = $model->data;
$pageSize = 8;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}

	$data = $model->getQuestionsByDid($row["sid"],$pageSize,($page - 1) * $pageSize);
	$cnt = $model->getQuestionsByDidCnt($row["sid"]);
	$all = array(
			"count" => $cnt,
			"data"  => $data
	);


$pagination = new pagination($all["count"], $page, $pageSize, 10);

// foreach($m->getDisease() as $item)
	// {


// }

// exit;
$req = new httpRequest();
$url = new url($req->requestUri());

// var_dump($row);
$ext = diseaseExtInfoes::getExtData();
$a=Appctrl::$msg->getControl()



?>
   
  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
      	
         <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
   
          <div class="fz13">
            
            <div class="blank20"></div>
                
               <div class="clr">
               	<div class="wid680 border2 fl">
                      <div class="norques">
                        <div class="questit fz18"><?php print $row["data"]?>热门咨询</div>
                        <p class="blank20"></p>
                        <div class="quesnav fz13">
                          <ul class="clearfix">
                   
      
                   
                  <li>   <a>热门问答</a></li>
             <?php foreach($model->getSiblingDids($row["sid"]) as $xbz):?>             	
                            <li <?php if($a == $xbz["key"]):?> class="selected"<?php endif?>> <a href="<?php print AppUrl::disAskByDiseasekey($xbz["key"])?>"><?php print $xbz["data"] ?></a></li>
            <?php endforeach;?>

                          </ul>
                        </div>
                        <p class="blank15"></p>
                        <div class="quesall">
                          <div class="jb_hzzx quescon selected fz13">
                            	
                                <div class="advise_box pr clearfix">
       
                     

                     	                            <ul class="clearfix">
                    
                   
                    
                    	<?php foreach ($all["data"] as $allitem):?>
                <?php $user= $model->row($allitem["uid"])?> 
	  			<?php $doc= $model->getInfoByDod($allitem["dod"])?> 
				<?php $ans = $model->getAnswerByAskid($allitem["sid"])?>
                            
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3"><?php print $allitem["title"]?></a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交
                                         
                                            <?php print utility::utf8Substr($allitem["date"], 0, 10)?>  疾病分类：<a class="bule"><?php print $row["data"]?></a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print AppUrl::getMediaPath()?>/avatar/<?php print $user["avatar"]?>" width="31" height="31"></div>
                                                
                                                <div class="advise_box_con fl"> <?php print utility::utf8Substr($allitem["desc"], 0, 30)?>
                                               
                                                <a href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>" target="blank"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" width="31" height="31"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>" class="bule"><?php print $doc["name"]?></a></div>
                                                <div class="advise_box_con fl">  <a href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>">
                                                
                                                 <?php if (!empty($ans["content"]))  :?>
                             
                              	<?php print utility::utf8Substr($ans["content"], 0, 40) ?>
                             <?php endif; ?>
                             
                             </a></div>
                                            </div>
                                        </li>
                                         	<?php endforeach;?>     
                                        
                           
                                        
                                    </ul>
                                </div>
                                
                          </div>
                       
                        
                        </div>
                        <p class="blank25"></p>
                        <div class="pagenum tc gray fz13"><?php if ($pagination->hasPre()):?>
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