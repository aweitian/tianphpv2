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
                  <form role="form" method="post" action="<?php print HTTP_ENTRY?>/priv/symptom/import">
                    <!-- text input -->
                    

                    <!-- textarea -->
                    <div class="form-group">
                      <label>症状数据(同一级前面的TAB个数要相同)</label>
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
龟头异常症状
	龟头16大症状
	龟头白点
	龟头白色分泌物
	龟头不露
	龟头不硬
	龟头长红疹
	龟头长肉芽
	龟头长小颗粒
	龟头滴白
	龟头发白
	龟头发黑发紫
	龟头黑点黑斑
	龟头红点
	龟头红肿
	龟头溃疡
	龟头流脓
	龟头敏感
	龟头破皮
	龟头瘙痒
	龟头水泡
	龟头疼痛
	龟头蜕皮
	龟头脱皮
	龟头异味
	龟头有疙瘩
	龟头有红红斑
包皮异常症状
	包皮白点
	包皮长小颗粒
	包皮出血
	包皮发白
	包皮分泌物
	包皮疙瘩
	包皮垢
	包皮黑点黑斑
	包皮红点
	包皮红肿
	包皮红肿瘙痒
	包皮开裂
	包皮溃疡
	包皮溃疡溃烂
	包皮流脓
	包皮嵌顿
	包皮肉刺肉芽
	包皮瘙痒
	包皮水泡
	包皮疼痛
	包皮脱皮
	包皮系带
	包皮痒
	包皮异常症状
	包皮异味
	包皮增生物
	包皮粘连
阴茎异常症状
	阴茎长白点
	阴茎长菜花状肉芽
	阴茎长水泡
	阴茎长小颗粒
	阴茎潮红
	阴茎滴白
	阴茎滴白流脓
	阴茎发白
	阴茎发黑发紫
	阴茎冠状沟疙瘩
	阴茎红点红疹
	阴茎红肿
	阴茎红肿疙瘩
	阴茎溃疡
	阴茎溃疡溃烂
	阴茎流脓
	阴茎肉刺肉芽
	阴茎肉增生物
	阴茎水泡
	阴茎疼痛
	阴茎蜕皮
	阴茎痒
	阴茎异常
	阴茎异味
	阴茎硬块
	阴茎硬下疳
尿道口异常症状
	尿道口白点
	尿道口包皮粘连
	尿道口长水泡
	尿道口出血
	尿道口刺痛
	尿道口刺痒
	尿道口滴白流脓
	尿道口发红
	尿道口发痒
	尿道口发肿
	尿道口疙瘩
	尿道口红点红疹
	尿道口溃疡糜烂
	尿道口肉刺
	尿道口肉刺肉芽
	尿道口水泡
	尿道口疼痛
	尿道口异味
	尿道口灼热
阴囊异常症状
	阴囊变硬
	阴囊长水泡
	阴囊潮湿
	阴囊大小不一
	阴囊发红
	阴囊发凉
	阴囊发痒
	阴囊红点红斑
	阴囊囊肿
	阴囊扭转
	阴囊肉刺
	阴囊湿疹
	阴囊酸胀
	阴囊疼痛
	阴囊脱屑
	阴囊萎缩
	阴囊下垂
	阴囊小疙瘩
	阴囊痒
	阴囊异味
	阴囊硬块
	阴囊增生物
	阴囊涨痛
	阴囊肿块
	阴囊肿了
	阴囊肿胀
	阴囊坠胀
睾丸异常症状
	睾丸长痘痘
	睾丸潮湿
	睾丸蛋疼
	睾丸发凉
	睾丸附睾囊肿
	睾丸高低不一
	睾丸疙瘩
	睾丸检查
	睾丸内有硬块
	睾丸囊肿
	睾丸扭转
	睾丸肉刺
	睾丸湿疹
	睾丸水泡
	睾丸酸胀
	睾丸疼痛
	睾丸痛
	睾丸蜕皮
	睾丸脱皮
	睾丸萎缩
	睾丸下垂坠痛
	睾丸小
	睾丸小疙瘩
	睾丸痒
	睾丸一大一小
	睾丸杂词
	睾丸肿了
	睾丸坠胀
	隐睾
精液异常症状
	精道梗阻
	精液不液化
	精液带血
	精液发黄
	精液果冻
	精液红色
	精液浑浊
	精液块状
	精液浅红色
	精液少精
	精液水状、精液异味
	精液团状
	精液稀
	精液颜色异常
	精液异味
	精液有胶状固体
	精液有颗粒
射精异常症状
	不射精
	插入即射
	很快就射
	秒射
	逆行射精
	射精出血
	射精过早
	射精酱油色
	射精快
	射精没感觉
	射精频繁
	射精疼痛
	射精无力
	射精延迟
	射精异常且龟头痛
勃起异常症状
	勃而不坚
	勃起不坚
	勃起侧弯
	勃起龟头小
	勃起后维持时间短
	勃起困难
	勃起疲软
	勃起时间短
	勃起疼痛
	勃起阴茎短小
	勃起障碍
	持续勃起
	无法勃起
	性欲亢进
	性欲亢进等
	阴茎勃起困难
	阴茎勃起疼
	硬不起来
排尿异常
	尿不出
	尿不尽
	尿臭
	尿道口粘连
	尿等待
	尿滴白
	尿分叉
	尿分泌物流脓
	尿黄
	尿急
	尿困难
	尿泡沫
	尿频
	尿频尿急尿滴白
	尿痛
	尿无力
	尿血
	尿灼热
	排尿困难
	小便带血
	小便滴白
	小便混浊
	小便无力
	小便痒
	小便异常
	小便有异味
	血尿	
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