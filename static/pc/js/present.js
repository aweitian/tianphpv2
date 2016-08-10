/*presentNavigation 展开收起隐藏礼物 start*/
$(function()
{
    var triggerBtn = $("#triggerBtn");
    var hasShowHidden = $("#hasShowHidden");
    triggerBtn.toggle(function(){
        hasShowHidden.slideDown();
        $(this).text("收起隐藏礼物<<");
        return false;
    },function(){
        hasShowHidden.slideUp();
        $(this).text("展开隐藏礼物>>");
        return false;
    });

});
/*presentNavigation 展开收起隐藏礼物 end*/

//赠送礼物时检查服务条款
function checkPresentTerm()
{//{{{
    if(false == $("#agreeInfo").attr("checked"))
    {
        $("#term").fadeTo("slow", 0, function(){$(this).css({"background-color":"red", "font-color":"white"})});
        $("#term").fadeTo("slow", 1, function(){$(this).css({"background-color":"white", "font-color":"black"})});
        alert('请选择服务条款');
        $("#sendPresent").attr('rel', true);
        return false;
    }
    $("#sendPresent").removeAttr('rel');
    return true;
}//}}}

//检查赠送语的编辑字数
$(function(){
    $("#presentWish").keyup(function(){
        var num = 100-$(this).val().length;
        if ($(this).val().length > 100) {
            alert("赠送语句太长了");
            return false;
        }
        $(this).parent().parent().prev().html('此礼物可自定义赠送语，您还可以输入<span class="red">'+ num +'</span>个字');
    });
});

//预览编辑完赠送语的礼物
function doApplyPresent(finishUrl)
{//{{{
    if ($("#presentWish").val().length < 1 || $("#presentWish").val().length > 100)
    {
        alert("赠送语长度在1到100之间！");
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

//展示礼物明细
$('.tab_present li').click(function(){
    $(this).addClass("tab_active").siblings().removeClass();
    $(".tab_pre_desc > ul").eq($('.tab_present li').index(this)).show().siblings().hide();
});

//礼物赠送成功页面的手机号码设置
function changeMobileSubmit(presentId, spaceUserName)
{/*{{{*/
    var reg_mobile = /^1[34578][0-9]{9}$/;
    if(false == reg_mobile.test($("#presentOrderMobile").val()))
    {
        alert("请输入正确的手机号！");
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
                        alert("手机设置失败");
                    }
        });
        changePage();//该方法在页面上
    }
}/*}}}*/

//判断是否是心意礼物页面
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
     if(isNavtation())//是心意礼物页则当前页面刷新
     {
         document.getElementById('closeKey').target = "_self";
     }
     return true;
 }/*}}}*/

//流详情和文章页的礼物banner 礼物滑动用 
$(function(){
        initFancyBox("a.showDoctorPatientRef");
        var J_box = $('#latestBoughtPresents'),timer;
        function scrollItem(){
        var rollNum = 2;//滚动行数
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
