<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月12日
 * @Desc: 
 */
$row = $model->data;
// var_dump($row);
$ext = diseaseExtInfoes::getExtData();
?>
  
  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
      	
        <div class="jb_tit clr">
        	<h2 class="fl tc fz24">前列腺炎<br /><span class="fz12">prostatitis</span></h2>
            <ul class="fr fz16">
            	<li><a href="<?php print AppUrl::disHomeByDiseasekey($row["key"])?>">疾病首页</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disKnowledgeByDiseasekey($row["key"])?>" class="navdq">疾病知识</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disArticleByDiseasekey($row["key"])?>">专家观点</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disDoctorsByDiseasekey($row["key"])?>">好评医生</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disAskByDiseasekey($row["key"])?>">患者咨询</a></li>
            </ul>
        </div>
          
          <div class="fz13">
            
            <div class="blank20"></div>
                
               <div class="clr">
               
               	<div class="wid680 fl">
                    
                    <div class="jb_zstab clearfix dgray fz13 color6">
                            <ul class="clr">
                              <li class="selected">全部文章</li>
                              <li>病因</li>
                              <li>症状</li>
                              <li>检查</li>
                              <li>治疗</li>
                              <li>危害</li>
                              <li class="last">保键</li>
                            </ul>
                        </div>
                    <div class="blank20"></div>
                    	
      
      				<div class="jb_zsall">
                        <div class="jb_zsbox selected">
                        
                            <div class="padd20 border2">
                            <div class="zjtdwztit fz18"><span></span>前列腺炎精华文章</div>
                            <div class="blank20"></div>
                                <div class="jb_ssbox_sm2 clr">
                                <ul class="fl">
                                    <li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                    <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                    <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                                </ul>
                                <ul class="fr">
                                    <li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                    <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                    <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                                </ul>
                            </div>
                           </div> 
                           	
                            <div class="blank20"></div>
                            
                            <div class="padd20 border2">
                            	
                                <ul class="kart_list">

                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>1前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank30"></div>
                                  <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
                                  <div class="blank15"></div>
                                </ul>

                                
                            </div>
                           
                           
                           
                        </div>
                        <div class="jb_zsbox">
                        	<div class="padd20 border2">
                            	
                                <ul class="kart_list">

                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>2前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank30"></div>
                                  <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
                                  <div class="blank15"></div>
                                </ul>

                                
                            </div>
                        </div>
                        <div class="jb_zsbox">
                        	<div class="padd20 border2">
                            	
                                <ul class="kart_list">

                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>3前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">症状</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank30"></div>
                                  <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
                                  <div class="blank15"></div>
                                </ul>

                                
                            </div>
                        </div>
                        <div class="jb_zsbox">
                        	<div class="padd20 border2">
                            	
                                <ul class="kart_list">

                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>4前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">检查</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank30"></div>
                                  <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
                                  <div class="blank15"></div>
                                </ul>

                                
                            </div>
                        </div>
                        <div class="jb_zsbox">
                        	<div class="padd20 border2">
                            	
                                <ul class="kart_list">

                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>5前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">治疗</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank30"></div>
                                  <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
                                  <div class="blank15"></div>
                                </ul>

                                
                            </div>
                        </div>
                        <div class="jb_zsbox">
                        	<div class="padd20 border2">
                            	
                                <ul class="kart_list">

                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>6前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">危害</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank30"></div>
                                  <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
                                  <div class="blank15"></div>
                                </ul>

                                
                            </div>
                        </div>
                        <div class="jb_zsbox">
                        	<div class="padd20 border2">
                            	
                                <ul class="kart_list">

                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>7前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">保键</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank40"></div>
                                  
                                  <li class="kart_li">
                                    <div class="bb_e5 pb5 clearfix"> 
                                        <span class="f20 fl">
                                        <a href="" class="fl kart_title"><h2>前列腺炎的病因有哪些？</h2></a>
                                        <span class="fl kart_label ">病因</span></span>
                                      	<p class="fr color9">发布时间：2016-06-08</p>
                                    </div>
                                    <div class="blank15"></div>
                                    <p class="fz13 color9"> 发布医生： <a  href="" class="blue">陈希球 </a></p>
                                    <div class="pt10 clearfix ">
                                      <div class="fl w435 kart_con"> 前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙男子医院男科专家表示...<a href=""  class="gray_a ml5">查看全文<span class="f8">>></span></a> </div>
                                      <!--轮转图 start-->
                                      <div class="fr kart_doc ml25">
                                              <a href="" ><img src="<?php print HTTP_ENTRY?>/static/images/fzzj9.png"  class="fl"></a>
                                            <div class="fl pt20">
                                              <p><a href=""  class="g_home1">个人网站</a></p>
                                              <p><a  href="" class="g_advise2" rel="nofollow">可咨询</a>
                                              <p> 
                                        </div>
                                        <a href="javascript:;" class="prev2"></a> <a href="javascript:;" class="next2"></a> </div>
                                      <!--轮转图 end--> 
                                    </div>
                                    <div class="blank20"></div>
                                    <!--分享 start-->
                                    <div class="kart_share mt20 clearfix fz12">
                                      <p class="fl"> 
                                        <a href="" class="g_read" rel="nofollow">阅读47</a> 
                                        <a  href="" class="g_comment" rel="nofollow">评论0</a> 
                                        <a href="" class="g_sub" style="margin-right:0px">查看张俊峰的全部文章</a>、 
                                        <a href="http://zhoushuping0711.haodf.com/zixun/list.htm" class="gray_a">全部咨询</a> 
                                        </p>
                                      <p class="fr">
                                      <div class="bshare-custom fr">分享到
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb1.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb2.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb3.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb4.png" />
                                            <img src="<?php print HTTP_ENTRY?>/static/images/jbfx_tb5.png" />
                                     </div>
                                    </div>
                                    <!--分享 end--> 
                                  </li>
                                  <div class="blank30"></div>
                                  <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
                                  <div class="blank15"></div>
                                </ul>

                                
                            </div>
                        </div>
                      </div>
                    </div>
                
    			<!--left end-->
                
               <?php include dirname(__FILE__)."/right.tpl.php";?>
                <!--right end-->
             </div>
            
          </div>
          <!--zjtd_con2 end-->
        
      </div>
      
      <!--fromjb end-->
      
      <div class="blank20"></div>
      
    </div>
    <!--syboxl end-->
  </div>
  <!--sybox end-->
  