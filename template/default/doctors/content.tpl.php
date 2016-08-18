<?php
//aid,kw,desc,thumb,title,content,date
$data = $m->row($_REQUEST["id"]);

$this->description = "";
$this->keyword = "";

if(empty($data)){
	exit("removed.");
}
defTplData::getInstance()->title = $data["title"];
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

  <?php include dirname(__FILE__)."/common/location.tpl.php";?>
  <div class="sybox clearfix">
    <div>
      
      <div class="zjtd">
      
       <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
        
          <div class="tabcon selected fz13">
          	   <div class="blank20"></div>
               <div class="clr">
               
               <div class="wid680  fl ">
               
               		<div class="padd20 border2">
                       <div class="zjtd_pagetit tc">
                            <h2 class="color3 fz24"><?php print $data["title"]?></h2>
                            <p><span class="color9"><?php print $data["date"]?></span> <span class="color6"> 发表者：</span><span class="color3"><?php print $m->data["name"]?></span>   </p>
                       </div>
                       <div class="blank20"></div>
                       <div class="zjtd_pagenr">
                       
                       
                       <p><?php print ($data["content"])?></p>
                       
                       
                       </div>
                       <div class="blank20"></div>
                       <h6 class="color3 fz16">专家简介</h6>
                       <div class="blank15"></div>
                       <div class="zjtdcon1box1_sm1 clr" style="margin:0;">

                       
                  		<div class="fl">
                     		<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::docHomeByDocid($m->data["id"]) ?>" class="zjtd_thumb">
                     		<img width="200" height="220" src="<?php print AppUrl::getMediaPath()?>/doctor/<?php print($m->data["avatar"]) ?>">
                     		</a>
                     		<a href="<?php print AppUrl::getSwtUrl()?>" class="zjtd_swt"><?php print($m->data["name"]) ?></a>
                     	</div>
                     
                     <div class="fr">
                          <h4 class="fz24 tc"><?php print($m->data["name"]) ?>大夫的个人网站</h4>
                          <div class="blank20"></div>
                          <p><b class="fz18"><?php print($m->data["name"]) ?> <?php print($m->data["lv"]) ?> </b></p>
                          <div class="blank10"></div>
                          <p class="clr"><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img2.png" class="fl" />格言：从医20多年来，患者的康复是对我最大的回报。</p>
                          <p class="clr"><img src="<?php print AppUrl::getMediaPath()?>/images/zjtd_img3.png" class="fl" style="margin-bottom:30px;" />
                          擅长项目：<?php print utility::utf8Substr($m->data["spec"] , 0, 30)?>…<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl() ?>"> [点击咨询]</a></p>
                     </div>
                     
                  </div>
                  		 <div class="blank30"></div>
                        <div class="tc"><span class="bg_yl">点击上图，进入医生个人主页</span></div>
                       
                  </div>
                  	<div class="blank20"></div>
                    <div class="zjtdpage_box1">
                    	<h6 class="color3 fz16 page_tit1">在线问诊<span class="color9 fz13">平台不收取任何额外费用</span></h6>
                        <div class="padd20 border2 clr">
                        	<a id="dx_a" onclick="a()"><img src="<?php print AppUrl::getMediaPath()?>/images/zjtdpage_img1.png" /></a>
                            <a class="dh_a"><img src="<?php print AppUrl::getMediaPath()?>/images/zjtdpage_img2.png" /></a>
                            <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::navSubscribe() ?>"><img src="<?php print AppUrl::getMediaPath()?>/images/zjtdpage_img3.png" style="margin:0;" /></a>
                        </div>
                    </div>
