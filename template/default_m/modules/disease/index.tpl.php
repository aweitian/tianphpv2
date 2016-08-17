<?php 
/**
 *Author
 * Sihangzhang
 * @var diseaseModel;
 */
 //var_dump(diseaseExtInfoes::getExtData());exit;
$m = $model;

$d = diseaseExtInfoes::getExtData();

// exit;
?>
<div class="public_width">
	<?php $disease_header_title = "疾病科普"?>
	<?php include dirname(dirname(dirname(__FILE__)))."/inc/header.tc.php"?>
	<!--head end-->

	<?php include dirname(dirname(dirname(__FILE__)))."/inc/slider.php"?>

<!--banner end-->
<div class="blank30"></div>
<div class="index_sel2 mzy30">
    <h4 class="fz28">请输入您想了解的疾病</h4>
    <div class="blank25"></div>
    
    <?php include dirname(dirname(dirname(__FILE__)))."/search.form.php"?>

</div>
<div class="blank30"></div>
<div class="mzy30">
	<h3 class="blue fz30">常见疾病</h3>
    <div class="blank30"></div>       
        <div class="kp_cjjb clr">
            <?php foreach($m->getLv0Infoes() as $dis):?> 
                 <?php foreach ($m->getLv1InfoesByDid($dis["sid"]) as $xbz):?>
                 <a href="<?php print AppUrl::disHomeByDiseasekey($xbz['key'])?>"><?php print ($xbz['data']) ?></a>                    	
                 <?php endforeach;?>
            <?php endforeach;?>          
        </div>
   
</div>





<div class="blank30"></div>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/bottom.tpl.php";?>
</div>