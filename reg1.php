<?php
	include "connect.php";

$tel = $_POST['tel'];

function generate_pass($number) {
	$arr = array('0','1','2','3','4','5','6','7','8','9');
	$pass = "";
	for($i = 0; $i < $number; $i++) {
		$index = rand(0, count($arr) - 1);
		$pass .= $arr[$index];
	}
	return $pass;
}

$confirmNumber =  generate_pass(4);

$res = $mysqli->query("SELECT * FROM users WHERE `tel` = '$tel'");
$row = $res->fetch_assoc();

$test = $row['tel'];

if ($row['tel'] == $tel) {
	die("This number is already registered! Sign in or contact support.");
}

$mysqli->query("INSERT INTO `users`(`email`, `tel`, `name`, `password`, `code`) VALUES ('$tel', '$tel', 'name', 'pass','$confirmNumber')");

$tel = "+" . $tel;
echo send("api.smsfeedback.ru", 80, "arbitr1688", "Ama016880", $tel , $confirmNumber, "TEST-SMS");


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