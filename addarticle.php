<?php
	session_start();

	include "connect.php";

	$linc = $_POST['linc'];
	$title = $_POST['title'];
	$img = $_POST['img'];
	$img_head = $_POST['img_head'];
	$body = $_POST['body'];
	$name = $_SESSION['full_name'];
	$description = $_POST['description'];
	$keywords = $_POST['keywords'];

	$mysqli->query("INSERT INTO `article`(`linc`, `title`, `body`, `name`, `description`, `keywords`, `img`, `img_head`) VALUES ('$linc', '$title','$body','$name','$description','$keywords','$img','$img_head')")

?>
