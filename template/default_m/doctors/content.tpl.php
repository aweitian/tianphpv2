<?php
//aid,kw,desc,thumb,title,content,date
$aid = intval($m->articleId);

$data = $m->row($aid);

$isArticle = true;

if(empty($data)){
	$httpResponse = new httpResponse();
	$httpResponse->_404();
	exit();
}
defTplData::getInstance()->title = $data["title"]."_上海九龙男子医院";
defTplData::getInstance()->keyword = $data["kw"];
defTplData::getInstance()->description = $data["desc"];
// 	["sid"]=> string(1) "7" 
// 	["id"]=> string(3) "cxq"
// 	["name"]=> string(9) "陈希球" 
// 	["lv"]=> string(7) "ccccccc" 
// 	["avatar"]=> string(7) "cxq.jpg" 
// 	["date"]=> string(10) "2016-05-16" 
// 	["dod"]=> string(1) "7" 
// 	["dlv"]=> string(1) "3" 
// 	["start"]=> string(1) "0" 
// 	["hot"]=> string(1) "0" 
// 	["love"]=> string(1) "0" 
// 	["contribution"]=> string(1) "0" 
// 	["desc"]=> string(3) "doc" 
// 	["spec"]=> string(4) "spce" }

?>
<div class="public_width">


<div class="head_tc blue_bg">
        <a class="goback"  title="返回上页" onclick="history.go(-1)"><span>返回</span></a>
        <div class="head_tit" ><?php print utility::utf8Substr($data["title"], 0, 8);?>...</div>
    <a href="javascript:;" class="oc_list_new"><span class="red_out"><img src="<?php print AppUrl::getMediaPath()?>/images/nav_dh.png" style="width:.6rem!important;height:auto!important;"/><i id="redpoint" class=""></i></span></a>
</div>
<?php include dirname(dirname(__FILE__))."/inc/header.doc.php"?>
<!--head end-->

<div class="hui_bg">
<div class="bg_fff">
<div class="zjtd  yswd_wap">
	<div class="mzy30 page_tit clr">
    	<p class="fl tc">
        	<a href="<?php print AppUrl::docHomeByDocid($m->data["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $m->data["avatar"]?>" class="zjtd_xg4" /></a>
        	<img src="<?php print AppUrl::getMediaPath()?>/images/page_img3.png" style="width:.62rem; height:.39rem;" />
        </p>
    	
        <dl class="fl">
        	<dt class="fz24 jbkp_zjzx clr"><b class="color3 fz28"><?php print $m->data["name"]?></b><span class="page_gx"><img  src="<?php print AppUrl::getMediaPath()?>/images/page_img1.png" />感谢信<font class="red"><?php print $m->getDataCntByDod($m->data["sid"])?></font>封</span></dt>
            <dd><?php print $m->data["lv"]?><span class="page_gx"><img  src="<?php print AppUrl::getMediaPath()?>/images/page_img2.png" />礼物<font class="red"><?php print $m->getPresentDataByDodCnt($m->data["sid"]);?></font>个</span></dd>
            <dd>擅长：<?php print utility::utf8Substr($m->data["spec"], 0, 15)?>...</dd>
            <div class="blank10"></div>
            <dd>
            	<a href="<?php print AppUrl::getSwtUrl()?>" onclick="openZoosUrl();return false;" class="fl page_zx1">在线咨询</a>
                <a href="tel:<?php print AppChannel::getTel()?>" class="fl page_zx2">电话咨询</a>
            </dd>
        </dl>
    </div>
    <div class="blank20"></div>
    
</div>
</div>
<div class="hd_hsx"></div>

