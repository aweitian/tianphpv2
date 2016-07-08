<?php 
/**
 * @var doctorsModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;

$tree_dis = array();
foreach ($m->getDisease() as $item){
	if(!array_key_exists($item["pid"], $tree_dis)){
		$tree_dis[$item["pid"]] = array(
			"text" => $item["pd"],
			"children" => array()
		);
	}
	$tree_dis[$item["pid"]]["children"][$item["mid"]] = array($item["md"],$item["url"]);
}
 




// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
?>
  <div class="blank20"></div>
  <div id="focusindex">
    <ul class="index_banner_box clearfix">
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
      <li><a href=""><img src="<?php print HTTP_ENTRY?>/static/images/sybanner1.jpg" width="998" height="238" /></a></li>
    </ul>
  </div>
  <div class="blank15"></div>
  <div class="con_tit fz13">当前位置：<a href="">首页</a> > <a href="">医护团队</a> > <a href="">医师</a></div>
  
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
      	

          
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
                
                <div class="fr wid300 fz13">
                	
                    <div class="jb_rg">
                        <textarea placeholder="在此咨询，专业医师在线提供就医指导" class="jb_rg1 fl color9"></textarea>
                        <input type="button" class="jb_rg2 fl" />
                    </div>
                    
                    <div class="blank20"></div>
                    
                    <div class="syrbox5 border2">
                    <div class="syrboxtit fz18 graybg">相关问答<a href="" class="blue fz13 fr">+更多</a></div>
                    
                    <div class="zjtd_r2">
                    	<div class="blank10"></div>
                        <dl class="selected">
                          <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                        <dl>
                          <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                        <dl>
                         <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                        <dl>
                          <dt class="fz18 blue">尿失禁有哪些类型？这些有什么区别</dt>
                          <dd class="fz16 dgray clr">
                            <img src="<?php print HTTP_ENTRY?>/static/images/zjtd_img7.png" class="fl" /><p class="fl">前列腺增生又称前列腺肥大,是男性中老年人的多发病...</p>
                          </dd>
                        </dl>
                        
                      </div>
                    
                    <div class="zjtd_r3 clr"><a href="">立刻咨询</a></div>
                    <div class="blank20"></div>
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
  <!--sybox end-->
  