<?php
	session_start();

	$token = $_POST['token'];
	$id = $_POST['id'];

	$data = file_get_contents("https://graph.facebook.com/$id?access_token=$token");
	
	$data1 = json_decode($data, true);
	$name = $data1["name"];
	$id = $data1["id"];
	// // $pass = md5($_POST['password']);

	$mysqli = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");
	$res = $mysqli->query("SELECT * FROM users WHERE Facebook_id='$id'");
	$row = $res->fetch_assoc();

	function generate_session($number) {
		$arr = array('a','b','c','d','e','f','g','h','i','k','m','n','p','r','s','t','u','v','x','y','z','A','B','C','D','E','F','G','H','K','L',
		'M','N','P','R','S','T','U','V','X','Y','Z','2','3','4','5','6','7','8','9');
		$pass = "";
		for($i = 0; $i < $number; $i++){
			$index = rand(0, count($arr) - 1);
			$pass .= $arr[$index];}
		return $pass;
	}

	$_session_key =  generate_session(40);
	if ($row['Facebook_id'] == $id) {
		$_SESSION['sessionkey'] = $_session_key;
		$_SESSION['full_name'] = $name;
		setcookie("sessionkey", $_session_key, time()+999999999);
		setcookie("sessionname", $name, time()+999999999);

		$mysqli->query("UPDATE `users` SET `sessionkey` = '$_session_key',`email` = 'email1' WHERE `Facebook_id` = '$id'");
	} else {
		$_SESSION['sessionkey'] = $_session_key;
		$_SESSION['full_name'] = $name;
		setcookie("sessionkey", $_session_key, time()+999999999);
		setcookie("sessionname", $name, time()+999999999);
		
		$mysqli->query("INSERT INTO `users`(`email`, `tel`, `name`, `password`, `Facebook_id`, `ifcreate`, `sessionkey`) VALUES ('email2', 'tel', '$name', 'pass', '$id', '1', '$_session_key')");
	}

?>
