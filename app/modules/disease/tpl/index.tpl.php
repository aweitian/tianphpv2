<?php 
/**
 * @var diseaseModel;
 */
$m = $model;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());

$tree_dis = array();
foreach ($m->getDisease() as $item){
	if(!array_key_exists($item["pid"], $tree_dis)){
		$tree_dis[$item["pid"]] = array(
				"text" => $item["pd"],
				"children" => array()
		);
	}
	$tree_dis[$item["pid"]]["children"][$item["mid"]] = $item["md"];
}
 




// foreach($m->getDisease() as $item)
// {
	

// }

// exit;
?>
  
  <div class="blank15"></div>
  <div class="sybox clearfix">
    <div>
      
      <div class="clr">
      	
          <div class="fz13 jbcx_con">
                
               <div class="jbcx_box1">
               		<p class="blank30"></p>
               		<p>
                    	<img src="<?php print HTTP_ENTRY?>/static/images/jbcx_img1.png" class="fl" />
                        <h6 class="fl">前列腺疾病<br /><span>Prostatic diseases</span></h6>
                    </p>
                    <p class="blank15"></p>
                    <p class="clr jbcx_sm1">
                    	<a href="">前列腺炎</a><span></span>
                        <a href="">前列腺痛</a><span></span>
                        <a href="">前列腺肥大</a><br />
                        <a href="">前列腺囊</a><span></span>
                        <a href="">肿前列腺增生</a><span></span>
                        <a href="">前列腺癌</a>
                    </p>
                    
               </div>
               
               <div class="jbcx_box1 pl40">
               		<p class="blank30"></p>
               		<p>
                    	<img src="<?php print HTTP_ENTRY?>/static/images/jbcx_img2.png" class="fl" />
                        <h6 class="fl">性功能障碍<br /><span>sexual dysfunction</span></h6>
                    </p>
                    <p class="blank15"></p>
                    <p class="clr jbcx_sm1">
                    	<a href="">阳痿</a><span></span>
                        <a href="">早泄</a><span></span>
                        <a href="">过度手淫</a><span></span>
                        <a href="">射精功能障碍</a><br />
                        <a href="">勃起功能障碍</a>
                    </p>
                    
               </div>
               
               <div class="jbcx_box1 pl40 borrg0">
               		<p class="blank30"></p>
               		<p>
                    	<img src="<?php print HTTP_ENTRY?>/static/images/jbcx_img3.png" class="fl" />
                        <h6 class="fl">男科手术<br /><span>Male division operation</span></h6>
                    </p>
                    <p class="blank15"></p>
                    <p class="clr jbcx_sm1">
                    	<a href="">阴茎延长</a><span></span>
                        <a href="">阴茎弯曲</a><span></span>
                        <a href="">阴茎矫正</a><br />
                        <a href="">精索静脉曲张</a><span></span>
                        <a href="">尿道下裂</a><span></span>
                        <a href="">疝气</a><span></span>
                        <a href="">睾丸囊肿</a><br />
                        <a href="">附睾囊肿</a><span></span>
                        <a href="">隐睾</a><span></span>
                        <a href="">鞘膜积液</a><span></span>
                        <a href="">包皮包茎</a>
                    </p>
                    
               </div>
               
               <div class="jbcx_box1 borbt1">
               		<p class="blank30"></p>
               		<p>
                    	<img src="<?php print HTTP_ENTRY?>/static/images/jbcx_img4.png" class="fl" />
                        <h6 class="fl">性传播疾病<br /><span>Sexually transmitted diseases</span></h6>
                    </p>
                    <p class="blank15"></p>
                    <p class="clr jbcx_sm1">
                    	<a href="">生殖器疱疹</a><span></span>
                        <a href="">尖锐湿疣</a><span></span>
                        <a href="">淋病</a><span></span>
                        <a href="">梅毒</a><br />
                        <a href="">阴虱病</a>
                    </p>
                    
               </div>
               
               <div class="jbcx_box1 pl40 borbt1">
               		<p class="blank30"></p>
               		<p>
                    	<img src="<?php print HTTP_ENTRY?>/static/images/jbcx_img5.png" class="fl" />
                        <h6 class="fl">泌尿感染<br /><span>Urinary tract infection</span></h6>
                    </p>
                    <p class="blank15"></p>
                    <p class="clr jbcx_sm1">
                    	<a href="">包皮龟头炎</a><span></span>
                        <a href="">尿道炎</a><span></span>
                        <a href="">睾丸炎</a><span></span>
                        <a href="">精囊炎</a><br />
                        <a href="">膀胱炎</a><span></span>
                        <a href="">附睾炎</a><span></span>
                        <a href="">阴囊炎</a>
                    </p>
                    
               </div>
               
               <div class="jbcx_box1 pl40 borrg0 borbt1">
               		<p class="blank30"></p>
               		<p>
                    	<img src="<?php print HTTP_ENTRY?>/static/images/jbcx_img6.png" class="fl" />
                        <h6 class="fl">男性不育<br /><span>Male infertility</span></h6>
                    </p>
                    <p class="blank15"></p>
                    <p class="clr jbcx_sm1">
                    	<a href="">精子异常</a><span></span>
                        <a href="">精索静脉曲张</a><span></span>
                        <a href="">睾丸异常</a><br />
                        <a href="">射精障碍</a><span></span>
                        <a href="">精道异常</a><span></span>
                        <a href="">外生殖器异常</a>
                    </p>
                    
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
  