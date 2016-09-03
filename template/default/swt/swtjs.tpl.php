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

document.writeln("<style type=\"text/css\">#LRfloater0{display:none;}#LRfloater1{display:none;}</style>");

<?php if(isDoctor($msg)):?>

document.writeln("<div id=\'swtbox\' style=\'width:450px;height:220px; position:fixed;top:50%;left:50%;margin-left:-225px;margin-top:-110px;z-index:999999999;\' >");
document.writeln("<img src=\'/static/pc/swt/<?php print swtbgimg($msg)?>\' border=\'0\' usemap=\'#Map\'/>");
document.writeln("<map name=\'Map\' id=\'Map\'><area shape=\'circle\' coords=\'433,17,12\' onclick=\'closeSwt()\' /><area shape=\'rect\' coords=\'154,161,258,195\' href=\'/subscribe/\' /><area shape=\'rect\' coords=\'3,29,447,216\'  href=\'javascript:void(0)\' onclick=\'openZoosUrl();return false;\' /></map>");
document.writeln("");
document.writeln("</div>");
document.writeln("");
<?php else:?>

document.writeln("<div id=\'swtbox\' style=\'width:450px;height:220px; position:fixed;top:50%;left:50%;margin-left:-225px;margin-top:-110px;z-index:999999999;\' >");
document.writeln("<img src=\'/static/pc/swt/home.png\' border=\'0\' usemap=\'#Map\'/>");
document.writeln("<map name=\'Map\' id=\'Map\'><area shape=\'circle\' coords=\'433,17,12\' onclick=\'closeSwt()\' /><area shape=\'rect\' coords=\'3,37,448,212\'  href=\'javascript:void(0)\' onclick=\'openZoosUrl();return false;\' /></map>");
document.writeln("");
document.writeln("</div>");
document.writeln("");
<?php endif?>




function chuxian(){
	document.getElementById('swtbox').style.display='block';

}
function closeSwt(){

	document.getElementById('swtbox').style.display='none';

	setTimeout("chuxian()", 15000);
}


document.writeln("<style>");
document.writeln(".side{position:fixed;top:0;right:0;width:58px;height:100%;background:url(/static/pc/swt/sidebg.gif) repeat-y;}");
document.writeln(".side ul{width:58px;padding-top:195px;height:330px;background:url(/static/pc/swt/sidebg2.png) no-repeat;}");
document.writeln(".side li{float:right;width:35px;height:96px;position:relative;}");
document.writeln(".side li a{display:block;width:58px;height:96px;background:url(/static/pc/swt/side.png) no-repeat;transition:0 !important;}");
document.writeln(".side li.gh a{background-position:0 -96px;}");
document.writeln(".side li.ewm a{background-position:0 -192px;color:#357deb; cursor:pointer;}");
document.writeln(".side li.zx a:hover{background-position:-35px 0;}");
document.writeln(".side li.gh a:hover{background-position:-35px -96px;}");
document.writeln(".side li.ewm a:hover{background-position:-35px -192px;}");
document.writeln(".ewmnr{display:none; position:absolute;right:35px;border:1px #357deb solid;font:14px/29px Microsoft Yahei;text-align:center;}");
document.writeln(".side li.ewm a:hover .ewmnr{display:block;width:134px;height:148px;}");
document.writeln(".side li.ewm a:hover .ewmnr img{padding-top:15px;}");
document.writeln("</style>");




document.writeln("");
document.writeln("");
document.writeln("<div class=\'side\'>");
document.writeln("  <ul>");
document.writeln("    <li class=\'zx\'><a href=\'javascript:void(0)\' onclick=\'openZoosUrl();return false;\'></a></li>");
document.writeln("    <li class=\'gh\'><a href=\'/subscribe/\'></a></li>");
document.writeln("    <li class=\'ewm\'><a>");
document.writeln("      <div class=\'ewmnr\'>");
document.writeln("        <img src=\'/static/pc/swt/ewm.png\' /><br />");
document.writeln("        扫一扫,更多惊喜");
document.writeln("      </div>");
document.writeln("    </a></li>");
document.writeln("  </ul>");
document.writeln("</div>");


document.writeln("<style type=\'text/css\'>");
document.writeln("#btswt{ z-index:99999999;position:fixed;background:url(/static/pc/swt/ycmf.png);width:87px;height:144px; position:fixed;right:50px;bottom:20px;display:none;cursor:pointer;}");
document.writeln(".btclose{ position:absolute;cursor:pointer;top:-8px;right:-8px;}");
document.writeln(".btpic{ position:absolute;left:-35px;top:-20px;}");
document.writeln("#btzx{z-index:99999999;width:210px;height:197px; position:fixed;right:50px;bottom:10px;background:#f0f0f0;}");
document.writeln("#btzx h4{background:#1e90ff;color:#c2e1ff;height:34px;font:14px/34px Mcirosoft Yahei;text-align:center;}");
document.writeln("#btzx h4 span{color:#fff100;}");
document.writeln("#btnr{border:1px #e2e2e2 solid;height:142px;padding:10px;}");
document.writeln("#btnr p{background:#fff url(/static/pc/swt/gif.gif) no-repeat 10px 10px;width:165px;height:74px;padding:10px;border:1px #e2e2e2 solid;}");
document.writeln(".btbtn{width:190px;height:40px;text-align:center;background:#faa701;line-height:40px;color:#fff;font-size:16px;margin-top:8px;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px;cursor:pointer;}");
document.writeln("</style>");

document.writeln("<div id=\'btswt\'></div>");
document.writeln("<div id=\'btzx\'>");
document.writeln("  <h4>向男科好大夫<span>免费提问</span></h4>");
document.writeln("  <div id=\'btnr\'>");
document.writeln("    <img src=\'/static/pc/swt/swtclose.png\' width=\'22\' height=\'22\' class=\'btclose\' />");
document.writeln("    <a href=\'javascript:void(0)\' onClick=\'openZoosUrl();return false;\'>");
document.writeln("    <img src=\'/static/pc/swt/swtpic.png\' width=\'50\' height=\'76\' class=\'btpic\' />");
document.writeln("    <p></p>");
document.writeln("    <div class=\'btbtn\' >立即咨询</div></a>");
document.writeln("  </div>");
document.writeln("</div>");



$(document).ready(function(){
  $(".btclose").click(function(){

     $("#btzx").hide(400);
  
	 $("#btswt").show(400); 
  });
  $("#btswt").click(function(){
     $("#btzx").show(400);
	 $("#btswt").hide(400);
  });
});