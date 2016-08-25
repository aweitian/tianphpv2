<?php
/**
 *Author
 * Sihangzhang
 * ["sid"]=> string(3) "325" 
 * ["key"]=> string(4) "gwxc" 
 * ["data"]=> string(12) "睾丸异常" 
 * ["pid"]=> string(3) "322" 
 * ["metaid"]=> string(1) "2"
 */
$row = $model->data;
// var_dump($row);
$ext = diseaseExtInfoes::getExtData();
// var_dump($ext);exit;
include dirname(__FILE__)."/knowledge.tpl.php";
?>

