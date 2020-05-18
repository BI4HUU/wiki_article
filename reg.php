<?php 
session_start(); 
$connect = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article"); 
$email = $_POST['tel'];
$tel = $_POST['tel'];
$name = $_POST['full_name'];
$pass = md5($_POST['password']);
$code = $_POST['code'];
$res = $connect->query("SELECT * FROM `users` WHERE 1"); 

$res->data_seek(0);
while ($row = $res->fetch_assoc()) {
	if ($row['email'] == $email) {
		die("You hawe account!");
	}
}

$connect->query("INSERT INTO `users`(`email`, `tel`, `name`, `password`, `code`) VALUES ('$email', '$tel', '$name', '$pass' ,'1234')");
$_SESSION['full_name'] = $_POST['full_name'];
header('Location: create.php');
 ?>