/* jQuery jtClite beta_v0.1  */
/*.scoll_box>>>.s_box>>>.s_con至少需要三级目录*/
(function($){$.fn.jCarouselLite=function(o){o=$.extend({btnPrev:null,btnNext:null,btnGo:null,mouseWheel:false,auto:null,speed:200,easing:null,vertical:false,circular:true,visible:3,start:0,scroll:1,beforeStart:null,afterEnd:null},o||{});return this.each(function(){var b=false,animCss=o.vertical?"top":"left",sizeCss=o.vertical?"height":"width";var c=$(this),ul=$("ul",c),tLi=$("li",ul),tl=tLi.size(),v=o.visible;if(o.circular){ul.prepend(tLi.slice(tl-v-1+1).clone()).append(tLi.slice(0,v).clone());o.start+=v}var f=$("li",ul),itemLength=f.size(),curr=o.start;c.css("visibility","visible");f.css({overflow:"hidden",float:o.vertical?"none":"left"});ul.css({margin:"0",padding:"0",position:"relative","list-style-type":"none","z-index":"1"});c.css({overflow:"hidden",position:"relative","z-index":"2",left:"0px"});var g=o.vertical?height(f):width(f);var h=g*itemLength;var j=g*v;f.css({width:f.width(),height:f.height()});ul.css(sizeCss,h+"px").css(animCss,-(curr*g));c.css(sizeCss,j+"px");if(o.btnPrev)$(o.btnPrev).click(function(){return go(curr-o.scroll)});if(o.btnNext)$(o.btnNext).click(function(){return go(curr+o.scroll)});if(o.btnGo)$.each(o.btnGo,function(i,a){$(a).click(function(){return go(o.circular?o.visible+i:i)})});if(o.mouseWheel&&c.mousewheel)c.mousewheel(function(e,d){return d>0?go(curr-o.scroll):go(curr+o.scroll)});if(o.auto)setInterval(function(){go(curr+o.scroll)},o.auto+o.speed);function vis(){return f.slice(curr).slice(0,v)};function go(a){if(!b){if(o.beforeStart)o.beforeStart.call(this,vis());if(o.circular){if(a<=o.start-v-1){ul.css(animCss,-((itemLength-(v*2))*g)+"px");curr=a==o.start-v-1?itemLength-(v*2)-1:itemLength-(v*2)-o.scroll}else if(a>=itemLength-v+1){ul.css(animCss,-((v)*g)+"px");curr=a==itemLength-v+1?v+1:v+o.scroll}else curr=a}else{if(a<0||a>itemLength-v)return;else curr=a}b=true;ul.animate(animCss=="left"?{left:-(curr*g)}:{top:-(curr*g)},o.speed,o.easing,function(){if(o.afterEnd)o.afterEnd.call(this,vis());b=false});if(!o.circular){$(o.btnPrev+","+o.btnNext).removeClass("disabled");$((curr-o.scroll<0&&o.btnPrev)||(curr+o.scroll>itemLength-v&&o.btnNext)||[]).addClass("disabled")}}return false}})};function css(a,b){return parseInt($.css(a[0],b))||0};function width(a){return a[0].offsetWidth+css(a,'marginLeft')+css(a,'marginRight')};function height(a){return a[0].offsetHeight+css(a,'marginTop')+css(a,'marginBottom')}})(jQuery);
/*promo*/
(function($){$.fn.jtSlide=function(iSet){iSet=$.extend({Nav:null,Field:null,K:0,CurCls:'current',Auto:false,AutoTime:4000,OutTime:100,InTime:150,CrossTime:60},iSet||{});var acrossFun=null,hasCls=false,autoSlide=null;function changeFun(n){iSet.Field.filter(':visible').fadeOut(iSet.OutTime,function(){iSet.Field.eq(n).fadeIn(iSet.InTime).siblings().hide();});iSet.Nav.eq(n).addClass(iSet.CurCls).siblings().removeClass(iSet.CurCls);}
changeFun(iSet.K);iSet.Nav.hover(function(){iSet.K=iSet.Nav.index(this);if(iSet.Auto){clearInterval(autoSlide);}
hasCls=$(this).hasClass(iSet.CurCls);acrossFun=setTimeout(function(){if(!hasCls){changeFun(iSet.K);}},iSet.CrossTime);},function(){clearTimeout(acrossFun);if(iSet.Ajax){iSet.AjaxFun();}
if(iSet.Auto){autoSlide=setInterval(function(){iSet.K++;changeFun(iSet.K);if(iSet.K==iSet.Field.size()){changeFun(0);iSet.K=0;}},iSet.AutoTime)}}).eq(0).trigger('mouseleave');}})(jQuery);
/*<a href="javascript:bookmark()" title="将本页加入收藏" target="_self">加入收藏</a>*/


