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
                <li><a href="<?php print AppUrl::disDoctorsByDiseasekey($row["key"])?>">好评医生</a></li><span>|</span>
                <li><a href="<?php print AppUrl::disAskByDiseasekey($row["key"])?>" class="navdq">患者咨询</a></li>
            </ul>
        </div>
          
          <div class="fz13">
            
            <div class="blank20"></div>
                
               <div class="clr">
               	<div class="wid680 border2 fl">
                      <div class="norques">
                        <div class="questit fz18">前列腺炎热门咨询</div>
                        <p class="blank20"></p>
                        <div class="quesnav fz13">
                          <ul class="clearfix">
                            <li class="selected">全部</li>
                            <li>前列腺炎</li>
                            <li>前列腺增生</li>
                            <li>前列腺痛</li>
                            <li>前列腺肥大</li>
                            <li>前列腺囊肿</li>
                            <li>前列腺癌</li>
                          </ul>
                        </div>
                        <p class="blank15"></p>
                        <div class="quesall">
                          <div class="jb_hzzx quescon selected fz13">
                            	
                                <div class="advise_box pr clearfix">
                                    <ul class="clearfix">
                                    
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">1得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                                
                          </div>
                          <div class="jb_hzzx quescon fz13">
                            	
                                <div class="advise_box pr clearfix">
                                    <ul class="clearfix">
                                    
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">2得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                                
                          </div>
                          <div class="jb_hzzx quescon  fz13">
                           		<div class="advise_box pr clearfix">
                                    <ul class="clearfix">
                                    
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">3得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                          </div>
                          <div class="jb_hzzx quescon  fz13">
                            	<div class="advise_box pr clearfix">
                                    <ul class="clearfix">
                                    
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">4得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                          </div>
                          <div class="jb_hzzx quescon fz13">
                           		<div class="advise_box pr clearfix">
                                    <ul class="clearfix">
                                    
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">5得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                          </div>
                          <div class="jb_hzzx quescon fz13">
                            	<div class="advise_box pr clearfix">
                                    <ul class="clearfix">
                                    
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">6得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                          </div>
                          <div class="jb_hzzx quescon fz13">
                            	<div class="advise_box pr clearfix">
                                    <ul class="clearfix">
                                    
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">7得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                        <li>
                                            <div class="advise_box_title">                              
                                            <a href="" class="fz16 color3">得了前列腺有什么影响吗？</a>
                                            </div>
                                            <p class="gray3 pt5 color9">最后提交16-05-29 15:30  疾病分类：<a href="" class="bule">前列腺炎</a></p>
                                            <div class="pt10 bbd_c clearfix">
                                                <div class="fl pr15 pt5"><img src="<?php print HTTP_ENTRY?>/static/images/patienthead.png"></div>
                                                <div class="advise_box_con fl">本人昨天去打乒乓带了瓶农夫山泉。。（碰巧别人也带了瓶）我一不小心喝了别人一口。不巧得是我嘴巴里正好有XXX<a href="" class="fr bule">详细 &gt;&gt;</a></div>
                                            </div>
                                            <div class="pt5 clearfix">
                                            <div class="fl pr15 pt5"><a href="" target="blank"><img src="<?php print HTTP_ENTRY?>/static/images/jbhz_zj.png"></a></div>
                                                <div class="advise_box_con fl">回复医生：<a href="" class="bule">陈希球</a></div>
                                                <div class="advise_box_con fl"><a href="" target="blank">华西医院</a>  <a href="">风湿免疫科</a></div>
                                            </div>
                                        </li>
                                        
                                    </ul>
                                </div>
                          </div>
                        </div>
                        <p class="blank25"></p>
                        <div class="pagenum tc gray fz13"> <a><</a> <a>1</a> <a>2</a> <a>3</a> <a>4</a> <a>5</a> <a>...</a> <a>52</a> <a>></a> </div>
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
                  
                  <div class="syrbox2">
                    <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth1.jpg" width="300" height="100" /></p>
                    <p class="blank10"></p>
                    <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth2.jpg" width="300" height="100" /></p>
                    <p class="blank10"></p>
                    <p><img src="<?php print HTTP_ENTRY?>/static/images/syrth3.jpg" width="300" height="100" /></p>
                  </div>
                  
                  <div class="blank20"></div>
                  
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