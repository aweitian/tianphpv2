
<div class="footernav fz13">
    <ul class="clearfix tc">
      <a<?php print App::useTarget()?> href="<?php print AppUrl::process() ?>">门诊流程</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::notice() ?>">住院须知</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl()?>" onClick="openZoosUrl();return false;">预约服务</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::navSubscribe()?>">预约挂号</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::policy() ?>">隐私声明</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::navDoctors() ?>">医护团队</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::navAsk() ?>">疾病问答</a> <a<?php print App::useTarget()?> href="<?php print AppUrl::guide()?>">价格与收费</a> <a<?php print App::useTarget()?> class="nobor" href="<?php print Appurl::environment() ?>">就诊环境</a>
    </ul>
  </div>
  <div class="footerloc fz13 tc">地址：上海市长宁区中山西路333号（近中山公园）  沪ICP备14017357号-1 沪卫（中医）网复审【2014】第10045号　网站统计</div>

  
 
  
  
<?php if(AppModule::$moduleName == "default" && appCtrl::$msg->getControl() == "main"):?>
	<?php if(SWT_OPEN):?>
	<script type="text/javascript" src="<?php print AppUrl::getMediaPath()?>/swt/indexbottomswt.js"></script>
	<?php endif?>
<?php endif;?>

<?php 
// $doc_id=$this->model->data["id"];
// $doc_name=$this->model->data["name"];
// $doc_lv=$this->model->data["lv"];
// $doc_desc=$this->model->data["desc"];
// $doc_spec=$this->model->data["spec"];

?>	



<?php if (AppModule::$moduleName == "doctor"):?>
<?php include (dirname(__FILE__))."/swt/bottom_swt.tpl.php";?>
<?php endif?>

<?php if (AppModule::$moduleName !== "default" || appCtrl::$msg->getControl() !== "user"):?>

<?php if(SWT_OPEN):?>
<script type="text/javascript" src="<?php print AppUrl::swtjs()?>?m=<?php print AppModule::$moduleName?><?php if(AppModule::$moduleName == "doctor")print '&n='.$this->model->data["id"]?><?php /*if(AppModule::$moduleName == "default" && appCtrl::$msg->getControl()=="main")print '&c=m'*/?>"></script>
<?php endif?>
<?php endif?>

<script src="<?php print AppUrl::getMediaPath()?>/js/topscroll.js"></script>
 
