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
  	
	<a class="btn bg-olive" href="<?php print HTTP_ENTRY?>/priv/ask/append?r=d&askid=<?php print $_REQUEST["sid"]?>">添加医生回答</a>
	<a class="btn bg-purple" href="<?php print HTTP_ENTRY?>/priv/ask/append?r=u&askid=<?php print $_REQUEST["sid"]?>">添加患者追问</a>
	<a class="btn bg-maroon" href="<?php print HTTP_ENTRY?>/priv/ask/present?askid=<?php print $_REQUEST["sid"]?>">给医生送花</a>
                      
  	
  
  
    <!-- Conversations are loaded here -->
    <div class="">
    
    	<?php foreach ($data as $item):?>
  		<?php if($item["role"] == "user"):?>
		  	<div class="direct-chat-msg">
		        <div class="direct-chat-info clearfix">
		          <span class="direct-chat-name pull-left"><?php print $item["email"]?></span>
		          <span class="direct-chat-timestamp pull-right"><?php print $item["ap_date"]?></span>
		        </div><!-- /.direct-chat-info -->
		        <img class="direct-chat-img" src="<?php print AppUrl::getMediaPath()?>/avatar/<?php print $item["usr_avatar"]?>" alt="message user image"><!-- /.direct-chat-img -->
		        <div class="direct-chat-text">
		        	<?php if($item["conmeta"] == "text"):?>
		        
		          	<?php print $item["content"]?>
		          	
		          	<?php else:?>
		          	
		          	<?php $tmp = explode(",", $item["content"]);?>
		          	<i class="fa fa-gift" style="font-size:28px;"></i> <?php print $tmp[1]?><br><br>
		          	
		          	<img style="width:64px;height:64px;" src="<?php print AppUrl::getMediaPath()?>/present/<?php print $tmp[0]?>">
        
		          	
		          	<?php endif;?>
		          	
		          	<hr>
		          
		          <a style=';' onclick='return confirm("?")' href='<?php print HTTP_ENTRY?>/priv/ask/appendrm?sid=<?php print $item["aspapid"]?>'>删除</a>
		          |
		          <a style=';' href='<?php print HTTP_ENTRY?>/priv/ask/append?r=u&askid=<?php print $item["sid"]?>&sid=<?php print $item["aspapid"]?><?php if(isset($_SERVER["HTTP_REFERER"])):?>&listret=<?php print urlencode($_SERVER["HTTP_REFERER"])?><?php endif?>'>编辑</a>
		        
		        </div><!-- /.direct-chat-text -->
		      </div><!-- /.direct-chat-msg -->
  	
  		<?php else:?>
		  		<div class="direct-chat-msg right">
		        <div class="direct-chat-info clearfix">
		          <span class="direct-chat-name pull-right"><?php print $item["doc_name"]?></span>
		          <span class="direct-chat-timestamp pull-left"><?php print $item["ap_date"]?></span>
		        </div><!-- /.direct-chat-info -->
		        <img class="direct-chat-img" src="<?php print AppUrl::getMediaPath()?>/doctor/170X170/<?php print $item["doc_avatar"]?>" alt="message user image"><!-- /.direct-chat-img -->
		        <div class="direct-chat-text">
		          <?php print $item["content"]?>
		          
		          <hr>
		          
		          <a style='color:white;' onclick='return confirm("?")' href='<?php print HTTP_ENTRY?>/priv/ask/appendrm?sid=<?php print $item["aspapid"]?>'>删除</a>
		          |
		          <a style='color:white;' href='<?php print HTTP_ENTRY?>/priv/ask/append?r=d&askid=<?php print $item["sid"]?>&sid=<?php print $item["aspapid"]?><?php if(isset($_REQUEST["listret"])):?>&listret=<?php print urlencode($_REQUEST["listret"])?><?php endif?>'>编辑</a>
		        </div><!-- /.direct-chat-text -->
		      </div><!-- /.direct-chat-msg -->
		   
  		
  		<?php endif;?>
  		<?php endforeach;?>
    
     </div><!--/.direct-chat-messages-->
    

     	<a class="btn bg-olive" href="<?php print HTTP_ENTRY?>/priv/ask/append?r=d&askid=<?php print $_REQUEST["sid"]?>">添加医生回答</a>
	<a class="btn bg-purple" href="<?php print HTTP_ENTRY?>/priv/ask/append?r=u&askid=<?php print $_REQUEST["sid"]?>">添加患者追问</a>
	<a class="btn bg-maroon" href="<?php print HTTP_ENTRY?>/priv/ask/present?askid=<?php print $_REQUEST["sid"]?>">给医生送花</a>
    
     
   </div><!-- /.box-body -->

</div><!--/.direct-chat -->

</section>