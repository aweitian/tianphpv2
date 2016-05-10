<?php
/**
 * Date: May 10, 2016
 * Author: Awei.tian
 * Description: 
 */
?>

		<section class="content">
			<div class="box box-warning">
                <div class="box-header with-border">
                  <h3 class="box-title">批量导入数据</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/disease/import">
                    <!-- text input -->
                    

                    <!-- textarea -->
                    <div class="form-group">
                      <label>病种,疾病数据</label>
                      <textarea id="main_data" name="data" class="form-control" rows="8" placeholder="每行一个批量导入"></textarea>
                    </div>


				<div class="form-group">
                    <button type="submit" class="btn btn-primary">提交</button>
                    <button id="showRefBtn" type="button" class="btn bg-olive btn-flat">参考数据</button>
                  </div>
                   


                  </form>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
        </section>
<textarea id="example" class="hidden">
前列腺疾病
	前列腺炎
	前列腺增生
	前列腺肥大
	前列腺囊肿
	前列腺痛
	前列腺癌
性功能障碍
	阳痿
	早泄
	勃起功能障碍
	射精功能障碍
	过度手淫
性传播疾病
	尖锐湿疣
	生殖器疱疹
	非淋
	梅毒
	淋病
	艾滋病
生殖整形
	包皮过长
	包皮包茎
	精索静脉曲张
	鞘膜积液
	疝气
	隐睾症
泌尿感染
	包皮龟头炎
	尿道炎
	睾丸炎
	精囊炎
	膀胱炎
	附睾炎
男性不育
	精液异常
	精道异常
	睾丸异常
	肾虚
	男性不育症
</textarea>
<script>
var bak;
$("#showRefBtn").click(function(){
	if(this.innerHTML == "参考数据"){
		bak = $("#main_data").val();
		$("#main_data").val($("#example").val());
		this.innerHTML = "恢复到原来数据";
	}else{
		$("#main_data").val(bak);
		this.innerHTML = "参考数据";
	}
});

</script>