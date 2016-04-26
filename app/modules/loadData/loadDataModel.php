<?php
/**
 * Date: 2016-04-13
 * Author: Awei.tian
 * Description: 
 */
class loadDataModel extends AppModel{
	private $callback = null;
	
	
	public function __construct(){
		parent::__construct();
		$this->initDb();
		$this->initSqlManager("data");
	}

	public function setCallback($cb){
		$this->callback = $cb;
	}
	/**
	 * true为可以上传
	 * @param string $path
	 * @return array row
	 */
	public function isUploaded($path){
		$fhash = md5_file($path);
		$data = $this->db->fetch($this->sqlManager->getSql("/sql/log_load_token/getRowByToken"), array(
			"token"  => $fhash,
		));
		return $data;
	}
	/**
	 * $_FILES["csv"]
	 * @param array $uf
	 * @return rirResult
	 */
	public function mvFIleToUploads($uf){
		$error = $uf["error"];
		$tmp_name = $uf["tmp_name"];
		//$name = time();
		$name = $uf["name"];
// 		print '<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>';
// 		exit($name);
		$destination = FILE_SYSTEM_ENTRY."/uploads/".$name;
		$errInfo = array(
			"",
			"超过了文件大小，在php.ini文件中设置",
			"超过了文件的大小MAX_FILE_SIZE选项指定的值",
			"文件只有部分被上传",
			"没有文件被上传",
			"上传文件大小为0"
		);
		$error = $error % count($errInfo);
		if($error == 0){
// 			echo $tmp_name;
// 			echo "<br>";
// 			echo $destination;
			move_uploaded_file($tmp_name,$destination);
		}
		return new rirResult($error,$errInfo[$error],$destination);
	}
	
	/**
	 * 检查有没有这个频道，有返回ID，没有插入，返回ID
	 * @param string $chv
	 */
	public function getChananelId($chv){
		if(!loadDataValidator::isValidChannel($chv)){
			return 0;
		}
		$data = $this->db->fetch($this->sqlManager->getSql("/sql/data_channel/getRow"), array(
			"ch_val" => $chv,
		));
		if(empty($data)){
			return $this->db->insert($this->sqlManager->getSql("/sql/data_channel/insert"), array(
				"ch_val" => $chv,
			));
		}else{
			return $data["ch_id"];
		}
	}
	/**
	 * 检查有没有这个帐号，有返回ID，没有插入，返回ID
	 * @param int $ch
	 * @param string $acc
	 * @param pc/mobile $dev
	 * @return int account_id
	 */
	public function getAccountId($ch,$acc){
		if(!loadDataValidator::isValidAcc($acc)){
			return 0;
		}
		$data = $this->db->fetch($this->sqlManager->getSql("/sql/data_account/getRow"), array(
			"ch_id" => $ch,
			"ac_val" => $acc,
		));
		if(empty($data)){
			return $this->db->insert($this->sqlManager->getSql("/sql/data_account/insert"), array(
				"ch_id" => $ch,
				"ac_val" => $acc,
			));
		}else{
			return $data["ac_id"];
		}
	}
	/**
	 * 有返回ID，没有插入返回ID
	 * @param int $acid
	 * @param string $plv
	 * @return int plan id
	 */
	public function getPlanId($acid,$plv){
		if(!loadDataValidator::isValidPlan($plv)){
			return 0;
		}
		$data = $this->db->fetch($this->sqlManager->getSql("/sql/data_plan/getRow"), array(
			"ac_id" => $acid,
			"pl_val" => $plv,
		));
		if(empty($data)){
			return $this->db->insert($this->sqlManager->getSql("/sql/data_plan/insert"), array(
				"ac_id" => $acid,
				"pl_val" => $plv,
			));
		}else{
			return $data["pl_id"];
		}
	}
	/**
	 * 有返回ID，没有插入返回ID
	 * @param int $plid
	 * @param string $uv
	 * @return int unit id
	 */
	public function getUnitId($plid,$uv){
		if(!loadDataValidator::isValidUnit($uv)){
			return 0;
		}
		$data = $this->db->fetch($this->sqlManager->getSql("/sql/data_unit/getRow"), array(
				"pl_id" => $plid,
				"un_val" => $uv,
		));
		if(empty($data)){
			return $this->db->insert($this->sqlManager->getSql("/sql/data_unit/insert"), array(
				"pl_id" => $plid,
				"un_val" => $uv,
			));
		}else{
			return $data["un_id"];
		}
	}
	
