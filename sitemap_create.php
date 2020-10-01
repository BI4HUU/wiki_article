<?php
    include "connect.php";
    include "bleack_list.php";

    $site = 'https://preterit-strikes.000webhostapp.com/';

    $query =  "SELECT * FROM article WHERE 1";
    $result = $mysqli->query($query);
    $row = $result->fetch_assoc();

    $arr_list2 = [];
    $arr_list2 = $arr_list2 + $good_list1;

    while ($row = $result->fetch_assoc()) {
        array_push($arr_list2, $row['linc']);
    }

    $linc_list = '';
    foreach ($arr_list2 as &$value) {
        $linc_list = $linc_list . $site . $value . '.php
';
    }


    $fp2 = fopen('sitemap.txt', 'w');
    $test2 = fwrite($fp2, json_encode($linc_list) );
    fclose($fp2);










//$test2 = fwrite($fp2, json_encode($link_list2, JSON_UNESCAPED_UNICODE) );