<?php
/**
 * @Author: awei.tian
 * @Date: 2016年8月15日
 * @Desc: 
 * 依赖:
 */
$m = $model;

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
$docs=$m->getDoctors(18);
$lenght=count($docs);
?>
<div class="public_width">
<?php $disease_header_title = "上海九龙男子医院"?>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/header.tc.php"?>

<!--head end-->
<div class=" hui_bg">
	<div class="blank30"></div>
    <div class="mzy30 bg_fff">
    	<div class="yyjs">
        
        	<dl class="clr">
            	<dt class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/hpyy_img2.jpg" /></dt>
                <dd class="fr">
                	<h5 class="blue fz30">上海九龙男子医院</h5>
                    <div class="blank15"></div>
                    <p class="color3 fz26"><span class="yellow">6</span>个科室    <span class="yellow"><?php print $lenght;?></span>位医生</p>
                </dd>
            </dl>
            <div class="blank30"></div>
            <div class="hd_xhsx"></div>
            <div class="blank30"></div>
            
            <div class="yyjs_con">
            	<p><span class="color9">地址：</span>上海市长宁区中山西路333号（近中山公园）<a href="<?php print AppUrl::helpRouting()?>" class="fr blue">查看路线</a></p>
                <p><span class="color9">电话：</span><a href="tel:021-52733999">021-52733999</a></p>
                <p><span class="color9">简介：</span>上海九龙男子医院坐落于上海市长宁区中山西路333号（近中山公园，靠近地铁3号线）。是一家诊疗、... <a href="<?php print AppUrl::navHospital()?>" class="fr blue">更多</a></p>
                <div class="blank30"></div>
                <p class="tc yyjs_con_p1">在线服务患者<span class="yellow"><?php print rand(300000,400000);?></span>名, 获得<span class="yellow"><?php print $m->getLetterCnt()?></span>封感谢信 </p>
            </div>
            
        </div>
        <div class="js_bt"></div>
    </div>
	
<div class="blank30"></div>
<div class="index_hotzx">
    <div class="title_name_lan"><img src="<?php print AppUrl::getMediaPath()?>/images/ysym_img2.png" class="fl ys_tb" /><b class="color3">科室划分</b></div>
</div>

<div class="finddoctor_list clr">
	<div class="blank30"></div>
  <ul class="nav_content clr">
    
      <li style="display: block;" id="cnzz_yyqy">
      
        <div class="province_list">
          <ul>
            <?php $x=1;?>
            <?php foreach($tree_dis as $dis):?>         
            <li><span class="name2 <?php if($x==1){?>cur_name<?php }?>"><?php print str_replace("疾病","",$dis["text"])?></span></li>
            <?php $x++;?>
            <?php endforeach;?>
          </ul>
        </div>
        <div class="hospital_list" style="display: block;">
          <?php $y=1;?>
          <?php foreach($tree_dis as $dis):?>
          <div class="list_num" <?php if($y==1){?>style="display:block;"<?php } else{?>style="display:none;"<?php }?>>
          
            <ul class="left_hos clr">
              <?php foreach($dis["children"] as $sub_dis):?>
              <li><a href="<?php print AppUrl::disHomeByDiseasekey($sub_dis[1])?>"><?php print $sub_dis[0]?></a><span>|</span></li>
              <?php endforeach;?>
            </ul>
            
          </div>
          <?php $y++;?>
          <?php endforeach;?> 
          
         
          
        </div>
        
      </li>
      
    </ul>
    <div class="blank10"></div>
 </div>   
 
<div class="hd_hsx"></div>
<div class="blank10"></div>
  
  <div class="index_hotzx">
    <div class="title_name">
        <img src="<?php print AppUrl::getMediaPath()?>/images/ysym_img6.png" class="fl ys_tb" /><b>患者推荐 <span class="color3 fz24 fw400">    (根据患者投票推荐)</span></b>
    </div>
</div>

