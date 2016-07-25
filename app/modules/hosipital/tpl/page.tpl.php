<?php 

$page=$model->row($aid);

?>
<div class="w-1000">
	<div class="blank15"></div>
	<div class="con_tit fz14">当前位置：<a href="">首页</a> > <a href="">问答</a> > <a href="">生殖整形</a></div>
    <div class="blank15"></div>
    
    <div class="clr boxz">
               
       <div class="wid690 fl main">
       
            <div class="padd20 border2">
               <div class="pagetit tc">
                    <h2 class="color3 fz24"><?php print $page["title"] ?></h2>
                    <p class="fz13">发布时间:<?php print $page["date"] ?></p>
               </div>
               <div class="blank20"></div>
               <div class="pagenr fz14">
               <?php print $page["content"] ?>
               </div>
               <div class="blank20"></div>
               
               <div class=" clr">
                    <a href=""><img src="<?php print HTTP_ENTRY?>/static/images/page_zx1.png" style="margin-left:125px;" /></a>
                    <a href=""><img src="<?php print HTTP_ENTRY?>/static/images/page_zx2.png" style="margin-left:40px;" /></a>
                </div>
          		<div class="blank30"></div>
                <div class="con_tit fz14">
                    <b class="color3">关键字Tags：</b>
                    <a href="">前列腺炎</a>&nbsp;&nbsp;
                    <a href="">男性不育</a>&nbsp;&nbsp;
                    <a href="">前列腺炎</a>
                </div>
                <div class="blank40"></div>
                <div class="clr"><a href="" class="fl color9">上一篇：没有了</a><a href="" class="fr color9">上一篇：没有了</a></div>
                <div class="blank30"></div>
                <div class="hd_hx"></div>
                <div class="blank30"></div>
                <div class="page_more">
                <ul class="tab_nav">
                  <li class="li1 selected">
                    <p>相关文章</p>
                  </li>
                  <li class="li2">
                    <p>相关问答</p>
                  </li>
                </ul>
              </div>
              <div class="blank15"></div>
                <div class="tab_switch link">
                <div class="tabcon selected">
                	<div class="page_box3 clr">
                        <ul class="fl">
                            <li><a href="">男性包皮红肿怎么回事？严重吗？</a></li>
                            <li><a href="">上海男科专家详解包皮炎</a></li>
                            <li><a href="">包皮粘连应该怎么治疗，才能达到效果？</a></li>
                            <li><a href="">包皮多长就算包皮过长？</a></li>
                        </ul>
                        <ul class="fr">
                            <li><a href="">男性包皮红肿怎么回事？严重吗？</a></li>
                            <li><a href="">上海男科专家详解包皮炎</a></li>
                            <li><a href="">包皮粘连应该怎么治疗，才能达到效果？</a></li>
                            <li><a href="">包皮多长就算包皮过长？</a></li>
                        </ul>
                    </div>
                </div>
                <div class="tabcon">
                  <div class="page_box3 clr">
                        <ul class="fl">
                            <li><a href="">2男性包皮红肿怎么回事？严重吗？</a></li>
                            <li><a href="">上海男科专家详解包皮炎</a></li>
                            <li><a href="">包皮粘连应该怎么治疗，才能达到效果？</a></li>
                            <li><a href="">包皮多长就算包皮过长？</a></li>
                        </ul>
                        <ul class="fr">
                            <li><a href="">男性包皮红肿怎么回事？严重吗？</a></li>
                            <li><a href="">上海男科专家详解包皮炎</a></li>
                            <li><a href="">包皮粘连应该怎么治疗，才能达到效果？</a></li>
                            <li><a href="">包皮多长就算包皮过长？</a></li>
                        </ul>
                    </div>
                </div>
              </div>
                
                   
           
            
        </div>
        </div>
        <!--left end-->

            <!--代码开始-->
           <?php include dirname(__FILE__)."/left.tpl.php"; ?>
            <!--代码结束-->
        </div>

        </div>
        <!--right end-->
         <div class="blank30"></div>
        
     </div>
     
 </div>
 <div class="blank30"></div>
