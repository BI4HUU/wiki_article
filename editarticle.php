<?php
//	session_start();

	$id =          $_POST['id'];
	$linc =        $_POST['linc'];
	$title =       $_POST['title'];
	$img =         $_POST['img'];
	$img_head =    $_POST['img_head'];
	$body =        $_POST['body'];
	$description = $_POST['description'];
	$keywords =    $_POST['keywords'];
	$category =    $_POST['category'];



	// echo $id . '|id||';
	// echo $linc . '|linc||';
	// echo $title . '|title||';
	// echo $img . '|img||';
	// echo $img_head . '|img_head||';
	// echo $body . '|body||';
	// echo $description . '|description||';
	// echo $keywords . '|keywords||';
	// echo $category . '|category||';

	include "connect.php";

	if ($_COOKIE["sessionkey"]) {
		// $name = $_COOKIE['full_name'];
		$sessionkey = $_COOKIE["sessionkey"];
        $sessionname = $_COOKIE["sessionname"];

		// $resUser = $mysqli->query("SELECT sessionkey, article FROM users WHERE sessionkey = '$sessionkey' AND  name = '$name'");
		$resUser = $mysqli->query("SELECT sessionkey, article FROM users WHERE sessionkey = '$sessionkey' AND id_user = '$sessionname'");
		$rowUser = $resUser->fetch_assoc();

		if ($rowUser['sessionkey'] == $sessionkey) {

			$str = $rowUser['article'];
			$arr = json_decode($str);
			foreach ($arr as &$value) {
				if ($value == $id){
					$mysqli->query("UPDATE `article` SET `linc` = '$linc', `title` = '$title', `body` = '$body', `name` = '$name', `description` = '$description', `keywords` = '$keywords', `img` = '$img', `img_head` = '$img_head', `category` = '$category' WHERE `article`.`id_article` = '$id'");
				}
			}
		}
	} else {

	};
?>