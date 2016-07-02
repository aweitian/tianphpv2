/*presentNavigation չ�������������� start*/
$(function()
{
    var triggerBtn = $("#triggerBtn");
    var hasShowHidden = $("#hasShowHidden");
    triggerBtn.toggle(function(){
        hasShowHidden.slideDown();
        $(this).text("������������<<");
        return false;
    },function(){
        hasShowHidden.slideUp();
        $(this).text("չ����������>>");
        return false;
    });

});
/*presentNavigation չ�������������� end*/

//��������ʱ����������
function checkPresentTerm()
{//{{{
    if(false == $("#agreeInfo").attr("checked"))
    {
        $("#term").fadeTo("slow", 0, function(){$(this).css({"background-color":"red", "font-color":"white"})});
        $("#term").fadeTo("slow", 1, function(){$(this).css({"background-color":"white", "font-color":"black"})});
        alert('��ѡ���������');
        $("#sendPresent").attr('rel', true);
        return false;
    }
    $("#sendPresent").removeAttr('rel');
    return true;
}//}}}

//���������ı༭����
$(function(){
    $("#presentWish").keyup(function(){
        var num = 100-$(this).val().length;
        if ($(this).val().length > 100) {
            alert("�������̫����");
            return false;
        }
        $(this).parent().parent().prev().html('��������Զ��������������������<span class="red">'+ num +'</span>����');
    });
});

//Ԥ���༭�������������
function doApplyPresent(finishUrl)
{//{{{
    if ($("#presentWish").val().length < 1 || $("#presentWish").val().length > 100)
    {
        alert("�����ﳤ����1��100֮�䣡");
        $("#presentWish").focus();
        return false;
    }
    $.ajax({
          type:"POST"
        , url: finishUrl 
        , data: {"wish": $("#presentWish").val()}
        , success: function(data){
            $.fancybox(data, {
                'overlayOpacity' : '0.7',
                    'overlayColor' : 'black',
                    'speedIn' : '120',
                    'speedOut' : '120',
                    'changeFade' : 'fast',
                    'padding' : 0
            });
        }
        , error: function(){
            alert(404);
        }
    });
    return false;
}//}}}

//չʾ������ϸ
$('.tab_present li').click(function(){
    $(this).addClass("tab_active").siblings().removeClass();
    $(".tab_pre_desc > ul").eq($('.tab_present li').index(this)).show().siblings().hide();
});

//�������ͳɹ�ҳ����ֻ���������
function changeMobileSubmit(presentId, spaceUserName)
{/*{{{*/
    var reg_mobile = /^1[34578][0-9]{9}$/;
    if(false == reg_mobile.test($("#presentOrderMobile").val()))
    {
        alert("��������ȷ���ֻ��ţ�");
        return false;
    }
    else
    {
        $.ajax({
            type: "get",
                data: {"mobile": $("#presentOrderMobile").val()
                , "id": presentId 
                , "uname": spaceUserName 
                },
                url: '/api/present/ajaxchangemobile',
                    success: function(data){
                    },
                    error: function()
                    {
                        alert("�ֻ�����ʧ��");
                    }
        });
        changePage();//�÷�����ҳ����
    }
}/*}}}*/

//�ж��Ƿ�����������ҳ��
function isNavtation()
{/*{{{*/
    var isTheUrl = window.document.location.toString().search(/presentnavigation/i);
    if(isTheUrl >= 0)
    {
        return true;
    }
    else
    {
        return false;
    }
}/*}}}*/

function closeKeyDown()
 {/*{{{*/
     parent.$.fancybox.close();
     if(isNavtation())//����������ҳ��ǰҳ��ˢ��
     {
         document.getElementById('closeKey').target = "_self";
     }
     return true;
 }/*}}}*/

//�����������ҳ������banner ���ﻬ���� 
$(function(){
        initFancyBox("a.showDoctorPatientRef");
        var J_box = $('#latestBoughtPresents'),timer;
        function scrollItem(){
        var rollNum = 2;//��������
        var liH = J_box.find("li").first().outerHeight(true);
        var marginS = 'marginTop';
        var animater = {marginTop: -liH*rollNum + "px"};
        J_box.animate(animater, 3000, function(){
            for(var i = 0; i<rollNum; i++){
            $('#latestBoughtPresents > li').first().appendTo(J_box);
            }
            J_box.css(marginS,"0px");
            })
        }
        J_box.hover(function(){
            clearInterval(timer);
            },function(){
            timer = setInterval(function(){
                scrollItem();
                },6000)
            }).trigger("mouseleave");
});
