//���ض���
$(document).ready(function() { (function() {
        var t = $('<div class="backToTop"></div>').appendTo($("body")).click(function() {
            $("html, body").animate({
                scrollTop: 0
            },
            120)
        }),
        i = function() {
            var i = $(document).scrollTop(),
            n = $(window).height();
            i > 0 ? t.show() : t.hide();
            if (!window.XMLHttpRequest) {
                t.css("top", i + n - 60)
            }
        };
        $(window).bind("scroll", i);$(".backToTop").slideToggle();

        $(function() {
            i()
        })
    })();
	
	var tab_ss1_nav_li = $('.jb_sstab li');//�л���ʽ
	tab_ss1_nav_li.mouseover(function(){
		$(this).addClass('selected')
				 .siblings().removeClass('selected');
	var tab_ss1_nav_li_index = tab_ss1_nav_li.index(this);
	$('.jb_ssall .jb_ssbox').eq(tab_ss1_nav_li_index).show()
					 .siblings().hide();
	})
	

$(".left_down").click(function() {
	  $(".bg_col").toggle();
	  $(".de_show").toggle();
  });
  $(".bg_col").click(function() {
		  $(this).hide();
		  $(".de_show").hide()
	  });

	
	
	
	
});




