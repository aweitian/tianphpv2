<?php
//aid,kw,desc,thumb,title,content,date
$data = $m->row($_REQUEST["id"]);
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
// var_dump($m->data);exit;
?>

  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a href="">首页</a> > <a href="">陈希球医生个人网站</a> > <a href="">文章列表</a> > 文章详情</div>
  
  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="zjtd">
      
        <ul class="zjtdtit fz16 clearfix">
          <li><a href="<?php print AppUrl::docHomeByDocid($m->data["id"])?>">医师首页</a></li>
          <li><a href="<?php print AppUrl::docAskHomeByDocid($m->data["id"])?>">患者服务区</a></li>
          <li class="selected"><a href="<?php print AppUrl::docArticleHomeByDocid($m->data["id"])?>">文章</a></li>
          <li><a href="<?php print AppUrl::docPresentHomeByDocid($m->data["id"])?>">心意礼物</a></li>
        </ul>
        
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
                     		<img src="<?php print HTTP_ENTRY?>/static/images/zjtd_zj1.jpg">
                     		<a href="" class="zjtd_swt">陈希球</a>
                     	</div>
                     
                     <div class="fr">
                          <h4 class="fz24 tc">陈希球大夫的个人网站</h4>
                          <div class="blank20"></div>
                          <p><b class="fz18">陈希球  副主任医师 </b></p>
                          <div class="blank10"></div>
                          <p class="clr"><img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img2.png" class="fl" />格言：从医20多年来，患者的康复是对我最大的回报。</p>
                          <p class="clr"><img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img3.png" class="fl" style="margin-bottom:30px;" />擅长项目：高难度男性生殖整形手术：阴茎背神经修复手术，阴茎再造术，阴茎延长，阴茎增粗，阴茎矫正，先天性尿道下裂，阴茎冠状沟缺损等，精索静脉曲张，尿道等…<a href=""> [点击咨询]</a></p>
                     </div>
                     
                  </div>
                  		 <div class="blank30"></div>
                        <div class="tc"><span class="bg_yl">点击上图，进入医生个人主页</span></div>
                       
                  </div>
                  	<div class="blank20"></div>
                    <div class="zjtdpage_box1">
                    	<h6 class="color3 fz16 page_tit1">在线问诊<span class="color9 fz13">平台不收取任何额外费用</span></h6>
                        <div class="padd20 border2 clr">
                        	<a href=""><img src="<?php print HTTP_ENTRY?>/static/images/zjtdpage_img1.png" /></a>
                            <a href=""><img src="<?php print HTTP_ENTRY?>/static/images/zjtdpage_img2.png" /></a>
                            <a href=""><img src="<?php print HTTP_ENTRY?>/static/images/zjtdpage_img3.png" style="margin:0;" /></a>
                        </div>
                    </div>
                  	<div class="blank20"></div>
                  	<div>
                    	<h6 class="color3 fz16 page_tit1">评论</h6>
                        
                        <div class="zjtd_box3">
                    	
                        <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt>你好。邹主任。婴儿痉挛点头。能做手术吗</dt>
                            <dd class="fr"><span class="color9">游客(来自上海市长城宽带的网友) 2016-03-03</span></dd>
                            <p class="blank20"></p>
                        </dl>
                         <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt>你好。邹主任。婴儿痉挛点头。能做手术吗</dt>
                            <dd class="fr"><span class="color9">游客(来自上海市长城宽带的网友) 2016-03-03</span></dd>
                            <p class="blank20"></p>
                        </dl>
                         <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt>你好。邹主任。婴儿痉挛点头。能做手术吗</dt>
                            <dd class="fr"><span class="color9">游客(来自上海市长城宽带的网友) 2016-03-03</span></dd>
                            <p class="blank20"></p>
                        </dl>
                        
                    </div>
                    
                    </div>
                    <div class="blank30"></div>
                    <div class="zjtdpage_box2">
                    	<h6 class="color3 fz16 page_tit1">发表评论</h6>
                        <div class="blank10"></div>
                        <textarea placeholder="请填写评论内容..." class="border2 color9 fz16"></textarea>
                        <div class="blank10"></div>
                    	<div class="f14 color6 zjtdpage_pl clr">
                            <span class="fl">请输入计算结果：</span>
                            <p class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/zjtdpage_img4.jpg" /><br /><a href="fl">看不清，换一个</a></p>
                            <input type="text" class="fl zjtdpage_ip1 border2" />
                            <input type="button"  class="fl zjtdpage_ip2" value="发表" />
                        </div>
                    </div>
                    <div class="blank20"></div>
                    <div>
                    	<h6 class="color3 fz16 page_tit1">相关文章</h6>
                        <div class="blank10"></div>
                        
                        <div class="zjtdpage_box3 clr">
                        	<ul class="fl">
                            	<li><a href="">前列腺的作用以及前列</a></li>
                                <li><a href="">男性为何会患上前列腺增生</a></li>
                                <li><a href="">男性为何会患上前列腺增生</a></li>
                            </ul>
                            <ul class="fr">
                            	<li><a href="">前列腺的作用以及前列</a></li>
                                <li><a href="">男性为何会患上前列腺增生</a></li>
                                <li><a href="">男性为何会患上前列腺增生</a></li>
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
                        <p class="color6"><b>陈希球的咨询范围： </b>各类先天性心脏病，包括小儿和成人；房缺，室缺，四联症以及二尖... <a href="" class="blue">[更多]</a></p>
                        <p class="blank10"></p>
                        <p><a href="" class="zjtd_rgzx tc">咨询陈希球医生</a></p>
                    </div>
                    
                  	<div class="blank20"></div>
                    
      				<div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师推荐</a></div>
                        <div class="hotbqbox fz13">
                          <ul class="clearfix">
                            <li><a href="">前列腺炎</a></li>
                            <li><a href="">前列腺增生</a></li>
                            <li><a href="">包皮包茎</a></li>
                            <li><a href="">前列腺痛</a></li>
                            <li><a href="">前列腺肥大</a></li>
                            <li><a href="">早泄</a></li>
                            <li><a href="">前列腺囊肿</a></li>
                            <li><a href="">前列腺癌</a></li>
                            <li><a href="">前列腺炎</a></li>
                            <li><a href="">前列腺增生</a></li>
                            <li><a href="">包皮包茎</a></li>
                            <li><a href="">前列腺痛</a></li>
                            <li><a href="">前列腺肥大</a></li>
                            <li><a href="">早泄</a></li>
                            <li><a href="">前列腺囊肿</a></li>
                            <li><a href="">前列腺癌</a></li>
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
  