<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月21日
 * @Desc: 
 * 依赖:
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
            <dt class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/hyfr_img1.png" /></dt>
            <dd class="fl">
                <p class="fz24">我的提问</p>
                <p class="blank10"></p>
                <p class="fz13">5条</p>
            </dd>
        </dl>
        <div class="memer_box3">
        	
            <table cellpadding="0" cellspacing="0" border="0">
            	<tr class="tbtr1">
                	<th width="329px">提问内容</th>
                    <th width="86px">医生</th>
                    <th width="125">时间</th>
                    <th width="54px">通过</th>
                    <th width="80px">操 作</th>
                </tr>
                <tr>
                	<td class="tbtd1 color3">为什么我运动时候尿液会自动排出呢？</td>
                    <td class="color9">陈希球</td>
                    <td class="color9">2016.06.04</td>
                    <td class="green">是</td>
                    <td class="tbtd2"><a href="">删除</a></td>
                </tr>
                <tr>
                	<td class="tbtd1 color3">为什么我运动时候尿液会自动排出呢？</td>
                    <td class="color9">陈希球</td>
                    <td class="color9">2016.06.04</td>
                    <td class="fhs">否</td>
                    <td class="tbtd2"><a href="">编辑</a></td>
                </tr>
                <tr>
                	<td class="tbtd1 color3">为什么我运动时候尿液会自动排出呢？</td>
                    <td class="color9">陈希球</td>
                    <td class="color9">2016.06.04</td>
                    <td class="fhs">否</td>
                    <td class="tbtd2"><a href="">编辑</a></td>
                </tr>
                <tr>
                	<td class="tbtd1 color3">为什么我运动时候尿液会自动排出呢？</td>
                    <td class="color9">陈希球</td>
                    <td class="color9">2016.06.04</td>
                    <td class="green">是</td>
                    <td class="tbtd2"><a href="">删除</a></td>
                </tr>
                <tr>
                	<td class="tbtd1 color3">为什么我运动时候尿液会自动排出呢？</td>
                    <td class="color9">陈希球</td>
                    <td class="color9">2016.06.04</td>
                    <td class="green">是</td>
                    <td class="tbtd2"><a href="">删除</a></td>
                </tr>
            </table>
            
        </div>
        
    </div>
    
  </div>
  
  <div class="blank40"></div>
  <!--sybox end-->
  