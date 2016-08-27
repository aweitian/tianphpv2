function guahao(f){
	if (document.form1.name &&document.form1.name.value=="")
	{ 
		alert("您没有填姓名");
		document.form1.name.focus();
		return false;
}
	if (document.form1.age && document.form1.age.value=="")
	{ 
		alert("您没有填年龄");
		document.form1.age.focus();
		return false;
}

if (document.form1.hometel && document.form1.hometel.value=="")
{ 
		alert("您没有填联系电话");
		document.form1.hometel.focus();
		return false;
}

if (document.form1.hometel.value.length<7 || document.form1.hometel.value.length>13)
{ 
	alert("手机或电话格式不正确");
	return false;
}

if (document.form1.d && document.form1.d.value=="0")
{ 
	alert("请选择医生");
	form1.d.focus();
	return false;
}
if (document.form1.j && document.form1.j.value=="0")
{ 
	alert("请选择病种");
	form1.j.focus();
	return false;
}


if (document.form1.yudate && document.form1.yudate.value=="")
{ 
		alert("您没有填预约时间");
		document.form1.yudate.focus();
		return false;
	}
if (document.form1.desc && document.form1.desc.value=="")
{ 
		alert("您没有填病情描述");
		document.form1.desc.focus();
		return false;
	}






return true;
}