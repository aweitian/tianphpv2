           

var boxzj = document.getElementById("topzj"),can=true;
if(boxzj){
	boxzj.innerHTML+=boxzj.innerHTML;
boxzj.onmouseover=function(){can=false};
boxzj.onmouseout=function(){can=true};
new function (){
 var stop=boxzj.scrollTop%60==0&&!can;
 if(!stop)boxzj.scrollTop==parseInt(boxzj.scrollHeight/2)?boxzj.scrollTop=0:boxzj.scrollTop++;
 setTimeout(arguments.callee,boxzj.scrollTop%60?10:5000);
};

	}





var boxlw = document.getElementById("toplw"),can=true;
boxlw.innerHTML+=boxlw.innerHTML;
boxlw.onmouseover=function(){can=false};
boxlw.onmouseout=function(){can=true};
new function (){
 var stop=boxlw.scrollTop%103==0&&!can;
 if(!stop)boxlw.scrollTop==parseInt(boxlw.scrollHeight/2)?boxlw.scrollTop=0:boxlw.scrollTop++;
 setTimeout(arguments.callee,boxlw.scrollTop%103?10:4000);
};
