<?php
class userModel extends AppModel {
	/**
	 *
	 * @var session
	 */
	public $session;
	public function __construct() {
	}
	public function initSession() {
		$this->session = AppUser::getInstance ()->session;
	}
	/**
	 *
	 * @param string $nep        	
	 * @param string $pwd        	
	 * @param string $code        	
	 * @return rirResult
	 */
	public function chk($nep, $pwd, $code = "") {
		return userUIApi::getInstance ()->initLogin ( $this->session )->check ( $nep, $pwd, $code );
	}
	
	
	public function addComment($uid,$aid,$c){
		return putUIApi::getInstance ()->addComment($uid,$aid,$c);
		
	}
	public function givePresent($uid,$dod,$pid){
		return putUIApi::getInstance ()->givePresent($uid,$dod,$pid);
		
	}
	public function getDisease() {
		return diseaseUIApi::getInstance()->getInfo();
	}
	
	
	
	/**
	 * 修改头像
	 * 
	 * @param int $uid        	
	 * @param string $a        	
	 * @return rirResult
	 */
	public function avatar($uid, $a) {
		return userUIApi::getInstance ()->avatar ( $uid, $a );
	}
	/**
	 * 修改密码
	 * 
	 * @param int $uid        	
	 * @param string $op        	
	 * @param string $np        	
	 * @return rirResult
	 */
	public function modpwd($uid, $op, $np) {
		return putUIApi::getInstance ()->modpwd ( $uid, $op, $np );
	}
	public function resetPwd($nep, $sq, $sa, $pwd) {
		return putUIApi::getInstance ()->resetPwd ( $nep, $sq, $sa, $pwd );
	}
	/**
	 * 
	 * @param int $uid
	 * @param string $name
	 * @param string $sq
	 * @param string $sa
	 * @param string $eml
	 * @param string $phone
	 * @return rirResult
	 */
	public function modProfile($uid, $name, $eml, $phone, $sq, $sa) {
		return putUIApi::getInstance ()->modProfile ( $uid, $name, $eml, $phone, $sq, $sa );
	}
	
	public function getDocNameByDod($dod){
		return doctorUIApi::getInstance()->getNameByDod($dod);
	}
	
	/**
	 * sid,uid,dod,did,verify,content,date
	 *
	 * @param int $length
	 * @param int $offset
	 * @return array(fetchAll);
	 */
	public function getDataByDod($dod, $length, $offset = 0) {
		return letterUIApi::getInstance ()->getDataByDod ( $dod, $length, $offset );
	}
	/**
	 * sid,uid,dod,did,verify,content,date
	 *
	 * @param int $length
	 * @param int $offset
	 * @return array(fetchAll);
	 */
	public function getDataByUid( $length, $offset = 0) {
		$info = AppUser::getInstance()->auth->getInfo();
		return letterUIApi::getInstance ()->getDataByUid ($info["sid"] , $length, $offset );
	}
	public function getDataCntByUid($uid) {
		$info = AppUser::getInstance()->auth->getInfo();
		return letterUIApi::getInstance ()->getDataCntByUid ($info["sid"]);
	}
	
	
	public function getAppraiseDataByUid( $length, $offset = 0) {
		$info = AppUser::getInstance()->auth->getInfo();
		return appraiseUIApi::getInstance ()->getDataByUid ($info["sid"] , $length, $offset );
	}
	public function getDataByUidCnt($uid) {
		$info = AppUser::getInstance()->auth->getInfo();
		return appraiseUIApi::getInstance ()->getDataByUidCnt ($info["sid"]);
	}
	
	
	public function getQuestionsDataByUid( $length, $offset = 0) {
		$info = AppUser::getInstance()->auth->getInfo();
		return askUIApi::getInstance ()->getQuestionsByUid ($info["sid"] , $length, $offset );
	}

	public function getQuestionsByUidCnt($uid){
		$info = AppUser::getInstance()->auth->getInfo();
		return askUIApi::getInstance()->getQuestionsByUidCnt($info["sid"]);
	}
	
	
	public function getPresentDataByUid( $length, $offset = 0) {
		$info = AppUser::getInstance()->auth->getInfo();
		return presentUIApi::getInstance ()->getDataByUid ($info["sid"] , $length, $offset );
	}
	
	
	public function getPresentDataByUidCnt($uid) {
		$info = AppUser::getInstance()->auth->getInfo();
		return presentUIApi::getInstance ()->getDataByUidCnt ($info["sid"]);
	}
	public function row($pid) {
		$info = AppUser::getInstance()->auth->getInfo();
		return presentUIApi::getInstance ()->row ($pid);
	}
	
	
	
	
	public function rmPresent($uid,$pid){
		return putUIApi::getInstance()->rmPresent($uid, $pid);
	}
	public function rmLetter($uid,$led){
		return putUIApi::getInstance()->rmLetter($uid, $led);
	}
	public function rmAppraise($uid,$appid){
		return putUIApi::getInstance()->rmAppraise($uid, $appid);
	}
	public function rmQuestion($uid,$qid){
		return putUIApi::getInstance()->rmQuestion($uid, $qid);
	}
	public function getAllDoc(){
		return doctorUIApi::getInstance()->getAll();
	}
	public function getNameByDod($dod){
		return doctorUIApi::getInstance()->getNameByDod($dod);
	}
	public function getLv0KeyInfoes(){
		return diseaseUIApi::getInstance()->getLv0KeyInfoes();
	}
	public function getNameByDid($did){
		return diseaseUIApi::getInstance()->getNameByDid($did);
	}
	
	
	
	
	
	/**
	 * 
	 * @param int $dod
	 * @param string $content
	 * @return rirResult
	 */
	public function writeLetter($dod,$did,$content){
		$info = AppUser::getInstance()->auth->getInfo();
		return putUIApi::getInstance()->addLetter($info["sid"] , $dod, $did, $content);
	}
	public function writeAppraise($did,$dod,$lv,$content){
		$info = AppUser::getInstance()->auth->getInfo();
		return putUIApi::getInstance()->addAppraise($info["sid"] , $did, $dod, $lv, $content);
	}
	
	
	/**
	 * 返回真表示正常
	 * 
	 * @return boolean
	 */
	public function chkLoginPermit() {
		return userUIApi::getInstance ()->initLogin ( $this->session )->chkLoginPermit ();
	}
	
	/**
	 * 获取是否需要验证码
	 * 
	 * @return boolean
	 */
	public function getVcFlag() {
		return userUIApi::getInstance ()->initLogin ( $this->session )->getVcFlag ();
	}
	public function register_normal($name, $pwd, $sq, $sa, $eml, $code) {
		return putUIApi::getInstance ()->register_normal ( $name, $pwd, $sq, $sa, $eml, $code );
	}
}