<?php
	include "connect.php";

    $tel = $_POST['tel'];

    $confirmNumber =  generate_pass(4);

    $stmt = $mysqli->prepare("SELECT tel, block FROM users WHERE `tel` = ?");
    $stmt->bind_param("s", $tel );
    $stmt->execute();
    $res = $stmt->get_result();

    $row = $res->fetch_assoc();
    if ( $row['block'] == '1' ) { die( "This number is blocked! Contact support." ); };

    if ( $row['tel'] == $tel ) {
//        die("This number is already registered! Sign in or contact support.");

        $stmt4 = $mysqli->prepare("UPDATE `users` SET `code`= ? WHERE `tel` = ?");
        $stmt4->bind_param("ss", $confirmNumber,  $tel);
        $stmt4->execute();
        echo send("api.smsfeedback.ru", 80, "arbitr1688", "Ama016880", $tel , $confirmNumber, "TEST-SMS");
        die();
    }

    $stmt2 = $mysqli->prepare("INSERT INTO `users`(`email`, `tel`, `name`, `password`, `code`) VALUES (?, ?, 'name', 'pass', ?)");
    $stmt2->bind_param("sss", $tel, $tel, $confirmNumber );
    $stmt2->execute();
    $res = $stmt2->get_result();

    $tel = "+" . $tel;
    echo send("api.smsfeedback.ru", 80, "arbitr1688", "Ama016880", $tel , $confirmNumber, "TEST-SMS");

    function generate_pass($number) {
    $arr = array('0','1','2','3','4','5','6','7','8','9');
    $pass = "";
    for($i = 0; $i < $number; $i++) {
        $index = rand(0, count($arr) - 1);
        $pass .= $arr[$index];
    }
    return $pass;
}

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