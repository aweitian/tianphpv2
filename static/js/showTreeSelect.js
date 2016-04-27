$(function(){
	function getMetaData(){
		return ["渠道","账户","计划","单元"];
	}
	/**
	 * 返回默认路径数组
	 */
	function gd_def_path(n){
		var g = false;
		var p = [];
		var t = gd;
		//channel,account,plan,unit
		for(var k=0;k<n;k++){
			for(var i in t){
				p.push(i);
				t = t[i]["children"];
				g = true;
				break;
			}
			if(!g)break;
		}

		return p;
	}
	/**
	 * 返回数组，数组元素为HTML，路径出错返回空数组
	 */
	function getSelByPath(p){
		var t = gd;
		var q = [];
		var r = [];
		for(var i=0;i<p.length;i++){
			q.push(t);
			if(p[i] in t)
				t = t[p[i]]["children"];
			else
				return [];
		}
		for(var i=0;i<q.length;i++){
			var html = '<select>';
			for(var v in q[i]){
				html += '<option value="'+htmlentities(v)+'">'+htmlentities(v)+'</option>';
			}
			html += '</select>';
			r.push(html);
		}
		return r;
	}
	/**
	 * 返回HTML字符串
	 * 参数sel_html_arr   getSelByPath函数的返回值
	 */
	function helper_sel_html(sel_html_arr){
		var md = getMetaData();
		var tpl = '<table class="lvltb">';
		
		for(var i=0;i<sel_html_arr.length;i++){
			tpl += '<tr><td>'+md[i]+'</td><td>'+sel_html_arr[i]+'</td></tr>';
		}
		
		tpl += '</table>';
		return tpl;
	}
	
	function main(path){
		$("#lvl_filter_c").html(helper_sel_html(getSelByPath(path)));
	}
	$("input[name=level]").click(function(){
		var filter_c_hf = $("#lvl_all").attr("checked");
		if(filter_c_hf){
			$("#lvl_filter_c").parent().addClass("f-dn");
			return;
		}else{
			$("#lvl_filter_c").parent().removeClass("f-dn");
		}
		
		var n = 0;
		
		n++;
		if($("#lvl_chananel").attr("checked")){
			return main(gd_def_path(n));
		}
		n++;
		if($("#lvl_account").attr("checked")){
			return main(gd_def_path(n));
		}
		n++;
		if($("#lvl_plan").attr("checked")){
			return main(gd_def_path(n));
		}
		n++;
		if($("#lvl_unit").attr("checked")){
			return main(gd_def_path(n));
		}
		
		
	});
});
