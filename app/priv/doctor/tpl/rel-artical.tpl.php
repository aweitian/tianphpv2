<?php
/**
 * Date: May 11, 2016
 * Author: Awei.tian
 * Description: 
 */
// $q  = $data["q"];
/**
 * 
 * @var pmcaiUrl $url
 */
// $url  = $data["url"];
// $cnt  = $data["count"];
// $pageSize = $data["pageSize"];
// $pageBtnLen = $data["pageBtnLen"];
// $curPageNum = $data["curPageNum"];
// $data = $data["data"];

// $pagination = new pagination($cnt, $curPageNum, $pageSize, $pageBtnLen);
// if(is_null($q)){
// 	$q = "";
// }

$doctor_infoes = $data["doctor_infoes"];

$dc = array();
foreach ($doctor_infoes as $item){
	if(!array_key_exists($item["pid"], $dc)){
		$dc[$item["pid"]] = array();
	}
	
	$dc[$item["pid"]][$item["mid"]] = array($item["md"],$item["pd"]);
}

// var_dump($dc);exit;

?>
<section class="content">

<div class="row">
	<div class="col-md-6">
		<!-- general form elements disabled -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form">
          		<div class="form-group">
                  <label>Select Multiple Disabled</label>
                  <select class="form-control">
                    <option>option 1</option>
                    <option>option 2</option>
                    <option>option 3</option>
                    <option>option 4</option>
                    <option>option 5</option>
                  </select>
                </div>
                
                
                <div id="artical-group">
	                <!-- checkbox -->
	                <div class="form-group">
	                  <div class="checkbox">
	                    <label>
	                      <input type="checkbox">
	                      Checkbox 1
	                    </label>
	                  </div>
	
	                  <div class="checkbox">
	                    <label>
	                      <input type="checkbox">
	                      Checkbox 2
	                    </label>
	                  </div>
	
	                  <div class="checkbox">
	                    <label>
	                      <input type="checkbox" disabled>
	                      Checkbox disabled
	                    </label>
	                  </div>
	                </div>
                
                </div>
                

                

               <div class="form-group">
                    <button type="submit" class="btn btn-primary">提交</button>
                  </div>


              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
	
	</div>
	<div class="col-md-6">
	
		<div class="box box-default">b</div>
	
	</div>
</div>
                        


</section>













<!-- 模态框（Modal） -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" 
   aria-labelledby="myModalLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" 
               data-dismiss="modal" aria-hidden="true">
                  &times;
            </button>
            <h4 class="modal-title" id="myModalLabel">
              选择文章
            </h4>
         </div>
         <div class="modal-body">

         
         
         
         
         
         
         
         
         
         


          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">Tab 1</a></li>
              <li><a href="#tab_2" data-toggle="tab">Tab 2</a></li>
              <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                <b>How to use:</b>

                <p>Exactly like the original bootstrap tabs except you should use
                  the custom wrapper <code>.nav-tabs-custom</code> to achieve this style.</p>
                A wonderful serenity has taken possession of my entire soul,
                like these sweet mornings of spring which I enjoy with my whole heart.
                I am alone, and feel the charm of existence in this spot,
                which was created for the bliss of souls like mine. I am so happy,
                my dear friend, so absorbed in the exquisite sense of mere tranquil existence,
                that I neglect my talents. I should be incapable of drawing a single stroke
                at the present moment; and yet I feel that I never was a greater artist than now.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                The European languages are members of the same family. Their separate existence is a myth.
                For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ
                in their grammar, their pronunciation and their most common words. Everyone realizes why a
                new common language would be desirable: one could refuse to pay expensive translators. To
                achieve this, it would be necessary to have uniform grammar, pronunciation and more common
                words. If several languages coalesce, the grammar of the resulting language is more simple
                and regular than that of the individual languages.
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                Lorem Ipsum has been the industry's standard dummy text ever since the 1500s,
                when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                It has survived not only five centuries, but also the leap into electronic typesetting,
                remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                sheets containing Lorem Ipsum passages, and more recently with desktop publishing software
                like Aldus PageMaker including versions of Lorem Ipsum.
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>

         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-primary">
               提交更改
            </button>
         </div>
      </div><!-- /.modal-content -->
</div><!-- /.modal -->
</div>




















<script>
$(".btn-danger").click(function(){

	return confirm("?");
});

</script>

