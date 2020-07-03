<?php
	session_start();
	$mysqli = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");

	$tel = $_POST['tel'];
	$code = $_POST['confirm'];

	$res = $mysqli->query("SELECT * FROM users WHERE tel = '$tel' AND code = '$code'");
	$row = $res->fetch_assoc();

	function generate_session($number) {
		$arr = array('a','b','c','d','e','f','g','h','i','k','m','n','p','r','s','t','u','v','x','y','z','A','B','C','D','E','F','G','H','K','L',
		'M','N','P','R','S','T','U','V','X','Y','Z','2','3','4','5','6','7','8','9');
		$pass = "";
		for($i = 0; $i < $number; $i++){
			$index = rand(0, count($arr) - 1);
			$pass .= $arr[$index];}
		return $pass;}

	if ($row['tel'] == $tel and $row['code'] == $code) {
		$sessionkey = $_SESSION['sessionkey'] = $row['sessionkey'];
		$_SESSION['tel'] = $row['tel'];
		$_SESSION['full_name'] = $row['name'];
		setcookie("sessionkey", $row['sessionkey'], time()+999999999);
		setcookie("sessionname", $row['name'], time()+999999999);

	} else {
		die("False password");
	};

?>
