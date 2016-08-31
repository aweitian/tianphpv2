<?php
/**
 * @Author: awei.tian
 * @Date: 2016年8月16日
 * @Desc: 
 * 依赖:
 */
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>proxy</title>
<script type="text/javascript">
var hide = location.search;
if(hide == "?hide=true") {
	var destiframe = parent.parent.document.getElementById('destiframe');
	destiframe.style.display="none";
	var quanping = parent.parent.document.getElementById('quanping');
	quanping.style.display="none";
}
</script>
</head>
<body>
</body>
</html>