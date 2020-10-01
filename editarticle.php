<?php
	$id =          $_POST['id'];
//	$linc =        $_POST['linc'];
	$title =       $_POST['title'];
	$img =         $_POST['img'];
	$img_head =    $_POST['img_head'];
	$body =        $_POST['body'];
	$description = $_POST['description'];
	$keywords =    $_POST['keywords'];
	$category =    $_POST['category'];

	echo 1;

    include "connect.php";
//    include "bleack_list2.php";
//    foreach( $bleack_list2 as &$value){
//        if ($value == $linc) exit('bleack_list2');};

	if ($_COOKIE["sessionkey"]) {
		// $name = $_COOKIE['full_name'];
		$sessionkey = $_COOKIE["sessionkey"];
        $id_user = $_COOKIE["sessionname"];

        echo 2;
        $stmt = $mysqli->prepare("SELECT sessionkey, article, false_password, block FROM users WHERE id_user = ?");
        $stmt->bind_param("s", $id_user);
        $stmt->execute();
        $resUser = $stmt->get_result();
        $rowUser = $resUser->fetch_assoc();

        if ( intval( $rowUser['false_password'] ) >= 5  ) {
            header('Location: /index.php');
            setcookie("sessionkey", 'false', time()-1);
            setcookie("sessionname", 'false', time()-1);
            setcookie("name", 'false', time()-1);
            exit();};

        if ( $rowUser['block'] == '1' ) {
            header('Location: /index.php');
            setcookie("sessionkey", 'false', time()-1);
            setcookie("sessionname", 'false', time()-1);
            setcookie("name", 'false', time()-1);
            exit();};
        if ($rowUser['sessionkey'] == $sessionkey) {

            echo 3;
			$str = $rowUser['article'];
			$arr = json_decode($str);
			foreach ($arr as &$value) {
                echo 4;
				if ($value == $id){
                    echo 5;
					$mysqli->query("UPDATE `article` SET `title` = '$title', `body` = '$body', `description` = '$description', `keywords` = '$keywords', `img` = '$img', `img_head` = '$img_head', `category` = '$category' WHERE `article`.`id_article` = '$id'");
				}
			}
		}
	} else {
        $false_password = intval( $rowUser['false_password'] );
        $false_password++;
        $stmt3 = $mysqli->prepare("UPDATE `users` SET `false_password`= ? WHERE `id_user` = ?");
        $stmt3->bind_param("ss", $false_password,  $id_user);
        $stmt3->execute();
        header('Location: /register.php');
        setcookie("sessionkey", 'false', time()-1);
        setcookie("sessionname", 'false', time()-1);
        setcookie("name", 'false', time()-1);
        exit();

	};
?>