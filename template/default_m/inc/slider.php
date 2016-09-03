<?php
/**
 * @Author: awei.tian
 * @Date: 2016年8月10日
 * @Desc: 
 * 依赖:
 */
?>
  <div id="focus" class="focus" style="background-color:#fff;margin:0px auto;"> 
    
    <div class="hd">
      <ul>
      </ul>
    </div>
    <div class="bd">
      <ul>
    
        <li> <a href="<?php print AppUrl::getSwtUrl();?>" onClick="openZoosUrl();return false;"><img src="<?php print AppUrl::getMediaPath()?>/images/banner2.jpg" /></a> </li>
        <li> <a href="<?php print AppUrl::getSwtUrl();?>" onClick="openZoosUrl();return false;"><img src="<?php print AppUrl::getMediaPath()?>/images/banner3.jpg" /></a> </li>
      </ul>
    </div>
    <script src="<?php print AppUrl::getMediaPath()?>/js/TouchSlide_1_1.7f969dac.js" type="text/javascript"></script> 
    <script type="text/javascript">

                TouchSlide({
                    slideCell:"#focus",
                    titCell:".hd ul", //开启自动分页 autoPage:true ，此时设置 titCell 为导航元素包裹层
                    mainCell:".bd ul",
                    effect:"leftLoop",
                    autoPlay:true,//自动播放
                    autoPage:true, //自动分页
                });
</script> 
    
  </div>