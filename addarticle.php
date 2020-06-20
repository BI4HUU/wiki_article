<?php
	session_start();

	$linc = $_POST['linc'];
	$title = $_POST['title'];
	$img = $_POST['img'];
	$img_head = $_POST['img_head'];
	$body = $_POST['body'];
	$description = $_POST['description'];
	$keywords = $_POST['keywords'];
	$category = $_POST['category'];

	include "connect.php";
	
	if ($_SESSION['full_name']) {
		$name = $_SESSION['full_name'];
		$sessionkey = $_SESSION['sessionkey'];
		$mysqli->query("INSERT INTO `article`(`linc`, `title`, `body`, `name`, `description`, `keywords`, `img`, `img_head`, `category`) VALUES ('$linc', '$title','$body','$name','$description','$keywords','$img','$img_head','$category')");
		$id_article = $mysqli->insert_id;

		$resUser = $mysqli->query("SELECT * FROM users WHERE sessionkey = '$sessionkey' AND  name = '$name'");
		$rowUser = $resUser->fetch_assoc();
		$str = $rowUser['article'];
		$arr = json_decode($str);
		$arr[] = $id_article;
		$str2 = json_encode($arr);
		$mysqli->query("UPDATE `users` SET `article` = '$str2' WHERE sessionkey = '$sessionkey' AND  name = '$name'");
	} else {
		$sessionkey = $_COOKIE["sessionkey"];
		$sessionname = $_COOKIE["sessionname"];

		$res = $mysqli->query("SELECT * FROM users WHERE sessionkey = '$sessionkey' AND 'name' = '$sessionname'");
		$row = $res->fetch_assoc();

		if ($row['name'] == $sessionname) {
			$name = $row['name'];

			$mysqli->query("INSERT INTO `article`(`linc`, `title`, `body`, `name`, `description`, `keywords`, `img`, `img_head`, `category`) VALUES ('$linc', '$title','$body','$name','$description','$keywords','$img','$img_head','$category')");

			die("This number is already registered! Sign in or contact support.");
		}
	};
	$str = "[1,2]";
	$arr = json_decode($str);
	$arr[] = '3';
	$str2 = json_encode($arr);
	// $str2 = json_decode($arr);
	echo $str2;
?>