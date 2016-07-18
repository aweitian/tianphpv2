<?php

defTplData::getInstance()->title = $m->data["name"] . " - 医师首页";
/**
  ["sid"]=> 	11
  ["id"]=>  	string(3) "zyl"
  ["name"]=>  	string(9) "张耀龙"
  ["lv"]=>  	string(7) "ccccccc"
  ["avatar"]=>  string(7) "zyl.jpg"
  ["date"]=>  	string(10) "2016-05-16"
  ["dod"]=>  	string(1) "2"
  ["dlv"]=>  	string(1) "3"
  ["star"]=>  	string(2) "10"
  ["hot"]=>  	string(2) "22"
  ["love"]=>  	string(1) "2"
  ["contribution"]=>  string(1) "2"
  ["desc"]=>  	string(2) "33"
  ["spec"]=>  	string(1) "3"
}
 */
// var_dump($m->data);exit;

?>

  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a href="">首页</a> > <a href="">医护团队</a> > <a href="">医师</a></div>
  
  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="zjtd">
      
        <ul class="zjtdtit fz16 clearfix">
          <li class="selected"><a href="<?php print AppUrl::docHomeByDocid($m->data["id"])?>">医师首页</a></li>
          <li><a href="<?php print AppUrl::docAskHomeByDocid($m->data["id"])?>">患者服务区</a></li>
          <li><a href="<?php print AppUrl::docArticleHomeByDocid($m->data["id"])?>">文章</a></li>
          <li><a href="<?php print AppUrl::docPresentHomeByDocid($m->data["id"])?>">心意礼物</a></li>
        </ul>
        
          <div class="tabcon selected fz13">
              <div class="blank20"></div>
              <div class="zjtdcon1_box1 clr">
                  
                  <div class="zjtdcon1box1_sm1 fl">
                  	
                   	 <a href=""><img src="<?php print HTTP_ENTRY?>/static/doctor/<?php print $m->data["avatar"]?>" class="fl" width="165" height="175" /></a>
                     
                     <div class="fr">
                          <h4 class="fz24 tc"><?php print $m->data["name"]?>大夫的个人网站</h4>
                          <div class="blank20"></div>
                          <p><b class="fz18"><?php print $m->data["name"]?>  <?php print $m->data["lv"]?> </b></p>
                          <div class="blank10"></div>
                          <p class="clr"><img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img2.png" class="fl" />所属科室：上海九龙男子医院生殖整形专科</p>
                          <p class="clr"><img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img3.png" class="fl" style="margin-bottom:30px;" />擅长项目：<?php print $m->data["spec"]?><a href=""> [点击咨询]</a></p>
                     </div>
                  </div>
                  
                  <div class="fr zjtdcon1box1_sm2">
                  		<div class="zjtdcon1box1_sm3">
                        	<dl style="margin-left:60px;">
                            	<dt><img src="<?php print HTTP_ENTRY?>/static/images/zjtd_tit1.png" /></dt>
                                <dd>挂号</dd>
                            </dl>
                            <dl class="zjtdbox1_d1">
                            	<dt><img src="<?php print HTTP_ENTRY?>/static/images/zjtd_tit2_1.png" /></dt>
                                <dd>图文</dd>
                            </dl>
                            <dl>
                            	<dt><img src="<?php print HTTP_ENTRY?>/static/images/zjtd_tit3.png" /></dt>
                                <dd>电话</dd>
                            </dl>
                        </div>
                  
                  
                  <div class="zjtdcon1box1_sm4 tc">
                  	<p><img src="<?php print HTTP_ENTRY?>/static/images/zjtd_tit4.png" /><b>9.9</b></p>
                    <p class="clr">预约量 <span>329</span>    问诊量 <span>暂无</span></p>
                  </div>
                 </div> 
             </div>
             <div class="blank20"></div>
              <!--zjtdcon1_box1 end-->
              
               <div class="clr">
               		
               
               <div class="wid680 fl">
               
                   
                   <div class="zjtd_box2 clr">
                        <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img4.jpg" class="fl" />
                        
                        <div class="zjtd_box2_sm1 fl">
                        
                        	<div class="zjtd_box2_sm2 clr">
                            	<div class="fl">
                                	<p>包皮手术、精索静脉曲张、成人疝气、阴茎延长、阴茎增粗、阴茎弯曲、尿道下裂、隐睾、睾丸囊肿、附睾囊肿、鞘膜积液 …<a href="" class="bule">[查看]</a></p>
                                    <p class="color9"> [ 患者提问：<span class="yellow">8137</span>问，陈希球本人已回复：<span class="yellow">8130</span>问 ]</p>
                                </div>
                                <a href="" class="fr tc">在线咨询</a>
                            </div>
                            
                            <div class="zjtd_box2_sm2 clr">
                            	<div class="fl">
                                	<p>直接和陈希球医生本人通话，私密安全！便捷！（本次通话免费，最长时间15分钟）</p>
                                    <p class="color9"> [ <span class="yellow">517</span>人已使用电话咨询服务，<span class="yellow">498</span>人已成功预约 ]</p>
                                </div>
                                <a href="" class="fr tc">一键通话</a>
                            </div>
                            
                            <div class="zjtd_box2_sm2 clr">
                            	<div class="fl">
                                	<p>包皮手术、精索静脉曲张、成人疝气、阴茎延长、阴茎增粗等生殖整形手术，阴茎增粗等生殖整形手术。</p>
                                    <p class="color9"> [ 已有<span class="yellow">382</span>位患者加号预约成功 ]</p>
                                </div>
                                <a href="" class="fr tc">申请加号</a>
                            </div>
                            
                        </div>
                        
                   </div>
                   
                   <div class="blank20"></div>
                   
                  <div class="norques border2">
                    <div class="zjtdwztit fz18"><span></span>陈希球文章列表</div>
                    <p class="blank20"></p>
                    
                    <div class="zjtd_box3">
                    	
                        <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt><img src="<?php print HTTP_ENTRY?>/static/images/bzdot.jpg" class="fl" /> 张江丑男爆丑被扣奖金，上海九龙男子医院伸出援手</dt>
                            <dd class="fr"><span class="color9">1208</span>	人已读  发表于2014-05-27</dd>
                            <p class="blank20"></p>
                        </dl>
                         <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt><img src="<?php print HTTP_ENTRY?>/static/images/bzdot.jpg" class="fl" /> 张江丑男爆丑被扣奖金，上海九龙男子医院伸出援手</dt>
                            <dd class="fr"><span class="color9">1208</span>	人已读  发表于2014-05-27</dd>
                            <p class="blank20"></p>
                        </dl>
                         <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt><img src="<?php print HTTP_ENTRY?>/static/images/bzdot.jpg" class="fl" /> 张江丑男爆丑被扣奖金，上海九龙男子医院伸出援手</dt>
                            <dd class="fr"><span class="color9">1208</span>	人已读  发表于2014-05-27</dd>
                            <p class="blank20"></p>
                        </dl>
                         <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt><img src="<?php print HTTP_ENTRY?>/static/images/bzdot.jpg" class="fl" /> 张江丑男爆丑被扣奖金，上海九龙男子医院伸出援手</dt>
                            <dd class="fr"><span class="color9">1208</span>	人已读  发表于2014-05-27</dd>
                            <p class="blank20"></p>
                        </dl>
                         <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt><img src="<?php print HTTP_ENTRY?>/static/images/bzdot.jpg" class="fl" /> 张江丑男爆丑被扣奖金，上海九龙男子医院伸出援手</dt>
                            <dd class="fr"><span class="color9">1208</span>	人已读  发表于2014-05-27</dd>
                            <p class="blank20"></p>
                        </dl>
                        
                        <div class="tc"><div class="blank20"></div><a href="" class="blue">查看全部文章(共574篇)</a></div>
                        
                    </div>
                    
                    
                  </div>
                  
                  
                  <div class="blank20"></div>
                  <div class="norques border2">
                    <div class="zjtdwztit fz18"><span></span>患者评价</div>

                    	
                    <div class="zjtd_box4 clr">
                      <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img5.png" class="fl" />
                      <div class="zjtd_box4_sm1 fr">
                          <dl>
                              <dt class="color9">
                                  <p class="fl" style=" width:250px;">疾病： <span class="color3">前列腺炎</span></p>
                                  <p class="fl" style=" width:250px;">满意度： <span class="yellow">很满意</span></p>
                              </dt>
                              <dd class=" fz15">谢谢医生，很有耐心，解答很及时，让我低落的心情好了很多，真的很感谢！</dd>
                              <dd class="color9">2016-04-05 19:00:19  来源： 前列腺炎</dd>
                          </dl>
                      </div>
                  </div>
                    
                    <div class="zjtd_box4 clr">
                      <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img5.png" class="fl" />
                      <div class="zjtd_box4_sm1 fr">
                          <dl>
                              <dt class="color9">
                                  <p class="fl" style=" width:250px;">疾病： <span class="color3">前列腺炎</span></p>
                                  <p class="fl" style=" width:250px;">满意度： <span class="yellow">很满意</span></p>
                              </dt>
                              <dd class=" fz15">谢谢医生，很有耐心，解答很及时，让我低落的心情好了很多，真的很感谢！</dd>
                              <dd class="color9">2016-04-05 19:00:19  来源： 前列腺炎</dd>
                          </dl>
                      </div>
                  </div>
                  
                  	<div class="zjtd_box4 clr">
                      <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img5.png" class="fl" />
                      <div class="zjtd_box4_sm1 fr">
                          <dl>
                              <dt class="color9">
                                  <p class="fl" style=" width:250px;">疾病： <span class="color3">前列腺炎</span></p>
                                  <p class="fl" style=" width:250px;">满意度： <span class="yellow">很满意</span></p>
                              </dt>
                              <dd class=" fz15">谢谢医生，很有耐心，解答很及时，让我低落的心情好了很多，真的很感谢！</dd>
                              <dd class="color9">2016-04-05 19:00:19  来源： 前列腺炎</dd>
                          </dl>
                      </div>
                  </div>
                     
                    <div class="zjtd_box4 clr">
                      <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img5.png" class="fl" />
                      <div class="zjtd_box4_sm1 fr">
                          <dl>
                              <dt class="color9">
                                  <p class="fl" style=" width:250px;">疾病： <span class="color3">前列腺炎</span></p>
                                  <p class="fl" style=" width:250px;">满意度： <span class="yellow">很满意</span></p>
                              </dt>
                              <dd class=" fz15">谢谢医生，很有耐心，解答很及时，让我低落的心情好了很多，真的很感谢！</dd>
                              <dd class="color9">2016-04-05 19:00:19  来源： 前列腺炎</dd>
                          </dl>
                      </div>
                  </div>
                    
                    <div class="zjtd_box4 clr">
                      <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img5.png" class="fl" />
                      <div class="zjtd_box4_sm1 fr">
                          <dl>
                              <dt class="color9">
                                  <p class="fl" style=" width:250px;">疾病： <span class="color3">前列腺炎</span></p>
                                  <p class="fl" style=" width:250px;">满意度： <span class="yellow">很满意</span></p>
                              </dt>
                              <dd class=" fz15">谢谢医生，很有耐心，解答很及时，让我低落的心情好了很多，真的很感谢！</dd>
                              <dd class="color9">2016-04-05 19:00:19  来源： 前列腺炎</dd>
                          </dl>
                      </div>
                  </div>
                  
                  	<div class="zjtd_box4 clr">
                      <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img5.png" class="fl" />
                      <div class="zjtd_box4_sm1 fr">
                          <dl>
                              <dt class="color9">
                                  <p class="fl" style=" width:250px;">疾病： <span class="color3">前列腺炎</span></p>
                                  <p class="fl" style=" width:250px;">满意度： <span class="yellow">很满意</span></p>
                              </dt>
                              <dd class=" fz15">谢谢医生，很有耐心，解答很及时，让我低落的心情好了很多，真的很感谢！</dd>
                              <dd class="color9">2016-04-05 19:00:19  来源： 前列腺炎</dd>
                          </dl>
                      </div>
                  </div>
                     
                    <div class="blank20"></div>  
                    <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
                     
                  </div>
                  <div class="blank20"></div>
                  
                  
                </div>
    		<!--left end-->
               
               
               
                
                <div class="fr wid300 fz13">
                  
                  <div class="syrbox2">
                    <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth1.jpg" width="300" height="100" /></p>
                    <p class="blank10"></p>
                    <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth2.jpg" width="300" height="100" /></p>
                    <p class="blank10"></p>
                    <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth3.jpg" width="300" height="100" /></p>
                  </div>
                  <div class="blank20"></div>
                  <div class="syrbox3 border2">
                    <div class="syrboxtit fz18 graybg">陈希球 &middot; 出诊时间</div>
                  	<div class="syrbox4nr zjtd_r1">
                        <div>
                        	<table cellpadding="0" cellspacing="0" border="0">
                        	<?php for($i=0;$i<3;$i++):?>
                            	<tr>
                            	<?php for($j=0;$j<7;$j++):?>
                            	<?php if(substr($m->data["duty"],$i * 7 + $j,1) == "0"):?>
                            	<td></td>
                            	<?php else:?>
                            	<td><img src="<?php print HTTP_ENTRY?>/static/images/zjtd_time<?php print substr($m->data["duty"],$i * 7 + $j,1)?>.jpg" /></td>
                            	<?php endif;?>
                            	<?php endfor;?>
                                </tr>
                             <?php endfor;?>
                            </table>
                        </div>
                        <p class="tc color9" style="margin:10px 0; line-height:20px;">注：所有门诊时间仅供参考，最终以医院当日公布为准。</p>
                        <p class="color6"><b class="color3">预约提示：</b>以下病情患者，可在官方网站预约我的预约加号：阴茎延长，精索静脉曲张、阴茎弯曲，<a href="" class="blue">免费申请→</a></p>
                    </div>
                  </div>
                  
                  <div class="blank20"></div>
                  <div class="syrbox4 border2">
                    <div class="syrboxtit fz18 graybg">预约挂号</div>
                    <div class="syrbox4nr fz13">
                      <form method="post" action="">
                        <table>
                          <tr>
                            <td height="26" width="62">姓      名</td>
                            <td><input class="input1 border2" type="text" /></td>
                          </tr>
                          <tr height="14">
                            <td></td>
                          </tr>
                          <tr>
                            <td width="62">联系电话</td>
                            <td><input class="input1 border2" type="text" /></td>
                          </tr>
                          <tr height="14" >
                            <td></td>
                          </tr>
                          <tr>
                            <td width="62">预约时间</td>
                            <td><input class="input2 gray border2" onclick="WdatePicker()" placeholder="请选择预约时间" type="text" /></td>
                          </tr>
                          <tr height="14" >
                            <td></td>
                          </tr>
                          <tr>
                            <td width="62">就诊状态</td>
                            <td><input type="radio" name="zd"  checked="checked" />
                              <label> 初诊</label>
                              <input class="input3" type="radio" name="zd" />
                              <label> 复诊</label></td>
                          </tr>
                          <tr height="14" >
                            <td></td>
                          </tr>
                        </table>
                        <div class="sybtn">
                          <button class="sybtn1" type="submit" value=""><img src="<?php print HTTP_ENTRY?>/static/images/syrth8.jpg" width="120" height="40" /></button>
                          <button value=""><img src="<?php print HTTP_ENTRY?>/static/images/syrth9.jpg" width="120" height="40" /></button>
                        </div>
                      </form>
                    </div>
                  </div>
                  <div class="blank20"></div>
                  <div class="syrbox5 border2">
                    <div class="syrboxtit fz18 graybg">陈希球医生的最新咨询<a href="" class="blue fz13 fr">+更多</a></div>
                    
                    <div class="zjtd_r2">
                    	<div class="blank10"></div>
                        <dl class="selected">
                          <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                        <dl>
                          <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                        <dl>
                         <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                        <dl>
                          <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                        <dl>
                          <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                        <dl>
                          <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                        <dl>
                          <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                        <dl>
                          <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                      </div>
                    
                    <div class="zjtd_r3 clr"><a href="">立刻咨询</a></div>
                    <div class="blank20"></div>
                  </div>
                </div>
                
                <!--right end-->
             </div>   
             
             <!--zjtdcon1_box2 end-->
             
             <div class="clr">
             	<div class="norques border2">
                    <div class="zjtdwztit fz18"><span></span>陈希球 &middot; 最新回复<a href="" class="fr fz13 blue">查看全部问答<img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img9.png" style="margin:2px 0 0 5px;" /></a></div>
                    <p class="blank20"></p>
                    
                    <div class="clr">
                    
                    	<div class="zjtd_box5 selected fl">
                        	<div class="zjtd_box5_sm1">
                                <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img10.png" />五六年了一直没宝宝，咨询下有什么好方法？  
                                <span class="color9 fz14">2015-10-23</span>
                            </div>
                            <div class="blank10"></div>
                        	<div class="zjtd_box5_sm2">
                            	<img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img11.png" class="fl" />
                                <div class="fr">
                                	<p class="color9 fz14">陈开亮，副主任医师  6秒前回复   </p>
                                    <p class="color6">男性不育的发病原因复杂，很多疾病或因素均可精液异常引起的，其原因很多，具体如下男性不育的发病原因复杂，很多疾病或因素均可…<a href="" class="blue">详细→</a></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="zjtd_box5 fr">
                        	<div class="zjtd_box5_sm1">
                                <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img10.png" />五六年了一直没宝宝，咨询下有什么好方法？  
                                <span class="color9 fz14">2015-10-23</span>
                            </div>
                            <div class="blank10"></div>
                        	<div class="zjtd_box5_sm2">
                            	<img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img11.png" class="fl" />
                                <div class="fr">
                                	<p class="color9">陈开亮，副主任医师  6秒前回复   </p>
                                    <p class="color6">男性不育的发病原因复杂，很多疾病或因素均可精液异常引起的，其原因很多，具体如下男性不育的发病原因复杂，很多疾病或因素均可…<a href="" class="blue">详细→</a></p>
                                </div>
                            </div>
                        </div>
                    	
                    </div>
                    
                </div>
             </div>
             
          </div>
          
          <!--zjtd_con1 end-->
      </div>
      
      <!--fromjb end-->
      
      <div class="blank20"></div>
      
    </div>
    <!--syboxl end-->
  </div>
  <!--sybox end-->
  