<?php
//	session_start();

	echo 'testdata3-';
	$token = $_POST['token'];
	$id_facebook = $_POST['id'];
	$data = '0';
	echo "|" . $data . "|";
	$data = file_get_contents("https://graph.facebook.com/$id?access_token=$token");

	echo '---';
	echo $data;
	echo '---';
	$data1 = json_decode($data, true);

	print_r($data1);
	echo '---';

	echo '---';
	echo $token;
	echo '---';
	echo $id_facebook;
	echo '---';
	echo $data1;
	echo '---';

	$name = $data1["name"];
	$id_facebook = $data1["id"];
	// // $pass = md5($_POST['password']);

	$mysqli = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");
	$res = $mysqli->query("SELECT * FROM users WHERE Facebook_id='$id_facebook'");
	$row = $res->fetch_assoc();
	$id_users = $row['Facebook_id'];
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
	if ($row['Facebook_id'] == $id_facebook) {
//		$_SESSION['sessionkey'] = $_session_key;
//		$_SESSION['full_name'] = $name;
		setcookie("sessionkey", $_session_key, time()+999999999);
		setcookie("sessionname", $id_users, time()+999999999);
		setcookie("name", $name, time()+999999999);

		$mysqli->query("UPDATE `users` SET `sessionkey` = '$_session_key',`email` = 'Facebook_u' WHERE `Facebook_id` = '$id'");
	} else {
//		$_SESSION['sessionkey'] = $_session_key;
//		$_SESSION['full_name'] = $name;
		
		$mysqli->query("INSERT INTO `users`(`email`, `tel`, `name`, `password`, `Facebook_id`, `ifcreate`, `sessionkey`) VALUES ('Facebook_i', 'Facebook_i', '$name', 'pass', '$id', '1', '$_session_key')");
		$id_users = $mysqli->insert_id;
		setcookie("sessionkey", $_session_key, time()+999999999);
		setcookie("sessionname", $id_users, time()+999999999);
		setcookie("name", $name, time()+999999999);
	}
echo $name;
echo $id_facebook;
?>
