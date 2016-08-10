<?php 
/**
 * @var editorModel;
 */



?>
<?php $model = defTplData::getInstance()?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>KindEditor instance</title>
<?php include dirname(dirname(dirname(__FILE__)))."/public.tpl.php"?>
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/verdor/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="<?php print HTTP_ENTRY?>/verdor/kindeditor/plugins/code/prettify.css" />
<script charset="utf-8" src="<?php print HTTP_ENTRY?>/verdor/kindeditor/kindeditor-all-min.js"></script>
<script charset="utf-8" src="<?php print HTTP_ENTRY?>/verdor/kindeditor/lang/zh-CN.js"></script>
<script charset="utf-8" src="<?php print HTTP_ENTRY?>/verdor/kindeditor/plugins/code/prettify.js"></script>

</head>

<body>
<div class="wid1000">
<?php print $content?>
<div class="zjtd_pagenr">

	<form name="example" method="post" action="demo.php">
		<textarea id="content" style="width:700px;height:500px;visibility:hidden;"></textarea>
	</form>
	<button onclick="save()" style="width:128px;height:32px;">保存</button>
</div>

</div>
<script>
var editor1;
function save()
{
	if(!confirm('?'))return;
	editor1.sync();
	opener.document.getElementById("articlecontent").value = document.getElementById("content").value;
	window.close();
}
document.getElementById("content").value = opener.document.getElementById("articlecontent").value;

KindEditor.ready(function(K) {
	editor1 = K.create('textarea', {
		cssPath : '<?php print HTTP_ENTRY?>/static/css/kindeditor.css',
		uploadJson : '<?php print HTTP_ENTRY?>/priv/upload',
		fileManagerJson : '<?php print HTTP_ENTRY?>/priv/upload/list',
		allowFileManager : true,
		afterCreate : function() {
			var self = this;
			K.ctrl(document, 13, function() {
				self.sync();
				K('form[name=example]')[0].submit();
			});
			K.ctrl(self.edit.doc, 13, function() {
				self.sync();
				K('form[name=example]')[0].submit();
			});
		}
	});
	prettyPrint();
});
</script>

</body>
</html>