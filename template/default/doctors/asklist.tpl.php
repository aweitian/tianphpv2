<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月13日
 * @Desc: 
 */

$this->title = "患者服务区-".$m->data["name"]."-找大夫咨询-上海九龙男子医院";
$this->description = "";
$this->keyword = "";

$pageSize = 6;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($m->getQuestionsCountByDod($m->data["sid"]), $page, $pageSize, 6);



$req = new httpRequest();
$url = new url($req->requestUri());


?>
 <?php include dirname(__FILE__)."/common/location.tpl.php";?>

 
  <div class="sybox clearfix">
    <div>
      
      <div class="zjtd">
      
      <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
          
          <div class="tabcon selected fz13">
            
            <div class="blank20"></div>
                
           <div class="border2 padd20 clr zjtd_hzfwtw">
           		<img src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print $m->data["avatar"]?>" width="170" height="170" class="fl" style="border:1px solid #fff;" />
                <div class="fr">
                	<div class="zjtd_page_set clr">
                    	<input type="text" class="zjtd_pageset_inp1 border2 fl color9 fz16" placeholder="在此简单描述病情，向<?php print $m->data["name"]?>大夫提问" />
                        <input type="button" class="zjtd_pageset_inp2 fr" style="background:#76c000;" value="个人网站站内搜索" />
                    </div>
                    <div class="blank20"></div>
                    <p class="color3 clr"><b><?php print $m->data["name"]?>的咨询范围：</b><?php print $m->data["spec"]?></p>
                    <div class="blank20"></div>
                </div>
                
           </div>
            
          </div>
          <!--zjtd_con2 end-->
        
      </div>
      
      <!--fromjb end-->
      
      <div class="blank20"></div>
      

     <!--服务区 start-->
    <div class="padd20  border2 clr">
      <div class="zjtdwztit fz18 clr"><span class="fl"></span><h5 class="fl fz18">服务区</h5>
      <div class="fz13 color3 fl" style="margin-left:15px;">（全部患者：<font class="yellow">   <?php print $m->getAllQuestionsCnt()?></font>）</div>
        <div class="fr">
            <input type="text" class="zjtdwztit_sel fl color9 fz13" />
            <input type="button" class="zjtdwztit_sel2 fr" value="搜索" />
        </div>
      </div>
      <div class="blank20"></div>
      <div class="zixun_list">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tr class="zixun_list_title">
            <td width="2%"></td>
            <td width="20%">患者</td>
            <td width="20%">标题</td>
            <td width="20%">症状/疾病</td>
            <td width="13%">对话数</td>
            <td width="15%">时间</td>
          </tr>
          
    <?php foreach ($m->getQuestionsByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $ask): ?>
 
        <?php $user=$m->getNameByUid($ask["uid"])  ?>
        <?php $dis=$m->getNameByDid($ask["did"])?>
        
		<?php $count=$m->getAnswersCnt($ask["sid"]) ?>
		<?php $docount= $m->getAnswersDocReplyCnt($ask["sid"]) ?>
    
        
    
          <tr>
            <td></td>
            <td><p><?php print ($user) ?></p></td>
            <td><p><a<?php print App::useTarget()?>  href="<?php print AppUrl::askByAsdDocidAsd($m->data["id"], $ask["sid"])?>" class="td_link" ><?php  print(AppFilter::filterOut($ask["title"])) ?></a> </p></td>
            <td ><a<?php print App::useTarget()?> href="<?php print AppUrl::askByAsdDocidAsd($m->data["id"], $ask["sid"])?>" class="rela_dis"  ><?php print($dis) ?></a></td>
            <td> (<font class="green3 pl5 pr5 green"><?php print($docount) ?>/<?php print($count) ?></font>) </td>
            <td class="color9"><?php print(utility::utf8Substr($ask["date"], 0, 10)) ?></td>
          </tr>
        <?php endforeach; ?>  
    
        </table>
        
 		 </div>
 		
  		<div class="blank20"></div>
        <div class="pagenum tc  fz13"> <?php if ($pagination->hasPre()):?>
        	<a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getPre()) ?>">&lt;</a> 
        	<?php endif;?>
        	<?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
        	<a<?php print App::useTarget()?><?php if($pagination->getCurPageNum() - 1 == $i):?> class="current"<?php endif;?> href="<?php echo $url->setQuery("page", $pagination->getStartPage() + $i)?>"><?php print $pagination->getStartPage() + $i?></a>
        	<?php endfor;?>
        	<?php if($pagination->hasNext()):?>
            <a<?php print App::useTarget()?> href="<?php echo $url->setQuery("page", $pagination->getNext())?>">&gt;</a>
       		<?php endif;?></div>
        <div class="blank20"></div>
	</div>
    <!--服务区 end-->
        <div class="blank20"></div>
        
    </div>
    <!--syboxl end-->
  </div>
  <!--sybox end-->
  
    <?php 

  $doc_id=$m->data["id"];
  $doc_name=$m->data["name"];
  $doc_lv=$m->data["lv"];
  $doc_desc=$m->data["desc"];
  $doc_spec=$m->data["spec"];
  
  ?>
<?php include dirname(dirname(__FILE__))."/bottom_swt.tpl.php";?>
  