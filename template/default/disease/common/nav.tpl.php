 <?php
/**
 * @Author: sihangzhang
 * @Date: 2016年7月21日
 * @Desc: 
 * 依赖:
 */

$ctr = appCtrl::$msg->getAction();


?>

 <div class="jb_tit clr">
        	<h2 class="fl tc fz24"><?php print $row["data"]?><br /><span class="fz12"><?php print isset($ext[$row["data"]]["en"]) ? $ext[$row["data"]]["en"] : ""?></span></h2>
            <ul class="fr fz16">
            	<li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> <?php if($ctr=="welcome"):?> class="navdq"<?php endif?>  href="<?php print AppUrl::disHomeByDiseasekey($row["key"])?>">疾病首页</a></li><span>|</span>
            	<!-- 添加如果病种下没有 疾病知识 就不显示 "病因","症状","检查","治疗","危害","保键"-->    
       			 <?php if ($model->knowledgeCnt($row["sid"],0) > 0):?>
                <li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> <?php if($ctr=="knowledge"):?> class="navdq"<?php endif?>  href="<?php print AppUrl::disKnowledgeByDiseasekey($row["key"])?>">疾病知识</a></li><span>|</span>
                <?php endif?>
                <li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> <?php if($ctr=="article"):?> class="navdq"<?php endif?> href="<?php print AppUrl::disArticleByDiseasekey($row["key"])?>">医生观点</a></li><span>|</span>
                <li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> <?php if($ctr=="doctors"):?> class="navdq"<?php endif?> href="<?php print AppUrl::disDoctorsByDiseasekey($row["key"])?>">好评医生</a></li><span>|</span>
                <li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> <?php if($ctr=="ask"):?> class="navdq"<?php endif?> href="<?php print AppUrl::disAskByDiseasekey($row["key"])?>">患者咨询</a></li>
            </ul>
        </div>