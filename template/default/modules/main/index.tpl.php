<?php 
/**
 * @var mainModel;
 */
$this->title = "上海男科医院_上海泌尿外科医院_上海男性专科医院_上海九龙男子医院官网";
$this->keyword = "上海九龙男子医院,上海男科医院,上海泌尿外科医院，上海男性专科医院";
$this->description = "上海九龙男子医院专家列表，25位医生详细介绍和门诊时间、7153篇患者发表的看病经验、按疾病推荐专家、25位专家在线咨询，免费预约上海九龙男子医院专家门诊。";


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
	if(count($tree_dis[$item["pid"]]["children"]) < 6){
		$tree_dis[$item["pid"]]["children"][$item["mid"]] = array($item["md"],$item["url"]);
	}
}
 
// var_dump($tree_dis);exit;


?>

<div class="blank20"></div>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/banner.php"?>
  <div class="blank20"></div>
  <div class="sybox clearfix">
    <div class="fl wid680">
      <div class="fromjb border1">
         <div class="fromtit fz18 black">按疾病找医生<span class="fz12 gray">By disease doctor</span></div>
        <div class="fromjbbox  clearfix">
          <div class="fromjbboxnr">
          
          	<?php foreach($tree_dis as $dis):?>
          
          	<dl class="clearfix fl">
              <dt class="fl tc orange fz15"><span><?php print $dis["text"];?></span><br />
                </dt>
              <dd class="fr fz13">
              <?php foreach($dis["children"] as $sub_dis):?>
              <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disHomeByDiseasekey($sub_dis[1])?>"><?php print $sub_dis[0]?></a>
              <?php endforeach;?>
              
              </dd>
            </dl>
          	<?php endforeach;?>
            
          </div>
        </div>
      </div>
      
      <!--fromjb end-->
      <div class="blank20"></div>
      <div class="fromzxzj border1">
        <div class="fromtit fz18 black">咨询医生<span class="fz12 gray">Expert cvonsultants</span></div>
        <div class="fromzxzjbox">
          <div class="fromzxzjbox1 clearfix">
            <div class="fromzxzjbox1l fl"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;"><img src="<?php print AppUrl::getMediaPath()?>/images/syask.gif" width="449" height="60" /></a></div>
            <div class="fromzxzjbox1r fr" id="topzj">
              	<?php foreach($m->getDoctors(3) as $doc):?>
              <dl>
                <dt class="fl"><img src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print $doc["avatar"]?>" width="60" height="60" /></dt>
                <dd class="fl fz12">
                  <p><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="blue"><?php print $doc["name"]; ?></a> <?php print $doc["lv"]; ?> </p>
                  <p><?php print utility::utf8Substr($doc["spec"],0,6); ?></p>
                  <p class="gray">今天</p>
                </dd>
              </dl>
            	<?php endforeach;?>
            </div>
          </div>
          <div class="blank20"></div>
          <div class="fromzxzjbox2">
		  
		
		  
		  <?php
		  //echo "<pre>";
		//var_dump($m->getDoctors(5));
		  ?>
		   	<?php foreach($m->getDoctors(5) as $doc):?>
          
            <dl class="clearfix graybg">
              <dt class="fl"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print $doc["avatar"]?>" width="68" height="68" /></a></dt>
              <dd class="dd1 fl fz13">
                <p><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="blue" href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><?php print $doc["name"]; ?></a> <?php print $doc["lv"]; ?></p>
                <p>上海九龙男子医院</p>
                <p> <?php print utility::utf8Substr($doc["spec"],0,12); ?>...</p>
              </dd>
			  <?php $askdata = $m->getAskQuestionByDod($doc["sid"])?>
			  <?php
			   if(!empty($askdata)):
			  ?>
              <dd class="dd2 fl">
                <p><a href="<?php print AppUrl::askByAsdDocid($doc["dod"], $askdata["sid"])?>">
                
                <?php   print utility::utf8Substr($askdata["title"],0,10) ?>...
                </a></p>
                <p class="gray">最近通话<?php  print utility::utf8Substr($askdata["date"],0,10)?></p>
                <p class="blue"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::docAskHomeByDocid($doc["id"])?>">查看最新用户分享 >></a></p>
              </dd>           
			  <?php endif;?>
			  <dd class="dd3 fr orange tc fz16"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;">即刻预约</a></dd>
            </dl>
          	<?php endforeach;?>
     
          
		  
		  	
		  
          </div>
        </div>
      </div>
      <!--fromzxzj end-->
      <div class="blank20"></div>
      <div class="fromtit fz18 black border1">网络咨询<span class="fz12 gray">On-line consulting</span></div>
      <div class="blank20"></div>
      <div class="fromwlzxbox">
        <ul class="fromwlzxtit tab_jb_nav fz13 clearfix">
        <?php for($i=0,$D=$m->getLv0Ask(),$I=count($D);$i<$I;$i++):?>
        <li<?php if($i==0):?> class="selected"<?php elseif($i == $I-1):?> class="last"<?php endif?>><?php print $D[$i]["data"]?></li>
        <?php endfor;?>
        </ul>
        <div class="fromwlzxboxnr tab_jb_switch">
        	<?php for($i=0;$i<$I;$i++):?>
        	<?php $data = $m->getQuestionsByLv0Did($D[$i]["sid"])?>
             <div class="wlzxnr tabcon fz13<?php if($i==0):?> selected<?php endif;?>">
	             <?php foreach ($data as $aitem):?>
	             <dl>
	              <dt class="fl">
	              	<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::askByAsdDocid($aitem["dod"], $aitem["sid"])?>">
	              		<span class="fl">
	              			<?php print utility::utf8Substr($aitem["title"], 0, 30)?>
	              		</span>
	              	</a>
	              	<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::docHomeByDod($aitem["dod"])?>">
	              		<span class="fr"><?php print $m->getNameByDod($aitem["dod"])?></span>
	              	</a>
	              </dt>
	              <dd class="fr gray"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?>>回复</a></dd>
	            </dl>
	             <?php endforeach;?>
          	</div>     	
        	<?php endfor;?>
          </div>
      </div>
      
      <!--fromwlzx end-->
      <!--fromwlzx end-->
      <div class="blank20"></div>
      <div class="fromtit fz18 black border1 clearfix">感谢信<span class="fz12 gray">Thank you note</span><span class="fr fz13 gray">把感谢信送给九龙，把经验留给患友！</span></div>
      <div class="blank20"></div>
      <div class="fromjyfx clearfix">
        <div class="fromjyfxl fl">
          <div class="fromjyfxlt fz16">
            <p>文章评价</p>
          </div>
          <div class="fromjyfxlc">
          
          	<?php foreach($m->getAllComment(3) as $app):?>
          	<?php $articleRow = $m->getArticleRowByAid($app["aid"])?>
          	<?php $dod = $m->getFirstDocByAid($app["aid"])?>
          	<?php $doctorInfo = $m->getInfoByDod($dod)?>
          	<?php $userInfo = $m->getUserRowByUid($app["uid"])?>
          	<?php 
          	
          	//array(4) { ["aid"]=> string(3) "103" 
          	//["comment"]=> string(15) "添jj测试5号" 
          	//["datetime"]=> string(19) "2016-08-03 08:29:10" 
          	//["uid"]=> string(1) "6" } 
