//iv.tian
$(function(){
	function getMetaData(){
		return ["渠道","账户","计划","单元"];
	}
	function getPathKey(){
		return ["channel","account","plan","unit"];
	}
	function getIdMeta(){
		return ["ch_id","ac_id","pl_id","un_id"];
	}
	/**
	 * 返回路径数组
	 * 路径出错返回空数组
	 * 参数p:已知路径数组
	 * 参数n:返回路径长度
	 */
	function gd_path(p,n){
		var g = false;
		var r = [];
		var t = gd;
		for(var i=0;i<p.length;i++){
			if(p[i] in t){
				t = t[p[i]]["children"];
				r.push(p[i]);
			}else{
				return [];
			}
		}
		//channel,account,plan,unit
		for(var k=i;k<n;k++){
			for(var i in t){
				r.push(i);
				t = t[i]["children"];
				g = true;
				break;
			}
			if(!g)break;
		}
		if(r.length<n)return [];
		return r;
	}
	/**
	 * 参数p为路径数组
	 * 返回数组，数组元素为HTML，路径出错返回空数组
	 */
	function getSelByPath(p){
		var x = getPathKey();
		var z = getIdMeta();
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
		function sel(a,b){
			if(a == b){
				return  " selected";
			}
			return "";
		}
		for(var i=0;i<q.length;i++){
			var html = '<select name="sel_'+x[i]+'" onchange="pccb('+i+')">';
			for(var v in q[i]){
				html += '<option'+sel(v,p[i])+' value="'+(q[i][v]["data"][z[i]])+'">'+htmlentities(v)+'</option>';
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
	window.pccb = function(n){
		var x = getPathKey();
		var p = [];
		for(var i=0;i<=n;i++){
			p.push($("select[name=sel_"+x[i]+"]").find("option:selected").text());
		}
		return main(gd_path(p,calcN()));
	};
	/**
	 * N为选中的深度
	 * 不限0  渠道1  账户2  计划3  单元4
	 */
	function calcN(){
		var n = 0;
		
		n++;
		if($("#lvl_channel").attr("checked")){
			return n;
		}
		n++;
		if($("#lvl_account").attr("checked")){
			return n;
		}
		n++;
		if($("#lvl_plan").attr("checked")){
			return n;
		}
		n++;
		if($("#lvl_unit").attr("checked")){
			return n;
		}
		return 0;
	}
	function main(path){
		//console.log(path);
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

		return main(gd_path([],calcN()));
		
	});
});
