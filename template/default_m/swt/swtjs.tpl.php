<?php
/**
 * @Author: awei.tian
 * @Date: 2016年8月29日
 * @Desc: 
 * 依赖:
 */
function swtbgimg($msg)
{

	if(isset($msg["?m"]) && $msg["?m"] == 'doctor')
	{
			if(isset($msg["?n"]) && preg_match("/^[a-z]+$/",$msg["?n"]) && file_exists(FILE_SYSTEM_ENTRY.'/web/static/pc/swt/'.$msg["?n"].'.png'))
			{
				return $msg["?n"] . '.png';
			}		
		
	}
	return '';
}
function isDoctor($msg)
{
	if(isset($msg["?m"]) && $msg["?m"] == 'doctor')
		return true;
	else
		return false;
}
?>

document.writeln("<script language=\"javascript\" src=\"<?php print AppChannel::getSwt()?>\"></script>");

document.writeln("<style type=\"text/css\">#LRdiv0{display:none;}#LRfloater0{display:none;}</style>");




<?php if(isDoctor($msg)):?>

document.writeln("<style type=\'text/css\'>");
document.writeln("*{margin:0;padding:0;}");
document.writeln("#swtbox{width:272px;height:162px; position:fixed;left:50%;top:50%;margin-left:-136px;margin-top:-81px;background:#fff3e0;border:4px #fad699 solid;border-radius:15px;-moz-border-radius:15px;-webkit-border-radius:15px;z-index:999999999;}");
document.writeln(".swtclose2{ position:absolute;top:-13px;right:-8px;cursor:pointer;}");
document.writeln(".ysbd{border:1px #fff solid;height:161px;border-radius:15px;-moz-border-radius:15px;-webkit-border-radius:15px;}");
document.writeln("ul{ list-style:none;}");
document.writeln(".ysbd dt{position:absolute;left:-4px;bottom:-6px;}");
document.writeln(".ysbd dd{position:absolute;width:205px;right:10px;z-index:999999;}");
document.writeln(".ysbd h4{font:16px/24px Microsoft Yahei;padding:20px 0 0 10px;}");
document.writeln(".ysbd li{float:left;padding-top:15px;}");
document.writeln(".ysbd li:last-child{float:right;}");
document.writeln(".swtline1{position:absolute;top:2px;left:21px;}");
document.writeln(".swtline2{position:absolute;top:78px;right:2px;}");
document.writeln("</style>");
document.writeln("<div id=\'swtbox\'>");
document.writeln("  <img src=\'/static/m/swt/swtline1.png\' width=\'53\' height=\'33\' class=\'swtline1\' />");
document.writeln("  <img src=\'/static/m/swt/swtline2.png\' width=\'22\' height=\'21\' class=\'swtline2\' />");
document.writeln("  <img onclick=\"swtcloseM()\" src=\'/static/m/swt/swtclose.png\' width=\'29\' height=\'29\' class=\'swtclose2\' />");
document.writeln("  <div class=\'ysbd\'>");
document.writeln("    <dl>");
document.writeln("      <dt><img src=\'/static/m/swt/<?php print swtbgimg($msg)?>\' width=\'101\' height=\'116\' /></dt>");
document.writeln("      <dd>");
document.writeln("        <h4>我们有着多年的问诊经验，<br />能根据您描述的症状给予<br />");
document.writeln("专业的解答！</h4>");
document.writeln("        <ul>");
document.writeln("          <li><a href=\'javascript:void(0)\' onclick=\'openZoosUrl();return false;\'><img src=\'/static/m/swt/swtbtn1.png\' / width=\'96\' height=\'36\'></a></li>");
document.writeln("          <li><a href=\'tel:021-52370007\'><img src=\'/static/m/swt/swtbtn2.png\' / width=\'96\' height=\'36\'></a></li>");
document.writeln("        </ul>");
document.writeln("      </dd>");
document.writeln("    </dl>");
document.writeln("  </div>");
document.writeln("</div>");

<?php else:?>
document.writeln("<style type=\'text/css\'>");
document.writeln("*{margin:0;padding:0;}");
document.writeln("#swtbox{width:280px;height:170px; position:fixed;left:50%;top:50%;margin-left:-140px;margin-top:-85px;z-index:999999999;}");
document.writeln(".swtbd1{float:right;width:218px;height:160px;background:#fff3e0;border:4px #fad699 solid;border-radius:15px;-moz-border-radius:15px;-webkit-border-radius:15px;-webkit-box-shadow:0 0 10px #d5d5d5;-moz-box-shadow:0 0 10px #d5d5d5;box-shadow:0 0 10px #d5d5d5;}");
document.writeln(".swtbd2{border:1px #fff solid;height:128px;padding:15px 5px 15px 8px;border-radius:15px;-moz-border-radius:15px;-webkit-border-radius:15px;color:#333;font:16px/24px Microsoft Yahei;}");
document.writeln(".swtys{ position:absolute;top:3px;left:3px;z-index:999999999;}");
document.writeln(".swtbd2 p{padding-left:8px;}");
document.writeln(".swtbd2 ul{list-style:none;padding-top:15px;}");
document.writeln(".swtbd2 li{float:left;}");
document.writeln(".swtbd2 li:last-child{float:right;}");
document.writeln(".swtclose1{ position:absolute;top:-9px;right:-8px;cursor:pointer;}");
document.writeln("</style>");
document.writeln("<div id=\'swtbox\'>");
document.writeln("  <img onclick=\"swtcloseM()\" src=\'/static/m/swt/swtclose.png\' width=\'29\' height=\'29\' class=\'swtclose1\' />");
document.writeln("  <div class=\'swtbd1\'>");
document.writeln("    <div class=\'swtbd2\'>");
document.writeln("      <img src=\'/static/m/swt/swtzx.png\' width=\'71\' height=\'167\' class=\'swtys\' />");
document.writeln("      <p>您有任何男科疾病的问题，<br />可与男科医生一对一快速<br />在线沟通。</p>");
document.writeln("      <ul>");
document.writeln("        <li><a href=\'javascript:void(0)\' onclick=\'openZoosUrl();return false;\'><img src=\'/static/m/swt/swtbtn1.png\' width=\'96\' height=\'36\' /></a></li>");
document.writeln("        <li><a href=\'tel:021-52370007\'><img src=\'/static/m/swt/swtbtn2.png\' width=\'96\' height=\'36\' /></a></li>");
document.writeln("      </ul>");
document.writeln("    </div>");
document.writeln("  </div>");
document.writeln("</div>");
<?php endif?>


function chuxian() {

    document.getElementById('swtbox').style.display = 'block';

}

function swtcloseM() {

    document.getElementById('swtbox').style.display = 'none';

    setTimeout("chuxian()", 30000);

}



document.writeln("<a href=\'javascript:void(0)\' onclick=\'openZoosUrl();return false;\'>");
document.writeln("<div style=\'position:fixed;bottom:2.2rem;right:15px;width:50px;z-index:999999999;\'><img src=\'/static/m/images/askdoc.png\' width=\'50\' height=\'55\'></div>");
document.writeln("</a>");