<div class="bg_fff ">
<div class="yyjs_box1 mzy30">
	<?php $i=0;?>
	<?php foreach($tree_dis as $dis):?>     
	<div>
    	<p class="blank30"></p>
    	<p class="yellow fz28"><?php print $dis["text"]?></p>
        <p class="blank10"></p>     
        <p class="fz26">
        
        <a href="<?php print AppUrl::docHomeByDocid($docs[($i*3+0)%$lenght]["id"])?>"><?php print $docs[($i*3+0)%$lenght]["name"]; ?>(<?php print $docs[($i*3+0)%$lenght]["contribution"]; ?>票)</a>
        <a href="<?php print AppUrl::docHomeByDocid($docs[($i*3+1)%$lenght]["id"])?>"><?php print $docs[($i*3+1)%$lenght]["name"]; ?>(<?php print $docs[($i*3+1)%$lenght]["contribution"]; ?>票)</a>
        <a href="<?php print AppUrl::docHomeByDocid($docs[($i*3+2)%$lenght]["id"])?>"><?php print $docs[($i*3+2)%$lenght]["name"]; ?>(<?php print $docs[($i*3+2)%$lenght]["contribution"]; ?>票)</a>
        </p>       
        <p class="blank30"></p>
    </div>
    
    <div class="hd_hsx"></div>
    <?php $i++;?>
    <?php endforeach;?> 
    
    
    
</div>
</div>


<!-- 

<div class="hd_hsx"></div>
<div class="blank10"></div>
<div class="index_hotzx">
<div class="title_name">
    <img src="<?php print AppUrl::getMediaPath()?>/images/ysym_img4.png" class="fl ys_tb" /><b>诊后服务星<span class="color3 fz24 fw400">    (根据医生经验推荐)</span></b>
</div>
</div>

<div class="bg_fff">
<div class="yyjs_box2 mzy30">
	
	
	<div>
    	<p class="blank30"></p>
        <p class="fz26">
        	<span class="fl fz28">前列腺疾病</span>
            <b class="fr fw400"><a href="">陈希球</a><a href="">张俊峰</a><a href="">韩用涛</a></b>
        </p>
        <p class="blank30"></p>
    </div>
    
    <div class="hd_hsx"></div>
    
    <div>
    	<p class="blank30"></p>
        <p class="fz26">
        	<span class="fl fz28">前列腺疾病</span>
            <b class="fr fw400"><a href="">陈希球</a><a href="">张俊峰</a><a href="">韩用涛</a></b>
        </p>
        <p class="blank30"></p>
    </div>
    
    <div class="hd_hsx"></div>
    
    <div>
    	<p class="blank30"></p>
        <p class="fz26">
        	<span class="fl fz28">前列腺疾病</span>
            <b class="fr fw400"><a href="">陈希球</a><a href="">张俊峰</a><a href="">韩用涛</a></b>
        </p>
        <p class="blank30"></p>
    </div>
    
    <div class="hd_hsx"></div>
    
    <div>
    	<p class="blank30"></p>
        <p class="fz26">
        	<span class="fl fz28">前列腺疾病</span>
            <b class="fr fw400"><a href="">陈希球</a><a href="">张俊峰</a><a href="">韩用涛</a></b>
        </p>
        <p class="blank30"></p>
    </div>
    
    <div class="hd_hsx"></div>
    
    <div>
    	<p class="blank30"></p>
        <p class="fz26">
        	<span class="fl fz28">前列腺疾病</span>
            <b class="fr fw400"><a href="">陈希球</a><a href="">张俊峰</a><a href="">韩用涛</a></b>
        </p>
        <p class="blank30"></p>
    </div>
    
    <div class="hd_hsx"></div>
    
    <div>
    	<p class="blank30"></p>
        <p class="fz26">
        	<span class="fl fz28">前列腺疾病</span>
            <b class="fr fw400"><a href="">陈希球</a><a href="">张俊峰</a><a href="">韩用涛</a></b>
        </p>
        <p class="blank30"></p>
    </div>

</div>
</div>
 -->
<div class="hd_hsx"></div>
<div class="blank10"></div>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom.tpl.php";?>

</div>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom_fd_sub.tpl.php";?>
</div>
