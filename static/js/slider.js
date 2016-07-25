(function($) {
$.fn.flashSlider = function(options) {
	var options = $.extend({},
	$.fn.flashSlider.defaults, options);
	this.each(function() {
		var obj = $(this);
		var curr = 1;
		var $img = obj.find("img");
		var s = obj.find("li").length;
		var w = obj.width();
		var h = obj.height();
		var $flashelement = $(obj.children('ul'), obj);
		$flashelement.css('width', s * w);
		options.vertical?'':$(obj.find('li'), obj).css('float', 'left');
        
		$(options.onum).each(function(index){
		  $(this).hover(function() {
    			flash(index+1, true)
    		},
    		function() {
    			timeout = setTimeout(function() {
    				flash((curr / 1 + 1), false)
    			},
    			options.pause / 4)
    		})
        
		})
		function setcurrnum(index) {
			$(options.onum).removeClass(options.btnStyle).eq(index).addClass(options.btnStyle)
		}
		function flash(index, clicked) {
			$flashelement.stop();
			var next = index == s ? 1 : index + 1;
			curr = index - 1;
			setcurrnum((index - 1));
            if(options.oStyle=='slider'){
    			if (!options.vertical) {
    				p = -((index - 1) * w);
    				$flashelement.animate({
    					marginLeft: p
    				},
    				options.speed)
    			} else {
    				p = -((index - 1) * h);
    				$flashelement.animate({
    					marginTop: p
    				},
    				options.speed)
    			};
            }else if(options.oStyle=='fade'){
               obj.find('li').fadeOut().eq(index-1).fadeIn(); 
            }else{
               obj.find('li').hide().eq(index-1).show(); 
            }
            
			if (clicked) {
				clearTimeout(timeout)
			};
			if (options.auto && !clicked) {
				timeout = setTimeout(function() {
					flash(next, false)
				},
				options.speed + options.pause)
			}
		}
		var timeout;
		setcurrnum(0);
		if (options.auto) {
			timeout = setTimeout(function() {
				flash(2, false)
			},
			options.pause)
		}
	})
};
/*** Ĭ��  
-------------------------------------------------------------- ****/ 
$.fn.flashSlider.defaults = {
    oStyle:'',//slider,fadeΪ��ʱ��Ч��
    btnStyle:'on',//��ǰ������ʽ
    onum:'#onum span',
	vertical: true,//oStyle==slider����Ч
	speed: 1000,//�л��ٶ�
	auto: true,//�Զ��л�
	pause: 2500//���ʱ��
}
})(jQuery);

/*** ����  
-------------------------------------------------------------- ****/ 
$(function() {
    $(".leftzj").flashSlider( {
    onum:'#onum span'
    });
	
});