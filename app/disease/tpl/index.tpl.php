<?php
/**
 *Author
 * Sihangzhang
 * ["sid"]=> string(3) "325" 
 * ["key"]=> string(4) "gwxc" 
 * ["data"]=> string(12) "睾丸异常" 
 * ["pid"]=> string(3) "322" 
 * ["metaid"]=> string(1) "2"
 */
$row = $model->data;
// var_dump($row);
$ext = diseaseExtInfoes::getExtData();
?>
  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
      	
        <div class="jb_tit clr">
        	<h2 class="fl tc fz24"><?php print $row["data"]?><br /><span class="fz12"><?php print $ext[$row["data"]]["en"]?></span></h2>
            <ul class="fr fz16">
            	<li><a href="<?php print AppUrl::disHomeByDiseasekey($row["key"])?>" class="navdq">疾病首页</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disKnowledgeByDiseasekey($row["key"])?>">疾病知识</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disArticleByDiseasekey($row["key"])?>">专家观点</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disDoctorsByDiseasekey($row["key"])?>">好评医生</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disAskByDiseasekey($row["key"])?>">患者咨询</a></li>
            </ul>
        </div>
          
          <div class="fz13">
            
            <div class="blank20"></div>
                
               <div class="clr">
               	<div class="wid680 fl">
                
                	<div class="padd20 border2 clr">
                    	<img src="<?php print HTTP_ENTRY?>/static/images/jb_img1.jpg" class="fl" />
                        <div class="jb_box1 fr">
                        	<div class="blank10"></div>
                        	<span class="fz18 bule">前列腺炎知识介绍</span>
                            <div class="blank10"></div>
                            <p class="fz13 color3">前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾...<a href="" class="bule">疾病介绍→</a></p>
                            <div class="blank10"></div>
                            <div class="jbbox1_sm1 fz13">
                                <p>
                                <a href="">前列腺炎吃什么药，前列腺炎怎么治疗</a>
                                <a href="">前列腺检查项目在线</a>
                                </p>
                                <p>
                                <a href="">前列腺炎的发病原因</a>
                                <a href="">【病因】 前列腺炎是怎么引起的</a>
                                </p>
                                <p>
                                <a href="">【误诊】你是前列腺炎还是尿路？</a>
                                <a href="">更多...</a>
                                </p>
                            </div>
                        </div>
                    </div>
                	
                    <div class="blank20"></div>
                    
                    <div class="padd20 border2">
                    	<div class="zjtdwztit fz18"><span></span>相关问答<a href="" class="fr fz13 color9">+更多</a></div>
                        <div class="blank20"></div>
                        <div class="clr jb_box2">
                        
                        	<div class="jbbox2_sm1 fl" style="width:290px; padding-right:30px; border-bottom:1px dotted #d7d7d7;">
                            
                            	<div class="jbbox2_sm1top clr">
                                	<div class="fl jbbox2_p1 tc fz16 jb_ys1">尖锐<br />湿疣</div>
                                    <div class="fr">
                                    	<p>治疗一星期花了几万.没什么区别. 我与其他同治疗尖锐湿疣的 ...<a href="" class="bule"> 详细→</a></p>
                                        <p class="fr color9">5分钟前</p>
                                    </div>
                                </div>
                                <div class="blank20"></div>
                                <div class="jbbox2_sm1top clr">
                                	<img src="<?php print HTTP_ENTRY?>/static/images/jb_img2.jpg" class="fl" />
                                    <div class="fr">
                                    	<span class="jb_ys1col">张英娣，副主任医师</span>
                                        <p>这个肯定不是尖锐湿疣，建议去做个活检看看，就是取一块下来去化</p>
                                    </div>
                                	
                                </div>
                                <div class="blank25"></div>
                            </div>
                            
                            <div class="jbbox2_sm1 fr" style="width:290px; padding-left:26px; border-left:1px dotted #d7d7d7; border-bottom:1px dotted #d7d7d7;">
                            
                            	<div class="jbbox2_sm1top clr">
                                	<div class="fl jbbox2_p1 tc fz16 jb_ys2">尖锐<br />湿疣</div>
                                    <div class="fr">
                                    	<p>治疗一星期花了几万.没什么区别. 我与其他同治疗尖锐湿疣的 ...<a href="" class="bule"> 详细→</a></p>
                                        <p class="fr color9">5分钟前</p>
                                    </div>
                                </div>
                                <div class="blank20"></div>
                                <div class="jbbox2_sm1top clr">
                                	<img src="<?php print HTTP_ENTRY?>/static/images/jb_img3.jpg" class="fl" />
                                    <div class="fr">
                                    	<span class="jb_ys2col">张俊峰，主治医师</span>
                                        <p>这个肯定不是尖锐湿疣，建议去做个活检看看，就是取一块下来去化验的</p>
                                    </div>
                                	
                                </div>
                                <div class="blank25"></div>
                            </div>
                            
                            <div class="jbbox2_sm1 fl" style="width:290px; padding-right:30px;">
                            	<div class="blank20"></div>
                            	<div class="jbbox2_sm1top clr">
                                	<div class="fl jbbox2_p1 tc fz16 jb_ys3">尖锐<br />湿疣</div>
                                    <div class="fr">
                                    	<p>治疗一星期花了几万.没什么区别. 我与其他同治疗尖锐湿疣的 ...<a href="" class="bule"> 详细→</a></p>
                                        <p class="fr color9">5分钟前</p>
                                    </div>
                                </div>
                                <div class="blank20"></div>
                                <div class="jbbox2_sm1top clr">
                                	<img src="<?php print HTTP_ENTRY?>/static/images/jb_img2.jpg" class="fl" />
                                    <div class="fr">
                                    	<span class="jb_ys3col">张英娣，副主任医师</span>
                                        <p>这个肯定不是尖锐湿疣，建议去做个活检看看，就是取一块下来去化</p>
                                    </div>
                                	
                                </div>
                                
                            </div>
                            
                            <div class="jbbox2_sm1 fr" style="width:290px; padding-left:26px; border-left:1px dotted #d7d7d7;">
                            	<div class="blank20"></div>
                            	<div class="jbbox2_sm1top clr">
                                	<div class="fl jbbox2_p1 tc fz16 jb_ys4">尖锐<br />湿疣</div>
                                    <div class="fr">
                                    	<p>治疗一星期花了几万.没什么区别. 我与其他同治疗尖锐湿疣的 ...<a href="" class="bule"> 详细→</a></p>
                                        <p class="fr color9">5分钟前</p>
                                    </div>
                                </div>
                                <div class="blank20"></div>
                                <div class="jbbox2_sm1top clr">
                                	<img src="<?php print HTTP_ENTRY?>/static/images/jb_img3.jpg" class="fl" />
                                    <div class="fr">
                                    	<span class="jb_ys4col">张俊峰，主治医师</span>
                                        <p>这个肯定不是尖锐湿疣，建议去做个活检看看，就是取一块下来去化验的</p>
                                    </div>
                                	
                                </div>
                                <div class="blank25"></div>
                            </div>
                            
                        </div>
                        
                	</div>
                    
                    <div class="blank20"></div>
                    <div class="padd20 border2">
                    	<div class="zjtdwztit fz18" style="border-bottom:0;"><span></span>前列腺炎全面详解</div>
                        
                        <div class="jb_sstab clearfix dgray fz13 color6">
                            <ul class="clr">
                              <li class="selected">病因</li>
                              <li>症状</li>
                              <li>检查</li>
                              <li>治疗</li>
                              <li>危害</li>
                              <li class="last">保键</li>
                            </ul>
                        </div>
      
      					<div class="jb_ssall">
                        <div class="jb_ssbox selected">
                        	
                            <div class="clr jb_ssbox_sm1">
                            	<img src="<?php print HTTP_ENTRY?>/static/images/jb_img4.jpg" class="fl" />
                                <div class="fr">
                                	<span class="fz16 color3">1前列腺炎的病因有哪些？</span>
                                    <p class="fz13 color6">前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙 ...<a href="" class="bule">[详细]</a></p>
                                </div>
                                <div class="blank20"></div>
                            </div>
                            <div class="blank15"></div>
                            <div class="jb_ssbox_sm2 clr">
                        	<ul class="fl">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                            <ul class="fr">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                        </div>
                            
                        </div>
                        <div class="jb_ssbox">
                        	<div class="clr jb_ssbox_sm1">
                            	<img src="<?php print HTTP_ENTRY?>/static/images/jb_img4.jpg" class="fl" />
                                <div class="fr">
                                	<span class="fz16 color3">2前列腺炎的病因有哪些？</span>
                                    <p class="fz13 color6">前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙 ...<a href="" class="bule">[详细]</a></p>
                                </div>
                                <div class="blank20"></div>
                            </div>
                            <div class="blank15"></div>
                            <div class="jb_ssbox_sm2 clr">
                        	<ul class="fl">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                            <ul class="fr">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                        </div>
                        </div>
                        <div class="jb_ssbox">
                        	<div class="clr jb_ssbox_sm1">
                            	<img src="<?php print HTTP_ENTRY?>/static/images/jb_img4.jpg" class="fl" />
                                <div class="fr">
                                	<span class="fz16 color3">3前列腺炎的病因有哪些？</span>
                                    <p class="fz13 color6">前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙 ...<a href="" class="bule">[详细]</a></p>
                                </div>
                                <div class="blank20"></div>
                            </div>
                            <div class="blank15"></div>
                            <div class="jb_ssbox_sm2 clr">
                        	<ul class="fl">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                            <ul class="fr">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                        </div>
                        </div>
                        <div class="jb_ssbox">
                        	<div class="clr jb_ssbox_sm1">
                            	<img src="<?php print HTTP_ENTRY?>/static/images/jb_img4.jpg" class="fl" />
                                <div class="fr">
                                	<span class="fz16 color3">4前列腺炎的病因有哪些？</span>
                                    <p class="fz13 color6">前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙 ...<a href="" class="bule">[详细]</a></p>
                                </div>
                                <div class="blank20"></div>
                            </div>
                            <div class="blank15"></div>
                            <div class="jb_ssbox_sm2 clr">
                        	<ul class="fl">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                            <ul class="fr">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                        </div>
                        </div>
                        <div class="jb_ssbox">
                        	<div class="clr jb_ssbox_sm1">
                            	<img src="<?php print HTTP_ENTRY?>/static/images/jb_img4.jpg" class="fl" />
                                <div class="fr">
                                	<span class="fz16 color3">5前列腺炎的病因有哪些？</span>
                                    <p class="fz13 color6">前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙 ...<a href="" class="bule">[详细]</a></p>
                                </div>
                                <div class="blank20"></div>
                            </div>
                            <div class="blank15"></div>
                            <div class="jb_ssbox_sm2 clr">
                        	<ul class="fl">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                            <ul class="fr">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                        </div>
                        </div>
                        <div class="jb_ssbox">
                        	<div class="clr jb_ssbox_sm1">
                            	<img src="<?php print HTTP_ENTRY?>/static/images/jb_img4.jpg" class="fl" />
                                <div class="fr">
                                	<span class="fz16 color3">6前列腺炎的病因有哪些？</span>
                                    <p class="fz13 color6">前列腺，素有男性"生命腺"之称，可见前列腺对于男性的重要性。然而，作为人体大腺体，前列腺却很脆弱，其中，前列腺炎就是男性为常见的男科疾病之一。上海九龙 ...<a href="" class="bule">[详细]</a></p>
                                </div>
                                <div class="blank20"></div>
                            </div>
                            <div class="blank15"></div>
                            <div class="jb_ssbox_sm2 clr">
                        	<ul class="fl">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                            <ul class="fr">
                            	<li><a href="">前列腺炎吃什么药，前列腺炎怎么治疗？</a></li>
                                <li><a href="">以前尿一丈，现在尿无力，怎么办？</a></li>
                                <li><a href="">【误诊】你是前列腺炎还是尿路感染？</a></li>
                            </ul>
                        </div>
                        </div>
                      </div>
                        
                	</div>
                    
                    <div class="blank20"></div>
                    
                    <div class="padd20 border2 clr">
                    	<div class="zjtdwztit fz18"><span></span>好评医生<a href="" class="fr fz13 color9">+更多推荐</a></div>
                        
                        <ul class="hp_doc1 clearfix">
                        
                            <li class="hp_doc_box1">
                            <div class="clr">
                            <div class="hp_doc_box2">
                                <div class="fl pr20">
                                <p class="tc">
                                    <a href="" target="_blank">
                                    <img alt="" src="<?php print HTTP_ENTRY?>/static/images/jb_img5.jpg">
                                    </a>
                                </p>
                                        <a target="_blank" href="" class="personweb-sickness-btn">个人网站</a>
                                </div>
                                <div class="fl">
                                    <p>张俊峰&nbsp;&nbsp;&nbsp;&nbsp;主治医师</p>
                                    <p>
                                        <span class="patient_recommend">患者推荐热度：
                                        <a href=""><i class="blue" style="margin-left:-5px;">5.0</i></a></span>
                                        <span><img src="<?php print HTTP_ENTRY?>/static/images/jian.png" style="vertical-align:-3px;"></span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;近两周回复<b class="yellow">37</b>问 
                                        </span>
                                    </p>
                                    <p><img src="<?php print HTTP_ENTRY?>/static/images/jb_img6.png" class="fl" style="margin:5px 5px 0 0;" />擅长：擅长于泌尿系感染、前列腺炎、性功能障碍、男性不育等...</p>
                                    <p><img src="<?php print HTTP_ENTRY?>/static/images/jb_img7.png" class="fl" style="margin:5px 5px 0 0;" /><a href="" class="colora">查看张俊峰的全部文章、全部咨询</a></p>
                                </div>
                            </div>
                            
                            <div class="doc_rela_link">
                                <p><a href="" class="online_btn"><span>点击咨询</span></a><p>
                                <p><a href="" class="jiahao_btn"><span>预约挂号</span></a><p>
                            </div>
                            </div>
                            </li>
                            
                            <li class="hp_doc_box1">
                            <div class="clr">
                            <div class="hp_doc_box2">
                                <div class="fl pr20">
                                <p class="tc">
                                    <a href="" target="_blank">
                                    <img alt="" src="<?php print HTTP_ENTRY?>/static/images/jb_img5.jpg">
                                    </a>
                                </p>
                                        <a target="_blank" href="" class="personweb-sickness-btn">个人网站</a>
                                </div>
                                <div class="fl">
                                    <p>张俊峰&nbsp;&nbsp;&nbsp;&nbsp;主治医师</p>
                                    <p>
                                        <span class="patient_recommend">患者推荐热度：
                                        <a href=""><i class="blue" style="margin-left:-5px;">5.0</i></a></span>
                                        <span><img src="<?php print HTTP_ENTRY?>/static/images/jian.png" style="vertical-align:-3px;"></span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;近两周回复<b class="yellow">37</b>问 
                                        </span>
                                    </p>
                                    <p><img src="<?php print HTTP_ENTRY?>/static/images/jb_img6.png" class="fl" style="margin:5px 5px 0 0;" />擅长：擅长于泌尿系感染、前列腺炎、性功能障碍、男性不育等...</p>
                                    <p><img src="<?php print HTTP_ENTRY?>/static/images/jb_img7.png" class="fl" style="margin:5px 5px 0 0;" /><a href="" class="colora">查看张俊峰的全部文章、全部咨询</a></p>
                                </div>
                            </div>
                            
                            <div class="doc_rela_link">
                                <p><a href="" class="online_btn"><span>点击咨询</span></a><p>
                                <p><a href="" class="jiahao_btn"><span>预约挂号</span></a><p>
                            </div>
                            </div>
                            </li>
                            
                            <li class="hp_doc_box1">
                            <div class="clr">
                            <div class="hp_doc_box2">
                                <div class="fl pr20">
                                <p class="tc">
                                    <a href="" target="_blank">
                                    <img alt="" src="<?php print HTTP_ENTRY?>/static/images/jb_img5.jpg">
                                    </a>
                                </p>
                                        <a target="_blank" href="" class="personweb-sickness-btn">个人网站</a>
                                </div>
                                <div class="fl">
                                    <p>张俊峰&nbsp;&nbsp;&nbsp;&nbsp;主治医师</p>
                                    <p>
                                        <span class="patient_recommend">患者推荐热度：
                                        <a href=""><i class="blue" style="margin-left:-5px;">5.0</i></a></span>
                                        <span><img src="<?php print HTTP_ENTRY?>/static/images/jian.png" style="vertical-align:-3px;"></span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;近两周回复<b class="yellow">37</b>问 
                                        </span>
                                    </p>
                                    <p><img src="<?php print HTTP_ENTRY?>/static/images/jb_img6.png" class="fl" style="margin:5px 5px 0 0;" />擅长：擅长于泌尿系感染、前列腺炎、性功能障碍、男性不育等...</p>
                                    <p><img src="<?php print HTTP_ENTRY?>/static/images/jb_img7.png" class="fl" style="margin:5px 5px 0 0;" /><a href="" class="colora">查看张俊峰的全部文章、全部咨询</a></p>
                                </div>
                            </div>
                            
                            <div class="doc_rela_link">
                                <p><a href="" class="online_btn"><span>点击咨询</span></a><p>
                                <p><a href="" class="jiahao_btn"><span>预约挂号</span></a><p>
                            </div>
                            </div>
                            </li>
                            
                            <li class="hp_doc_box1" style="border:0; padding-bottom:0;">
                            <div class="clr">
                            <div class="hp_doc_box2">
                                <div class="fl pr20">
                                <p class="tc">
                                    <a href="" target="_blank">
                                    <img alt="" src="<?php print HTTP_ENTRY?>/static/images/jb_img5.jpg">
                                    </a>
                                </p>
                                        <a target="_blank" href="" class="personweb-sickness-btn">个人网站</a>
                                </div>
                                <div class="fl">
                                    <p>张俊峰&nbsp;&nbsp;&nbsp;&nbsp;主治医师</p>
                                    <p>
                                        <span class="patient_recommend">患者推荐热度：
                                        <a href=""><i class="blue" style="margin-left:-5px;">5.0</i></a></span>
                                        <span><img src="<?php print HTTP_ENTRY?>/static/images/jian.png" style="vertical-align:-3px;"></span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;近两周回复<b class="yellow">37</b>问 
                                        </span>
                                    </p>
                                    <p><img src="<?php print HTTP_ENTRY?>/static/images/jb_img6.png" class="fl" style="margin:5px 5px 0 0;" />擅长：擅长于泌尿系感染、前列腺炎、性功能障碍、男性不育等...</p>
                                    <p><img src="<?php print HTTP_ENTRY?>/static/images/jb_img7.png" class="fl" style="margin:5px 5px 0 0;" /><a href="" class="colora">查看张俊峰的全部文章、全部咨询</a></p>
                                </div>
                            </div>
                            
                            <div class="doc_rela_link">
                                <p><a href="" class="online_btn"><span>点击咨询</span></a><p>
                                <p><a href="" class="jiahao_btn"><span>预约挂号</span></a><p>
                            </div>
                            </div>
                            </li>
                            
                        </ul>
                        
                	</div>
                </div>
               
               
    			<!--left end-->
                
                <div class="fr wid300 fz13">
                	
                    <div class="jb_rg">
                        <textarea placeholder="在此咨询，专业医师在线提供就医指导" class="jb_rg1 fl color9"></textarea>
                        <input type="button" class="jb_rg2 fl" />
                    </div>
                	
                   <div class="blank20"></div>
                	
                    <div class="docsug border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师观点</a><a class="fz13 blue fr" href="">+更多</a></div>
                        <div class="docsugbox fz13"><dl class="clearfix"><dt class="fl"><img src="<?php print HTTP_ENTRY?>/static/images/wlgd1.jpg" width="80" height="60" /></dt>
                          <dd class="fl"><p>前列腺炎患者夏季排尿减少并非是好兆头</p>
                          <p class="p2 clearfix"><a class="fl gray">2015-12-26</a><a class="fr gray">1011人阅读</a></p></dd></dl>
                          <p class="blank15"></p>
                          <ul class="othsug">
                          <li><p class="p1"><a class="black" href="">前列腺炎患者夏季排尿减少并非是好兆头</a></p><p class="p2"><a class="gray" href="">勃起时间短经久拖延不治反而会导致...[全文]</a></p></li>
                          <li><p class="p1"><a class="black" href="">前列腺炎患者夏季排尿减少并非是好兆头</a></p><p class="p2"><a class="gray" href="">勃起时间短经久拖延不治反而会导致...[全文]</a></p></li>
                          <li><p class="p1"><a class="black" href="">前列腺炎患者夏季排尿减少并非是好兆头</a></p><p class="p2"><a class="gray" href="">勃起时间短经久拖延不治反而会导致...[全文]</a></p></li>
                          <li><p class="p1"><a class="black" href="">前列腺炎患者夏季排尿减少并非是好兆头</a></p><p class="p2"><a class="gray" href="">勃起时间短经久拖延不治反而会导致...[全文]</a></p></li>
                          <li><p class="p1"><a class="black" href="">前列腺炎患者夏季排尿减少并非是好兆头</a></p><p class="p2"><a class="gray" href="">勃起时间短经久拖延不治反而会导致...[全文]</a></p></li>
                          </ul>      
                          </div>          
                    </div>
                  
                  <div class="blank20"></div>
                  
                  <div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a class="fl">症状自查</a></div>
                        <div class="jb_jbzc fz13">
                          <ul class="clearfix">
                            <li><a href="">尿频</a></li>
                            <li><a href="">尿急</a></li>
                            <li><a href="">尿不尽</a></li>
                            <li><a href="">前列腺痛</a></li>
                            <li><a href="">前列腺肥大</a></li>
                            <li><a href="">早泄</a></li>
                            <li><a href="">前列腺囊肿</a></li>
                            <li><a href="">前列腺癌</a></li>
                            <li><a href="">前列腺炎</a></li>
                            <li><a href="">前列腺增生</a></li>
                          </ul>
                        </div>
                      </div>
                      
                  <div class="blank20"></div>
                  
                  <div class="syrbox4 border2">
                    <div class="syrboxtit fz18 graybg">预约挂号</div>
                    <div class="syrbox4nr fz13">
                      <form method="post" action="">
                        <table>
                          <tr>
                            <td height="26" width="62">姓      名</td>
                            <td><input class="input1 border2" type="text" /></td>
                          </tr>
                          <tr height="14">
                            <td></td>
                          </tr>
                          <tr>
                            <td width="62">联系电话</td>
                            <td><input class="input1 border2" type="text" /></td>
                          </tr>
                          <tr height="14" >
                            <td></td>
                          </tr>
                          <tr>
                            <td width="62">预约时间</td>
                            <td><input class="input2 gray border2" onclick="WdatePicker()" placeholder="请选择预约时间" type="text" /></td>
                          </tr>
                          <tr height="14" >
                            <td></td>
                          </tr>
                          <tr>
                            <td width="62">就诊状态</td>
                            <td><input type="radio" name="zd"  checked="checked" />
                              <label> 初诊</label>
                              <input class="input3" type="radio" name="zd" />
                              <label> 复诊</label></td>
                          </tr>
                          <tr height="14" >
                            <td></td>
                          </tr>
                        </table>
                        <div class="sybtn">
                          <button class="sybtn1" type="submit" value=""><img src="<?php print HTTP_ENTRY?>/static/images/syrth8.jpg" width="120" height="40" /></button>
                          <button value=""><img src="<?php print HTTP_ENTRY?>/static/images/syrth9.jpg" width="120" height="40" /></button>
                        </div>
                      </form>
                    </div>
                  </div>
                  
                  <div class="blank20"></div>
                  
                  <div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a class="fl">热门标签</a></div>
                        <div class="hotbqbox fz13">
                          <ul class="clearfix">
                            <li><a href="">前列腺炎</a></li>
                            <li><a href="">前列腺增生</a></li>
                            <li><a href="">包皮包茎</a></li>
                            <li><a href="">前列腺痛</a></li>
                            <li><a href="">前列腺肥大</a></li>
                            <li><a href="">早泄</a></li>
                            <li><a href="">前列腺囊肿</a></li>
                            <li><a href="">前列腺癌</a></li>
                            <li><a href="">前列腺炎</a></li>
                            <li><a href="">前列腺增生</a></li>
                            <li><a href="">包皮包茎</a></li>
                            <li><a href="">前列腺痛</a></li>
                            <li><a href="">前列腺肥大</a></li>
                            <li><a href="">早泄</a></li>
                            <li><a href="">前列腺囊肿</a></li>
                            <li><a href="">前列腺癌</a></li>
                          </ul>
                        </div>
                      </div>
                      
                  <div class="blank20"></div>
                  
                  <div class="syrbox2">
                    <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth1.jpg" width="300" height="100" /></p>
                    <p class="blank10"></p>
                    <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth2.jpg" width="300" height="100" /></p>
                    <p class="blank10"></p>
                    <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth3.jpg" width="300" height="100" /></p>
                  </div>
                  
                </div>
                
                <!--right end-->
             </div>
            
          </div>
          <!--zjtd_con2 end-->
        
      </div>
      
      <!--fromjb end-->
      
      <div class="blank20"></div>
      
    </div>
    <!--syboxl end-->
  </div>
  <!--sybox end-->
  