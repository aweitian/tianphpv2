<?php
/**
 * @Author: awei.tian
 * @Date: 2016年9月1日
 * @Desc: 
 * 依赖:
 */
$conten=($model->getContent($model->aid,0));

?>
<?php  ?>



    <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a target="_blank" href="/">首页</a> >
   <a target="_blank" href="/yydt/">医院动态</a> >
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
                       
                                  
             
                    	
                        <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt>觉得这篇内容很有用，不知道这个吃药能不能治好啊</dt>
                            <dd class="fr"><span class="color9">2016-08-23 17:19:22</span></dd>
                            <p class="blank20"></p>
                        </dl>
                         	          
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

          	  
              
                  
                                        	<li><a target="_blank" href="/ckl/article/7151.html"> 	
                       	阴茎疼痛、瘙痒四大症状</a> 	
                       	</li>
                       	                     
              
                  
                                        	<li><a target="_blank" href="/ckl/article/7150.html"> 	
                       	九龙医院男科专家“夜门诊”受到患者欢迎</a> 	
                       	</li>
                       	                     
              
                  
                                        	<li><a target="_blank" href="/ckl/article/7139.html"> 	
                       	何为早泄?</a> 	
                       	</li>
                       	                     
              
                  
                                        	<li><a target="_blank" href="/ckl/article/7136.html"> 	
                       	阳痿早泄疗治疗了能让男人雄姿勃发!</a> 	
                       	</li>
                       	                     
              
                  
                                        	<li><a target="_blank" href="/ckl/article/7133.html"> 	
                       	医生破局阳痿偏方，你是不是偏方一族</a> 	
                       	</li>
                       	                     
              
                  
                                        	<li><a target="_blank" href="/ckl/article/7131.html"> 	
                       	阳痿早泄的原因</a> 	
                       	</li>
                       	                     
              
                  
                                        	<li><a target="_blank" href="/ckl/article/7122.html"> 	
                       	阳痿的后果和危害有哪些？</a> 	
                       	</li>
                       	                     
              
                  
                                        	<li><a target="_blank" href="/ckl/article/7120.html"> 	
                       	老公阳痿怎么办？怎么治疗？妻子怎么配合？</a> 	
                       	</li>
                       	                     
                            </ul>        
                        </div>
                    </div>
                    <div class="blank20"></div>
                </div>
    			<!--left end-->
   
                <div class="fr wid300 fz13">
                	
                    <div class="doctj border2">
    
    <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师推荐</a><a class="fz13 blue fr" href="/doctors">+更多</a></div>
    <div class="doctjbox">
    
              <dl class="clearfix"><dt class="fl"><a href="/lml"><img src="/static/pc/doctor/170X170/lml.jpg" width="80" height="80" /></a></dt>
      <dd class="fl">
      <p class="blank5"></p>
      <p class="fz18">李美龙<span class="gray fz13">主治医师</span></p>
      <p class="blank5"></p>
      <p class="fz13 gray">擅长：治疗前列腺炎，性功能障碍（阳痿、早泄），...</p>
      <p class="blank5"></p>
      <p class="p3 tc"><a href="javascript:void(0)" onClick="openZoosUrl();return false;">咨询</a></p>
      </dd></dl>
      	      <dl class="clearfix"><dt class="fl"><a href="/zyl"><img src="/static/pc/doctor/170X170/zyl.jpg" width="80" height="80" /></a></dt>
      <dd class="fl">
      <p class="blank5"></p>
      <p class="fz18">张耀龙<span class="gray fz13">副主任医师</span></p>
      <p class="blank5"></p>
      <p class="fz13 gray">擅长：从医40余年，擅长治疗生殖器皮肤病，如湿...</p>
      <p class="blank5"></p>
      <p class="p3 tc"><a href="javascript:void(0)" onClick="openZoosUrl();return false;">咨询</a></p>
      </dd></dl>
      	      <dl class="clearfix"><dt class="fl"><a href="/zdz"><img src="/static/pc/doctor/170X170/zdz.jpg" width="80" height="80" /></a></dt>
      <dd class="fl">
      <p class="blank5"></p>
      <p class="fz18">郑殿增<span class="gray fz13">副主任医师</span></p>
      <p class="blank5"></p>
      <p class="fz13 gray">擅长：治疗顽固性前列腺炎，尿道炎，前列腺肥大，...</p>
      <p class="blank5"></p>
      <p class="p3 tc"><a href="javascript:void(0)" onClick="openZoosUrl();return false;">咨询</a></p>
      </dd></dl>
      	
      
      </div>
    
    
    
    </div>
                      
                  <div class="blank20"></div>

                    <div class="syrbox5 border2">
                    <div class="syrboxtit fz18 graybg">相关问答<a href="/ask" class="blue fz13 fr">+更多</a></div>
                    
                    <div class="zjtd_r2">
                    	<div class="blank10"></div>
                    	
                       	
                    	                        <dl  class="selected" >
                          <dt class="fz18 blue"><a href="/zly/ask/1094.html">梅毒螺旋体抗体阳性，快速血...</a></dt>
                          <dd class="fz16 dgray clr">
                            <img src="/static/pc/images/zjtd_img7.png" class="fl" /><p class="fl">
                            <a href="/zly/ask/1094.html">
                              	关于梅毒特异性抗体阳性，非特异抗体RPR检查...
                            </a>
                            </p>
                          </dd>
                        </dl>
                         
                        <dl  >
                          <dt class="fz18 blue"><a href="/xkz/ask/1093.html">阴茎弯曲，阴茎勃起疼痛</a></dt>
                          <dd class="fz16 dgray clr">
                            <img src="/static/pc/images/zjtd_img7.png" class="fl" /><p class="fl">
                            <a href="/xkz/ask/1093.html">
                            只是挤压一下，不应该那么严重，最好去正规医院检查一...
                            </a>
                            </p>
                          </dd>
                        </dl>
                         
                        <dl  >
                          <dt class="fz18 blue"><a href="/szg/ask/1092.html">前列腺癌的诱因</a></dt>
                          <dd class="fz16 dgray clr">
                            <img src="/static/pc/images/zjtd_img7.png" class="fl" /><p class="fl">
                            <a href="/szg/ask/1092.html">
                            手淫和前列腺癌有啥关系。...
                            </a>
                            </p>
                          </dd>
                        </dl>
                         
                        <dl  >
                          <dt class="fz18 blue"><a href="/jmq/ask/1091.html">衣原体阳性如何治疗</a></dt>
                          <dd class="fz16 dgray clr">
                            <img src="/static/pc/images/zjtd_img7.png" class="fl" /><p class="fl">
                            <a href="/jmq/ask/1091.html">
                            根据你所描述的情况，应该是普通的包皮龟头炎，建议你...
                            </a>
                            </p>
                          </dd>
                        </dl>
                         
                        
                      </div>
                    
                    <div class="zjtd_r3 clr"><a href="javascript:void(0)">立刻咨询</a></div>
                    <div class="blank20"></div>
                  </div>
                	
                    <div class="blank20"></div>
                 <script src="/static/pc/js/guahao.js"></script>
      <div class="syrbox4 border2">
        <div class="syrboxtit fz18 graybg">预约挂号</div>
        <div class="syrbox4nr fz13">
        
  <form name="form1" accept-charset="gb2312" action="http://swt.gssmart.com/guahao/sockt.php" method="post" onSubmit="return guahao()" >
            <table>
              <tr>
                <td height="26"  width="62">姓      名</td>
                <td><input name="名称" id="name" class="input1 border2" type="text" /></td>
              </tr>
              <tr height="14">
                <td></td>
              </tr>
              <tr>
                <td width="62">联系电话</td>
                <td><input id="hometel" name="电话" class="input1 border2" type="text" /></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
              <tr>
                <td width="62">预约时间</td>
                <td><input id="yudate" class="input2 gray border2" name="预约时间" onclick="WdatePicker()" placeholder="请选择预约时间" type="text" /></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
              <tr>
                <td width="62">就诊状态</td>
                <td><input id="ismode" type="radio" name="就诊状态"  checked="checked" />
                  <label> 初诊</label>
                  <input id="ismode" class="input3" type="radio" name="就诊状态" />
                  <label> 复诊</label></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
            </table>
            <div class="sybtn">
 <button class="sybtn1" type="submit" value=""><img src="/static/pc/images/syrth8.jpg" width="120" height="40" /></button>
              <button type="submit" value=""><img src="/static/pc/images/syrth9.jpg" width="120" height="40" /></button>
          
            </div>
          </form>
        </div>
      </div>                  
                </div>
                
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
 
  
                

	