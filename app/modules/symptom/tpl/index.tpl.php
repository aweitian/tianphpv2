<?php 
/**
 * @var symptomModel;
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
  <div class="listpos fz13"><span class="gray">当前位置：</span><a href="">首页 > 男科症状</a></div>
  <div class="clearfix">
    <div class="fl wid300 border2">
      <div class="syrboxtit fz18 graybg">男科症状分类</div>
      <div class="allfrombz">
        <dl class="selected">
          <dt class="fz18 blue">龟头异常症状</dt>
          <dd class="fz16 dgray">
            <p class="p1">诱发疾病：</p>
            <p><a href="">龟头炎</a>|<a href="">生殖疱疹</a>|<a href="">淋病</a>|<a href="">尖锐湿疣</a>|<a href="">非淋</a></p>
          </dd>
        </dl>
        <dl>
          <dt class="fz18 blue">包皮异常症状</dt>
          <dd class="fz16 dgray">
            <p class="p1">诱发疾病：</p>
            <p><a href="">龟头炎</a>|<a href="">生殖疱疹</a>|<a href="">淋病</a>|<a href="">尖锐湿疣</a>|<a href="">非淋</a></p>
          </dd>
        </dl>
        <dl>
          <dt class="fz18 blue">阴茎异常症状</dt>
          <dd class="fz16 dgray">
            <p class="p1">诱发疾病：</p>
            <p><a href="">龟头炎</a>|<a href="">生殖疱疹</a>|<a href="">淋病</a>|<a href="">尖锐湿疣</a>|<a href="">非淋</a></p>
          </dd>
        </dl>
        <dl>
          <dt class="fz18 blue">尿道口异常症状</dt>
          <dd class="fz16 dgray">
            <p class="p1">诱发疾病：</p>
            <p><a href="">龟头炎</a>|<a href="">生殖疱疹</a>|<a href="">淋病</a>|<a href="">尖锐湿疣</a>|<a href="">非淋</a></p>
          </dd>
        </dl>
        <dl>
          <dt class="fz18 blue">阴囊异常症状</dt>
          <dd class="fz16 dgray">
            <p class="p1">诱发疾病：</p>
            <p><a href="">龟头炎</a>|<a href="">生殖疱疹</a>|<a href="">淋病</a>|<a href="">尖锐湿疣</a>|<a href="">非淋</a></p>
          </dd>
        </dl>
        <dl>
          <dt class="fz18 blue">睾丸异常症状</dt>
          <dd class="fz16 dgray">
            <p class="p1">诱发疾病：</p>
            <p><a href="">龟头炎</a>|<a href="">生殖疱疹</a>|<a href="">淋病</a>|<a href="">尖锐湿疣</a>|<a href="">非淋</a></p>
          </dd>
        </dl>
        <dl>
          <dt class="fz18 blue">精液异常症状</dt>
          <dd class="fz16 dgray">
            <p class="p1">诱发疾病：</p>
            <p><a href="">龟头炎</a>|<a href="">生殖疱疹</a>|<a href="">淋病</a>|<a href="">尖锐湿疣</a>|<a href="">非淋</a></p>
          </dd>
        </dl>
        <dl>
          <dt class="fz18 blue">射精异常症状</dt>
          <dd class="fz16 dgray">
            <p class="p1">诱发疾病：</p>
            <p><a href="">龟头炎</a>|<a href="">生殖疱疹</a>|<a href="">淋病</a>|<a href="">尖锐湿疣</a>|<a href="">非淋</a></p>
          </dd>
        </dl>
        <dl>
          <dt class="fz18 blue">勃起异常症状</dt>
          <dd class="fz16 dgray">
            <p class="p1">诱发疾病：</p>
            <p><a href="">龟头炎</a>|<a href="">生殖疱疹</a>|<a href="">淋病</a>|<a href="">尖锐湿疣</a>|<a href="">非淋</a></p>
          </dd>
        </dl>
        <dl>
          <dt class="fz18 blue">排尿异常</dt>
          <dd class="fz16 dgray">
            <p class="p1">诱发疾病：</p>
            <p><a href="">龟头炎</a>|<a href="">生殖疱疹</a>|<a href="">淋病</a>|<a href="">尖锐湿疣</a>|<a href="">非淋</a></p>
          </dd>
        </dl>
      </div>
    </div>
    <div class="fr wid680 border2">
      <div class="fromzzrbox">
        <div class="fromzzrnr">
          <dl>
            <dt class="fz18"><img src="<?php print HTTP_ENTRY?>/static/images/fzz1.png" width="18" height="18" />龟头异常症状</dt>
            <dd class="dgray fz13"><a href="">龟头疼痛</a>|<a href="">红肿龟头</a>|<a href="">痒龟红点</a>|<a href="">龟头溃烂滴白</a>|<a href="">感龟头长小颗粒</a>|<a href="">龟头脱皮</a>|<a href="">龟头异味</a>|<a href="">龟头长水泡</a>|<a href="">龟头发黑发紫</a>|<a href="">龟头发白</a>|<a href="">龟头粘连</a>|<a href="">龟头长肉芽</a>|<a href="">龟头黑点黑斑</a>|<a href="">珍珠疹</a>|<a href="">龟头溃疡</a>|<a href="">龟头发白</a>|<a href="">龟头发红</a>|<a href="">龟头异味</a>|<a href="">龟头流脓</a>|<a href="">龟头污垢</a>|<a href="">龟头湿疹</a>|<a href="">龟头红肿</a>|<a href="">龟头敏感</a>|<a href="">龟头不露</a>|<a href="">龟头不硬</a></a>|<a href="">龟头痒</a>|<a href="">龟头滴白</a>|<a href="">龟头蜕皮</a>|<a href="">龟头破皮</a></dd>
          </dl>
        </div>
        <div class="fromzzrzj">
          <dl class="clearfix">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/fzzj1.png" width="80" height="80" /></dt>
            <dd class="ddl fl">
              <p class="p1 fz16">张俊峰 <span class="dgray">主治医师</span></p>
              <p class="p2 fz13 gray"><span class="black">擅长：</span>擅长于泌尿系感染、前列腺炎、性功能障碍、
                男性不育等方面的治疗。</p>
            </dd>
            <dd class="ddr fr tc fz18"><a href="">点击咨询</a></dd>
          </dl>
        </div>
        <div class="fromzzrnr">
          <dl>
            <dt class="fz18"><img src="<?php print HTTP_ENTRY?>/static/images/fzz2.png" width="18" height="18" />包皮异常症状</dt>
            <dd class="dgray fz13"><a href="">包皮长红色小颗粒</a>|<a href="">包皮红肿</a>|<a href="">包皮瘙痒</a>|<a href="">包皮肉刺肉芽</a>|<a href="">包皮水泡</a>|<a href="">包皮长小颗粒</a>|<a href="">包皮白点</a>|<a href="">包皮龟头粘连</a>|<a href="">包皮溃疡溃烂</a>|<a href="">包皮出血</a>|<a href="">包皮脱皮</a>|<a href="">包皮发白</a>|<a href="">包皮黑点黑斑</a>|<a href="">包皮异味</a>|<a href="">包皮嵌顿</a>|<a href="">包皮疼痛</a>|<a href="">包皮增生物</a>|<a href="">包皮白点</a>|<a href="">包皮红点</a>|<a href="">包皮开裂</a>|<a href="">包皮系带</a>|<a href="">包皮小泡</a>|<a href="">包皮垢</a>|<a href="">包皮疙瘩</a>|<a href="">包皮脱皮</a>|<a href="">包皮溃疡</a>|<a href="">包皮异味</a>|<a href="">包皮痘痘颗粒</a>|<a href="">包皮分泌物</a>|<a href="">包皮疼痛</a>|<a href="">包皮痒</a>|<a href="">包皮肿</a></dd>
          </dl>
        </div>
        <div class="fromzzrzj">
          <dl class="clearfix">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/fzzj2.png" width="80" height="80" /></dt>
            <dd class="ddl fl">
              <p class="p1 fz16">韩用涛 <span class="dgray">副主任医师</span></p>
              <p class="p2 fz13 gray"><span class="black">擅长：</span>男性不育症、性功能障碍、慢性前列腺炎和各类生殖感染疾病的治疗。</p>
            </dd>
            <dd class="ddr fr tc fz18"><a href="">点击咨询</a></dd>
          </dl>
        </div>
        <div class="fromzzrnr">
          <dl>
            <dt class="fz18"><img src="<?php print HTTP_ENTRY?>/static/images/fzz3.png" width="18" height="18" />阴茎异常症状</dt>
            <dd class="dgray"><a href="">阴茎红点红疹</a>|<a href="">阴茎红肿潮红</a>|<a href="">阴茎滴白流脓</a>|<a href="">阴茎瘙痒</a>|<a href="">阴茎包皮粘连</a>|<a href="">阴茎长小疙瘩</a>|<a href="">阴茎疼痛</a>|<a href="">阴茎发黑发紫阴</a>|<a href="">阴茎黑点黑斑</a>|<a href="">阴茎长菜花状</a>|<a href="">阴茎发白</a>|<a href="">阴茎溃疡溃烂</a>|<a href="">阴茎肉刺肉芽</a>|<a href="">阴茎有硬下疳</a>|<a href="">阴茎敏感</a>|<a href="">阴茎蜕皮</a> | 阴茎不硬</a>|<a href="">阴茎灼热</a>|<a href="">阴茎红肿</a>|<a href="">阴茎异味</a>|<a href="">阴茎出血</a>|<a href="">阴茎疼痛</a>|<a href="">阴茎痒</a>|<a href="">阴茎红点红疹</a>|<a href="">阴茎囊肿</a>|<a href="">阴茎白点</a> | 阴茎水泡</a>|<a href="">阴茎蜕皮</a>|<a href="">阴茎滴白</a>|<a href="">阴茎长肉增生物</a>|<a href="">阴茎红点</a>|<a href="">阴茎流脓</a>|<a href="">阴茎硬块</a>|<a href="">阴茎长肉增生物</a></dd>
          </dl>
        </div>
        <div class="fromzzrzj">
          <dl class="clearfix">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/fzzj3.png" width="80" height="80" /></dt>
            <dd class="ddl fl">
              <p class="p1 fz16">陈开亮 <span class="dgray">副主任医师</span></p>
              <p class="p2 fz13 gray"><span class="black">擅长：</span>对前列腺炎、性功能障碍、阳痿早泄、不育症等疾病的治疗。</p>
            </dd>
            <dd class="ddr fr tc fz18"><a href="">点击咨询</a></dd>
          </dl>
        </div>
        <div class="fromzzrnr">
          <dl>
            <dt class="fz18"><img src="<?php print HTTP_ENTRY?>/static/images/fzz4.png" width="18" height="18" />尿道口异常症状</dt>
            <dd class="dgray"><a href="">尿道口长肉</a>|<a href="">尿道口水泡</a>|<a href="">尿道口溃疡糜烂</a>|<a href="">尿道口发黑发紫</a>|<a href="">尿道口灼热</a>|<a href="">尿道口痒</a>|<a href="">尿道口红肿</a>|<a href="">尿道口流脓</a>|<a href="">尿道口异味</a>|<a href="">尿道口出血</a>|<a href="">尿道口疼痛</a>|<a href="">尿道口疙瘩</a>|<a href="">尿道口滴白</a>|<a href="">尿道口红点红疹</a>|<a href="">尿道口发红</a>|<a href="">尿道口囊肿</a></dd>
          </dl>
        </div>
        <div class="fromzzrzj">
          <dl class="clearfix">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/fzzj4.png" width="80" height="80" /></dt>
            <dd class="ddl fl">
              <p class="p1 fz16">郑殿增 <span class="dgray">副主任医师</span></p>
              <p class="p2 fz13 gray"><span class="black">擅长：</span>对各种感染引起的顽固性前列腺炎、尿道炎、前列腺肥大、阳痿早泄、男性不育治疗有独特疗效。</p>
            </dd>
            <dd class="ddr fr tc fz18"><a href="">点击咨询</a></dd>
          </dl>
        </div>
        <div class="fromzzrnr">
          <dl>
            <dt class="fz18"><img src="<?php print HTTP_ENTRY?>/static/images/fzz5.png" width="18" height="18" />阴囊异常症状</dt>
            <dd class="dgray"><a href="">阴囊下垂</a>| <a href="">阴囊坠胀</a>|<a href="">阴囊酸胀</a>|<a href="">阴囊发痒</a>|<a href="">阴囊疼痛</a>|<a href="">阴囊肿胀</a>|<a href="">龟头异味</a>|<a href="">龟头长水泡</a>|<a href="">龟头发黑发紫</a>|<a href="">阴囊变硬</a>|<a href="">阴囊长痘痘</a>|<a href="">阴囊小疙瘩</a>|<a href="">阴囊潮湿</a>|<a href="">阴囊囊肿</a>|<a href="">阴囊发凉</a>|<a href="">阴囊小阴囊内有硬块</a>|<a href="">阴囊硬结</a>|<a href="">阴囊扭转</a>|<a href="">阴囊萎缩</a>|<a href="">阴囊大小高低不一</a>|<a href="">阴囊长水泡</a>|<a href="">阴囊肉刺菜花状增生物</a></dd>
          </dl>
        </div>
        <div class="fromzzrzj">
          <dl class="clearfix">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/fzzj5.png" width="80" height="80" /></dt>
            <dd class="ddl fl">
              <p class="p1 fz16">张耀龙 <span class="dgray">副主任医师</span></p>
              <p class="p2 fz13 gray"><span class="black">擅长：</span>对各种生殖器皮肤病，如湿疹、银屑病的诊治。</p>
            </dd>
            <dd class="ddr fr tc fz18"><a href="">点击咨询</a></dd>
          </dl>
        </div>
        <div class="fromzzrnr">
          <dl>
            <dt class="fz18"><img src="<?php print HTTP_ENTRY?>/static/images/fzz6.png" width="18" height="18" />睾丸异常症状</dt>
            <dd class="dgray"><a href="">睾丸下垂坠</a>|<a href="">睾丸胀酸胀</a>|<a href="">睾丸内有硬块</a>|<a href="">睾丸扭转</a>|<a href="">睾丸潮湿</a>|<a href="">睾丸大小高低不一</a>|<a href="">睾丸水泡</a>|<a href="">睾丸肉刺</a>|<a href="">睾丸萎缩</a>|<a href="">睾丸发凉</a>|<a href="">睾丸长痘痘</a>|<a href="">睾丸小疙瘩</a>|<a href="">睾丸疼痛</a>|<a href="">睾丸发痒</a>|<a href="">睾丸囊肿</a>|<a href="">睾丸肿胀肿硬</a>|<a href="">睾丸小</a>|<a href="">隐睾</a>|<a href="">睾丸潮湿</a>|<a href="">睾丸检查</a>|<a href="">睾丸痒</a>|<a href="">睾丸萎缩</a>|<a href="">睾丸痛</a>|<a href="">睾丸扭转</a>|<a href="">睾丸肿了睾丸湿疹</a>|<a href="">睾丸大小高低</a>|<a href="">睾丸附睾囊肿</a>|<a href="">睾丸坠胀</a>|<a href="">睾丸有疙瘩</a>|<a href="">蛋疼</a>|<a href="">睾丸脱皮</a></dd>
          </dl>
        </div>
        <div class="fromzzrzj">
          <dl class="clearfix">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/fzzj6.png" width="80" height="80" /></dt>
            <dd class="ddl fl">
              <p class="p1 fz16">吴任红 <span class="dgray">副主任医师</span></p>
              <p class="p2 fz13 gray"><span class="black">擅长：</span>对男性泌尿系疾病有深入研究，熟悉各类泌尿系感染疾病的病例基础、诊断治疗和临床操作。</p>
            </dd>
            <dd class="ddr fr tc fz18"><a href="">点击咨询</a></dd>
          </dl>
        </div>
        <div class="fromzzrnr">
          <dl>
            <dt class="fz18"><img src="<?php print HTTP_ENTRY?>/static/images/fzz7.png" width="18" height="18" />精液异常症状</dt>
            <dd class="dgray"><a href="">精液果冻状</a>|<a href="">精液异味</a>|<a href="">精液发黄</a>|<a href="">精液带血</a>|<a href="">精液浅红色</a>|<a href="">精液团状</a>|<a href="">精液混浊</a>|<a href="">精液少精</a>|<a href="">精液不液化</a>|<a href="">精液稀</a>|<a href="">精道梗阻</a>|<a href="">输精管梗塞</a>|<a href="">附睾结核垂体病变</a>|<a href="">精液有颗粒</a>|<a href="">精液块状物</a>|<a href="">精液有胶状固体</a>|<a href="">精液颜色异常</a>|<a href="">精子质量异常</a>|<a href="">精子畸形</a>|<a href="">精子不液化</a>|<a href="">精液太浓</a>|<a href="">精子有异味</a>|<a href="">精子发黄</a>|<a href="">精子的组成</a>|<a href="">精液稀少</a></a>|<a href="">精子活力低</a>|<a href="">少精</a></dd>
          </dl>
        </div>
        <div class="fromzzrzj">
          <dl class="clearfix">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/fzzj7.png" width="80" height="80" /></dt>
            <dd class="ddl fl">
              <p class="p1 fz16">李美龙 <span class="dgray">副主任医师 </span></p>
              <p class="p2 fz13 gray"><span class="black">擅长：</span>应用中西医结合的方法诊治前列腺炎、性功能障碍、不育症等疑难病症。</p>
            </dd>
            <dd class="ddr fr tc fz18"><a href="">点击咨询</a></dd>
          </dl>
        </div>
        <div class="fromzzrnr">
          <dl>
            <dt class="fz18"><img src="<?php print HTTP_ENTRY?>/static/images/fzz8.png" width="18" height="18" />男性射精异常症状</dt>
            <dd class="dgray"><a href="">射精延迟</a>|<a href="">射精无力</a>|<a href="">逆行射精</a>|<a href="">不射精</a>|<a href="">射精疼痛</a>|<a href="">射精出血</a>|<a href="">射精频繁</a>|<a href="">射精快</a>|<a href="">射精异常</a>|<a href="">龟头痛</a>|<a href="">射精出现酱油色的小果冻</a>|<a href="">射精过早</a>|<a href="">房事射精</a>|<a href="">射精没感觉</a>|<a href="">很快就射</a>|<a href="">插入即射</a>|<a href="">性腺功能低下</a>|<a href="">性腺功能亢进</a>|<a href="">射精疼痛</a>|<a href="">逆行射精</a>|<a href="">遗精</a>|<a href="">射精异常呈红色</a></dd>
          </dl>
        </div>
        <div class="fromzzrzj">
          <dl class="clearfix">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/fzzj8.png" width="80" height="80" /></dt>
            <dd class="ddl fl">
              <p class="p1 fz16">彭立 <span class="dgray">副主任医师</span></p>
              <p class="p2 fz13 gray"><span class="black">擅长：</span>在治疗慢性前列腺炎、尿道炎、性功能障碍、性传播疾病、不育症等方面积累了丰富的临床经验。</p>
            </dd>
            <dd class="ddr fr tc fz18"><a href="">点击咨询</a></dd>
          </dl>
        </div>
        <div class="fromzzrnr">
          <dl>
            <dt class="fz18"><img src="<?php print HTTP_ENTRY?>/static/images/fzz9.png" width="18" height="18" />男性勃起异常症状</dt>
            <dd class="dgray"><a href="">无法勃起</a>| <a href="">勃起不坚</a>|<a href="">勃起疼痛</a>|<a href="">勃起时间短</a>|<a href="">持续勃起</a>|<a href="">硬不起来</a>|<a href="">勃起障碍</a>|<a href="">勃起背曲或侧弯</a>|<a href="">性欲亢进</a>|<a href="">阴茎勃起困难</a>|<a href="">性欲亢进等</a>|<a href="">勃起困难</a>|<a href="">勃而不坚</a>|<a href="">勃起后维持时间短</a>|<a href="">勃起阴茎短小</a>|<a href="">勃起龟头小</a></dd>
          </dl>
        </div>
        <div class="fromzzrzj">
          <dl class="clearfix">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png" width="80" height="80" /></dt>
            <dd class="ddl fl">
              <p class="p1 fz16">陈希求 <span class="dgray">副主任医师</span></p>
              <p class="p2 fz13 gray"><span class="black">擅长：</span>泌尿外科微创手术，例如显微镜下精索静脉曲张术，输精管吻合术、阴茎延长增粗术等</p>
            </dd>
            <dd class="ddr fr tc fz18"><a href="">点击咨询</a></dd>
          </dl>
        </div>
        <div class="fromzzrnr">
          <dl>
            <dt class="fz18"><img src="<?php print HTTP_ENTRY?>/static/images/fzz10.png" width="18" height="18" />龟头异常症状</dt>
            <dd class="dgray"><a href="">尿频</a>|<a href="">尿急</a>|<a href="">尿不尽</a>|<a href="">小便有泡沫</a>|<a href="">小便刺痛</a>|<a href="">小便疼痛</a>|<a href="">小便带血</a>|<a href="">小便黄</a>|<a href="">小便有异味</a>|<a href="">排尿困难</a>|<a href="">血尿</a>|<a href="">小便滴白</a>|<a href="">尿无力</a>|<a href="">尿道口粘连</a>|<a href="">尿浑浊</a>|<a href="">尿黄</a>|<a href="">尿滴白</a>|<a href="">尿分叉</a>|<a href="">尿不尽</a>|<a href="">尿急</a>|<a href="">尿困难</a>|<a href="">尿等待</a>|<a href="">尿臭</a>|<a href="">小便痒</a>|<a href="">尿痛</a></a>|<a href="">尿频</a>|<a href="">尿分泌物流脓尿灼热</a>|<a href="">尿泡沫</a></dd>
          </dl>
        </div>
        <div class="fromzzrzj">
          <dl class="clearfix">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/fzzj10.png" width="80" height="80" /></dt>
            <dd class="ddl fl">
              <p class="p1 fz16">张河清 <span class="dgray">副主任医师</span></p>
              <p class="p2 fz13 gray"><span class="black">擅长：</span>对急、慢性前列腺炎导致的前列腺增生、肥大，生理性功能障碍，男性不育具有独到的见解。</p>
            </dd>
            <dd class="ddr fr tc fz18"><a href="">点击咨询</a></dd>
          </dl>
        </div>
      </div>
    </div>
    <!--right end--> 
  </div>
  