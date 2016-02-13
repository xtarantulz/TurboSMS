<?php
	//подключение класса
	require_once("sms.php");
	
	//отправка смс
	SMS::send('+3***********','Hello World');
?>

