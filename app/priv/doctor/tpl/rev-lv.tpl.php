<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
$meta = $data["meta"]->return;
$data = $data["data"];

// var_dump($meta);exit;
?>

<section class="content">

		<div class="box">
                <div class="box-header with-border">
                  <h3 class="box-title">文章筛选</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
    
                  <table class="table table-bordered">
                    <tr>
                      <th style="width: 20px">#</th>
                      <th>医生</th>
                      <th>职位</th>
                      <th>操作</th>
                    </tr>
                    <?php foreach ($data as $item):?>
                    <tr>
                      <td><?php print $item["dod"]?></td>
                      <td><?php print $item["name"]?></td>
                      <td><?php print $item["lv"]?></td>
                      <td>
                      
                       <a class="btn bg-green" data-dmd="<?php print $item["dmd"]?>" data-toggle="modal" data-target="#myModal"> 修改</a>
                        
                      </td>
  						
                    </tr>
                    
                    
                    <?php endforeach;?>
                    
                    
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer clearfix">
 
 
 
                  <div class="box-tools">
                  

                  </div>
 
 
 
 
 
                </div>
              </div><!-- /.box -->


</section>




<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
      <form action="<?php print HTTP_ENTRY?>/priv/doctor/resetlv" method="post">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
               重置职位
            </h4>
         </div>
         <div class="modal-body">
        	 <div class="form-group">
        	 	<div class="form-static" id="m-name"></div>
         	</div>
         			<div class="form-group">
                		<label class="sr-only" for="name">职位</label>
                		<input type="hidden" name="sid" class="form-control" id="edit_sid">
                		<select class="form-control" name="lv" id="edit_lv">
                		<?php foreach ($meta as $m):?>
                		
                		
                		<option value="<?php print $m["sid"]?>"><?php print $m["data"]?></option>
                		<?php endforeach;?>
                		</select>
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
	  $("#m-name").html($.trim($(target).parent().parent().find("td").eq(1).html()));
	  $("#edit_sid").val($.trim($(target).parent().parent().find("td").first().html()));
	  $("#edit_lv").val(target.getAttribute("data-dmd"));
})
</script>

