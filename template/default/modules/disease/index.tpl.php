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

$all = $m->getAllQuestions(3,12);
$alldoc = $m->getAllQuestions(0,2);
// exit;

?>




<div class="listpos fz13"><span class="gray">当前位置：</span><a <?php print App::useTarget()?> href="<?php print AppUrl::navHome()?>"> 首页 </a> > <a href="<?php print  AppUrl::navdisease() ?>">男科疾病</a></div>
  <div class="quesnum clearfix">
    <div class="quesnuml fl border2">
     <!-- <p class="line24 fz13">今日解决<em class="orange">498</em>个问题</p>  -->
      <p class="line24">九龙问答已经收到的问题</p>
      <p class="blank10"></p>
      <?php $cnt=$m->getAllQuestionsCnt() ?>

      <div class="sdwtnum blue fz13">0000<?php print($cnt) ?></div>
      <div class="fz13 nowask">现在提问，十分钟内免费解答</div>
      <div class="blank10"></div>
      <p class="tc"><a href="<?php print AppUrl::navput()?>" ><img src="<?php print AppUrl::getMediaPath()?>/images/nowask.jpg" width="260" height="40" /></a></p>
    </div>
    <div class="quesnumr fr"><a href="<?php print AppUrl::getSwtUrl()?>" onclick="openZoosUrl();return false;"><img src="<?php print AppUrl::getMediaPath()?>/images/frojbban.jpg" width="680" height="266" /></a></div>
  </div>
  
  <!--quesnumbox end-->
  <div class="blank20"></div>
  <div class="clearfix">
    <div class="fl border2 wid300">
      <div class="fromjbl ">
      
      
      
         <?php foreach($m->getLv0Infoes() as $dis):?> 
       
        <dl>
          <dt><a class="fz18 white"><?php print($dis["data"])?></a></dt>
          <dd>
            <ul class="clearfix black">
               <?php foreach ($m->getLv1InfoesByDid($dis["sid"]) as $xbz):?>
              <li><a<?php print App::useTarget()?> href="<?php print AppUrl::disHomeByDiseasekey($xbz['key'])?>">
                    	<?php print ($xbz['data']) ?></a></li>
                	<?php endforeach;?>
            </ul>
          </dd>
        </dl>
 <?php endforeach;?>
       
      </div>
    </div>
    <!--left end-->
    <div class=" fr wid680 border2">
      <div class="fromjbr">
        <div class="fromjbrtit clearfix"><span class="fl fz18">有不适应症状，问医生</span><span class="fr fz13 gray"><a href="<?php print AppUrl::navDoctors() ?>">+查看全部医生</a></span></div>
        <div class="fromjbzj clearfix">
          <ul class="ulbot clearfix">
          
          <?php foreach($model->getTopStar(3) as $doc):?>
                            <li>
                              <dl class="clearfix">
                                <dt class="fl"><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><img src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print $doc["avatar"]?>" width="80" height="80" /></a></dt>
                                <dd class="fl">
                                  <p class="blank10"></p>
                                  <p class="black fz18"><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>"><?php print $doc["name"]; ?></a></p>
                                  <p class="blank5"></p>
                                  <p class="p2 fz13 gray"><img src="<?php print AppUrl::getMediaPath()?>/images/jbzjdot.jpg" width="8" height="8" /> 在线</p>
                                  <p class="p3 tc"><a<?php print App::useTarget()?> href="<?php print AppUrl::docHomeByDocid($doc["id"])?>">向ta提问</a></p>
                                </dd>
                              </dl>
                              <div class="blank20"></div>
                              <div class="zjsc">
                                <p class="fz13 gray">擅长： <?php print utility::utf8Substr($doc["spec"], 0, 25); ?>...
                                  等</p>
                              </div>
                            </li>
                          	<?php endforeach;?>
          
          </ul>
        </div>
        <div class="blank40"></div>
        
        
        
        
        
     
        
        
        <div class="fromjbrtit clearfix"><span class="fl fz18">疾病知识</span></div>
        <div class="fromjbhd clearfix">
        <?php $z=1;?>
           <?php foreach($m->getLv0Infoes() as $diswz):?> 
           
          <dl class="clearfix">
            <dt class="fl"><img src="<?php print AppUrl::getMediaPath()?>/images/<?php print($diswz["key"]) ?>.jpg" width="113" height="135" />
              <p class="tc white fz13"><?php print($diswz["data"])?></p>
            </dt>
            <dd class="fl">
              <?php foreach($m->allDataByLv0did($diswz["sid"],4,0) as $disxh):?> 
                        <?php $list= $m->rowNoContent($disxh) ?>  
                     
              <p class="fz13 black"><a href="<?php print AppUrl::articleByAid($list["sid"]) ?>"><?php print utility::utf8Substr($list["title"],0,12)?></a></p>
              <?php endforeach;?>
            </dd>
          </dl>
      <?php $z++;?>
          <?php endforeach;?>
         
         
        </div>
        <div class="contr4box clearfix">
          <ul class="fl">
            <div class="iask_border01">
              <div class="iask08">
                <ul class="iask08a" style="height:330px;background:none;overflow:hidden;"id="gundong">
                 
                  	<?php foreach ($alldoc["data"] as $docallitem):?>
                  	<?php $doc=$m->getInfoByDod($docallitem["dod"]) ?>
                  	  <?php $ans = $m->getAnswerByAskid($docallitem["sid"])?>
               
                  <div class="iask08a" style="height:180px;margin-top:-9px;background-position:48px -21px;padding-top:0px;">
                    <dl>
                      <dt><a href="<?php print AppUrl::askByAsdDocid($docallitem["dod"], $docallitem["sid"]) ?>" target='_blank'><img  src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print($doc["avatar"]) ?>" /><span></span></a></dt>
                      <dd>
                        <p class="gray"><a class="blue" href="<?php print AppUrl::askByAsdDocid($docallitem["dod"], $docallitem["sid"]) ?>" target='_blank'><?php print ($doc["name"]) ?></a><span>医生回答</span><span><?php print utility::utf8Substr($doc["date"],0,10) ?></span></p>
                        <ul>
                          <a href="<?php print AppUrl::askByAsdDocid($docallitem["dod"], $docallitem["sid"]) ?>" target='_blank'><?php print utility::utf8Substr($docallitem["title"], 0, 12) ?></a>
                        </ul>
                        <ol>
                       
                            <?php 
                             print empty($ans) ? "" : utility::utf8Substr($ans["content"], 0, 40)?>...
                         
                        </ol>
                      </dd>
                    </dl>
                  </div>
                  <?php endforeach;?>
	
                  
                  
                </ul>
              </div>
            </div>
          </ul>
          <div class="contr4r fl">
            <ul>
            	<?php foreach ($all["data"] as $allitem):?>
   
          	 <li><a href="<?php print AppUrl::askByAsdDocid($allitem["dod"], $allitem["sid"]) ?>"><?php print utility::utf8Substr($allitem["title"], 0, 18) ?></a></li>
          	<?php endforeach;?>
	
             
          
            </ul>
          </div>
          <div class="h0"></div>
        </div>
      </div>
    </div>
        <div style="clear:both;"></div>
    <!--right end--> 