	/**
	 * 有返回ID，没有插入返回ID
	 * @param int $unid
	 * @param string $title
	 * @param string $desc1
	 * @param string $desc2
	 * @param string $url
	 * @return int 
	 */
	public function getIdeaId($unid,$title,$desc1,$desc2,$url){
		if(!loadDataValidator::isValidTitle($title)){
			return 0;
		}
		if(!loadDataValidator::isValidDesc1($desc1)){
			return 0;
		}
		if(!loadDataValidator::isValidDesc2($desc2)){
			return 0;
		}
		if(!loadDataValidator::isValidUrl($url)){
			return 0;
		}
		$data = $this->db->fetch($this->sqlManager->getSql("/sql/data_idea/getRow"), array(
			"un_id" => $unid,
			"title" => $title,
			"desc1" => $desc1,
			"desc2" => $desc2,
		));
		if(empty($data)){
			return $this->db->insert($this->sqlManager->getSql("/sql/data_idea/insert"), array(
				"un_id" => $unid,
				"title" => $title,
				"desc1" => $desc1,
				"desc2" => $desc2,
				"url"   => $url
			));
		}else{
			return $data["id_id"];
		}
	}
	
	public function getUploadInfo($token){
		return $this->db->fetch($this->sqlManager->getSql("/sql/log_upload_token/getRowByToken"), array(
				":token" => $token,
		));
	}
	
	
	private function repErr($no,$err){
		if(!is_null($this->callback)){
			call_user_func_array($this->callback, array($no,new rirResult(1,$err)));;
			return ;
		}else{
			exit($err);
		}
	}
	public function loadData($cls,$path){
		if(!preg_match("/^\w+$/", $cls)){
			$this->repErr(0, "CLASS 字段值不合法");
			return ;
		}
		if(!class_exists($cls)){
			$cls_path = FILE_SYSTEM_ENTRY."/app/modules/loadData/format/csv/".$cls.".php";
			if(!file_exists($cls_path)){
				$this->repErr(0, "illegal class in database");
				return ;
			}else{
				require $cls_path;
			}
		}
		
		$rc = new ReflectionClass($cls);
		if($rc->isSubclassOf("csvPrivFormat")){
			//csvPrivFormat
			$this->loadPrivDataToDb($rc->newInstance($path));
			
		}else if($rc->isSubclassOf("csvPubMFormat")){
			//csvPubMFormat
			$this->loadPubDataToDb($rc->newInstance($path));
			
		}else if($rc->isSubclassOf("csvPubPclFormat")){
			//csvPubPclFormat
			$this->loadPubDataToDb($rc->newInstance($path));
			
		}else if($rc->isSubclassOf("csvRelIdeaFormat")){
			//csvRelIdeaFormat
			$this->updateRelForIdea($rc->newInstance($path));
			
		}else if($rc->isSubclassOf("csvRelUnitFormat")){
			//csvRelUnitFormat
			$this->updateRelForUnit($rc->newInstance($path));
			
		}else{
			$this->repErr(0, "CLASS(".$cls.")不是继承于csvFormat");
			return ;
		}
	}
	
	
	public function saveUploadInfo($token,$cls,$path,$cnt){
		return $this->db->exec($this->sqlManager->getSql("/sql/log_upload_token/insert"),array(
			"token" => $token,
			"cls"    => $cls,
			"name"  => $path,
			"cnt"  => $cnt,
		));
	}
	
	
	private function updateRelForUnit(csvRelUnitFormat $csvInst){
		ini_set("max_execution_time", 300);
		$app = 0;
		$upd = 0;
	
		$path = $csvInst->getPath();
		
		$handle = fopen($path, "r");
		if ($handle) {
			$lineNo = 0;
	
			$pdo = mysqlPdo::getConnection();
			//开始一个事实
			$pdo->beginTransaction();
	
			while ($line = fgetcsv($handle)) {
				if($lineNo < $csvInst->getHeaderRows()){$lineNo++;continue;}
	
				$chan = $this->handleCsv($csvInst->getChananel($line));
				$acc  = $this->handleCsv($csvInst->getAcc($line));
				$plan = $this->handleCsv($csvInst->getPlan($line));
				$unit = $this->handleCsv($csvInst->getUnit($line));

				$pcod = $this->handleCsv($csvInst->getPcCode($line));
				$mcod = $this->handleCsv($csvInst->getMCode($line));
	
	
				//validate
				if(loadDataValidator::isValidCode($pcod) && loadDataValidator::isValidCode($mcod)){
					//filter
						
					//insert
					$id = $this->_uploadCodeForUnit($chan, $acc, $plan, $unit, $pcod, $mcod);
				}else{
					$id = new rirResult(1,"数据格式检查没有通过:行号:".($lineNo+1).",名称:".loadDataValidator::$lastk.",内容:".var_export(loadDataValidator::$lastv,true));
				}
	
				if($id->isTrue()){
					$app++;
					if(!is_null($this->callback)){
						call_user_func_array($this->callback, array($lineNo - $csvInst->getHeaderRows(),$app,$upd));
					}
					$lineNo++;
				}else{
	
					$pdo->rollBack();
					fclose($handle);
					if(!is_null($this->callback)){
						call_user_func_array($this->callback, array("<font color=red>".$id->info."</font>",0,0));
					}
					return ;
				}
			}
	
			fclose($handle);
			$pdo->commit();
		} else {
			// error opening the file.
		}
	}
	
