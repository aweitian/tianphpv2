<?php
$this->title = "文章-找大夫咨询-上海九龙男子医院";
$this->description = "";
$this->keyword = "";

$pageSize = 15;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}
$pagination = new pagination($m->allByDodCnt($m->data["sid"]), $page, $pageSize, 7);


$req = new httpRequest();
$url = new url($req->requestUri());

?>

 <?php include dirname(__FILE__)."/common/location.tpl.php";?>
      
      <div class="zjtd">
      
      <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
       
        </ul>

          <div class="tabcon selected fz13">
          	   <div class="blank20"></div>
               <div class="clr">
               
               <div class="wid680 fl">
               		<div class="zjtd_page_set clr">
                    	<input type="text" class="zjtd_pageset_inp1 border2 fl" />
                        <input type="button" class="zjtd_pageset_inp2 fr" value="个人网站站内搜索" />
                    </div>
                   <p class="blank20"></p>
                  <div class="norques border2">
                    <div class="zjtdwztit fz18"><span></span><?php print $m->data["name"]?>文章列表</div>
                    <p class="blank20"></p>
                    
                    <div class="zjtd_box3">
                             <?php foreach($m->allByDod($m->data["sid"],$pageSize,($page-1)*$pageSize) as $aitem):?>           
                 <?php $a= $m->rowNoContent($aitem)?> 	
                        <dl class="clr">
                        	<p class="blank20"></p>
                        	<dt><img src="<?php print AppUrl::getMediaPath()?>/images/bzdot.jpg" class="fl" /><a<?php print App::useTarget()?> href="<?php print AppUrl::articleByAid($a["sid"])?>"><?php print ($a["title"])?></a> </dt>
                            <dd class="fr"> 发表于<?php print ($a["date"])?></dd>
                            <p class="blank20"></p>
                        </dl>
                    <?php endforeach;?> 
                  
                  
                        <div class="blank40"></div>
                       <div class="pagenum tc  fz13"><?php if ($pagination->hasPre()):?>
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
                    
                  </div>
                  
                </div>
    			<!--left end-->	
                
  <?php include dirname(__FILE__)."/common/left.tpl.php";?>


  
  
 