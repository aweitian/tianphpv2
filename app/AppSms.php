<?php
/**
 * @Author: awei.tian
 * @Date: 2016年8月19日
 * @Desc: 
 * 依赖:
 */
require_once FILE_SYSTEM_ENTRY . "/vendor/sms/CCPRestSmsSDK.php";
require_once FILE_SYSTEM_ENTRY . "/modules/oplog/IOp.php";
require_once FILE_SYSTEM_ENTRY . "/modules/oplog/oplog.php";

define ( 'SMS_DEBUG', false );
class AppSms {
	private static function sendVcDbg($to, $vc, $code) {
		$db = new mysqlPdoBase ();
		$db->insert ( "INSERT INTO `data_debug`
				(
			             `c`,
			             `i`)
			VALUES (
			        'sms',
			        :i);", array (
				"i" => 'to:' . $to . ',code:' . $vc 
		) );
		return new rirResult ();
	}
	/**
	 *
	 * @param string $vc        	
	 * @return rirResult
	 */
	public static function sendVc($to, $vc, $code) {
		if (SMS_DEBUG) {
			return AppSms::sendVcDbg ( $to, $vc, $code );
		} else {
			return AppSms::sendVcReal ( $to, $vc, $code );
		}
	}
	/**
	 *
	 * @param string $vc        	
	 * @return rirResult
	 */
	private static function sendVcReal($to, $vc, $code) {
		$op_type = "sms_vc_register";
		$oplog = new oplog ();
		$try_cnt = $oplog->getCnt ( $op_type, identityToken::getInstance ()->getIp () );
		if (SMS_REGIST_GET_VC - $try_cnt <= 0) {
			return new rirResult ( 3, "您获取短信验证码的次数过多。" );
		}
		$opsid = $oplog->add ( $op_type, identityToken::getInstance ()->getIp () );
		
		$captcha = new session_captcha ( new session () );
		if (! $captcha->check ( $code )) {
			return new rirResult ( 4, "验证码校验失败" );
		}
		
		// 主帐号,对应开官网发者主账号下的 ACCOUNT SID
		$accountSid = '8a216da8567745c001568cc638520dd2';
		
		// 主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
		$accountToken = '4b3b424004e8424c9f560cd462549ab2';
		
		// 应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
		// 在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
		
		$appId = '8a216da8567745c001568cc638b40dd9';
		
		$tempId = '110318';
		
		// 请求地址
		// 沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
		// 生产环境（用户应用上线使用）：app.cloopen.com
		$serverIP = 'app.cloopen.com';
		
		// 请求端口，生产环境和沙盒环境一致
		$serverPort = '8883';
		
		// REST版本号，在官网文档REST介绍中获得。
		$softVersion = '2013-12-26';
		
		$rest = new REST ( $serverIP, $serverPort, $softVersion );
		$rest->setAccount ( $accountSid, $accountToken );
		$rest->setAppId ( $appId );
		
		// 发送模板短信
		// echo "Sending TemplateSMS to $to <br/>";
		$result = $rest->sendTemplateSMS ( $to, array (
				$vc 
		), $tempId );
		if ($result == NULL) {
			return new rirResult ( 1, 0x999, "result error!" );
		}
		if ($result->statusCode != 0) {
			return new rirResult ( 2, $result->statusCode, $result->statusMsg );
		} else {
			return new rirResult ( 0, 'ok' );
		}
	}
}