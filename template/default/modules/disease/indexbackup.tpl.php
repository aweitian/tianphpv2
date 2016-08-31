<?php 
/**
 *Author
 * Sihangzhang
 * @var diseaseModel;
 */
 //var_dump(diseaseExtInfoes::getExtData());exit;
$m = $model;

$d = diseaseExtInfoes::getExtData();


$this->title = "男科疾病就医指南_上海九龙男子医院";
$this->description = "";
$this->keyword = "";
// exit;
?>

  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
      	
          <div class="fz13 jbcx_con">
           

              
              
              <?php $x=1;?>
                  <?php foreach($m->getLv0Infoes() as $dis):?> 
               <div class="jbcx_box1">
               		<p class="blank30"></p>
               		<p>
                    	<img src="<?php print AppUrl::getMediaPath()?>/images/<?php print($d[$dis["data"]]["ico"])?>" class="fl" />
                        <h6 class="fl"><?php print($dis["data"])?><br /><span><?php print($d[$dis["data"]]["en"])?></span></h6>
                    </p>
                    <p class="blank15"></p>    
                    <p class="clr jbcx_sm1">
   
                    
                     <?php foreach ($m->getLv1InfoesByDid($dis["sid"]) as $xbz):?>
                    	<a<?php print App::useTarget()?> href="<?php print AppUrl::disHomeByDiseasekey($xbz['key'])?>">
                    	<?php print ($xbz['data']) ?></a>|
                    	
                       	<?php endforeach;?>
                    </p>
               </div>
                <?php $x++;?>
               <?php endforeach;?>
             	
            
          </div>
          <!--zjtd_con2 end-->
        
      </div>
      
      <!--fromjb end-->
      
      <div class="blank20"></div>
      
    </div>
    <!--syboxl end-->
  </div>
  <!--sybox end-->
  