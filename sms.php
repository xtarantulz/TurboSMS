<?php
	class SMS{
		public static $sender='TurboSMS';
		public static $login='xtarantulz';
		public static $pwd='x380978377026z';    
		
		public static function send($r,$m,$d=false){
			try{
				$pdo = new PDO ("mysql:host=94.249.146.189;dbname=users",SMS::$login,SMS::$pwd);
				$pdo->query("SET NAMES utf8;");
				if($d==false)
					$pdo->query("INSERT INTO `{SMS::$login}` (`number`,`message`,`sign`) VALUES ('$r','$m','{SMS::$sender}')");
				else
					$pdo->query("INSERT INTO `{SMS::$login}` (`number`,`message`,`sign`,`send_time`) VALUES ('$r','$m','{SMS::$sender}','$d')");
			}catch(Exception $e){
				//дебаги от меня
				echo "<pre>";
					print_r($e);
				echo "</pre>";
				
				$client = new SoapClient ('http://turbosms.in.ua/api/wsdl.html'); 
				
				$auth = array( 
					'login' => SMS::$login, 
					'password' => SMS::$pwd 
				); 
				
				$res=$client->Auth($auth);
				//дебаги от меня
				echo "<pre>";
					print_r($res);
				echo "</pre>";	

				$sms = array( 
					'sender' => SMS::$sender, 
					'destination' => $r, 
					'text' => $m
				);
				
				$res=$client->SendSMS($sms);
				//дебаги от меня
				echo "<pre>";
					print_r($res);
				echo "</pre>";	
			}
		}
	}
?>