/*========================banner=============================*/
$(function() {

		var len = $("#focusindex ul li").length;

		var index = 0;

			  var picTimer;
	  
			  var btn = "<div class='btn'>";
	 
			  for (var i = 0; i < len; i++) {
	  
				  btn += "<span></span>"
	  
			  }
	  
			  btn += "</div><div class='preNext pre'></div><div class='preNext next'></div>";
	
			  $("#focusindex").append(btn);
	  
			  $("#focusindex .btn span").css("opacity", 1).mouseover(function() {
	  
				  index = $("#focusindex .btn span").index(this);
	  
				  showPics(index)
	  
			  }).eq(0).trigger("mouseover");
	  
			  $("#focusindex .pre").click(function() {
	 
				  index -= 1;
	  
				  if (index == -1) {
	 
					  index = len - 1
	  
				  }
	  
				  showPics(index)
	  
			  });
	  
			  $("#focusindex .next").click(function() {
	  
			index += 1;

			if (index == len) {
		index = 0

			}

			showPics(index)


		});


		$("#focusindex").on("swipeleft",

		function() {

			index -= 1;

			if (index == -1) {
			index = len - 1

			}

			showPics(index)

		});
		$("#focusindex").on("swiperight",
		function() {

			index += 1;

			if (index == len) {
				index = 0

			}

			showPics(index)

		});

		$("#focusindex").hover(function() {

			clearInterval(picTimer)

		},

		function() {

			picTimer = setInterval(function() {

				showPics(index);

				index++;

				if (index == len) {
					index = 0
				}

			},

			4000)

		}).trigger("mouseleave");
		function showPics(index) {

			$("#focusindex .btn span").stop(true, false).removeClass("on").eq(index).stop(true, false).addClass("on");


			$("#focusindex ul li").stop(true, false).animate({

				"opacity": "0"

			},


			300).css("z-index", 0).removeClass("bannerdh").eq(index).stop(true, false).animate({

				"opacity": "1"

			},
			300).addClass("bannerdh").css("z-index", 1)

		}

	});
/*====================banner  end======================*/
$(function(){
  
  	
	
	var tab_jb_nav_li = $('.tab_jb_nav li');//切换样式
	tab_jb_nav_li.mouseover(function(){
		$(this).addClass('selected')
				 .siblings().removeClass('selected');
	var tab_jb_nav_li_index = tab_jb_nav_li.index(this);
	$('.tab_jb_switch .tabcon').eq(tab_jb_nav_li_index).show()
					 .siblings().hide();
	})
	
	
	var tab_jg_nav_li = $('.jgdwboxtit li');//切换样式
	tab_jg_nav_li.mouseover(function(){
		$(this).addClass('selected')
				 .siblings().removeClass('selected');
	var tab_jg_nav_li_index = tab_jg_nav_li.index(this);
	$('.jgdwboxnr .tabconjg').eq(tab_jg_nav_li_index).show()
					 .siblings().hide();
	})
	
	
	var tab_reg_nav_li = $('.registerboxnrltit li');//切换样式
	tab_reg_nav_li.mouseover(function(){
		$(this).addClass('selected')
				 .siblings().removeClass('selected');
	var tab_reg_nav_li_index = tab_reg_nav_li.index(this);
	$('.registerform .registercon').eq(tab_reg_nav_li_index).show()
					 .siblings().hide();
	})
	
		
	var tab_qus_nav_li = $('.quesnav li');//切换样式
	tab_qus_nav_li.mouseover(function(){
		$(this).addClass('selected')
				 .siblings().removeClass('selected');
	var tab_qus_nav_li_index = tab_qus_nav_li.index(this);
	$('.quesall .quescon').eq(tab_qus_nav_li_index).show()
					 .siblings().hide();
	})
	
	
		var tab_ss_nav_li = $('.sstab li');//切换样式
	tab_ss_nav_li.mouseover(function(){
		$(this).addClass('selected')
				 .siblings().removeClass('selected');
	var tab_ss_nav_li_index = tab_ss_nav_li.index(this);
	$('.ssquesall .ssquesbox').eq(tab_ss_nav_li_index).show()
					 .siblings().hide();
	})
	
	
		var tab_zh_nav_li = $('.sstab li');//切换样式
	tab_zh_nav_li.mouseover(function(){
		$(this).addClass('selected')
				 .siblings().removeClass('selected');
	var tab_zh_nav_li_index = tab_zh_nav_li.index(this);
	$('.sszhbox .sszhboxnr').eq(tab_zh_nav_li_index).show()
					 .siblings().hide();
	})
	



 var tab_menu_li = $('.allfrombz dl');//高亮当前选项
  tab_menu_li.mouseover(function(){
  	$(this).addClass('selected')
  			 .siblings().removeClass('selected');
  });




});