<?php include dirname(dirname(__FILE__))."/inc/dhwz.tpl.php";?>
<div id="quanping" style=" background-color:#CCCCCC;display:none; width:100%; height:100%; position: fixed ! important;_position:absolute;_top:expression(offsetParent.scrollTop+0); top:0; left:0; opacity:0.6;filter:'alpha(opacity=60)';filter:alpha(opacity=60); z-index:12000;"></div>
<iframe id="destiframe" src="" scrolling="no" width="515px" height="350px" frameborder="0" style="position: fixed ! important;_position:absolute;_top:expression(offsetParent.scrollTop+240); left:50%; top:50%; margin-top:-160px; margin-left:-257px;display:none; z-index:2147483647; background:none; _height:340px; border:2px solid silver;"></iframe>
                  	<div class="blank20"></div>
                  	<div>
                    	<h6 class="color3 fz16 page_tit1">评论</h6>
                        
                        <div class="zjtd_box3">
                    	
                
                   
                 <?php $aid= $data["aid"]?>
                 
             
                    	<?php foreach ($m->data($aid,0,3) as $list): ?>

                        <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt><?php print AppFilter::filterOut($list["comment"]) ?></dt>
                            <dd class="fr"><span class="color9"><?php print($list["datetime"]) ?></span></dd>
                            <p class="blank20"></p>
                        </dl>
                         	<?php endforeach;  ?>
                        
                    </div>
                    
                    </div>
                    <div class="blank30"></div>
                    <div class="zjtdpage_box2">
                    	<h6 class="color3 fz16 page_tit1">发表评论</h6>
                        <div class="blank10"></div>
                        <form name="form" onsubmit="return chk(this)" method="post" action="<?php print AppUrl::userAddComment() ?>">
                        
                        <textarea name="c" placeholder="请填写评论内容..." class="border2 color9 fz16"></textarea>
                        <div class="blank10"></div>
                    	<div class="f14 color6 zjtdpage_pl clr">
                            <span class="fl">请输入验证码：</span>
                            <p class="fl">    <img id="Img" src="<?php print AppUrl::Captcha() ?>" onclick = "this.src='<?php print AppUrl::Captcha() ?>?'+Math.random()"  />  <br />
			        <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?>  onclick="reImg();">看不清，换一张</a>  </p>
			                            
			                                <script type="text/javascript">  
			        function reImg(){  
			            var img = document.getElementById("Img"); 
			         
			            img.src = "<?php print AppUrl::Captcha() ?>?" + Math.random();  
			          
			        }  
			    </script>  
			    			
                            <input type="hidden" name="a" value="<?php print $aid?>" />
                            <input type="text" name="v" class="fl zjtdpage_ip1 border2" />
                            <input type="submit"  class="fl zjtdpage_ip2" value="发表" />
                        </div>
                        
                        </form>
                        
                        
                        <script>

function chk(form){
    $.post(form.action,
    {
      a:form.a.value,
      c:form.c.value,
      v:form.v.value
    },
    function(data,status){
        if(data.result==0){
        	reImg();
            }
        alert(data.info);
   
    },
    'json');
    return false;
  }

</script>
                    </div>
                    <div class="blank20"></div>
                    <div>
                    	<h6 class="color3 fz16 page_tit1">相关文章</h6>
                        <div class="blank10"></div>
                        
                        <div class="zjtdpage_box3 clr">
                        	<ul >

          	 <?php foreach($m->allByDod($m->data["sid"],8,0) as $aitem):?> 
              
                 <?php $a= $m->rowNoContent($aitem)?> 
                 <?php if(!empty($a)):?>
                       	<li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($a["sid"])?>"> 	
                       	<?php print utility::utf8Substr($a["title"], 0, 22) ; ?></a> 	
                       	</li>
                       	<?php endif;?>
                    <?php endforeach;?> 
                            </ul>        
                        </div>
                    </div>
                    <div class="blank20"></div>
                </div>
    			<!--left end-->
                
                <div class="fr wid300 fz13">             
                	<div class="zjtd_zxfw border4">
                    	<textarea placeholder="在此简单描述病情，向陈希球医生提问" class="border4"></textarea>
                        <p class="blank10"></p>
                        <p class="color6"><b><?php print($m->data["name"]) ?>的咨询范围： </b>各类先天性心脏病，包括小儿和成人；房缺，室缺，四联症以及二尖... <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl()?>" class="blue">[更多]</a></p>
                        <p class="blank10"></p>
                        <p><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl()?>" class="zjtd_rgzx tc">咨询<?php print($m->data["name"]) ?>医生</a></p>
                    </div>
                    
                  	<div class="blank20"></div>
                    
      				<div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="fl">医师推荐</a></div>
                        <div class="hotbqbox fz13">
                          <ul class="clearfix">
                                     
                          <?php foreach($m->getRandomDid(8) as $dis):?>
                  
                            <li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disHomeByDid($dis["sid"]) ?>"><?php print $dis["data"] ?></a></li>
                       <?php endforeach;?> 
                          </ul>
                        </div>
                      </div>
      
                </div>
                
                <!--right end-->
             </div>
             
          </div>
        
      </div>
      
      <!--fromjb end-->
      
      <div class="blank20"></div>
      
    </div>
    <!--syboxl end-->
  </div>
  <!--sybox end-->
  <?php 

  $doc_img=$m->data["avatar"];
  $doc_name=$m->data["name"];
  $doc_desc=$m->data["desc"];
  $doc_spec=$m->data["spec"];
  
  ?>
<?php include dirname(dirname(__FILE__))."/bottom_swt.tpl.php";?>
