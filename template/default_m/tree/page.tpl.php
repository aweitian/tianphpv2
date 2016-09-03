<?php
/**
 * @Author: awei.tian
 * @Date: 2016年9月1日
 * @Desc: 
 * 依赖:
 */
$conten=($model->getContent($model->aid,0));
$row=($model->getRow());


//($model->aid); 文章id
?>

<div class="public_width">



<div class="head_tc blue_bg">
        <a class="goback"  title="返回上页" onclick="history.go(-1)"><span>返回</span></a>
        <div class="head_tit" ><?php print($row["name"]) ?>文章</div>
    <a href="javascript:;" class="oc_list_new"><span class="red_out"><img src="<?php print AppUrl::getMediaPath()?>/images/nav_dh.png" style="width:.6rem!important;height:auto!important;"/><i id="redpoint" class=""></i></span></a>
</div>

<?php include dirname((dirname(__FILE__)))."/inc/header.doc.php";?>
<div class="hui_bg">


<div class="hd_hsx"></div>

<div class="mzy30">
	<div class="blank25"></div>
	<h5 class="fz28 color3"><?php print($conten["title"]) ?></h5>
    <div class="blank30"></div>
    <div class="hd_xhsx"></div>
    <div class="blank30"></div>
    <div class="color9"><span class="fl">发表于上海九龙男子医院</span><span class="fr">已阅读<?php print rand(300,600);?>次</span></div>
    <div class="blank30"></div>
    <div class="jbkp_page">
          <?php print($conten["content"]) ?>		  
 </div>  	          
        
     
        <div class="ksgh clearfix">
          <h4 class="blue tc">上海九龙男子医院免费咨询、快速挂号</h4>
        <p class="tc">请输入您的电话号码，提前与医生一对一交流</p>
          <div class="ksbd">

  <form name="form1" accept-charset="gb2312" action="http://swt.gssmart.com/send/index.php" method="post">
  <input type="hidden" name="content" value="上海九龙男子医院提醒：男科疾病要提早治疗，具体诊疗请在医生指导下进行！咨询电话：-退订回T【上海九龙男子医院】">
            <input name="tel" id="home_dx_co" placeholder="请输入手机号码" type="text" class="bd" />
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

<div class="blank10"></div>
<div class="index_hotzx">
    <h2 class="title_name_lan"><?php print($row["name"]); ?><b class="fz28 color3">的相关文章</b><a href="<?php print AppUrl::articleByChannel($row["url"])?>" class="fr blue">+更多</a></h2>
</div>



  <div class="bg_fff">
	<div class="yswd_jb bg_fff">
   <div class="mzy30">
           	
    	
    	 <?php foreach($model->getAidArrByTrd(($row["sid"]),8,0) as $aitem):?>
             
                 <?php $list= $model->rowNoContent($aitem)?> 
                 <?php if(!empty($list)):?>       
        <p class="clr"><a <?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($list["sid"])?>" class="color3"><?php print utility::utf8Substr($list["title"], 0, 22) ; ?></a> </a></p>
        <div class="hd_hsx"></div>
             	<?php endif;?>
                    <?php endforeach;?> 
    	     	
    	
    	
    	
            </div>
    </div>
    </div>


<div class="blank10"></div>


<div class="blank10"></div>

<?php include dirname((dirname(__FILE__)))."/inc/bottom.tpl.php";?>
</div>
<?php include dirname((dirname(__FILE__)))."/inc/bottom_fd_sub.tpl.php";?>
</div>
<!-- bottom -->