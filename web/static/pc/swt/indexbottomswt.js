
document.writeln("<style>");
document.writeln(".fdc{background:#000;filter:alpha(opacity=65); -moz-opacity:0.65;opacity:0.65;width:100%; position:fixed;bottom:0;left:0;z-index:999999999;height:157px;}");
document.writeln(".fdcnr{background:url(/static/pc/swt/foot.png) no-repeat;width:1032px;margin:0 auto;height:157px;}");
document.writeln(".fdcnr p{height:157px;position:relative;}");
document.writeln(".fdcnr p a{width:30px;height:35px; position:absolute;right:0;top:15px;cursor:pointer;}");
document.writeln("</style>");
document.writeln("<div  class=\'fdc\'>");
document.writeln("  <div class=\'fdcnr\'><p><a ></a></p></div>");
document.writeln("</div>");

function openM(){
   	$(".fdc").slideDown();
 
}
$(".fdcnr a").click(function(){				
		$(".fdc").slideUp();
		setTimeout("openM()",15000);
	});





