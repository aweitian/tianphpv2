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
            	<li><a <?php if($ctr=="welcome"):?> class="navdq"<?php endif?>  href="<?php print AppUrl::disHomeByDiseasekey($row["key"])?>">疾病首页</a></li><span>|</span>
                <li><a <?php if($ctr=="knowledge"):?> class="navdq"<?php endif?>  href="<?php print AppUrl::disKnowledgeByDiseasekey($row["key"])?>">疾病知识</a></li><span>|</span>
                <li><a <?php if($ctr=="article"):?> class="navdq"<?php endif?> href="<?php print AppUrl::disArticleByDiseasekey($row["key"])?>">专家观点</a></li><span>|</span>
                <li><a <?php if($ctr=="doctors"):?> class="navdq"<?php endif?> href="<?php print AppUrl::disDoctorsByDiseasekey($row["key"])?>">好评医生</a></li><span>|</span>
                <li><a <?php if($ctr=="ask"):?> class="navdq"<?php endif?> href="<?php print AppUrl::disAskByDiseasekey($row["key"])?>">患者咨询</a></li>
            </ul>
        </div>