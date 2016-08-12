<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月12日
 * @Desc: 
 */
$row = $model->data;


$ext = diseaseExtInfoes::getExtData();





$pageSize = 8;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($model->knowledgeCnt($row["sid"],$model->subid), $page, $pageSize, 6);



$req = new httpRequest();
$url = new url($req->requestUri());

$ctr = appCtrl::$msg->getAction();
?>
 
<div class="public_width">
<?php $disease_header_title = $row["data"];?>
<?php include dirname(dirname(__FILE__))."/inc/header.disease.php"?>

<!--head end-->
<div class="hui_bg">
	<div class="blank30"></div>
    <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
     <div class="blank20"></div>
</div>
<div class="public_width">
<div class="hd_hsx"></div>
    
    <div class="jbzs_con">
        
        <div class="jb_sstab clearfix dgray fz13 color6">
            <ul class="fl">
              <li <?php if($model->subid =="0"):?> class="selected" <?php endif?>><a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],0) ?>">全部文章</a></li>
              <li <?php if($model->subid =="1"):?> class="selected"<?php endif?>><a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],1) ?>">病因</a></li>
              <li class="last <?php if($model->subid =="2"):?>selected<?php endif?>"><a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],2) ?>">症状</a></li>
            </ul>
           <div class ="rel fr">
          	<span class="left_down"><img src="<?php print AppUrl::getMediaPath()?>/images/down.png" id="img1" ></span> 
         </div>
         <div class="bg_col"></div>
        </div>
        
        <div id="de_show" class="de_show" >
          <p>选择标签</p>
          <ul class="de_line clearfix">
            <li> 
                <a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],0) ?>" class="de_cur">全部文章</a>                
                <a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],1) ?>" class ="cnzz_article_lable">病因</a> 
                <a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],2) ?>" class ="cnzz_article_lable">症状</a> 
            </li>
            <li>                 
                <a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],3) ?>" class ="cnzz_article_lable">检查</a> 
                <a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],4) ?>" class ="cnzz_article_lable">治疗</a> 
                <a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],5) ?>" class ="cnzz_article_lable">危害</a> 
            </li>
            <li> 
                <a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],6) ?>" class ="cnzz_article_lable">保健</a> 
            </li>
          </ul>
        </div>
      
      	<div class="jb_ssall">
        
            <div class="jb_ssbox selected">
                
                <div class="clr jb_ssbox_sm1">
                    <?php if( $model->subid =="0"): ?>
                    <div>
                        <?php foreach ($model->getEssenceAidByDid($row["sid"],1) as $jh):?>
                        <span class="fz16 color3"><a href="<?php print AppUrl::articleByAid($jh["sid"]) ?>"><?php print utility::utf8Substr($jh["title"], 0, 20) ?></a></span>
                        <p class="fz13 color6"><?php print utility::utf8Substr( $jh["desc"], 0, 40)?>...<a href="<?php print AppUrl::articleByAid($jh["sid"]) ?>" class="bule fr">详情 ></a></p>
                        <?php endforeach; ?>
                    </div>                    
                    <?php endif; ?>
                    <div class="blank20"></div>
                </div>
                <?php foreach ($model->knowledge($row["sid"],$model->subid,0,($page-1)*$pageSize,$pageSize, 6) as $list): ?>
                <?php $tag=$model->getTag($list["tid"]) ?>                           
                <?php $dod= $model->getOwner($list["aid"])?>     
	            <?php  $doc=($model->getInfoByDod($dod))?> 
                <?php $nuber=$model->getCountByAid($list["aid"]) ?>     
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><a  href="<?php print AppUrl::articleByAid($list["aid"]) ?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" /></a></dt>
                             <dd class="color6"><a  href="<?php print AppUrl::articleByAid($list["aid"]) ?>"><?php print $doc["name"] ?> </a></dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="<?php print AppUrl::articleByAid($list["aid"]) ?>" class="color3"><?php print utility::utf8Substr( $list["title"], 0, 14)?></a></h5>
                            <p class="color6 fz22"><?php print utility::utf8Substr( $list["desc"], 0, 50)?>...</p>
                            <p class="tr"><span class="yellow"><?php echo rand(1000,1300);?></span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
               <?php endforeach; ?> 
              
                <div class="hd_hsx"></div>
                <div class="blank30 hui_bg"></div>
                <div class="blank30"></div>
                                  <div class="pagenum tc gray fz13">
                              
                        <?php if ($pagination->hasPre()):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?> </div>
                                  <div class="blank15"></div>

            </div>
            

            
          </div>
        
        
    </div>
    
    
</div>
</div>








<script type="text/javascript">
                
	console=window.console || {dir:new Function(),log:new Function()};
	var active=0,
		as=document.getElementById('de_show').getElementsByTagName('a');
		
	for(var i=0;i<as.length/3;i++){
		(function(){
			var j=i;
			as[i].onclick=function(){
				t4.slide(j);
				
				return false;
			}
		})();
	}
	var t4=new TouchSlider('slider4',{speed:1000, autoplay:false, direction:0, interval:6000, fullsize:true,});
	$(".bg_col").hide();
	$(".de_show").hide();
	$("document").ready(function() {
			 $(".bd li").click(function(){
					$(this).addClass("on_selected");
					$(this).siblings("li").removeClass("on_selected");
                    $(this).parent("ul").siblings("ul").children("li").removeClass("on_selected");
                    $("#de_show ul").children("li:eq("+$(this).parent().index()+")").children("a:eq("+$(this).index()+")").addClass("de_cur");
                    $("#de_show ul").children("li:eq("+$(this).parent().index()+")").children("a:eq("+$(this).index()+")").siblings("a").removeClass("de_cur");
                    $("#de_show ul").children("li:eq("+$(this).parent().index()+")").siblings("li").children("a").removeClass("de_cur");
			})
			$(".left_down").click(function(){
					if($(this).children("#img1").hasClass("cur1")){
						$(this).children("#img1").removeClass("cur1");
						$(".bg_col").hide();
						$(".slideBox").show();
						$(".de_show").hide();
						$(this).children("#img1").attr("src","<?php print AppUrl::getMediaPath()?>/images/down.png");
					}else{
						$(this).children("#img1").addClass("cur1");
						$(".bg_col").show();
						$(".slideBox").hide();
						$(".de_show").show();
						$(this).children("#img1").attr("src","http://i1.hdfimg.com/touch/<?php print AppUrl::getMediaPath()?>/images/up.png");
					}
			  })
            $('#de_show a').click(function(){
					$(".bd ul:eq("+$(this).parent().index()+")").children("li:eq("+$(this).index()+")").click();
					$(".bg_col").hide();
					$(".de_show").hide();
					$(".slideBox").show();
					$(this).addClass("de_cur").siblings("a").removeClass("de_cur");
					$(this).parent("li").siblings("li").children("a").removeClass("de_cur");
					$(".left_down").children("#img1").removeClass("cur1");
					$(".left_down").children("#img1").attr("src","<?php print AppUrl::getMediaPath()?>/images/down.png");
				 })
		   $(".bg_col").click(function(){
			   		$(".bg_col").hide();
					$(".de_show").hide();
					$(".slideBox").show();
					$(".left_down").children("#img1").removeClass("cur1");
					$(".left_down").children("#img1").attr("src","<?php print AppUrl::getMediaPath()?>/images/down.png");
		   })
	});
</script>
 