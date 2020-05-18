<?php 
session_start();
$connect = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article"); 
$email = $_POST['tel'];
$_SESSION['full_name'] = $_POST['full_name'];
$pass = md5($_POST['password']);

$res = $connect->query("SELECT * FROM `users` WHERE 1"); 

$res->data_seek(0);



while ($row = $res->fetch_assoc()) {
		if ($row['email'] == $email) {
		
		if (md5($_POST['password']) === $row['password']) {
			$_SESSION['message'] = 'Password ok';
			header('Location: https://preterit-strikes.000webhostapp.com/create.php');
		} else {
			$_SESSION['message'] = 'Password no';
			echo  'Password no';
		}
	}
}

?>