<?php 
/**
 * @var putModel;
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
 
$this->title = "咨询医院在线医生_咨询专家_上海九龙男子医院";
$this->description = "";
$this->keyword = "";



// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
?>
  <div class="listpos fz13"><span class="gray">当前位置：</span><a<?php print App::useTarget()?> href="/">首页 </a>><a href="">我要提问</a> </div>
  <div class="clearfix">
    <div class="wid680 fl border2">
      <div class="quetwbox">
        <form name="gh" onSubmit="return chk(this)" action="<?php print AppUrl::navPut()?>" method="post">
        <div class="blank25"></div>
        <div class="twtit clearfix">
          <div class="twtitl fl fz16"><span class="tc white">1</span>您哪里不舒服 </div>
          <div class="twtitr fr gray fz13">标题不少于10个字</div>
        </div>
        <div class="blank10"></div>
        <div class="wtbox">
          <input placeholder="请用简单描述您的问题..." class="wtmsinp border2 fz13 gray" type="text" name="title" />
        </div>
          <div class="blank25"></div>
        <div class="twtit clearfix">
          <div class="twtitl fl fz16"><span class="tc white">2</span>选择医生</div>
          <div class="twtitr2 fl border2">
          <select class="fz16 gray" name="d">

							<option value="0">选择医生</option>
						<?php foreach($model->getAllDoc() as $doc):?>
						<option value="<?php print $doc["sid"]?>"><?php print $doc["name"]?></option>
						<?php endforeach;?>
					</select>
          </div>
        </div>
  
        <div class="blank25"></div>
        <div class="twtit clearfix">
          <div class="twtitl fl fz16"><span class="tc white">3</span>选择疾病分类</div>
          <div class="twtitr2 fl border2">
            <select name="j" class="fz16 gray">
              <option value="0">请选择</option>
             	  <?php foreach($model->getLv0KeyInfoes() as $xbz):?>   	
                       	<option value="<?php print $xbz["sid"] ?>"><?php print $xbz["data"] ?></option>     
            <?php endforeach;?>
            </select>
          </div>
        </div>
        <div class="blank25"></div>
        
        <div class="twtit clearfix">
          <div class="twtitl fl fz16"><span class="tc white">4</span>请详细描述您的病情</div>
          <div class="twtitr fr gray fz13">描述不少于20个字</div>
        </div>
        <div class="blank10"></div>
        <div class="wtbox border2">
          <textarea class="hei110 fz13 gray" placeholder="描述越详细，医生回复质量越高" name="desc"></textarea>
          <!-- 
          <div class="scpic graybg  fz13 gray clearfix">
            <div class="scpicl fl"><span><img src="<?php print AppUrl::getMediaPath()?>/images/camr.jpg" width="18" height="15" /></span>上传疾病图片</div>
            <div class="scpicr fr">上传病例图或患病部位照片（单张< 2M，最多 3 张）</div>
          </div>
          -->
          
        </div>
        <div class="blank25"></div>
        <div class="twtit clearfix">
          <div class="twtitl fl fz16"><span class="tc white">5</span>想要得到哪些帮助？ </div>
          <div class="twtitr fr gray fz13">描述不能为空</div>
        </div>
        <div class="blank10"></div>
        <div class="wtbox border2">
          <textarea class="hei40 fz13 gray" placeholder="描述越详细，医生回复质量越高" name="svr"></textarea>
        </div>
        <div class="blank30"></div>
        <div class="blank5"></div>
        <div class="tjtodoc">
        <?php if(AppUser::getInstance()->auth->isLogined()):?>
        
          <button class=" nobor tc white fz18" type="submit">提交给医生</button>
        <?php else:?>
        
        <button class="white fz18 hui" disabled type="submit">请登陆后再提交</button>
        <?php endif?>
        </div>
        </form>
      </div>
    </div>
    
    
    <script type="text/javascript">
			
function chk(f){
if (f.title.value=="")
{ 
	alert("请描述你的问题");
	f.title.focus();
	return false;
}
if (f.d.value=="0")
{ 
	alert("请选择医生");
	f.j.focus();
	return false;
}
if (f.j.value=="0")
{ 
	alert("请选择疾病");
	f.j.focus();
	
	return false;
}

if (f.desc.value == "")
{ 
alert("请描述病情");
f.desc.focus();
return false;
}

if (f.svr.value=="")
{ 
	alert("想要得到哪些帮助？");
	f.svr.focus();
	return false;
}





return true;



}

</script>
    <!--left end-->
    <div class="wid300 fr">
      <div class="zxfpage border3">
        <div class="syrboxtit fz18 qpinkbg">咨询范文</div>
        <div class="zxfpagebox dgray fz13">
          <p><b>您哪里不舒服：</b></p>
          <p>肚子疼，便溏是怎么回事？
            男，24岁</p>
          <div class="blank25"></div>
          <p><b>请详细描述您的病情：</b></p>
          <p>平时无不适，昨天晚上聚餐，喝了些酒，有点高了；早上感觉有些头晕，肚子也难受，上了几次厕所，便溏；然后伴有恶心，面色苍白，呕吐，这是怎么了？</p>
          <div class="blank25"></div>
          <p><b>需要医生哪些帮助：</b></p>
          <p>请问医生我这是怎么了？怎么样才能快速缓解？谢谢！</p>
        </div>
      </div>
    </div>
    <!--right end--> 
  </div>
  
  <!--tjwdbox end-->
  <div class="blank20"></div>
