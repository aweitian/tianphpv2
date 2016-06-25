<?php 
$test = array(
	array(
		"sid" => 11,
		"data" => "aaa"
	),
	array(
		"sid" => 22,
		"data" => "adgfasaa"
	),
	array(
		"sid" => 44,
		"data" => "aweeaa"
	),
	array(
		"sid" => 56,
		"data" => "aa332a"
	)
		
);

?>
<select name="nanme">
<?php foreach ($test as $item):?>
<option value="<?php print $item["sid"]?>"><?php print $item["data"]?></option>

<?php endforeach;?>
</select>