<?php
class AppUrl {
	// 用于检测ControllerNotFound命名冲突
	public static function checkControlExists($ctl) {
		// 检查默认模块，它的优先级比ControllerNotFound高
		$defCtls = tian::getDirList ( FILE_SYSTEM_ENTRY . "/app/modules" );
		foreach ( $defCtls as $path ) {
			if (strtolower ( $ctl ) == pathinfo ( $path, PATHINFO_BASENAME )) {
				return 1;
			}
		}
		
		// 先检查医生 ,由hookControllerNotFound决定
		if (doctorUIApi::getInstance ()->exists ( $ctl )) {
			return 2;
		}
		if (diseaseUIApi::getInstance ()->exists ( $ctl )) {
			return 3;
		}
		
		return 0;
	}
	
	
	
	
	
	// 全局URL
	public static function swtjs() {
		return AppUrl::build ( "/swtjs" );
	}
	
	public static function getMediaPath() {
		return AppUrl::build ( "/static/" . (APP_MOBILE_MODE ? "m" : "pc") );
	}
	public static function getMediaFilePath() {
		return FILE_SYSTEM_ENTRY . "/web/static/" . (APP_MOBILE_MODE ? "m" : "pc");
	}
	public static function Captcha() {
		return AppUrl::build ( "/captcha" );
	}
	public static function navHome() {
		return AppUrl::build ( "/" );
	}
	public static function navDisease() {
		return AppUrl::build ( "/disease" );
	}
	public static function navDoctors() {
		return AppUrl::build ( "/doctors" );
	}
	public static function navSymptom() {
		return AppUrl::build ( "/symptom" );
	}
	public static function navAsk() {
		return AppUrl::build ( "/ask" );
	}
	public static function navArticle() {
		return AppUrl::build ( "/article" );
	}
	public static function navSubscribe() {
		return AppUrl::build ( "/subscribe" );
	}
	public static function navPut() {
		return AppUrl::build ( "/put" );
	}
	public static function navHospital() {
		return AppUrl::build ( "/hospital" );
	}

	
	
	

	public static function intro() {
		return AppUrl::build ( "/help/intro" );
	}
	
	public static function process() {
		return AppUrl::build ( "/help/process" );
	}
	public static function notice() {
		return AppUrl::build ( "/help/notice" );
	}
	public static function policy() {
		return AppUrl::build ( "/help/policy" );
	}
	public static function guide() {
		return AppUrl::build ( "/help/guide" );
	}
	
	
	public static function environment() {
		return AppUrl::build ( "/help/environment" );
	}
	
	
	
	
	// 用户管理
	public static function userHome() {
		return AppUrl::userProfile ();
	}
	public static function userLogin() {
		return AppUrl::build ( "/user/login" );
	}
	public static function userLogout() {
		return AppUrl::build ( "/user/logout" );
	}
	public static function userResetPwd() {
		return AppUrl::build ( "/user/resetpwd" );
	}
	public static function userWritecode() {
		return AppUrl::build ( "/user/writecode" );
	}
	
	public static function userRegister() {
		return AppUrl::build ( "/user/register" );
	}
	public static function userAvatar() {
		return AppUrl::build ( "/user/avatar" );
	}
	public static function userModifypwd() {
		return AppUrl::build ( "/user/modpwd" );
	}
	public static function userProfile() {
		return AppUrl::build ( "/user" );
	}
	public static function userLetter() {
		return AppUrl::build ( "/user/letter" );
	}
	public static function userWriteLetter() {
		return AppUrl::build ( "/user/writeletter" );
	}
	public static function userRemoveLetter() {
		return AppUrl::build ( "/user/rmletter" );
	}
	public static function userRemoveAppraise() {
		return AppUrl::build ( "/user/rmappraise" );
	}
	public static function userAppraise() {
		return AppUrl::build ( "/user/appraise" );
	}
	public static function userWriteAppraise() {
		return AppUrl::build ( "/user/writeappraise" );
	}
	public static function userAddAppraise() {
		return AppUrl::userWriteAppraise ();
	}
	public static function userRmQuestion() {
		return AppUrl::build ( "/user/rmquestion" );
	}
	public static function userRmAppraise() {
		return AppUrl::build ( "/user/rmappraise" );
	}
	public static function userQuestions() {
		return AppUrl::build ( "/user/questions" );
	}
	public static function userAddQuestions() {
		return AppUrl::build ( "/user/addquestions" );
	}
	public static function userRmQuestions() {
		return AppUrl::build ( "/user/rmquestions" );
	}
	public static function userPresents() {
		return AppUrl::build ( "/user/presents" );
	}
	public static function userAddPresents() {
		return AppUrl::build ( "/user/addpresents" );
	}
	public static function userRmPresents() {
		return AppUrl::build ( "/user/rmpresents" );
	}
	public static function userAddComment() {
		return AppUrl::build ( "/user/addcomment" );
	}
	public static function userRegPhoneSendSms() {
		return AppUrl::build ( "/user/sendsms4reg" );
	}
	
	
	
