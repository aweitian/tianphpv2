<?php 
/**
 * @var askModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;

$tree_dis = array();
foreach ($m->getDisease() as $item){
	if(!array_key_exists($item["pid"], $tree_dis)){
		$tree_dis[$item["pid"]] = array(
			"text" => $item["pd"],
			"children" => array()
		);
	}
	$tree_dis[$item["pid"]]["children"][$item["mid"]] = array($item["md"],$item["url"]);
}
 




// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
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
            <li class="selected">全部</li>
            <li>前列腺炎</li>
            <li>前列腺增生</li>
            <li>前列腺痛</li>
            <li>前列腺肥大</li>
            <li>前列腺囊肿</li>
            <li>前列腺癌</li>
          </ul>
        </div>
        <p class="blank15"></p>
        <div class="quesall">
          <div class="wlzxnr quescon selected fz13">
            <dl>
              <dt class="fl"><a href=""><span class="fl">1跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
          </div>
          <div class="wlzxnr quescon fz13">
            <dl>
              <dt class="fl"><a href=""><span class="fl">2跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
          </div>
          <div class="wlzxnr quescon  fz13">
            <dl>
              <dt class="fl"><a href=""><span class="fl">3跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
          </div>
          <div class="wlzxnr quescon  fz13">
            <dl>
              <dt class="fl"><a href=""><span class="fl">4跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
          </div>
          <div class="wlzxnr quescon fz13">
            <dl>
              <dt class="fl"><a href=""><span class="fl">5跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
          </div>
          <div class="wlzxnr quescon fz13">
            <dl>
              <dt class="fl"><a href=""><span class="fl">6跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
          </div>
          <div class="wlzxnr quescon fz13">
            <dl>
              <dt class="fl"><a href=""><span class="fl">7跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
            <dl>
              <dt class="fl"><a href=""><span class="fl">跟我老婆做爱，阴茎总是疼，这是怎么回事...</span><span class="fr">韩用涛</span></a></dt>
              <dd class="fr gray"><a>回复</a></dd>
            </dl>
          </div>
        </div>
        <p class="blank25"></p>
        <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
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