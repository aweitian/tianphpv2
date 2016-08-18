<?php
/**
 * @Author: zhangsihang
 * @Date: 2016年8月18日
 */
$userinfo = AppUser::getInstance()->auth->getInfo();
?>
  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="/">首页</a> > 会员中心</div>
  
  <div class="blank15"></div>
  
  
  <div class="clr">
  	<?php include dirname(__FILE__)."/common/left.tpl.php";?>
    
    <div class="fr border2 wid738 memer_box2">

        <dl class="clr">
            <dt class="fl" style="margin-top:10px;"><img src="<?php print AppUrl::getMediaPath()?>/images/hyfr_img3.png" /></dt>
            <dd class="fl">
                <p class="fz24">心意礼物 </p>
                <p class="blank10"></p>
                <p class="fz13">5个医生  5份心意</p>
            </dd>
        </dl>
        <div class="memer_box3">
        	
            <table cellpadding="0" cellspacing="0" border="0">
            	<tr class="tbtr1">
                    <th width="135px">时间</th>
                    <th width="135">医生</th>
                    <th width="135px">礼物</th>
                    <th width="135px">礼物名称</th>
                    <th width="134px">数量</th>
                </tr>
                
                <tr>
                	<td class="color9">2016.06.04</td>
                    <td class="color6">陈希球</td>
                    <td><img src="images/mer_img1.png" /></td>
                    <td class="fhs">一点心意</td>
                    <td class="fhs">3</td>
                </tr>
                
                <tr>
                	<td class="color9">2016.06.04</td>
                    <td class="color6">陈希球</td>
                    <td><img src="images/mer_img2.png" /></td>
                    <td class="fhs">医患同心</td>
                    <td class="fhs">3</td>
                </tr>
                
                <tr>
                	<td class="color9">2016.06.04</td>
                    <td class="color6">陈希球</td>
                    <td><img src="images/mer_img3.png" /></td>
                    <td class="fhs">诚心诚意</td>
                    <td class="fhs">3</td>
                </tr>
                
                <tr>
                	<td class="color9">2016.06.04</td>
                    <td class="color6">陈希球</td>
                    <td><img src="images/mer_img4.png" /></td>
                    <td class="fhs">心意多多</td>
                    <td class="fhs">3</td>
                </tr>
                
                <tr>
                	<td class="color9">2016.06.04</td>
                    <td class="color6">陈希球</td>
                    <td><img src="images/mer_img5.png" /></td>
                    <td class="fhs">赞</td>
                    <td class="fhs">3</td>
                </tr>
                
            </table>
            
        </div>
        
    </div>
    
  </div>
  
  <div class="blank40"></div>