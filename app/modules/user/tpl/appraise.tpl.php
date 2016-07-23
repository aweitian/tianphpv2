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
  <div class="con_tit fz13">当前位置：<a href="">首页</a> > 会员中心</div>
  
  <div class="blank15"></div>
  
  
  <div class="clr">
  	<?php include dirname(__FILE__)."/common/left.tpl.php";?>
    
    <div class="fr border2 wid738 memer_box2">

        <dl class="clr">
            <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/hy_ln3.png" /></dt>
            <dd class="fl">
                <p class="fz24">我写的评价 </p>
                <p class="blank10"></p>
            </dd>
        </dl>
        <div class="memer_box3">
        	<?php $data = $model->getDataByUid(5,0)?>
        	<?php if(count($data)):?>
            <table cellpadding="0" cellspacing="0" border="0">
            	<tr class="tbtr1">
                	<th width="329px">内容</th>
                    <th width="86px">医生</th>
                    <th width="125">时间</th>
                    <th width="54px">通过</th>
                    <th width="80px">操 作</th>
                </tr>
                <?php foreach($data as $q):?>
                <tr>
                	<td class="tbtd1 color3 line24"><?php print utility::utf8Substr(strip_tags($q["content"]),0,16) ?></td>
                    <td class="color9"><a style="text-decoration: underline" href="<?php print AppUrl::docHomeByDod($q["dod"])?>"><?php print $model->getDocNameByDod($q["dod"])?></a></td>
                    <td class="color9"><?php print $q["date"]?></td>
                    <td class="green"><?php if($q["verify"]):?>是<?php else:?>待审核<?php endif?></td>
                    <td class="tbtd2"><?php if(!$q["verify"]):?><a onclick='return confirm("?")' href="<?php print AppUrl::userRemoveLetter()?>?sid=<?php print $q["sid"]?>">删除</a><?php endif?></td>
                </tr>
 				<?php endforeach;?>
            </table>
           <?php else:?> 
           		您还没有写过感谢信，<a class="dgreen" href="<?php print AppUrl::userWriteLetter()?>">现在就写</a>
           <?php endif?>
        </div>
        
    </div>
    
  </div>
  
  <div class="blank40"></div>
  <!--sybox end-->
  