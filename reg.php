<?php
	include "connect.php";

	$tel = $_POST['tel'];
 
	if ($tel[0] == " ") {
		$tel = substr($tel, 1); 
	}
	$tel2 = "+".$tel;
//	$name = $_POST['full_name'];
	$name = '';
// $pass = md5($_POST['password']);
	$code = $_POST['confirm'];

	if ($code == '') { die( "Missed the code!" ); };

	$stmt = $mysqli->prepare("SELECT * FROM users WHERE tel = ?");
	$stmt->bind_param("s", $tel);
	$stmt->execute();
	$res = $stmt->get_result();
	$row = $res->fetch_assoc();
	if ( $row['block'] == '1' ) { die( "This number is blocked! Contact support." ); };
	if ( intval( $row['false_password'] ) >= 5 ) { die( "False code! > 5 items" ); };

	if ( intval( $row['ifcreate'] ) == 1  ) {

		if ( $row['code'] == strval($code) ) {
			$_session_key =  generate_session(40);
			$stmt4 = $mysqli->prepare("UPDATE `users` SET `sessionkey`= ? WHERE `tel` = ?");
			$stmt4->bind_param("ss", $_session_key,  $tel);
			$stmt4->execute();
			setcookie("sessionkey", $_session_key, time()+999999999);
			setcookie("sessionname", $row['id_user'], time()+999999999);
			setcookie("name", $row['name'], time()+999999999);
			header('Location: /index.php');
			die("Auth ok");
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

//		die( "This number is already registered! Sign in or contact support." );
	};

//	$res = $mysqli->query("SELECT * FROM users WHERE tel = '$tel' AND code = '$code'");

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
	};

	echo 1;
	echo $row['code'];
	echo 2;
	echo strval($code);
	echo 3;
	echo strval($code);
	echo 3;
	if ($row['code'] == strval($code)) {
		$_session_key =  generate_session(40);

		$stmt2 = $mysqli->prepare("UPDATE `users` SET `name`= ?,`ifcreate`='1', `sessionkey` = '$_session_key' WHERE `tel` = ?");
		$stmt2->bind_param("ss", $name,  $tel);
		$stmt2->execute();

//		$mysqli->query("UPDATE `users` SET `name`='$name',`ifcreate`='1', `sessionkey` = '$_session_key' WHERE `tel` = '$tel'");
//		$_SESSION['sessionkey'] = $_session_key;
//		$_SESSION['full_name'] = $name;

		setcookie("name", $name, time()+999999999);

		setcookie("sessionkey", $_session_key, time()+999999999);
		setcookie("sessionname", $row['id_user'], time()+999999999);
		setcookie("name", $name, time()+999999999);
        header('Location: /index.php');

	} else {
		$false_password = intval( $row['false_sms_8lk4m'] ) ;
		$false_password++;
		$stmt3 = $mysqli->prepare("UPDATE `users` SET `false_sms_8lk4m`= ? WHERE `tel` = ?");
		$stmt3->bind_param("is", $false_password,  $tel);
		$stmt3->execute();
		die( "False code!." );
	}

?>


