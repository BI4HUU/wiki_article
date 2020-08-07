<?php
$id_article = $_POST["id_article"];
include "connect.php";

if ($_COOKIE["sessionkey"]) {
    // $name = $_COOKIE['full_name'];
    $sessionkey = $_COOKIE["sessionkey"];
    $sessionname = $_COOKIE["sessionname"];

    $resUser = $mysqli->query("SELECT sessionkey, id_user FROM users WHERE sessionkey = '$sessionkey' AND id_user = '$sessionname'");
    $rowUser = $resUser->fetch_assoc();


    if ($rowUser['sessionkey'] == $sessionkey) {
        $resArticle = $mysqli->query("SELECT like_id_user_68h5j4m8, like_8f6b4n5m6 FROM article WHERE id_article = '$id_article'");
        $rowArticle = $resArticle->fetch_assoc();

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
        $mysqli->query("UPDATE `article` SET `like_id_user_68h5j4m8` = '$str2', `like_8f6b4n5m6` = '$like_number' WHERE `article`.`id_article` = '$id_article'");

    }
};