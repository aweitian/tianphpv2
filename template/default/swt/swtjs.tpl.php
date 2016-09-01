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







document.writeln("");
document.writeln("");
document.writeln("<div class=\'side\'>");
document.writeln("  <ul>");
document.writeln("    <li class=\'zx\'><a href=\'javascript:void(0)\' onclick=\'openZoosUrl();return false;\'></a></li>");
document.writeln("    <li class=\'gh\'><a href=\'/subscribe/\'></a></li>");
document.writeln("    <li class=\'ewm\'><a>");
document.writeln("      <div class=\'ewmnr\'>");
document.writeln("        <img src=\'/static/pc/images/ewm.png\' /><br />");
document.writeln("        扫一扫,更多惊喜");
document.writeln("      </div>");
document.writeln("    </a></li>");
document.writeln("  </ul>");
document.writeln("</div>");