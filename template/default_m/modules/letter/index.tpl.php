<?php 
/**
 * @var letterModel;
 */
$m = $model;


?>

<div class="blank20"></div>
  <div id="focusindex">
    <ul class="index_banner_box clearfix">
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
    </ul>
  </div>
  <div class="blank20"></div>
  <div class="sybox clearfix">
    <div class="fl wid680">
      <div class="fromjb border1">
         <div class="fromtit fz18 black">按疾病找医生<span class="fz12 gray">By disease doctor</span></div>
        <div class="fromjbbox  clearfix">
          <div class="fromjbboxnr">
          
          	<?php foreach($tree_dis as $dis):?>
          
          	<dl class="clearfix fl">
              <dt class="fl tc orange fz15"><?php print str_replace("疾病","",$dis["text"])?><br />
                疾病</dt>
              <dd class="fr fz13">
              <?php foreach($dis["children"] as $sub_dis):?>
              <a href="<?php print AppUrl::disHomeByDiseasekey($sub_dis[1])?>"><?php print $sub_dis[0]?></a>
              <?php endforeach;?>
              
              </dd>
            </dl>
          	<?php endforeach;?>
            
          </div>
        </div>
      </div>
      
      <!--fromjb end-->
      <div class="blank20"></div>
      <div class="fromzxzj border1">
        <div class="fromtit fz18 black">咨询医生<span class="fz12 gray">Expert cvonsultants</span></div>
        <div class="fromzxzjbox">
          <div class="fromzxzjbox1 clearfix">
            <div class="fromzxzjbox1l fl"><a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;"><img src="<?php print HTTP_ENTRY?>/static/images/syask.gif" width="449" height="60" /></a></div>
            <div class="fromzxzjbox1r fr" id="topzj">
              <dl>
                <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/syaskzj.jpg" width="60" height="60" /></dt>
                <dd class="fl fz12">
                  <p><a class="blue">陈希球1</a> 副主任医师 </p>
                  <p>男科手术</p>
                  <p class="gray">今天</p>
                </dd>
              </dl>
              <dl>
                <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/syaskzj.jpg" width="60" height="60" /></dt>
                <dd class="fl fz12">
                  <p><a class="blue">陈希球2</a> 副主任医师 </p>
                  <p>男科手术</p>
                  <p class="gray">今天</p>
                </dd>
              </dl>
              <dl>
                <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/syaskzj.jpg" width="60" height="60" /></dt>
                <dd class="fl fz12">
                  <p><a class="blue">陈希球3</a> 副主任医师 </p>
                  <p>男科手术</p>
                  <p class="gray">今天</p>
                </dd>
              </dl>
            </div>
          </div>
          <div class="blank20"></div>
          <div class="fromzxzjbox2">
		  
		
		  
		  <?php
		  //echo "<pre>";
		//var_dump($m->getDoctors(5));
		  ?>
		   	<?php foreach($m->getDoctors(5) as $doc):?>
          
            <dl class="clearfix graybg">
              <dt class="fl"><a href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print HTTP_ENTRY?>/static/doctor/<?php print $doc["avatar"]?>" width="68" height="68" /></a></dt>
              <dd class="dd1 fl fz13">
                <p><a class="blue" href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><?php print $doc["name"]; ?></a> <?php print $doc["lv"]; ?></p>
                <p>上海九龙男子医院</p>
                <p> <?php print $doc["spec"]; ?></p>
              </dd>
			  <?php $askdata = $m->getAskQuestionByDod($doc["sid"])?>
			  <?php
			   if(!empty($askdata)):
			  ?>
              <dd class="dd2 fl">
                <p>
				<?php  print $askdata["title"]?></p>
                <p class="gray">最近通话<?php  print $askdata["date"]?></p>
                <p class="blue"><a href="">查看最新用户分享 >></a></p>
              </dd>
              <dd class="dd3 fr orange tc fz16"><a href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;">即刻预约</a></dd>
			  <?php endif;?>
            </dl>
          	<?php endforeach;?>
     
          
		  
		  	
		  
          </div>
        </div>
      </div>
      <!--fromzxzj end-->
      <div class="blank20"></div>
      <div class="fromtit fz18 black border1">网络咨询<span class="fz12 gray">On-line consulting</span></div>
      <div class="blank20"></div>
      <div class="fromwlzxbox">
        <ul class="fromwlzxtit tab_jb_nav fz13 clearfix">
        <?php for($i=0,$D=$m->getLv0Ask(),$I=count($D);$i<$I;$i++):?>
        <li<?php if($i==0):?> class="selected"<?php elseif($i == $I-1):?> class="last"<?php endif?>><?php print $D[$i]["data"]?></li>
        <?php endfor;?>
        </ul>
        <div class="fromwlzxboxnr tab_jb_switch">
        	<?php for($i=0;$i<$I;$i++):?>
        	<?php $data = $m->getQuestionsByLv0Did($D[$i]["sid"])?>
             <div class="wlzxnr tabcon fz13<?php if($i==0):?> selected<?php endif;?>">
	             <?php foreach ($data as $aitem):?>
	             <dl>
	              <dt class="fl">
	              	<a href="<?php print AppUrl::askByAsdDocid($aitem["dod"], $aitem["sid"])?>">
	              		<span class="fl">
	              			<?php print utility::utf8Substr($aitem["title"], 0, 30)?>
	              		</span>
	              	</a>
	              	<a href="<?php print AppUrl::docHomeByDod($aitem["dod"])?>">
	              		<span class="fr"><?php print $m->getNameByDod($aitem["dod"])?></span>
	              	</a>
	              </dt>
	              <dd class="fr gray"><a>回复</a></dd>
	            </dl>
	             <?php endforeach;?>
          	</div>     	
        	<?php endfor;?>
          </div>
      </div>
      
      <!--fromwlzx end-->
      <div class="blank20"></div>
      <div class="fromtit fz18 black border1 clearfix">经验分享<span class="fz12 gray">Experience sharing</span><span class="fr fz13 gray">把感谢信送给九龙，把经验留给患友！</span></div>
      <div class="blank20"></div>
      <div class="fromjyfx clearfix">
        <div class="fromjyfxl fl">
          <div class="fromjyfxlt fz16">
            <p>患者评价</p>
          </div>
          <div class="fromjyfxlc">
          
          	<?php foreach($m->getAppraise(3) as $app):?>
          	
          	
            <dl class="fz13">
              <dt><span class="gray">疾病：</span> <span class="blue"><a href="<?php print AppUrl::disHomeByDid($app["did"])?>"><?php print $m->getNameByDid($app["did"])?></a></span></dt>
                <dd><?php print $app["txt"]?>
                <p class="clr"><font class="fl"><span class="gray">满意度： </span><span class="yellow"><?php print $m->getAppMeta($app["lv"])?></span></font>
                <font class="fr"><span class="gray">接诊医生：</span><span class="blue"><a href="<?php print AppUrl::docHomeByDod($app["dod"])?>"><?php print $m->getNameByDod($app["dod"])?></a></span></font></p></dd>
            </dl>
			<?php endforeach;?>
            <div class="fromjyfxlb fromjyfxbsm fz12"><a class="blue" href="<?php print AppUrl::appraisePut()?>">我要对医生评价</a></div>
          </div>
        </div>
        <div class="fromjyfxr fr">
          <div class="fromjyfxrt fz16">
            <p><strong class="orange"><?php print $m->getLetterCnt()?></strong> 封感谢信</p>
          </div>
          <div class="fromjyfxrc">
          	<?php foreach ($m->getLetter(3) as $let):?>
            <dl class="fz13">
              <dt><span class="orange">感谢<?php print $m->getNameByDod($let["dod"])?>医生</span></dt>
              <dd><?php print $m->utf8cut($let["content"],0,64)?>...<a class="black" href="<?php print AppUrl::docLetterByDodLed($let["dod"], $let["sid"])?>">看详情>></a></dd>
            </dl>
			<?php endforeach;?>
            <div class="fromjyfxrb fromjyfxbsm fz12"><a class="orange" href="">写感谢信给医生</a></div>
          </div>
        </div>
      </div>
    </div>
    <!--syboxl end-->
    <div class="fr wid300 fz13">
      <div class="syrbox1 clearfix">
        <dl class="dll dl1">
          <a href="">
          <dt></dt>
          <dd>门诊流程</dd>
          </a>
        </dl>
        <dl class="dl2">
          <a href="">
          <dt></dt>
          <dd>住院须知</dd>
          </a>
        </dl>
        <dl class="dl3">
          <a href="">
          <dt></dt>
          <dd>预约服务</dd>
          </a>
        </dl>
        <dl class="dll dl4">
          <a href="">
          <dt></dt>
          <dd>预约挂号</dd>
          </a>
        </dl>
        <dl class="dl5">
          <a href="">
          <dt></dt>
          <dd>隐私声明</dd>
          </a>
        </dl>
        <dl class="dl6">
          <a href="">
          <dt></dt>
          <dd>先进设备</dd>
          </a>
        </dl>
        <dl class="dll dl7">
          <a href="">
          <dt></dt>
          <dd>投诉与建议</dd>
          </a>
        </dl>
        <dl class="dl8">
          <a href="">
          <dt></dt>
          <dd>价格与收费</dd>
          </a>
        </dl>
        <dl class="dl9">
          <a href="">
          <dt></dt>
          <dd class="">就诊环境</dd>
          </a>
        </dl>
      </div>
      <div class="blank20"></div>
      <div class="syrbox2">
        <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth1.jpg" width="300" height="100" /></p>
        <p class="blank10"></p>
        <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth2.jpg" width="300" height="100" /></p>
        <p class="blank10"></p>
        <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth3.jpg" width="300" height="100" /></p>
      </div>
      <div class="blank20"></div>
      <div class="syrbox3 border2">
        <div class="syrboxtit fz18 graybg">热门文章</div>
        <div class="syrbox3nr fz13">
          <ul>
            <li><a href="">早日摆脱前列腺增生的困扰 </a></li>
            <li><a href="">早日摆脱前列腺增生的困扰 </a></li>
            <li><a href="">早日摆脱前列腺增生的困扰 </a></li>
            <li><a href="">早日摆脱前列腺增生的困扰 </a></li>
            <li><a href="">早日摆脱前列腺增生的困扰 </a></li>
            <li><a href="">早日摆脱前列腺增生的困扰 </a></li>
            <li><a href="">早日摆脱前列腺增生的困扰 </a></li>
            <li><a href="">早日摆脱前列腺增生的困扰 </a></li>
            <li><a href="">早日摆脱前列腺增生的困扰 </a></li>
            <li><a href="">早日摆脱前列腺增生的困扰 </a></li>
          </ul>
        </div>
      </div>
      <div class="blank20"></div>
      <div><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/syrth4.jpg" width="300" height="90" /></a></div>
      <div class="blank20"></div>
      <div><img src="<?php print HTTP_ENTRY?>/static/images/syrth5.jpg" /></div>
      <div><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/syrth6.jpg" /></a></div>
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
        <div class="syrboxtit fz18 graybg">大家都在送什么?</div>
        <div class="syrbox5nr">
          <div class="syrbox5nr_1" id="toplw">
            <dl class="clearfix" >
              <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/syrth10.jpg" width="61" height="57" /></dt>
              <dd class="fl">
                <p class="ddp1"><strong>陈希球</strong>医生收到了<strong>h***</strong>精心挑选的礼物<strong>医患同心</strong>医生爱心值+100</p>
                <p class="ddp2 fr blue"><a href="">我也要送</a></p>
              </dd>
            </dl>
            <dl class="clearfix" >
              <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/syrth10.jpg" width="61" height="57" /></dt>
              <dd class="fl">
                <p class="ddp1"><strong>陈希球</strong>医生收到了<strong>h***</strong>精心挑选的礼物<strong>医患同心</strong>医生爱心值+100</p>
                <p class="ddp2 fr blue"><a href="">我也要送</a></p>
              </dd>
            </dl>
            <dl class="clearfix" >
              <dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/syrth10.jpg" width="61" height="57" /></dt>
              <dd class="fl">
                <p class="ddp1"><strong>陈希球</strong>医生收到了<strong>h***</strong>精心挑选的礼物<strong>医患同心</strong>医生爱心值+100</p>
                <p class="ddp2 fr blue"><a href="">我也要送</a></p>
              </dd>
            </dl>
          </div>
          <div class="blank10"></div>
          <div class="fz13">共有<em class="orange">7,572</em>位患者送出<em class="orange">95,756</em>件礼物，下一个是你么? 我也要送</div>
          <div class="blank10"></div>
          <div class="syrbox5nr_3 clearfix"><a href="" class="fl blue">什么是“心意礼物”？</a><a class="fr" href=""><img src="<?php print HTTP_ENTRY?>/static/images/syrth11.jpg" width="80" height="26" /></a></div>
        </div>
      </div>
    </div>
    <!--syboxr end--> 
  </div>
  <div class="blank20"></div>
  <!--sybox end-->
  
  <div class="jgdwbox">
    <div class="jgdwboxtit fz18 gray clearfix">
      <ul>
        <li class="selected">监管单位</li>
        <li>友情链接</li>
      </ul>
    </div>
    <div class="jgdwboxnr">
      <div class="tabconjg selected"><img src="<?php print HTTP_ENTRY?>/static/images/jgdw1.jpg" width="970" height="85" /></div>
      <div class="tabconjg">上海九龙男子医院</div>
    </div>
  </div>