	private function updateRelForIdea(csvRelIdeaFormat $csvInst){
		ini_set("max_execution_time", 300);
		$app = 0;
		$upd = 0;
	
		$path = $csvInst->getPath();
		
		$handle = fopen($path, "r");
		if ($handle) {
			$lineNo = 0;
	
			$pdo = mysqlPdo::getConnection();
			//开始一个事实
			$pdo->beginTransaction();

	
			while ($line = fgetcsv($handle)) {
				if($lineNo < $csvInst->getHeaderRows()){$lineNo++;continue;}
	
				$chan = $this->handleCsv($csvInst->getChananel($line));
				$acc  = $this->handleCsv($csvInst->getAcc($line));
				$plan = $this->handleCsv($csvInst->getPlan($line));
				$unit = $this->handleCsv($csvInst->getUnit($line));
				$titl = $this->handleCsv($csvInst->getIdeaTitle($line));
				$des1 = $this->handleCsv($csvInst->getIdeaDesc1($line));
				$des2 = $this->handleCsv($csvInst->getIdeaDesc2($line));
				
				
				$pcod = $this->handleCsv($csvInst->getPcCode($line));
				$mcod = $this->handleCsv($csvInst->getMCode($line));
	
	
				//validate
				if(loadDataValidator::isValidCode($pcod) && loadDataValidator::isValidCode($mcod)){
					//filter

					//insert
					$id = $this->_uploadCodeForIdea($chan, $acc, $plan, $unit, $titl, $des1, $des2, $pcod, $mcod);
				}else{
					$id = new rirResult(1,"数据格式检查没有通过:行号:".($lineNo+1).",名称:".loadDataValidator::$lastk.",内容:".var_export(loadDataValidator::$lastv,true));
				}
	
				if($id->isTrue()){
					$app++;
					if(!is_null($this->callback)){
						call_user_func_array($this->callback, array($lineNo - $csvInst->getHeaderRows(),$app,$upd));
					}
					$lineNo++;
				}else{
	
					$pdo->rollBack();
					fclose($handle);
					if(!is_null($this->callback)){
						call_user_func_array($this->callback, array("<font color=red>".$id->info."</font>",0,0));
					}
					return ;
				}
			}
	
			fclose($handle);
			$pdo->commit();
		} else {
			// error opening the file.
		}
	}
	
	
	
