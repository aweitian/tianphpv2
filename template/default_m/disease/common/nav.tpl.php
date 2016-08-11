 <?php
/**
 * @Author: sihangzhang
 * @Date: 2016年7月21日
 * @Desc: 
 * 依赖:
 */

$ctr = appCtrl::$msg->getAction();


?>

 <div class="mzy30">
		<div class="jbzs_con_nav">
            <ul>
                <li><a href="<?php print AppUrl::disKnowledgeByDiseasekey($row["key"])?>" class="first <?php if($ctr=="knowledge"):?>jbzs_one<?php endif?>">疾病知识</a></li>
                <li class=""><a href="<?php print AppUrl::disAskByDiseasekey($row["key"])?>" class="<?php if($ctr=="ask"):?>jbzs_one<?php endif?>">相关咨询</a></li>
                <li class=""><a href="<?php print AppUrl::disDoctorsByDiseasekey($row["key"])?>" class="last <?php if($ctr=="doctors"):?>jbzs_one<?php endif?>">推荐专家</a></li>
            </ul>
           
            <div class="clear_l"></div>
        </div>
     </div>