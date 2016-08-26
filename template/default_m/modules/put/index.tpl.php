<?php
/**
 * @var putModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;

$this->title = "咨询医院在线医生_咨询专家_上海九龙男子医院";
$this->description = "";
$this->keyword = "";


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
?>
<div class="public_width">


<?php $disease_header_title = "在线咨询";?>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/header.tc.php"?>

<div class="mzy30">
	<form name="gh" onSubmit="return chk(this)" action="<?php print AppUrl::navPut()?>" method="post">
        <div class="blank30"></div>
        <div class="yam_sm1 clr color3">您哪里不舒服 </div>
        <div class="blank25"></div>
        <input type="text" class="iptbr" placeholder="请用简单描述您的问题..." name="title" />
        <div class="blank50"></div>
        <div class="yam_sm1 clr color3">选择医生</div>
        <div class="blank25"></div>
        <div class="blank20"></div>
		<div class="yuy_warp bor_rad borddd clr">
        <select name="d">
            <option value="0">选择医生</option>
        	<?php foreach($model->getAllDoc() as $doc):?>
			<option value="<?php print $doc["sid"]?>"><?php print $doc["name"]?></option>
			<?php endforeach;?>
        </select>
        </div>
        <div class="blank50"></div>
        <div class="yam_sm1 clr color3">选择疾病分类</div>
        <div class="blank25"></div>
        <div class="blank20"></div>
		<div class="yuy_warp bor_rad borddd clr">
        <select name="j">
        	<option value="0">请选择</option>
            <?php foreach($model->getLv0KeyInfoes() as $xbz):?>   	
            <option value="<?php print $xbz["sid"] ?>"><?php print $xbz["data"] ?></option>     
            <?php endforeach;?>
        </select>
        </div>
    <div class="blank20"></div>
	<div class="yam_sm1 clr color3">请详细描述您的病情</div>
    <div class="blank20"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <textarea placeholder="描述越详细，医生回复质量越高" name="desc"></textarea>
    </div>
    <div class="blank20"></div>
	<div class="yam_sm1 clr color3">想要得到哪些帮助？</div>
    <div class="blank20"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <textarea placeholder="描述越详细，医生回复质量越高" style="height:1.7rem;" name="svr"></textarea>
    </div>
    <div class="blank30"></div>
    <?php if(AppUser::getInstance()->auth->isLogined()):?>       
    <button class="login_dl bor_rad yellow_bg" type="submit">提交给医生</button>
    <?php else:?>       
    <button class="login_dl bor_rad yellow_bg hui"  type="submit">请登陆后再提交</button>
    <?php endif?>
    <div class="blank30"></div>
</div>

</form>

  
<div class="blank30"></div>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom.tpl.php";?>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom_fd_sub.tpl.php";?>
</div>
  
