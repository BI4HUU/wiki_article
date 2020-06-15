<?php
	$mysqli = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");
	if (!$mysqli) {
		echo "Ошибка: Невозможно установить соединение с MySQL.";
		exit;
	}

	$query =  "SELECT * FROM article WHERE 1";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
?>