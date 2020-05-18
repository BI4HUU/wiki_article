<?php 

session_start(); 
$mysqli = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");

$title = $_POST['title'];
$body = $_POST['body'];
$name = $_SESSION['full_name'];
$description = $_POST['description'];
$keywords = $_POST['keywords'];
// $body = 'body22';

$mysqli->query("INSERT INTO `article`(`title`, `body`, `name`, `description`, `keywords`, `img`) VALUES ('$title','$body','$name','$description','$keywords','img')")

?>
