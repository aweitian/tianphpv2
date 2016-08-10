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
?>
 
<div class="public_width">
<?php $disease_header_title = $row["data"];?>
<?php include dirname(dirname(__FILE__))."/inc/header.disease.php"?>

<!--head end-->
<div class="hui_bg">
	<div class="blank30"></div>
    <div class="mzy30">
		<div class="jbzs_con_nav">
            <ul>
                <li><a href="" class="jbzs_one">疾病知识</a></li>
                <li class=""><a href="">相关咨询</a></li>
                <li class=""><a href="" class="last">推荐专家</a></li>
            </ul>
           
            <div class="clear_l"></div>
        </div>
     </div>
     <div class="blank20"></div>
</div>
<div class="public_width">
<div class="hd_hsx"></div>
    
    <div class="jbzs_con">
        
        <div class="jb_sstab clearfix dgray fz13 color6">
            <ul class="fl">
              <li class="selected">全部文章</li>
              <li>病因</li>
              <li class="last">症状</li>
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
                <a href="" class="de_cur">全部文章</a> 
                <a href="" class ="cnzz_article_lable">疾病介绍</a> 
                <a href="" class ="cnzz_article_lable">病因</a> 
            </li>
            <li> 
                <a href="" class ="cnzz_article_lable">症状</a> 
                <a href="" class ="cnzz_article_lable">传染</a> 
                <a href="" class ="cnzz_article_lable">遗传</a> 
            </li>
            <li> 
                <a href="" class ="cnzz_article_lable">预防</a> 
                <a href="" class ="cnzz_article_lable">检查</a> 
                <a href="" class ="cnzz_article_lable">用药</a> 
            </li>
            <li> 
                <a href="" class ="cnzz_article_lable">康复</a> 
                <a href="" class ="cnzz_article_lable">中医疗法</a> 
                <a href="" class ="cnzz_article_lable">心理治疗</a> 
            </li>
            <li> 
                <a href="" class ="cnzz_article_lable">治疗方法</a> 
                <a href="" class ="cnzz_article_lable">就诊指南</a> 
                <a href="" class ="cnzz_article_lable">日常护理</a> 
            </li>
            <li> 
                <a href="" class ="cnzz_article_lable">饮食运动</a> 
                <a href="" class ="cnzz_article_lable">孕产</a> 
            </li>
          </ul>
        </div>
      
      	<div class="jb_ssall">
        
            <div class="jb_ssbox selected">
                
                <div class="clr jb_ssbox_sm1">
                    <div>
                        <span class="fz16 color3">1前列腺炎的疾病简介</span>
                        <p class="fz13 color6">前列腺炎是多种复杂原因和诱因引起的前列腺的炎症、免疫、神经内分泌参与的错综的病...<a href="" class="bule fr">详情 ></a></p>
                    </div>
                    <div class="blank20"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="hd_hsx"></div>
                <div class="blank30 hui_bg"></div>

            </div>
            
            <div class="jb_ssbox">
                <div class="clr jb_ssbox_sm1">
                    <div class="clr">
                        <span class="fz16 color3">2前列腺炎的疾病简介</span>
                        <p class="fz13 color6">前列腺炎是多种复杂原因和诱因引起的前列腺的炎症、免疫、神经内分泌参与的错综的病...<a href="" class="bule fr">详情 ></a></p>
                    </div>
                    <div class="blank20"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="hd_hsx"></div>
                <div class="blank30 hui_bg"></div>
                
            </div>
            
            <div class="jb_ssbox">
                <div class="clr jb_ssbox_sm1">
                    <div class="clr">
                        <span class="fz16 color3">3前列腺炎的疾病简介</span>
                        <p class="fz13 color6">前列腺炎是多种复杂原因和诱因引起的前列腺的炎症、免疫、神经内分泌参与的错综的病...<a href="" class="bule fr">详情 ></a></p>
                    </div>
                    <div class="blank20"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="bortbcon"></div>
                <div class="mzy30">
                <div class="blank30"></div>
                
					<div class="clr jbzs_sm1">
                    	<dl class="fl tc">
                            <a href="">
                            <dt><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img1.png" /></dt>
                             <dd class="color6">陈希球</dd>
                            </a>
                        </dl>
                        <div class="fr">
                        	<h5 class="fz28 fw400"><a href="" class="color3">前列腺炎"最爱"八种人，有...</a></h5>
                            <p class="color6 fz22">值此三八妇女节之际，献给心爱的他——"他"好，"我"也好！前列腺是男子体内最...</p>
                            <p class="tr"><span class="yellow">1112</span> 已读</p>
                        </div>
                    </div>
    				
                    <div class="blank30"></div>
                </div>
                <div class="hd_hsx"></div>
                <div class="blank30 hui_bg"></div>
               
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
 