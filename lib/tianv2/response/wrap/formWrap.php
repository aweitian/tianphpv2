<?php
/**
 * @author:awei.tian
 * @date:2013-12-20
 * @functions:
 */
class formWrap implements IWrap{
	public $action="";
	public $method="post";
	public $submitText="submit";
	public $labels=array();
	public $names=array();
	public $tpl;
	public $rowTpl;
	const TPL_DIV_LABEL=0;
	const TPL_TABLE=1;
	public $tpl_mode=self::TPL_TABLE;
	/**
	 * array("action","method","submitText","labels","names","tpl","rowtpl")
	 * rowtpl:&lt;tr&gt;&lt;td&gt;{label}&lt;/td&gt;&lt;td&gt;{name}&lt;/td&gt;&lt;/tr&gt;
	 * tpl:
	 * &lt;form action="{action}" method="{method}"&gt;
	 * &lt;table&gt;
	 * {tby}
	 * &lt;tr&gt;&lt;td colspan="2"&gt;&lt;input type="submit" value="{submitText}"&gt;&lt;/td&gt;&lt;/tr&gt;
	 * &lt;/table&gt;
	 * &lt;/form&gt;
	 * @param array $data
	 */	
	public function __construct($mode=self::TPL_TABLE){
		if($mode==self::TPL_DIV_LABEL){
			$this->tpl_mode=$mode;
		}else{
			$this->tpl_mode=self::TPL_TABLE;
		}
	}
	private function init($options=array()){
		if(!is_array($options))return ;
		$attrs=array("action","method","submitText","labels","names","tpl","rowTpl");
		foreach ($attrs as $att){
			if(array_key_exists($att, $options)){
				$this->$att=$options[$att];
			}
		}
	}

	public function wrap($data,httpResponse $response){
		$this->getTpl();
		$this->rowTpl();
		$this->init($data);
		$tpl=$this->tpl;
		$rowtpl=$this->rowTpl;
		$tby=array();
		foreach ($this->names as $nk=>$nv){
			$tby[]=strtr($rowtpl, array(
				"{label}"=>(array_key_exists($nk, $this->labels)?$this->labels[$nk]:$nk),
				"{name}"=>$nv,
			));
		}
		return strtr($tpl,array(
			"{action}"=>$this->action,
			"{method}"=>$this->method,
			"{tby}"=>implode("", $tby),
			"{submitText}"=>$this->submitText,
		));
	}
	public function getTpl(/* $var=false */){
		$tpl[]=array();
		$tpl[self::TPL_TABLE]='
				<form action="{action}" method="{method}">
				<table>{tby}
				<tr><td colspan="2"><input type="submit" value="{submitText}"></td></tr>
				</table>
				</form>
				';
		$tpl[self::TPL_DIV_LABEL]='
				<form action="{action}" method="{method}">
				{tby}
				<div><input type="submit" value="{submitText}"></div>
				</form>
				';
		$this->tpl=$tpl[$this->tpl_mode];
	}
	public function rowTpl(){
		$rowtpl=array();
		$rowtpl[self::TPL_TABLE]='<tr><td>{label}</td><td>{name}</td></tr>';
		$rowtpl[self::TPL_DIV_LABEL]='<div><label>{label}</label><div>{name}</div></div>';
		$this->rowTpl=$rowtpl[$this->tpl_mode];
	}
}