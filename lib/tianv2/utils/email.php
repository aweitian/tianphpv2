<?php
/**
 * @author:awei.tian
 * @date:2013-12-30
 * @functions:
 */
class email{
	private $mode = "socket";//socketmode
	private $smtpsocket = false;
	private $debug = true;
	private $prefix = "";
	private $host = "smtp.qq.com";
	private $port = "25";
	private $user = "";
	private $pass = "";
	private $type = "HTML";
	private $body = "";
	private $to = "";
	private $from = "";
	private $subject = "";

	private $CRLF = "\r\n";
	private $timer = 10;

	public function __construct($u,$p,$t,$s,$b,$h=null,$o=null){
		if(!is_null($h))$this->host = $h;
		if(!is_null($o))$this->port = $o;
		$this->user = $u;
		$this->from = $u;
		$this->pass = $p;
		$this->subject = $s;
		$this->to = $t;
		$this->body = $b;
	}
	public function setSocketMode($mode){
		$this->mode = $mode;
	}
	public function showDemo(){
		echo '<pre>$demo = new Email("你自己的EMAIL","你的密码","收信人的EMAIL","EMAIL标题","EMAIL内容");
if($demo -> send())echo "message has sent";
else echo "message sent failed..";</pre>';

	}
	private function connect(){
		if($this->mode === ""){
			$this -> smtpsocket = fsockopen($this -> prefix . $this -> host,$this -> port, $errno, $errstr, $this -> timer);
			if(!($this -> smtpsocket && $this->smtp_ok())){
				$this -> err("Connect failed");
				return false;
			}else{
				return true;
			}
			if(substr(PHP_OS, 0, 3) != "WIN")
				socket_set_timeout($this->smtpsocket, $timer, 0);
		}else{
			$this -> smtpsocket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
			socket_connect($this -> smtpsocket,gethostbyname($this->host), 25);
			if($this -> smtpsocket){
				return true;
			}else{
				return false;
			}
		}
	}
	private function smtp_ok(){
		if($this->mode === ""){
			while($response = fgets($this -> smtpsocket, 512)){
				if(substr($response,3,1) == " "){break;}
			}
			if (!ereg("^[23]", $response)){
				$this -> err($response);
				fputs($this -> smtpsocket, "QUIT" . $this -> CRLF);
				$response = fgets($this -> smtpsocket, 512);
				if ($response != 221){
					echo "Quit command executed failed...<br>";
				}
				return false;
			}
			return true;
		}else{
			while($response = socket_read($this -> smtpsocket, 512)){
				if(substr($response,3,1) == " "){break;}
			}
			if (!ereg("^[23]", $response)){
				$this -> err($response);
				socket_write($this -> smtpsocket, "QUIT" . $this -> CRLF);
				$response = socket_read($this -> smtpsocket, 512);
				if ($response != 221){
					echo "Quit command executed failed...<br>";
				}
				return false;
			}
			return true;
		}
	}
	private function err($str = ""){
		//if($this -> debug){
		echo "> Error: Remote host returned <font color=red>".$str."</font><br>" . $this -> CRLF;
		//}
	}
	private function sendcmd($cmd,$arg = ""){
		if($this->mode === ""){
			if($arg){
				if(!$cmd) $cmd = $arg;
				else $cmd = $cmd . " " . $arg;
			}
			fputs($this -> smtpsocket, $cmd . $this -> CRLF);
			while($response = fgets($this -> smtpsocket, 512)){
				if(substr($response,3,1) == " "){break;}
			}
			if (!ereg("^[23]", $response)){
				$this -> err($response);
				fputs($this -> smtpsocket, "QUIT" . $this -> CRLF);
				fgets($this -> smtpsocket, 512);
				return false;
			}else{
				//echo "> Command executed successful:<font color=green>[".$cmd."]</font><font color=blue>".$response."</font>\r\n<br>";
			}
			return true;
		}else{
			if($arg){
				if(!$cmd) $cmd = $arg;
				else $cmd = $cmd . " " . $arg;
			}
			socket_write($this -> smtpsocket, $cmd . $this -> CRLF);
			while($response = socket_read($this -> smtpsocket, 512)){
				if(substr($response,3,1) == " "){break;}
			}
			if (!ereg("^[23]", $response)){
				$this -> err($response);
				socket_write($this -> smtpsocket, "QUIT" . $this -> CRLF);
				socket_read($this -> smtpsocket, 512);
				return false;
			}else{
				//echo "> Command executed successful:<font color=green>[".$cmd."]</font><font color=blue>".$response."</font>\r\n<br>";
			}
			return true;
		}
	}
	public function send(){
		if(!$this -> smtpsocket){
			$this -> connect();
		}
		if (!$this -> sendcmd("EHLO", $this -> user)){
			return $this -> err ("sending HELO command");
		}
		if (!$this -> sendcmd("AUTH LOGIN")){
			return $this -> err("sending auth login command");
		}
		if (!$this -> sendcmd(base64_encode($this -> user))){
			return $this -> err("sending user command");
		}
		if (!$this -> sendcmd("", base64_encode($this -> pass))){
			return $this -> err("sending pass command");
		}
		if (!$this -> sendcmd("MAIL", "FROM: <" . $this -> from . ">")){
			return $this-> err("sending MAIL FROM command");
		}
		if (!$this -> sendcmd("RCPT", "TO:<".$this -> to.">")){
			return $this -> err("sending RCPT TO command");
		}
		if (!$this -> sendcmd("DATA")){
			return $this -> err("sending DATA command");
		}
		if (!$this -> message()){
			return $this -> err("sending message");
		}
		if (!$this -> sendcmd("QUIT")){
			return $this -> err("sending QUIT command");
		}
		if($this->mode === ""){
			fclose($this -> smtpsocket);
			return TRUE;
		}else{
			socket_close($this -> smtpsocket);
			return true;
		}
	}
	private function message(){
		$header="";
		$header .= "Date: " . date("r") . $this -> CRLF . $this -> CRLF;
		$header  = "Return-Path: ". $this -> from . $this -> CRLF;
		$header .= "To: " . $this -> to . $this -> CRLF;
		$header .= "From: " . "<" . $this -> from . ">" . $this -> CRLF;
		$header .= "Reply-To: <" . $this -> from . ">" . $this -> CRLF;
		$header .= "Subject: " . $this -> subject . $this -> CRLF;
		$header .= "Message-ID: <" . md5(time()) . ">" . $this -> CRLF;
		$header .= "X-Priority: 3" . $this -> CRLF;
		$header .= "X-Mailer: Apocalypse (www.uxll.com) [version 1.0.0]" . $this -> CRLF;
		$header .= "MIME-Version: 1.0" . $this -> CRLF;
		$header .= "Content-Type: multipart/mixed;" . $this -> CRLF;
		$header .= "\tboundary=\"b1_" . md5("Apocalypse") . "\"". $this -> CRLF . $this -> CRLF . $this -> CRLF;


		$body  = "";
		$body .= "--b1_" . md5("Apocalypse") . $this -> CRLF;
		$body .= "Content-Type: text/html; charset = \"gb2312\"" . $this -> CRLF;
		$body .= "Content-Transfer-Encoding: 8bit" . $this -> CRLF . $this -> CRLF;
		$body .= $this -> body . $this ->  CRLF;
		if($this->mode === ""){
			fputs($this -> smtpsocket, $header . $body . $this -> CRLF . "." . $this -> CRLF);
			return $this->smtp_ok();
		}else{
			socket_write($this -> smtpsocket, $header . $body . $this -> CRLF . "." . $this -> CRLF);
			return $this->smtp_ok();
		}
	}
}