  <div class="fr wid300 fz13">
                	
                    <div class="jb_rg">
                        <textarea placeholder="在此咨询，专业医师在线提供就医指导" class="jb_rg1 fl color9"></textarea>
                        <input type="button" class="jb_rg2 fl" />
                    </div>
                	
                   <div class="blank20"></div>
                	
                    <div class="docsug border2">
                      <div class="syrboxtit fz18 graybg clearfix"><a class="fl">医师观点</a><a class="fz13 blue fr" href="<?php print AppUrl::navArticle()?>">+更多</a></div>
    <div class="docsugbox fz13">
    
    <?php $thumb = $model->getRowThumbnail();?>
   
    <?php if (!empty($thumb)):?>
   
    <dl class="clearfix">
    	<dt class="fl">
    		<a href="<?php print AppUrl::articleByAid($thumb["aid"])?>"><img src="<?php print $thumb["thumb"]?>" width="80" height="60" /></a>
    	</dt>
      <dd class="fl">
      <p><a href="<?php print AppUrl::articleByAid($thumb["aid"])?>"><?php print $thumb["title"]?></a></p>
      
      <p class="p2 clearfix">
      <a class="fl gray"><?php print $thumb["date"]?></a>
      </p>
      </dd>
      </dl>
      <?php endif?>
      
      <p class="blank15"></p>
      <ul class="othsug">
      	
          
          	
       <?php foreach($model->getNewest(5) as $aitem):?>   	
      <li><p class="p1"><a class="black" href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print utility::utf8Substr($aitem["title"], 0, 18) ?></a></p><p class="p2"><a class="gray" href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print $model->getContent($aitem["aid"],18)?>...[全文]</a></p></li>
     <?php endforeach;?>
      </ul>      
                          </div>          
                    </div>
                  
                  <div class="blank20"></div>
               
                
                  
                
                  <div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a class="fl">症状自查</a></div>
                        <div class="jb_jbzc fz13">
                          <ul class="clearfix">
                             <?php foreach($model->getSydsBydid($row["sid"]) as $zz):?>  
                         
                            <li><a href="<?php print AppUrl::articleBySyd($zz) ?>"><?php print $model->getNameBySyd($zz) ?></a></li>
                            <?php endforeach;?>
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
                    <?php foreach($model->getSiblingDids($row["sid"]) as $xbz):?>   	
                  
                            <li><a href="<?php print AppUrl::disHomeByDiseasekey($xbz["key"])?>"><?php print $xbz["data"] ?></a></li>
            <?php endforeach;?>
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