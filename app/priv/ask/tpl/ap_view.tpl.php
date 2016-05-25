<?php
/**
 * Date: 2016年5月25日
 * Auth: Awei.tian
 * Desc:
 * 		
 */
//  var_dump($data);
$hasData = count($data) !== 0;

$ask = array();
if($hasData)
{
	$ask["title"] = $data[0]["title"];
	$ask["disease"] = $data[0]["data"];
	$ask["desc"] = $data[0]["desc"];
	$ask["svr"] = $data[0]["svr"];
	$ask["files"] = $data[0]["files"];
}
?>
<section class="content">

<!-- Construct the box with style you want. Here we are using box-danger -->
<!-- Then add the class direct-chat and choose the direct-chat-* contexual class -->
<!-- The contextual class should match the box, so we are using direct-chat-danger -->
<div class="box box-info direct-chat direct-chat-info">
  <div class="box-header with-border">
    <h3 class="box-title">问答内容显示</h3>
  </div><!-- /.box-header -->
  
  <div class="box-body" style="padding:10px;">
  
  	<?php if($hasData):?>
	<dl>
		<dt>标题</dt>
		<dd><?php print $ask["title"]?></dd>
		<dt>病种</dt>
		<dd><?php print $ask["disease"]?></dd>
		<dt>病情描述</dt>
		<dd><?php print $ask["desc"]?></dd>
		<dt>希望提供的帮助</dt>
		<dd><?php print $ask["svr"]?></dd>
		<?php if($ask["files"] != ""):?>
		<?php 
			$files = explode(",",$ask["files"]);
		?>
		<dt>希望提供的帮助</dt>
		<?php foreach ($files as $file):?>
		<dd><img src="<?php print HTTP_ENTRY?>/upload/ask/<?php print $ask["svr"]?>"></dd>
		<?php endforeach;?>
		<?php endif;?>
	</dl>
  	<?php endif;?>
  	
  	
  
  
    <!-- Conversations are loaded here -->
    <div class="">
    
    	<?php foreach ($data as $item):?>
  		<?php if($item["role"] == "user"):?>
		  	<div class="direct-chat-msg">
		        <div class="direct-chat-info clearfix">
		          <span class="direct-chat-name pull-left"><?php print $item["email"]?></span>
		          <span class="direct-chat-timestamp pull-right"><?php print $item["ap_date"]?></span>
		        </div><!-- /.direct-chat-info -->
		        <img class="direct-chat-img" src="<?php print HTTP_ENTRY?>/static/avatar/<?php print $item["usr_avatar"]?>" alt="message user image"><!-- /.direct-chat-img -->
		        <div class="direct-chat-text">
		          <?php print $item["content"]?>
		        </div><!-- /.direct-chat-text -->
		      </div><!-- /.direct-chat-msg -->
  	
  		<?php else:?>
		  		<div class="direct-chat-msg right">
		        <div class="direct-chat-info clearfix">
		          <span class="direct-chat-name pull-right"><?php print $item["doc_name"]?></span>
		          <span class="direct-chat-timestamp pull-left"><?php print $item["ap_date"]?></span>
		        </div><!-- /.direct-chat-info -->
		        <img class="direct-chat-img" src="<?php print HTTP_ENTRY?>/static/doctor/<?php print $item["doc_avatar"]?>" alt="message user image"><!-- /.direct-chat-img -->
		        <div class="direct-chat-text">
		          <?php print $item["content"]?>
		        </div><!-- /.direct-chat-text -->
		      </div><!-- /.direct-chat-msg -->
		   
  		
  		<?php endif;?>
  		<?php endforeach;?>
    
     </div><!--/.direct-chat-messages-->
    
      <!-- Message. Default to the left -->
      

      <!-- Message to the right -->
   </div><!-- /.box-body -->

</div><!--/.direct-chat -->

</section>