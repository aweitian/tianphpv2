<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
$err = $data["err"];
$data = $data["data"];



?>
<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">医生职位列表</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                	<form class="form-inline" method="post" action="<?php print HTTP_ENTRY?>/priv/doctor/addlv">
                	<div class="form-group">
                		<label class="sr-only" for="name">名称</label>
                		<input required type="text" name="data" class="form-control">
                	</div>
                	<button type="submit" class="btn bg-olive btn-flat margin">
                	 <i class="fa fa-plus"></i> 添加
                	 </button>
                	</form>
                	 
                        
                
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>职位名称</th>
                      <th width="30%">操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["sid"]?></td>
                      <td>
                      		<?php print $item["data"]?>
                      </td>
                      <td>
                      	<!-- <i class="fa fa-edit"></i> -->
                        <a class="btn btn-default" data-toggle="modal" data-target="#myModal"> 编辑</a>
                        <a class="btn btn-danger" href="<?php print HTTP_ENTRY?>/priv/doctor/rmlv?sid=<?php print $item["sid"]?>">删除</a>
                        
                      </td>
                    </tr>
                    
                    
                    <?php endforeach;?>
                    
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
 
                </div>
              </div><!-- /.box -->


</section>



<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
      <form action="<?php print HTTP_ENTRY?>/priv/doctor/editlv" method="post">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               编辑医生职位
            </h4>
         </div>
         <div class="modal-body">
         			<div class="form-group">
                		<label class="sr-only" for="name">名称</label>
                		<input type="hidden" name="sid" class="form-control" id="edit_sid">
                		<input type="text" required name="data" class="form-control" id="edit_data">
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
<?php if($err):?>
alert("<?php print $err?>");
<?php endif;?>


$(function () { 
	$('#myModal').on('show.bs.modal', function (e) {
		  var target = e.relatedTarget;
		  $("#edit_data").val($.trim($(target).parent().prev().html()));
		  $("#edit_sid").val($.trim($(target).parent().prev().prev().html()));
	})

 });

$(".btn-danger").click(function(){

	return confirm("?");
});

</script>

