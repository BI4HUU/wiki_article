<?php 
$mysqli = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");
if (!$mysqli) {
	echo "Ошибка: Невозможно установить соединение с MySQL.";
	exit;
}
?>

<?php include "header.php" ?>
<section class="container container_index row">
<?php
$query =  "SELECT * FROM article WHERE 1";
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			echo ("<a class='card' href='" . $row['linc'] . ".php'><div class='cardDiv' style='backgroundImage:url(" . $row['img'] . ")><h2 class='card_text'>" . $row['title'] . "</h2></div></a>");
		}

	$result->free();
}
?>

</section>
<?php include "footer.php" ?>