<div class="mzy30">
	<div class="blank25"></div>
	<h5 class="fz28 color3"><?php print $data["title"]?></h5>
    <div class="blank30"></div>
    <div class="hd_xhsx"></div>
    <div class="blank30"></div>
    <div class="color9"><span class="fl">发表于 <?php print $data["date"]?></span><span class="fr">已阅读<?php print rand(1000,2000);?>次</span></div>
    <div class="blank30"></div>
    <div class="jbkp_page">
        
        <?php print AppFilter::RePlaceholder($data["content"])?>
        
        
     
        <div class="ksgh clearfix">
          <h4 class="blue tc">上海九龙男子医院免费咨询、快速挂号</h4>
          <p class="tc">请输入您的电话号码，提前与医生一对一交流</p>
          <div class="ksbd">
          
           	
  <form name="form1" accept-charset="gb2312" action="http://swt.gssmart.com/send/index.php" method="post">
  <input type="hidden" name="content" value="上海九龙男子医院提醒：男科疾病要提早治疗，具体诊疗请在医生指导下进行！咨询电话：<?php print AppChannel::getTel() ?>-退订回T【上海九龙男子医院】">
            <input name="tel" id="home_dx_co" type="text" class="bd" />
            <input type="submit" name="submit" class="btn" value="点击咨询" />
            
          </div>
        </div>
        <div class="jbkp_page_zx clr">
       	
        	<a class="fl kp_bn1">
        	<div class="heart" id="like2" rel="like" style="background-position: 0% 50%;"></div> <div class="likeCount" id="likeCount2"><?php print rand(300,600);?></div>
        	</a>
        	<a href="<?php print AppUrl::userAddAppraise();?>" class="fr kp_bn2">去评论</a>
        </div>
        <div class="blank30"></div>
    </div>
    <script>
	$(document).ready(function()
	{
    
	$('body').on("click",'.heart',function()
    {
    	
    	var A=$(this).attr("id");
    	var B=A.split("like");
        var messageID=B[1];
        var C=parseInt($("#likeCount"+messageID).html());
    	$(this).css("background-position","")
        var D=$(this).attr("rel");
       
        if(D === 'like') 
        {      
        $("#likeCount"+messageID).html(C+1);
        $(this).addClass("heartAnimation").attr("rel","unlike");
        
        }
        else
        {
        $("#likeCount"+messageID).html(C-1);
        $(this).removeClass("heartAnimation").attr("rel","like");
        $(this).css("background-position","left");
        }


    });


	});
	</script>
</div>

<?php $did=$m->getFirstDid($data["aid"]) ?>
<?php if ( $did !== 0 ) { ?>
<?php $dis=$m->getNameByDid($did) ?>
<div class="blank10"></div>
<div class="index_hotzx">
    <h2 class="title_name_lan"><?php print ($dis) ?><b class="fz28 color3">的相关文章</b><a href="<?php print AppUrl::disHomeByDid($did)?>" class="fr blue">+更多</a></h2>
</div>



  <div class="bg_fff">
	<div class="yswd_jb bg_fff">
   <div class="mzy30">
       <?php foreach ($m->getAll($did,5) as $wz):?>
    	
    	
        <p class="clr"><a href="<?php print AppUrl::articleByAid($wz["aid"]) ?>" class="color3"><?php print $m->utf8cut($wz["title"],0,16)?></a></p>
        <div class="hd_hsx"></div>
        <?php endforeach; ?>
    </div>
    </div>
    </div>


<div class="blank10"></div>
<div class="index_hotzx">
    <h2 class="title_name_lan"><?php print ($dis) ?><b class="fz28 color3">的相关疾病</b></h2>
</div>
<div class="bg_fff">
	<div class="yswd_jb bg_fff">
        <div class="mzy30">
           
            <?php foreach($m->getSiblingDids($did) as $xbz):?>   	
            <p class="clr"><a href="<?php print AppUrl::disHomeByDiseasekey($xbz["key"])?>" class="fl"><?php print $xbz["data"] ?></a><img src="<?php print AppUrl::getMediaPath()?>/images/memer_img1.png" class="fr" /></p>
            <div class="hd_hsx"></div>    
            <?php endforeach;?>
            
         </div>
    </div>
    <div class="hd_hsx"></div>
</div>
<?php } ?>


<div class="blank10"></div>

<?php include dirname(dirname(__FILE__))."/inc/bottom.tpl.php";?>
</div>
<?php include dirname(dirname(__FILE__))."/inc/bottom_fd_ys.tpl.php";?>

</div>



