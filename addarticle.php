<?php

session_start();
$mysqli = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");

$linc = $_POST['linc'];
$title = $_POST['title'];
$img = $_POST['img'];
$img_head = $_POST['img_head'];
$body = $_POST['body'];
$name = $_SESSION['full_name'];
$description = $_POST['description'];
$keywords = $_POST['keywords'];
// $body = 'body22';

$mysqli->query("INSERT INTO `article`(`linc`, `title`, `body`, `name`, `description`, `keywords`, `img`, `img_head`) VALUES ('$linc', '$title','$body','$name','$description','$keywords','$img','$img_head')")

?>
