<?php 
/**
 * @var mainModel;
 */
$m = $model;

$this->title = "上海男科医院_上海泌尿外科医院_上海男性专科医院_上海九龙男子医院官网";
$this->keyword = "上海九龙男子医院,上海男科医院,上海泌尿外科医院，上海男性专科医院";
$this->description = "上海九龙男子医院专家列表，25位医生详细介绍和门诊时间、7153篇患者发表的看病经验、按疾病推荐专家、25位专家在线咨询，免费预约上海九龙男子医院专家门诊。";

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
 



?>
<div class="public_width">
  <div class="head_top clr"> 
  <div class="blank20"></div>
  <a href="/" class="c_logo"></a> 
    <a href="<?php print AppUrl::userProfile();?>" class="fr"> <img src="<?php print AppUrl::getMediaPath()?>/images/user_not_login.png"  style="width:.45rem; height:.44rem;"> </a> </div>
  <!--head end-->
<?php include dirname(dirname(dirname(__FILE__)))."/inc/slider.php"?>
  <!--banner end-->
  <!--搜索 end-->
  <div class="blank30"></div>
  <div class="index_sel mzy30">
  	
  	<!--<?php include dirname(dirname(dirname(__FILE__)))."/search.form.php"?>-->
    
    <div class="blank20"></div>
    <div class="title_tips"> <span class="line"></span>
      <h2>找医生</h2>
    </div>
    <div class="blank20"></div>
    <div class="sel_sm2 clearfix">
      <div class="btnleft"><a href="<?php print AppUrl::navSymptom()?>" class="left_a fl">按症状找医生</a></div>
      <div class="btnright"><a href="<?php print AppUrl::navDisease()?>" class="right_a fr">按疾病找医生</a></div>
    </div>
  </div>
  <div class="blank30"></div>
  <!-- end-->
  <div class="index_zxyy clearfix">
    <div class="left_list"> 
    <a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="ask_online"> 
    <span class="left_sm1">在线咨询<br/><font class="gray">一键咨询、免费答疑</font> </span> 
    </a> 
    </div>
      <div class="right_list"> 
          <a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;" class="order_menzhen"> 
              <span class="menzhen_ab"> 预约就诊<br/><span class="gray">省时、省心、省力、省钱</span> </span>
         </a> 
         <a href="tel:<?php print AppChannel::getTel()?>" class="order_pinzhi"> 
              <span class="dianhua_ab"> 电话咨询<br/><span class="gray">足不出户联系医生</span></span> 
          </a> 
    </div>
  </div>
  <!--找医院查疾病问医生-->
  <div class="finddoctor_list">
    <ul class="list_nav">
      <li class="curli">按症状</li>
      <li>查疾病</li>
      <li>问医生</li>
    </ul>
    <div class="blank30"></div>
    <ul class="nav_content clr">
    
      <li style="display: block;" id="cnzz_yyqy">
        <div class="province_list">
          <ul>
            <?php $x=1;?>
            <?php foreach($m->getLv0Data() as $sym):?> 	
            <li><span class="name <?php if($x==1){?>cur_name<?php }?>"><?php print utility::utf8Substr($sym["data"], 0, 4) ?></span></li>
            <?php $x++;?>
            <?php endforeach;?>
          </ul>
        </div>
        <div class="hospital_list" style="display: block;">
          <?php $z=1;?>
          <?php foreach($m->getLv0Data() as $sym):?> 	
          <div class="list_num" <?php if($z==1){?>style="display:block;"<?php } else{?>style="display:none;"<?php }?>>         
            <ul class="left_hos clr">
              <?php foreach ($m->alllv1BySyd($sym["syd"]) as $xzz):?>
              <li><a href="<?php print AppUrl::articleBySyd($xzz['syd'])?>"><?php print ($xzz['data']) ?></a><span>|</span></li>
              <?php endforeach;?>
            </ul>           
          </div>
          <?php $z++;?>
          <?php endforeach;?>
                   
        </div>
        
        <div class="clr pr30"><a href="<?php print AppUrl::navSymptom()?>" class="fr color9">更多症状 ></a></div>
        
      </li>
      
      <li style="display: none;" id="cnzz_jbqy">
        <div class="province_list">
          <ul class="index_li2">
            <?php $x=1;?>
            <?php foreach($tree_dis as $dis):?>         
            <li><span class="name2 longname <?php if($x==1){?>cur_name<?php }?>"><?php print str_replace("疾病","",$dis["text"])?></span></li>
            <?php $x++;?>
            <?php endforeach;?>

          </ul>
        </div>
        <div class="hospital_list" style="display: block;">
          <?php $y=1;?>
          <?php foreach($tree_dis as $dis):?>          
          <div class="list_num2" <?php if($y==1){?>style="display:block;"<?php } else{?>style="display:none;"<?php }?>>
            <ul class="left_hos">
              <?php foreach($dis["children"] as $sub_dis):?>
              <li><a href="<?php print AppUrl::disHomeByDiseasekey($sub_dis[1])?>"><?php print $sub_dis[0]?></a></li>
              <?php endforeach;?>   
            </ul>            
          </div>
          <?php $y++;?>
          <?php endforeach;?>                          
        </div>
      </li>
      
      <li style="display: none;" id="cnzz_ysqy">
        
        <div class="bing_dor_list" style="display: block;">
          <div class="list_num" style="display:block ;">
            <ul class="left_hos">
              <?php $xy = 0; ?>
              <?php foreach($m->getDoctors(6) as $doc):?>
              <?php $xy++; ?>
              <li class="clearfix">
                <div class="left_head">
                  <div class="head_outer"><a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" /></a></div>
                </div>
                <div class="right_name">
                  <p class="name"><a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><?php print $doc["name"]; ?></a></p>
                  <p class="title"><?php print $doc["lv"]; ?></p>
                </div>
                <div class="btn"><a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;"><img src="<?php print AppUrl::getMediaPath()?>/images/index_img3.png" /></a></div>
              </li>
            <?php if ($xy % 3 == 0) { ?>              
            </ul>
            <ul class="right_hos">
            <?php } ?>
            <?php endforeach;?>             
            </ul>
            
            <div class="index_zj">
            	<a href="<?php print AppUrl::navDoctors()?>">查看全部医生 >></a>
            </div>                      
          </div>       
        </div>
      </li>
    </ul>
  </div>
  <!---->
  <div class="blank30"></div>
  <div class="hd"></div>
  <div class="index_hotzx">
    <h2 class="title_name">热点问答<a href="<?php print AppUrl::navAsk()?>" class="fr">+更多</a></h2>
    <ul class="hotzx_box1"> 
        <?php $all=$m->getAllQuestions(0,5);?>
        <?php foreach ($all["data"] as $allitem):?>
        <li><a href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>"><?php print AppFilter::filterOut(utility::utf8Substr($allitem["title"], 0, 12)); ?><span> <?php print utility::utf8Substr($allitem["date"], 0, 10)?></span></a></li>
        <?php endforeach;?>
    </ul>
  </div>
  <div class="blank30"></div>
  <!--热门咨询-->
  
  
  <div class="hd"></div>
  <div class="index_hotzx">
    <h2 class="title_name_lan">疾病科普<a href="<?php print AppUrl::navDisease()?>" class="fr">+更多</a></h2>
    <div class="blank30"></div>
    <div class="index_kp clr">
        <?php foreach($tree_dis as $dis):?>
        <?php foreach($dis["children"] as $sub_dis):?>
    	<a href="<?php print AppUrl::disHomeByDiseasekey($sub_dis[1])?>"><?php print $sub_dis[0]?></a>
        <?php endforeach;?>
        <?php endforeach;?>
    </div>
  </div>
<div class="blank30"></div>
  <!--疾病科普-->
  <div class="hd"></div>
  <div class="index_hotzx">
    <h2 class="title_name_lan">热点文章<a href="<?php print AppUrl::navArticle()?>" class="fr">+更多</a></h2>
    <ul class="hotzx_box2"> 
        <?php foreach($m->getNewest(5) as $aitem):?>
        <li><a href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print utility::utf8Substr($aitem["title"], 0, 15) ?>... <span>热度:<?php echo rand(1000,2000);?></span></a></li>
        <?php endforeach;?>
    </ul>
  </div>
    <div class="blank30"></div>
  <!--底部样式-->
  <?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom.tpl.php";?>
  <?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom_fd_sub.tpl.php";?>
</div>

