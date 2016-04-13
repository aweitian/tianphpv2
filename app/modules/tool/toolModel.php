<?php
/**
 * Date: 2015年12月31日
 * Author: Awei.tian
 * Description: 
 */
class toolModel extends model{
	public function genMvc(pmcaiMsg $msg){
		$ctl = $msg->getControl();
		$pt = $msg["name"];
		$path = FILE_SYSTEM_ENTRY.'/app/modules/'.$pt;
		if(is_dir($path)){
			exit('folder ['.$pt.'] exits');
		}
		mkdir($path);
		chmod($path, 0777);
		$str = file_get_contents('app/modules/tool/tpl/control.tpl');
		$c = strtr($str,array(
				"{date}"=>date("Y-m-d",time()),
				"{name}"=>$pt
		));
		file_put_contents($path.'/'.$pt.'Controller.php', $c);
		chmod($path.'/'.$pt.'Controller.php', 0777);
			
		$str = file_get_contents('app/modules/tool/tpl/model.tpl');
		$c = strtr($str,array(
				"{date}"=>date("Y-m-d",time()),
				"{name}"=>$pt
		));
		file_put_contents($path.'/'.$pt.'Model.php', $c);
		chmod($path.'/'.$pt.'Model.php', 0777);
			
		$str = file_get_contents('app/modules/tool/tpl/view.tpl');
		$c = strtr($str,array(
				"{date}"=>date("Y-m-d",time()),
				"{name}"=>$pt
		));
		file_put_contents($path.'/'.$pt.'View.php', $c);
		chmod($path.'/'.$pt.'View.php', 0777);
	}
	public function getTabNames(){
		require_once FILE_SYSTEM_ENTRY."/lib/db/mysql/mysqlDbInfo.php";
		$dbInfo = new mysqlDbInfo(DB_NAME);
		return $dbInfo->getTableNames();
	}
	public function genSql(pmcaiMsg $msg){
		$tbname = $msg["tb"];
		$method = $msg["method"];
		require_once FILE_SYSTEM_ENTRY."/lib/db/mysql/mysqlTableInfo.php";
		$tbInfo = new mysqlTableInfo($tbname);
		$sql = "";
		$var = "array(\n_PH_\n)";
		$data = $tbInfo->getColumnNames();
		$i = 0;
		$obj = array(
			"_tbname_" => $tbname
		);
		$cnt = count($data);
		switch ($method){
			case "SELECT":
				$tpl = $this->tpl_select($cnt);
				break;
			case "INSERT";
				$tpl = $this->tpl_insert($cnt);
				break;
			case "UPDATE";
				$tpl = $this->tpl_update($cnt);
				break;	
			default;
				$tpl = $this->tpl_delete();
				return array("sql"=>strtr($tpl,$obj),"var"=>strtr($var,array("_PH_"=>"")));
		}
		$ph = "";
		foreach ($data as $col){
			$obj["f".$i] = $col;
			$ph .= "\t\":".$col."\" => \$".$col.",\n";
			$i++;
		}
		return array("sql"=>strtr($tpl,$obj),"var"=>strtr($var,array("_PH_"=>$ph)));
	}
	private function tpl_select($cnt){
		$tpl = "SELECT _FIELDS_ FROM `_tbname_` WHERE 1";
		$ret = array();
		for($i=0;$i<$cnt;$i++){
			$ret[] = "`f".$i."`";
		}
		return strtr($tpl,array(
			"_FIELDS_" => join(",",$ret)
		));
	}
	
	private function tpl_insert($cnt){
		$tpl = "INSERT INTO `_tbname_` (_FIELDS_) VALUES (_PLACEHOLDER_)";
		$f = array();
		$p = array();
		for($i=0;$i<$cnt;$i++){
			$f[] = "`f".$i."`";
			$p[] = ":f".$i;
		}
		return strtr($tpl,array(
			"_FIELDS_" => join(",",$f),
			"_PLACEHOLDER_" => join(",",$p)
		));
	}
	
	private function tpl_update($cnt){
		$tpl = "UPDATE `_tbname_` SET _FIELDS_ WHERE 1";
		$ret = array();
		for($i=0;$i<$cnt;$i++){
			$ret[] = "`f".$i."`=:f".$i;
		}
		return strtr($tpl,array(
			"_FIELDS_" => join(",",$ret)
		));
	}
	private function tpl_delete(){
		$tpl = "DELETE FROM `_tbname_` WHERE 1";
		return $tpl;
	}
}