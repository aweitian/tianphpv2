<?php 
/**
 * @var symptomModel;
 */
$m = $model;
if (!$m instanceof symptomModel)exit;
// echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// var_dump($m->getDisease());
// var_dump($m->getDiseaseLv0());exit;

// foreach($m->getDisease() as $item)
// {
	

// }

// exit;

$docinfos=$m->getInfoes(10);

?>
<div class="public_width">
<?php $disease_header_title = "按症状";?>
<?php include dirname(dirname(dirname(__FILE__)))."/inc/header.disease.php"?>

  <!--head end-->

  <!--找医院查疾病问医生-->
  <div class="finddoctor_list">
    <div class="blank30"></div>
    <ul class="nav_content clr">
    
      <li style="display: block;" id="cnzz_yyqy">
        <div class="province_list">
          <ul>
            <li><span class="name cur_name">龟头异常</span></li>
            <li><span class="name">包皮异常</span></li>
            <li><span class="name">阴茎异常</span></li>
            <li><span class="name" style="font-size:.2rem">尿道口异常</span></li>
            <li><span class="name">阴囊异常</span></li>
             <li><span class="name">睾丸异常</span></li>
            <li><span class="name">精液异常</span></li>
            <li><span class="name">射精异常</span></li>
            <li><span class="name">勃起异常</span></li>
            <li><span class="name">排尿异常</span></li>
          </ul>
        </div>
        
        <div class="hospital_list" style="display: block;">
          <div class="list_num" style="display: block;">
          
            <ul class="left_hos clr">
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
              <li><a href="">阴茎瘙痒</a><span>|</span></li>
              <li><a href="">阴茎包皮粘连</a><span>|</span></li>
              <li><a href="">阴茎长小疙瘩</a><span>|</span></li>
              <li><a href="">阴茎疼痛</a><span>|</span></li>
              <li><a href="">阴茎发黑发紫阴</a><span>|</span></li>
              <li><a href="">阴茎黑点黑斑</a><span>|</span></li>
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
            </ul>
            
          </div>
          <div class="list_num" style="display: none;">
            
            <ul class="left_hos clr">
              <li><a href="">2阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
              <li><a href="">阴茎瘙痒</a><span>|</span></li>
              <li><a href="">阴茎包皮粘连</a><span>|</span></li>
              <li><a href="">阴茎长小疙瘩</a><span>|</span></li>
              <li><a href="">阴茎疼痛</a><span>|</span></li>
              <li><a href="">阴茎发黑发紫阴</a><span>|</span></li>
              <li><a href="">阴茎黑点黑斑</a><span>|</span></li>
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
            </ul>
            
          </div>
          <div class="list_num" style="display: none;">
            
            <ul class="left_hos clr">
              <li><a href="">3阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
              <li><a href="">阴茎瘙痒</a><span>|</span></li>
              <li><a href="">阴茎包皮粘连</a><span>|</span></li>
              <li><a href="">阴茎长小疙瘩</a><span>|</span></li>
              <li><a href="">阴茎疼痛</a><span>|</span></li>
              <li><a href="">阴茎发黑发紫阴</a><span>|</span></li>
              <li><a href="">阴茎黑点黑斑</a><span>|</span></li>
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
            </ul>
            
          </div>
          <div class="list_num" style="display: none;">
            
            <ul class="left_hos clr">
              <li><a href="">4阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
              <li><a href="">阴茎瘙痒</a><span>|</span></li>
              <li><a href="">阴茎包皮粘连</a><span>|</span></li>
              <li><a href="">阴茎长小疙瘩</a><span>|</span></li>
              <li><a href="">阴茎疼痛</a><span>|</span></li>
              <li><a href="">阴茎发黑发紫阴</a><span>|</span></li>
              <li><a href="">阴茎黑点黑斑</a><span>|</span></li>
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
            </ul>
            
          </div>
          <div class="list_num" style="display: none;">
            
            <ul class="left_hos clr">
              <li><a href="">5阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
              <li><a href="">阴茎瘙痒</a><span>|</span></li>
              <li><a href="">阴茎包皮粘连</a><span>|</span></li>
              <li><a href="">阴茎长小疙瘩</a><span>|</span></li>
              <li><a href="">阴茎疼痛</a><span>|</span></li>
              <li><a href="">阴茎发黑发紫阴</a><span>|</span></li>
              <li><a href="">阴茎黑点黑斑</a><span>|</span></li>
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
            </ul>
            
          </div>
          <div class="list_num" style="display: none;">
            
            <ul class="left_hos clr">
              <li><a href="">6阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
              <li><a href="">阴茎瘙痒</a><span>|</span></li>
              <li><a href="">阴茎包皮粘连</a><span>|</span></li>
              <li><a href="">阴茎长小疙瘩</a><span>|</span></li>
              <li><a href="">阴茎疼痛</a><span>|</span></li>
              <li><a href="">阴茎发黑发紫阴</a><span>|</span></li>
              <li><a href="">阴茎黑点黑斑</a><span>|</span></li>
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
            </ul>
            
          </div>
          <div class="list_num" style="display: none;">
            
            <ul class="left_hos clr">
              <li><a href="">7阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
              <li><a href="">阴茎瘙痒</a><span>|</span></li>
              <li><a href="">阴茎包皮粘连</a><span>|</span></li>
              <li><a href="">阴茎长小疙瘩</a><span>|</span></li>
              <li><a href="">阴茎疼痛</a><span>|</span></li>
              <li><a href="">阴茎发黑发紫阴</a><span>|</span></li>
              <li><a href="">阴茎黑点黑斑</a><span>|</span></li>
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
            </ul>
            
          </div>
          <div class="list_num" style="display: none;">
            
            <ul class="left_hos clr">
              <li><a href="">8阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
              <li><a href="">阴茎瘙痒</a><span>|</span></li>
              <li><a href="">阴茎包皮粘连</a><span>|</span></li>
              <li><a href="">阴茎长小疙瘩</a><span>|</span></li>
              <li><a href="">阴茎疼痛</a><span>|</span></li>
              <li><a href="">阴茎发黑发紫阴</a><span>|</span></li>
              <li><a href="">阴茎黑点黑斑</a><span>|</span></li>
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
            </ul>
            
          </div>
          <div class="list_num" style="display: none;">
            
            <ul class="left_hos clr">
              <li><a href="">9阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
              <li><a href="">阴茎瘙痒</a><span>|</span></li>
              <li><a href="">阴茎包皮粘连</a><span>|</span></li>
              <li><a href="">阴茎长小疙瘩</a><span>|</span></li>
              <li><a href="">阴茎疼痛</a><span>|</span></li>
              <li><a href="">阴茎发黑发紫阴</a><span>|</span></li>
              <li><a href="">阴茎黑点黑斑</a><span>|</span></li>
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
            </ul>
            
          </div>
          <div class="list_num" style="display: none;">
            
            <ul class="left_hos clr">
              <li><a href="">10阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
              <li><a href="">阴茎瘙痒</a><span>|</span></li>
              <li><a href="">阴茎包皮粘连</a><span>|</span></li>
              <li><a href="">阴茎长小疙瘩</a><span>|</span></li>
              <li><a href="">阴茎疼痛</a><span>|</span></li>
              <li><a href="">阴茎发黑发紫阴</a><span>|</span></li>
              <li><a href="">阴茎黑点黑斑</a><span>|</span></li>
              <li><a href="">阴茎红点红疹</a><span>|</span></li>
              <li><a href="">阴茎红肿潮红</a><span>|</span></li>
              <li><a href="">阴茎滴白流脓</a><span>|</span></li>
            </ul>
            
          </div>
        </div>
        
      			</li>
            </ul>
          </div>
  <!---->
  <div class="blank30"></div>
</div>

  