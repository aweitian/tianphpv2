$(function() {
    if (getCookie("NAVTOUCH") == "") {
        $("#redpoint").addClass("red_new")
    }
});
$(function() {
    $.post("/touch/index/ajaxGetUserName", {},
    function(c) {
        if (c != null && c != "") {
            $("#percenter").attr("class", "per_center");
            $("#percenter").height(30);
            $("#percenter").html('<a href="http://m.haodf.com/touch/user/index">' + c + "的个人中心" + '<span class="num" id="unpay" style="display:none;"></span></a>');
            showRedPoint()
        } else {
            $("#percenter").attr("class", "per_center_login");
            $("#percenter").height(30);
            $("#percenter").html('<a href="http://m.haodf.com/touch/user/loginbymobile">登录</a>' + '<a href="http://m.haodf.com/touch/user/newregister?forward=">注册</a>')
        }
    })
});
function showRedPoint() {
    var c = $("#isShowRedPoint").val();
    if (! (c == false || c == 0 || c == "")) {
        $.post("/touch/index/ajaxGetUnPaymentTelOrderCnt", {},
        function(c) {
            if (c > 0) {
                if (c > 99) {
                    $("#unpay").html("99+").show()
                } else {
                    $("#unpay").html(c).show()
                }
                if ($("#redpoint").attr("class") == "") {
                    $("#redpoint").attr("class", "red_dian")
                }
            }
        })
    }
}
$(".oc_list_new").click(function() {
    if ($("#redpoint").attr("class") == "red_new") {
        $.post("/touch/index/ajaxAddTouchCookie");
        if ($("#unpay").html() != "" && $("#unpay").html() != null) {
            $("#redpoint").attr("class", "red_dian")
        } else {
            $("#redpoint").attr("class", "")
        }
    }
    $(".black_bg").show();
    $(".head_tc_nav_new").show();
    $(".oc_list_indialog").click(function() {
        $(".black_bg").hide();
        $(".head_tc_nav_new").hide()
    });
    $(".black_bg").click(function() {
        $(this).hide();
        $(".head_tc_nav_new").hide()
    });
    $("#nav_bar_search_btn").click(function() {
        cnzz_search();
        return uniqueSearchCheck20151125()
    })
});
function uniqueSearchCheck20151125() {
    var c = $("#uniqueKeyword20151125").val().trim();
    if (c == "" || c == "医院名、疾病名或医生姓名") {
        alert("请输入医院名、疾病名或医生姓名");
        return false
    }
    $("#uniqueSearchForm20151125").submit()
}
function getCookie(c) {
    var n, t = new RegExp("(^| )" + c + "=([^;]*)(;|$)");
    if (n = document.cookie.match(t)) return unescape(n[2]);
    else return null
}
$("#cnzz_stat_icon_1256706712").hide();
$("#cnzz_daohang201").click(function() {
    _czc.push(["_trackEvent", "触屏导航栏", "点击导航按钮", "导航按钮", "1", "101201"])
});
$("#cnzz_yiyuan203").click(function() {
    _czc.push(["_trackEvent", "触屏导航栏", "需要按照医院搜索医生", "按医院找医生按钮", "1", "101203"])
});
$("#cnzz_jibing204").click(function() {
    _czc.push(["_trackEvent", "触屏导航栏", "需要按照疾病搜索医生", "按疾病找医生按钮", "1", "101204"])
});
$("#cnzz_zixun205").click(function() {
    _czc.push(["_trackEvent", "触屏导航栏", "开始在线咨询", "在线咨询按钮", "1", "101205"])
});
$("#cnzz_dianhua206").click(function() {
    _czc.push(["_trackEvent", "触屏导航栏", "开始电话咨询", "电话咨询按钮", "1", "101206"])
});
$("#cnzz_jihao207").click(function() {
    _czc.push(["_trackEvent", "触屏导航栏", "开始预约转诊", "预约转诊按钮", "1", "101207"])
});
$("#cnzz_shouye208").click(function() {
    _czc.push(["_trackEvent", "触屏导航栏", "点击后返回首页", "首页按钮", "1", "101208"])
});
$("#cnzz_zhishi209").click(function() {
    _czc.push(["_trackEvent", "触屏导航栏", "点击查看疾病知识", "疾病知识按钮", "1", "101209"])
});
$("#cnzz_xizai210").click(function() {
    _czc.push(["_trackEvent", "触屏导航栏", "点击下载客户端", "下载客户端按钮", "1", "101210"])
});
$(function() {
    $("#cnzz_index_tuijianyy211").click(function() {
        _czc.push(["_trackEvent", "触屏疾病页", "点击推荐医院", "推荐医院链接", "1", "101300"])
    });
    $("#cnzz_newdoctor_tuijianyy212").click(function() {
        _czc.push(["_trackEvent", "触屏某疾病的推荐专家列表页", "点击推荐医院", "推荐医院链接", "1", "101301"])
    });
    $(".cnzz_tuijianyylist213").click(function() {
        _czc.push(["_trackEvent", "触屏某疾病的推荐医院列表页", "点击推荐医院列表", "推荐医院链接", "1", "101302"])
    });
    $(".cnzz_tuijianyslist214").click(function() {
        _czc.push(["_trackEvent", "触屏某疾病推荐医院下的医生列表页", "点击医生列表", "医生链接", "1", "101303"])
    })
});
function cnzz_search() {
    _czc.push(["_trackEvent", "触屏导航栏", "点击搜索按钮", "搜索按钮", "1", "101202"])
}