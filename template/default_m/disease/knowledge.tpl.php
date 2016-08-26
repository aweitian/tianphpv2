<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月12日
 * @Desc: 
 */
$row = $model->data;

$this->title = "什么是".$row["data"].",".$row["data"]."症状,".$row["data"]."的治疗和康复_上海九龙男子医院";
$this->keyword = "什么是".$row["data"].",".$row["data"]."症状,".$row["data"]."治疗康复和手术费用";
$this->description = "什么是".$row["data"].",".$row["data"]."症状是什么,".$row["data"]."疾病如何治疗,吃什么有利于".$row["data"]."康复,全面的疾病知识和患教文章，患者常见疑问，这里有25位医生发表有关".$row["data"]."的文章，让你正确了解".$row["data"]."的发病原因和治疗方式，".$row["data"]."专家在线咨询";


$ext = diseaseExtInfoes::getExtData();





$pageSize = 8;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($model->knowledgeCnt($row["sid"],$model->subid), $page, $pageSize, 6);
$paginations = new pagination($model->getAllCntdid($row["sid"]), $page, $pageSize, 6);


$req = new httpRequest();
$url = new url($req->requestUri());

$ctr = appCtrl::$msg->getAction();
?>

<div class="public_width">
<?php $disease_header_title = $row["data"];?>
<?php include dirname(dirname(__FILE__))."/inc/header.tc.php"?>

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
              <?php if ($model->knowledgeCnt($row["sid"],0) > 0):?>
              <li <?php if($model->subid =="1"):?> class="selected"<?php endif?>><a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],1) ?>">病因</a></li>
              <li class="last <?php if($model->subid =="2"):?>selected<?php endif?>"><a href="<?php print AppUrl::disKnowledgeSubByDiskey($row["key"],2) ?>">症状</a></li>
              <?php endif?>
            </ul>
           <div class ="rel fr">

            <?php if ($model->knowledgeCnt($row["sid"],0) > 0):?>            
          	<span class="left_down"><img src="<?php print AppUrl::getMediaPath()?>/images/down.png" id="img1" ></span>         	
            <?php endif?>
          
         </div>
         <div class="bg_col"></div>
        </div>
        <?php if ($model->knowledgeCnt($row["sid"],0) > 0):?>
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
      <?php endif?>
      	<div class="jb_ssall">
        
            <div class="jb_ssbox selected">
                
                <div class="clr jb_ssbox_sm1">
                    <?php if( $model->subid =="0"): ?>
                    <div>
         
                          <?php foreach($model->getArticleTag7ByDid($row["sid"],1,0) as $aitem):?> 
                        <span class="fz16 color3"><a href="<?php print AppUrl::articleByAid($aitem["aid"]) ?>"><?php print $row["data"]?>知识介绍</a></span>
                        <p class="fz13 color6"><?php print utility::utf8Substr( $aitem["desc"], 0, 40)?>...<a href="<?php print AppUrl::articleByAid($aitem["aid"]) ?>" class="bule fr">详情 ></a></p>
                        <?php endforeach; ?>
                        
                        
                        
                        
                    </div>                    
                    <?php endif; ?>
                    <div class="blank20"></div>
                </div>
                
                
                
                <?php if ($model->knowledgeCnt($row["sid"],0) > 0):?>
                
                <?php foreach ($model->knowledge($row["sid"],$model->subid,0,($page-1)*$pageSize,$pageSize, 6) as $list): ?>
             
                <?php $tag=$model->getTag($list["tid"]) ?>                           
                <?php $dod= $model->getOwner($list["aid"])?>     
	            <?php $doc=($model->getInfoByDod($dod))?> 
                <?php $nuber=$model->getCountByAid($list["aid"]) ?>     
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <dt><a href="<?php print AppUrl::docHomeByDod($doc["dod"]) ?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" /></a></dt>
                             <dd class="color6"><a href="<?php print AppUrl::docHomeByDod($doc["dod"]) ?>"><?php print $doc["name"] ?> </a></dd>
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
               <?php else:?>
               <?php foreach($model->getAll($row["sid"],$pageSize,($page - 1) * $pageSize) as $wz):?> 
               <?php $dod= $model->getOwner($wz["aid"])?>     
	           <?php $doc=($model->getInfoByDod($dod))?> 
               <div class="bortbcon"></div>
            <div class="mzy30">
            <div class="blank30"></div>
            <div class="clr jbzs_sm1">
              <dl class="fl tc">
                <dt><a href="<?php print AppUrl::docHomeByDod($doc["dod"]) ?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print $doc["avatar"]?>" /></a></dt>
                <dd class="color6"><a href="<?php print AppUrl::docHomeByDod($doc["dod"]) ?>"><?php print $doc["name"] ?> </a></dd>
              </dl>
              <div class="fr">
                <h5 class="fz28 fw400"><a href="<?php print AppUrl::articleByAid($wz["aid"]) ?>" class="color3"><?php print utility::utf8substr($wz["title"],0,14); ?></a></h5>
                <p class="color6 fz22"><?php print utility::utf8substr($wz["desc"],0,50); ?>...</p>
                <p class="tr"><span class="yellow"><?php echo rand(1000,1300);?></span> 已读</p>
              </div>
            </div>
            <div class="blank30"></div>
          </div>
          <?php endforeach;?>  
               <?php endif;?>
                <div class="hd_hsx"></div>
                <div class="blank30 hui_bg"></div>
           <?php if ($model->knowledgeCnt($row["sid"],0) > 0):?>
            <div class="pagenum tc gray fz13">                  
                   <?php if ($pagination->hasPre()):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?> 
       		</div>
       		<?php else:?>
            <div class="pagenum tc gray fz13">                  
                   <?php if ($paginations->hasPre()):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$paginations->getPageBtnLen();$i++):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($paginations->hasNext()):?>
            <a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?> 
       		</div>

       		<?php endif;?>
                                 
             <?php include dirname(dirname(__FILE__))."/inc/bottom.tpl.php";?>

            </div>
            

            
          </div>
        
        
    </div>
    
    
</div>
<?php include dirname(dirname(__FILE__))."/inc/bottom_fd_sub.tpl.php";?>
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
 