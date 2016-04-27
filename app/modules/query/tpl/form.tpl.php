<?php
/**
 * Date: Apr 13, 2016
 * Author: Awei.tian
 * Description: 
 */

?>
<link rel="stylesheet" type="text/css" href="<?php print HTTP_ENTRY?>/static/dateTimeRange/css/redmond/jquery-ui-1.7.1.custom.css"/>
<link rel="stylesheet" type="text/css" href="<?php print HTTP_ENTRY?>/static/dateTimeRange/css/ui.daterangepicker.css"/>
<script src="<?php print HTTP_ENTRY?>/static/dateTimeRange/js/jquery-ui-1.7.1.custom.min.js"></script>
<script src="<?php print HTTP_ENTRY?>/static/dateTimeRange/js/daterangepicker.jQuery.js"></script>
<script src="<?php print HTTP_ENTRY?>/tree/unit/gd"></script>
<script src="<?php print HTTP_ENTRY?>/static/js/php.js"></script>
<script src="<?php print HTTP_ENTRY?>/static/js/showTreeSelect.js"></script>
<style>
label.level{
	margin-right:12px;
}
table.lvltb td{
	padding:8px;
}
</style>
<div class="m-form">
<form action="<?php print $submit_url?>" method="post" accept-charset="utf-8">
<fieldset>
	<legend class="f-p8">按条件检索</legend>
	
	
	<div class="formitm">
                <label class="lab">选择时间：</label>
                <div class="ipt">
                    <input type="text" id="defaultEndTime2"/>
                    <script type="text/javascript">

                    $('#defaultEndTime2').daterangepicker();

                    </script>
                </div>
	</div>
	<div class="formitm">
                <label class="lab">查询层级：</label>
                <div class="ipt">
                	<!-- 计划 单元 关键词 创意 -->
                    <input type="radio" name="level" id="lvl_all" checked><label class="level" for="lvl_all">不限</label>
                    <input type="radio" name="level" id="lvl_chananel"><label class="level" for="lvl_chananel">渠道</label>
                    <input type="radio" name="level" id="lvl_account"><label class="level" for="lvl_account">账户</label>
                    <input type="radio" name="level" id="lvl_plan"><label class="level" for="lvl_plan">计划</label>
                    <input type="radio" name="level" id="lvl_unit"><label class="level" for="lvl_unit">单元</label>
                    <!-- 
                    <input type="radio" name="level" id="lvl_idea"><label class="level" for="lvl_idea">创意</label>
                	 -->
                </div>
	</div>
	<div class="formitm f-dn">
                <label class="lab"></label>
                <div class="ipt" id="lvl_filter_c">
                
                </div>
	</div>
	<div class="formitm">
                <label class="lab">推广设备：</label>
                <div class="ipt">
                	<!-- 推广设备 : 全部 计算机 移动设备 -->
                    <input type="radio" name="device" id="dev_all" checked><label class="level" for="dev_all">全部</label>
                    <input type="radio" name="device" id="dev_pc"><label class="level" for="dev_pc">计算机</label>
                    <input type="radio" name="device" id="dev_m"><label class="level" for="dev_m">移动设备</label>
                </div>
	</div>
	<div class="formitm">
                <label class="lab">合并创意：</label>
                <div class="ipt">
                    <input type="checkbox" name="groupidea" id="groupidea" checked><label class="level" for="groupidea">合并</label>
                </div>
	</div>
	
	
	<div class="formitm formitm-1">
		<input type="submit" name="submit" value="Submit" class="u-btn"/>
	</div>


</fieldset>
</form>
</div>