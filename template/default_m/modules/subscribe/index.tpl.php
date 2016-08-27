<?php 
/**
 * @var subscribeModel;
 */

$m = $model;
$this->title = "网上挂号_上海九龙男子医院";
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

<?php $disease_header_title = "预约挂号"?>
	<?php include dirname(dirname(dirname(__FILE__)))."/inc/header.tc.php"?>

<!--head end-->
<script src="<?php print AppUrl::getMediaPath()?>/js/guahao.js"></script>
<form name="form1" accept-charset="gb2312" action="http://swt.gssmart.com/guahao/sockt.php" method="post" onSubmit="return guahao()" >
<div class="mzy30">
	<div class="blank30"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <label class="fl" style="width:1.5rem;">您的姓名：</label>
        <input type="text" name="名称" id="name"  class="fl" style="width:3.6rem;" />
    </div>
    <div class="blank20"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <label class="fl" style="width:1.5rem;">您的年龄：</label>
        <input type="text" name="年龄" id="age" class="fl" style="width:3.6rem;" />
    </div>
    <div class="blank20"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <label class="fl" style="width:2.1rem;">您的手机号码：</label>
        <input type="text" id="hometel" name="电话"  class="fl" style="width:3rem;" />
    </div>
    
    <div class="blank20"></div>
	<div class="yuy_warp bor_rad borddd clr">
        <select name="d" id="zj">
            <option value="0">选择医生</option>
            <?php foreach($model->getAllDoc() as $doc):?>
        	<option value="<?php print $doc["sid"]?>"><?php print $doc["name"]; ?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="blank20"></div>
    <div class="yuy_warp bor_rad borddd clr">
        <textarea placeholder="病情描述：" name="病情描述" id="desc"></textarea>
    </div>
    <div class="blank20"></div>
	<div class="yuy_warp bor_rad borddd clr">
        <select name="j" id="diseases">
            <option value="0">选择疾病</option>
             <?php foreach($model->getLv0KeyInfoes() as $xbz):?>   	
        	<option value="<?php print $xbz["sid"] ?>"><?php print ($xbz["data"])?></option>
            <?php endforeach;?>
        </select>
    </div>
    <div class="blank30"></div>
    <button class="login_dl bor_rad yellow_bg" name="submit" type="submit">提交</button>
    <div class="blank30"></div>
</div>

</form>

  
<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom.tpl.php";?>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom_fd_sub.tpl.php";?>
</div>
