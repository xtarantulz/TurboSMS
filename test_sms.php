<?php
	//подключение класса
	require_once($_SERVER['DOCUMENT_ROOT']."/php/sms.php");
	
	//отправка смс
	SMS::send('+380632700658','Hello World');
?>

