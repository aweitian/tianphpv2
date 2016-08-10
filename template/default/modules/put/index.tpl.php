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
 




// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
?>
  <div class="listpos fz13"><span class="gray">当前位置：</span><a href="">首页 > 我要提问</a></div>
  <div class="clearfix">
    <div class="wid680 fl border2">
      <div class="quetwbox">
        <div class="blank25"></div>
        <div class="twtit clearfix">
          <div class="twtitl fl fz16"><span class="tc white">1</span>您哪里不舒服 </div>
          <div class="twtitr fr gray fz13">标题不少于10个字</div>
        </div>
        <div class="blank10"></div>
        <div class="wtbox">
          <input placeholder="请用简单描述您的问题..." class="wtmsinp border2 fz13 gray" />
        </div>
        <div class="blank25"></div>
        <div class="twtit clearfix">
          <div class="twtitl fl fz16"><span class="tc white">2</span>选择疾病分类</div>
          <div class="twtitr2 fl border2">
            <select class="fz16 gray">
              <option>请选择</option>
              <option>疾病1</option>
              <option>疾病2</option>
            </select>
          </div>
        </div>
        <div class="blank25"></div>
        <div class="twtit clearfix">
          <div class="twtitl fl fz16"><span class="tc white">3</span>请详细描述您的病情</div>
          <div class="twtitr fr gray fz13">描述不少于20个字</div>
        </div>
        <div class="blank10"></div>
        <div class="wtbox border2">
          <textarea class="hei110 fz13 gray" placeholder="描述越详细，医生回复质量越高"></textarea>
          <div class="scpic graybg  fz13 gray clearfix">
            <div class="scpicl fl"><span><img src="<?php print AppUrl::getMediaPath()?>/images/camr.jpg" width="18" height="15" /></span>上传疾病图片</div>
            <div class="scpicr fr">上传病例图或患病部位照片（单张< 2M，最多 3 张）</div>
          </div>
        </div>
        <div class="blank25"></div>
        <div class="twtit clearfix">
          <div class="twtitl fl fz16"><span class="tc white">4</span>想要得到哪些帮助？ </div>
          <div class="twtitr fr gray fz13">描述不能为空</div>
        </div>
        <div class="blank10"></div>
        <div class="wtbox border2">
          <textarea class="hei40 fz13 gray" placeholder="描述越详细，医生回复质量越高"></textarea>
        </div>
        <div class="blank30"></div>
        <div class="blank5"></div>
        <div class="tjtodoc">
          <button class=" nobor tc white fz18" value="提交给医生" type="submit">提交给医生</button>
        </div>
      </div>
    </div>
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
