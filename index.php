<?php 
$mysqli = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");
if (!$mysqli) {
	echo "Ошибка: Невозможно установить соединение с MySQL.";
	exit;
}
?>
<?php include "header.php" ?>
<section class="container">
<?php
$query =  "SELECT * FROM article WHERE 1";
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_assoc()) {
        echo ("<h1>" . $row['title'] . "</h1><p>" . $row['body'] . "</p><hr>");
    }

    $result->free();
}
?>
</section>
<?php include "footer.php" ?>