<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */

//var_dump($data["data"]);exit;


$q  = $data["q"];
/**
 * 
 * @var pmcaiUrl $url
 */
$req = new httpRequest();
$url  = new pmcaiUrl($req->requestUri());
$cnt  = $data["count"];
$pageSize = $data["pageSize"];
$pageBtnLen = $data["pageBtnLen"];
$curPageNum = $data["curPageNum"];
$data = $data["data"];

$pagination = new pagination($cnt, $curPageNum, $pageSize, $pageBtnLen);
if(is_null($q)){
	$q = "";
}


$str = "23456789abcdefghijkmnpqrstuvwxyz";
$code = '';
for ($i = 0; $i < 6; $i++) {
	$code .= $str[mt_rand(0, strlen($str)-1)];
}

?>
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/lightbox2/dist/css/lightbox.min.css">
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/static/bower_components/jqnotifybar/css/jquery.notifyBar.css">
<script type="text/javascript" src="<?php print HTTP_ENTRY?>/static/bower_components/lightbox2/dist/js/lightbox.min.js"></script>
<script type="text/javascript" src="<?php print HTTP_ENTRY?>/static/bower_components/jqnotifybar/jquery.notifyBar.js"></script>

<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">医生信息列表</h3>
                   
                     
                   
                   
                </div><!-- /.box-header -->
                <div class="box-body">
                <a class="btn bg-olive btn-flat margin" href="<?php print HTTP_ENTRY?>/priv/doctor/addext">
                	 <i class="fa fa-plus"></i> 补充医生信息
                	 </a>
                  <table class="table table-bordered">
                    <tr>
                     
                      <th>医生ID</th>
                      <th>医生姓名</th>
                      <th>等级</th>
                      <th>服务星星</th>
                      <th>推荐热度</th>
                       <th>爱心</th>
                      <th>贡献值 </th>
                      <th>简介</th>
                      <th>擅长</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["dod"]?></td>
                      <td><?php print $item["name"]?></td>
                      <td><?php print $item["lv"]?></td>
                      <td><?php print $item["star"]?></td>
                       <td><?php print $item["hot"]?></td>
                      <td><?php print $item["love"]?></td>
                      <td><?php print $item["contribution"]?></td>
                        <td><?php print $item["desc"]?></td>
                      <td><?php print $item["spec"]?></td>
                     
             
                      
                      <td>
                      	<!-- <i class="fa fa-edit"></i> -->
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/doctor/editext?sid=<?php print $item["dod"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/doctor/rmext?sid=<?php print $item["dod"]?>">删除</a>
                      </td>
                    </tr>

                    <?php endforeach;?>
 
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
 
 <script>



$(".btn-danger").click(function(){
	return confirm("Sihangzhang友情提醒:是否要删除？");
});


</script>
 
                  <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    <?php if($pagination->hasPre()):?>
                      <li><a href="<?php print $url->setQuery("page", $pagination->getPre())->getUrl();?>">&laquo;</a></li>
                      <?php endif;?>
                      
                      <?php for($i=0;$i<$pagination->getPageBtnLen();$i++):?>
                      <li><a href="<?php print $url->setQuery("page", $pagination->getStartPage() + $i)->getUrl()?>"><?php print $pagination->getStartPage() + $i?></a></li>
                      <?php endfor;?>
                      <?php if($pagination->hasNext()):?>
                      <li><a href="<?php print $url->setQuery("page", $pagination->getNext())->getUrl()?>">&raquo;</a></li>
                      <?php endif;?>
                    </ul>
                  </div>
 
                </div>
              </div><!-- /.box -->


</section>

<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
      <form action="<?php print HTTP_ENTRY?>/priv/doctor/forceresetpwd" method="post">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               重置密码
            </h4>
         </div>
         <div class="modal-body">
         			<div class="form-group">
                		<label class="sr-only" for="name">新密码</label>
                		<input type="hidden" name="sid" class="form-control" id="edit_sid">
                		<input type="text" value="<?php print $code?>" required name="pwd" class="form-control" id="edit_data">
                	</div>
         </div>
         <div class="modal-footer">

            <button type="submit" class="btn btn-primary">
               提交更改
            </button>
         </div>
         </form>
      </div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>

<style>
<!--
.jquery-notify-bar{
	width:256px;
	left:50%;
	margin-left:-128px;
}
-->
</style>

<script>

$('#myModal').on('show.bs.modal', function (e) {
	  var target = e.relatedTarget;
	  $("#edit_sid").val($.trim($(target).parent().parent().find("td").first().html()));
});

$(".btn-danger").click(function(){
	return confirm("?");
});

<?php if(!is_null($from) && $from == "frpw"):?>
jQuery(function () {
  jQuery.notifyBar({
    html: "<?php print $msg?>",
    delay: 2000,
    cssClass: <?php if(!is_null($r) && $r == 1):?>"success"<?php else:?>"error"<?php endif?>,
    animationSpeed: "normal"
  });  
});
<?php endif;?>
</script>