	public static function helpRouting() {
		return AppUrl::build ( "/help/routing" );
	}
	public static function helpAbout() {
		return AppUrl::build ( "/help/about" );
	}
	

	
	// 医生评价
	/**
	 *
	 * @return string
	 */
	public static function appraisePut() {
		return AppUrl::build ( "/appraise" );
	}
	// 感谢信PUT
	/**
	 *
	 * @return string
	 */
	public static function letterPut() {
		return AppUrl::build ( "/letter" );
	}
	
	// 问答URl生成
	/**
	 *
	 * @param string $docid        	
	 * @param int $asd
	 *        	askid
	 * @return string
	 */
	public static function askByAsdDocidAsd($docid, $asd) {
		return AppUrl::build ( "/" . $docid . "/ask/" . $asd . ".html" );
	}
	/**
	 *
	 * @param int $dod        	
	 * @param int $asd
	 *        	askid
	 * @return string
	 */
	public static function askByAsdDocid($dod, $asd) {
		$row = doctorUIApi::getInstance ()->getInfoByDod ( $dod );
		if (empty ( $row )) {
			return AppUrl::_404 ();
		}
		return AppUrl::askByAsdDocidAsd ( $row ["id"], $asd );
	}
	/**
	 *
	 * @param string $lv0key        	
	 * @return string
	 */
	public static function askByLv0key($lv0key) {
		return AppUrl::build ( "/ask/" . $lv0key );
	}
	
	// 医生URL生成
	
	/**
	 * 根据医生ID(NAME那个)生成医生首页的URL
	 *
	 * @param string $diskey        	
	 * @return string
	 */
	public static function docHomeByDocid($docid) {
		return AppUrl::build ( "/" . $docid );
	}
	/**
	 * 根据医生ID(NAME那个)生成医生问答的URL
	 *
	 * @param string $diskey        	
	 * @return string
	 */
	public static function docAskHomeByDocid($docid) {
		return AppUrl::build ( "/" . $docid . "/ask" );
	}
	/**
	 * 根据医生ID(NAME那个)生成医生文章的URL
	 *
	 * @param string $diskey        	
	 * @return string
	 */
	public static function docArticleHomeByDocid($docid) {
		return AppUrl::build ( "/" . $docid . "/article" );
	}
	/**
	 * 根据医生ID(NAME那个)生成医生收到礼物的URL
	 *
	 * @param string $diskey        	
	 * @return string
	 */
	public static function docPresentHomeByDocid($docid) {
		return AppUrl::build ( "/" . $docid . "/present" );
	}
	public static function docLetterHomeByDocid($docid) {
		return AppUrl::build ( "/" . $docid . "/letter" );
	}
	public static function docLetterHomeByDod($dod) {
		$row = doctorUIApi::getInstance ()->getInfoByDod ( $dod );
		if (empty ( $row )) {
			return AppUrl::_404 ();
		}
		return AppUrl::build ( "/" . $row ["id"] . "/letter" );
	}
	/**
	 * 根据医生ID生成医生首页的URL
	 *
	 * @param int $dod        	
	 * @return string
	 */
	public static function docHomeByDod($dod) {
		$row = doctorUIApi::getInstance ()->getInfoByDod ( $dod );
		if (empty ( $row )) {
			return AppUrl::_404 ();
		}
		return AppUrl::docHomeByDocid ( $row ["id"] );
	}
	
	/**
	 * 生成医生感谢信URl
	 *
	 * @param string $docid        	
	 * @param int $led        	
	 * @return string
	 */
	public static function docLetterByDocidLed($docid, $led) {
		return AppUrl::build ( "/" . $docid . "/letter?id=" . $led );
	}
	/**
	 * 生成医生感谢信URl
	 *
	 * @param int $led        	
	 * @return string
	 */
	public static function docLetterByDodLed($dod, $led) {
		$row = doctorUIApi::getInstance ()->getInfoByDod ( $dod );
		if (empty ( $row )) {
			return AppUrl::_404 ();
		}
		return AppUrl::docLetterByDocidLed ( $row ["id"], $led );
	}
	
