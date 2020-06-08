<?php
	session_start();
	$connect = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");

	$tel = $_POST['tel'];
	$code = $_POST['confirm'];

	$res = $connect->query("SELECT * FROM users WHERE tel = '$tel' AND code = '$code'");
	$row = $res->fetch_assoc();

// if () {
// }

	if ($row['tel'] == $tel and $row['code'] == $code) {
		$sessionkey = $row['sessionkey'];
		$_SESSION['tel'] = $row['tel'];
		$_SESSION['full_name'] = $row['name'];
		setcookie("sessionkey", $sessionkey, time()+999999999);
	} else {
		die("False password");
	};

?>
