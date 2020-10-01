<?php
    include "connect.php";
	$linc = $_POST['linc'];
	$title = $_POST['title'];
	$img = $_POST['img'];
	$img_head = $_POST['img_head'];
	$body = $_POST['body'];
	$description = $_POST['description'];
	$keywords = $_POST['keywords'];
	$category = $_POST['category'];

	$sessionkey = $_COOKIE["sessionkey"];
    $id_user = $_COOKIE["sessionname"];

    include "bleack_list2.php";
    foreach( $bleack_list2 as &$value){
        if ($value == $linc) exit();};

    $stmt = $mysqli->prepare("SELECT * FROM users WHERE id_user = ?");
    $stmt->bind_param("s",  $id_user );
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $name = $row['name'];
    $id_user_add_article = $row['id_user'];

    if ( $row['block'] == '1' ) { die( "This number is blocked! Contact support." ); };
    if ( intval( $row['false_password'] ) >= 5 ) { die( "False code! > 5 items" ); };

		if ($row['sessionkey'] == strval($sessionkey)) {

			$mysqli->query("INSERT INTO `article`(`linc`, `title`, `body`, `name`, `description`, `keywords`, `img`, `img_head`, `category`, `id_user_add_article_lV8hJ3`) VALUES ('$linc', '$title','$body','$name','$description','$keywords','$img','$img_head','$category','$id_user_add_article')");
			$id_article = $mysqli->insert_id;

			$str = $row['article'];
			$arr = json_decode($str);
			$arr[] = $id_article;
			$str2 = json_encode($arr);

            $stmt3 = $mysqli->prepare("UPDATE `users` SET `article` = ? WHERE sessionkey = ? AND id_user = ?");
            $stmt3->bind_param("sss", $str2, $sessionkey, $id_user );
            $stmt3->execute();
		} else {
            $false_password = intval( $row['false_password'] );
            $false_password++;
            $stmt3 = $mysqli->prepare("UPDATE `users` SET `false_password`= ? WHERE `id_user` = ?");
            $stmt3->bind_param("ss", $false_password,  $id_user);
            $stmt3->execute();
            header('Location: /register.php');
            setcookie("sessionkey", 'false', time()-1);
            setcookie("sessionname", 'false', time()-1);
            setcookie("name", 'false', time()-1);
            exit(); }

?>