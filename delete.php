<?php

    include "connect.php";

    header("Location: /admin.php");
    $id_article = $_GET["delete"];

    if ($_COOKIE["sessionkey"]) {
        // $name = $_COOKIE['full_name'];
        $sessionkey = $_COOKIE["sessionkey"];
        $id_user = $_COOKIE["sessionname"];

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
            $str = $rowUser['article'];
            $arr = json_decode($str);
            $i = 0;
            foreach ($arr as &$value) {
                if ($value == $id_article){
//                  $mysqli->query("DELETE FROM `article` WHERE `article`.`id_article` = '$id_article'");

                    $stmt3 = $mysqli->prepare("DELETE FROM `article` WHERE `article`.`id_article` = ?");
                    $stmt3->bind_param("s",  $id_article);
                    $stmt3->execute();

                    array_splice($arr, $i, 1);
                    $str2 = json_encode($arr);
//                  $mysqli->query("UPDATE `users` SET `article` = '$str2' WHERE id_user = '$id_user'");
                    $stmt3 = $mysqli->prepare("UPDATE `users` SET `article` = ? WHERE id_user = ?");
                    $stmt3->bind_param("ss", $str2,  $id_user);
                    $stmt3->execute();
                }
                $i++;
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
