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

$docinfos=$m->getInfoes(10);

?>
<div class="public_width">
<?php $disease_header_title = "按症状";?>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/header.disease.php"?>

  <!--head end-->

  <!--找医院查疾病问医生-->
  <div class="finddoctor_list">
    <div class="blank30"></div>
    <ul class="nav_content clr">
    
      <li style="display: block;" id="cnzz_yyqy">
        <div class="province_list">
          <ul>
            <?php $x=1;?>
            <?php foreach($m->getLv0Data() as $sym):?> 	
            <li><span class="name <?php if($x==1){?>cur_name<?php }?>"><?php print utility::utf8Substr($sym["data"], 0, 4) ?></span></li>
            <?php $x++;?>
            <?php endforeach;?> 
          </ul>
        </div>
        
        <div class="hospital_list" style="display: block;">
          <?php $z=1;?>
          <?php foreach($m->getLv0Data() as $sym):?> 	
          <div class="list_num" <?php if($z==1){?>style="display:block;"<?php } else{?>style="display:none;"<?php }?>>
          
            <ul class="left_hos clr">
              <?php foreach ($m->alllv1BySyd($sym["syd"]) as $xzz):?>
              <li><a href="<?php print AppUrl::articleBySyd($xzz['syd'])?>"><?php print ($xzz['data']) ?></a><span>|</span></li>
              <?php endforeach;?>
            </ul>
            
          </div>
          <?php $z++;?>
          <?php endforeach;?>
      
        </div>
        
      			</li>
            </ul>
          </div>
  <!---->
  <div class="blank30"></div>
</div>

  