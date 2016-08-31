/*2015年9月--于潇川--app转化产品三期*/

$(function(){
    $(".closeid .close").click(function () {
        $(this).parent("div").css("display", "none")
    });

    /*wap端三期*/
    function nGoTop(){
        if($(window).scrollTop() > 94){
            $(".go94").fadeIn()
        }else{
            $(".go94").fadeOut()
        }
    }
    nGoTop();
    $(window).scroll(function(){
        nGoTop();
    })
    /*wap端三期*/
});