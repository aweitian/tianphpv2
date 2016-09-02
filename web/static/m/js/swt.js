// JavaScript Document


document.writeln("<script language=\"javascript\" src=\"http://keb.twos.net.cn/JS/LsJS.aspx?siteid=KEB34786808&float=1&lng=cn\"></script>");

document.writeln("<style type=\"text/css\">#LRdiv0{display:none;}#LRfloater0{display:none;}</style>");

//中间弹出框

document.writeln("<style type=\"text/css\">");

document.writeln("#divMceter,#divL,#divR,#divMceter_suoxiao{position: fixed;z-index: 214748364;}");

document.writeln("/*  divMceter  */");

document.writeln("#divMceter {width: 240px;height: 120px;background:url(/static/m/swt/swt_center.jpg) 0 no-repeat; right: 50%;bottom: 50%;margin-right: -120px;margin-bottom: -60px;_position: absolute;_bottom: expression(offsetParent.scrollTop+242);}");

document.writeln("#divMceter a{position:absolute;display: block; width:105px; height:34px;bottom:26px;}");

document.writeln("#divMceter #divMceteragb{ right:5px; top:5px; width:20px; height:20px; z-index:10000;}");

document.writeln("#divMceter #divMcetera1{ left:10px;}");

document.writeln("#divMceter #divMcetera2{ left:124px;}");

document.writeln("");

document.writeln("/*  divMceter  */");

document.writeln("</style>");

document.writeln("");

document.writeln("<div id=\"divMceter\">");

document.writeln("     <a id=\"divMceteragb\" onclick=\"swtcloseM()\" target=\"_self\" title=\"关闭\"></a>");

document.writeln("     <a id=\"divMcetera1\" href=\"javascript:void(0)\" onclick=\"openZoosUrl();return false;\"  rel=\"nofollow\" target=\"_blank\" title=\"我要咨询\"></a>");

document.writeln("     <a id=\"divMcetera2\" href=\"tel:021-52733999\" rel=\"nofollow\" target=\"_blank\" title=\"拨打电话\"></a>");



document.writeln("</div>");

function chuxian() {

    document.getElementById('divMceter').style.display = 'block';

}

function swtcloseM() {

    document.getElementById('divMceter').style.display = 'none';

    setTimeout("chuxian()", 30000);

}

