<?php
session_start();
$connect = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");

$tel = $_POST['tel'];
$name = $_POST['full_name'];
// $pass = md5($_POST['password']);
$code = $_POST['confirm'];

$res = $connect->query("SELECT * FROM users WHERE tel = '$tel' AND code = '$code'");

$row = $res->fetch_assoc();

function generate_session($number) {
	$arr = array('a','b','c','d','e','f','g','h','i','k','m','n','p','r','s','t','u','v','x','y','z','A','B','C','D','E','F','G','H','K','L',
	'M','N','P','R','S','T','U','V','X','Y','Z','2','3','4','5','6','7','8','9');
	$pass = "";
	for($i = 0; $i < $number; $i++)
	{
		$index = rand(0, count($arr) - 1);
		$pass .= $arr[$index];
	}
	return $pass;
}


$_session_key =  generate_session(40);
$_SESSION['sessionkey'] = $_session_key;
setcookie("sessionkey", $_session_key, time()+999999999);

$_SESSION['full_name'] = $_POST['full_name'];

if ($row['code'] == $code) {
	$connect->query("UPDATE `users` SET `name`='$name',`ifcreate`='1', `sessionkey` = '$_session_key' WHERE `tel` = '$tel'");
} else {
	die( "False code!" );
}



?>


