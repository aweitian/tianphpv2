<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
$q  = $data["q"];
/**
 * 
 * @var pmcaiUrl $url
 */
$url  = $data["url"];
$cnt  = $data["count"];
$pageSize = $data["pageSize"];
$pageBtnLen = $data["pageBtnLen"];
$curPageNum = $data["curPageNum"];
$doctor_lv = $data["doctor_lv"];
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
<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">医生列表</h3>
                   
                     
                   
                   
                </div><!-- /.box-header -->
                <div class="box-body">
                <a class="btn bg-olive btn-flat margin" href="<?php print HTTP_ENTRY?>/priv/doctor/add">
                	 <i class="fa fa-plus"></i> 添加医生
                	 </a>
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>登陆ID</th>
                      <th>姓名</th>
                      <th>职称</th>
                      <th>日期</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td><?php print $item["email"]?></td>
                      <td><?php print $item["name"]?></td>
                      <td><?php print $item["phone"]?></td>
                      <td><?php print $item["date"]?></td>
                      
                      <td>
                      	<!-- <i class="fa fa-edit"></i> -->
                        <a class="btn btn-default" href="<?php print HTTP_ENTRY?>/priv/doctor/edit?sid=<?php print $item["sid"]?>"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/doctor/rm?sid=<?php print $item["sid"]?>">删除</a>
                        <a class="btn bg-orange" data-toggle="modal" data-target="#myModal"> 重置密码</a>
                      </td>
                    </tr>
                    
                    
                    <?php endforeach;?>
                    
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
 
 
 
                  <div class="box-tools">
                    <ul class="pagination pagination-sm no-margin pull-right">
                    <?php if($pagination->hasPre()):?>
                      <li><a href="<?php print $url->setQuery("page", $pagination->getPre())->getUrl();?>">&laquo;</a></li>
                      <?php endif;?>
                      
                      <?php for($i=0;$i<$pagination->getMaxPage();$i++):?>
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


























<script>

$('#myModal').on('show.bs.modal', function (e) {
	  var target = e.relatedTarget;
	  $("#edit_sid").val($.trim($(target).parent().parent().find("td").first().html()));
});

$(".btn-danger").click(function(){
	return confirm("?");
});

</script>

