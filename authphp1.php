<?php
session_start();
$connect = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");

$tel = $_POST['tel'];

function generate_pass($number) {
	$arr = array('0','1',
		'2','3','4','5','6',
		'7','8','9');
	// Генерируем пароль для смс
	$pass = "";
	for($i = 0; $i < $number; $i++) {
		// Вычисляем произвольный индекс из массива
		$index = rand(0, count($arr) - 1);
		$pass .= $arr[$index];
	}
	return $pass;
}

$confirmNumber =  generate_pass(4);


$connect->query("UPDATE `users` SET `code`='$confirmNumber' WHERE `tel` = '$tel'");

$tel = "+" . $tel;
echo send("api.smsfeedback.ru", 80, "arbitr1688", "Ama016880", $tel , $confirmNumber, "TEST-SMS");

/*
* функция передачи сообщения
*/

function send($host, $port, $login, $password, $phone, $text, $sender = false, $wapurl = false ) {
	$fp = fsockopen($host, $port, $errno, $errstr);
	if (!$fp) {
		return "errno: $errno \nerrstr: $errstr\n";
	}
	fwrite($fp, "GET /messages/v2/send/" .
		"?phone=" . rawurlencode($phone) .
		"&text=" . rawurlencode($text) .
		($sender ? "&sender=" . rawurlencode($sender) : "") .
		($wapurl ? "&wapurl=" . rawurlencode($wapurl) : "") .
		"  HTTP/1.0\n");
	fwrite($fp, "Host: " . $host . "\r\n");
	if ($login != "") {
		fwrite($fp, "Authorization: Basic " . 
			base64_encode($login. ":" . $password) . "\n");
	}
	fwrite($fp, "\n");
	$response = "";
	while(!feof($fp)) {
		$response .= fread($fp, 1);
	}
	fclose($fp);
	list($other, $responseBody) = explode("\r\n\r\n", $response, 2);
	return $responseBody;
}

 ?>