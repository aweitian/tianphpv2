<?php 
/**
 * Sihangzhang
 * @var askModel;
 */
$m = $model;
$row = $m->data;


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
  <div id="focusindex">
    <ul class="index_banner_box clearfix">
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
    </ul>
  </div>
  <div class="listpos fz13"><span class="gray">当前位置：</span><a href="">首页 > 网络咨询</a></div>
  <div class="clearfix">
    <div class="wid680 border2 fl">
      <div class="norques">
        <div class="questit fz18">常见问题</div>
        <p class="blank20"></p>
        <div class="quesnav fz13">
          <ul class="clearfix">
            <li<?php if($row["key"] =="all"):?> class="selected"<?php endif?>><a href="<?php print AppUrl::askByLv0key("")?>">全部</a></li>
           <?php for($i=0,$D=$m->getLv0Ask(),$I=count($D);$i<$I;$i++):?>
        <li<?php if($D[$i]["key"] == $row["key"]):?> class="selected"<?php endif?>><a href="<?php print AppUrl::askByLv0key($D[$i]["key"])?>"><?php print $D[$i]["data"]?></a></li>
        <?php endfor;?>
          </ul>
        </div>
        <p class="blank15"></p>
        <div class="quesall">
        
        
          <div class="wlzxnr quescon selected fz13">
          	<?php foreach ($all["data"] as $allitem):?>
          	 <dl>
              <dt class="fl"><a href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>"><span class="fl"><?php print $allitem["title"]?></span></a><a href="<?php print AppUrl::docHomeByDod($allitem["dod"])?>"><span class="fr"><?php print $m->getNameByDod($allitem["dod"])?></span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
          	
          	<?php endforeach;?>

  
          </div>
          
 

        </div>
        <p class="blank25"></p>
        <div class="pagenum tc gray fz13"> 
        	<?php if ($pagination->hasPre()):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getMaxPage();$i++):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?>
       </div>
      </div>
    </div>
    <!--left end-->
    
    <div class="wid300 fr">
    
    <p><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/syrth4.jpg" width="300" height="90" /></a></p>
    <p class="blank20"></p>
    
    <div class="docsug border2">
    <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师观点</a><a class="fz13 blue fr" href="<?php print AppUrl::navArticle()?>">+更多</a></div>
    <div class="docsugbox fz13">
    
    <?php $thumb = $m->getRowThumbnail()?>
    <?php if (!empty($thumb)):?>
    <?php /*var_dump($thumb)*/?>
    <dl class="clearfix">
    	<dt class="fl">
    		<a href="<?php print AppUrl::articleByAid($thumb["aid"])?>"><img src="<?php print $thumb["thumb"]?>" width="80" height="60" /></a>
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
    <p class="blank20"></p>
    
    <div class="doctj border2">
    
    <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师推荐</a><a class="fz13 blue fr" href="<?php print AppUrl::navDoctors() ?>">+更多</a></div>
    <div class="doctjbox">
    <?php foreach($m->getDoctors(3) as $doc):?>
      <dl class="clearfix"><dt class="fl"><a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print HTTP_ENTRY?>/static/doctor/<?php print $doc["avatar"]?>" width="80" height="80" /></a></dt>
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
    
    </div>
    <!--right end--> 
  </div>