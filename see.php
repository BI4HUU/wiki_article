<?php
    session_start();
    if (!$_GET['end'] == 'true'){
       $_SESSION['time_start'] = time();
       $_SESSION['id_article'] = $_GET['id'];};

    if ($_GET['end'] == 'true'){
        if ($_SESSION['id_article'] == $_GET['id2']){
            if ( time() - $_SESSION['time_start'] > 180){
                include "connect.php";

                $stmt = $mysqli->prepare("SELECT see FROM article WHERE id_article = ?");
                $stmt->bind_param("s", $_GET['id2']);
                $stmt->execute();
                $res = $stmt->get_result();
                $rowArticle = $res->fetch_assoc();
                $str = $rowArticle['see'];
                $str++;

                $stmt2 = $mysqli->prepare("UPDATE `article` SET `see` = ? WHERE `article`.`id_article` = ?");
                $stmt2->bind_param("ss", $str, $_GET['id2']);
                $stmt2->execute();
                $_SESSION['time_start'] = false;
                $_SESSION['id_article'] = false;
            };
        };
    };


