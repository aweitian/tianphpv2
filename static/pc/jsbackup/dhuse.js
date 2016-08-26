$(function(){

var $pop_by_height	= $(window).height();

$('.dh_by').height($pop_by_height);
	

	$('.dh_a').click(function(){

	$('.sjdxwz,.dh_by').fadeIn(500);

	})



$('.dh_top img').click(function(){

	$('.sjdxwz,.dh_by').hide();

	})	

})




<!--短信开始-->

document.write("<script type=\"text/javascript\" src=\"http://swt.gssmart.com/sms/url.js\"></script>");

document.write("<div id=\"quanping\" style=\" background-color:#CCCCCC;display:none; width:100%; height:100%; position: fixed ! important; top:0; left:0; opacity:0.6;filter:'alpha(opacity=60)';filter:alpha(opacity=60); z-index:10000;\"></div>");

document.write("<iframe id=\"destiframe\" src=\"\" scrolling=\"no\" width=\"515px\" height=\"350px\" frameborder=\"0\" style=\"position: fixed ! important; left:50%; top:50%; margin-top:-160px; margin-left:-257px;display:none; z-index:2147483647; background:none; _height:340px; border:2px solid silver;\"></iframe>");





function close_sms_send() {


	$("#quanping").css("display", "none");

	$("#destiframe").css("display", "none");


}



$(document).ready(function(){

	var availWidth=screen.availWidth;

	var availHeight=screen.availHeight;

	$("#quanping").css("width",availWidth);

	$("#quanping").css("height",availHeight);

});

var lastSendTime = 0;

function a(){

	var d= new Date();


	if(lastSendTime+60000>d.getTime()) {

		alert('请一分钟后再试！');

		return;

	} else {

		lastSendTime = d.getTime();


	}



	$("#quanping").css("display","block");


	$("#destiframe").slideToggle();

	var destcontent = "上海九龙男子医院短信预约号0169，凭此短信就诊（导医台出示），免专家挂号费，享受优先就诊。医院地址：中山西路333号（长宁路口），电话：021-52733999";


	var destdisplay = "上海九龙男子医院短信预约号0169，凭此短信就诊（导医台出示），免专家挂号费，享受优先就诊。医院地址：中山西路333号（长宁路口），电话：021-52733999【上海九龙男子医院】";


	var url = location.href;



	var proxy = "http://"+location.hostname+"/help/sendsmsproxy";

	$("#destiframe").attr("src","http://swt.gssmart.com/sms/send.php?proxy="+urlEncode(proxy)+"&destcontent="+urlEncode(destcontent)+"&destdisplay="+urlEncode(destdisplay)+"&url="+urlEncode(url));


}
