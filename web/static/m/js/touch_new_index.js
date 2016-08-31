    $(function(){
        var n = "���� ҽ�� ҽԺ ���� ���� ��ѯ";
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

        /*�����ҽԺ�л�*/
        /*�������ɾ��*/
        $(".list_nav>li").click(function(){
            var num = $(".list_nav").children("li").index($(this));
            if($(this).hasClass("curli")){
                if(num == 0){
                    $(this).children("a").attr("href","/");
                }
                if(num == 1){
                    $(this).children("a").attr("href","/");
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
	
//	function submitCheck() {                                                                                                                                                              //
//        var kw = $('#indexsearch').val().trim();                                                                                                                                          //
//        if (kw == '' || kw == '���� ҽ�� ҽԺ ���� ���� ��ѯ') {                                                                                                                      //
//            alert('������ҽԺ�������ҽ������');           			//
//            return false;                                                                                                                                                                 //
//        }                                                                                                                                                                                 //
//        $('#search_form').submit();                                                                                                                                                       //
//    }          
//	//
//	var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");//
//	document.write(unescape("%3Cspan id='cnzz_stat_icon_1256706712'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol  + "s4.cnzz.com/z_stat.php%3Fid%3D1256706712%26show%3Dpic1' type='text/javascript'%3E%3C/script%3E"));//
//	document.getElementById("cnzz_stat_icon_1256706712").style.display = "none";//
//	//
//	function cnzz_click(id){//
//        if(id=='cnzz_search'){//
//            _czc.push(['_trackEvent', '��������ҳ', '�������', '������ť', '1', '705001']);//
//        }//
//    }//
//    $("#cnzz_srchbydc").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�����ҽԺ��ҽ��', '��ҽԺ��ҽ��ť', '1', '705201']);});//
//    $("#cnzz_srchbyds").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�����������ҽ��', '��������ҽ��ť', '1', '705203']);});//
//    $("#cnzz_zxzx").click(function(){_czc.push(['_trackEvent', '��������ҳ', '��ʼ������ѯ', '������ѯ��ť', '1', '705204']);});//
//    $("#cnzz_mzjh").click(function(){_czc.push(['_trackEvent', '��������ҳ', '��ʼ����Ӻ�', '����ӺŰ�ť', '1', '705205']);});//
//    $("#cnzz_dhzx").click(function(){_czc.push(['_trackEvent', '��������ҳ', '��ʼ�绰��ѯ', '�绰��ѯ��ť', '1', '705206']);});//
//    $("#cnzz_ksjz").click(function(){_czc.push(['_trackEvent', '��������ҳ', '��ʼ���پ���', '���پ��ﰴť', '1', '705207']);});//
//    $("#cnzz_pzyy").click(function(){_czc.push(['_trackEvent', '��������ҳ', '��ʼƷ��ԤԼ', 'Ʒ��ԤԼ��ť', '1', '705208']);});//
//    $("#cnzz_zyy").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�����ҽԺ', '��ҽԺ��ť', '1', '705209']);});//
//    $("#cnzz_yyqy").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�����ҽԺ����һҽԺ', 'ҽԺ����', '1', '705210']);});//
//    $(".cnzz_gdyy").click(function(){_czc.push(['_trackEvent', '��������ҳ', '������ҽԺ', '���ҽԺ��ť', '1', '705211']);});//
//    $("#cnzz_czyy").click(function(){_czc.push(['_trackEvent', '��������ҳ', '����鼲��', '�鼲����ť', '1', '705212']);});//
//    $("#cnzz_jbqy").click(function(){_czc.push(['_trackEvent', '��������ҳ', '����鼲������һ����', '��������', '1', '705213']);});//
//    $(".cnzz_gdjb").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�����༲��', '��༲����ť', '1', '705214']);});//
//    $("#cnzz_wys").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�����ҽ��', '��ҽ��ť', '1', '705215']);});//
//    $("#cnzz_ysqy").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�����ҽ������һҽ��', 'ҽ������', '1', '705216']);});//
//    $("#focus").click(function(){_czc.push(['_trackEvent', '��������ҳ', '���banner���λ', '���λ����', '1', '705217']);});//
//    $("#cnzz_jbkp").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�����������', '�������պ͸�ఴť', '1', '705218']);});//
//    $("#cnzz_jbkpqy").click(function(){_czc.push(['_trackEvent', '��������ҳ', '���������������һ����', '������������', '1', '705219']);});//
//    $("#cnzz_wzqy").click(function(){_czc.push(['_trackEvent', '��������ҳ', '��������ȵ�����', '�����ȵ����º͸��', '1', '705220']);});//
//    $(".cnzz_wz").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�����һ����', '��������', '1', '705221']);});//
//    $("#cnzz_dhzxzx").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�·�������', '������ѯ', '1', '705222']);});//
//    $("#cnzz_khd").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�·�������', '�ͻ���', '1', '705223']);});//
//    $("#cnzz_grzx").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�·�������', '��������', '1', '705224']);});//
//    $("#cnzz_cpb").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�·�������', '������', '1', '705225']);});//
//    $("#cnzz_dnb").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�·�������', '���԰�', '1', '705226']);});//
//    $("#cnzz_wzdt").click(function(){_czc.push(['_trackEvent', '��������ҳ', '�·�������', '��վ��ͼ', '1', '705227']);});
