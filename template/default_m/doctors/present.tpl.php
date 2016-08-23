<?php

$row = $m->data;

$this->title = "心意礼物-".$m->data["name"]."-找大夫咨询-上海九龙男子医院";
$this->description = "";
$this->keyword = "";
?>
<script>

function gp(d,p)
{
	$.post(
		"<?php print AppUrl::userAddPresents()?>"		,
				{
					"d":d,
					"p":p
				},
			    function(data,status){
			       
			        alert(data.info);
			   
			    },
			    'json'
							
	);

	
}

</script>

<div class="public_width">
<?php $doctors_header_title = "的礼物"?>
<?php include dirname(dirname(__FILE__))."/inc/header.doc.php"?>
  
  <!--head end-->
  
  <div class="hui_bg">
    <?php include dirname(__FILE__)."/common/nav.tpl.php"?>
    <div class="hd_hsx"></div>

    <div class="bg_fff">
        <div class="blank25"></div>
        <div class="index_hotzx">
          <h2 class="title_name_lan color3">赠送礼物</span></h2>
        <div class="mzy30">        
          <div class="zslw_con clr">
          
            <?php $x=1;?>
            <?php foreach( $m->all() as $lw):?>
            <dl class="fl <?php if($x%4==0){?>mr0<?php }?>" >
              <dt> <img src="<?php print AppUrl::getMediaPath()?>/present/<?php print $lw["avatar"];?>" onclick="gp(<?php print $m->data["sid"]?>,<?php print $lw["sid"]?>)" />
              </dt>
              <dd><?php print $lw["data"];?></dd>
            </dl>           
            <?php $x++;?>
            <?php endforeach;?>
          </div>

          
          <div class="blank25"></div>

        </div>
        </div>
        
    </div>
    <div class="hd_hsx"></div>
    <div class="hd"></div>
    <div class="index_hotzx">
      <h2 class="title_name_lan color3">礼物墙<span class="fw400">（共<?php print $m->getPresentDataByDodCnt($m->data["sid"]);?>个）</span></h2>
      <div class="lwq_con">
        <?php $dod=$m->data["sid"];?>
        <?php foreach ($m->getPresentDataByDod($dod,5,0) as $lw):?>
        <?php $pre=$m->rowpid($lw["pid"]);?>  
        <?php $user=$m->rowuser($lw["uid"]);?>
          
        <dl class="clr">
          <dt class="fl"> <img src="<?php print AppUrl::getMediaPath()?>/avatar/<?php print $user["avatar"];?>" class="fl" />
            <p class="fl"><?php print utility::utf8Substr($user["name"], 0, 3);?>***</p>
          </dt>
          <dd class="fl"> <img src="<?php print AppUrl::getMediaPath()?>/present/<?php print $pre["avatar"];?>" class="fl" />
            <p class="fl"><?php print $pre["data"];?></p>
          </dd>
          <dd class="fl"><?php print utility::utf8Substr($lw["date"], 0, 10)?></dd>
        </dl>
        <div class="hd_hsx"></div>
        <?php endforeach;?>
      </div>
    </div>
    <div class="blank30"></div>
  </div>
</div>

<?php include dirname(dirname(__FILE__))."/inc/bottom.tpl.php";?>