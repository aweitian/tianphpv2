<?php
/**
 * @Author: awei.tian
 * @Date: 2016年7月12日
 * @Desc: 
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
        	<h2 class="fl tc fz24">前列腺炎<br /><span class="fz12">prostatitis</span></h2>
            <ul class="fr fz16">
            	<li><a href="<?php print AppUrl::disHomeByDiseasekey($row["key"])?>">疾病首页</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disKnowledgeByDiseasekey($row["key"])?>">疾病知识</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disArticleByDiseasekey($row["key"])?>">专家观点</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disDoctorsByDiseasekey($row["key"])?>" class="navdq">好评医生</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disAskByDiseasekey($row["key"])?>">患者咨询</a></li>
            </ul>
        </div>
          
          <div class="fz13">
            
            <div class="blank20"></div>
                
               <div class="clr">
               	<div class="wid680 fl">
                    
                    <div class="padd20 border2">
                    	<div class="zjtdwztit fz18"><span></span>诊后服务星<a href="" class="fr fz13 color9">+更多</a></div>
                        <div class="fromjbzj clearfix">
                          <ul class="ulbot clearfix">
                            <li>
                              <dl class="clearfix">
                                <dt class="fl"><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/wltjzj1.jpg" width="80" height="80" /></a></dt>
                                <dd class="fl">
                                  <p class="blank10"></p>
                                  <p class="black fz18"><a href="">陈希球医生</a></p>
                                  <p class="blank5"></p>
                                  <p class="p2 fz13 gray"><img src="<?php print HTTP_ENTRY?>/static/images/jbzjdot.jpg" width="8" height="8" /> 在线</p>
                                  <p class="p3 tc"><a href="">个人网站</a></p>
                                </dd>
                              </dl>
                              <div class="blank20"></div>
                              <div class="zjsc">
                                <p class="fz13 gray">擅长：男性无精、少精、射精障碍、外生殖器异常、等原因引起的男性...
                                  等</p>
                              </div>
                            </li>
                            <li>
                              <dl class="clearfix">
                                <dt class="fl"><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/wltjzj1.jpg" width="80" height="80" /></a></dt>
                                <dd class="fl">
                                  <p class="blank10"></p>
                                  <p class="black fz18"><a href="">陈希球医生</a></p>
                                  <p class="blank5"></p>
                                  <p class="p2 fz13 gray"><img src="<?php print HTTP_ENTRY?>/static/images/jbzjdot.jpg" width="8" height="8" /> 在线</p>
                                  <p class="p3 tc"><a href="">个人网站</a></p>
                                </dd>
                              </dl>
                              <div class="blank20"></div>
                              <div class="zjsc">
                                <p class="fz13 gray">擅长：男性无精、少精、射精障碍、外生殖器异常、等原因引起的男性...
                                  等</p>
                              </div>
                            </li>
                            <li class="last">
                              <dl class="clearfix">
                                <dt class="fl"><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/wltjzj1.jpg" width="80" height="80" /></a></dt>
                                <dd class="fl">
                                  <p class="blank10"></p>
                                  <p class="black fz18"><a href="">陈希球医生</a></p>
                                  <p class="blank5"></p>
                                  <p class="p2 fz13 gray"><img src="<?php print HTTP_ENTRY?>/static/images/jbzjdot.jpg" width="8" height="8" /> 在线</p>
                                  <p class="p3 tc"><a href="">个人网站</a></p>
                                </dd>
                              </dl>
                              <div class="blank20"></div>
                              <div class="zjsc">
                                <p class="fz13 gray">擅长：男性无精、少精、射精障碍、外生殖器异常、等原因引起的男性...
                                  等</p>
                              </div>
                            </li>
                          </ul>
                        </div>
                        
                	</div>
                    
                    <div class="blank20"></div>
                    
                    <div class="padd20 border2 clr">
                    	<div class="zjtdwztit fz18"><span></span>全部推荐医生</div>
                        
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
                            
                        </ul>
                        
                        <div class="blank30"></div>
                        <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
                        <div class="blank15"></div>
                        
                	</div>
                </div>
               
               
    			<!--left end-->
                
              <?php include dirname(__FILE__)."/right.tpl.php";?>
                
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
  