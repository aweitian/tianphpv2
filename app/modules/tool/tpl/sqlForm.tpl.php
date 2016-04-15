<?php
/**
 * Date: 2015年12月31日
 * Author: Awei.tian
 * Description: 
 */
extract($data);
$method = array("SELECT","INSERT","UPDATE","DELETE");

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>
<title>sql generator</title>
<meta name="keywords" content=""/>
<meta name="description" content=""/>
<meta name="viewport" content="width=device-width"/>
</head>
<body>
<div style="position: fixed;top:50px;left:0%;border:0px solid gray;padding:50px;">
<h3 class="u-tt-xl">SQL generator</h3>
<br>
<form action="/tool/sql" method="post">
<select name="tb">
<?php foreach($table as $t):?>
<option value='<?php print $t?>'><?php print $t?></option>
<?php endforeach;?>
</select>
<select name="method">
<?php foreach($method as $t):?>
<option value='<?php print $t?>'><?php print $t?></option>
<?php endforeach;?>
</select>
<br>
<table>
<tr>
	<td colspan="2"><input value="<?php print $arg?>" style="width:712px;"></td>
</tr>
<tr>
	<td><textarea style="width:350px;height:128px;" name="sql"><?php print $sql?></textarea></td>
	<td><textarea style="width:350px;height:128px;" name="var"><?php print $var?></textarea></td>
</tr>
</table>
<input class="u-btn" type="submit" value="submit">

</form>
</div>

</body>
</html>