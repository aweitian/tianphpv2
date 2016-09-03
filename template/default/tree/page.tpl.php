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




    <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a <?php print App::useTarget()?> href="<?php print AppUrl::navHome()?>">首页</a> > <a href="<?php print AppUrl::articleByChannel($row["url"])?>" class="blue"><?php print($row["name"]); ?></a> >
   <a target="_blank">文章</a></div>
  
  <div class="blank15"></div>  <div class="sybox clearfix">
    <div>
      
      <div class="zjtd">
     
          <div class="tabcon selected fz13">
          	   <div class="blank20"></div>
               <div class="clr">
               
               <div class="wid680  fl ">
               
               		<div class="padd20 border2">
                       <div class="zjtd_pagetit tc">
                            <h2 class="color3 fz24"><?php print($conten["title"]) ?></h2>
                            <p><span class="color9"><?php print($conten["date"]) ?></span> <span class="color6"> 发表者：</span><span class="color3">上海九龙男子医院</span>   </p>
                       </div>
                       <div class="blank20"></div>
                       <div class="zjtd_pagenr">
                       
                       
                    <?php print($conten["content"]) ?>
                       
                       
                       </div>
                       <div class="blank20"></div>
 
                  </div>
                  	<div class="blank20"></div>
                    <div class="zjtdpage_box1">
                    	<h6 class="color3 fz16 page_tit1">在线问诊<span class="color9 fz13">平台不收取任何额外费用</span></h6>
                        <div class="padd20 border2 clr">
                        	<a id="dx_a" onclick="a()"><img src="/static/pc/images/zjtdpage_img1.png" /></a>
                            <a class="dh_a"><img src="/static/pc/images/zjtdpage_img2.png" /></a>
                            <a target="_blank" href="/subscribe"><img src="/static/pc/images/zjtdpage_img3.png" style="margin:0;" /></a>
                        </div>
                    </div>
<div class="dh_by"></div>
<div class="sjdxwz" style="cursor:pointer">
  <div class="dh_top"><img src="/static/pc/images/pop_1.jpg" class="fr" /></div>
    <form name="myform" action="http://swt.gssmart.com/send/index.php" method="POST">
  <table width="100%" border="0" cellspacing="0" cellpadding="0" style="margin-top:30px">
  
      <tr>
        <input type="hidden" name="content" value="上海九龙男子医院医师提醒：如有男科疾病方面的疑问，可拨打24小时咨询热线：021-52733999" />
        <td width="100" align="center">您的电话：</td>
        <td><input name="tel" type="text" id="ska_a" value="请输入您的电话号码，通话费用我们支付，请您放心接听！" onmouseover="this.focus()" onblur="if (this.value =='') this.value='请输入您的电话号码，通话费用我们支付，请您放心接听！'" onfocus="this.select()" onclick="if (this.value=='请输入您的电话号码，通话费用我们支付，请您放心接听！') this.value=''" style="width:360px"></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td height="48"><img src="/static/pc/images/dh2.jpg" /> 我们对您本次通话全程加密！</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><input name="submit" type="submit" value="给您回电" class="tsjy_but tsjy_but_in" id="senddx" onclick="a()">
          <input name="reset" type="reset" value="重新输入" class="tsjy_but tsjy_buts tsjy_but_in"></td>
      </tr>

  </table>
      </form>
</div>
<script src="/static/pc/js/dhuse.js"></script><div id="quanping" style=" background-color:#CCCCCC;display:none; width:100%; height:100%; position: fixed ! important;_position:absolute;_top:expression(offsetParent.scrollTop+0); top:0; left:0; opacity:0.6;filter:'alpha(opacity=60)';filter:alpha(opacity=60); z-index:12000;"></div>
<iframe id="destiframe" src="" scrolling="no" width="515px" height="350px" frameborder="0" style="position: fixed ! important;_position:absolute;_top:expression(offsetParent.scrollTop+240); left:50%; top:50%; margin-top:-160px; margin-left:-257px;display:none; z-index:2147483647; background:none; _height:340px; border:2px solid silver;"></iframe>
                  	<div class="blank20"></div>
                  	<div>
                    	<h6 class="color3 fz16 page_tit1">评论</h6>
                        
                        <div class="zjtd_box3">
                       
                                  
             
                      <?php $aid= $model->aid ?>
                 
             
                    	<?php foreach ($model->data($aid,0,3) as $list): ?>

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
                        <form name="form" onsubmit="return chk(this)" method="post" action="/user/addcomment">
                        
                        <textarea name="c" placeholder="请填写评论内容..." class="border2 color9 fz16"></textarea>
                        <div class="blank10"></div>
                    	<div class="f14 color6 zjtdpage_pl clr">
                            <span class="fl">请输入验证码：</span>
                            <p class="fl">    <img id="Img" src="/captcha" onclick = "this.src='/captcha?'+Math.random()"  />  <br />
			        <a target="_blank"  onclick="reImg();">看不清，换一张</a>  </p>
			                            
			                                <script type="text/javascript">  
			        function reImg(){  
			            var img = document.getElementById("Img"); 
			         
			            img.src = "/captcha?" + Math.random();  
			          
			        }  
			    </script>  
			    			
                            <input type="hidden" name="a" value="7151" />
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

              <?php foreach($model->getAidArrByTrd(($row["sid"]),8,0) as $aitem):?>
             
                 <?php $list= $model->rowNoContent($aitem)?> 
                 <?php if(!empty($list)):?>
                       	<li><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($list["sid"])?>"> 	
                       	<?php print utility::utf8Substr($list["title"], 0, 22) ; ?></a> 	
                       	</li>
                       	<?php endif;?>
                    <?php endforeach;?> 
              
                            </ul>        
                        </div>
                    </div>
                    <div class="blank20"></div>
                </div>
    			<!--left end-->
   <?php include dirname(__FILE__)."/right.tpl.php";?>
                

	