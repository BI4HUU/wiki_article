<?php

    include "connect.php";

    $id_article = $_GET["delete"];

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
            $i = 0;
            foreach ($arr as &$value) {
                if ($value == $id_article){
                    $mysqli->query("DELETE FROM `article` WHERE `article`.`id_article` = '$id_article'");
                    unset($arr[$i]);
                    echo $arr[$i];
                    $str2 = json_encode($arr);
                    $mysqli->query("UPDATE `users` SET `article` = '$str2' WHERE sessionkey = '$sessionkey' AND id_user = '$sessionname'");
                }
                $i++;
            }
        }
    } else {

    };
