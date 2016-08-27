// JavaScript Document


document.writeln("<script language=\"javascript\" src=\"http://keb.twos.net.cn/JS/LsJS.aspx?siteid=KEB34786808&float=1&lng=cn\"></script>");


/*---------------右侧悬浮---------------------*/

document.writeln("<style>");

document.writeln(".ycbox{position:fixed;top:18%;right:10px; width:144px;height:120px;overflow:hidden;z-index:999999999;}");

document.writeln(".ycbox img{position:absolute;left:0;top:0;}");

document.writeln(".ycbox img.ycbox_index{z-index:9;left:60px;cursor:pointer;}");

document.writeln(".ycbox p{width:88px;height:89px;left:50px;top:29px;position:absolute;overflow:hidden;}");

document.writeln(".ycbox p img{left:88px;}");

document.writeln("</style>");

document.writeln("<div class=\"ycbox\">");

document.writeln("	<img src=\"/static/m/images/ycimg.png\" class=\"ycbox_index\" />");

document.writeln("    <p><a href=\"javascript:void(0)\" onclick=\"openZoosUrl();return false;\" rel=\"nofollow\"  target=\"_blank\" ><img src=\"/static/m/images/ycbtn.png\" id=\"fixed_left\" /></a></p>");

document.writeln("</div>");

$(function() {

    var oYcbox = $('.ycbox');

    var oFixedLeft = $('#fixed_left');

    var t = null;

    oYcbox.find('img.ycbox_index').click(function() {

        if (parseInt(oFixedLeft.css('left')) == 0) {

            oFixedLeft.animate({
                left: '88px'
            },
            800);

            $(this).animate({
                left: '60px'
            },
            800);

        } else {

            oFixedLeft.animate({
                left: 0
            },
            800);

            $(this).animate({
                left: 0
            },
            800);

        }

        clearTimeout(t);

    })

    t = setTimeout(function() {

        oFixedLeft.animate({
            left: 0
        },
        800);

        oYcbox.find('img.ycbox_index').animate({
            left: 0
        },
        800);

    },
    2000)

})



//中间弹出框

document.writeln("<style type=\"text/css\">");

document.writeln("#divMceter,#divL,#divR,#divMceter_suoxiao{position: fixed;z-index: 214748364;}");

document.writeln("/*  divMceter  */");

document.writeln("#divMceter {width: 240px;height: 120px;background:url(/static/m/images/swt_center.jpg) 0 no-repeat; right: 50%;bottom: 50%;margin-right: -120px;margin-bottom: -60px;_position: absolute;_bottom: expression(offsetParent.scrollTop+242);}");

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
