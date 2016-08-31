<?php
//test.php
//
// Usage on command-line: php test.php <file|textstring>
// Usage on web: 
error_reporting(E_ALL);

//名字允许复查?
$text = "我爱你中国";

if (isset($_SERVER['argv'][1])) 
{
	$text = $_SERVER['argv'][1];
	if (strpos($text, "\n") === false && is_file($text)) $text = file_get_contents($text);
}
elseif (isset($_SERVER['QUERY_STRING']))
{
	$text = $_SERVER['QUERY_STRING'];
}

$text = "什么时候，前列腺炎是指前列腺特异性和非特异感染所致的急慢性炎症，从而引起的全身或局部症状。前列腺炎可分为非特异性细菌性前列腺炎、特发性细菌性前列腺炎(又称前列腺病)，特异性前列腺炎(由淋球菌、结核菌、真菌，寄生虫等引起)，非特异性肉.";
echo '<meta charset="utf-8">';
// echo $text;exit();
// 
require 'pscws4.class.php';
$cws = new PSCWS4();
$cws->set_charset('utf8');
$cws->set_dict('etc/dict.utf8.xdb');
$cws->set_rule('etc/rules.utf8.ini');
$cws->set_multi(3);
$cws->set_ignore(true);
$cws->set_debug(true);
$cws->set_duality(true);
$cws->send_text($text);

if (php_sapi_name() != 'cli') header('Content-Type: text/html');
echo "pscws version: " . $cws->version() . "\n";
echo "Segment result:\n\n";
while ($tmp = $cws->get_result())
{	
// 	$line = '';
// 	foreach ($tmp as $w) 
// 	{
// 		if ($w['word'] == "\r") continue;
// 		if ($w['word'] == "\n")		
// 			$line = rtrim($line, ' ') . "\n";
// 		//else $line .= $w['word'] . "/{$w['attr']} ";
// 		else $line .= $w['word'] . " ";
// 	}
	//echo $line;
	print_R($tmp);
}

// // top:
// echo "Top words stats:\n\n";
// $ret = array();
// $ret = $cws->get_tops(10,'r,v,p');
// echo "No.\tWord\t\t\tAttr\tTimes\tRank\n------------------------------------------------------\n";
// $i = 1;
// foreach ($ret as $tmp)
// {
// 	printf("%02d.\t%-16s\t%s\t%d\t%.2f\n", $i++, $tmp['word'], $tmp['attr'], $tmp['times'], $tmp['weight']);
// }
$cws->close();
?>