<?php


$pageSize = 8;
if(isset($_REQUEST["page"])){
	$page = intval($_REQUEST["page"]);
} else{
	$page = 1;
}


$pagination = new pagination($m->getAnswersCnt($askid), $page, $pageSize, 6);



$req = new httpRequest();
$url = new url($req->requestUri());
?>
ask content
 