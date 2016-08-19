<?php

$this->title = "心意礼物-".$m->data["name"]."-找大夫咨询-上海九龙男子医院";
$this->description = "";
$this->keyword = "";


// 	var_dump($m->data);exit;


?>
  <?php include dirname(__FILE__)."/common/location.tpl.php";?>
  <div class="sybox clearfix">
    <div>
      
      <div class="zjtd">
      
       <?php include dirname(__FILE__)."/common/nav.tpl.php";?>
         <div class="blank20"></div>
                
         <!--礼物头部 start-->
          <div class="content_2 clearfix gift_bg">
              <div class="gift_ff tc fz24 padd20 color6">选一份心意礼物，送给帮助过您的好大夫。<span class="yellow">支持+感谢</span>，一举两得！</div>
              <ul class="gift_top clearfix fs" style="margin-top:18px;">
                <li>
                  <p class="gift_num tc">01</p>
                  <p class="gift_top_con">您支付的费用将全部用于感谢医生牺牲休息时间，为患者进行科普宣教、解答咨询等；同时，医生还能看到漂亮的礼物，读到感谢祝福，更好地为患友服务。</p>
                  <p class="gift_top_help"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="" target="_blank">什么是心意礼物？</a></p>
                </li>
                <li>
                  <p class="gift_num tc">02</p>
                  <p class="gift_top_con"> <span class="fl"><b class="fz16 color3"><?php print $m->data["name"]?></b> 大夫</span><br>
                    <span class="fl pt10 fz13">已经帮助<strong class="yellow"><?php print rand(30000,4000);?></strong>位患者，已收到<strong class="yellow"><?php print $m->getDataByDodCnt($m->data["id"]);?></strong>件心意礼物。</span> </p>
                  <p class="gift_top_btn"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="" class="tc fz13">我也要送</a></p>
                </li>
              </ul>
              <div class="blank15"></div>
            </div>
		<div class="blank20"></div>
          <!--礼物头部 end-->
          
          <!--礼物墙 start-->
          <div class="norques border2">
               <div class="zjtdwztit fz18" style="border-bottom:0;"><span></span><?php print $m->data["name"]?><font class="color6">医生的礼物墙</font></div>
               <div class="blank20"></div>
               
               <!--医生收到的礼物（展示部分） start-->

                <ul class="gift_wall_main clearfix">

                  <?php foreach( $m->all() as $lw):?>
                  
                  <li>
                    <p class="gift_box"><img src="<?php print AppUrl::getMediaPath()?>/present/<?php print $lw["avatar"];?>" /></p>
                    <p class="gift_name"><?php print $lw["data"];?></p>
                    <p class="gift_send"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="">我也要送</a></p>
                  </li>
                  <?php endforeach;?>
                </ul>
               
                
                
                <div class="blank20"></div>
               
                <!--医生收到的礼物（隐藏部分） end-->
              
               
          
          
          </div>
        <!--礼物墙 end-->
        <div class="blank20"></div>
        <!--未收到的礼物 end-->
        
        <div class="norques border2">
               <div class="zjtdwztit fz18" style="border-bottom:0;"><span></span><?php print $m->data["name"]?></b><font class="color6">医生收到的礼物</font></div>
               <div class="blank20"></div>
               
                <ul class="gift_wall_main clearfix">
                 <?php foreach( $m->getPresentDataByDod($m->data["sid"],10,0) as $lw):?>         
                 <?php $pre=$m->rowpid($lw["pid"]);?>    
                 <?php $cnt=$m->getDataByDodCnt($lw["dod"]);?>
                 
                  <li>
                    <p class="gift_box"> <img src="<?php print AppUrl::getMediaPath()?>/present/<?php print $pre["avatar"];?>" /></p>
                    <p class="gift_name"><?php print $pre["data"];?>(<?php print ($cnt);?>)</p>
                    <p class="gift_send pl3"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="">我要送一个</a></p>
                  </li>
                  <?php endforeach;?>
                </ul>
          
          
          </div>
        
        <!--未收到的礼物 end-->
        
        
        
      </div>

        <div class="blank20"></div>
        
    </div>
    <!--syboxl end-->
  </div>