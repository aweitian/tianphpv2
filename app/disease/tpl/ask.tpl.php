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