<?php
/**
 * Date: Apr 23, 2016
 * Author: Awei.tian
 * Description: 
 */
include 'debug.inc.php';
$pdo = mysqlPdo::getConnection();
//开始一个事实

//$db = new mysqlPdoBase();


// $db->insert("insert into `abc` (`a`) values (:a)", array(
// 	"a" => "a"
// ));

// $db->insert("insert into `abc` (`a`) values (:a)", array(
// 		"a" => "b"
// ));


$stmt = $pdo->prepare('INSERT INTO acb (`q`) VALUES(?)');
$pdo->beginTransaction();

for($i=0; $i < 10; $i++) {
	$stmt->bindValue(1, $i, PDO::PARAM_STR);
	$stmt->execute();
}
$pdo->commit();
// $pdo->rollBack();
