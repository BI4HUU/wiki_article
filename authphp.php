<?php

	include "connect.php";

	$tel = $_POST['tel'];
	$code = $_POST['confirm'];

	$stmt = $mysqli->prepare("SELECT * FROM users WHERE tel = ?");
	$stmt->bind_param("s", $tel);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();

	if ( $row['code'] == strval($code) ) {
		setcookie("sessionkey", $row['sessionkey'], time()+999999999);
		setcookie("sessionname", $row['id_user'], time()+999999999);
		setcookie("name", $row['name'], time()+999999999);
	} else {
		$false_password = intval( $row['false_sms_8lk4m'] );
		$false_password++;
		$stmt3 = $mysqli->prepare("UPDATE `users` SET `false_sms_8lk4m`= ? WHERE `tel` = ?");
		$stmt3->bind_param("ss", $false_password,  $tel);
		$stmt3->execute();
		header('Location: /register.php');
		setcookie("sessionkey", 'false', time()-1);
		setcookie("sessionname", 'false', time()-1);
		setcookie("name", 'false', time()-1);
		die("False password");
	};

?>