	// 疾病URL生成
	/**
	 * 根据病种KEY生成URL
	 *
	 * @param string $diskey        	
	 * @return string
	 */
	public static function disHomeByDiseasekey($diskey) {
		return AppUrl::build ( "/" . $diskey );
	}
	/**
	 * 根据病种ID生成URL
	 *
	 * @param int $did        	
	 * @return string
	 */
	public static function disHomeByDid($did) {
		$row = diseaseUIApi::getInstance ()->getRowByDid ( $did );
		if (empty ( $row )) {
			return AppUrl::_404 ();
		}
		return AppUrl::build ( "/" . $row ["key"] );
	}
	
	/**
	 *
	 * @param string $diskey        	
	 */
	public static function disKnowledgeByDiseasekey($diskey) {
		return AppUrl::build ( "/" . $diskey . "/knowledge" );
	}
	/**
	 *
	 * @param string $diskey        	
	 */
	public static function disKnowledgeSubByDiskey($diskey, $subid) {
		return AppUrl::build ( "/" . $diskey . "/knowledge/" . $subid );
	}
	/**
	 *
	 * @param string $diskey        	
	 */
	public static function disAskByDiseasekey($diskey) {
		return AppUrl::build ( "/" . $diskey . "/ask" );
	}
	/**
	 *
	 * @param string $diskey        	
	 */
	public static function disArticleByDiseasekey($diskey) {
		return AppUrl::build ( "/" . $diskey . "/article" );
	}
	/**
	 *
	 * @param string $diskey        	
	 */
	public static function disDoctorsByDiseasekey($diskey) {
		return AppUrl::build ( "/" . $diskey . "/doctors" );
	}
	
	// 文章URL生成
	/**
	 * 获取症状的URL
	 *
	 * @param int $syd        	
	 * @return string
	 */
	public static function articleBySyd($syd) {
		$aid = articleUIApi::getInstance ()->getFirstAidBySyd ( $syd );
		if ($aid == 0) {
			return AppUrl::_404 ();
		} else {
			return AppUrl::articleByAid ( $aid );
		}
	}
	/**
	 *
	 * @param int $aid        	
	 * @return string
	 */
	public static function articleByAid($aid) {
		$dod = articleUIApi::getInstance ()->getFirstDod ( $aid );
		if ($dod == 0) {
			return AppUrl::_404 ();
		} else {
			return AppUrl::articleByDodAid ( $dod, $aid );
		}
	}
	
	/**
	 * 根据医生ID和文章ID生成URL
	 *
	 * @param int $dod        	
	 * @param int $aid        	
	 * @return string
	 */
	public static function articleByDodAid($dod, $aid) {
		$row = doctorUIApi::getInstance ()->getInfoByDod ( $dod );
		if (empty ( $row )) {
			return AppUrl::_404 ();
		}
		return AppUrl::articleByDocidAid ( $row ["id"], $aid );
	}
	
	/**
	 * 优先使用这个函数获取
	 *
	 * @param string $doc_id        	
	 * @param int $aid        	
	 * @return string
	 */
	public static function articleByDocidAid($doc_id, $aid) {
		return AppUrl::build ( "/" . $doc_id . "/article/" . $aid . ".html" );
	}
	
	// 基本URL生成
	/**
	 * 获取医生图片的URL
	 */
	public static function getDoctorAvatarUrl($avatar,$size="80X65") {
		return HTTP_ENTRY . "/static/" . (APP_MOBILE_MODE ? "m" : "pc") . "/doctor/". $size . "/" . $avatar;
	}
	/**
	 * 获取医生图片的文件路径
	 */
	public static function getDoctorAvatarPath($size="80X65") {
		return FILE_SYSTEM_ENTRY . "/static/" . (APP_MOBILE_MODE ? "m" : "pc") . "/doctor" . "/" . $size;
	}
	
	/**
	 * 获取用户图片的URL
	 */
	public static function getUserAvatarUrl($docid) {
		return HTTP_ENTRY . "/static/" . (APP_MOBILE_MODE ? "m" : "pc") . "/avatar/" . $docid;
	}
	/**
	 * 获取用户图片的文件路径
	 */
	public static function getUserAvatarPath() {
		return FILE_SYSTEM_ENTRY . "/static/" . (APP_MOBILE_MODE ? "m" : "pc") . "/avatar";
	}
	
	/**
	 * 基本URL生成
	 *
	 * @param string $path        	
	 * @return string
	 */
	public static function build($path) {
		return HTTP_ENTRY . $path;
	}
	/**
	 * 获取商务通URL
	 *
	 * @return string
	 */
	public static function getSwtUrl() {
		return "javascript:void(0)";
	}
	/**
	 * 404路径
	 *
	 * @return string
	 */
	public static function _404() {
		return HTTP_ENTRY . "/404";
	}
}