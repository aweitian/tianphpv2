    $(function(){
        var n = "疾病 医生 医院 科室 文章 咨询";
        var t = function(t, i) {
            t.bind("focus", function() {
                var n = t.val();

                if (n === i) {
                    t.val("");
                    t.addClass("gray3");
                    t.removeClass("grayc");
					t.css("color","#000000");
                }
            });
            t.bind("blur", function() {
                var n = t.val()
                        , e = /(^\s+|\s+$)/;
                n = n.replace(e, "");
                if (n === "") {
                    t.val(i);
                    t.addClass("grayc");
                    t.removeClass("gray3");
					t.css("color","#969696");
                }
            })
        };
        t($("#indexsearch"), n);

        /*点击找医院切换*/
        /*链接添加删除*/
        $(".list_nav>li").click(function(){
            var num = $(".list_nav").children("li").index($(this));
            if($(this).hasClass("curli")){
                if(num == 0){
                    $(this).children("a").attr("href","http://m.haodf.com/touch/province/list.htm");
                }
                if(num == 1){
                    $(this).children("a").attr("href","http://m.haodf.com/touch/jibing/list.htm");
                }
                if(num == 2){
                    //$(this).children("a").attr("href","2");
                }
            }
            else {
                $(".add_false").removeAttr("href");
                $(this).addClass("curli").siblings().removeClass("curli");
                $(".nav_content>li").eq(num).show().siblings().hide();
            }

        });


        $(".province_list>ul>li").click(function(){
            $(this).children("span").addClass("cur_name");
            $(this).siblings().children("span").removeClass("cur_name");
            $(this).children("span").children("span").addClass("curtiao");
            $(this).siblings().children("span").children("span").removeClass("curtiao");
            var num2 = $(this).parent("ul").parent(".province_list").children("ul").children("li").index($(this));
            $(this).parent("ul").parent(".province_list").next(".hospital_list").children("div").eq(num2).show().siblings().hide();
        });

        $(".doctor_list>ul>li").click(function(){
            $(this).children("span").addClass("cur_name");
            $(this).siblings().children("span").removeClass("cur_name");
            $(this).children("span").children("span").addClass("curtiao");
            $(this).siblings().children("span").children("span").removeClass("curtiao");
            var num2 = $(this).parent("ul").parent(".doctor_list").children("ul").children("li").index($(this));
            $(this).parent("ul").parent(".doctor_list").next(".bing_dor_list").children("div").eq(num2).show().siblings().hide();
        });
		
		$("#indexsearch").focus(function(){
            $(".index_bottom_change03").hide();
        });
        $("#indexsearch").blur(function(){
            $(".index_bottom_change03").show();
        });

    });
	
	function submitCheck() {                                                                                                                                                              
        var kw = $('#indexsearch').val().trim();                                                                                                                                          
        if (kw == '' || kw == '疾病 医生 医院 科室 文章 咨询') {                                                                                                                      
            alert('请输入医院名、疾病名或医生姓名');           			
            return false;                                                                                                                                                                 
        }                                                                                                                                                                                 
        $('#search_form').submit();                                                                                                                                                       
    }          
	
	var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");
	document.write(unescape("%3Cspan id='cnzz_stat_icon_1256706712'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol  + "s4.cnzz.com/z_stat.php%3Fid%3D1256706712%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));
	document.getElementById("cnzz_stat_icon_1256706712").style.display = "none";
	
	function cnzz_click(id){
        if(id=='cnzz_search'){
            _czc.push(['_trackEvent', '触屏版首页', '点击搜索', '搜索按钮', '1', '705001']);
        }
    }
    $("#cnzz_srchbydc").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击按医院找医生', '按医院找医生按钮', '1', '705201']);});
    $("#cnzz_srchbyds").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击按疾病找医生', '按疾病找医生按钮', '1', '705203']);});
    $("#cnzz_zxzx").click(function(){_czc.push(['_trackEvent', '触屏版首页', '开始在线咨询', '在线咨询按钮', '1', '705204']);});
    $("#cnzz_mzjh").click(function(){_czc.push(['_trackEvent', '触屏版首页', '开始门诊加号', '门诊加号按钮', '1', '705205']);});
    $("#cnzz_dhzx").click(function(){_czc.push(['_trackEvent', '触屏版首页', '开始电话咨询', '电话咨询按钮', '1', '705206']);});
    $("#cnzz_ksjz").click(function(){_czc.push(['_trackEvent', '触屏版首页', '开始快速就诊', '快速就诊按钮', '1', '705207']);});
    $("#cnzz_pzyy").click(function(){_czc.push(['_trackEvent', '触屏版首页', '开始品质预约', '品质预约按钮', '1', '705208']);});
    $("#cnzz_zyy").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击找医院', '找医院按钮', '1', '705209']);});
    $("#cnzz_yyqy").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击找医院下任一医院', '医院区域', '1', '705210']);});
    $(".cnzz_gdyy").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击更多医院', '更多医院按钮', '1', '705211']);});
    $("#cnzz_czyy").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击查疾病', '查疾病按钮', '1', '705212']);});
    $("#cnzz_jbqy").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击查疾病下任一疾病', '疾病区域', '1', '705213']);});
    $(".cnzz_gdjb").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击更多疾病', '更多疾病按钮', '1', '705214']);});
    $("#cnzz_wys").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击问医生', '问医生按钮', '1', '705215']);});
    $("#cnzz_ysqy").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击问医生下任一医生', '医生区域', '1', '705216']);});
    $("#focus").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击banner广告位', '广告位区域', '1', '705217']);});
    $("#cnzz_jbkp").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击疾病科普', '疾病科普和更多按钮', '1', '705218']);});
    $("#cnzz_jbkpqy").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击疾病科普下任一疾病', '疾病科普区域', '1', '705219']);});
    $("#cnzz_wzqy").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击今日热点文章', '今日热点文章和更多', '1', '705220']);});
    $(".cnzz_wz").click(function(){_czc.push(['_trackEvent', '触屏版首页', '点击任一文章', '文章区域', '1', '705221']);});
    $("#cnzz_dhzxzx").click(function(){_czc.push(['_trackEvent', '触屏版首页', '下方导航栏', '在线咨询', '1', '705222']);});
    $("#cnzz_khd").click(function(){_czc.push(['_trackEvent', '触屏版首页', '下方导航栏', '客户端', '1', '705223']);});
    $("#cnzz_grzx").click(function(){_czc.push(['_trackEvent', '触屏版首页', '下方导航栏', '个人中心', '1', '705224']);});
    $("#cnzz_cpb").click(function(){_czc.push(['_trackEvent', '触屏版首页', '下方导航栏', '触屏版', '1', '705225']);});
    $("#cnzz_dnb").click(function(){_czc.push(['_trackEvent', '触屏版首页', '下方导航栏', '电脑版', '1', '705226']);});
    $("#cnzz_wzdt").click(function(){_czc.push(['_trackEvent', '触屏版首页', '下方导航栏', '网站地图', '1', '705227']);});
