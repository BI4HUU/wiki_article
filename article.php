<?php 
$mysqli = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");
if (!$mysqli) {
	echo "Ошибка: Невозможно установить соединение с MySQL.";
	exit;
}
$query =  "SELECT * FROM article WHERE `id`='$_GET["id"]'";
	if ($result = $mysqli->query($query)) {
		while ($row = $result->fetch_assoc()) {
			echo ("<h1>" . $row['title'] . "</h1><p>" . $row['body'] . "</p><div class='author'>" . $row['name'] . "  " . $row['date'] . "</div>
			<hr>");
		}

	$result->free();
}
?>
</section>
<?php include "footer.php" ?>



<?php 
while ($row = $result->fetch_assoc()) {
		echo  '<h1>' . $row["title"] . '</h1>';
		echo  $row["description"];
		echo  $row["keywords"];
		echo  $row["body"];
		echo  $row["name"];
		echo  '<hr>';

	}
?>
