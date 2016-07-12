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
              <dt class="fl"><a href=""><span class="fl"><?php print $allitem["title"]?></span><span class="fr"><?php print $m->getNameByDod($allitem["dod"])?></span></a></dt>
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
    <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师观点</a><a class="fz13 blue fr" href="">+更多</a></div>
    <div class="docsugbox fz13"><dl class="clearfix"><dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/wlgd1.jpg" width="80" height="60" /></dt>
      <dd class="fl"><p>前列腺炎患者夏季排尿减少并非是好兆头</p>
      <p class="p2 clearfix"><a class="fl gray">2015-12-26</a><a class="fr gray">1011人阅读</a></p></dd></dl>
      <p class="blank15"></p>
      <ul class="othsug">
      <li><p class="p1"><a class="black" href="">前列腺炎患者夏季排尿减少并非是好兆头</a></p><p class="p2"><a class="gray" href="">勃起时间短经久拖延不治反而会导致...[全文]</a></p></li>
      <li><p class="p1"><a class="black" href="">前列腺炎患者夏季排尿减少并非是好兆头</a></p><p class="p2"><a class="gray" href="">勃起时间短经久拖延不治反而会导致...[全文]</a></p></li>
      <li><p class="p1"><a class="black" href="">前列腺炎患者夏季排尿减少并非是好兆头</a></p><p class="p2"><a class="gray" href="">勃起时间短经久拖延不治反而会导致...[全文]</a></p></li>
      <li><p class="p1"><a class="black" href="">前列腺炎患者夏季排尿减少并非是好兆头</a></p><p class="p2"><a class="gray" href="">勃起时间短经久拖延不治反而会导致...[全文]</a></p></li>
      <li><p class="p1"><a class="black" href="">前列腺炎患者夏季排尿减少并非是好兆头</a></p><p class="p2"><a class="gray" href="">勃起时间短经久拖延不治反而会导致...[全文]</a></p></li>
      </ul>      
      </div>          
    </div>
    <p class="blank20"></p>
    
    <div class="doctj border2">
    
    <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师推荐</a><a class="fz13 blue fr" href="">+更多</a></div>
    <div class="doctjbox">
    <dl class="clearfix nobor"><dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/wltjzj1.jpg" width="80" height="80" /></dt>
      <dd class="fl">
      <p class="blank5"></p>
      <p class="fz18">陈希球  <span class="gray fz13">副主任医师</span></p>
      <p class="blank5"></p>
      <p class="fz13 gray">擅长：其独特的治疗方法对久</p>
      <p class="blank5"></p>
      <p class="p3 tc"><a href="">咨询</a></p>
      </dd></dl>
      <dl class="clearfix"><dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/wltjzj1.jpg" width="80" height="80" /></dt>
      <dd class="fl">
      <p class="blank5"></p>
      <p class="fz18">陈希球  <span class="gray fz13">副主任医师</span></p>
      <p class="blank5"></p>
      <p class="fz13 gray">擅长：其独特的治疗方法对久</p>
      <p class="blank5"></p>
      <p class="p3 tc"><a href="">咨询</a></p>
      </dd></dl>
      <dl class="clearfix"><dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/wltjzj1.jpg" width="80" height="80" /></dt>
      <dd class="fl">
      <p class="blank5"></p>
      <p class="fz18">陈希球  <span class="gray fz13">副主任医师</span></p>
      <p class="blank5"></p>
      <p class="fz13 gray">擅长：其独特的治疗方法对久</p>
      <p class="blank5"></p>
      <p class="p3 tc"><a href="">咨询</a></p>
      </dd></dl>
      </div>
    
    
    
    </div>
    
    </div>
    <!--right end--> 
  </div>