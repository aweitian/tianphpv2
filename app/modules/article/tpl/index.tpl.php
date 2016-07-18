<?php 
/**
 * Sihangzhang
 * @var articleModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;

$tree_dis = array();
foreach ($m->getDisease() as $item){
	if(!array_key_exists($item["pid"], $tree_dis)){
		$tree_dis[$item["pid"]] = array(
			"text" => $item["pd"],
			"children" => array()
		);
	}
	$tree_dis[$item["pid"]]["children"][$item["mid"]] = array($item["md"],$item["url"]);
}
 




// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
?>
  <div class="blank20"></div>
  <div id="focusindex">
    <ul class="index_banner_box clearfix">
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
    </ul>
  </div>
  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a href="">首页</a> > <a href="">专题列表</a></div>
  
  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
      	
        
          
          <div class="fz13">
                
               <div class="clr">
               
               	<div class="wid680 fl">
                    <div class="padd20 border2">
                    
                    	<dl class="clr zt_box1">
                        	<dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/zt_img1.jpg" /></dt>
                            <dd class="fl">
                            	<b class="fz18 color3">阿拉伯兄弟来上海九龙男子医院参观交流</b>
                                <p class="color9">2014年12月20日，印上海九龙男子医院迎来了几位特殊的客人——阿拉伯兄弟，来我院参观交流，并接受九龙先进的设备仪器检查身体。阿拉伯兄弟对我院的规模环境、人才配备、管理模式等相关情况做了详细了解...<a href="" class="bule">[查看全文]</a></p>
                            </dd>
                        </dl>
                    
                        <div class="blank20"></div>
                        <div class="clr jb_box2">
                        
                        	<div class="zt_box2 fl" style="padding-right:30px; border-bottom:1px dotted #d7d7d7;">
                            
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/syhot1.jpg" /></span>
                                    	<p class="fr">国际成人展开幕，上海九龙男子医院引领两性健康正能量...</p>
                                </div>
                                <div class="blank15"></div>
                            </div>
                            
                            <div class="zt_box2 fr" style="padding-left:15px; border-left:1px dotted #d7d7d7; border-bottom:1px dotted #d7d7d7;">
                            
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/syhot1.jpg" /></span>
                                    	<p class="fr">国际成人展开幕，上海九龙男子医院引领两性健康正能量...</p>
                                </div>
                                <div class="blank15"></div>
                            </div>
                            
                            <div class="zt_box2 fl" style="width:290px; padding-right:30px;">
                            	<div class="blank15"></div>
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/syhot1.jpg" /></span>
                                    	<p class="fr">国际成人展开幕，上海九龙男子医院引领两性健康正能量...</p>
                                </div>
                                <div class="blank15"></div>
                                
                            </div>
                            
                            <div class="zt_box2 fr" style="width:290px; padding-left:20px; border-left:1px dotted #d7d7d7;">
                            	<div class="blank15"></div>
                            	<div class=" clr">
                                	<span class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/syhot1.jpg" /></span>
                                    	<p class="fr">国际成人展开幕，上海九龙男子医院引领两性健康正能量...</p>
                                </div>
                                <div class="blank15"></div>
                            </div>
                            
                        </div>
                        <div class="blank20"></div>
                        <div class="hx"></div>
                        <div class="blank20"></div>
                        
                        <div class="zt_box3">
                        	
                            <ul class="clr">
                            	<li>
                                	<a href="">阿拉伯兄弟来上海九龙男子医院参观交流</a>
                                    <p>2014年12月20日，印上海九龙男子医院迎来了几位特殊的客人——阿拉伯兄弟，来我院参观交流...</p>
                                </li>
                                <li class="ztbox3_bg">
                                	<a href="">阿拉伯兄弟来上海九龙男子医院参观交流</a>
                                    <p>2014年12月20日，印上海九龙男子医院迎来了几位特殊的客人——阿拉伯兄弟，来我院参观交流...</p>
                                </li>
                                
                                <li>
                                	<a href="">阿拉伯兄弟来上海九龙男子医院参观交流</a>
                                    <p>2014年12月20日，印上海九龙男子医院迎来了几位特殊的客人——阿拉伯兄弟，来我院参观交流...</p>
                                </li>
                                <li class="ztbox3_bg">
                                	<a href="">阿拉伯兄弟来上海九龙男子医院参观交流</a>
                                    <p>2014年12月20日，印上海九龙男子医院迎来了几位特殊的客人——阿拉伯兄弟，来我院参观交流...</p>
                                </li>
                                
                                <li>
                                	<a href="">阿拉伯兄弟来上海九龙男子医院参观交流</a>
                                    <p>2014年12月20日，印上海九龙男子医院迎来了几位特殊的客人——阿拉伯兄弟，来我院参观交流...</p>
                                </li>
                                <li class="ztbox3_bg">
                                	<a href="">阿拉伯兄弟来上海九龙男子医院参观交流</a>
                                    <p>2014年12月20日，印上海九龙男子医院迎来了几位特殊的客人——阿拉伯兄弟，来我院参观交流...</p>
                                </li>
                                
                                <li>
                                	<a href="">阿拉伯兄弟来上海九龙男子医院参观交流</a>
                                    <p>2014年12月20日，印上海九龙男子医院迎来了几位特殊的客人——阿拉伯兄弟，来我院参观交流...</p>
                                </li>
                                <li class="ztbox3_bg">
                                	<a href="">阿拉伯兄弟来上海九龙男子医院参观交流</a>
                                    <p>2014年12月20日，印上海九龙男子医院迎来了几位特殊的客人——阿拉伯兄弟，来我院参观交流...</p>
                                </li>
                            </ul>
                            
                        </div>
                        
                        <div class="blank35"></div>
                        <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
                	</div>
                </div>
               
               
    			<!--left end-->
                
                <div class="fr wid300 fz13">
                	
                    <div class="doctj border2">
    
    <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师推荐</a><a class="fz13 blue fr" href="<?php print AppUrl::navDoctors() ?>">+更多</a></div>
    <div class="doctjbox">
    
        <?php foreach($m->getDoctors(3) as $doc):?>
      <dl class="clearfix"><dt class="fl"><a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print HTTP_ENTRY?>/static/doctor/<?php print $doc["avatar"]?>" width="80" height="80" /></a></dt>
      <dd class="fl">
      <p class="blank5"></p>
      <p class="fz18"><?php print $doc["name"]; ?><span class="gray fz13"><?php print $doc["lv"]; ?></span></p>
      <p class="blank5"></p>
      <p class="fz13 gray">擅长：<?php print $doc["spec"]; ?></p>
      <p class="blank5"></p>
      <p class="p3 tc"><a href="<?php print AppUrl::getSwtUrl()?>">咨询</a></p>
      </dd></dl>
      	<?php endforeach;?>

      
      </div>
    
    
    
    </div>
                      
                  <div class="blank20"></div>

                    <div class="syrbox5 border2">
                    <div class="syrboxtit fz18 graybg">相关问答<a href="<?php print AppUrl::navAsk() ?>" class="blue fz13 fr">+更多</a></div>
                    
                    <div class="zjtd_r2">
                    	<div class="blank10"></div>
                    	
                     <?php $y=1;?>	
                    	<?php $asks = $m->getAllQuestions(0,4);foreach($asks["data"] as $ask):?>
                        <dl <?php if($y==1){?> class="selected"<?php } ?> >
                          <dt class="fz18 blue"><a href=""><?php print $ask["title"]?></a></dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl"><?php $content = $m->getAnswerByAskid($ask["sid"]); print empty($content) ? "" :$content["content"]?>...</p>
                          </dd>
                        </dl>
                   <?php $y++;?>      
<?php endforeach;?>
                        
                      </div>
                    
                    <div class="zjtd_r3 clr"><a href="">立刻咨询</a></div>
                    <div class="blank20"></div>
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
  