//           	var_dump($userInfo);
          	//array(10) { ["sid"]=> string(1) "6" ["email"]=> string(16) "372037462@qq.com" ["name"]=> string(18) "戴眼镜的男人" ["pwd"]=> string(61) "fbb121fb354819ede754e3ed292d19ece44e113cc3f3157c6b7e5c2e825c3" ["phone"]=> string(11) "13259678420" ["avatar"]=> string(13) "memer_tx9.jpg" ["rpq"]=> string(11) "my card id?" ["rpa"]=> string(12) "302404501200" ["wa"]=> string(1) "y" ["date"]=> string(10) "2016-08-16" } 
          	//array(15) { ["sid"]=> string(1) "1" ["id"]=> string(3) "lml" ["name"]=> string(9) "李美龙" ["lv"]=> string(12) "主治医师" ["avatar"]=> string(7) "lml.jpg" ["date"]=> string(10) "2016-05-16" ["dod"]=> string(1) "1" ["dlv"]=> string(1) "8" ["star"]=> string(1) "3" ["hot"]=> string(1) "5" ["love"]=> string(2) "21" ["contribution"]=> string(2) "32" ["desc"]=> string(63) "让病人的健康质量更好更高，是我的从医目标。" ["spec"]=> string(87) "治疗前列腺炎，性功能障碍（阳痿、早泄），男性不育等疑难杂症" ["duty"]=> string(21) "100001110000110000000" } 
          	?>
            <dl class="fz13">
              <dt><span class="gray"></span> <span class="black"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($app["aid"])?>"><?php print utility::utf8Substr($articleRow["title"],0,20) ?></a></span></dt>
                <dd><?php print utility::utf8Substr($app["comment"],0,30);?>...
                <p class="clr"><font class="fl"><span class="gray">发布医生： </span><span class="blue"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::docHomeByDocid($doctorInfo["id"])?>"><?php print $doctorInfo["name"]?></a></span></font>
                <font class="fr"><span class="gray">评论：</span><span class="gray"><?php print $userInfo["name"]?></span></font></p></dd>
            </dl>
			<?php endforeach;?>
            <div class="fromjyfxlb fromjyfxbsm fz12"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="blue" href="<?php print AppUrl::userWriteAppraise()?>">写文章评论</a></div>
          </div>
        </div>
        <div class="fromjyfxr fr">
          <div class="fromjyfxrt fz16">
            <p><strong class="orange"><?php print $m->getLetterCnt()?></strong> 封感谢信</p>
          </div>
          <div class="fromjyfxrc">
          	<?php foreach ($m->getLetter(3) as $let):?>
            <dl class="fz13">
              <dt><span class="orange">感谢<?php print $m->getNameByDod($let["dod"])?>医生</span></dt>
              <dd><?php print $m->utf8cut($let["content"],0,54)?>...<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="black" href="<?php print AppUrl::docLetterByDodLed($let["dod"], $let["sid"])?>">看详情>></a></dd>
            </dl>
			<?php endforeach;?>
            <div class="fromjyfxrb fromjyfxbsm fz12"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="orange" href="<?php print AppUrl::userWriteLetter()?>">写感谢信给医生</a></div>
          </div>
        </div>
      </div>
    </div>
    
    <!--syboxl end-->
    <div class="fr wid300 fz13">
      <div class="syrbox1 clearfix">
        <dl class="dll dl1">
          <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::process() ?>" onClick="openZoosUrl();return false;">
          <dt></dt>
          <dd>门诊流程</dd>
          </a>
        </dl>
        <dl class="dl2">
          <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::notice() ?>">
          <dt></dt>
          <dd>住院须知</dd>
          </a>
        </dl>
        <dl class="dl3">
          <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::navDoctors() ?>" >
          <dt></dt>
          <dd>医护团队</dd>
          </a>
        </dl>
        <dl class="dll dl4">
          <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::navSubscribe()?>">
          <dt></dt>
          <dd>预约挂号</dd>
          </a>
        </dl>
        <dl class="dl5">
          <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::statement() ?>" onClick="openZoosUrl();return false;">
          <dt></dt>
          <dd>隐私声明</dd>
          </a>
        </dl>
        <dl class="dl6">
          <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;">
          <dt></dt>
          <dd>立即咨询</dd>
          </a>
        </dl>
        <dl class="dll dl7">
          <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::navAsk()?>" onClick="openZoosUrl();return false;">
          <dt></dt>
          <dd>疾病问答</dd>
          </a>
        </dl>
        <dl class="dl8">
          <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::toll() ?>" onClick="openZoosUrl();return false;">
          <dt></dt>
          <dd>价格与收费</dd>
          </a>
        </dl>
        <dl class="dl9">
          <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::environment() ?>" onClick="openZoosUrl();return false;">
          <dt></dt>
          <dd class="">就诊环境</dd>
          </a>
        </dl>
      </div>
      <div class="blank20"></div>
    <?php include dirname(dirname(dirname(__FILE__)))."/inc/piclink.tpl.php"?>
      <div class="blank20"></div>
      <div class="syrbox3 border2">
        <div class="syrboxtit fz18 graybg">热门文章</div>
        <div class="syrbox3nr fz13">
          <ul>
          	<?php /*aid,kw,desc,thumb,title,date*/?>
          	<?php foreach($m->getNewest(10) as $aitem):?>
          	<li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print utility::utf8Substr($aitem["title"], 0, 18) ?> </a></li>
          	
          	<?php endforeach;?>
  
          </ul>
        </div>
      </div>
      <div class="blank20"></div>
      <div><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;"><img src="<?php print AppUrl::getMediaPath()?>/images/syrth4.jpg" width="300" height="90" /></a></div>
      <div class="blank20"></div>
      <div><img src="<?php print AppUrl::getMediaPath()?>/images/syrth5.jpg" /></div>
      <div><a class="dh_a"><img src="<?php print AppUrl::getMediaPath()?>/images/syrth6.jpg" /></a></div>
      <?php include dirname(dirname(dirname(__FILE__)))."/inc/dhwz.tpl.php";?>
      <div class="blank20"></div>
      <?php include dirname(dirname(dirname(__FILE__)))."/inc/guahao.tpl.php"?>

      <div class="blank20"></div>
      <div class="syrbox5 border2">
        <div class="syrboxtit fz18 graybg">大家都在送什么?</div>
        <div class="syrbox5nr">
          <div class="syrbox5nr_1" id="toplw">
            <?php foreach ($m->getData(6) as $lw):?>
            <?php $pre=$m->rowpid($lw["pid"]);?>      
            <?php $user=$m->getNameByUid($lw["uid"]);?>
            <?php $doc=($m->getInfoByDod($lw["dod"]))?> 
            <dl class="clearfix" >
              <dt class="fl"><img src="<?php print AppUrl::getMediaPath()?>/present/<?php print $pre["avatar"]?>" width="61" height="57" /></dt>
              <dd class="fl">
                <p class="ddp1"><strong><a href="<?php print AppUrl::docHomeByDod($lw["dod"])?>"><?php print $doc["name"];?></a></strong>医生收到了<strong>
                
                <?php print preg_replace("/^(\d{3})-?\d{4}(\d{4})$/","$1****$2",$user); ?>
                
                </strong>精心挑选的礼物<strong><?php print $pre["data"]?></strong>医生爱心值+<?php print $pre["cost"]?></p>
                <p class="ddp2 fr blue"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::docPresentHomeByDocid($doc["id"]); ?>">我也要送</a></p>
              </dd>
            </dl>
            <?php endforeach;?>
          </div>
          <!-- 
          <div class="blank10"></div>
          <div class="fz13">共有<em class="orange">7,572</em>位患者送出<em class="orange">95,756</em>件礼物，下一个是你么? 我也要送</div>
          
          <div class="blank10"></div>
          <div class="syrbox5nr_3 clearfix"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="" class="fl blue">什么是“心意礼物”？</a><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="fr" href=""><img src="<?php print AppUrl::getMediaPath()?>/images/syrth11.jpg" width="80" height="26" /></a></div>
         -->
        
        </div>
      </div>
    </div>
    <!--syboxr end--> 
  </div>
  <div class="blank20"></div>
  <!--sybox end-->
  
  <div class="jgdwbox">
    <div class="jgdwboxtit fz18 gray clearfix">
      <ul>
        <li class="selected">监管单位</li>
        <li>友情链接</li>
      </ul>
    </div>
    <div class="jgdwboxnr">
      <div class="tabconjg selected"><img src="<?php print AppUrl::getMediaPath()?>/images/jgdw1.jpg" width="970" height="85" /></div>
      <div class="tabconjg">上海九龙男子医院</div>
    </div>
  </div>
  
  <div style="clear:both"></div>