	private function loadPrivDataToDb(csvPrivFormat $csvInst){
		ini_set("max_execution_time", 300);
		$app = 0;
		$upd = 0;
		
		$path = $csvInst->getPath();
		
		$handle = fopen($path, "r");
		if ($handle) {
			$lineNo = 0;
				
			$pdo = mysqlPdo::getConnection();
			//开始一个事实
			$pdo->beginTransaction();
	
			//把文件MD5写入到LOG表中`log_load_token`
			$fhash = md5_file($path);
			$this->db->insert($this->sqlManager->getSql("/sql/log_load_token/insert"), array(
				"token" => $fhash
			));
				
				
			while ($line = fgetcsv($handle)) {
				if($lineNo < $csvInst->getHeaderRows()){$lineNo++;continue;}

				$code = $this->handleCsv($csvInst->getCode($line));
				$chat = $this->handleCsv($csvInst->getChat($line));
				$subs = $this->handleCsv($csvInst->getSubscribe($line));
				$rcvp = $this->handleCsv($csvInst->getRcvpayment($line));
				$link = $this->handleCsv($csvInst->getLink($line));
				$kw   = $this->handleCsv($csvInst->getKw($line));
				$mark = $this->handleCsv($csvInst->getMark($line));
				$date = $this->handleCsv($csvInst->getDate($line));

				
				//validate
				if(loadDataValidator::isValidCode($code)
					&& 	loadDataValidator::isValidChat($chat)
					&& 	loadDataValidator::isValidSubscribue($subs)
					&& 	loadDataValidator::isValidRcvpayment($rcvp)
					&& 	loadDataValidator::isValidLink($link)
					&& 	loadDataValidator::isValidMark($mark)
					&& 	loadDataValidator::isValidDate($date)
						
				){
					//filter
					$link = loadDataFilter::filterLink($link);
					$chat = loadDataFilter::filterChat($chat);
					$subs = loadDataFilter::filterSubscribe($subs);
					$rcvp = loadDataFilter::filterRcvpayment($rcvp);
					
					//insert
					$id = $this->_loadPrivData($code,$chat,$subs,$rcvp,$link,$kw,$mark,$date);
					
					
				}else{
					$id = new rirResult(1,"数据格式检查没有通过:行号:".($lineNo+1).",名称:".loadDataValidator::$lastk.",内容:".var_export(loadDataValidator::$lastv,true));
				}
	
				if($id->isTrue()){
					$app++;
					if(!is_null($this->callback)){
						call_user_func_array($this->callback, array($lineNo - $csvInst->getHeaderRows(),$app,$upd));
					}
					$lineNo++;
				}else{
						
					$pdo->rollBack();
					fclose($handle);
					if(!is_null($this->callback)){
						call_user_func_array($this->callback, array("<font color=red>".$id->info."</font>",0,0));
					}
					return ;
				}
			}
	
			fclose($handle);
			$pdo->commit();
		} else {
			// error opening the file.
		}
	}
	
