  <div class="fr wid300 fz13">
                	
                    <div class="jb_rg">
                        <textarea placeholder="在此咨询，专业医师在线提供就医指导" class="jb_rg1 fl color9"></textarea>
                        <input type="button" class="jb_rg2 fl" />
                    </div>
                	
                   <div class="blank20"></div>
                	
                    <div class="docsug border2">
                      <div class="syrboxtit fz18 graybg clearfix"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="fl">医师观点</a><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="fz13 blue fr" href="<?php print AppUrl::navArticle()?>">+更多</a></div>
    <div class="docsugbox fz13">
    
    <?php $thumb = $model->getRowThumbnail();?>
   
    <?php if (!empty($thumb)):?>
   
    <dl class="clearfix">
    	<dt class="fl">
    			<?php if (!empty($a1["thumb"])):?>
                        	<a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($thumb["aid"])?>">
    		<img src="<?php print $thumb["thumb"]?>" width="80" height="60" />
    		</a>
                        	<?php else:  ?>
                        	<img src="<?php print AppUrl::getMediaPath()?>/images/zt_img1.jpg" width="80" heigth="80" />
                        	           <?php endif?>
    	</dt>
      <dd class="fl">
      <p><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleByAid($thumb["aid"])?>"><?php print $thumb["title"]?></a></p>
      
      <p class="p2 clearfix">
      <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="fl gray"><?php print $thumb["date"]?></a>
      </p>
      </dd>
      </dl>
      <?php endif?>
      
      <p class="blank15"></p>
      <ul class="othsug">
      	
          
          	
       <?php foreach($model->getNewest(5) as $aitem):?>  
       <?php $dod= $model->getOwner($aitem["aid"])?> 
	              <?php  $doc=($model->getInfoByDod($dod))?> 
   <?php if (!empty($doc["name"])):?>
      <li><p class="p1"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="black" href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print utility::utf8Substr($aitem["title"], 0, 18) ?></a></p><p class="p2"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="gray" href="<?php print AppUrl::articleByAid($aitem["aid"])?>"><?php print $model->getContent($aitem["aid"],16)?>...[全文]</a></p></li>
    <?php endif?>  
     <?php endforeach;?>
      </ul>      
                          </div>          
                    </div>
                  
                  <div class="blank20"></div>
               
                
                  
                
                  <div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="fl">症状自查</a></div>
                        <div class="jb_jbzc fz13">
                          <ul class="clearfix">
                             <?php foreach($model->getSydsBydid($row["sid"]) as $zz):?>                        
                            <li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::articleBySyd($zz) ?>"><?php print $model->getNameBySyd($zz) ?></a></li>
                            <?php endforeach;?>
                          </ul>
                        </div>
                      </div>
                      
                  <div class="blank20"></div>
                  
                  <script src="<?php print AppUrl::getMediaPath()?>/js/guahao.js"></script>
      <div class="syrbox4 border2">
        <div class="syrboxtit fz18 graybg">预约挂号</div>
        <div class="syrbox4nr fz13">
        
  <form name="form1" action="http://swt.gssmart.com/guahao/sockt.php" method="post" onSubmit="return guahao()" >
            <table>
              <tr>
                <td height="26"  width="62">姓      名</td>
                <td><input name="名称" id="name" class="input1 border2" type="text" /></td>
              </tr>
              <tr height="14">
                <td></td>
              </tr>
              <tr>
                <td width="62">联系电话</td>
                <td><input id="hometel" name="电话" class="input1 border2" type="text" /></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
              <tr>
                <td width="62">预约时间</td>
                <td><input id="yudate" class="input2 gray border2" name="预约时间" onclick="WdatePicker()" placeholder="请选择预约时间" type="text" /></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
              <tr>
                <td width="62">就诊状态</td>
                <td><input id="ismode" type="radio" name="就诊状态"  checked="checked" />
                  <label> 初诊</label>
                  <input id="ismode" class="input3" type="radio" name="就诊状态" />
                  <label> 复诊</label></td>
              </tr>
              <tr height="14" >
                <td></td>
              </tr>
            </table>
            <div class="sybtn">
              <button class="sybtn1" type="submit" value=""><img src="<?php print AppUrl::getMediaPath()?>/images/syrth8.jpg" width="120" height="40" /></button>
              <button value=""><img src="<?php print AppUrl::getMediaPath()?>/images/syrth9.jpg" width="120" height="40" /></button>
            </div>
          </form>
                    </div>
                  </div>
                  
                  <div class="blank20"></div>
                  
                  <div class="hotbq border2">
                        <div class="syrboxtit fz18 graybg clearfix"><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> class="fl">热门标签</a></div>
                        <div class="hotbqbox fz13">
                          <ul class="clearfix">
                    <?php foreach($model->getSiblingDids($row["sid"]) as $xbz):?>   	
                  
                            <li><a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::disHomeByDiseasekey($xbz["key"])?>"><?php print $xbz["data"] ?></a></li>
            <?php endforeach;?>
                          </ul>
                        </div>
                      </div>
                      
                  <div class="blank20"></div>
                  
                  <div class="syrbox2">
                    <p>
                    <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl() ?>">
                    <img src="<?php print AppUrl::getMediaPath()?>/images/syrth1.jpg" width="300" height="100" />
    </a>
                    </p>
                    <p class="blank10"></p>
                    <p>
                    <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl() ?>">
                    <img src="<?php print AppUrl::getMediaPath()?>/images/syrth2.jpg" width="300" height="100" /></p>
                    <p class="blank10">
                    </a>
                    </p>
                    <p>
                    <a<?php if(TARGET_BLANK_OPEN):?> target="_blank"<?php endif?> href="<?php print AppUrl::getSwtUrl() ?>">
                    <img src="<?php print AppUrl::getMediaPath()?>/images/syrth3.jpg" width="300" height="100" />
                    </a>
                    </p>
                  </div>
                </div>