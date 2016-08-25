<?php 
/**
 * @var symptomModel;
 */
$m = $model;
if (!$m instanceof symptomModel)exit;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;

// foreach($m->getDisease() as $item)
// {
	

// }

// exit;

$this->title = "男科疾病症状大全_上海九龙男子医院";
$this->description = "";
$this->keyword = "";

$docinfos=$m->getInfoes(10);

?>
 <div class="blank20"></div>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/banner.php"?>
  <div class="listpos fz13"><span class="gray">当前位置：</span><a<?php print App::useTarget()?> href="/">首页 </a>> <a href="">男科症状</a></div>
  <div class="clearfix">
    <div class="fl wid300 border2">
      <div class="syrboxtit fz18 graybg">男科症状分类</div>
      <div class="allfrombz">
      

     
        <?php foreach($m->getLv0Data() as $sym):?> 	
        <dl class="selected">
          <dt class="fz18 blue"><?php print($sym["data"])?></dt>
          <dd class="fz16 dgray">
            <p class="p1">诱发疾病：</p>
            <p>
            	<?php foreach ($m->getDidsBySyd($sym["syd"]) as $did):?>
            	<a<?php print App::useTarget()?> href="<?php print AppUrl::disHomeByDid($did)?>"><?php print $m->getNameByDid($did) ?></a>|
            
            	<?php endforeach;?>

            </p>
          </dd>
        </dl>
             	<?php endforeach;?>

      </div>
    </div>
    <div class="fr wid680 border2">
      <div class="fromzzrbox">
      
      <?php $x=1;?>
        <?php foreach($m->getLv0Data() as $sym):?> 	
        <div class="fromzzrnr">
          <dl>
            <dt class="fz18"><img src="<?php print AppUrl::getMediaPath()?>/images/fzz<?php print ($x)?>.png" width="18" height="18" /><?php print($sym["data"])?></dt>
            <dd class="dgray fz13">
            <?php foreach ($m->alllv1BySyd($sym["syd"]) as $xzz):?>
            <a<?php print App::useTarget()?> href="<?php print AppUrl::articleBySyd($xzz['syd'])?>"><?php print ($xzz['data']) ?></a>
            	<?php endforeach;?>
            
            </dd>
          </dl>
        </div>

        	<?php $doc = $docinfos[$x-1]?>
        <div class="fromzzrzj">
          <dl class="clearfix">
            <dt class="fl"><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print $doc["avatar"]?>" width="80" height="80" /></a></dt>
            <dd class="ddl fl">
              <p class="p1 fz16">
              
             <a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"> <?php print $doc["name"]; ?></a><span class="dgray"><?php print $doc["lv"]; ?></span></p>
              <p class="p2 fz13 gray"><span class="black">擅长：</span><?php print $doc["spec"]; ?></p>
            </dd>
            <dd class="ddr fr tc fz18"><a<?php print App::useTarget()?> href="<?php print AppUrl::getSwtUrl(); ?>">点击咨询</a></dd>
          </dl>
        </div>
  
             
        <?php $x++;?>
       <?php endforeach;?> 
     
     
     
      </div>
    </div>
    <!--right end--> 
  </div>
  