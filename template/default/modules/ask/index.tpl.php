<?php 
/**
 * Sihangzhang
 * @var askModel;
 */
$m = $model;
$row = $m->data;


$this->title = "网上咨询男科在线专家_咨询男科医院在线医生_上海九龙男子医院";
$this->keyword = "";
$this->description = "上海九龙男子医院有25位医生根据你的病情给些相应的治疗建议，网上咨询男科在线医生，咨询男科医院在线专家，疾病查询，网上咨询疾病，咨询男科医生专家就去上海九龙男子医院。";


$pageSize = 20;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}
if ($row["sid"] == 0) {
	$all = $m->getAllQuestions(($page - 1) * $pageSize,$pageSize);
} else {
	$data = $m->getQuestionsByLv0Did($row["sid"],$pageSize,($page - 1) * $pageSize);
	$cnt = $m->getQuestionsCountByLv0Did($row["sid"]);
	$all = array(
		"count" => $cnt,
		"data"  => $data	
	);
}


$pagination = new pagination($all["count"], $page, $pageSize, 10);

// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
$req = new httpRequest();
$url = new url($req->requestUri());

?>
 <div class="blank20"></div>
  <?php include dirname(dirname(dirname(__FILE__)))."/inc/banner.php"?>
  <div class="listpos fz13"><span class="gray">当前位置：</span><a<?php print App::useTarget()?> href="href="<?php print AppUrl::navHome()?>">首页</a>  > <a href="<?php print AppUrl::navAsk() ?>">网络咨询</a></div>
  <div class="clearfix">
    <div class="wid680 border2 fl">
      <div class="norques">
        <div class="questit fz18">常见问题</div>
        <p class="blank20"></p>
        <div class="quesnav fz13">
          <ul class="clearfix">
            <li<?php if($row["key"] =="all"):?> class="selected"<?php endif?>><a<?php print App::useTarget()?> href="<?php print AppUrl::askByLv0key("")?>">全部</a></li>
           <?php for($i=0,$D=$m->getLv0Ask(),$I=count($D);$i<$I;$i++):?>
        <li<?php if($D[$i]["key"] == $row["key"]):?> class="selected"<?php endif?>><a<?php print App::useTarget()?> href="<?php print AppUrl::askByLv0key($D[$i]["key"])?>"><?php print $D[$i]["data"]?></a></li>
        <?php endfor;?>
          </ul>
        </div>
      
        <p class="blank15"></p>
        <div class="quesall">
        
        
          <div class="wlzxnr quescon selected fz13">
          	<?php foreach ($all["data"] as $allitem):?>
          	 <dl>
              <dt class="fl"><a<?php print App::useTarget()?> href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>"><span class="fl"><?php print $allitem["title"]?></span></a><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDod($allitem["dod"])?>"><span class="fr"><?php print $m->getNameByDod($allitem["dod"])?></span></a></dt>
              <dd class="fr gray"><a<?php print App::useTarget()?>>回复</a></dd>
            </dl>
          	
          	<?php endforeach;?>

  
          </div>
          
 

        </div>
        <p class="blank25"></p>
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
    </div>
    <!--left end-->
    
    <div class="wid300 fr">
    
    <p><a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl() ?>"><img src="<?php print AppUrl::getMediaPath()?>/images/syrth4.jpg" width="300" height="90" /></a></p>
    <p class="blank20"></p>
    
    <div class="docsug border2">
    <div class="syrboxtit fz18 graybg clearfix"><a<?php print App::useTarget()?> class="fl">医师观点</a><a<?php print App::useTarget()?> class="fz13 blue fr" href="<?php print AppUrl::navArticle()?>">+更多</a></div>
    <div class="docsugbox fz13">
    
    <?php $thumb = $m->getRowThumbnail()?>
    <?php if (!empty($thumb)):?>
    <?php /*var_dump($thumb)*/?>
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
      <p><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($thumb["aid"])?>"><?php print utility::utf8Substr($thumb["title"],0,16);?></a></p>
      
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
      </div>          
    </div>
    <p class="blank20"></p>
    
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
    
    </div>
    <!--right end--> 
  </div>