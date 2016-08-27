<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网上挂号_上海九龙男子医院</title>
<link href="<?php print AppUrl::getMediaPath()?>/css/style.css" rel="stylesheet" />
<script src="<?php print AppUrl::getMediaPath()?>/js/jquery.js"></script>

<script src="<?php print AppUrl::getMediaPath()?>/js/calendar/WdatePicker.js"></script>
</head>



<body>
<div class="ghhead clearfix tc"><img src="<?php print AppUrl::getMediaPath()?>/images/ghlogo.png" width="509" height="37" alt="上海九龙男子医院-官方在线自助挂号平台" /></div>
<div class="wid1000">
  <div class="location">当前位置：<a <?php print App::useTarget()?> href="<?php print AppUrl::navHome()?>" class="blue">首页</a> > <a href="<?php print AppUrl::navSubscribe()?>" class="blue">预约挂号</a></div>
  <div class="gdcontent border2 clearfix">
    <div class="ghLeft">
      <div class="ghbt">预约挂号平台</div>
      <div class="online_form">
      <script src="<?php print AppUrl::getMediaPath()?>/js/guahao.js"></script>
       <form name="form1"  accept-charset="gb2312" onSubmit="return guahao()" action="http://swt.gssmart.com/guahao/sockt.php" method="post"  >
       
          <p class="fl">
            <label for="name">姓&#12288;&#12288;名：</label>
            <input type="text" class="validation" title="请输入患者姓名" name="名称"  id="name">
          </p>
          <p class="fr">
            <label>性&#12288;&#12288;别：</label>
            <input type="radio" checked="checked"  value="男" name="年龄" class="online_sex">
            男
            <input type="radio" value="女" name="年龄" class="online_sex">
            女 </p>
          <p class="fl">
            <label for="age">年&#12288;&#12288;龄：</label>
            <input type="text" name="年龄"  id="age">
          </p>
          <p class="fr">
            <label for="tel">联系电话：</label>
            <input type="text" class="validation" title="请输入联系电话" name="电话"  id="hometel">
            
          </p>
          <p class="fl">
            <label for="keshi">预约医院：</label>
            <select class="validation"  name="sectionid" id="keshi">
              <option value="">上海九龙男子医院</option>
              
            </select>
          </p>
          <p class="fr">
            <label for="expert">预约医师：</label>
            <select class="validation"    name="d" id="zj">
              <option  value="0">请选择医师</option>
               <?php foreach($model->getAllDoc() as $doc):?>
						<option value="<?php print $doc["sid"]?>"><?php print $doc["name"]?></option>
						<?php endforeach;?>
            </select>
          </p>
          <p class="fl">
            <label for="diseases">选择病种：</label>
            <select class="validation" title="请选择预约病种" id="diseases" name="j">
              <option value="0">请选择病种</option>
                <?php foreach($model->getLv0KeyInfoes() as $xbz):?>   	
              
                  
                    
                       	<option value="<?php print $xbz["sid"] ?>"><?php print $xbz["data"] ?></option>     
            <?php endforeach;?>
					
            </select>
          </p>
          <p class="fr">
            <label for="time">预约时间：</label>
            <input type="text" class="validation gray" title="请输入预约时间" onclick="WdatePicker();" id="yudate" name="预约时间">
          
            <i class="date_icon"></i> </p>
          <div class="clr"></div>
          <div class="form_describe">
            <label for="describe">病情描述：</label>
            <textarea name="病情描述" id="desc"></textarea>
          </div>
          <div class="clr"></div>
          <div class="ghbtn">
            <input type="submit" value="确定" class="btn_sub">
            <input type="reset" value="重置" class="btn_res">
          </div>
        </form>
      </div>
    
      <div class="ghbt">其它方式挂号</div>
      <div class="ghfs">
        <img src="<?php print AppUrl::getMediaPath()?>/images/ghp1.png" width="28" height="27" class="ghfl" />
        <h5>官方预约电话：<span>021-52733999</span></h5>
        <form name="myform" action="http://swt.gssmart.com/send/index.php" method="POST">
	  <input type="hidden" name="content" value="上海九龙男子医院提醒：男科疾病要提早治疗，具体诊疗请在医生指导下进行！咨询电话：02152729299-退订回T【上海九龙男子医院】">
	
	
	
        
        
        <p><input name="tel" type="text" class="ghbd"  placeholder="请输入您的电话号码" /><input name="" value="" type="submit" class="ghan" /></p>
        </form>
      </div>
      <div class="ghfs ml20">
        <img src="<?php print AppUrl::getMediaPath()?>/images/ghp2.png" width="28" height="27" class="ghfl" />
        <dl>
          <dt class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/ghkf.jpg" width="135" height="68" /></dt>
          <dd>
            <h5>在线客服挂号</h5>
            <a href="<?php print AppUrl::getSwtUrl()?>" onclick="openZoosUrl();return false;" ><img src="<?php print AppUrl::getMediaPath()?>/images/djgh.png" /></a>
          </dd>
        </dl>
      </div>
    </div>
    <div class="ghRight">
      <h4 class="fz24 blue">温馨提示：</h4>
      <p>1、请准确填写您的联系方式，以便我们与您联系。<br />
        <br />
        2、由于每天医师门诊人数较多，为了给您提供更优质的服务，建议您提前预约。<br />
        <br />
       
        3、到诊时，在导医台核对您的预约编号、姓名及联系方式，然后直接找医师就诊。<br />
        <br />
        4、如因某些原因使您无法按时到诊，请及时取消或通知我院变更预约信息。</p>
    </div>
  </div>
</div>
<?php include dirname(dirname(dirname(__FILE__)))."/footer.tpl.php"?>

</body>

</html>