	private function loadPubDataToDb(csvPubMFormat $csvInst){
		ini_set("max_execution_time", 300);
		$app = 0;
		$upd = 0;

		$path = $csvInst->getPath();
		
		$handle = fopen($path, "r");
		if ($handle) {
			$lineNo = 0;
			
			$pdo = mysqlPdo::getConnection();
			//开始一个事实
			$pdo->beginTransaction();
	
			//把文件MD5写入到LOG表中`log_load_token`
			$fhash = md5_file($path);
			$this->db->insert($this->sqlManager->getSql("/sql/log_load_token/insert"), array(
					"token" => $fhash
			));
			
			$dev = $csvInst->getCsvType() == csvFormat::TYPE_PUB_PC ? "pc" : "m";
			
			while ($line = fgetcsv($handle)) {
				// process the line read.
				//从第9行开始
				if($lineNo < $csvInst->getHeaderRows()){$lineNo++;continue;}
				//日期,小时,账户,推广计划,推广单元,创意标题,创意描述1,创意描述2,显示URL,展现,点击,
				//消费,点击率,平均点击价格,网页转化,商桥转化
				//"2016-03-28",0,"shb-九龙2","性功能-勃起异常","勃起-硬","{男性勃起功能障碍的原因},硬不起来该如何治?",
				//"{男性勃起功能障碍的原因},勃起不坚,时间不长不坚硬的病因是什么,找到病因能一次性治",
				//"吗?上海九龙男子医院专家在线解答勃起问题.","man.long120.cn",1,0,0.00,0.00%,0.00,0,0
				$chana = $this->handleCsv($csvInst->getChannel());
				$acc   = $this->handleCsv($csvInst->getAcc($line));
				$plan  = $this->handleCsv($csvInst->getPlan($line));
				$unit  = $this->handleCsv($csvInst->getUnit($line));
				$title = $this->handleCsv($csvInst->getTitle($line));
				$desc1 = $this->handleCsv($csvInst->getDes1($line));
				$desc2 = $this->handleCsv($csvInst->getDes2($line));
				$url   = $this->handleCsv($csvInst->getUrl($line));
				
				$shows = $this->handleCsv($csvInst->getShow($line));
				$clks  = $this->handleCsv($csvInst->getClks($line));
				$pays  = $this->handleCsv($csvInst->getPays($line));
				$date  = $this->handleCsv($csvInst->getDate($line));
				
				
				//validate
				if(loadDataValidator::isValidChannel($chana)
						&& 	loadDataValidator::isValidAcc($acc)
						&& 	loadDataValidator::isValidPlan($plan)
						&& 	loadDataValidator::isValidUnit($unit)
						&& 	loadDataValidator::isValidTitle($title)
						&& 	loadDataValidator::isValidDesc1($desc1)
						&& 	loadDataValidator::isValidDesc2($desc2)
						&& 	loadDataValidator::isValidUrl($url)
						&& 	loadDataValidator::isValidShows($shows)
						&& 	loadDataValidator::isValidClks($clks)
						&& 	loadDataValidator::isValidPaysum($pays)
						&& 	loadDataValidator::isValidDate($date)
				
						){
							//filter
								
							//insert
							$id = $this->_loadPubData($dev,$chana, $acc, $plan, $unit, $title, $desc1, $desc2, 
								$url, $pays, $shows, $clks, $date);	
								
				}else{
					$id = new rirResult(1,"数据格式检查没有通过:行号:".($lineNo+1).",名称:".loadDataValidator::$lastk.",内容:".var_export(loadDataValidator::$lastv,true));
				}
				
				
				
				
				
				
				
				if($id->isTrue()){
					if($id->info == "ok"){
						$app++;
					}else{
						$upd++;
					}
					if(!is_null($this->callback)){
						call_user_func_array($this->callback, array($lineNo - $csvInst->getHeaderRows() + 1,$app,$upd));
					}
					$lineNo++;
				}else{
					
					$pdo->rollBack();
					fclose($handle);
					if(!is_null($this->callback)){
						call_user_func_array($this->callback, array($id->info,0,0));
					}
					return ;
				}
			}
		
			fclose($handle);
			$pdo->commit();
		} else {
			// error opening the file.
		}
	}
	private function handleCsv($str){
		return trim(iconv("GBK", "UTF8", $str));
		//return str_replace('"',"",iconv("GBK", "UTF8", $str));
	}
	
	private function _loadPrivData($code,$chat,$subscribe,$rcvpayment,$link,$kw,$mark,$date){
		$bindArgs = array(
			"code" => $code,
			"chat" => $chat,
			"subscribe" => $subscribe,
			"rcvpayment" => $rcvpayment,
			"link" => $link,
			"kw" => $kw,
			"mark" => $mark,
			"date" => $date,
		);
		$sql = $this->sqlManager->getSql("/sql/priv_data/insert");
		
		$id = $this->db->insert($sql, $bindArgs);
		if($id > 0){
			return new rirResult(0,"ok",$id);
		}
		return new rirResult(6,$this->db->getErrorInfo());
	}
	
	/**
	 * 
	 * @param string $chananel
	 * @param string $account
	 * @param string $plan
	 * @param string $unit
	 * @param string $pc_code
	 * @param string $m_code
	 * @return rirResult
	 */
	private function _uploadCodeForUnit($chananel,$account,$plan,$unit,$pc_code,$m_code){
		$ch_id = $this->getChananelId($chananel);
		if($ch_id == 0)return new rirResult(1,"获取频道ID失败");
		$ac_id = $this->getAccountId($ch_id, $account);
		if($ac_id == 0)return new rirResult(2,"获取帐户ID失败");
		$pl_id = $this->getPlanId($ac_id, $plan);
		if($pl_id == 0)return new rirResult(3,"获取计划ID失败");
		$un_id = $this->getUnitId($pl_id, $unit);
		if($un_id == 0)return new rirResult(4,"获取单元ID失败");
		
		$sql = $this->sqlManager->getSql("/sql/data_unit/update");
		$data = array(
				"un_id" => $un_id,
				"un_code_pc" => $pc_code,
				"un_code_m" => $m_code,
		);
		$row = $this->db->exec($sql, $data);
		if($row > 0){
			return new rirResult(0,"A row updated",$row);
		}
		return new rirResult(6,$this->db->getErrorInfo());
	}
	
