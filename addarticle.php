<?php
	session_start();

	if ($_SESSION['full_name']) {
		include "connect.php";
		$name = $_SESSION['full_name'];

		$linc = $_POST['linc'];
		$title = $_POST['title'];
		$img = $_POST['img'];
		$img_head = $_POST['img_head'];
		$body = $_POST['body'];
		$description = $_POST['description'];
		$keywords = $_POST['keywords'];
		$category = $_POST['category'];

		$mysqli->query("INSERT INTO `article`(`linc`, `title`, `body`, `name`, `description`, `keywords`, `img`, `img_head`, `category`) VALUES ('$linc', '$title','$body','$name','$description','$keywords','$img','$img_head','$category')");
	}
?>
