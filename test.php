<?php 
$def = array(
	"sid" => 22
);
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
$a=array("red"=>"red","green","blue","yellow","brown");
print_r(array_slice($a,0,40,true));
exit;
?>
<select name="nanme">
<?php foreach ($test as $item):?>
<option value="<?php print $item["sid"]?>"><?php print $item["data"]?></option>

<?php endforeach;?>
</select>