	/**
	 *
	 * @param string $chananel
	 * @param string $account
	 * @param string $plan
	 * @param string $unit
	 * @param string $pc_code
	 * @param string $m_code
	 * @return rirResult
	 */
	private function _uploadCodeForIdea($chananel,$account,$plan,$unit,$title,$desc1,$desc2,$pc_code,$m_code){
		$ch_id = $this->getChananelId($chananel);
		if($ch_id == 0)return new rirResult(1,"获取频道ID失败");
		$ac_id = $this->getAccountId($ch_id, $account);
		if($ac_id == 0)return new rirResult(2,"获取帐户ID失败");
		$pl_id = $this->getPlanId($ac_id, $plan);
		if($pl_id == 0)return new rirResult(3,"获取计划ID失败");
		$un_id = $this->getUnitId($pl_id, $unit);
		if($un_id == 0)return new rirResult(4,"获取单元ID失败");
		$id_id = $this->getIdeaId($un_id, $title, $desc1, $desc2, $url);
		if($id_id == 0)return new rirResult(5,"获取创意ID失败");
		
		
		$sql = $this->sqlManager->getSql("/sql/data_idea/update");
		$data = array(
			"id_id" => $id_id,
			"id_code_pc" => $pc_code,
			"id_code_m" => $m_code,
		);
		$row = $this->db->exec($sql, $data);
		if($row > 0){
			return new rirResult(0,"A row updated",$row);
		}
		return new rirResult(6,$this->db->getErrorInfo());
	}
	
	
	
	/**
	 * 
	 * @param string $dev pc/mobile
	 * @param string $chananel 百度
	 * @param string $account
	 * @param string $plan
	 * @param string $unit
	 * @param string $title
	 * @param string $desc1
	 * @param string $desc2
	 * @param string $url
	 * @param string $paysum
	 * @param string $shows
	 * @param string $clks
	 * @param string $datetime
	 * @return rirResult
	 */
	private function _loadPubData($dev,$chananel,$account,$plan,$unit,$title,$desc1,$desc2,$url,
			$paysum,$shows,$clks,$datetime){
		$ch_id = $this->getChananelId($chananel);
		if($ch_id == 0)return new rirResult(1,"获取频道ID失败");
		$ac_id = $this->getAccountId($ch_id, $account);
		if($ac_id == 0)return new rirResult(2,"获取帐户ID失败");
		$pl_id = $this->getPlanId($ac_id, $plan);
		if($pl_id == 0)return new rirResult(3,"获取计划ID失败");
		$un_id = $this->getUnitId($pl_id, $unit);
		if($un_id == 0)return new rirResult(4,"获取单元ID失败");
		$id_id = $this->getIdeaId($un_id, $title, $desc1, $desc2, $url);
		if($id_id == 0)return new rirResult(5,"获取创意ID失败");
		
		
		
// 		if($title == "{怎样延长性生活时间}?自我锻炼延长30分钟不射"){
// 			echo $acc."<br>";
// 			echo $plan."<br>";
// 			echo $unit."<br>";
// 			echo $title."<br>";
// 			echo $desc1."<br>";
// 			echo $desc2."<br>";
// 			exit("uid:".$un_id);
// 		}
		
		
		
		
		
		$sql = $this->sqlManager->getSql("/sql/publ_data/insert");
		$data = array(
			"id_id" => $id_id,
			"paysum" => $paysum,
			"shows" => $shows,
			"clks" => $clks,
			"dev" => $dev,
			"datetime" => $datetime,
		);
		$id = $this->db->exec($sql, $data);
		
// 		$row = $this->db->exec($sql, $data);
// 		if($row == 1){
// 			//new row inserted
// 		}else if($row == 2){
// 			//updated on old row
// 		}else{
// 			//error
// 		}
		
		if($id > 0){
			if($id == 1){
				return new rirResult(0,"ok",$id);
			}else if($id == 2){
				return new rirResult(0,"update a row",$id);
			}else{
				return new rirResult(7,"unknow error");
			}
		}
		return new rirResult(6,$this->db->getErrorInfo());
	}
}