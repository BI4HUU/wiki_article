<?php
    $id_article = $_POST["id_article"];
    include "connect.php";

    if ($_COOKIE["sessionkey"]) {
        // $name = $_COOKIE['full_name'];
        $sessionkey = $_COOKIE["sessionkey"];
        $id_user = $_COOKIE["sessionname"];

//        $resUser = $mysqli->query("SELECT sessionkey, id_user FROM users WHERE sessionkey = '$sessionkey' AND id_user = '$sessionname'");
//        $rowUser = $resUser->fetch_assoc();
        $stmt = $mysqli->prepare("SELECT sessionkey, block FROM users WHERE id_user = ?");
        $stmt->bind_param("s", $id_user);
        $stmt->execute();
        $res = $stmt->get_result();
        $rowUser = $res->fetch_assoc();

        if ( $rowUser['block'] == '1' ) { die( "This number is blocked! Contact support." ); };

        if ($rowUser['sessionkey'] == $sessionkey) {
            $stmt2 = $mysqli->prepare("SELECT like_id_user_68h5j4m8, like_8f6b4n5m6 FROM article WHERE id_article = ?");
            $stmt2->bind_param("s", $id_article);
            $stmt2->execute();
            $res = $stmt2->get_result();
            $rowArticle = $res->fetch_assoc();

            $str = $rowArticle['like_id_user_68h5j4m8'];
            $like_number = $rowArticle['like_8f6b4n5m6'];

            $like_number++;
            $arr = json_decode($str);

            foreach ($arr as &$value) {
                if ($value == intval($rowUser['id_user'])){
                    die("You click like");
                };
            }
            $arr[] = intval($rowUser['id_user']);
            $str2 = json_encode($arr);

            $stmt2 = $mysqli->prepare("UPDATE `article` SET `like_id_user_68h5j4m8` = ?, `like_8f6b4n5m6` = ? WHERE `article`.`id_article` = ?");
            $stmt2->bind_param("sss", $str2, $like_number, $id_article);
            $stmt2->execute();
        }
    };