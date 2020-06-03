<?php 
$mysqli = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");
if (!$mysqli) {
	echo "Ошибка: Невозможно установить соединение с MySQL.";
	exit;
}

global $description;

$query =  "SELECT * FROM article WHERE 1";
$result = $mysqli->query($query);
$text1 = <<<'HEREDOC'
<?php
	$mysqli = new mysqli("localhost", "id11565558_root", "o)!Z~v%+<CRjh^W0", "id11565558_article");
	include "header.php";
?>
<section class="container">
<?php
$query =  "SELECT * FROM article WHERE id_article=
HEREDOC;

$text2 = <<<'HEREDOC2'
";
	$result = $mysqli->query($query);
	$row = $result->fetch_assoc();
	echo ("<h1>" . $row['title'] . "</h1><p>" . $row['body'] . "</p><div class='author'>" . $row['name'] . "  " . $row['date'] . "</div><hr>");

	$result->free();

?>
</section>
<?php include "footer.php" ?>
HEREDOC2;
while ($row = $result->fetch_assoc()) {
	$nameFile = $row['linc'] . ".php";
	echo ( $row['body'] );
	echo ( 'body');
	// $fp = fopen( . ".php", 'w');
	$fp = fopen($nameFile, 'w');

	$test = fwrite($fp, $text1 . $row['id_article'] . $text2);
	fclose($fp);
}

// $result->free();

?>


